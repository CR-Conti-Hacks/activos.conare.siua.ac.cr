<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Compr      		        = (isset($_GET['Id_Compr'])) ? $_GET['Id_Compr'] : '';
	$pagina 				    = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				    = (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_compromiso			= (isset($_GET['bs_nom_compromiso'])) ? $_GET['bs_nom_compromiso'] : '';
	$or_nom_compromiso			= (isset($_GET['or_nom_compromiso'])) ? $_GET['or_nom_compromiso'] : '';
	$or_nom_compromiso_tipo		= (isset($_GET['or_nom_compromiso_tipo'])) ? $_GET['or_nom_compromiso_tipo'] : '';
	/***************************************************************************/
    
    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Compr, Numero_Compr FROM tab_compromisos WHERE Id_Compr = ".$Id_Compr;
    $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Compr" name="Id_Compr" value="<?= $Id_Compr?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_compromiso" name="bs_nom_compromiso" value="<?=$bs_nom_compromiso?>" />
    <input type="hidden" id="or_nom_compromiso" name="or_nom_compromiso" value="<?=$or_nom_compromiso?>" />
    <input type="hidden" id="or_nom_compromiso_tipo" name="or_nom_compromiso_tipo" value="<?=$or_nom_compromiso_tipo?>" />

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Eliminar Compromiso</h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_el']?> Compromiso:</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Numero_Compr']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarCompromiso()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    