<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        $Id_SZ = $_GET['Id_SZ'];
        $Id_Zon = $_GET['Id_Zon'];
        $Id_Uni = $_GET['Id_Uni'];
        $Id_CT = $_GET['Id_CT'];
        
		$or_nom_ct 		= $_GET['or_nom_ct'];
		$or_nom_ct_tipo 	= $_GET['or_nom_ct_tipo'];
		$bs_nom_ct		= $_GET['bs_nom_ct'];
        
        $or_dim_ct 		= $_GET['or_dim_ct'];
		$or_dim_ct_tipo 	= $_GET['or_dim_ct_tipo'];
		$bs_dim_ct		= $_GET['bs_dim_ct'];
        
        $or_nom_uni 		= $_GET['or_nom_uni'];
		$or_nom_uni_tipo 	= $_GET['or_nom_uni_tipo'];
		$bs_nom_uni		= $_GET['bs_nom_uni'];
        
        $or_dim_uni 		= $_GET['or_dim_uni'];
		$or_dim_uni_tipo 	= $_GET['or_dim_uni_tipo'];
		$bs_uni_ct		= $_GET['bs_dim_uni'];
        
        $or_nom_zon 		= $_GET['or_nom_zon'];
		$or_nom_zon_tipo 	= $_GET['or_nom_zon_tipo'];
		$bs_nom_zon		= $_GET['bs_nom_zon'];
        
        $or_dim_zon 		= $_GET['or_dim_zon'];
		$or_dim_zon_tipo 	= $_GET['or_dim_zon_tipo'];
		$bs_dim_zon		= $_GET['bs_dim_zon'];
        
        $or_nom_sz 		= $_GET['or_nom_sz'];
		$or_nom_sz_tipo 	= $_GET['or_nom_sz_tipo'];
		$bs_nom_sz		= $_GET['bs_nom_sz'];
        
        $or_dim_sz 		= $_GET['or_dim_sz'];
		$or_dim_sz_tipo 	= $_GET['or_dim_sz_tipo'];
		$bs_dim_sz		= $_GET['bs_dim_sz'];
        
        
        $sql= "SELECT Nombre_SZ FROM tab_sub_zona WHERE Id_SZ = ".$Id_SZ;
        $res = seleccion($sql);
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_SZ" name="Id_SZ" value="<?= $Id_SZ?>" />
    <input type="hidden" id="Id_Zon" name="Id_Zon" value="<?= $Id_Zon?>" />
    <input type="hidden" id="Id_Uni" name="Id_Uni" value="<?= $Id_Uni?>" />
    <input type="hidden" id="Id_CT" name="Id_CT" value="<?= $Id_CT?>" />
    
    <input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
	<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />
    <input type="hidden" id="bs_nom_uni" name="bs_nom_uni" value="<?=$bs_nom_uni?>" />
	<input type="hidden" id="bs_dim_uni" name="bs_dim_uni" value="<?=$bs_dim_uni?>" />
    <input type="hidden" id="bs_nom_zon" name="bs_nom_zon" value="<?=$bs_nom_zon?>" />
	<input type="hidden" id="bs_dim_zon" name="bs_dim_zon" value="<?=$bs_dim_zon?>" />
    <input type="hidden" id="bs_nom_sz" name="bs_nom_sz" value="<?=$bs_nom_sz?>" />
	<input type="hidden" id="bs_dim_sz" name="bs_dim_sz" value="<?=$bs_dim_sz?>" />
     
	<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
	<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
    <input type="hidden" id="or_nom_uni" name="or_nom_uni" value="<?=$or_nom_uni?>" />
	<input type="hidden" id="or_dim_uni" name="or_dim_uni" value="<?=$or_dim_uni?>" />
    <input type="hidden" id="or_nom_zon" name="or_nom_zon" value="<?=$or_nom_zon?>" />
	<input type="hidden" id="or_dim_zon" name="or_dim_zon" value="<?=$or_dim_zon?>" />
    <input type="hidden" id="or_nom_sz" name="or_nom_sz" value="<?=$or_nom_sz?>" />
	<input type="hidden" id="or_dim_sz" name="or_dim_sz" value="<?=$or_dim_sz?>" />
   
    <input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />
	<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />
    <input type="hidden" id="or_nom_uni_tipo" name="or_nom_uni_tipo" value="<?=$or_nom_uni_tipo?>" />
	<input type="hidden" id="or_dim_uni_tipo" name="or_dim_uni_tipo" value="<?=$or_dim_uni_tipo?>" />
    <input type="hidden" id="or_nom_zon_tipo" name="or_nom_zon_tipo" value="<?=$or_nom_zon_tipo?>" />
	<input type="hidden" id="or_dim_zon_tipo" name="or_dim_zon_tipo" value="<?=$or_dim_zon_tipo?>" />
    <input type="hidden" id="or_nom_sz_tipo" name="or_nom_sz_tipo" value="<?=$or_nom_sz_tipo?>" />
	<input type="hidden" id="or_dim_sz_tipo" name="or_dim_sz_tipo" value="<?=$or_dim_sz_tipo?>" />


	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['TITULO_Eliminar_SZ'] ?></h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia">
	<br />
	<span class="font10" ><?= $texto['Esta_Seguro_la'].$texto['Sub_Zona'] ?> :</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_SZ']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarSZ()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    