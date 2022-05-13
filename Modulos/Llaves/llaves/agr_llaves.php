<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	/*$or_nom_compromiso			= (isset($_GET['or_nom_compromiso'])) ? $_GET['or_nom_compromiso'] : '';
	$or_nom_compromiso_tipo 	= (isset($_GET['or_nom_compromiso_tipo'])) ? $_GET['or_nom_compromiso_tipo'] : '';
	$bs_nom_compromiso			= (isset($_GET['bs_nom_compromiso'])) ? $_GET['bs_nom_compromiso'] : '';*/
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Llaves</span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<!--input type="hidden" id="bs_nom_compromiso" name="bs_nom_compromiso" value="<?//=$bs_nom_compromiso?>" />
<input type="hidden" id="or_nom_compromiso" name="or_nom_compromiso" value="<?//=$or_nom_compromiso?>" />
<input type="hidden" id="or_nom_compromiso_tipo" name="or_nom_compromiso_tipo" value="<?//=$or_nom_compromiso_tipo?>" /-->

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width20P" >
		<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
		<tr>
			<td>Fotografía:</td>
			<td >
				<div style="width: 85%;" >
					<input type="file" id="Foto_lla" name="Foto_lla" class="dropify" data-default-file="" data-height="100" />    
				</div>
			</td>
		</tr>
		<tr>
			<td>Nombre:</td>
			<td>
				<input type="text" name="txt_nombre_lla" id="txt_nombre_lla" maxlength="100" onkeypress="ENTER(event,'agregarLlave()');" placeholder="Digite el nombre..."  />
			</td>
		</tr>
		<tr>
			<td>Descripción:</td>
			<td class="centrado">
				<span class="gris font06">( el tamaño maximo del texto 300 es de caracteres )</span>
				<br/>
				<input readonly type=text name="tam_desc_lla" id="tam_desc_lla" size=3 maxlength=3 value="300" class="width50 gris">
				<br />
				<textarea id="txt_descripcion_lla" name="txt_descripcion_lla" class="width350 height250" 
				onKeyDown="validaCantidadTexArea('txt_descripcion_lla','tam_desc_lla',300);"
				onKeyUp="validaCantidadTexArea('txt_descripcion_lla','tam_desc_lla',300);"
				placeholder="Digite la descripción.."></textarea>
			</td>
		</tr>
		<tr>
			<td>Espacio:</td>
			<td>
				<input type="text" name="txt_espacio_lla" id="txt_espacio_lla" maxlength="2" onkeypress="return ENTER_soloNumeros(event,'agregarLlave()');" placeholder="Digite el espacio..."  />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarLlave()" >Guardar</button>
		
		<?php if(in_array("10003",$_SESSION['Permisos'])){ ?>
			<!--button class="boton" onclick="CargaPaginaMenu('Modulos/Llaves/llaves/con_llaves.php',
													   'bs_nom_compromiso;or_nom_compromiso;or_nom_compromiso_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_compromiso').value+';'+
													   document.getElementById('or_nom_compromiso').value+';'+
													   document.getElementById('or_nom_compromiso_tipo').value+';1;')" ><?//=$texto['Regresar']?></button-->
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
			$('.dropify').dropify();
			
			document.getElementById('txt_nombre_lla').focus();
			$('#Foto_lla').darkTooltip({
				  opacity:0.9,
				  size: 'large',
				  animation:'flipIn',
				  gravity:'west', // 
				  confirm:false,
				  theme:'dark',
				  content: "Seleccione una Fotografía"
			});
			$('#txt_nombre_lla').darkTooltip({
				  opacity:0.9,
				  size: 'large',
				  animation:'flipIn',
				  gravity:'west', // 
				  confirm:false,
				  theme:'dark',
				  content: "Digite el nombre"
			});
			$('#txt_descripcion_lla').darkTooltip({
				  opacity:0.9,
				  size: 'large',
				  animation:'flipIn',
				  gravity:'west', // 
				  confirm:false,
				  theme:'dark',
				  content: "Digite una descripción"
			});
			$('#txt_espacio_lla').darkTooltip({
				  opacity:0.9,
				  size: 'large',
				  animation:'flipIn',
				  gravity:'west', // 
				  confirm:false,
				  theme:'dark',
				  content: "Digite el espacio en el casillero"
			});
				
			
</script>