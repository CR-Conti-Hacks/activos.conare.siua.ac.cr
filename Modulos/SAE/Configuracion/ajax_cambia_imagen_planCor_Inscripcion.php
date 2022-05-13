<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	$valor = $_GET['valor'];
	
	$sql ="SELECT Imagen_PlanCor FROM tab_plantillas_correos WHERE Id_PlanCor = ".$valor;
	$res = seleccion($sql);
	
	echo $res[0]['Imagen_PlanCor'];
		
?>