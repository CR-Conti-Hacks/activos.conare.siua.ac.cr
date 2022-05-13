<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Compr		= (isset($_GET['Id_Compr'])) ? $_GET['Id_Compr'] : '';
	
	
	
	$sql = "UPDATE tab_compromisos SET Activo_Compr = '0' WHERE Id_Compr = ".$Id_Compr;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>