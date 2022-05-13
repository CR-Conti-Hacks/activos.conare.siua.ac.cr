<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Zon 		= (isset($_GET['Id_Zon'])) ? $_GET['Id_Zon'] : '';
	
	
	
	$sql = "UPDATE tab_zonas SET Activo_Zon = '0' WHERE Id_Zon = ".$Id_Zon;
	$res = transaccion($sql);	
		
	//SI Inserto correctamente la consulta
	if ($res[0]== 1){
		/********************** Guardar en Bitacora **********************/
		$hoy = date("d/m/Y").' '.date("H:i:s");
		$sql = 'INSERT INTO tab_bitacora (Fecha_Bita,Id_Per_Usu_Bita, SQL_Bita)
				VALUES ("'.$hoy.'","'.$Id_Per_Usu.'","'.$sql.'");';
		$res = transaccion($sql);
		/**********************************************************/
		echo 1;		
	}else{
		echo 2;
	}

?>