<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Prove		= (isset($_GET['Id_Prove'])) ? $_GET['Id_Prove'] : '';
	
	
	
	$sql = "UPDATE tab_proveedores SET Activo_Prove = '0' WHERE Id_Prove = ".$Id_Prove;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>