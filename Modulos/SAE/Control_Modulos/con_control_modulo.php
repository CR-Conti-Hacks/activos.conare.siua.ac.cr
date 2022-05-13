<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $bs_nom_cm=(isset($_GET['bs_nom_cm'])) ? $_GET['bs_nom_cm'] : '';
    $or_nom_cm= (isset($_GET['or_nom_cm'])) ? $_GET['or_nom_cm'] : '';
    $or_nom_cm_tipo 	= (isset($_GET['or_nom_cm_tipo'])) ? $_GET['or_nom_cm_tipo'] : 'ASC';
    
/***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
	
	/***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
	$sql ="SELECT COUNT(Id_Cont_Mod) AS Cant_Registros
				FROM tab_control_modulos WHERE Activo_Cont_Mod = '1'";
				
	$bs_nom_cm=(isset($_GET['bs_nom_cm'])) ? $_GET['bs_nom_cm'] : ''; 
	if($bs_nom_cm != "" ){
		$sql.=" AND Nombre_Cont_Mod like '%".$bs_nom_cm."%'";
	}

	$res_cant = seleccion($sql);
	
	/***************************************************************************/
	/*****************   CALCULO PAGINACION      *******************************/
	/***************************************************************************/
	$cant_pagi = ceil((int) $res_cant[0]['Cant_Registros'] / (int) $TAMANO_PAGINA);
	
	$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	} else {
		$inicio = (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	}
	
    /***************************************************************************/
	/************************   SQL PRINCIPAL   ********************************/
	/***************************************************************************/
	$sql ="SELECT Id_Cont_Mod, Nombre_Cont_Mod, Descripcion_Cont_Mod, Permiso_Inicial_Cont_Mod,Permiso_Final_Cont_Mod FROM tab_control_modulos WHERE Activo_Cont_Mod = '1'";
    
    
	if($bs_nom_cm != "" ){
		$sql.=" AND Nombre_Cont_Mod like '%".$bs_nom_cm."%' OR Descripcion_Cont_Mod like '%".$bs_nom_cm."%'";
	}
    
	if ($or_nom_cm != "") {
	    $sql.=" ORDER BY ".$or_nom_cm.' '.$or_nom_cm_tipo;
	}else{
	    $sql.=" ORDER BY Permiso_Inicial_Cont_Mod ASC";   
	}
	
	$sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
	
	$res = seleccion($sql);

?>
    <!-- ****************************************************************************************** -->
    <!-- **************************** Campos Ocultos   ******************************************** -->
    <!-- ****************************************************************************************** -->
    <input type="hidden" id="or_nom_cm_tipo" name="or_nom_cm_tipo" value="<?=$or_nom_cm_tipo?>" />
    <input type="hidden" id="or_nom_cm" name="or_nom_cm" value="<?=$or_nom_cm?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
    <input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />

    <!-- ****************************************************************************************** -->
    <!-- ********************************   TITULO     ******************************************** -->
    <!-- ****************************************************************************************** -->
    <div id="Titulo_Adentro">
        <span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Consultar_Control_Modulo'] ?></span>
    </div>
    
    <!-- ***************************************************************************************-->
	<!-- ********************** Formulario de busqueda    **************************************-->
	<!-- ***************************************************************************************-->
	<span class="centrado">
		<?=$texto['Mostrar_Busqueda']?>
		<a onclick="MostrarBusqueda()">
			<img src="img/SAE/buscar.png" alt="<?=$texto['Mostrar_Busqueda']?>" class="alineado_medio"/>
		</a>
	</span>
	<br />
	<br />
	<div id="Buscar" style="display:none;"  >
		<table class="width200 centrado" >		
			<tr>
				<td class="fondo_Azul blanco"><?=$texto["Nombre"]?></td>
				<td>
					<input type="text" name="bs_nom_cm" id="bs_nom_cm"  maxlength="50" value="<?= $bs_nom_cm ?>" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre'] ?>"
					onKeyPress="Buscar(
									event,
									'Modulos/SAE/Control_Modulos/con_control_modulo.php',
									'or_nom_cm;or_nom_cm_tipo;bs_nom_cm;pagina;inicio;',
									document.getElementById('or_nom_cm').value+';'+
									document.getElementById('or_nom_cm_tipo').value+';'+
									document.getElementById('bs_nom_cm').value+';'+
									'<?=$pagina.';'.$inicio.';'?>'
								);"/>
				</td>
			</tr>		
		</table>
		<br />
		<button class="boton" onclick="javascript:
							Buscar(
									'',
									'Modulos/SAE/Control_Modulos/con_control_modulo.php',
									'or_nom_cm;or_nom_cm_tipo;bs_nom_cm;pagina;inicio;',
									document.getElementById('or_nom_cm').value+';'+
									document.getElementById('or_nom_cm_tipo').value+';'+
									document.getElementById('bs_nom_cm').value+';'+
									'<?=$pagina.';'.$inicio.';'?>'
								);"
		><?=$texto['Buscar']?></button>
	</div>
	<br />
	<br />
        
		
	<!-- ***************************************************************************************-->
	<!-- **********************Cantida total de Registros **************************************-->
	<!-- ***************************************************************************************-->
	<span class="centrado gris font08"><?=$texto['Cantidad_Registros_X_Pagina'].' '.$res_cant[0]['Cant_Registros']?></span><br /><br />



    <!-- ***************************************************************************************-->
