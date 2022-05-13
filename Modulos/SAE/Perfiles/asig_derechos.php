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

	/************************ comprobar si tiene todos los permisos asignados **********************/
	if(count($der)==count($der_asig)){
		$derechos_completos = 'checked="checked"';
	}else{
		$derechos_completos = '';
	}
	
?>

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_asig_derechos'] ?></span>
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
<span class="centrado">
	<?=$texto['Mostrar_Busqueda']?>
	<a onclick="MostrarBusqueda()">
		<img src="img/SAE/buscar.png" alt="<?=$texto['Mostrar_Busqueda']?>" class="alineado_medio"/>
	</a>
</span>
<br />
<br />
<div id="Buscar" style="display:none;"  >
	<table class="width400 centrado" >
		<tr>
			<th colspan="2"><?=$texto['Seleccione_sistema']?></th>
		</tr>
		<tr>
			<td class="fondo_azul2 blanco"><?=$texto['Sistema']?>:</td>
			<td class="centrado fondo_gris_claro2" >
				<select id="sl_modulo" name="sl_modulo" class="width200" 
					onchange="CargaPaginaMenu('Modulos/SAE/Perfiles/asig_derechos.php',
						'Id_Cont_Mod;Id_Rol;bs_nom_per;or_nom_per;or_nom_per_tipo;inicio;pagina;',
						this.value+';'+
						document.getElementById('Id_Rol').value+';'+
						document.getElementById('bs_nom_per').value+';'+
						document.getElementById('or_nom_per').value+';'+
						document.getElementById('or_nom_per_tipo').value+';'+
						'<?=$inicio?>;<?=$pagina?>;'
						)">
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
		<tr>
			<td class="fondo_azul2 blanco"><?=$texto['Marcar_todo']?>:</td>
			<td class="centrado fondo_gris_claro2" id="fila_marcar_todos" >
				<input id="ch_marcar_todos" class="cmn-toggle cmn-toggle-round" type="checkbox"  <?= $derechos_completos?>
						onclick="Derechos_Marcar_Todos(this)"/>
				<label for="ch_marcar_todos"></label>
			</td>
		</tr>
	</table>
</div>
	<br />
	<br />
	<?php if(in_array("1032",$_SESSION['Permisos'])){ ?>	
		<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php',
													   'bs_nom_per;or_nom_per;or_nom_per_tipo;inicio;pagina;mostrar_efecto;',
													   document.getElementById('bs_nom_per').value+';'+
													   document.getElementById('or_nom_per').value+';'+
													   document.getElementById('or_nom_per_tipo').value+';'+
													   '<?=$inicio?>;<?=$pagina?>;1;'
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
				<div class="width450 fondo_gris_claro gris_oscuro font09 centrado padding5 margin-bottom10"><?= $texto['SubModulo'].": "?> <?=$cadena2?></div>
	<?php
			$Sub_U = $cadena2;
			}
			$cadena3 = trim($der[$i]['Nombre_Der']);
			if ($cadena3 != $Dere){
				$esta = 0;
				$marcado = "";
				for($a=0;$a<count($der_asig);$a++){
					if ($der[$i]["Id_Der"] == $der_asig[$a]['Id_Der_Perm']){
						$esta = 1;
						$marcado = 'checked="checked"';
					}
				}
	
	?>
				<div class="width450 font09 centrado div-table linea_abajo" id='fila<?=$i?>' >
					<div class="div-table-row width450">
						<div class="div-table-col width50 padding10">
							<input  id="ch_fila<?=$i?>"  class="cmn-toggle2 cmn-toggle-round2" type="checkbox" <?=$marcado?> 
								onclick="Guarda_Permiso(this,<?=$der[$i]['Id_Der']?>,<?=$Id_Rol?>)"/>
							<label for="ch_fila<?=$i?>"></label>
						</div>
						<div class="div-table-col padding10 izquierda" >
							<?= $texto['Permiso_de']?> <?=$cadena3?>
						</div>
					</div>
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
													   'bs_nom_per;or_nom_per;or_nom_per_tipo;inicio;pagina;mostrar_efecto;',
													   document.getElementById('bs_nom_per').value+';'+
													   document.getElementById('or_nom_per').value+';'+
													   document.getElementById('or_nom_per_tipo').value+';'+
													   '<?=$inicio?>;<?=$pagina?>;1;'
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
	$('#fila_marcar_todos').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Marcar_Todos_Derechos']?>"
	});
	
</script>