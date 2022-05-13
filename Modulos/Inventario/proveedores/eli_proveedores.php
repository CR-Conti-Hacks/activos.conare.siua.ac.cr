<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Prove      		        = (isset($_GET['Id_Prove'])) ? $_GET['Id_Prove'] : '';
	$pagina 				    = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				    = (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_proveedore			= (isset($_GET['bs_nom_proveedore'])) ? $_GET['bs_nom_proveedore'] : '';
	$or_nom_proveedore			= (isset($_GET['or_nom_proveedore'])) ? $_GET['or_nom_proveedore'] : '';
	$or_nom_proveedore_tipo		= (isset($_GET['or_nom_proveedore_tipo'])) ? $_GET['or_nom_proveedore_tipo'] : '';
	/***************************************************************************/
    
    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Prove, Nombre_Prove FROM tab_proveedores WHERE Id_Prove = ".$Id_Prove;
    $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Prove" name="Id_Prove" value="<?= $Id_Prove?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_proveedore" name="bs_nom_proveedore" value="<?=$bs_nom_proveedore?>" />
    <input type="hidden" id="or_nom_proveedore" name="or_nom_proveedore" value="<?=$or_nom_proveedore?>" />
    <input type="hidden" id="or_nom_proveedore_tipo" name="or_nom_proveedore_tipo" value="<?=$or_nom_proveedore_tipo?>" />

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Eliminar Proveedor</h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_el']?> Proveedor:</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_Prove']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarProveedor()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    