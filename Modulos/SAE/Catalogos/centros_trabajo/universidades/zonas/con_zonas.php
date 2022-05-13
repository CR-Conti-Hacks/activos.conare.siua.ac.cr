<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$Id_CT				= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : ''; //Parámetro de CT
	$Id_Uni				= (isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : ''; //Parámetro de CT
	
	$or_nom_ct 				= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_nom_ct_tipo 		= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	
	$or_dim_ct 					= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_dim_ct_tipo 			= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	
	$or_nom_uni 					= (isset($_GET['or_nom_uni'])) ? $_GET['or_nom_uni'] : '';
	$or_nom_uni_tipo 			= (isset($_GET['or_nom_uni_tipo'])) ? $_GET['or_nom_uni_tipo'] : 'ASC';
	
	$or_dim_uni 					= (isset($_GET['or_dim_uni'])) ? $_GET['or_dim_uni'] : '';
	$or_dim_uni_tipo 			= (isset($_GET['or_dim_uni_tipo'])) ? $_GET['or_dim_uni_tipo'] : 'ASC';
	
	
	$or_nom_zon 				= (isset($_GET['or_nom_zon'])) ? $_GET['or_nom_zon'] : '';
	$or_nom_zon_tipo 		= (isset($_GET['or_nom_zon_tipo'])) ? $_GET['or_nom_zon_tipo'] : 'ASC';
	
	$or_dim_zon 					= (isset($_GET['or_dim_zon'])) ? $_GET['or_dim_zon'] : '';
	$or_dim_zon_tipo 			= (isset($_GET['or_dim_zon_tipo'])) ? $_GET['or_dim_zon_tipo'] : 'ASC';
	
	$bs_nom_ct 					= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : 'ASC';
	
	$bs_nom_uni 					= (isset($_GET['bs_nom_uni'])) ? $_GET['bs_nom_uni'] : '';
	$bs_dim_uni			= (isset($_GET['bs_dim_uni'])) ? $_GET['bs_dim_uni'] : 'ASC';
	
	
	/***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
	
	
	/***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
	$sql ="SELECT COUNT(Id_Zon) AS Cant_Registros
			FROM tab_zonas
			WHERE Activo_Zon='1' AND Id_Uni_Zon=".$Id_Uni;
				
	$bs_nom_zon = (isset($_GET['bs_nom_zon'])) ? $_GET['bs_nom_zon'] : '';
	if ($bs_nom_zon != "") {
		$sql.=" AND Nombre_Zon like '%" . $bs_nom_zon ."%'";
	}
	$bs_dim_zon = (isset($_GET['bs_dim_zon'])) ? $_GET['bs_dim_zon'] : '';
	if ($bs_dim_zon != "") {
		$sql.=" AND Diminutivo_Zon like '%" . $bs_dim_zon ."%'";
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
				Id_Zon, 
				Nombre_Zon, 
				Diminutivo_Zon, 
				Logo_Zon, 
				Telefono_Zon, 
				Fax_Zon, 
				Direccion_Zon, 
				Correo_Zon, 
				Latitud_Zon, 
				Longitud_Zon, 
				Activo_Zon 
			FROM tab_zonas 
			WHERE Activo_Zon='1' AND Id_Uni_Zon=".$Id_Uni;
	
	/***************************************************************************/
	/************************   BUSQUEDAS       ********************************/
	/***************************************************************************/


	$bs_nom_zon = (isset($_GET['bs_nom_zon'])) ? $_GET['bs_nom_zon'] : '';
	if ($bs_nom_zon != "") {
		$sql.=" AND (Nombre_Zon like '%" . $bs_nom_zon . "%')";
	}
	
	$bs_dim_zon = (isset($_GET['bs_dim_zon'])) ? $_GET['bs_dim_zon'] : '';
	if ($bs_dim_zon != "") {
		$sql.=" AND (Diminutivo_Zon like '%" . $bs_dim_zon . "%')";
	}

	

	
	/***************************************************************************/
	/************************   ORDENAMIENTO    ********************************/
	/***************************************************************************/
	if($or_nom_zon!=""){
		$sql.=" ORDER BY ".$or_nom_zon.' '.$or_nom_zon_tipo;
	}elseif($or_dim_zon!=""){
		$sql.=" ORDER BY ".$or_dim_zon.' '.$or_dim_zon_tipo;
	}
	
	
	$sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
	
	$res = seleccion($sql);
?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />

<input type="hidden" id="Id_CT" name="Id_CT" value="<?=$Id_CT?>" />
<input type="hidden" id="Id_Uni" name="Id_Uni" value="<?=$Id_Uni?>" />

<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />

<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />

<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />

<input type="hidden" id="or_nom_uni" name="or_nom_uni" value="<?=$or_nom_uni?>" />
<input type="hidden" id="or_nom_uni_tipo" name="or_nom_uni_tipo" value="<?=$or_nom_uni_tipo?>" />

<input type="hidden" id="or_dim_uni" name="or_dim_uni" value="<?=$or_dim_uni?>" />
<input type="hidden" id="or_dim_uni_tipo" name="or_dim_uni_tipo" value="<?=$or_dim_uni_tipo?>" />

<input type="hidden" id="bs_nom_uni" name="bs_nom_uni" value="<?=$bs_nom_uni?>" />
<input type="hidden" id="bs_dim_uni" name="bs_dim_uni" value="<?=$bs_dim_uni?>" />

<input type="hidden" id="or_nom_zon" name="or_nom_zon" value="<?=$or_nom_zon?>" />
<input type="hidden" id="or_nom_zon_tipo" name="or_nom_zon_tipo" value="<?=$or_nom_zon_tipo?>" />

<input type="hidden" id="or_dim_zon" name="or_dim_zon" value="<?=$or_dim_zon?>" />
<input type="hidden" id="or_dim_zon_tipo" name="or_dim_zon_tipo" value="<?=$or_dim_zon_tipo?>" />



<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Consultar_Zon'] ?></span>
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
				<input type="text" name="bs_nom_zon" id="bs_nom_zon"  maxlength="60" value="<?=$bs_nom_zon?>"
				onKeyPress="Buscar(
								event,
								'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php',
								'pagina;inicio;Id_CT;Id_Uni;Id_Zon;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;bs_nom_uni;bs_dim_uni;or_nom_uni;or_dim_uni;or_nom_uni_tipo;or_dim_uni_tipo;bs_nom_zon;bs_dim_zon;or_nom_zon;or_dim_zon;or_nom_zon_tipo;or_dim_zon_tipo;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								<?=$Id_CT?>+';'+
								<?=$Id_Uni?>+';'+
								<?=$res[0]['Id_Zon']?>+';'+
								document.getElementById('bs_nom_ct').value+';'+
								document.getElementById('bs_dim_ct').value+';'+
								document.getElementById('or_nom_ct').value+';'+
								document.getElementById('or_dim_ct').value+';'+
								document.getElementById('or_nom_ct_tipo').value+';'+
								document.getElementById('or_dim_ct_tipo').value+';'+
								document.getElementById('bs_nom_uni').value+';'+
								document.getElementById('bs_dim_uni').value+';'+
								document.getElementById('or_nom_uni').value+';'+
								document.getElementById('or_dim_uni').value+';'+
								document.getElementById('or_nom_uni_tipo').value+';'+
								document.getElementById('or_dim_uni_tipo').value+';'+
								document.getElementById('bs_nom_zon').value+';'+
								document.getElementById('bs_dim_zon').value+';'+
								document.getElementById('or_nom_zon').value+';'+
								document.getElementById('or_dim_zon').value+';'+
								document.getElementById('or_nom_zon_tipo').value+';'+
								document.getElementById('or_dim_zon_tipo').value+';'
							);"/>
			</td>
		</tr>
		
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Diminutivo"]?>:</td>
			<td class="fondo_gris_claro2">
				<input type="text" name="bs_dim_zon" id="bs_dim_zon"  maxlength="60" value="<?=$bs_dim_zon ?>"
				onKeyPress="Buscar(
								event,
								'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php',
								'pagina;inicio;Id_CT;Id_Uni;Id_Zon;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;bs_nom_uni;bs_dim_uni;or_nom_uni;or_dim_uni;or_nom_uni_tipo;or_dim_uni_tipo;bs_nom_zon;bs_dim_zon;or_nom_zon;or_dim_zon;or_nom_zon_tipo;or_dim_zon_tipo;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								<?=$Id_CT?>+';'+
								<?=$Id_Uni?>+';'+
								<?=$res[0]['Id_Zon']?>+';'+
								document.getElementById('bs_nom_ct').value+';'+
								document.getElementById('bs_dim_ct').value+';'+
								document.getElementById('or_nom_ct').value+';'+
								document.getElementById('or_dim_ct').value+';'+
								document.getElementById('or_nom_ct_tipo').value+';'+
								document.getElementById('or_dim_ct_tipo').value+';'+
								document.getElementById('bs_nom_uni').value+';'+
								document.getElementById('bs_dim_uni').value+';'+
								document.getElementById('or_nom_uni').value+';'+
								document.getElementById('or_dim_uni').value+';'+
								document.getElementById('or_nom_uni_tipo').value+';'+
								document.getElementById('or_dim_uni_tipo').value+';'+
								document.getElementById('bs_nom_zon').value+';'+
								document.getElementById('bs_dim_zon').value+';'+
								document.getElementById('or_nom_zon').value+';'+
								document.getElementById('or_dim_zon').value+';'+
								document.getElementById('or_nom_zon_tipo').value+';'+
								document.getElementById('or_dim_zon_tipo').value+';'
							);"/>
			</td>
		</tr>
	</table>
	<br />
	<button class="boton" onclick="javascript:Buscar(
								'',
								'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php',
								'pagina;inicio;Id_CT;Id_Uni;Id_Zon;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;bs_nom_uni;bs_dim_uni;or_nom_uni;or_dim_uni;or_nom_uni_tipo;or_dim_uni_tipo;or_nom_zon;or_nom_zon_tipo;bs_nom_zon;or_dim_zon;or_dim_zon_tipo;bs_dim_zon;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								<?=$Id_CT?>+';'+
								<?=$Id_Uni?>+';'+
								<?=$res[0]['Id_Zon']?>+';'+
								document.getElementById('bs_nom_ct').value+';'+
								document.getElementById('bs_dim_ct').value+';'+
								document.getElementById('or_nom_ct').value+';'+
								document.getElementById('or_dim_ct').value+';'+
								document.getElementById('or_nom_ct_tipo').value+';'+
								document.getElementById('or_dim_ct_tipo').value+';'+
								document.getElementById('bs_nom_uni').value+';'+
								document.getElementById('bs_dim_uni').value+';'+
								document.getElementById('or_nom_uni').value+';'+
								document.getElementById('or_dim_uni').value+';'+
								document.getElementById('or_nom_uni_tipo').value+';'+
								document.getElementById('or_dim_uni_tipo').value+';'+
								document.getElementById('or_nom_zon').value+';'+
								document.getElementById('or_nom_zon_tipo').value+';'+
								document.getElementById('bs_nom_zon').value+';'+
								document.getElementById('or_dim_zon').value+';'+
								document.getElementById('or_dim_zon_tipo').value+';'+
								document.getElementById('bs_dim_zon').value+';'
							);"
	>
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
					<?php if(in_array("1063",$_SESSION['Permisos'])){ ?>
					<th>
						<?=$texto['Ver_Detalle']?>
					</th>
					<?php } ?>
					
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php',
												   'or_nom_zon',
												   'Nombre_Zon',
												   'or_nom_zon_tipo',
												   'pagina;inicio;Id_CT;Id_Uni;Id_Zon;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;bs_nom_uni;bs_dim_uni;or_nom_uni;or_dim_uni;or_nom_uni_tipo;or_dim_uni_tipo;bs_nom_zon;bs_dim_zon;',
													'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													<?=$Id_CT?>+';'+
													<?=$Id_Uni?>+';'+
													<?=$res[0]['Id_Zon']?>+';'+
													document.getElementById('bs_nom_ct').value+';'+
													document.getElementById('bs_dim_ct').value+';'+
													document.getElementById('or_nom_ct').value+';'+
													document.getElementById('or_dim_ct').value+';'+
													document.getElementById('or_nom_ct_tipo').value+';'+
													document.getElementById('or_dim_ct_tipo').value+';'+
													document.getElementById('bs_nom_uni').value+';'+
													document.getElementById('bs_dim_uni').value+';'+
													document.getElementById('or_nom_uni').value+';'+
													document.getElementById('or_dim_uni').value+';'+
													document.getElementById('or_nom_uni_tipo').value+';'+
													document.getElementById('or_dim_uni_tipo').value+';'+
													document.getElementById('bs_nom_zon').value+';'+
													document.getElementById('bs_dim_zon').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Nombre']?>
						</a>
					</th>
										
					
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php',
												   'or_dim_zon',
												   'Diminutivo_Zon',
												   'or_dim_zon_tipo',
												   'pagina;inicio;Id_CT;Id_Uni;Id_Zon;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;bs_nom_uni;bs_dim_uni;or_nom_uni;or_dim_uni;or_nom_uni_tipo;or_dim_uni_tipo;bs_nom_zon;bs_dim_zon;',
													'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													<?=$Id_CT?>+';'+
													<?=$Id_Uni?>+';'+
													<?=$res[0]['Id_Zon']?>+';'+
													document.getElementById('bs_nom_ct').value+';'+
													document.getElementById('bs_dim_ct').value+';'+
													document.getElementById('or_nom_ct').value+';'+
													document.getElementById('or_dim_ct').value+';'+
													document.getElementById('or_nom_ct_tipo').value+';'+
													document.getElementById('or_dim_ct_tipo').value+';'+
													document.getElementById('bs_nom_uni').value+';'+
													document.getElementById('bs_dim_uni').value+';'+
													document.getElementById('or_nom_uni').value+';'+
													document.getElementById('or_dim_uni').value+';'+
													document.getElementById('or_nom_uni_tipo').value+';'+
													document.getElementById('or_dim_uni_tipo').value+';'+
													document.getElementById('bs_nom_zon').value+';'+
													document.getElementById('bs_dim_zon').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Diminutivo']?>
						</a>
					</th>
					<th>
						<?=$texto['Telefono']?>
					</th>
				
				<?php if(in_array("1064",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Modificar']?></a></th>
				<?php } ?>
				
				<?php if(in_array("1065",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Sub_Zonas']?></a></th>
				<?php } ?>
								
				<?php if(in_array("1068",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Consultar_Mapa_CT']?></a></th>
				<?php } ?>
				
				
				<?php if(in_array("1070",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Eliminar']?></a></th>
				<?php } ?>

			</thead>
		</tr>
		
		<?php
		if(count($res)>0){
			for($i=0;$i<count($res);$i++){
		?>
				<tr>
					<?php if(in_array("1063",$_SESSION['Permisos'])){ ?>
						<td class="centrado">
							<a onclick="MostrarDetalle('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/ajax_detalle_zona.php','Id_Zon;','<?=$res[$i]['Id_Zon']?>;','<?=$i?>');">
								<img name="img_detalle<?=$i?>" id="img_detalle<?=$i?>" alt="<?= $texto['Ver_Detalle']?>" src="img/SAE/mostrar_detalle.png"  />
							</a>
							
						</td>
					<?php } //Derecho de consultar detalle de persona?>
					
					<td class="centrado"><?= $res[$i]['Nombre_Zon']?></td>
					<td class="centrado"><?= $res[$i]['Diminutivo_Zon']?></td>
					<td class="centrado"><?= $res[$i]['Telefono_Zon']?></td>
					
					
					<?php if(in_array("1064",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/modificar.png' alt='<?=$texto['Modificar']?>'
						onClick="CargaPaginaMenu(
											    'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/mod_zona.php',
											    'pagina;inicio;Id_CT;Id_Uni;Id_Zon;bs_nom_ct;bs_dim_ct;bs_nom_uni;bs_dim_uni;bs_nom_zon;bs_dim_zon;or_nom_ct;or_dim_ct;or_nom_uni;or_dim_uni;or_nom_zon;or_dim_zon;or_nom_ct_tipo;or_dim_ct_tipo;or_nom_uni_tipo;or_dim_uni_tipo;or_nom_zon_tipo;or_dim_zon_tipo;mostrar_efecto;',
												'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
												<?=$Id_CT?>+';'+<?=$Id_Uni?>+';'+<?=$res[$i]['Id_Zon']?>+';'+
												document.getElementById('bs_nom_ct').value+';'+
												document.getElementById('bs_dim_ct').value+';'+
												document.getElementById('bs_nom_uni').value+';'+
												document.getElementById('bs_dim_uni').value+';'+
												document.getElementById('bs_nom_zon').value+';'+
												document.getElementById('bs_dim_zon').value+';'+
												
												document.getElementById('or_nom_ct').value+';'+
												document.getElementById('or_dim_ct').value+';'+
												document.getElementById('or_nom_uni').value+';'+
												document.getElementById('or_dim_uni').value+';'+
												document.getElementById('or_nom_zon').value+';'+
												document.getElementById('or_dim_zon').value+';'+
												
												document.getElementById('or_nom_ct_tipo').value+';'+
												document.getElementById('or_dim_ct_tipo').value+';'+
												document.getElementById('or_nom_uni_tipo').value+';'+
												document.getElementById('or_dim_uni_tipo').value+';'+
												document.getElementById('or_nom_zon_tipo').value+';'+
												document.getElementById('or_dim_zon_tipo').value+';1;')"
						>
					</td>
					<?php } ?>
					
					<!---Sub zonas-->
					<?php if(in_array("1065",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/ver_derechos.png' alt='<?=$texto['Consultar_Derechos']?>' 
							onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/Subzonas/con_subzonas.php',
'pagina;inicio;Id_CT;bs_nom_ct;bs_dim_ct;or_nom_ct;or_nom_ct_tipo;or_dim_ct;or_dim_ct_tipo;Id_Uni;bs_nom_uni;bs_dim_uni;or_nom_uni;or_nom_uni_tipo;or_dim_uni;or_dim_uni_tipo;Id_Zon;bs_nom_zon;bs_dim_zon;or_nom_zon;or_nom_zon_tipo;or_dim_zon;or_dim_zon_tipo;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+<?=$Id_CT?>+';'
								+document.getElementById('bs_nom_ct').value+';'
								+document.getElementById('bs_dim_ct').value+';'
								+document.getElementById('or_nom_ct').value+';'
								+document.getElementById('or_nom_ct_tipo').value+';'
								+document.getElementById('or_dim_ct').value+';'
								+document.getElementById('or_dim_ct_tipo').value+';'+
								<?=$Id_Uni?>+';'
								+document.getElementById('bs_nom_uni').value+';'
								+document.getElementById('bs_dim_uni').value+';'
								+document.getElementById('or_nom_uni').value+';'
								+document.getElementById('or_nom_uni_tipo').value+';'
								+document.getElementById('or_dim_uni').value+';'
								+document.getElementById('or_dim_uni_tipo').value+';'+
								<?=$res[$i]['Id_Zon']?>+';'
								+document.getElementById('bs_nom_zon').value+';'
								+document.getElementById('bs_dim_zon').value+';'
								+document.getElementById('or_nom_zon').value+';'
								+document.getElementById('or_nom_zon_tipo').value+';'
								+document.getElementById('or_dim_zon').value+';'
								+document.getElementById('or_dim_zon_tipo').value+';1;');"
						/>
					</td>
					<?php } ?>
					
					
					
					<td>
						<?=$texto['Consultar_Mapa_CT']?>
					</td>
					
					<?php if(in_array("1070",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/eliminar.png' alt='<?=$texto['Eliminar']?>' onClick="MostrarVentana(
																												this,
																												1,
																												'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/eli_zona.php',
																												'pagina;inicio;Id_Zon;Id_Uni;Id_CT;bs_nom_ct;bs_dim_ct;bs_nom_uni;bs_dim_uni;bs_nom_zon;bs_dim_zon;or_nom_ct;or_dim_ct;or_nom_uni;or_dim_uni;or_nom_zon;or_dim_zon;or_nom_ct_tipo;or_dim_ct_tipo;or_nom_uni_tipo;or_dim_uni_tipo;or_nom_zon_tipo;or_dim_zon_tipo;',
																												'<?=$pagina?>;<?=$inicio?>;<?=$res[$i]['Id_Zon']?>;<?=$Id_Uni?>;<?=$Id_CT?>;<?=$bs_nom_ct?>;<?=$bs_dim_ct?>;<?=$bs_nom_uni?>;<?=$bs_dim_uni?>;<?=$bs_nom_zon?>;<?=$bs_dim_zon?>;<?=$or_nom_ct?>;<?=$or_dim_ct?>;<?=$or_nom_uni?>;<?=$or_dim_uni?>;<?=$or_nom_zon?>;<?=$or_dim_zon?>;<?=$or_nom_ct_tipo?>;<?=$or_dim_ct_tipo?>;<?=$or_nom_uni_tipo?>;<?=$or_dim_uni_tipo?>;<?=$or_nom_zon_tipo?>;<?=$or_dim_zon_tipo?>;')"
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
															'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php',
															'pagina;inicio;Id_CT;Id_Uni;'+
															'bs_nom_ct;bs_dim_ct;'+
															'or_nom_ct;or_nom_ct_tipo;'+
															'or_dim_ct;or_dim_ct_tipo;'+
															'bs_nom_uni;bs_dim_uni;'+
															'or_nom_uni;or_nom_uni_tipo;'+
															'or_dim_uni;or_dim_uni_tipo;'+
															'bs_nom_zon;bs_dim_zon;'+
															'or_nom_zon;or_nom_zon_tipo;'+
															'or_dim_zon;or_dim_zon_tipo;',
															'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;<?=$Id_CT?>;<?=$Id_Uni?>;'+
															document.getElementById('bs_nom_ct').value+';'+
															document.getElementById('bs_dim_ct').value+';'+
															document.getElementById('or_nom_ct').value+';'+
															document.getElementById('or_nom_ct_tipo').value+';'+
															document.getElementById('or_dim_ct').value+';'+
															document.getElementById('or_dim_ct_tipo').value+';'+
															document.getElementById('bs_nom_uni').value+';'+
															document.getElementById('bs_dim_uni').value+';'+
															document.getElementById('or_nom_uni').value+';'+
															document.getElementById('or_nom_uni_tipo').value+';'+
															document.getElementById('or_dim_uni').value+';'+
															document.getElementById('or_dim_uni_tipo').value+';'+
															document.getElementById('bs_nom_zon').value+';'+
															document.getElementById('bs_dim_zon').value+';'+
															document.getElementById('or_nom_zon').value+';'+
															document.getElementById('or_nom_zon_tipo').value+';'+
															document.getElementById('or_dim_zon').value+';'+
															document.getElementById('or_dim_zon_tipo').value+';'
															);window.scrollTo(0,0);"
					>
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?= $texto['Pagina']?>: <?= $pagina ?> <?= $texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu(
															'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php',
															'pagina;inicio;Id_CT;Id_Uni;'+
															'bs_nom_ct;bs_dim_ct;'+
															'or_nom_ct;or_nom_ct_tipo;'+
															'or_dim_ct;or_dim_ct_tipo;'+
															'bs_nom_uni;bs_dim_uni;'+
															'or_nom_uni;or_nom_uni_tipo;'+
															'or_dim_uni;or_dim_uni_tipo;'+
															'bs_nom_zon;bs_dim_zon;'+
															'or_nom_zon;or_nom_zon_tipo;'+
															'or_dim_zon;or_dim_zon_tipo;',
															'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;<?=$Id_CT?>;<?=$Id_Uni?>;'+
															document.getElementById('bs_nom_ct').value+';'+
															document.getElementById('bs_dim_ct').value+';'+
															document.getElementById('or_nom_ct').value+';'+
															document.getElementById('or_nom_ct_tipo').value+';'+
															document.getElementById('or_dim_ct').value+';'+
															document.getElementById('or_dim_ct_tipo').value+';'+
															document.getElementById('bs_nom_uni').value+';'+
															document.getElementById('bs_dim_uni').value+';'+
															document.getElementById('or_nom_uni').value+';'+
															document.getElementById('or_nom_uni_tipo').value+';'+
															document.getElementById('or_dim_uni').value+';'+
															document.getElementById('or_dim_uni_tipo').value+';'+
															document.getElementById('bs_nom_zon').value+';'+
															document.getElementById('bs_dim_zon').value+';'+
															document.getElementById('or_nom_zon').value+';'+
															document.getElementById('or_nom_zon_tipo').value+';'+
															document.getElementById('or_dim_zon').value+';'+
															document.getElementById('or_dim_zon_tipo').value+';'
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
	<?php if(in_array("1051",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton"  onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/agr_zona.php','pagina;inicio;Id_Uni;Id_CT;bs_nom_ct;bs_dim_ct;bs_nom_uni;bs_dim_uni;bs_nom_zon;bs_dim_zon;or_nom_ct;or_dim_ct;or_nom_uni;or_dim_uni;or_nom_zon;or_dim_zon;or_nom_ct_tipo;or_dim_ct_tipo;or_nom_uni_tipo;or_dim_uni_tipo;or_nom_zon_tipo;or_dim_zon_tipo;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+<?=$Id_Uni?>+';'
								+<?=$Id_CT?>+';'
								+document.getElementById('bs_nom_ct').value+';'
								+document.getElementById('bs_dim_ct').value+';'
								+document.getElementById('bs_nom_uni').value+';'
								+document.getElementById('bs_dim_uni').value+';'
								+document.getElementById('bs_nom_zon').value+';'
								+document.getElementById('bs_dim_zon').value+';'
								+document.getElementById('or_nom_ct').value+';'
								+document.getElementById('or_dim_ct').value+';'
								+document.getElementById('or_nom_uni').value+';'
								+document.getElementById('or_dim_uni').value+';'
								+document.getElementById('or_nom_zon').value+';'
								+document.getElementById('or_dim_zon').value+';'
								+document.getElementById('or_nom_ct_tipo').value+';'
								+document.getElementById('or_dim_ct_tipo').value+';'
								+document.getElementById('or_nom_uni_tipo').value+';'
								+document.getElementById('or_dim_uni_tipo').value+';'
								+document.getElementById('or_nom_zon_tipo').value+';'
								+document.getElementById('or_dim_zon_tipo').value+
								';1;');"><?=$texto['TITULO_Agregar_Zon']?></button>
								
		<button class="boton"  onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/con_universidades.php','pagina;inicio;Id_CT;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;bs_nom_uni;bs_dim_uni;or_nom_uni;or_dim_uni;or_nom_uni_tipo;or_dim_uni_tipo;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+<?=$Id_CT?>+';'
								+document.getElementById('bs_nom_ct').value+';'
								+document.getElementById('bs_dim_ct').value+';'
								+document.getElementById('or_nom_ct').value+';'
								+document.getElementById('or_dim_ct').value+';'
								+document.getElementById('or_nom_ct_tipo').value+';'
								+document.getElementById('or_dim_ct_tipo').value+';'
								+document.getElementById('bs_nom_uni').value+';'
								+document.getElementById('bs_dim_uni').value+';'
								+document.getElementById('or_nom_uni').value+';'
								+document.getElementById('or_dim_uni').value+';'
								+document.getElementById('or_nom_uni_tipo').value+';'
								+document.getElementById('or_dim_uni_tipo').value+
								';1;');"><?=$texto['Regresar']?>
		</button>
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