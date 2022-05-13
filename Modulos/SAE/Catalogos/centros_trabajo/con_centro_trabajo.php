<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$or_nom_ct 				= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_nom_ct_tipo 		= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	
	$or_dim_ct 					= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_dim_ct_tipo 			= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	
	
	/***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
	
	
	/***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
	$sql ="SELECT COUNT(Id_CT) AS Cant_Registros
			FROM tab_centros_trabajos
			WHERE Activo_CT='1'";
				
	$bs_nom_ct = (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	if ($bs_nom_ct != "") {
		$sql.=" AND Nombre_CT like '%" . $bs_nom_ct ."%'";
	}
	$bs_dim_ct = (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : '';
	if ($bs_dim_ct != "") {
		$sql.=" AND Diminutivo_CT like '%" . $bs_dim_ct ."%'";
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
	$sql ="SELECT 
				Id_CT, 
				Nombre_CT, 
				Diminutivo_CT, 
				Logo_CT, 
				Telefono_CT, 
				Fax_CT, 
				Direccion_CT, 
				Correo_CT, 
				Latitud_CT, 
				Longitud_CT, 
				Activo_CT 
			FROM tab_centros_trabajos 
			WHERE Activo_CT='1'";
	
	/***************************************************************************/
	/************************   BUSQUEDAS       ********************************/
	/***************************************************************************/


	$bs_nom_ct = (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	if ($bs_nom_ct != "") {
		$sql.=" AND (Nombre_CT like '%" . $bs_nom_ct . "%')";
	}
	
	$bs_dim_ct = (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : '';
	if ($bs_dim_ct != "") {
		$sql.=" AND (Diminutivo_CT like '%" . $bs_dim_ct . "%')";
	}

	

	
	/***************************************************************************/
	/************************   ORDENAMIENTO    ********************************/
	/***************************************************************************/
	if($or_nom_ct!=""){
		$sql.=" ORDER BY ".$or_nom_ct.' '.$or_nom_ct_tipo;
	}elseif($or_dim_ct!=""){
		$sql.=" ORDER BY ".$or_dim_ct.' '.$or_dim_ct_tipo;
	}
	
	
	$sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
	
	$res = seleccion($sql);
?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />

<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />

<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />


<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Consultar_CT'] ?></span>
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
    <table class="width500 centrado" >		
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Nombre"]?>:</td>
			<td class="fondo_gris_claro2">
				<input type="text" name="bs_nom_ct" id="bs_nom_ct"  maxlength="60" value="<?= $bs_nom_ct ?>"
				onKeyPress="Buscar(
								event,
								'Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php',
								'pagina;inicio;bs_nom_ct;bs_dim_ct;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								document.getElementById('bs_nom_ct').value+';'+
								document.getElementById('bs_dim_ct').value+';'
							);"/>
			</td>
		</tr>
		
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Diminutivo"]?>:</td>
			<td class="fondo_gris_claro2">
				<input type="text" name="bs_dim_ct" id="bs_dim_ct"  maxlength="60" value="<?= $bs_dim_ct ?>"
				onKeyPress="Buscar(
								event,
								'Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php',
								'pagina;inicio;bs_nom_ct;bs_dim_ct;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								document.getElementById('bs_nom_ct').value+';'+
								document.getElementById('bs_dim_ct').value+';'
							);"/>
			</td>
		</tr>
	</table>
	<br />
	<button class="boton" onclick="javascript:Buscar('','Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php','or_nom_ct;or_nom_ct_tipo;bs_nom_ct;or_dim_ct;or_dim_ct_tipo;bs_dim_ct;pagina;inicio;',document.getElementById('or_nom_ct').value+';'+document.getElementById('or_nom_ct_tipo').value+';'+document.getElementById('bs_nom_ct').value+';'+document.getElementById('or_dim_ct').value+';'+document.getElementById('or_dim_ct_tipo').value+';'+document.getElementById('bs_dim_ct').value+';'+'<?=$pagina.';'.$inicio.';'?>');">
		<?=$texto['Buscar']?>
	</button>
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

	<table class="centrado font09 width80P ">		
		<tr class="centrado">
			<thead>
					<?php if(in_array("1045",$_SESSION['Permisos'])){ ?>
					<th>
						<?=$texto['Ver_Detalle']?>
					</th>
					<?php } //Deber consultar detalle de usuario?>
					
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php',
												   'or_nom_ct',
												   'Nombre_CT',
												   'or_nom_ct_tipo',
												   'pagina;inicio;'+
												   'bs_nom_ct;bs_dim_ct;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_nom_ct').value+';'+
													document.getElementById('bs_dim_ct').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Nombre']?>
						</a>
					</th>
					
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php',
												   'or_dim_ct',
												   'Diminutivo_CT',
												   'or_dim_ct_tipo',
												   'pagina;inicio;'+
												   'bs_nom_ct;bs_dim_ct;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_nom_ct').value+';'+
													document.getElementById('bs_dim_ct').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Diminutivo']?>
						</a>
					</th>
					<th>
						<?=$texto['Telefono']?>
					</th>
				
				<?php if(in_array("1046",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Modificar']?></a></th>
				<?php } ?>
				
				<?php if(in_array("1047",$_SESSION['Permisos'])&&in_array("1052",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Universidad']."es"?></a></th>
				<?php } ?>
				
				<?php if(in_array("1048",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Consultar_Mapa_CT']?></a></th>
				<?php } ?>
				
				
				<?php if(in_array("1050",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Eliminar']?></a></th>
				<?php } ?>

			</thead>
		</tr>
		
		<?php
		if(count($res)>0){
			for($i=0;$i<count($res);$i++){
		?>
				<tr>
					<?php if(in_array("1045",$_SESSION['Permisos'])){ ?>
						<td class="centrado">
							<a onclick="MostrarDetalle('Modulos/SAE/Catalogos/centros_trabajo/ajax_detalle_centro_trabajo.php','Id_CT;','<?=$res[$i]['Id_CT']?>;','<?=$i?>');">
								<img name="img_detalle<?=$i?>" id="img_detalle<?=$i?>" alt="<?= $texto['Ver_Detalle']?>" src="img/SAE/mostrar_detalle.png"  />
							</a>
							
						</td>
					<?php } //Derecho de consultar detalle de persona?>
					
					<td class="centrado"><?= $res[$i]['Nombre_CT']?></td>
					<td class="centrado"><?= $res[$i]['Diminutivo_CT']?></td>
					<td class="centrado"><?= $res[$i]['Telefono_CT']?></td>
					
					
					<?php if(in_array("1046",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/modificar.png' alt='<?=$texto['Modificar']?>' onClick="CargaPaginaMenu(
																												'Modulos/SAE/Catalogos/centros_trabajo/mod_centro_trabajo.php',
																												'Id_CT;pagina;inicio;or_nom_ct;or_nom_ct_tipo;bs_nom_ct;or_dim_ct;or_dim_ct_tipo;bs_dim_ct;mostrar_efecto;',
																												'<?=$res[$i]['Id_CT']?>;<?=$pagina?>;<?=$inicio?>;<?=$or_nom_ct?>;<?=$or_nom_ct_tipo?>;<?=$bs_nom_ct?>;<?=$or_dim_ct?>;<?=$or_dim_ct_tipo?>;<?=$bs_dim_ct?>;1;')"
						>
					</td>
					<?php } ?>
					
					<?php if(in_array("1047",$_SESSION['Permisos'])&&in_array("1052",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/ver_derechos.png' alt='<?=$texto['Consultar_Derechos']?>' 
							onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/con_universidades.php','pagina;inicio;Id_CT;or_nom_ct;or_nom_ct_tipo;bs_nom_ct;or_dim_ct;or_dim_ct_tipo;bs_dim_ct;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+<?=$res[$i]['Id_CT']?>+';'
								+document.getElementById('or_nom_ct').value+';'
								+document.getElementById('or_nom_ct_tipo').value+';'
								+document.getElementById('bs_nom_ct').value+';'
								+document.getElementById('or_dim_ct').value+';'
								+document.getElementById('or_dim_ct_tipo').value+';'
								+document.getElementById('bs_dim_ct').value+';1;');"
						/>
					</td>
					<?php } ?>
					
					<?php if(in_array("1048",$_SESSION['Permisos'])){ ?>
					<td>
						<?=$texto['Consultar_Mapa_CT']?>
					</td>
					<?php } ?>
					

					<?php if(in_array("1050",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/eliminar.png' alt='<?=$texto['Eliminar']?>' onClick="MostrarVentana(
																												this,
																												1,
																												'Modulos/SAE/Catalogos/centros_trabajo/eli_centro_trabajo.php',
																												'Id_CT;pagina;inicio;or_nom_ct;or_nom_ct_tipo;bs_nom_ct;or_dim_ct;or_dim_ct_tipo;bs_dim_ct;',
																												'<?=$res[$i]['Id_CT']?>;<?=$pagina?>;<?=$inicio?>;<?=$or_nom_ct?>;<?=$or_nom_ct_tipo?>;<?=$bs_nom_ct?>;<?=$or_dim_ct?>;<?=$or_dim_ct_tipo?>;<?=$bs_dim_ct?>;')"
						>
					</td>
					<?php } ?>
				</tr>
				<?php if(in_array("1014",$_SESSION['Permisos'])){ ?>
					<tr>
						<td colspan="13" >
							<div id="X<?=$i?>" style="display: none;" class="fondo_gris_oscuro">
								
							</div>
						</td>
					</tr>
				<?php } ?>
		<?php
			}
		}else{?>
				<tr>
					<td colspan="13" style="text-align: center;"><?=$texto['No_Datos']?></td>
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
					<a onClick="javascript:CargaPaginaMenu(
															'Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php',
															'pagina;inicio;'+
															'bs_nom_ct;bs_dim_ct;'+
															'or_nom_ct;or_nom_ct_tipo;'+
															'or_dim_ct;or_dim_ct_tipo;',
															'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'+
															document.getElementById('bs_nom_ct').value+';'+
															document.getElementById('bs_dim_ct').value+';'+
															document.getElementById('or_nom_ct').value+';'+
															document.getElementById('or_nom_ct_tipo').value+';'+
															document.getElementById('or_dim_ct').value+';'+
															document.getElementById('or_dim_ct_tipo').value+';'
															);window.scrollTo(0,0);"
					>
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?= $texto['Pagina']?>: <?= $pagina ?> <?= $texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu(
															'Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php',
															'pagina;inicio;'+
															'bs_nom_ct;bs_dim_ct;'+
															'or_nom_ct;or_nom_ct_tipo;'+
															'or_dim_ct;or_dim_ct_tipo;',
															'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'+
															document.getElementById('bs_nom_ct').value+';'+
															document.getElementById('bs_dim_ct').value+';'+
															document.getElementById('or_nom_ct').value+';'+
															document.getElementById('or_nom_ct_tipo').value+';'+
															document.getElementById('or_dim_ct').value+';'+
															document.getElementById('or_dim_ct_tipo').value+';'
															);window.scrollTo(0,0);"
				    >
								<img src="img/SAE/siguiente.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
								&nbsp;&nbsp;&nbsp;
				<?php } ?>
			</div>
<!-- ********************************************************************************************** -->
<!-- ******************************** FIN PAGINACION  ********************************************* -->
<!-- ********************************************************************************************** -->


<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<?php if(in_array("1043",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton"  onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/agr_centro_trabajo.php','pagina;inicio;or_nom_ct;or_nom_ct_tipo;bs_nom_cm;or_dim_ct;or_dim_ct_tipo;bs_dim_ct;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_ct').value+';'
								+document.getElementById('or_nom_ct_tipo').value+';'
								+document.getElementById('bs_nom_ct').value+';'
								+document.getElementById('or_dim_ct').value+';'
								+document.getElementById('or_dim_ct_tipo').value+';'
								+document.getElementById('bs_dim_ct').value+';1;');"><?=$texto['TITULO_Agregar_Centro_Trabajo']?></button>
	</div>
	<?php } ?>




<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
</script>
<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>