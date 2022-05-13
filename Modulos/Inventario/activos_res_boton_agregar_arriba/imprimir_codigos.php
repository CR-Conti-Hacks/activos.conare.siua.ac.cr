<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

    /****************************PARAMETROS  ***********************************/
	$Id_Act     		        = (isset($_GET['Id_Act'])) 			        ? $_GET['Id_Act'] 			        : '';

	$sql = "SELECT Dominio_InvConf FROM tab_inventario_configuracion WHERE Id_InvConf = 1";
	$res_dominio_inventario = seleccion($sql);

	$dominio_inventario = '';
	if($res_dominio_inventario[0]["Dominio_InvConf"] !=''){
		$dominio_inventario	 = $res_dominio_inventario[0]["Dominio_InvConf"];
	}else{
		echo "error: no existe dominio para impresion de inventario";
		$dominio_inventario = $dominio.$ruta;
		exit;
	}


	/****************************************************************************/
	/*************************** Codigos de barras ******************************/
	/****************************************************************************/
	require("barcode.inc.php");

	$encode="CODE39";
	$nombre="SIUA-".$Id_Act;
	$bar= new BARCODE();

	if($bar==false)
		die($bar->error());


	$barnumber=$Id_Act;

	$bar->setSymblogy($encode);
	$bar->setHeight(50);
	$bar->setScale(2);
	$bar->setHexColor("#000000","#FFFFFF");


	$bar->genBarCode($barnumber,"png",$nombre);

	/****************************************************************************/
	/***************************    Codigos QR     ******************************/
	/****************************************************************************/
	require ('lib/phpqrcode/qrlib.php') ;

	QRcode::png($dominio_inventario."/index.php?Id_Act=".$Id_Act, "codigos/qr/qr_".$nombre.".png", "L", 4, 4);


	/*Quitar el https por http*/

	$dominio_https = str_replace("https", "http", $dominio);
?>
	<h3>Imprimir Activos</h3>
	<br />

	<input type="hidden" id="Id_Act" name="Id_Act" value="<?=$Id_Act?>" />
<div class="centrado">
	    <div style="width: 100%; margin: 0 auto; ">
			<div style="width: 49%;display: inline-block; vertical-align: top;">
				<h3 style="font-size: 1.5rem;"><?=$texto['Codigo_QR']?></h3>
				<img src='<?=$dominio.$ruta?>Modulos/Inventario/activos/codigos/qr/qr_<?=$nombre.".png"?>'>
				<br>
				<button onclick="abrirVentanaImpresion('QR');">Imprimir</button>
			</div>
			<div style="width: 49%;display: inline-block;vertical-align: top;">
				<h3 style="font-size: 1.5rem;"><?=$texto['Codigo_Barras']?></h3>
				<img src='<?=$dominio.$ruta?>Modulos/Inventario/activos/codigos/barras/<?=$nombre.".png"?>'>
				<br>
				<button onclick="abrirVentanaImpresion('BARRAS');">Imprimir</button>
			</div>

		</div>





	<br/>
	<br/>

	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>


<script>
	function abrirVentanaImpresion(tipo){
		//obtener valores
		var dominio 		= document.getElementById("dominio").value;
		var ruta	 		= document.getElementById("ruta").value;
		var direccion 		= "Modulos/Inventario/activos/";
		var cedula_global 	= document.getElementById("cedula_global").value;
		var Id_Per_Usu 		= document.getElementById("Id_Per_Usu").value;
		var Key_Usu 		= document.getElementById("Key_Usu").value;
		var Id_Act 			= document.getElementById("Id_Act").value;
		var pagina = '';
		if(tipo=="QR"){
			pagina ="imprime_qr.php";
		}else if(tipo=="BARRAS"){
			pagina ="imprime_barras.php";
		}

		var ventana = dominio+ruta+direccion+pagina+"?Id_Act="+Id_Act+"&cedula_global="+cedula_global+"&Id_Per_Usu="+Id_Per_Usu+"&Key_Usu="+Key_Usu;

		window.open(ventana, '_blank', 'width=400,height=400');
	}
</script>
