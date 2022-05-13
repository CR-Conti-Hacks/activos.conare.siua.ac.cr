<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	$valor = $_GET['valor'];
	
	$sql ="SELECT Imagen_PI FROM tab_plantillas_inscripcion WHERE Id_PI = ".$valor;
	$res = seleccion($sql);
	
	echo $res[0]['Imagen_PI'];
		
?>