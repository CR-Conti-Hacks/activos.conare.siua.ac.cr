<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Factu		= (isset($_GET['Id_Factu'])) ? $_GET['Id_Factu'] : '';
	
	
	
	$sql = "UPDATE tab_facturas SET Activo_Factu = '0' WHERE Id_Factu = ".$Id_Factu;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>