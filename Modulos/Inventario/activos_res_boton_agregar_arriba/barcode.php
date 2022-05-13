<?php
    require("barcode.inc.php");
 
	$encode="CODE39";
	$nombre=$_REQUEST['nombre'];
	$bar= new BARCODE();
	
	if($bar==false)
		die($bar->error());


	$barnumber=$_REQUEST['bdata'];
	
	$bar->setSymblogy($encode);
	$bar->setHeight(50);
	$bar->setScale(2);
	$bar->setHexColor("000000","FFFFFF");


	$return = $bar->genBarCode($barnumber,"png",$nombre);
	//if($return==false)
		//$bar->error(true);
	
?>