<!-- **********************          TABLA            **************************************-->
<!-- ***************************************************************************************-->
<div class="component">

	<table class="centrado width70P">		
		<tr class="centrado">
			<thead>
				<th>
					<a onClick="javascript:Ordenar('Modulos/SAE/Control_Modulos/con_control_modulo.php',
												   'or_nom_cm',
												   'Nombre_Cont_Mod',
												   'or_nom_cm_tipo',
												   'pagina;inicio;bs_nom_cm;',
												   '<?=$pagina?>;<?=$inicio?>;'
												   +document.getElementById('bs_nom_cm').value+';'
												);
								window.scrollTo(0,0);">
								<?=$texto['Nombre']?>:
					</a>
				</th>
				<th><?=$texto['Descripcion']?></th>
				<th><?=$texto['Permiso_Inicial']?></th>
				<th><?=$texto['Permiso_Final']?></th>
				<?php if(in_array("1083",$_SESSION['Permisos'])){ ?>
					<th><?=$texto['Modificar']?></th>
				<?php } ?>
				<?php if(in_array("1084",$_SESSION['Permisos'])){ ?>
					<th><?=$texto['Eliminar']?></th>
				<?php } ?>
			</thead>
		</tr>
		<?php
		if(count($res)>0){
			for($i=0;$i<count($res);$i++){
		?>
				<tr >
					<td class="izquierda"><?= $res[$i]['Nombre_Cont_Mod']?></td>
					<td class="izquierda"><?= $res[$i]['Descripcion_Cont_Mod']?></td>
					<td class="centrado"><?= $res[$i]['Permiso_Inicial_Cont_Mod']?></td>
					<td class="centrado"><?= $res[$i]['Permiso_Final_Cont_Mod']?></td>
					<?php if(in_array("1083",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/modificar.png' alt='<?=$texto['Modificar']?>' onClick="MostrarVentana(
																												this,
																												1,
																												'Modulos/SAE/Control_Modulos/mod_control_modulo.php',
																												'Id_Cont_Mod;pagina;inicio;or_nom_cm;or_nom_cm_tipo;bs_nom_cm;',
																												'<?=$res[$i]['Id_Cont_Mod']?>;<?=$pagina?>;<?=$inicio?>;<?=$or_nom_cm?>;<?=$or_nom_cm_tipo?>;<?=$bs_nom_cm?>;')"
						>
					</td>
					<?php } ?>
					
					<?php if(in_array("1084",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/eliminar.png' alt='<?=$texto['Desactivar']?>' onClick="MostrarVentana(
																												this,
																												1,
																												'Modulos/SAE/Control_Modulos/eli_control_modulo.php',
																												'Id_Cont_Mod;pagina;inicio;or_nom_cm;or_nom_cm_tipo;bs_nom_cm;',
																												'<?=$res[$i]['Id_Cont_Mod']?>;<?=$pagina?>;<?=$inicio?>;<?=$or_nom_cm?>;<?=$or_nom_cm_tipo?>;<?=$bs_nom_cm?>;')"
						>
					</td>
					<?php } ?>
				</tr>
		<?php
			}
		}else{?>
				<tr>
					<td colspan="6" class="centrado"><?=$texto['No_Datos']?></td>
				</tr>   
                
		<?php
		} //Fin else
		?>  
	</table>
</div>
    
    <!-- ********************************************************************************************** -->
	<!-- **********************************  PAGINACION   ********************************************* -->
	<!-- ********************************************************************************************** -->
			<div class="Paginacion gris">
				<?php if ($pagina !=1){ ?>
					<a onClick="javascript:CargaPaginaMenu('Modulos/SAE/Control_Modulos/con_control_modulo.php','pagina;inicio;or_nom_cm;or_nom_cm_tipo;bs_nom_cm;',
								'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_cm').value+';'
								+document.getElementById('or_nom_cm_tipo').value+';'
								+document.getElementById('bs_nom_cm').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/SAE/Control_Modulos/con_control_modulo.php','pagina;inicio;or_nom_cm;or_nom_cm_tipo;bs_nom_cm;',
								'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_cm').value+';'
								+document.getElementById('or_nom_cm_tipo').value+';'
								+document.getElementById('bs_nom_cm').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/siguiente.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>   
				<?php } ?>
			</div>
	<!-- ********************************************************************************************** -->
	<!-- ******************************** FIN PAGINACION  ********************************************* -->
	<!-- ********************************************************************************************** -->

    
<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<?php if(in_array("1081",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton"  onclick="CargaPaginaMenu('Modulos/SAE/Control_Modulos/agr_control_modulo.php','pagina;inicio;or_nom_cm;or_nom_cm_tipo;bs_nom_cm;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_cm').value+';'
								+document.getElementById('or_nom_cm_tipo').value+';'
								+document.getElementById('bs_nom_cm').value+';1;');"><?=$texto['TITULO_Agregar_Control_Modulo']?></button>
	</div>
	<?php } ?>
	<br />
	<br />
	<br />
	
   <!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	
	
	
	
	$('#bs_nom_cm').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Nombre']?>"
	});
</script>
<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>
