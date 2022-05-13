<?php

	/**************************************************************/
	/***********************    conexion BD    ********************/
	/**************************************************************/
	$path = '../';
	include($path."Include/Bd/bd.php");

	/*******************************************************************************/
	/******** Incluimos los archivos para encripar y generar la llave unica  *******/
	/*******************************************************************************/
	include ($path."Include/Autenticacion/Genera_Key.php");
	include ($path."Include/Autenticacion/encriptacion.php");

	/**************************************************************/
	/***********************   recibir datos   ********************/
	/**************************************************************/
    $TI     = (isset($_GET['TI'])) ? $_GET['TI'] : '';
    $usuario     = (isset($_GET['usuario'])) ? $_GET['usuario'] : '';
    $clave     = (isset($_GET['clave'])) ? $_GET['clave'] : '';

    /*******************************************************************************/
	/* Obtenemos los datos para crear la session y redirigir a la pagina principal */
	/*******************************************************************************/
	$sql = "SELECT Nombre_Session_Conf, Tiempo_Session_Conf, Llave_Encriptacion_Conf FROM tab_configuracion";
	$res_principal = seleccion($sql);

	$nom_session = $res_principal[0]['Nombre_Session_Conf'];
	$llave_encrip = $res_principal[0]['Llave_Encriptacion_Conf'];


	/*******************************************************************************/
	/**************** Si vienen datos en el usuario y contraseña   *****************/
	/*******************************************************************************/
	if((isset($usuario)) && (isset($clave))) {
		/*******************************************************************************/
		/*******************      Comprobar existencia del usuario     *****************/
		/*******************************************************************************/
		$sql = "SELECT Id_Per FROM tab_personas WHERE Cedula_Per='".$usuario."' AND Tipo_Identificacion_Per='".$TI."'";
		$res=seleccion($sql);
		
		//Usuario no existe
		if($res[0]['Id_Per']==''){
			
			//Error1: El usuario no existe 
			echo 'e1';
			exit;
		//Usuario existe	
		}elseif($res[0]['Id_Per']!=''){
			/*******************************************************************************/
			/**************  Comprobar relacion usuario, clave y estado de logeo  **********/
			/*******************************************************************************/
			$sql = "SELECT Id_Per_Usu, Estado_Conexion_Usu, Cedula_Per
                        FROM tab_usuarios
                        INNER JOIN tab_personas ON (Id_Per = Id_Per_Usu)
                        WHERE Cedula_Per='".$usuario."'
                        AND Password_Usu = '".$clave."' 
                        AND Tipo_Identificacion_Per='".$TI."'";
			$res=seleccion($sql);

			//La clave digitada no es correcta
			if($res[0]['Id_Per_Usu']==''){
				
				//Error2: la clave digitada no es correcta
				echo 'e2';
				exit;
				
			//La clave digitada es correcta, comprobar si el usuario tiene otra session abierta
			}elseif($res[0]['Estado_Conexion_Usu'] =='1'){
				//Error3:ya esta logeado en otro navegador
				echo 'e3';
				exit;
			//EL USUARIO ES CORRECTO
			}elseif($res[0]['Id_Per_Usu']!=''){


				/*******************************************************************************/
				/* Guardar el nombre de la session a crear compuesto de nom_session + cedula   */
				/*******************************************************************************/
				$nombre_session = $nom_session.$res[0]['Cedula_Per'];

				/*******************************************************************************/
				/*********** Establecer un nombre se session unico por cada usuario   **********/
				/*******************************************************************************/
				$sql ="UPDATE tab_usuarios SET
					Nombre_Session_Usu='".$nombre_session."'
					WHERE Id_Per_Usu = ".$res[0]['Id_Per_Usu'];
							
				$res_session = transaccion($sql);
						
				//Si la session se creo correctamente
				if($res_session[0]==1){
					/******************************************************/
					/***********      Crear la Session           **********/
					/******************************************************/
					session_name($nombre_session);
					session_start();


					/******************************************************/
					/** Generamos un key aleatorio unico para la session **/
					/**  activa, Por ejemplo: HIH87TV                    **/
					/******************************************************/		
					$Key = Genera_key();
								
								
								
								
					/******************************************************/
					/** Guardamos ese key en la session recien creada *****/
					/******************************************************/
					$_SESSION["Key"] = $Key;

					/******************************************************/
					/*******    Establecemos el tiempo de session   *******/
					/******************************************************/
					$fecha = getdate();
					$hora_conexion = $fecha["year"]."/".$fecha["mon"]."/".$fecha["mday"]." ".$fecha["hours"].":".$fecha["minutes"];
					
					/******************************************************/
					/** Guardamos ese tiempo en la session recien creada **/
					//Esto es milisegundo
					/******************************************************/
					$_SESSION['session_time']=time() ;
					
					
					/******************************************************/
					/*****  Guardamos la KEY y la hora en la BD      ******/
					/******************************************************/
					$sql="UPDATE tab_usuarios SET key_Usu = '".$Key."', Fecha_Hora_Conexion_Usu = '".$hora_conexion."' WHERE Id_Per_Usu= '".$res[0]['Id_Per_Usu']."'";
					$act_key_hora = transaccion($sql);

					//Si se guardo el Key y la hora correctamente
					if($act_key_hora[0]==1){
						
						/******************************************************/
						/*  Encriptamos la cedula del usuario y la retornamos */
						/******************************************************/	
						echo $cadena_encriptada = encriptar($res[0]['Cedula_Per'],$llave_encrip);
						
					
					}
							
					

				//Error5:  
				}else{
					//Error5: Error creando nombre se session en la Base de datos
					echo 'e5';
					exit;
				}
			}
		}

	}else{
		echo "No se ha enviado valor alguno de peticion";
	}
		
    
?>
