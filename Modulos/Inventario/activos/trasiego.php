<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) 			? $_GET['mostrar_efecto'] 			: '';
	

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Trasiego de Activos</span>
</div>


<style>
	input,select,textarea{
		width: 90%;
	}
</style>
<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width40P" >
		<tr><th colspan="2" class="centrado">Paso1: Seleccione la nueva ubicación  de los activos:</th></tr>
		<tr>
			<td>Ubi. Nueva</td>
			<td>
				<select id="Id_Zonas_tmp_Act" name="Id_Zonas_tmp_Act">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Zonas_tmp,Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Activo_Zonas_tmp = '1' ORDER BY Nombre_Zonas_tmp ";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Zonas_tmp']?>"><?=$res[$i]['Nombre_Zonas_tmp']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Paso2: Digite el motivo del cambio de ubicación:</th></tr>
		<tr id="filaMotivoCambioubicacion">
			<td>Motivo de cambio:</td>
			<td>
				<textarea name="motivoCambioUbicacion" id="motivoCambioUbicacion" rows="5"></textarea>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Paso3: Estableca si desea enviar correo de trasiego:</th></tr>
		<tr>
			<td>Enviar correo trasiego:</td>
			<td class="centrado">
				<input name="enviarCorreoTrasiego" id="enviarCorreoTrasiego"  class="cmn-toggle cmn-toggle-round centrado" type="checkbox" checked="checked" />
				
				<label for="enviarCorreoTrasiego" class="centrado"></label>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Paso4: Digite o escanee los códigos de activos SIUA:</th></tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<input type="text" name="Id_Act" id="Id_Act" maxlength="10" onkeypress="ENTER(event,'trasiegoAgregaActivoSIUA()')" placeholder="Digite el activo siua..." class="trasiegoInputEscanear" />
			</td>
	
		</tr>
	</table>
	<!-- ****************************************************************************************** -->
	<!-- **************************       BOTONES      ******************************************** -->
	<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="trasiegoGuardar()" >Trasegar</button>

	</div>	

	<div class="trasiegoContenedor">
		<h3 class="trasiegoTituloLista">Lista de activos a trasegar</h3>
		<div class="trasiegoSubtituloLista">
			<div class="trasiegoColumnaTituloFoto">
				Foto
			</div>
			<div class="trasiegoColumnaTituloId">
				Id Activo
			</div>
			<div class="trasiegoColumnaTituloNombre">
				Nombre
			</div>
			<div class="trasiegoColumnaTituloSerie">
				Serie
			</div>
			<div class="trasiegoColumnaTituloMarca">
				Marca
			</div>
			<div class="trasiegoColumnaTituloModelo">
				Modelo
			</div>
			<div class="trasiegoColumnaTituloUni">
				Institución
			</div>
			<div class="trasiegoColumnaTituloUni">
				Eliminar
			</div>
		</div>
		<div id="trasiegoListaActivos">
			
		</div>
	</div>


	

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="trasiegoGuardar()" >Trasegar</button>

	</div>		
		

	
<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('Id_Zonas_tmp_Act').focus();



		$('#Id_Zonas_tmp_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la nueva ubicación de los activos"
		});
		$('#motivoCambioUbicacion').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el motivo del trasiego "
		});
		$('#Id_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de activo SIUA"
		});


		
		
</script>
