<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$Id_Rol      		= (isset($_GET['Id_Rol'])) ? $_GET['Id_Rol'] : '';
	$or_nom_per 		= (isset($_GET['or_nom_per'])) ? $_GET['or_nom_per'] : '';
	$or_nom_per_tipo 	= (isset($_GET['or_nom_per_tipo'])) ? $_GET['or_nom_per_tipo'] : 'ASC';
	$bs_nom_per			= (isset($_GET['bs_nom_per'])) ? $_GET['bs_nom_per'] : '';
	/***************************************************************************/
	
	/***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
	$sql = "SELECT Nombre_Rol FROM tab_roles WHERE Id_Rol = ".$Id_Rol;
	$res = seleccion($sql);
	

	/***************************************************************************/
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
	<h3><?= $texto['TITULO_mod_perfil'] ?></h3>
	<br />
	<br />
	<div>
		<!-- ****************************************************************************************** -->
		<!-- **************************       FORM         ******************************************** -->
		<!-- ****************************************************************************************** -->
			<table class="centrado width600" >
				<tr>
					<td><?=$texto['Nombre_Perfil']?></td>
					<td>
						<input type="text" name="txt_nombre" id="txt_nombre" maxlength="50" onKeyPress="return ENTER_soloTexto(event,'modificarPerfil()')"  value="<?=$res[0]['Nombre_Rol']?>"  placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre']?>" />
					</td>
				</tr>
			</table>
		<!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
			<br/>
			<br/>
			<div class="centrado">
				<button class="boton" onclick="modificarPerfil()" ><?=$texto['Guardar']?></button>
				<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
			</div>
		
	</div>
<script>
		$('#txt_nombre').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Digite_Nombre']?>"
		});
		document.getElementById('txt_nombre').focus();
</script>

