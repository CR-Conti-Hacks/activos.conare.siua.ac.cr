<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     			= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_transferencia			= (isset($_GET['or_nom_transferencia'])) ? $_GET['or_nom_transferencia'] : '';
	$or_nom_transferencia_tipo 		= (isset($_GET['or_nom_transferencia_tipo'])) ? $_GET['or_nom_transferencia_tipo'] : '';
	$bs_nom_transferencia			= (isset($_GET['bs_nom_transferencia'])) ? $_GET['bs_nom_transferencia'] : '';
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Transferencia</span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_transferencia" name="bs_nom_transferencia" value="<?=$bs_nom_transferencia?>" />
<input type="hidden" id="or_nom_transferencia" name="or_nom_transferencia" value="<?=$or_nom_transferencia?>" />
<input type="hidden" id="or_nom_transferencia_tipo" name="or_nom_transferencia_tipo" value="<?=$or_nom_transferencia_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width30P" >
		<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
		<tr>
			<td>Número de Transferencia:</td>
			<td>
				<input type="text" name="txt_transferencia" id="txt_transferencia" maxlength="100" onkeypress="ENTER(event,'agregarTransferencia()')" placeholder="Digite el numero de transferencia..."  />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarTransferencia()" >Guardar</button>
		
		<?php if(in_array("3012",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/transferencias/con_transferencias.php',
													   'bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_transferencia').value+';'+
													   document.getElementById('or_nom_transferencia').value+';'+
													   document.getElementById('or_nom_transferencia_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('txt_transferencia').focus();
		$('#txt_transferencia').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de transferencia"
		});
</script>