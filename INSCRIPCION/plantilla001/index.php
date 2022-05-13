<!DOCTYPE html>
<html lang="es" class="no-js">
	
<?php
	/*****************************************************************************************/
	/******************************      PATH         ****************************************/
	/*****************************************************************************************/
	$path='../../';
	include($path."Include/Bd/bd.php");
	include($path."configuracion.php");
	
	/*****************************************************************************************/
	/******************************     Configuracion ****************************************/
	/*****************************************************************************************/
	$sql ="SELECT Nivel_Ubicacion_Conf, Id_Pai_Conf,Direccion_Carpeta_Conf, Direccion_Web_Conf,Pedir_Fecha_Nacimiento,Pedir_Grados_Academicos  FROM tab_configuracion WHERE Id_Conf = 1";
	$res_conf = seleccion($sql);
	
	$Nivel_Ubicacion_Conf = $res_conf[0]['Nivel_Ubicacion_Conf'];
	$Id_Pai_Conf = $res_conf[0]['Id_Pai_Conf'];
	$dominio = $res_conf[0]['Direccion_Web_Conf'];
	$ruta = $res_conf[0]['Direccion_Carpeta_Conf'];
	$Pedir_Grados_Academicos = $res_conf[0]['Pedir_Grados_Academicos'];
	$Pedir_Fecha_Nacimiento = $res_conf[0]['Pedir_Fecha_Nacimiento'];
	
	/*****************************************************************************************/
	/************ TIPO de Inscripcion: EMPRESA o ESTUDIANTE         **************************/
	/*****************************************************************************************/
	$Tipo = $_GET['Tipo'];
	$Titulo = "";
	if($Tipo == 'Estu'){
		$sql = "SELECT Titulo_Inscripcion_Estu_Conf FROM tab_configuracion WHERE Id_Conf = 1";
		$res_titulo = seleccion($sql);
		$Titulo = $res_titulo[0]['Titulo_Inscripcion_Estu_Conf'];
	}elseif($Tipo=='Emp'){
		$sql = "SELECT Titulo_Inscripcion_Emp_Conf FROM tab_configuracion WHERE Id_Conf = 1";
		$res_titulo = seleccion($sql);
		$Titulo = $res_titulo[0]['Titulo_Inscripcion_Emp_Conf'];
	}
	
	
	
	
	
