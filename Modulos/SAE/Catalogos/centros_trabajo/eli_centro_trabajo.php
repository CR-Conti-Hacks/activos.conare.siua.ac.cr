<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        $Id_CT = $_GET['Id_CT'];
		$or_nom_ct 		= $_GET['or_nom_ct'];
		$or_nom_ct_tipo 	= $_GET['or_nom_ct_tipo'];
		$bs_nom_ct		= $_GET['bs_nom_ct'];
        $or_dim_ct 		= $_GET['or_dim_ct'];
		$or_dim_ct_tipo 	= $_GET['or_dim_ct_tipo'];
		$bs_dim_ct		= $_GET['bs_dim_ct'];
        $sql= "SELECT Nombre_CT FROM tab_centros_trabajos WHERE Id_CT = ".$Id_CT;
        $res = seleccion($sql);
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_CT" name="Id_CT" value="<?= $Id_CT?>" />
	<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
	<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
	<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />
    <input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />
	<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
	<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />


	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['TITULO_Eliminar_CT'] ?></h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia">
	<br />
	<span class="font10" ><?= $texto['Esta_Seguro_el'].$texto['Centro_Trabajo'] ?> :</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_CT']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarCT()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    