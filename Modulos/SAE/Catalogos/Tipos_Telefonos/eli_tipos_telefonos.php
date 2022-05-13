<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Tip_Tel      	= (isset($_GET['Id_Tip_Tel'])) ? $_GET['Id_Tip_Tel'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_tip_tel			= (isset($_GET['bs_nom_tip_tel'])) ? $_GET['bs_nom_tip_tel'] : '';
	$or_nom_TipoTele		= (isset($_GET['or_nom_TipoTele'])) ? $_GET['or_nom_TipoTele'] : '';
	$or_nom_TipoTele_tipo	= (isset($_GET['or_nom_TipoTele_tipo'])) ? $_GET['or_nom_TipoTele_tipo'] : '';
	/***************************************************************************/
    
    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Tip_Tel, Nombre_Tip_Tel FROM tab_tipos_telefonos WHERE Id_Tip_Tel = ".$Id_Tip_Tel;
    $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Tip_Tel" name="Id_Tip_Tel" value="<?= $Id_Tip_Tel?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_tip_tel" name="bs_nom_tip_tel" value="<?=$bs_nom_tip_tel?>" />
    <input type="hidden" id="or_nom_TipoTele" name="or_nom_TipoTele" value="<?=$or_nom_TipoTele?>" />
    <input type="hidden" id="or_nom_TipoTele_tipo" name="or_nom_TipoTele_tipo" value="<?=$or_nom_TipoTele_tipo?>" />

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['TITULO_Eliminar_Tipos_Telefonos'] ?></h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_el'].$texto['Tipo_Telefono'] ?> :</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_Tip_Tel']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarTipTel()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    