<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     	= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_TipoTele		= (isset($_GET['or_nom_TipoTele'])) ? $_GET['or_nom_TipoTele'] : '';
	$or_nom_TipoTele_tipo 	= (isset($_GET['or_nom_TipoTele_tipo'])) ? $_GET['or_nom_TipoTele_tipo'] : '';
	$bs_nom_tip_tel			= (isset($_GET['bs_nom_tip_tel'])) ? $_GET['bs_nom_tip_tel'] : '';
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Agregar_Tipos_Telefonos'] ?></span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_tip_tel" name="bs_nom_tip_tel" value="<?=$bs_nom_tip_tel?>" />
<input type="hidden" id="or_nom_TipoTele" name="or_nom_TipoTele" value="<?=$or_nom_TipoTele?>" />
<input type="hidden" id="or_nom_TipoTele_tipo" name="or_nom_TipoTele_tipo" value="<?=$or_nom_TipoTele_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width40P" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?></th></tr>
		<tr>
			<td><?=$texto['Nombre_Tipos_Telefonos']?></td>
			<td>
				<input type="text" name="txt_tipo_tele" id="txt_tipo_tele" maxlength="50" onkeypress="ENTER(event,'agregarTipTel()')" placeholder="<?=$texto['PLACEHOLDER_Digite_Tipo_telefono']?>"  />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarTipTel()" ><?=$texto['Guardar']?></button>
		
		<?php if(in_array("1152",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php',
													   'bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_tip_tel').value+';'+
													   document.getElementById('or_nom_TipoTele').value+';'+
													   document.getElementById('or_nom_TipoTele_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('txt_tipo_tele').focus();
		$('#txt_tipo_tele').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Digite_Tipos_Telefonos']?>"
		});
</script>