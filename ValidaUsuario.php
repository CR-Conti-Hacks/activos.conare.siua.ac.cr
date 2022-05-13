<?php

	/**************************************************************/
	/***********************    conexion BD    ********************/
	/**************************************************************/
	include("Include/Bd/bd.php");

	
	
	/**************************************************************/
	/***********************   recibir datos   ********************/
	/**************************************************************/
    $usuario     = (isset($_GET['usuario'])) ? $_GET['usuario'] : '';
    $mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $clave     = (isset($_GET['clave'])) ? $_GET['clave'] : '';
    $guardar_clave     = (isset($_GET['guardar_clave'])) ? $_GET['guardar_clave'] : '';
    $TI     = (isset($_GET['TI'])) ? $_GET['TI'] : '';
	

	
	
	/*******************************************************************************/
	/* Obtenemos los datos para crear la session y redirigir a la pagina principal */
	/*******************************************************************************/
	$sql = "SELECT Nombre_Session_Conf, Tiempo_Session_Conf, Llave_Encriptacion_Conf FROM tab_configuracion";
	$res_principal = seleccion($sql);

	$nom_session = $res_principal[0]['Nombre_Session_Conf'];
	$llave_encrip = $res_principal[0]['Llave_Encriptacion_Conf'];

	
	
	/*******************************************************************************/
	/******** Incluimos los archivos para encripar y generar la llave unica  *******/
	/*******************************************************************************/
	include ("Include/Autenticacion/encriptacion.php");
	include ("Include/Autenticacion/Genera_Key.php");
	
	
	
	
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
				/**************    Comprobar si el usuario desea crear la cookie      **********/
				/*******************************************************************************/
				if ($_GET["guardar_clave"]=="1"){

					//Creamos una cookie por el usuario por un año (60 segundos * 60 minutos * 24 horas * 365 dias)
					setcookie("cookie_usuario",$usuario, time()+(60*60*24*365));
					
                    //Creamos una cookie por el usuario por un año (60 segundos * 60 minutos * 24 horas * 365 dias)
					setcookie("cookie_TI",$TI, time()+(60*60*24*365));
                    
                    //Creamos una cookie por el usuario por un año (60 segundos * 60 minutos * 24 horas * 365 dias)
					setcookie("cookie_id",$res[0]['Id_Per_Usu'], time()+(60*60*24*365));
                    
                    
                    
					//Generamos un numero aleatorio para crear un identificador por usuario
					$numero_aleatorio = mt_rand(1000000,999999999);
					
					//Creamos una cookie por el numeor aleatorio
					setcookie("cookie_aleatoria", $numero_aleatorio, time()+(60*60*24*365));
					
					//Establecer un nombre se session unico por cada usuario
					$sql = "UPDATE  tab_usuarios SET Cookie_Usu ='".$numero_aleatorio."' WHERE Id_Per_Usu = ".$res[0]['Id_Per_Usu'];
					$res_cookie = transaccion($sql);
					
					//Error al crear la cookie
					if($res_cookie[0]!=1){
						//Error creando la cookie
						echo 'e4';
						exit;
					}
				//Fin de cookie
				}
				
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
					/*********** Crear la Session   **********/
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
						$cadena_encriptada = encriptar($res[0]['Cedula_Per'],$llave_encrip);
						
						//La retornamos
						echo $cadena_encriptada;
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
	
	/**************************************************************/
	/***************** establecimiento de headers *****************/
	/**************************************************************/
	//No guardar la pagina en cache
	header("Cache-Control: no-cache, must-revalidate");

	//Codificacion UTF-8
	header('Content-Type: text/html; charset=utf-8');
	
	//Zona Horaria
	date_default_timezone_set('America/Costa_Rica');
	

?>
