<!DOCTYPE html>
<?php
	/********************************************************************************************/
	/*Licencia SAE
	
	Es condición necesaria para la utilización, modificación, distribución, ingeniería inversa o cualquier  otro procedimiento informático que haga necesario el acceso al código fuente del Sistema de Administración Empresarial (SAE) desarrollado por Gustavo Matamoros González cédula 1-1162-0857 el consentimiento del mismo.
	
	APLICABILIDAD Y DEFINICIONES
	
	Esta Licencia se aplica al Sistema de Administración Empresarial, en cualquier medio convencional ó electrónico, autorizando al autor del sistema a distribuirlo bajo los términos descritos en los apartados posteriores.  En adelante la palabra Sistema se referirá al código fuente del Sistema de  Administración Empresarial. Cualquier persona es un licenciatario y será referido como Usted. Usted acepta la licencia si copia, modifica o distribuye el Sistema de cualquier modo que requiera permiso según la ley de propiedad intelectual.
	
	CONDICIONES DE LICENCIA
	
	Reconocimiento: En cualquier explotación del Sistema será necesario el reconocimiento de la autoría individual o colectiva.
	No Comercial: En cualquier explotación del Sistema no se permite el uso comercial ó el uso con cualquier finalidad comercial.
	Obra Derivada: En cualquier explotación del Sistema no se permite la obra derivada del mismo.
	Redistribución: En cualquier explotación del Sistema no se permite la distribución y copia del mismo.
	Publicidad: Con esta licencia el autor del Sistema no da permiso para usar su nombre para publicidad ni para asegurar o implicar aprobación de cualquier versión modificada.
	Compartir Igual: La explotación autorizada incluye la creación de obras derivadas siempre que mantenga la misma licencia al ser divulgadas.
	Uso exclusivo: En cualquier explotación del Sistema será de autorizado por el autor del sistema.
	TRADUCCIÓN
	La Traducción es considerada como un tipo de modificación, por lo que Usted no puede distribuir traducciones del Sistema.
	
	TERMINACIÓN
	Usted no puede copiar, modificar, sublicenciar o distribuir el Sistema salvo por lo permitido expresamente bajo esta Licencia. Cualquier intento en otra manera de copia, modificación, sublicenciamiento, o distribución de él es nulo, y dará por terminados automáticamente sus derechos bajo esa Licencia.
	Si usted viola  esta Licencia, aplicará la licencia titular de copyright ó derechos de autor, quedando restaurada provisionalmente, a menos y hasta que el titular del copyright ó derechos de autor explícita y finalmente termine su licencia.
	*/
	/********************************************************************************************/
	
	//Codificacion UTF-8
	header('Content-Type: text/html; charset=utf-8');
	
	//Zona Horaria
	date_default_timezone_set('America/Costa_Rica');
	
	
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
<html lang="es">
    <head>
        <!-- *********************************************** -->
		<!-- ****************** META  ********************** -->
		<!-- *********************************************** -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
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
		<link rel="stylesheet" type="text/css" href="css/inscripcion_plantilla002.css" />
		
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
		
		<!-- datepicker -->
		<link rel='stylesheet prefetch' href='<?=$path?>css/EXTERNOS/font-awesome.min.css'>
		<link rel="stylesheet" href="<?=$path?>Include/Miniaplicaciones/datepicker2/datepicker2.css">
		
		
		<script src="<?=$path?>Include/Miniaplicaciones/texto_animado/jquery-letterfx.min.js"></script>
		<script src="<?=$path?>Include/Miniaplicaciones/Subir_Archivos/dropify.js"></script>
		<script src="<?=$path?>js/EXTERNAS/modernizr.custom.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		
		<!-- Internos -->
		<script src="<?=$path?>js/SAE/interpretadorAjax.js"> </script>
		<script src="<?=$path?>js/SAE/hex_md5.js"> </script>
		<script src="<?=$path?>js/SAE/Ajax.js"></script>
		<script src="<?=$path?>js/SAE/validacion.js"> </script>
		<script src="<?=$path?>js/SAE/telefonos.js"> </script>
		<script src="<?=$path?>js/SAE/correos.js"> </script>
		<script src="<?=$path?>js/SAE/carreras.js"> </script>
		<script src="js/inscripcion_plantilla002.js"> </script>
		<script>
			
		</script>
    </head>
    <body>
		<!-- ************************************************************************************************** -->
		<!-- ***************************************  HIDDEN ************************************************** -->
		<!-- ************************************************************************************************** -->
		<input type="hidden" id="Nivel_Ubicacion_Conf" name="Nivel_Ubicacion_Conf" value="<?=$Nivel_Ubicacion_Conf?>" />
		<input type="hidden" id="Pedir_Fecha_Nacimiento" name="Pedir_Fecha_Nacimiento" value="<?=$Pedir_Fecha_Nacimiento?>" />
		<input type="hidden" id="Pedir_Grados_Academicos" name="Pedir_Grados_Academicos" value="<?=$Pedir_Grados_Academicos?>" />
		<input type="hidden" name="dominio" id="dominio" value="<?= $dominio ?>" />
		<input type="hidden" name="ruta" id="ruta" value="<?= $ruta ?>" />
		<input type="hidden" name="Tipo" id="Tipo" value="<?= $Tipo ?>" />
			
			
		<!-- ************************************************************* -->
		<!-- ******************* Titulo    ******************************* -->
		<!-- ************************************************************* -->
		<h1 class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?=$Titulo?></h1>
		
		
		
        <div class="wrapper">
				
				
				
				
				<!-- ************************************************************* -->
				<!-- *******************    Fotografia     *********************** -->
				<!-- ************************************************************* -->
                <div id="TAB01">
					<fieldset>
					
						<!-- Titulo de seccion -->
						<legend><span class="number">1</span> <?=$texto['Foto']?>:</legend>
					
						<div id="div_foto">
							<input type="file" id="foto" name="foto" class="dropify" data-default-file="<?=$path?>img/Usuarios/default.png" data-height="100" />
						</div>
						<div class="derecha">
							<button class="boton2" onclick="CambiaTAB('TAB01','TAB02')"><?=$texto['Siguiente']?></button>	
						</div>
					</fieldset>
				</div>
					
				
				
				
				
				
				
				
				
				
				
				
				
				<!-- ************************************************************* -->
				<!-- ******************* Datos Personales  *********************** -->
				<!-- ************************************************************* -->
                <div id="TAB02" style="display: none;">
					<fieldset>
						<!-- Titulo de seccion -->
						<legend><span class="number">2</span><?=$texto['FI_Tab01']?>:</legend>
                    
					
						<div class="row">
							<select id="TI" name="TI" class="estilo_input" onchange="CambiarValidacion()">
								<option value="1" selected="selected"><?=$texto['Cedula']?></option>
								<option value="2"><?=$texto['Residencia']?></option>
								<option value="3"><?=$texto['Pasaporte']?></option>
							</select>
							<label for="TI"><?=$texto['Tipo_Indetificacion']?>:</label>
						</div>
						
						<div class="row" id="fila_txt_cedula">
							<input type="text" name="txt_cedula" id="txt_cedula" placeholder="<?=$texto['PLACEHOLDER_Digite_Cedula_Grande']?>"
							    onkeyup="mascara(this,'-',patron_cedula,true); CargaIdentificacion('txt_cedula');"
								onblur="VerificaIdentificacion_Inscripcion('../../',this.value,'txt_cedula')";
								maxlength="11" class="estilo_input"/>
							<label for="txt_cedula"><?=$texto['Cedula'] ?>:</label>
						</div>
						<div class="row" id="fila_txt_residencia" style="display: none;">
							<input type="text" name="txt_residencia" id="txt_residencia" placeholder="<?=$texto['PLACEHOLDER_Digite_Residencia'] ?>"
								onkeypress="return soloNumeros(event)"
								onkeyup="CargaIdentificacion('txt_residencia');"
								onblur="VerificaIdentificacion_Inscripcion('../../',this.value,'txt_residencia')";
								maxlength="13" class="estilo_input"/>
							<label for="txt_residencia"><?=$texto['Residencia'] ?>:</label>
						</div>
						<div class="row" id="fila_txt_pasaporte" style="display: none;">
							<input type="text" name="txt_pasaporte" id="txt_pasaporte" placeholder="<?=$texto['PLACEHOLDER_Digite_Pasaporte']?>"
								onkeyup="CargaIdentificacion('txt_pasaporte');"
								onblur="VerificaIdentificacion_Inscripcion('../../',this.value,'txt_pasaporte')";
								maxlength="16" class="estilo_input"/>
							<label for="txt_pasaporte"><?=$texto['Pasaporte'] ?>:</label>
						</div>
						
						<div class="row">
							<input type="text" name="txt_nombre" id="txt_nombre" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre']?>" class="estilo_input"/>
							<label for="txt_nombre"><?=$texto['Nombre']?>:</label>
						</div>
						
						<div class="row">
							<input type="text" name="txt_ape1" id="txt_ape1" placeholder="<?=$texto['PLACEHOLDER_Digite_Primer_Apellido']?>" class="estilo_input"/>
							<label for="txt_ape1"><?=$texto['Primer_Apellido']?>:</label>
						</div>
						
						
						<div class="row">
							<input type="text" name="txt_ape2" id="txt_ape2" placeholder="<?=$texto['PLACEHOLDER_Digite_Segundo_Apellido']?>" class="estilo_input"/>
							<label for="txt_ape2"><?=$texto['Segundo_Apellido']?>:</label>
						</div>
						<?php
							//Si se debe pedir fecha de nacimiento
							if($Pedir_Fecha_Nacimiento=='1'){
						?>
						<div class="row">
							<input type="text" name="Fecha_Nacimiento" id="Fecha_Nacimiento" placeholder="<?=$texto['PLACEHOLDER_Seleccione_Fecha_Nacimiento']?>" class="estilo_input" readonly/>
							<label for="Fecha_Nacimiento"><?=$texto['Fecha_Nacimiento']?>:</label>
						</div>
						<?php
							}
						?>
						<div class="row">
							<select name="genero" id="genero" class="estilo_input">
								<option value="0" ><?=$texto['Seleccione']?></option>
								<option value="1"><?=$texto['Masculino']?></option>
								<option value="2"><?=$texto['Femenino']?></option>
							</select>
							<label for="genero"><?=$texto['Genero']?>:</label>
						</div>
						
						<?php
							//Si se debe pedir fecha de nacimiento
							if($Pedir_Grados_Academicos==1){
						?>
								<div class="row">
									<select name="grado_academico" id="grado_academico" class="estilo_input">
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
									<label><?=$texto['Grado_Academico']?>:</label>
								</div>
						<?php
							}
						?>
						<div class="derecha">
							<button class="boton2" onclick="CambiaTAB('TAB02','TAB01')"><?=$texto['Anterior']?></button>
							<button class="boton2" onclick="CambiaTAB('TAB02','TAB03')"><?=$texto['Siguiente']?></button>	
						</div>
					</fieldset>
				</div>
				<!-- ************************************************************* -->
				<!-- **************** FIN Datos Personales  ********************** -->
				<!-- ************************************************************* -->
								
				
				
				
				
				
				
				
				
				
				
				
				
				
								
				<!-- ************************************************************************************************** -->
				<!-- *********************************    TAB Ubicacion    ******************************************** -->
				<!-- ************************************************************************************************** -->				
				<div id="TAB03" style="display: none;">
					<fieldset>
						<!-- ************************************************************* -->
						<!-- ******************* Titulo    ******************************* -->
						<!-- ************************************************************* -->
						<legend><span class="number">3</span><?=$texto['Datos_Ubicacion']?>:</legend>
                
					
						<!-- ************************************************************* -->
						<!-- ******************* Paises    ******************************* -->
						<!-- ************************************************************* -->
						<?php
							if($Nivel_Ubicacion_Conf>=1){
								$sql = "SELECT Id_Pai, Nombre_Pai FROM tab_paises WHERE Activo_Pai = '1'";
								$res_pai = seleccion($sql);
						?>
							<div class="row">
								<select name="paises" id="paises"  <?php if ($Nivel_Ubicacion_Conf>1){?>onchange="Habilitar_Provincia_Inscripcion('<?=$path?>')" <?php } ?> class="estilo_input">
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
								<label for="paises"><?=$texto['Pais']?>:</label>
							</div>
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
							<div id="div_provincias" class="row" >
								<select name="provincias" id="provincias"  <?php if ($Nivel_Ubicacion_Conf>2){?>onchange="Habilitar_Canton_Inscripcion('<?=$path?>')" <?php } ?> class="estilo_input">
									<option value="0"><?=$texto['Seleccione']?></option>
									<?php
										for($i=0;$i<count($res_pro);$i++){
											echo('<option value="'.$res_pro[$i]["Id_Pro"].'">'.$res_pro[$i]["Nombre_Pro"].'</option>');
										}
									?>
								</select>
								<label for="provincias"><?=$texto['Provincia']?>:</label>
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
								<div id="div_cantones" class="row" >
									<select name="cantones" id="cantones" class="estilo_input">
										<option value="0"><?=$texto['Seleccione']?></option>
									</select>
									<label for="cantones"><?=$texto['Canton']?>:</label>
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
								<div id="div_distritos"  class="row">
									<select name="distritos" id="distritos" class="estilo_input">
										<option value="0"><?=$texto['Seleccione']?></option>
									</select>
									<label for="distritos"><?=$texto['Distrito']?>:</label>
								</div>
						<?php
							}
						?>
						<div class="row">
							<textarea class="estilo_input" id="direccion" name="direccion" placeholder="<?=$texto['PLACEHOLDER_Digite_Direccion']?>"></textarea>
							<label for="direccion"><?=$texto['Direccion_Exacta']?>:</label>
						</div>
						<div class="derecha">
							<button class="boton2" onclick="CambiaTAB('TAB03','TAB02')"><?=$texto['Anterior']?></button>
							<button class="boton2" onclick="CambiaTAB('TAB03','TAB04')"><?=$texto['Siguiente']?></button>	
						</div>
	                </fieldset>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<!-- ************************************************************************************************** -->
				<!-- *********************************    TAB Telefonos    ******************************************** -->
				<!-- ************************************************************************************************** -->
                <div id="TAB04" style="display: none;">
					<fieldset>
						<!-- ************************************************************* -->
						<!-- ******************* Titulo    ******************************* -->
						<!-- ************************************************************* -->
						<legend><span class="number">4</span><?=$texto['Telefonos']?>:</legend>
					
					
						<!-- ************************************************************* -->
						<!-- ******************* Formulario ****************************** -->
						<!-- ************************************************************* -->
						<table class="estilo_tabla">
							<tr class="fila">
								<td class="Titulo_Tabla columna" colspan="4" ><?=$texto['Tipo_Telefono']?>:</td>
							</tr>
							
							<tr class="fila">
								<td colspan="4" class="columna">
									<div class="row">
										<select name="tipo_tel" id="tipo_tel" class="estilo_input">
											<option value="0" ><?=$texto['Seleccione']?></option>
											<?php
												$sql = "SELECT Id_Tip_Tel, Nombre_Tip_Tel FROM tab_tipos_telefonos WHERE Activo_Tip_Tel = '1'";
												$tipos_tel = seleccion($sql);
												for ($i = 0; $i < count($tipos_tel); $i++) {
											?>
													<option value="<?=$tipos_tel[$i]["Id_Tip_Tel"] ?>"><?= $tipos_tel[$i]["Nombre_Tip_Tel"] ?></option>
											<?php
												}
											?>
										</select>
										<label for="tipo_tel"><?=$texto['Tipo']?></label>									
									</div>
	
								</td>
							</tr>
							<tr class="fila">
								<td class="Titulo_Tabla columna" colspan="4"><?=$texto['Numero']?>:</td>
							</tr>
							<tr class="fila">
								<td colspan="4" class="columna centrado">
									<div class="row">
										<input type="text" name="telefono"  id="telefono"  maxlength="8" size="8" class="estilo_input" onKeyPress="return soloNumeros(event)"  placeholder="<?=$texto['PLACEHOLDER_Digite_Numero']?>">
										<label for="telefono"><?=$texto['Numero']?></label>
									</div>
									<span class="texto_nota"><?=$texto['NOTA_Ejemplo_Telefono']?></span>
								</td>
							</tr>
							<tr class="fila">
								<td class="columna Titulo_Tabla" ><?=$texto['Notificacion']?>:</td>
								<td class="columna centrado" id="columna_ch_noti_tel">
									<input type="checkbox" id="ch_noti_tel" name="ch_noti_tel" class="input_check" />
									<label for="ch_noti_tel"><?=$texto['Notificacion']?></label>
								</td>
								<td class="columna Titulo_Tabla"  ><?=$texto['Publico']?>:</td>
								<td class="columna centrado" id="columna_ch_publi_tel">
									<input type="checkbox" id="ch_publi_tel" name="ch_publi_tel" class="input_check" />
									<label for="ch_publi_tel"><?=$texto['Publico']?></label>
								</td>
							</tr>
						</table>
						<br />
						<!-- ************************************************************* -->
						<!-- ******************* Boton     ******************************* -->
						<!-- ************************************************************* -->
						<input type="button" name="ag_tel" id="ag_tel" value="<?=$texto['Agregar_Telefono']?>"
							class="boton"
							onclick="return Agregar_Telefono('tipo_tel','telefono','ch_noti_tel','ch_publi_tel','fila_telefonos','cant_tel','cant_tel_falsa')"  />
						<br />
						
						<!-- ************************************************************* -->
						<!-- ******************* Titulo     ****************************** -->
						<!-- ************************************************************* -->
						<h1 class="centrado"><?=$texto['Agregados_Telefonos']?>:</h1>
						
						<!-- ************************************************************* -->
						<!-- ************ Telefonos Agregados    ************************* -->
						<!-- ************************************************************* -->
						<table class="estilo_tabla">
							<tr id="tab_tel_agr">
								<td  class="Titulo_Tabla columna"><?=$texto['Numero']?></td>
								<td  class="Titulo_Tabla columna"><?=$texto['Tipo_Telefono']?></td>
								<td  class="Titulo_Tabla columna"><?=$texto['Notificacion']?></td>
								<td  class="Titulo_Tabla columna"><?=$texto['Publico']?></td>
								<td  class="Titulo_Tabla columna"><?=$texto['Eliminar']?></td>
							</tr>
							<tbody id='fila_telefonos'>
							</tbody>
						</table>
	
						<!-- ************************************************************* -->
						<!-- ************           Hidden       ************************* -->
						<!-- ************************************************************* -->
						<input type="hidden" name="cant_tel"   id="cant_tel" value="0" />
						<input type="hidden" name="cant_tel_falsa"   id="cant_tel_falsa" value="0" />
						<div class="derecha">
							<button class="boton2" onclick="CambiaTAB('TAB04','TAB03')"><?=$texto['Anterior']?></button>
							<button class="boton2" onclick="CambiaTAB('TAB04','TAB05')"><?=$texto['Siguiente']?></button>	
						</div>
					</fieldset>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<!-- ************************************************************************************************** -->
				<!-- *********************************    TAB Correos      ******************************************** -->
				<!-- ************************************************************************************************** -->
                <div id="TAB05" style="display: none;">
					<fieldset>
						<!-- ************************************************************* -->
						<!-- ******************* Titulo    ******************************* -->
						<!-- ************************************************************* -->
						<legend><span class="number">5</span><?=$texto['Correos']?>:</legend>
				
					
						<!-- ************************************************************* -->
						<!-- ******************* Formulario ****************************** -->
						<!-- ************************************************************* -->
						<table class="estilo_tabla">
							<tr class="fila">
								<td class="Titulo_Tabla columna" ><?=$texto['Correo']?></td>
								<td colspan='3' class="centrado">
									<input type="text" name="txt_correo"  id="txt_correo" maxlength="150" class="input_numero" placeholder="<?=$texto['PLACEHOLDER_Digite_Correo']?>" />
								</td>
							</tr>
							<tr class="fila">
								<td class="Titulo_Tabla columna"  ><?=$texto['Notificacion']?>:</td>
								<td class="centrado" id="columna_ch_noti_cor">
									<div class="row">
										<input type="checkbox" id="ch_noti_cor" name="ch_noti_cor" class="input_check" />
										<label for="ch_noti_cor" ><?=$texto['Notificacion']?></label>
									</div>	
								</td>
								<td class="Titulo_Tabla columna" ><?=$texto['Publico']?>:</td>
								<td class="centrado" id="columna_ch_publi_cor">
									<div class="row">
										<input type="checkbox" id="ch_publi_cor" name="ch_publi_cor" class="input_check" />
										<label for="ch_publi_cor"><?=$texto['Publico']?></label>
									</div>
								</td>
							</tr>
						</table>
						<br />
						<!-- ************************************************************* -->
						<!-- ******************* Boton     ******************************* -->
						<!-- ************************************************************* -->
						<input type="button" name="agr_cor" id="agr_cor" value="<?=$texto['Agregar_Correo']?>"
							class="boton"
							onclick="Agregar_Correo('txt_correo','ch_noti_cor','ch_publi_cor','fila_correos','cant_cor','cant_correos_falsa')" />
						<br />
						
						
						<!-- ************************************************************* -->
						<!-- ******************* Titulo     ****************************** -->
						<!-- ************************************************************* -->
						<h1 class="centrado"><?=$texto['Agregados_Correos']?>:</h1>
						
						
						<!-- ************************************************************* -->
						<!-- ************   Correos Agregados    ************************* -->
						<!-- ************************************************************* -->
						<table class="estilo_tabla">
							<tr id="tab_cor_agr" name="tab_cor_agr">
								<td  class="Titulo_Tabla columna"><?=$texto['Correo']?></td>
								<td  class="Titulo_Tabla columna"><?=$texto['Notificacion']?></td>
								<td  class="Titulo_Tabla columna"><?=$texto['Publico']?></td>
								<td  class="Titulo_Tabla columna"><?=$texto['Eliminar']?></td>
							</tr>
							<tbody id='fila_correos'>
							</tbody>
						</table>
						<br />
						
						<!-- ************************************************************* -->
						<!-- ************           Hidden       ************************* -->
						<!-- ************************************************************* -->
						<input type="hidden" name="cant_cor"   id="cant_cor" value="0" />
						<input type="hidden" name="cant_correos_falsa"   id="cant_correos_falsa" value="0" />
						<div class="derecha">
							<button class="boton2" onclick="CambiaTAB('TAB05','TAB04')"><?=$texto['Anterior']?></button>
							
							<?php
								if($Tipo =="Estu"){
							?>
								<button class="boton2" onclick="CambiaTAB('TAB05','TAB06')"><?=$texto['Siguiente']?></button>
							<?php
								}elseif($Tipo =="Emp"){
							?>
								<button class="boton2" onclick="CambiaTAB('TAB05','TAB07')"><?=$texto['Siguiente']?></button>
							<?php
								}
							?>
							
								
						</div>
					</fieldset>
				</div>					
									
				
				
				
				<!-- ************************************************************************************************** -->
				<!-- *********************************    TAB Universidades      ************************************** -->
				<!-- ************************************************************************************************** -->
				<?php
					if($Tipo == 'Estu'){
				?>
						<div id="TAB06" style="display: none;">
							<fieldset>
								<!-- ************************************************************* -->
								<!-- ******************* Titulo    ******************************* -->
								<!-- ************************************************************* -->
								<legend><span class="number">6</span><?=$texto['Educacion']?>:</legend>
							
							
								<div class="row">
									<select name="Id_CT" id="Id_CT"  onchange="Habilita_Universidad_Inscripcion('../../','1')" class="estilo_input">
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
									<label for="Id_CT"><?= $texto['Centro_Estudio']?>:</label>
								</div>
								<div class="row" id="contenedor_universidad">
									<select name="Id_Uni" id="Id_Uni"  disabled="disabled" class="estilo_input">
										<option value="0" selected="selected" ><?= $texto['Seleccione'] ?></option>
									</select>
									<label for="Id_Uni"><?= $texto['Universidad']?>:</label>
								</div>
								<div class="row" id="contenedor_escuela">
									<select name="Id_Esc" id="Id_Esc" disabled="disabled" class="estilo_input">
										<option value="0" ><?= $texto['Seleccione'] ?></option>
									</select>
									<label for="Id_Esc"><?= $texto['Escuela']?>:</label>
								</div>
								<div class="row" id="contenedor_carrera">
									<select name="Id_Car" id="Id_Car" disabled="disabled" class="estilo_input">
										<option value="0" ><?= $texto['Seleccione'] ?></option>
									</select>
									<label for="Id_Car"><?= $texto['Carrera']?>:</label>
								</div>
								<!-- ************************************************************* -->
								<!-- ******************* Boton     ******************************* -->
								<!-- ************************************************************* -->
								<input type="button" name="btn_agr_car" id="btn_agr_car" value="<?=$texto['Agregar_Universidad']?>"
									class="boton"
									onclick="AgregarUniversidad()" />
								<br />
								<!-- ************************************************************* -->
								<!-- ******************* Titulo     ****************************** -->
								<!-- ************************************************************* -->
								<h1 class="centrado"><?=$texto['Agregados_Carreras']?>:</h1>
								
								<!-- ************************************************************* -->
								<!-- ************   Carreras Agregadas   ************************* -->
								<!-- ************************************************************* -->
								<table class="estilo_tabla">
									<tr id="tab_car_agr">
										<td  class="Titulo_Tabla columna"><?=$texto['Centro_Trabajo']?></td>
										<td  class="Titulo_Tabla columna"><?=$texto['Universidad']?></td>
										<td  class="Titulo_Tabla columna"><?=$texto['Escuela']?></td>
										<td  class="Titulo_Tabla columna"><?=$texto['Carrera']?></td>
										<td  class="Titulo_Tabla columna" style="width: 100px;"><?=$texto['Eliminar']?></td>
									</tr>
									<tbody id='fila_carreras'>
									</tbody>
								</table>
								<br />
								<input type="hidden" name="cant_car"   id="cant_car" value="0" />
								<input type="hidden" name="cant_car_falsa"   id="cant_car_falsa" value="0" />
								<div class="derecha">
									<button class="boton2" onclick="CambiaTAB('TAB06','TAB05')"><?=$texto['Anterior']?></button>
									<button class="boton2" onclick="CambiaTAB('TAB06','TAB07')"><?=$texto['Siguiente']?></button>	
								</div>
						
							</fieldset>
						</div>
				<?php
					}
				?>

				
				
				<!-- ************************************************************************************************** -->
				<!-- *********************************      TAB Usuario          ************************************** -->
				<!-- ************************************************************************************************** -->
                <div id="TAB07" style="display: none;">
					<fieldset>
						<!-- ************************************************************* -->
						<!-- ******************* Titulo    ******************************* -->
						<!-- ************************************************************* -->
						<?php
								if($Tipo =="Estu"){
									$valor = 7;
								}elseif($Tipo =="Emp"){
									$valor = 6;
								}
							?>
							
						<legend><span class="number"><?=$valor?></span><?=$texto['Datos_Usuario']?>:</legend>
					
					
						<div class="row">
							<input type="text" name="id_usuario" id="id_usuario" disabled="disabled" class="estilo_input"/>
							<label for="id_usuario"><?=$texto['Usuario']  ?>:</label>
						</div>
						<div class="row">
							<input type="password" name="contrasenna" id="contrasenna" class="estilo_input" placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena']?>"/>
							<label for="contrasenna"><?=$texto['Contrasena']  ?>:</label>
						</div>
						<div class="row">
							<input type="password" name="contrasenna_confirmacion" id="contrasenna_confirmacion" class="estilo_input" placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena_Confirmacion']?>"/>
							<label for="contrasenna_confirmacion"><?=$texto['Confirmar_Contrasena']  ?>:</label>
						</div>
						<!-- ************************************************************* -->
						<!-- ******************* Pregunta secreta ************************ -->
						<!-- ************************************************************* -->
						<?php
							$sql = "SELECT Id_Preg, Pregunta_Preg FROM tab_preguntas WHERE Activo_Preg ='1'";
							$res_preg = seleccion($sql);
						?>
							<div class="row">
								<select name="preguntas" id="preguntas" class="estilo_input">
									<option value="0"><?=$texto['Seleccione']?></option>
							<?php
								for($i=0;$i<count($res_preg);$i++){
							?>
									<option value='<?=$res_preg[$i]["Id_Preg"]?>'><?=$res_preg[$i]["Pregunta_Preg"]?></option>
							<?php
								}
							?>
								</select>
								<label for="preguntas"><?=$texto['Pregunta_secreta']?>:</label>
							</div>
							<div class="row">
								<input type="text" name="respuesta" id="respuesta" class="estilo_input" placeholder="<?=$texto['PLACEHOLDER_Digite_Respuesta']?>"/>
								<label for="respuesta"><?=$texto['Respuesta']  ?>:</label>
							</div>

						<div class="derecha">
							<?php
								if($Tipo =="Estu"){
							?>
								<button class="boton2" onclick="CambiaTAB('TAB07','TAB06')"><?=$texto['Anterior']?></button>
							<?php
								}elseif($Tipo =="Emp"){
							?>
								<button class="boton2" onclick="CambiaTAB('TAB07','TAB05')"><?=$texto['Anterior']?></button>
							<?php
								}
							?>
							
							<button class="boton3" onclick="guardarDatosInscripcion();"><?=$texto['Guardar_Datos']?></button>
			
						</div>
					</fieldset>
				</div>
				
				
				
        </div>
		<div id="footer">
			<iframe src="https://footerugit.siua.ac.cr/index.php?texto=blanco&detalle=anaranjado" class="pie_pagina"></iframe>    
		</div>
		<script src="<?=$path?>Include/Miniaplicaciones/datepicker2/datepicker2.js"></script>
		<script>
			/*************************************************************/
			/*******************    CALENDARIO   *************************/
			/*************************************************************/	
			$( "#Fecha_Nacimiento" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es', minYear: '1900'});
			
			/*************************************************************/
			/*******************      TITULO     *************************/
			/*************************************************************/	
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
			
			/*************************************************************/
			/*******************  ESTILO DROPIFY *************************/
			/*************************************************************/
            $('.dropify').dropify();
			
 
			 
			$(document).ready(function(){
				
				/*************************************************************/
				/*******************    TAB: FOTO    *************************/
				/*************************************************************/
				$('#div_foto').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Foto']?>"
				});
				
				/*************************************************************/
				/**************    TAB: DATOS PERSONALES *********************/
				/*************************************************************/
				$('#TI').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Tipo_Identificacion']?>"
				});
				$('#fila_txt_cedula').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Su_Cedula']?>"
				});
				$('#fila_txt_residencia').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Su_Residencia']?>"
				});
				$('#fila_txt_pasaporte').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Su_Pasaporte']?>"
				});
				$('#txt_nombre').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Su_Nombre']?>"
				});
				$('#txt_ape1').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Su_Ape1']?>"
				});
				$('#txt_ape2').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Su_Ape2']?>"
				});
				$('#genero').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Genero']?>"
				});
				$('#Fecha_Nacimiento').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Fecha_Nacimiento']?>"
				});
				$('#grado_academico').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Grado_Academico']?>"
				});
				/*************************************************************/
				/**************    TAB: DATOS UBICACION  *********************/
				/*************************************************************/
				$('#paises').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Pais']?>"
				});
				$('#provincias').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Provincia']?>"
				});
				$('#cantones').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Canton']?>"
				});
				$('#distritos').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Su_Distrito']?>"
				});
				$('#direccion').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Su_Direccion']?>"
				});
				/*************************************************************/
				/**************    TAB: DATOS TELEFONOS  *********************/
				/*************************************************************/
				$('#tipo_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso1_Seleccione_Tipo_Telefono']?>"
				});
				$('#telefono').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso2_Digite_Telefono']?>"
				});
				$('#columna_ch_noti_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso3_Notificacion_Telelefono']?>"
				});
				$('#columna_ch_publi_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso4_Publico_Telelefono']?>"
				});
				$('#ag_tel').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso5_BTN_Agregar_Telelefono']?>"
				});
				$('#tab_tel_agr').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso6_Encabezado_Tabla_Telefono']?>"
				});
				/*************************************************************/
				/**************    TAB: DATOS CORREOS    *********************/
				/*************************************************************/
				$('#txt_correo').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso1_Digite_Correo']?>"
				});
				$('#columna_ch_noti_cor').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso2_Notificacion_Correo']?>"
				});
            
				$('#columna_ch_publi_cor').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso3_Publico_Correo']?>"
				});
				$('#agr_cor').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso4_BTN_Agregar_Correo']?>"
				});

				$('#tab_cor_agr').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso5_Encabezado_Tabla_Correo']?>"
				});
				/*************************************************************/
				/**************    TAB: DATOS EDUCACION  *********************/
				/*************************************************************/
				$('#Id_CT').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso1_Seleccione_Su_CT']?>"
				});
				$('#Id_Uni').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso2_Seleccione_Su_Universidad']?>"
				});
				$('#Id_Esc').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso3_Seleccione_Su_Escuela']?>"
				});
				$('#Id_Car').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso4_Seleccione_Su_Carera']?>"
				});
				$('#btn_agr_car').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso5_BTN_Agregar_Carrera']?>"
				});
				$('#tab_car_agr').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Paso6_Encabezado_Tabla_Carreras']?>"
				});
				
				/*************************************************************/
				/**************    TAB: DATOS USUARIO    *********************/
				/*************************************************************/
				$('#id_usuario').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_NOTA_Id_Usuario']?>"
				});
				$('#contrasenna').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Contrasenna_Inscripcion']?>"
				});
				$('#contrasenna_confirmacion').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Confirmacion']?>"
				});
				$('#preguntas').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Seleccione_Pregunta_Secreta_Inscripcion']?>"
				});
				$('#respuesta').darkTooltip({
						opacity:0.9,
						size: 'large',
						animation:'flipIn',
						gravity:'west', //west,east,north,south
						confirm:false,
						theme:'dark',
						content: "<?=$texto['AYUDA_Digite_Respuesta_Secreta_Inscripcion']?>"
				});
				
							
            });
			
			
			
		</script>
	
    </body>
</html>

