<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     	= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_zona			= (isset($_GET['or_nom_zona'])) ? $_GET['or_nom_zona'] : '';
	$or_nom_zona_tipo 		= (isset($_GET['or_nom_zona_tipo'])) ? $_GET['or_nom_zona_tipo'] : '';
	$bs_nom_zona			= (isset($_GET['bs_nom_zona'])) ? $_GET['bs_nom_zona'] : '';
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Zona</span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_zona" name="bs_nom_zona" value="<?=$bs_nom_zona?>" />
<input type="hidden" id="or_nom_zona" name="or_nom_zona" value="<?=$or_nom_zona?>" />
<input type="hidden" id="or_nom_zona_tipo" name="or_nom_zona_tipo" value="<?=$or_nom_zona_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width20P" >
		<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
		<tr>
			<td>Nombre</td>
			<td>
				<input type="text" name="txt_zona" id="txt_zona" maxlength="100" onkeypress="ENTER(event,'agregarZona()')" placeholder="Digite el nombre..."  />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarZona()" >Guardar</button>
		
		<?php if(in_array("3003",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/zonas/con_zonas.php',
													   'bs_nom_zona;or_nom_zona;or_nom_zona_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_zona').value+';'+
													   document.getElementById('or_nom_zona').value+';'+
													   document.getElementById('or_nom_zona_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('txt_zona').focus();
		$('#txt_zona').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre de la zona"
		});
</script>