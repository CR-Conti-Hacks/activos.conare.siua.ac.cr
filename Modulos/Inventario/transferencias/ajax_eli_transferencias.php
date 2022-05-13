<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Trans		= (isset($_GET['Id_Trans'])) ? $_GET['Id_Trans'] : '';
	
	
	
	$sql = "UPDATE tab_transferencias SET Activo_Trans = '0' WHERE Id_Trans = ".$Id_Trans;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>