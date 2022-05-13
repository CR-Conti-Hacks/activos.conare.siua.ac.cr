<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Parti      		    = (isset($_GET['Id_Parti'])) ? $_GET['Id_Parti'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_partida			= (isset($_GET['bs_nom_partida'])) ? $_GET['bs_nom_partida'] : '';
	$or_nom_partida			= (isset($_GET['or_nom_partida'])) ? $_GET['or_nom_partida'] : '';
	$or_nom_partida_tipo	= (isset($_GET['or_nom_partida_tipo'])) ? $_GET['or_nom_partida_tipo'] : '';
	/***************************************************************************/
    
    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Parti, Numero_Parti FROM tab_partidas WHERE Id_Parti = ".$Id_Parti;
    $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Parti" name="Id_Parti" value="<?= $Id_Parti?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_partida" name="bs_nom_partida" value="<?=$bs_nom_partida?>" />
    <input type="hidden" id="or_nom_partida" name="or_nom_partida" value="<?=$or_nom_partida?>" />
    <input type="hidden" id="or_nom_partida_tipo" name="or_nom_partida_tipo" value="<?=$or_nom_partida_tipo?>" />

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Eliminar Partida</h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_la']?> Partida:</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Numero_Parti']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarPartida()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    