<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
        $Id_Rol = $_GET['Id_Rol'];
		$or_nom_per 		= $_GET['or_nom_per'];
		$or_nom_per_tipo 	= $_GET['or_nom_per_tipo'];
		$bs_nom_per			= $_GET['bs_nom_per'];
        $sql= "SELECT Id_Rol, Nombre_Rol FROM tab_roles WHERE Id_Rol = ".$Id_Rol;
        $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Rol" name="Id_Rol" value="<?= $Id_Rol?>" />
	<input type="hidden" id="bs_nom_per" name="bs_nom_per" value="<?=$bs_nom_per?>" />
	<input type="hidden" id="or_nom_per" name="or_nom_per" value="<?=$or_nom_per?>" />
	<input type="hidden" id="or_nom_per_tipo" name="or_nom_per_tipo" value="<?=$or_nom_per_tipo?>" />

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['TITULO_eli_perfil'] ?></h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_el'].$texto['Perfil'] ?> :</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_Rol']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarPerfil()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    