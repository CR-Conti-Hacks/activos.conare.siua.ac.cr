<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_proveedore			= (isset($_GET['or_nom_proveedore'])) ? $_GET['or_nom_proveedore'] : '';
	$or_nom_proveedore_tipo 	= (isset($_GET['or_nom_proveedore_tipo'])) ? $_GET['or_nom_proveedore_tipo'] : '';
	$bs_nom_proveedore			= (isset($_GET['bs_nom_proveedore'])) ? $_GET['bs_nom_proveedore'] : '';
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Proveedor</span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_proveedore" name="bs_nom_proveedore" value="<?=$bs_nom_proveedore?>" />
<input type="hidden" id="or_nom_proveedore" name="or_nom_proveedore" value="<?=$or_nom_proveedore?>" />
<input type="hidden" id="or_nom_proveedore_tipo" name="or_nom_proveedore_tipo" value="<?=$or_nom_proveedore_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width20P" >
		<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
		<tr>
			<td>Nombre</td>
			<td>
				<input type="text" name="txt_proveedore" id="txt_proveedore" maxlength="100" onkeypress="ENTER(event,'agregarProveedor()')" placeholder="Digite el nombre..."  />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarProveedor()" >Guardar</button>
		
		<?php if(in_array("3042",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/proveedores/con_proveedores.php',
													   'bs_nom_proveedore;or_nom_proveedore;or_nom_proveedore_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_proveedore').value+';'+
													   document.getElementById('or_nom_proveedore').value+';'+
													   document.getElementById('or_nom_proveedore_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('txt_proveedore').focus();
		$('#txt_proveedore').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre del proveedor"
		});
</script>