<?php
	/***************************************************************************/
	/********************** SEGURIDAD  GESTOR BD *******************************/
	/***************************************************************************/
	header('Content-Type: text/html; charset=UTF-8');
	header("Cache-Control: no-cache, must-revalidate");
	$path = '';
	include($path."Include/Bd/bd.php");
	include($path."Include/Autenticacion/encriptacion.php");
	if(isset($_GET['Id_Per_Usu'])){
		//Obtenemos la llave de encriptación
	    $sql = "SELECT Llave_Encriptacion_Conf FROM tab_configuracion WHERE Id_Conf = 1";
		$llave = seleccion($sql);
     	$llave_encrip  = $llave[0]['Llave_Encriptacion_Conf'];
			
			
		//parametros globales	
		$Id_Per_Usu = desencriptar($_GET['Id_Per_Usu'],$llave_encrip);
		$cedula_global = desencriptar($_GET['cedula_global'],$llave_encrip);
		$Key_Usu = $_GET['Key_Usu'];
	}
	include($path."Include/Session/Comprueba_Key.php");
	include($path."Include/Session/ControlTiempoSession.php");
	/***************************************************************************/
	/************************** FIN SEGURIDAD  *********************************/
	/***************************************************************************/
				
				/*obtener el nombre de la session*/
				$sql="SELECT Nombre_Session_Usu,key_Usu
					FROM tab_usuarios 
					WHERE Id_Per_Usu=".$Id_Per_Usu;
				$res=seleccion($sql);
				
				if($res[0]['Nombre_Session_Usu']!=''){
                    /*Eliminar Datos de Conexion de usuario*/
                    $sql = "UPDATE tab_usuarios SET Estado_Conexion_Usu = 0, Fecha_Hora_Conexion_Usu=NULL, Key_Usu = NULL, Nombre_Session_Usu = NULL, URL_Usu = NULL 
                                  WHERE Id_Per_Usu = ".$Id_Per_Usu;
                    $res = transaccion($sql);	
                                    
                    if($res[0] == 1){
                            //Destuir la session
                        $_SESSION = array();
                        session_unset(); 
                        session_destroy();											
                    }
                }
              
		

?>