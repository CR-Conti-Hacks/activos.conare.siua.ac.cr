<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Trans      		= (isset($_GET['Id_Trans'])) ? $_GET['Id_Trans'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_transferencia			= (isset($_GET['bs_nom_transferencia'])) ? $_GET['bs_nom_transferencia'] : '';
	$or_nom_transferencia			= (isset($_GET['or_nom_transferencia'])) ? $_GET['or_nom_transferencia'] : '';
	$or_nom_transferencia_tipo		= (isset($_GET['or_nom_transferencia_tipo'])) ? $_GET['or_nom_transferencia_tipo'] : '';
	/***************************************************************************/
    
    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Trans, Numero_Trans FROM tab_transferencias WHERE Id_Trans = ".$Id_Trans;
    $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Trans" name="Id_Trans" value="<?= $Id_Trans?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_transferencia" name="bs_nom_transferencia" value="<?=$bs_nom_transferencia?>" />
    <input type="hidden" id="or_nom_transferencia" name="or_nom_transferencia" value="<?=$or_nom_transferencia?>" />
    <input type="hidden" id="or_nom_transferencia_tipo" name="or_nom_transferencia_tipo" value="<?=$or_nom_transferencia_tipo?>" />

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Eliminar Transferencia</h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_la']?> Transferencia:</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Numero_Trans']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarTransferencia()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    