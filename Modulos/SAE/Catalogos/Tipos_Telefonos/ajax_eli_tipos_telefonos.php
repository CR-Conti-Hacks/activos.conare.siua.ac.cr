<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Tip_Tel 		= (isset($_GET['Id_Tip_Tel'])) ? $_GET['Id_Tip_Tel'] : '';
	
	
	
	$sql = "UPDATE tab_tipos_telefonos SET Activo_Tip_Tel = '0' WHERE Id_Tip_Tel = ".$Id_Tip_Tel;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>