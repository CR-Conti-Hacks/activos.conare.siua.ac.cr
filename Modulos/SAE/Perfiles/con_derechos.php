<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$Id_Rol      		= (isset($_GET['Id_Rol'])) ? $_GET['Id_Rol'] : '';
	$or_nom_per 		= (isset($_GET['or_nom_per'])) ? $_GET['or_nom_per'] : '';
	$or_nom_per_tipo 	= (isset($_GET['or_nom_per_tipo'])) ? $_GET['or_nom_per_tipo'] : 'ASC';
	$bs_nom_per			= (isset($_GET['bs_nom_per'])) ? $_GET['bs_nom_per'] : '';
	$Id_Cont_Mod        = (isset($_GET['Id_Cont_Mod'])) ? $_GET['Id_Cont_Mod'] : 1;
	$inicio				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$pagina				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	/***************************************************************************/

	$sql = "SELECT Id_Cont_Mod, Nombre_Cont_Mod FROM tab_control_modulos WHERE Activo_Cont_Mod = '1'";
	$res_modulos = seleccion($sql);
	
	$sql = "SELECT Id_Der, Nombre_Der, Descripcion_Der, Pagina_Der, Modulo_Der, Submodulo_Der
			FROM tab_derechos
			WHERE Id_Cont_Mod_Der = ".$Id_Cont_Mod."
			ORDER BY Id_Der";
	$der = seleccion($sql);
	
	
	$sql = "SELECT Id_Perm, Id_Der_Perm FROM tab_permisos WHERE Id_Rol_Perm = ".$Id_Rol;
	$der_asig = seleccion($sql);

	
	
	
?>

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_con_derechos'] ?></span>
</div>
<br />
<br />

	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Rol" name="Id_Rol" value="<?= $Id_Rol?>" />
	<input type="hidden" id="bs_nom_per" name="bs_nom_per" value="<?=$bs_nom_per?>" />
	<input type="hidden" id="or_nom_per" name="or_nom_per" value="<?=$or_nom_per?>" />
	<input type="hidden" id="or_nom_per_tipo" name="or_nom_per_tipo" value="<?=$or_nom_per_tipo?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	
<div class="centrado">
	<table class="width350 centrado" >
		<tr>
			<th><?=$texto['Seleccione_sistema']?></th>
		</tr>
		<tr>
			
			<td class="centrado fondo_gris_claro2" >
				<select id="sl_modulo" name="sl_modulo" class="width200" 
					onchange="CargaPaginaMenu('Modulos/SAE/Perfiles/con_derechos.php',
						'Id_Cont_Mod;Id_Rol;bs_nom_per;or_nom_per;or_nom_per_tipo;pagina;inicio;',
						this.value+';'+
						document.getElementById('Id_Rol').value+';'+
						document.getElementById('bs_nom_per').value+';'+
						document.getElementById('or_nom_per').value+';'+
						document.getElementById('or_nom_per_tipo').value+';'+
						document.getElementById('pagina').value+';'+
						document.getElementById('inicio').value+';')">
						<?php
						for($i=0; $i < count($res_modulos); $i++){
							if($Id_Cont_Mod==$res_modulos[$i]['Id_Cont_Mod']){
								$selected = 'selected="selected"';
							}else{
								$selected = '';
							}
						?>
						<option value="<?=$res_modulos[$i]['Id_Cont_Mod']?>" <?= $selected?> ><?=$res_modulos[$i]['Nombre_Cont_Mod']?></option>
						<?php
						}
						?>
				</select>
			</td>
		</tr>		
	</table>

	<br />
	<br />
	<?php if(in_array("1032",$_SESSION['Permisos'])){ ?>	
		<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php',
													   'bs_nom_per;or_nom_per;or_nom_per_tipo;pagina;inicio;mostrar_efecto;',
													   document.getElementById('bs_nom_per').value+';'+
													   document.getElementById('or_nom_per').value+';'+
													   document.getElementById('or_nom_per_tipo').value+';'+
													   document.getElementById('pagina').value+';'+
													   document.getElementById('inicio').value+';1;'
													   )" ><?=$texto['Regresar']?></button>
		<br />
		<br />
	<?php } ?>
	
        <?php
		$Mod_U ="";
		$Sub_U = "";
		$Dere = "";
		$hijos=0;
		for($i=0;$i<count($der);$i++){		
			//Elimina espacios en blanco de una acdena
			$cadena1 = trim($der[$i]['Modulo_Der']);
			if ($cadena1 != $Mod_U){
	?>
				<div class="width450 fondo_gris_oscuro blanco font09 centrado padding5"><?= $texto['Modulo'].": "?> <?=$cadena1?></div>
	<?php
			$Mod_U = $cadena1;
			}
			$cadena2 = trim($der[$i]['Submodulo_Der']);
			if ($cadena2 != $Sub_U){
	?>
				<div class="width450 fondo_gris_claro gris_oscuro font09 centrado padding5"><?= $texto['SubModulo'].": "?> <?=$cadena2?></div>
	<?php
			$Sub_U = $cadena2;
			}
			$cadena3 = trim($der[$i]['Nombre_Der']);
			if ($cadena3 != $Dere){
				$esta = 0;
				$clase = "X";
				for($a=0;$a<count($der_asig);$a++){
					if ($der[$i]["Id_Der"] == $der_asig[$a]['Id_Der_Perm']){
						$esta = 1;
						$clase = "check";
					}
				}
				
	?>
				<div class="width400 font09 centrado <?= $clase?>" id='fila<?=$i?>' >
					<span class="izquierda" style="display: block; margin-top: 5px;"><?= $texto['Permiso_de']?> <?=$cadena3?></span>
				</div>&nbsp;&nbsp
				<script>
					$('#fila<?=$i?>').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$der[$i]['Descripcion_Der']?>"
					});

				</script>
		
	<?php
			
			$Dere = $cadena3;
			}
			
			?>
  
  <?php } //for?>



	<br />
	<br />
	<?php if(in_array("1032",$_SESSION['Permisos'])){ ?>	
		<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php',
													   'bs_nom_per;or_nom_per;or_nom_per_tipo;pagina;inicio;mostrar_efecto;',
													   document.getElementById('bs_nom_per').value+';'+
													   document.getElementById('or_nom_per').value+';'+
													   document.getElementById('or_nom_per_tipo').value+';'+
													   document.getElementById('pagina').value+';'+
													   document.getElementById('inicio').value+';1;'
													   )" ><?=$texto['Regresar']?></button>
		<br />
		<br />
	<?php } ?>
</div>

<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	
	
	
	$('#sl_modulo').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Seleccion_Sistema']?>"
	});
</script>
