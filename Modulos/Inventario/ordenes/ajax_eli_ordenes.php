<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_OC		= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '';
	
	
	
	$sql = "UPDATE tab_ordenes_compras SET Activo_OC = '0' WHERE Id_OC = ".$Id_OC;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>