<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Zonas_tmp		= (isset($_GET['Id_Zonas_tmp'])) ? $_GET['Id_Zonas_tmp'] : '';
	
	
	
	$sql = "UPDATE tab_zonas_tmp SET Activo_Zonas_tmp = '0' WHERE Id_Zonas_tmp = ".$Id_Zonas_tmp;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>