?>
	<head>
		<!-- *********************************************** -->
		<!-- ****************** META  ********************** -->
		<!-- *********************************************** -->
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta name="description" content="<?=$texto['META_Description']?>" />
		<meta name="keywords" content="<?=$texto['META_keywords']?>" />
		<meta name="author" content="Gustavo Matamoros González" />
		
		<!-- *********************************************** -->
		<!-- **************** TITULO  ********************** -->
		<!-- *********************************************** -->
		<title><?=$Titulo?></title>
		
		
		<!-- ************************************************************************************************** -->
		<!-- *****************************************  LINK   ************************************************ -->
		<!-- ************************************************************************************************** -->
		<!-- Configuracion -->
		<link rel="shortcut icon" href="<?=$path?>favicon.ico">
		<!-- Externos -->
		<link rel="stylesheet" type="text/css" href="<?=$path?>css/EXTERNOS/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?=$path?>Include/Miniaplicaciones/texto_animado/jquery-letterfx.min.css" />
		<link rel="stylesheet" type="text/css" href="<?=$path?>Include/Miniaplicaciones/Subir_Archivos/dropify.min.css" />
		<!-- Internos -->
		<link rel="stylesheet" type="text/css" href="css/inscripcion_plantilla001.css" />
		
		<!-- ************************************************************************************************** -->
		<!-- ***************************************  SCRIPT ************************************************** -->
		<!-- ************************************************************************************************** -->
		<!-- Configuracion -->
		<script type="text/javascript" src="<?=$path?>lang/lang.<?=$idioma?>.js"></script>
		
		<!-- Externos -->
		<!-- pata tolltips -->
		<script src="<?=$path?>js/EXTERNAS/jquery-2.1.3.js"></script>
		<link rel="stylesheet" href="<?=$path?>Include/Miniaplicaciones/tooltips/examples.css">
		<link rel="stylesheet" href="<?=$path?>Include/Miniaplicaciones/tooltips/darktooltip.css">
		<script src="<?=$path?>Include/Miniaplicaciones/tooltips/jquery.darktooltip.js"></script>
		<script src="<?=$path?>Include/Miniaplicaciones/tooltips/examples.js"></script>

		<!-- mensajes de error -->
		<script src="<?=$path?>Include/Miniaplicaciones/notificaciones/notifyme.js"></script>
		<link rel="stylesheet" href="<?=$path?>Include/Miniaplicaciones/notificaciones/notifyme.css">
		
		<!-- datpicker -->
		<link rel="stylesheet" href="<?=$path?>Include/Miniaplicaciones/datepicker/themes/default.css">
		<link rel="stylesheet" href="<?=$path?>Include/Miniaplicaciones/datepicker/themes/default.date.css">


		<script src="<?=$path?>Include/Miniaplicaciones/texto_animado/jquery-letterfx.min.js"></script>
		<script src="<?=$path?>Include/Miniaplicaciones/Subir_Archivos/dropify.js"></script>
		<script src="<?=$path?>js/EXTERNAS/snap.svg-min.js"></script>
		<script src="<?=$path?>js/EXTERNAS/modernizr.custom.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		
		<!-- Internos -->
		<script src="<?=$path?>js/SAE/Ajax.js"></script>
		<script src="<?=$path?>js/SAE/validacion.js"> </script>
		<script src="<?=$path?>js/SAE/telefonos.js"> </script>
		<script src="<?=$path?>js/SAE/correos.js"> </script>
		<script src="<?=$path?>js/SAE/carreras.js"> </script>
		<script src="<?=$path?>js/SAE/inscripcion.js"> </script>
		
		
		
	</head>
	<body>
			<!-- ************************************************************************************************** -->
			<!-- ***************************************  HIDDEN ************************************************** -->
			<!-- ************************************************************************************************** -->
			<input type="hidden" id="Nivel_Ubicacion_Conf" name="Nivel_Ubicacion_Conf" value="<?=$Nivel_Ubicacion_Conf?>" />
			<input type="hidden" name="dominio" id="dominio" value="<?= $dominio ?>" />
			<input type="hidden" name="ruta" id="ruta" value="<?= $ruta ?>" />
			<input type="hidden" name="Tipo" id="Tipo" value="<?= $Tipo ?>" />
		
		
		
			<!-- ************************************************************************************************** -->
			<!-- ***************************************  Contenedor   ******************************************** -->
			<!-- ************************************************************************************************** -->
			<div class="container">
				<div id="slideshow" class="slideshow">
					<ul id="ul_principal">
						
						
						
						
						
						
						
						
						
						
						
						<!-- ************************************************************************************************** -->
						<!-- *********************************  TAB Datos Personales   **************************************** -->
						<!-- ************************************************************************************************** -->
						<li id="li_tab01">
							<div class="slide">
								
								
								<!-- ************************************************************* -->
								<!-- ******************* Titulo    ******************************* -->
								<!-- ************************************************************* -->
								<div id="Titulo_Adentro">
									<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?=$Titulo?></span>
								</div>
								
								
								<!-- ************************************************************* -->
								<!-- ******************* Datos Personales  *********************** -->
								<!-- ************************************************************* -->
								<div class="contenedor">
									<h1><?=$texto['FI_Tab01']?>:</h1>
									<label><?=$texto['Foto']?>:</label>
									<div id="div_foto">
										<input type="file" id="foto" name="foto" class="dropify" data-default-file="<?=$path?>img/Usuarios/default.png" data-height="100" />
									</div>
									<br />
									<label><?=$texto['Tipo_Indetificacion']?>:</label>
									<select id="TI" name="TI" disabled="disabled" >
										<option value="1"><?=$texto['Cedula']?></option>
										<option value="2"><?=$texto['Pasaporte']?></option>
										<option value="3"><?=$texto['Residencia']?></option>
									</select>
									<label><?=$texto['Cedula'] ?>:</label>
									<input type="text" name="txt_cedula" id="txt_cedula" placeholder="<?=$texto['placeholder_Cedula']?>" required onkeyup="mascara(this,'-',patron_cedula,true)" maxlength="11" />
									<label><?=$texto['Nombre']?>:</label>
									<input type="text" name="txt_nombre" id="txt_nombre" placeholder="<?=$texto['placeholder_Nombre']?>" required />
									<label><?=$texto['Primer_Apellido']?>:</label>
									<input type="text" name="txt_ape1" id="txt_ape1" placeholder="<?=$texto['placeholder_Primer_Apellido']?>" required />
									<label><?=$texto['Segundo_Apellido']?>:</label>
									<input type="text" name="txt_ape2" id="txt_ape2" placeholder="<?=$texto['placeholder_Segundo_Apellido']?>" />
									
									<?php
										//Si se debe pedir fecha de nacimiento
										if($Pedir_Fecha_Nacimiento=='1'){
									?>
										<label><?=$texto['Fecha_Nacimiento']?>:</label>
										<input id="Fecha_Nacimiento" name="Fecha_Nacimiento" type="text">
										<input id="campo_Fecha_Nacimiento" name="campo_Fecha_Nacimiento" type="hidden">
									
									<?php
										}
									?>
									
									
									<label><?=$texto['Genero']?>:</label>
									<select name="genero" id="genero">
										<option value="0"><?=$texto['Seleccione']?></option>
										<option value="1"><?=$texto['Masculino']?></option>
										<option value="2"><?=$texto['Femenino']?></option>
									</select>
									<?php
										//Si se debe pedir fecha de nacimiento
										if($Pedir_Grados_Academicos=1){
									?>
										<label><?=$texto['Grado_Academico']?>:</label>
										<select name="grado_academico" id="grado_academico">
											<option value="0"><?=$texto['Seleccione']?></option>
											<?php
												$sql = "SELECT Id_GA, Nombre_GA FROM tab_grados_academicos WHERE Activo_GA = '1' ORDER BY Id_GA";
												$res_ga = seleccion($sql);
												for($i=0; $i<count($res_ga);$i++){
											?>
												<option value="<?=$res_ga[$i]['Id_GA']?>"><?=$res_ga[$i]['Nombre_GA']?></option>
											
											<?php		
												}
												
											?>
										</select>
									<?php
										}
									?>
									
									<?php
										if($Tipo =='Estu'){
											$valor = 6;
										}elseif($Tipo=='Emp'){
											$valor = 5;
										}
									?>
									<label class="derecha"><?=$texto['Paso']?> 1 <?=$texto['de']?> <?=$valor?></label>
								</div>
								<!-- ************************************************************* -->
								<!-- **************** FIN Datos Personales  ********************** -->
								<!-- ************************************************************* -->
							</div>
						</li>
						
						
						
						
						
						
						
						
						
						
						
						<!-- ************************************************************************************************** -->
						<!-- *********************************    TAB Ubicacion    ******************************************** -->
						<!-- ************************************************************************************************** -->
						<li id="li_tab02">
							<div class="slide">
								<div class="contenedor2">
									<!-- ************************************************************* -->
									<!-- ******************* Titulo    ******************************* -->
									<!-- ************************************************************* -->
									<h1><?=$texto['Datos_Ubicacion']?>:</h1>
									
									<!-- ************************************************************* -->
									<!-- ******************* Paises    ******************************* -->
									<!-- ************************************************************* -->
									<?php
									if($Nivel_Ubicacion_Conf>=1){
										$sql = "SELECT Id_Pai, Nombre_Pai FROM tab_paises WHERE Activo_Pai = '1'";
										$res_pai = seleccion($sql);
									?>
										<label>País:</label>
										<select name="paises" id="paises"  <?php if ($Nivel_Ubicacion_Conf>1){?>onchange="Habilitar_Provincia('<?=$path?>')" <?php } ?>>
											<option value="0"><?=$texto['Seleccione']?></option>
											<?php
												
											
												for($i=0;$i<count($res_pai);$i++){
													echo("<option value='".$res_pai[$i]["Id_Pai"]."'");
														if($res_pai[$i]["Id_Pai"]==$res_conf[0]['Id_Pai_Conf']){
															echo(" selected='selected'");
														}
														
													echo(" >".$res_pai[$i]["Nombre_Pai"]."</option>");
												}
											?>
										</select>
									<?php
									}
									?>
									<!-- ************************************************************* -->
									<!-- ******************* Provincias ****************************** -->
									<!-- ************************************************************* -->
									<?php
									if($res_conf[0]['Nivel_Ubicacion_Conf']>=2){
										$sql = "SELECT Id_Pro, Nombre_Pro FROM tab_provincias WHERE Activo_Pro = '1' AND Id_Pai_Pro = ".$Id_Pai_Conf;
										$res_pro = seleccion($sql);
									?>
									<div id="div_provincias" >
										<label><?=$texto['Provincia']?>:</label>
										<select name="provincias" id="provincias"  <?php if ($Nivel_Ubicacion_Conf>2){?>onchange="Habilitar_Canton('<?=$path?>')" <?php } ?>>
											<option value="0"><?=$texto['Seleccione']?></option>
											<?php
												for($i=0;$i<count($res_pro);$i++){
													echo('<option value="'.$res_pro[$i]["Id_Pro"].'">'.$res_pro[$i]["Nombre_Pro"].'</option>');
												}
											?>
										</select>
									 </div>
									<?php
									}
									?>
									<!-- ************************************************************* -->
									<!-- ******************* Cantones   ****************************** -->
									<!-- ************************************************************* -->
									<?php
									if($res_conf[0]['Nivel_Ubicacion_Conf']>=3){
									?>
									<div id="div_cantones" >
										<label><?=$texto['Canton']?>:</label>
										<select name="cantones" id="cantones" disabled="disabled">
												<option value="0"><?=$texto['Seleccione']?></option>
										</select>
									</div>
									<?php
									}
									?>
									<!-- ************************************************************* -->
									<!-- ******************* Distritos  ****************************** -->
									<!-- ************************************************************* -->
									<?php
									if($res_conf[0]['Nivel_Ubicacion_Conf']>=4){
									?>
									<div id="div_distritos" >
										<label><?=$texto['Distrito']?>:</label>
										<select name="distritos" id="distritos" disabled="disabled">
												<option value="0"><?=$texto['Seleccione']?></option>
										</select>
									</div>
									<?php
									}
									?>
									<label><?=$texto['Direccion_Exacta']?>:</label>
									<textarea class="textarea" id="direccion" name="direccion"></textarea>
									<label class="derecha"><?=$texto['Paso']?> 2 <?=$texto['de']?> <?=$valor?></label>
								</div>
							</div>
						</li>
						
						
						
						
						
						
						
						
						
						
						
						
						<!-- ************************************************************************************************** -->
						<!-- *********************************    TAB Telefonos    ******************************************** -->
						<!-- ************************************************************************************************** -->
						<li id="li_tab03">
							<div class="slide">
								<div class="contenedor2">
									<!-- ************************************************************* -->
									<!-- ******************* Titulo    ******************************* -->
									<!-- ************************************************************* -->
									<h1><?=$texto['Telefonos']?>:</h1>
									
									<!-- ************************************************************* -->
									<!-- ******************* Formulario ****************************** -->
									<!-- ************************************************************* -->
									<table class="estilo_tabla">
										<tr class="fila">
											<td class="fondo_celeste columna" colspan="2" style="width: 50%"><?=$texto['Tipo_Telefono']?>:</td>
											<td class="fondo_celeste columna" colspan="2"><?=$texto['Numero']?>:</td>
										</tr>
										<tr class="fila">
											<td colspan="2" class="fondo_blanco columna">
												<select name="tipo_tel" id="tipo_tel" class="tipo_telefono">
													<option value="0" ><?=$texto['Seleccione']?></option>
													<?php
													$sql = "SELECT Id_Tip_Tel, Nombre_Tip_Tel FROM tab_tipos_telefonos WHERE Activo_Tip_Tel = '1'";
													$tipos_tel = seleccion($sql);
													for ($i = 0; $i < count($tipos_tel); $i++) {
													?>
														<option value="<?=$tipos_tel[$i]["Id_Tip_Tel"] ?>"><?= $tipos_tel[$i]["Nombre_Tip_Tel"] ?></option>
												 <?php } ?>
												</select>
											</td>
											<td colspan="2" class="fondo_blanco columna">
												<input type="text" name="telefono"  id="telefono"  maxlength="8" size="8" class="input_numero" onKeyPress="return soloNumeros(event)" >
												<span class="texto_nota"><?=$texto['NOTA_Ejemplo_Telefono']?></span>
											</td>
										</tr>
										<tr class="fila">
											<td class="fondo_celeste columna" style="width: 30%; height:35px;" ><?=$texto['Notificacion']?>:</td>
											<td class="fondo_blanco columna">
												<input type="checkbox" id="ch_noti_tel" name="ch_noti_tel" class="input_check" />
											</td>
											<td class="fondo_celeste columna" style="width: 30%" ><?=$texto['Publico']?>:</td>
											<td class="fondo_blanco columna">
												<input type="checkbox" id="ch_publi_tel" name="ch_publi_tel" class="input_check" />
											</td>
										</tr>
									</table>
									<br />
									<!-- ************************************************************* -->
									<!-- ******************* Boton     ******************************* -->
									<!-- ************************************************************* -->
									<input type="button" name="ag_tel" id="ag_tel" value="<?=$texto['Agregar_Telefono']?>"
												class="btn_agregar"
												onclick="return Agregar_Telefono('tipo_tel','telefono','ch_noti_tel','ch_publi_tel','fila_telefonos','cant_tel','cant_tel_falsa')"  />
									
									<!-- ************************************************************* -->
									<!-- ******************* Titulo2    ****************************** -->
									<!-- ************************************************************* -->
									<h1><?=$texto['Agregados_Telefonos']?>:</h1>
									
									<!-- ************************************************************* -->
									<!-- ************ Telefonos Agregados    ************************* -->
									<!-- ************************************************************* -->
									<table class="estilo_tabla">
										<tr id="tab_tel_agr">
											<td  class="fondo_celeste columna"><?=$texto['Numero']?></td>
											<td  class="fondo_celeste columna"><?=$texto['Tipo_Telefono']?></td>
											<td  class="fondo_celeste columna"><?=$texto['Notificacion']?></td>
											<td  class="fondo_celeste columna"><?=$texto['Publico']?></td>
											<td  class="fondo_celeste columna"><?=$texto['Eliminar']?></td>
										</tr>
										<tbody id='fila_telefonos'>
										</tbody>
									</table>
									<br />
									<label class="derecha"><?=$texto['Paso']?> 3 <?=$texto['de']?> <?=$valor?></label>
									<!-- ************************************************************* -->
									<!-- ************           Hidden       ************************* -->
									<!-- ************************************************************* -->
									<input type="hidden" name="cant_tel"   id="cant_tel" value="0" />
									<input type="hidden" name="cant_tel_falsa"   id="cant_tel_falsa" value="0" />
								</div>
							</div>
						</li>
						
						
						
						
						
						
						
						
						
						
						<!-- ************************************************************************************************** -->
						<!-- *********************************    TAB Correos      ******************************************** -->
						<!-- ************************************************************************************************** -->
						<li id="li_tab04">
							<div class="slide">
								<div class="contenedor2">
									<!-- ************************************************************* -->
									<!-- ******************* Titulo    ******************************* -->
									<!-- ************************************************************* -->
									<h1><?=$texto['Correos']?>:</h1>
									
									<!-- ************************************************************* -->
									<!-- ******************* Formulario ****************************** -->
									<!-- ************************************************************* -->
									<table class="estilo_tabla">
										<tr>
											<td class="fondo_celeste" ><?=$texto['Correo']?></td>
											<td class="fondo_blanco" colspan='3'>
												<input type="text" name="correo"  id="correo" maxlength="150" class="input_numero">
												 
											</td>
										</tr>
										<tr class="fila">
											<td class="fondo_celeste columna" style="width: 30%; height:35px;" ><?=$texto['Notificacion']?>:</td>
											<td class="fondo_blanco columna">
												<input type="checkbox" id="ch_noti_cor" name="ch_noti_cor" class="input_check" />
											</td>
											<td class="fondo_celeste columna" style="width: 30%" ><?=$texto['Publico']?>:</td>
											<td class="fondo_blanco columna">
												<input type="checkbox" id="ch_publi_cor" name="ch_publi_cor" class="input_check" />
											</td>
										</tr>
									</table>
									
									<br />
									<!-- ************************************************************* -->
									<!-- ******************* Boton     ******************************* -->
									<!-- ************************************************************* -->
									<input type="button" name="agr_cor" id="agr_cor" value="<?=$texto['Agregar_Correo']?>"
											class="btn_agregar"
											onclick="Agregar_Correo('correo','ch_noti_cor','ch_publi_tel','fila_correos','cant_cor','cant_correos_falsa')" />
									
									<!-- ************************************************************* -->
									<!-- ******************* Titulo2    ****************************** -->
									<!-- ************************************************************* -->
									<h1><?=$texto['Agregados_Correos']?>:</h1>
									
									<!-- ************************************************************* -->
									<!-- ************   Correos Agregados    ************************* -->
									<!-- ************************************************************* -->
									<table class="estilo_tabla">
										<tr id="tab_cor_agr" name="tab_cor_agr">
											<td  class="fondo_celeste columna"><?=$texto['Correo']?></td>
											<td  class="fondo_celeste columna"><?=$texto['Notificacion']?></td>
											<td  class="fondo_celeste columna"><?=$texto['Publico']?></td>
											<td  class="fondo_celeste columna"><?=$texto['Eliminar']?></td>
										</tr>
									
										<tbody id='fila_correos'>
										</tbody>
									</table>
									<br />
									<label class="derecha"><?=$texto['Paso']?> 4 <?=$texto['de']?> <?=$valor?></label>
									<!-- ************************************************************* -->
									<!-- ************           Hidden       ************************* -->
									<!-- ************************************************************* -->
									<input type="hidden" name="cant_cor"   id="cant_cor" value="0" />
									<input type="hidden" name="cant_correos_falsa"   id="cant_correos_falsa" value="0" /> 
								</div>
							</div>
						</li>
						
						
						
						
						
						<!-- ************************************************************************************************** -->
						<!-- *********************************    TAB Universidades      ************************************** -->
						<!-- ************************************************************************************************** -->
						<?php
							if($Tipo == 'Estu'){
						
						?>
								<li id="li_tab05">
									<div class="slide">
										<div class="contenedor2">
											<!-- ************************************************************* -->
											<!-- ******************* Titulo    ******************************* -->
											<!-- ************************************************************* -->
											<h1><?=$texto['Educacion']?>:</h1>
											
											<table class="estilo_tabla">
												<tr>
													<td class="fondo_celeste" style="width: 40%;">
														<?= $texto['Seleccione_Centro']?>:
													</td>
													<td class="fondo_blanco">
														<select name="Id_CT" id="Id_CT"  onchange="Habilita_Universidad('../../','1')" >
														 <option value="0" selected="selected" ><?= $texto['Seleccione'] ?></option>
														 <?php
																   $sql ="SELECT Id_CT, Nombre_CT, Diminutivo_CT FROM tab_centros_trabajos WHERE Activo_CT = 1 ORDER BY Nombre_CT";
																   $res_ct = seleccion($sql);
																   for($i=0;$i <count($res_ct);$i++){
																   
																   ?>
																	   <option value="<?=$res_ct[$i]['Id_CT']?>"><?=$res_ct[$i]['Diminutivo_CT']?> / <?=$res_ct[$i]['Nombre_CT']?> </option>
																   <?php
																   } 
																   ?>
														</select>
													</td>
												</tr>
												<tr>
													<td class="fondo_celeste" style="width: 40%;">
														<?= $texto['Seleccione_Universidad']?>:
													</td>
													<td class="fondo_blanco" id="contenedor_universidad"> 
														<select name="Id_Uni" id="Id_Uni"  onchange="Habilita_Escuela('../../')" disabled="disabled" >
															<option value="0" selected="selected" ><?= $texto['Seleccione'] ?></option>
														</select>
													</td>
												</tr>
												<tr>
													<td class="fondo_celeste"><?= $texto['Seleccione_Escuela']?>:</td>
													<td id="contenedor_escuela" class="fondo_blanco">
														<select name="Id_Esc" id="Id_Esc" disabled="disabled">
															<option value="0" ><?= $texto['Seleccione'] ?></option>
														</select>
													</td>
												</tr>
												<tr>
													<td class="fondo_celeste"><?= $texto['Seleccione_Carrera']?>:</td>
													<td id="contenedor_carrera" class="fondo_blanco">
														<select name="Id_Car" id="Id_Car" disabled="disabled" >
															<option value="0" ><?= $texto['Seleccione'] ?></option>
														</select>
													</td>
												</tr>
											</table>
											<br />
											<!-- ************************************************************* -->
											<!-- ******************* Boton     ******************************* -->
											<!-- ************************************************************* -->
											<input type="button" name="btn_agr_car" id="btn_agr_car" value="<?=$texto['Agregar_Universidad']?>"
													class="btn_agregar"
													onclick="AgregarUniversidad()" />
										
											<!-- ************************************************************* -->
											<!-- ******************* Titulo2    ****************************** -->
											<!-- ************************************************************* -->
											<h1><?=$texto['Agregados_Carreras']?>:</h1>
										
											<!-- ************************************************************* -->
											<!-- ************   Carreras Agregadas   ************************* -->
											<!-- ************************************************************* -->
											<table class="estilo_tabla">
												<tr id="tab_car_agr">
													<td  class="fondo_celeste columna"><?=$texto['Centro_Trabajo']?></td>
													<td  class="fondo_celeste columna"><?=$texto['Universidad']?></td>
													<td  class="fondo_celeste columna"><?=$texto['Escuela']?></td>
													<td  class="fondo_celeste columna"><?=$texto['Carrera']?></td>
													<td  class="fondo_celeste columna" style="width: 100px;"><?=$texto['Eliminar']?></td>
												</tr>
											
												<tbody id='fila_carreras'>
												</tbody>
											</table>
											
											<br />
											<label class="derecha"><?=$texto['Paso']?> 5 <?=$texto['de']?> <?=$valor?></label>
											
											<input type="hidden" name="cant_car"   id="cant_car" value="0" />
											<input type="hidden" name="cant_car_falsa"   id="cant_car_falsa" value="0" />
										</div>
									</div>
								</li>
						<?php } ?>
						
						
						<!-- ************************************************************************************************** -->
						<!-- *********************************      TAB Usuario          ************************************** -->
						<!-- ************************************************************************************************** -->
						<li id="li_tab06">
							<div class="slide">
								<div class="contenedor2">
									<!-- ************************************************************* -->
									<!-- ******************* Titulo    ******************************* -->
									<!-- ************************************************************* -->
									<h1><?=$texto['Datos_Usuario']?>:</h1>
									
									
									<label><?=$texto['Usuario']  ?>:</label>
									<input type="text" name="id_usuario" id="id_usuario" disabled="disabled"/>
									<label><?=$texto['Contrasena']  ?>:</label>
									<input type="text" name="contrasenna" id="contrasenna" disabled="disabled"/>
									<br />
									<label class="derecha"><?=$texto['Paso']?> <?=$valor?> <?=$texto['de']?> <?=$valor?></label>
									<br />
									<br />
									<button class="btn_guardar_datos" onclick="guardarDatosInscripcion();"><?= $texto['BTN_Guardar_Datos']?></button>
									
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div><!-- /container -->
		<script src="<?=$path?>js/EXTERNAS/classie.js"></script>
		<script src="<?=$path?>js/EXTERNAS/sliderFx.js"></script>
		<script src="<?=$path?>Include/Miniaplicaciones/datepicker/picker.js"></script>
		<script src="<?=$path?>Include/Miniaplicaciones/datepicker/picker.date.js"></script>
		<script>
			(function() {
				new SliderFx( document.getElementById('slideshow'), {
					easing : 'cubic-bezier(.8,0,.2,1)'
				} );
			})();
			
			$(document).ready(function(){
	
                // Basic
                $('.dropify').dropify();
				
				$('#div_foto').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Foto']?>"
				});
				$('#nombre').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_nombre']?>"
				});
				$('#ape1').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_ape1']?>"
				});
				$('#ape2').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_ape2']?>"
				});
				$('#genero').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_genero']?>"
				});
				$('#paises').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_paises']?>"
				});
				$('#provincias').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_provincias']?>"
				});
				$('#cantones').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_cantones']?>"
				});
				$('#distritos').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_distritos']?>"
				});
				$('#direccion').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_direccion']?>"
				});
				$('#tipo_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Tipo_Telefono']?>"
				});
				$('#telefono').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Telefono']?>"
				});
				$('#ch_noti_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Noti_Tel']?>"
				});
				$('#ch_publi_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Publi_Tel']?>"
				});
				$('#ag_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_btn_Agr_Tel']?>"
				});
				$('#tab_tel_agr').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_tab_tel_agr']?>"
				});
				$('#correo').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Correo']?>"
				});
				$('#ch_noti_cor').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Noti_Cor']?>"
				});
            
				$('#ch_publi_cor').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Publi_Cor']?>"
				});
				$('#agr_cor').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_btn_Agr_Cor']?>"
				});

				$('#tab_cor_agr').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_tab_cor_agr']?>"
				});
				$('#Id_CT').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_INS_CT']?>"
				});
				$('#Id_Uni').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_INS_UNI']?>"
				});
				$('#Id_Esc').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_INS_ESC']?>"
				});
				$('#Id_Car').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_INS_CAR']?>"
				});
				$('#btn_agr_car').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_btn_Agr_Car']?>"
				});
				$('#tab_car_agr').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_tab_car_agr']?>"
				});
				$('#Fecha_Nacimiento').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_fecha_nacimiento']?>"
				});
				$('#grado_academico').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', // 
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_grado_academico']?>"
				});
				
							
            });
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
			
			 $('#Fecha_Nacimiento').pickadate({
					monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ], //Nombre de los mese full
					monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ], //Nombre corto de los meses
					weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ], //Nombre largo dias
					weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb' ], //nombre corto dias
					today: 'Hoy', //hoy
					clear: 'Borrar Fecha', //borrar campo
					close: 'Cerrar', //cerrar calendario
					firstDay: 1, //primer dia de la semana 1=lunes
					showmonthsFull: true, //mostrar nombre largo meses
					
					formatSubmit: 'dd/mm/yyyy', //Formato de envio
					hiddenPrefix: 'campo_', //prefijo del campo oculto formato anterio correcto
					hiddenName: true, //Oculta el campo oculto y le quita el prefijo
					selectYears: 80,
					closeOnSelect: true,
					closeOnClear: true
					//min: new Date(2015,3,20), //Rangos de fechas
					//max: new Date(2015,7,14)
				   /* disable: [ //Deshabilitar fechas
						new Date(2015,3,13),
						new Date(2015,3,29)
					  ]
					*/
				   /*
				   
					onStart: function() {
						console.log('Hello there :)')
					  },
					  onRender: function() {
						console.log('Whoa.. rendered anew')
					  },
					  onOpen: function() {
						console.log('Opened up')
					  },
					  onClose: function() {
						console.log('Closed now')
					  },
					  onStop: function() {
						console.log('See ya.')
					  },
					  onSet: function(context) {
						console.log('Just set stuff:', context)
					  }
				   */
				   
				});
			 
			 
		</script>
		<button onclick="window.SliderFx.prototype._navigate('prev');">hola</button>
	</body>
</html>