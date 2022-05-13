<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Act		= (isset($_GET['Id_Act'])) ? $_GET['Id_Act'] : '';
	
	
	
	$sql = "UPDATE tab_Activos SET Activo_Act = '0' WHERE Id_Act = ".$Id_Act;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>