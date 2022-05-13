<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_per 		= (isset($_GET['or_nom_per'])) ? $_GET['or_nom_per'] : '';
	$or_nom_per_tipo 	= (isset($_GET['or_nom_per_tipo'])) ? $_GET['or_nom_per_tipo'] : 'ASC';

	
	
	/***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
	
	
	/***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
	$sql ="SELECT COUNT(Id_Rol)	AS Cant_Registros
				FROM tab_roles WHERE Activo_Rol = '1' AND Id_Rol != 1 AND Id_Rol != 2";
				
	$bs_nom_per=(isset($_GET['bs_nom_per'])) ? $_GET['bs_nom_per'] : ''; 
	if($bs_nom_per != "" ){
		$sql.=" AND Nombre_Rol like '%".$bs_nom_per."%'";
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
	$sql ="SELECT Id_Rol, Nombre_Rol
				FROM tab_roles WHERE Activo_Rol = '1' AND Id_Rol != 1 AND Id_Rol != 2";
				
	$bs_nom_per=(isset($_GET['bs_nom_per'])) ? $_GET['bs_nom_per'] : ''; 
	if($bs_nom_per != "" ){
		$sql.=" AND Nombre_Rol like '%".$bs_nom_per."%'";
	}

	$or_nom_per= (isset($_GET['or_nom_per'])) ? $_GET['or_nom_per'] : '';
	if ($or_nom_per != "") {
	    $sql.=" ORDER BY ".$or_nom_per.' '.$or_nom_per_tipo;
	}else{
	    $sql.=" ORDER BY Nombre_Rol ASC";   
	}
	
	$sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
	
	$res = seleccion($sql);

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="or_nom_per_tipo" name="or_nom_per_tipo" value="<?=$or_nom_per_tipo?>" />
<input type="hidden" id="or_nom_per" name="or_nom_per" value="<?=$or_nom_per?>" />
<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />


<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_con_perfil'] ?></span>
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
				<input type="text" name="bs_nom_per" id="bs_nom_per"  maxlength="50" value="<?= $bs_nom_per ?>" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre'] ?>"
				onKeyPress="Buscar(
								event,
								'Modulos/SAE/Perfiles/con_perfiles.php',
								'or_nom_per;or_nom_per_tipo;bs_nom_per;pagina;inicio;',
								document.getElementById('or_nom_per').value+';'+
								document.getElementById('or_nom_per_tipo').value+';'+
								document.getElementById('bs_nom_per').value+';'+
								'<?=$pagina.';'.$inicio.';'?>'
							);"/>
			</td>
		</tr>		
	</table>
	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/SAE/Perfiles/con_perfiles.php',
								'or_nom_per;or_nom_per_tipo;bs_nom_per;pagina;inicio;',
								document.getElementById('or_nom_per').value+';'+
								document.getElementById('or_nom_per_tipo').value+';'+
								document.getElementById('bs_nom_per').value+';'+
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

	<table class="centrado width40P">		
		<tr class="centrado">
			<thead>
				<th>
					<a onClick="javascript:Ordenar('Modulos/SAE/Perfiles/con_perfiles.php',
												   'or_nom_per',
												   'Nombre_Rol',
												   'or_nom_per_tipo',
												   'pagina;inicio;bs_nom_per;',
												   '<?=$pagina?>;<?=$inicio?>;'
												   +document.getElementById('bs_nom_per').value+';'
												);
								window.scrollTo(0,0);"><?=$texto['Nombre']?>:</a>
				</th>
				<?php if(in_array("1033",$_SESSION['Permisos'])){ ?>
					<th><?=$texto['Modificar']?></th>
				<?php } ?>
				<?php if(in_array("1034",$_SESSION['Permisos'])){ ?>
					<th><?=$texto['Consultar_Derechos']?></th>
				<?php } ?>
				<?php if(in_array("1035",$_SESSION['Permisos'])){ ?>
					<th><?=$texto['Asignar_Derechos']?></th>
				<?php } ?>
				<?php if(in_array("1036",$_SESSION['Permisos'])){ ?>
					<th><?=$texto['Eliminar']?></th>
				<?php } ?>
			</thead>
		</tr>
		<?php
		if(count($res)>0){
			for($i=0;$i<count($res);$i++){
		?>
				<tr >
					<td class="izquierda"><?= $res[$i]['Nombre_Rol']?></td>					  		        
					<?php if(in_array("1033",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/modificar.png' alt='<?=$texto['Modificar']?>' onClick="MostrarVentana(
																												this,
																												1,
																												'Modulos/SAE/Perfiles/mod_perfiles.php',
																												'Id_Rol;pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;',
																												'<?=$res[$i]['Id_Rol']?>;<?=$pagina?>;<?=$inicio?>;<?=$or_nom_per?>;<?=$or_nom_per_tipo?>;<?=$bs_nom_per?>;')"
						>
					</td>
					<?php } ?>
					<?php if(in_array("1034",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/ver_derechos.png' alt='<?=$texto['Consultar_Derechos']?>'
							onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/con_derechos.php','Id_Rol;pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;mostrar_efecto;',
								'<?=$res[$i]['Id_Rol']?>;<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_per').value+';'
								+document.getElementById('or_nom_per_tipo').value+';'
								+document.getElementById('bs_nom_per').value+';1;')"
						>
					</td>
					<?php } ?>
					<?php if(in_array("1035",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/asig_derechos.png' alt='<?=$texto['Asignar_Derechos']?>'
							onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/asig_derechos.php','Id_Rol;pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;mostrar_efecto;',
								'<?=$res[$i]['Id_Rol']?>;<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_per').value+';'
								+document.getElementById('or_nom_per_tipo').value+';'
								+document.getElementById('bs_nom_per').value+';1;')"
						>
					</td>
					<?php } ?>
					<?php if(in_array("1036",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<?php if(($res[$i]["Id_Rol"]==1)||($res[$i]["Id_Rol"]==2)||($res[$i]["Id_Rol"]==3)){ 
						?>	
							<a onclick="perfil_no_eliminar()" >
								<img src='img/SAE/denegado.png' alt='<?=$texto['Eliminar']?>'>
							</a>
						<?php }else{?>
							<a onclick="">
								<img src='img/SAE/eliminar.png' alt='<?=$texto['Eliminar']?>'
									onClick="MostrarVentana(
										this,
										1,
										'Modulos/SAE/Perfiles/eli_perfiles.php',
										'Id_Rol;pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;',
										'<?=$res[$i]['Id_Rol']?>;<?=$pagina?>;<?=$inicio?>;<?=$or_nom_per?>;<?=$or_nom_per_tipo?>;<?=$bs_nom_per?>;')"
								>
							</a>
						<?php } ?>
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
					<a onClick="javascript:CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php','pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;',
								'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_per').value+';'
								+document.getElementById('or_nom_per_tipo').value+';'
								+document.getElementById('bs_nom_per').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php','pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;',
								'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_per').value+';'
								+document.getElementById('or_nom_per_tipo').value+';'
								+document.getElementById('bs_nom_per').value+';');
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
	<?php if(in_array("1031",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/agr_perfiles.php','pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_per').value+';'
								+document.getElementById('or_nom_per_tipo').value+';'
								+document.getElementById('bs_nom_per').value+';1;');"><?=$texto['TITULO_agr_perfil']?></button>
	</div>
	<?php } ?>

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	
	
	
	
	
	$('#bs_nom_per').darkTooltip({
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