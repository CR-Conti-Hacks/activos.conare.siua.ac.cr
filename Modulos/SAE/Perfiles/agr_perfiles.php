<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_per 		= (isset($_GET['or_nom_per'])) ? $_GET['or_nom_per'] : '';
	$or_nom_per_tipo 	= (isset($_GET['or_nom_per_tipo'])) ? $_GET['or_nom_per_tipo'] : 'ASC';
	$bs_nom_per			= (isset($_GET['bs_nom_per'])) ? $_GET['bs_nom_per'] : '';
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_agr_perfil'] ?></span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_per" name="bs_nom_per" value="<?=$bs_nom_per?>" />
<input type="hidden" id="or_nom_per" name="or_nom_per" value="<?=$or_nom_per?>" />
<input type="hidden" id="or_nom_per_tipo" name="or_nom_per_tipo" value="<?=$or_nom_per_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width500" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?></th></tr>
		<tr>
			<td><?=$texto['Nombre_Perfil']?></td>
			<td>
				<input type="text" name="txt_nombre" id="txt_nombre" maxlength="50" onKeyPress="return ENTER_soloTexto(event,'agregarPerfil()')"  placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre']?>" />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarPerfil()" ><?=$texto['Guardar']?></button>
		<?php if(in_array("1032",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php',
													   'bs_nom_per;or_nom_per;or_nom_per_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_per').value+';'+
													   document.getElementById('or_nom_per').value+';'+
													   document.getElementById('or_nom_per_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
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