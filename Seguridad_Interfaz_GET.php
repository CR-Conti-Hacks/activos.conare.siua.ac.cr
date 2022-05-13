<?php
	/***************************************************************************/
	/**************************** SEGURIDAD  INTERFAZ **************************/
	/***************************************************************************/
	header('Content-Type: text/html; charset=UTF-8');
	header("Cache-Control: no-cache, must-revalidate");
	//Obtener los datos de configuracion del sistema
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
	}
	
	include($path."configuracion.php");
	
	include($path."Include/Session/ControlURLySession.php");
	include($path."Include/Session/ControlTiempoSession.php");
	/***************************************************************************/
	/************************** FIN SEGURIDAD  *********************************/
	/***************************************************************************/
?>
