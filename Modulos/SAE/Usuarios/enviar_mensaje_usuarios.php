<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/****************************PARAMETROS  ***********************************/
	$Id_Usuario 				= (isset($_GET['Id_Usuario'])) ? $_GET['Id_Usuario'] : '';
	

	
	/***************************************************************************/
	
	/****************************     SQL    ***********************************/
	$sql = "SELECT Nombre_Per, Apellido1_Per, Apellido2_Per FROM tab_personas WHERE Id_Per = ".$Id_Usuario;
	$res = seleccion($sql);
	
	/***************************************************************************/
	
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Usuario" name="Id_Usuario" value="<?= $Id_Usuario?>" />

	

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['Enviar_Mensaje'] ?></h3>
	<br />
	<br />
	<div>
		<!-- ****************************************************************************************** -->
		<!-- **************************       FORM         ******************************************** -->
		<!-- ****************************************************************************************** -->
			<table class="centrado width600 font09" >
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca width150" ><?=$texto['Diseno']?>:</td>
					<td class="centrado">
						 <select name="sl_diseno" id="sl_diseno" onchange="Habilita_Efecto()">
							<option value="0"><?=$texto['Seleccione']?></option>
							<option value="growl"><?=$texto['Tipo']?> 1</option>
							<option value="attached"><?=$texto['Tipo']?> 2</option>
							<option value="bar"><?=$texto['Tipo']?> 3 <?= $texto['No_Tiene_Cerrar']?></option>
							<option value="other"><?=$texto['Tipo']?> 4</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Efecto']?>:</td>
					<td class="centrado">
						<select name="sl_efecto" id="sl_efecto" disabled="disabled" onchange="cambia_efecto()">
							<option value="0"><?=$texto['Seleccione']?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Tipo']?>:</td>
					<td class="centrado">
						<select name="sl_tipo" id="sl_tipo">
							<option value=""><?=$texto['Ninguno']?></option>
							<option value="notice"><?=$texto['Noticia']?></option>
							<option value="warning"><?=$texto['Advertencia']?></option>
							<option value="error"><?=$texto['Error']?></option>
							<option value="success"><?=$texto['Exito']?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Tiempo']?>:</td>
					<td class="centrado">
						<input type="text" name="txt_tiempo" id="txt_tiempo" value="6000" onKeyPress="return soloNumeros(event)"/>
						<br />
						
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Mensaje']?>:</td>
					<td class="centrado">
						<span class="gris font06"><?=$texto['500_Caracteres']?></span>
						<br/>
						<input readonly type=text name="tam_men" id="tam_men" size=3 maxlength=3 value="500" class="width50 gris">
						<br />
						<textarea id="txt_men" name="txt_men" class="width300 height150" 
							onKeyDown="validaCantidadTexArea('txt_men','tam_men',500);" onKeyUp="validaCantidadTexArea('txt_men','tam_men',500);"></textarea>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Ver_Ejemplo']?>:</td>
					<td class="centrado">
						<a onclick="MostrarOcultar('txt_ejemplo')">>><?=$texto['Haga_clic_aqui']?><<</a>
						<br />
						<br />
						<code id="txt_ejemplo" name="txt_ejemplo" class="font08 gris" style="display: none;"></code>
					</td>
				</tr>
			</table>
		<!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
			<br/>
			<br/>
			<div class="centrado">
				<button class="boton" onclick="GuardaMensajeUsuario()" ><?=$texto['Guardar']?></button>
				<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
			</div>
		
	</div>
<script>
	 //Ayuda Logo Imagen
		 $('#txt_tiempo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Tiempo_IMU']?>"
		  });
</script>

