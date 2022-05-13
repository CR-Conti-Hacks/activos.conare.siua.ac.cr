<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_compromiso			= (isset($_GET['or_nom_compromiso'])) ? $_GET['or_nom_compromiso'] : '';
	$or_nom_compromiso_tipo 	= (isset($_GET['or_nom_compromiso_tipo'])) ? $_GET['or_nom_compromiso_tipo'] : '';
	$bs_nom_compromiso			= (isset($_GET['bs_nom_compromiso'])) ? $_GET['bs_nom_compromiso'] : '';
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Compromiso</span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_compromiso" name="bs_nom_compromiso" value="<?=$bs_nom_compromiso?>" />
<input type="hidden" id="or_nom_compromiso" name="or_nom_compromiso" value="<?=$or_nom_compromiso?>" />
<input type="hidden" id="or_nom_compromiso_tipo" name="or_nom_compromiso_tipo" value="<?=$or_nom_compromiso_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width20P" >
		<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
		<tr>
			<td>Nombre</td>
			<td>
				<input type="text" name="txt_compromiso" id="txt_compromiso" maxlength="100" onkeypress="ENTER(event,'agregarCompromiso()')" placeholder="Digite el nombre..."  />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarCompromiso()" >Guardar</button>
		
		<?php if(in_array("3022",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/compromisos/con_compromisos.php',
													   'bs_nom_compromiso;or_nom_compromiso;or_nom_compromiso_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_compromiso').value+';'+
													   document.getElementById('or_nom_compromiso').value+';'+
													   document.getElementById('or_nom_compromiso_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('txt_compromiso').focus();
		$('#txt_compromiso').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre"
		});
</script>