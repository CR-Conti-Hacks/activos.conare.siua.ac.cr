<?php
	/*************************************************************************/
	/****************************SEGURIDAD ***********************************/
	/*************************************************************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	
	
	/*************************************************************************/
	/************************   PARAMETROS   *********************************/
	/*************************************************************************/
	$Id_Act		= (isset($_GET['Id_Act'])) ? $_GET['Id_Act'] : '';
	
	
	/*************************************************************************/
	/************************      SQL       *********************************/
	/*************************************************************************/
	$sql = "UPDATE tab_Activos SET Activo_Act = '0' WHERE Id_Act = ".$Id_Act;
	$res = transaccion($sql);	
		
	/*************************************************************************/
	/************************   RESULTADO    *********************************/
	/*************************************************************************/
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>