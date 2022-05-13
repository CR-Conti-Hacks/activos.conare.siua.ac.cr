<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Cont_Mod 		= (isset($_GET['Id_Cont_Mod'])) ? $_GET['Id_Cont_Mod'] : '';
	
	
	
	$sql = "UPDATE tab_control_modulos SET Activo_Cont_Mod = '0' WHERE Id_Cont_Mod = ".$Id_Cont_Mod;
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