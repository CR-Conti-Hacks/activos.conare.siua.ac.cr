<?php

    /****************************************/
    /****** codificación y timezone        **/
    /****************************************/
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set('America/Costa_Rica');


    /****************************************/
    /****** importamos la conexion a la BD **/
    /****************************************/
    include('Include/Bd/bd.php');
    
	/************************************************/
    /*Obtener los datos de configuracion del sistema*/
    /************************************************/
	
		$sql = "SELECT 
					   Nombre_Session_Conf, 
					   Direccion_Carpeta_Conf, 
					   Direccion_Web_Conf, 
					   Llave_Encriptacion_Conf,
					   Cantidad_Registros_Conf
				   FROM tab_configuracion
				   WHERE Id_Conf = 1";
		$res_principal = seleccion($sql);
		
		//Variables
		$dominio = $res_principal[0]['Direccion_Web_Conf'];
		$ruta = $res_principal[0]['Direccion_Carpeta_Conf'];
		$nom_session = $res_principal[0]['Nombre_Session_Conf'];
		$llave_encrip = $res_principal[0]['Llave_Encriptacion_Conf'];


    /****************************************/
    /****** recibimos los datos  ************/
    /****************************************/
	/* Paso 1: Incluir libreria de encriptación */
	include("Include/Autenticacion/encriptacion.php");
	
    //obtener el parametro de cedula encriptada y la contraseña
	$cedula_encriptada = (isset($_GET['usuario'])) ? $_GET['usuario'] : '';
	$contrasena = (isset($_GET['contrasena'])) ? $_GET['contrasena'] : '';
	$pregunta= (isset($_GET['pregunta'])) ? $_GET['pregunta'] : '';
	$respuesta = (isset($_GET['respuesta'])) ? $_GET['respuesta'] : '';
	$TI = (isset($_GET['TI'])) ? $_GET['TI'] : '';
    
	 //Desencriptamos la cedula
    $cedula = desencriptar($cedula_encriptada,$llave_encrip);
	
	
	
	/****************************************/
    /* verificamos si el usuario existe *****/
    /****************************************/
	//obtenemos los datos de la persona para saber si existe y esta activa
	$sql = "SELECT Id_Per, Activo_Per FROM tab_personas WHERE Cedula_Per = '".$cedula_encriptada."' AND Tipo_Identificacion_Per='".$TI."'";
	$persona = seleccion($sql);
	
	//La persona no existe saquelo
	if($persona[0]['Id_Per']==''){
		echo "e1";	
		exit;
	//Verificamnos si la persona esta activa	
	}elseif($persona[0]['Activo_Per']!=1){
		echo "e2";
		exit;
	}else{
		//Consultamos si la persona tiene derechos de usuario en el sistema
		$sql = "SELECT Id_Per_Usu,Activo_Usu, Nombre_Session_Usu,Estado_Conexion_Usu FROM tab_usuarios WHERE Id_Per_Usu =".$persona[0]['Id_Per'];
		$usuario = seleccion($sql);
		
		//Si NO es un usuario
		if($usuario[0]['Id_Per_Usu']==''){
			echo "e3";
			exit;
		//No es usuario activo en el sistema		
		}elseif($usuario[0]['Activo_Usu'] != '1'){
			echo "e4";
			exit;
		}else{
			
			/*******************************************************************************/
			/**************  Comprobar relacion usuario, clave y estado de logeo  **********/
			/*******************************************************************************/
			$sql = "SELECT Id_Per_Usu
                        FROM tab_usuarios
                        INNER JOIN tab_personas ON (Id_Per = Id_Per_Usu)
                        WHERE Cedula_Per='".$cedula_encriptada."'
                        AND Password_Usu = '".$contrasena."'";
			$res_contra=seleccion($sql);
			if($res_contra[0]['Id_Per_Usu']==''){
				echo "e5";
				exit;
			}else{
				$sql ="SELECT Id_Per_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$usuario[0]['Id_Per_Usu']." AND Id_Preg_Usu=".$pregunta." AND Respuesta_Preg_Usu='".$respuesta."'";
				$res_preg = seleccion($sql);
				if($res_preg[0]['Id_Per_Usu']!=''){
					//destruimos los datos de conexión del usuario
					$sql = "UPDATE tab_usuarios SET Estado_Conexion_Usu = 0, Fecha_Hora_Conexion_Usu=NULL, Key_Usu = NULL, Nombre_Session_Usu = NULL, URL_Usu = NULL 
							WHERE Id_Per_Usu = ".$usuario[0]['Id_Per_Usu'];
					$destroy = transaccion($sql);			
					if($destroy[0]==1){
						echo 1;
					}	
				}else{
					echo "e6";
					exit;
				}
					
			}
			
			
		}
	}
	
 
       
?>
