<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        $Id_Cont_Mod = $_GET['Id_Cont_Mod'];
		$or_nom_cm 		= $_GET['or_nom_cm'];
		$or_nom_cm_tipo 	= $_GET['or_nom_cm_tipo'];
		$bs_nom_cm		= $_GET['bs_nom_cm'];
        $sql= "SELECT Nombre_Cont_Mod FROM tab_control_modulos WHERE Id_Cont_Mod = ".$Id_Cont_Mod;
        $res = seleccion($sql);
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Cont_Mod" name="Id_Cont_Mod" value="<?= $Id_Cont_Mod?>" />
	<input type="hidden" id="bs_nom_cm" name="bs_nom_cm" value="<?=$bs_nom_cm?>" />
	<input type="hidden" id="or_nom_cm" name="or_nom_cm" value="<?=$or_nom_cm?>" />
	<input type="hidden" id="or_nom_cm_tipo" name="or_nom_cm_tipo" value="<?=$or_nom_cm_tipo?>" />


	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['Titulo_Desactivar_CM'] ?></h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_des'].$texto['Modulo'] ?> :</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_Cont_Mod']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarCM()" ><?=$texto['Desactivar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    