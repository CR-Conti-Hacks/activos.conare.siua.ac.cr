<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Parti		= (isset($_GET['Id_Parti'])) ? $_GET['Id_Parti'] : '';
	
	
	
	$sql = "UPDATE tab_partidas SET Activo_Parti = '0' WHERE Id_Parti = ".$Id_Parti;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>