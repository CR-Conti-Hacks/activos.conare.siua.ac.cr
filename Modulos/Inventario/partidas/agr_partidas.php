<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     	= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_partida			= (isset($_GET['or_nom_partida'])) ? $_GET['or_nom_partida'] : '';
	$or_nom_partida_tipo 	= (isset($_GET['or_nom_partida_tipo'])) ? $_GET['or_nom_partida_tipo'] : '';
	$bs_nom_partida			= (isset($_GET['bs_nom_partida'])) ? $_GET['bs_nom_partida'] : '';
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Partida</span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_partida" name="bs_nom_partida" value="<?=$bs_nom_partida?>" />
<input type="hidden" id="or_nom_partida" name="or_nom_partida" value="<?=$or_nom_partida?>" />
<input type="hidden" id="or_nom_partida_tipo" name="or_nom_partida_tipo" value="<?=$or_nom_partida_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width20P" >
		<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
		<tr>
			<td>Número</td>
			<td>
				<input type="text" name="txt_partida" id="txt_partida" maxlength="100" onkeypress="ENTER(event,'agregarPartida()')" placeholder="Digite el nombre..."  />
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarPartida()" >Guardar</button>
		
		<?php if(in_array("3032",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/partidas/con_partidas.php',
													   'bs_nom_partida;or_nom_partida;or_nom_partida_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_partida').value+';'+
													   document.getElementById('or_nom_partida').value+';'+
													   document.getElementById('or_nom_partida_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('txt_partida').focus();
		$('#txt_partida').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre de la partida"
		});
</script>