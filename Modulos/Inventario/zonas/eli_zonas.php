<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Zonas_tmp      		= (isset($_GET['Id_Zonas_tmp'])) ? $_GET['Id_Zonas_tmp'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_zona			= (isset($_GET['bs_nom_zona'])) ? $_GET['bs_nom_zona'] : '';
	$or_nom_zona			= (isset($_GET['or_nom_zona'])) ? $_GET['or_nom_zona'] : '';
	$or_nom_zona_tipo		= (isset($_GET['or_nom_zona_tipo'])) ? $_GET['or_nom_zona_tipo'] : '';
	/***************************************************************************/
    
    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Zonas_tmp, Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Id_Zonas_tmp = ".$Id_Zonas_tmp;
    $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Zonas_tmp" name="Id_Zonas_tmp" value="<?= $Id_Zonas_tmp?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_zona" name="bs_nom_zona" value="<?=$bs_nom_zona?>" />
    <input type="hidden" id="or_nom_zona" name="or_nom_zona" value="<?=$or_nom_zona?>" />
    <input type="hidden" id="or_nom_zona_tipo" name="or_nom_zona_tipo" value="<?=$or_nom_zona_tipo?>" />

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Eliminar Zona</h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_la']?> Zona:</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_Zonas_tmp']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarZona()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    