<?php
//Codificacion UTF-8
header('Content-Type: text/html; charset=utf-8');

//Zona Horaria
date_default_timezone_set('America/Costa_Rica');



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
//Incluimos conexion a la bd
include("Include/Bd/bd.php");




//Comprobar si esas cookies existen
$usuario ='';
$marcar_ch=0;
if (isset($_COOKIE["cookie_usuario"]) && isset($_COOKIE["cookie_aleatoria"]) && isset($_COOKIE["cookie_id"])){
    //Comprobar si no estan vacias
    if ($_COOKIE["cookie_usuario"]!='' && $_COOKIE["cookie_aleatoria"]!='' && $_COOKIE["cookie_id"]!=''){
      //obtenemos el codigo de verificacion de la base de datos debe ser igual al de la cookie o este ya vencio
      $sql ="SELECT Cookie_Usu FROM tab_usuarios WHERE Id_Per_Usu ='".$_COOKIE["cookie_id"]."'";
      $res_cookie = seleccion($sql);
	  
	  
      //si cookie_Usu (de la BD) es diferente de vacio y es igual al valor guardado en el navegador del usuario
      if(($res_cookie[0]['Cookie_Usu']!='')&&($res_cookie[0]['Cookie_Usu']==$_COOKIE["cookie_aleatoria"])){
	
		//asignele el valor a la variable
		$usuario = $_COOKIE["cookie_usuario"];
        $TI = $_COOKIE["cookie_TI"];
		$marcar_ch = 1;
      }
    }
}

//Obtenemos los datos de la direccion de la carpeta del sistema y del dominio BD 
$sql = "SELECT
			Direccion_Web_Conf,
			Direccion_Carpeta_Conf,
			Nombre_Conf,
			Permitir_Desbloquear_Usuari_Conf,
			Mostrar_Logo_Conf,
			Width_Logo_Conf,
			Height_Logo_Conf,
			Logo_Empresa_Conf,
			Permitir_Recordar_Contrasena_Conf,
			Titulo_Bienvenida_Conf,
			Permitir_Inscripcion_Estu_Conf,
			Id_PI_Estu_Conf,
			Permitir_Inscripcion_Empr_Conf,
			Id_PI_Emp_Conf
		FROM tab_configuracion";
$res = seleccion($sql);


/*****************************/
//Determinar plantilla para inscripción estudiante
$Id_PI_Estu_Conf = $res[0]['Id_PI_Estu_Conf'];

$sql = "SELECT Direccion_PI FROM tab_plantillas_inscripcion WHERE Id_PI = ".$Id_PI_Estu_Conf;
$res_pi = seleccion($sql);
$Direccion_PI_Estu = $res_pi[0]['Direccion_PI'];

/*****************************/
//Determinar plantilla para inscripción empresa
$Id_PI_Emp_Conf = $res[0]['Id_PI_Emp_Conf'];

$sql = "SELECT Direccion_PI FROM tab_plantillas_inscripcion WHERE Id_PI = ".$Id_PI_Emp_Conf;
$res_pi = seleccion($sql);
$Direccion_PI_Emp = $res_pi[0]['Direccion_PI'];


?>

<!DOCTYPE html>
<html>
<head>
  
<?php
$path = '';
//Incluimos conexion a la bd
include("configuracion.php");


?>
    <title><?=$res[0]['Nombre_Conf']?></title>
    <meta charset="UTF-8">
	<meta name="theme-color" content="#2667C9">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <script type="text/javascript" src="lang/lang.<?=$idioma?>.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/EXTERNOS/reset.css"  />
  
    <!-- para efecto shake-->    
    <script type="text/javascript" src="js/EXTERNAS/jquery-2.1.3.js"></script>
    <script type="text/javascript" src="js/EXTERNAS/jquery-ui.js"></script>
    
    <!-- tooltips-->
    <link rel="stylesheet" href="Include/Miniaplicaciones/tooltips/examples.css">
    <link rel="stylesheet" href="Include/Miniaplicaciones/tooltips/darktooltip.css">
    <script src="Include/Miniaplicaciones/tooltips/jquery.darktooltip.js"></script>
    <script src="Include/Miniaplicaciones/tooltips/examples.js"></script>
    
    
  
    
    <!-- para animacion de texto-->    
    <link href="Include/Miniaplicaciones/texto_animado/jquery-letterfx.css" rel="stylesheet" type="text/css" />
    <script src="Include/Miniaplicaciones/texto_animado/jquery-letterfx.js"></script>
    <script src="Include/Miniaplicaciones/texto_animado/demo.js"></script>

    <link rel="stylesheet" type="text/css" href="css/SAE/index.css"  />
    <!-- contiene las funciones de la pagina index -->
    <script type="text/javascript" src="js/SAE/index.js" ></script>
    <!-- contiene la validaciones de campos genericos-->
    <script type="text/javascript" src="js/SAE/validacion.js" ></script>
    
    <!-- Ajax permite conexiones AJAX-->
    <script type="text/javascript" src="js/SAE/Ajax.js"></script>
        
    <!-- Permite uso de MD5-->
    <script type="text/javascript" src="js/SAE/hex_md5.js"></script>
    <!-- Para guardar la URL en la SESSION -->
    <script type="text/javascript" src="js/SAE/session.js"></script>
    
    <!-- Para guardar la URL en la SESSION -->
    <script type="text/javascript" src="js/SAE/interpretadorAjax.js"></script>
    
    <script type="text/javascript" src="js/SAE/desbloquear.js"></script>
    
    
    <script src="js/EXTERNAS/modernizr.custom.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="css/SAE/estilo_menu_index.css" />


</head>
<body>
    <script>
        //Saber resolusion disponible
        /*alert(window.screen.availWidth);
        alert(window.screen.availHeight);
        */
    </script>
	<div id="trigger-overlay">
	
	</div>
    <input type="hidden" name="dominio" id="dominio" value="<?php echo $res[0]['Direccion_Web_Conf'] ?>" />
    <input type="hidden" name="ruta" id="ruta" value="<?php echo $res[0]['Direccion_Carpeta_Conf'] ?>" />
    
	<div id="encabezado">
        <!-- *************************************************************************************** -->
        <!-- *******************************   logo sistema  *************************************** -->
        <!-- *************************************************************************************** -->
          <?php
            if($res[0]['Mostrar_Logo_Conf']==1){
          ?>
          <div id="logo">
                <img id="logo" src="img/Logo/<?= $res[0]['Logo_Empresa_Conf']?>" style="width: <?= $res[0]['Width_Logo_Conf'] ?>px;height: <?= $res[0]['Height_Logo_Conf'] ?>px;" />
          </div>
            
          <?php
            }
          ?>
        <!-- *************************************************************************************** -->
        <!-- ******************************* Nombre sistema  *************************************** -->
        <!-- *************************************************************************************** -->
        <div id="nombre_sistema">  
          <span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $res[0]['Titulo_Bienvenida_Conf']?></span>
        </div>
    </div>
	
	<!-- *************************************************************************************** -->
    <!-- ******************************* Login  ************************************************ -->
	<!-- *************************************************************************************** -->
	<div class="ventana" id="login">
	  <div class="contenedor_ventana">
		<!-- *****************************-->
        <!-- ******** TITULO *************-->
        <!-- *****************************-->
        <div class="contenedor_titulo_ventana">
            <?= $texto['Bienvenido'] ?>
		</div>
        <!-- *****************************-->
        <!-- ******** ERROR  *************-->
        <!-- *****************************-->
        <div class="mensaje_error" id="msj_error_login">
        </div>
		<!-- *****************************-->
        <!-- ********  FORM  *************-->
        <!-- *****************************-->
        <?php

            if(isset($TI)){
                if(($TI==1)||($TI=='')){
                    $marcar1 = 'selected="selected"';
                    $marcar2 = '';
                    $marcar3 = '';
                    $mostrar1= '';
                    $mostrar2= 'style="display: none;"';
                    $mostrar3= 'style="display: none;"';
                }elseif($TI==2){
                    $marcar1 = '';
                    $marcar2 = 'selected="selected"';
                    $marcar3 = '';
                    $mostrar1= 'style="display: none;"';
                    $mostrar2= '';
                    $mostrar3= 'style="display: none;"';
                }elseif($TI==3){
                    $marcar1 = '';
                    $marcar2 = '';
                    $marcar3 = 'selected="selected"';
                    $mostrar1= 'style="display: none;"';
                    $mostrar2= 'style="display: none;"';
                    $mostrar3= '';
                }

            }else{
                $marcar1 = 'selected="selected"';
                $marcar2 = '';
                $marcar3 = '';
                $mostrar1= '';
                $mostrar2= 'style="display: none;"';
                $mostrar3= 'style="display: none;"';
            }
            
        ?>
        <div class="contenedor-form">
            <div class="fila">
                <select id="TI_login" name="TI_login"  onchange="CambiarValidacion_Login()" tabindex="1">
					<option value="1" <?= $marcar1?> ><?=$texto['Cedula']?></option>
					<option value="2" <?= $marcar2?> ><?=$texto['Residencia']?></option>
					<option value="3" <?= $marcar3?>><?=$texto['Pasaporte']?></option>
				</select>
                <label  for="TI_login"></label>
			</div>
            
			<div class="fila" id="fila_txt_cedula_login" <?=$mostrar1?>>
			  <input type="text" value="<?= $usuario?>" tabindex="2"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Cedula']?>" id="txt_cedula_login" maxlength="11" onkeyup="mascara(this,'-',patron_cedula ,true)" onkeypress="validar_ENTER(event)" >
			  <label  for="txt_cedula_login"></label>
			</div>
            <div class="fila" id="fila_txt_residencia_login" <?=$mostrar2?>>
			  <input type="text" value="<?= $usuario?>" tabindex="3"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Residencia']?>" id="txt_residencia_login" maxlength="13" onkeypress="return soloNumeros_Login(event)" >
			  <label  for="txt_residencia_login"></label>
			</div>
            <div class="fila" id="fila_txt_pasaporte_login" <?=$mostrar3?>>
			  <input type="text" value="<?= $usuario?>" tabindex="4"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Pasaporte']?>" id="txt_pasaporte_login" maxlength="16" onkeypress="validar_ENTER(event)" >
			  <label  for="txt_pasaporte_login"></label>
			</div>
           
			<div class="fila">
			  <input type="password" placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena']?>" id="clave_login" maxlength="100" onkeypress="validar_ENTER(event)" tabindex="5">
			  <label for="clave_login"></label>
			</div>
            
            <div class="fila">
                <button class="btn"  onclick="Ingresar()" tabindex="6"><?=$texto['Ingresar']?></button>
            </div>            
            
			<div class="fila texto_pequeno" id="div_recordar" >
                <label class="text_recordar"><input type="checkbox" class="recordar" <?php if($marcar_ch==1){echo "checked";} ?>
					 name="guardar_clave" id="guardar_clave" value="1"/> <?= $texto['Recordar_Usuario']?></label>
			</div>
            
            <div class="fila texto_pequeno" id="ayuda">
                <span><?= $texto['Ayuda']?></span>
            </div>            
            
		</div>
	  </div>
	</div>
      
    <!-- *************************************************************************************** -->
    <!-- ******************************* Desbloquear  ****************************************** -->
	<!-- *************************************************************************************** -->
	<div class="ventana" id="Desbloquear">
	  <div class="contenedor_ventana">
		<!-- *****************************-->
        <!-- ******** TITULO *************-->
        <!-- *****************************-->
        <div class="contenedor_titulo_ventana">
            <?= $texto['TITULO_Desbloquear'] ?>
		</div>
        <!-- *****************************-->
        <!-- ******** ERROR  *************-->
        <!-- *****************************-->
        <div class="mensaje_error" id="msj_error_desbloquear">
        </div>
		<!-- *****************************-->
        <!-- ********  FORM  *************-->
        <!-- *****************************-->
        <div class="contenedor-form">
            <div class="fila">
                <select id="TI_desbloquear" name="TI_desbloquear"  onchange="CambiarValidacion_Desbloquear()" tabindex="1">
					<option value="1" ><?=$texto['Cedula']?></option>
					<option value="2" ><?=$texto['Residencia']?></option>
					<option value="3" ><?=$texto['Pasaporte']?></option>
				</select>
                <label  for="TI_desbloquear"></label>
			</div>
            
			<div class="fila" id="fila_txt_cedula_desbloquear">
			  <input type="text" value="<?= $usuario?>" tabindex="2"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Cedula']?>" id="txt_cedula_desbloquear" maxlength="11" onkeyup="mascara(this,'-',patron_cedula ,true)" onkeypress="validar_ENTER_desbloquear(event)" >
			  <label  for="txt_cedula_desbloquear"></label>
			</div>
            <div class="fila" id="fila_txt_residencia_desbloquear" style="display: none;">
			  <input type="text" value="<?= $usuario?>" tabindex="3"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Residencia']?>" id="txt_residencia_desbloquear" maxlength="13" onkeypress="return soloNumeros_desbloquear(event)" >
			  <label  for="txt_residencia_desbloquear"></label>
			</div>
            <div class="fila" id="fila_txt_pasaporte_desbloquear" style="display: none;">
			  <input type="text" value="<?= $usuario?>" tabindex="4"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Pasaporte']?>" id="txt_pasaporte_desbloquear" maxlength="16" onkeypress="validar_ENTER_desbloquear(event)" >
			  <label  for="txt_pasaporte_desbloquear"></label>
			</div>
           
			<div class="fila">
			  <input type="password" placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena']?>" id="clave_desbloquear" maxlength="100" onkeypress="validar_ENTER_desbloquear(event)" tabindex="5">
			  <label for="clave_desbloquear"></label>
			</div>
            <div class="fila">
                <?php
                    $sql = "SELECT Id_Preg,Pregunta_Preg FROM tab_preguntas WHERE Activo_Preg = '1'";
                    $res_preg = seleccion($sql);
                    
                ?>
                <select name="preguntas_desbloquear" id="preguntas_desbloquear" tabindex="6">
					<option value="0"><?=$texto['Seleccione']?></option>
					<?php
						for($i=0;$i<count($res_preg);$i++){
					?>
						<option value='<?=$res_preg[$i]["Id_Preg"]?>'><?=$res_preg[$i]["Pregunta_Preg"]?></option>
					<?php
						}
					?>
				</select>
                <label for="preguntas_desbloquear"></label>
            </div>
            <div class="fila">
			  <input type="password" placeholder="<?=$texto['Respuesta']?>" id="respuesta_desbloquear" maxlength="150" onkeypress="validar_ENTER_desbloquear(event)" tabindex="7">
			  <label for="respuesta_desbloquear"></label>
			</div>
            <div class="fila">
                <button class="btn"  onclick="Regresar_Desbloquear()"><?=$texto['Regresar']?></button>
                <button class="btn"  onclick="desbloquearUsuario()" tabindex="4"><?=$texto['Desbloquear']?></button>
            </div>            
		</div>
	  </div>
	</div>
	
    <!-- *************************************************************************************** -->
    <!-- ******************************* Recordar Contraseña *********************************** -->
	<!-- *************************************************************************************** -->
	<div class="ventana" id="Recordar">
	  <div class="contenedor_ventana">
		<!-- *****************************-->
        <!-- ******** TITULO *************-->
        <!-- *****************************-->
        <div class="contenedor_titulo_ventana">
            <?= $texto['TITULO_Recordar'] ?>
		</div>
        <!-- *****************************-->
        <!-- ******** ERROR  *************-->
        <!-- *****************************-->
        <div class="mensaje_error" id="msj_error_recordar">
        </div>
		<!-- *****************************-->
        <!-- ********  FORM  *************-->
        <!-- *****************************-->
        <div class="contenedor-form">
            <div class="fila">
                <select id="TI_recordar" name="TI_recordar"  onchange="CambiarValidacion_Recordar()" tabindex="1">
					<option value="1" ><?=$texto['Cedula']?></option>
					<option value="2" ><?=$texto['Residencia']?></option>
					<option value="3" ><?=$texto['Pasaporte']?></option>
				</select>
                <label  for="TI_recordar"></label>
			</div>
            
			<div class="fila" id="fila_txt_cedula_recordar">
			  <input type="text" value="<?= $usuario?>" tabindex="2"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Cedula']?>" id="txt_cedula_recordar" maxlength="11" onkeyup="mascara(this,'-',patron_cedula ,true)" onkeypress="validar_ENTER_recordar(event)" >
			  <label  for="txt_cedula_recordar"></label>
			</div>
            <div class="fila" id="fila_txt_residencia_recordar" style="display: none;">
			  <input type="text" value="<?= $usuario?>" tabindex="3"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Residencia']?>" id="txt_residencia_recordar" maxlength="13" onkeypress="return soloNumeros_recordar(event)" >
			  <label  for="txt_residencia_recordar"></label>
			</div>
            <div class="fila" id="fila_txt_pasaporte_recordar" style="display: none;">
			  <input type="text" value="<?= $usuario?>" tabindex="4"
			  placeholder="<?=$texto['PLACEHOLDER_Digite_Pasaporte']?>" id="txt_pasaporte_recordar" maxlength="16" onkeypress="validar_ENTER_recordar(event)" >
			  <label  for="txt_pasaporte_recordar"></label>
			</div>
            <div class="fila">
                <?php
                    $sql = "SELECT Id_Preg,Pregunta_Preg FROM tab_preguntas WHERE Activo_Preg = '1'";
                    $res_preg = seleccion($sql);
                    
                ?>
                <select name="preguntas_recordar" id="preguntas_recordar" tabindex="6">
					<option value="0"><?=$texto['Seleccione']?></option>
					<?php
						for($i=0;$i<count($res_preg);$i++){
					?>
						<option value='<?=$res_preg[$i]["Id_Preg"]?>'><?=$res_preg[$i]["Pregunta_Preg"]?></option>
					<?php
						}
					?>
				</select>
                <label for="preguntas_recordar"></label>
            </div>
            <div class="fila">
			  <input type="password" placeholder="<?=$texto['PLACEHOLDER_Digite_Respuesta']?>" id="respuesta_recordar" maxlength="150" onkeypress="validar_ENTER_recordar(event)" tabindex="7">
			  <label for="respuesta_recordar"></label>
			</div>
            <div class="fila">
			  <input type="password" placeholder="<?=$texto['PLACEHOLDER_Digite_Correo']?>" id="correo_recordar" maxlength="100" onkeypress="validar_ENTER_recordar(event)" tabindex="5">
			  <label for="correo_recordar"></label>
			</div>
            <div class="fila">
                <button class="btn"  onclick="Regresar_Recordar()"><?=$texto['Regresar']?></button>
                <button class="btn"  onclick="recordarContrasena()" tabindex="4"><?=$texto['Desbloquear']?></button>
            </div>            
		</div>
	  </div>
	</div>
	
	<!-- *************************************************************************************** -->
    <!-- ******************************* Footer ************************************************ -->
	<!-- *************************************************************************************** -->
	<div id="centro"></div>
    <div id="footer">
        <iframe src="https://footerugit.siua.ac.cr/index.php?texto=blanco&detalle=anaranjado" class="pie_pagina"></iframe>    
    </div>
        
	
	
	<div class="overlay overlay-slidedown" id="menu">
			<button type="button" class="overlay-close">Cerrar</button>
			<nav>
				<ul>
				  
					  <li>
						<a class="enlace_menu" id="a_regresar">
							<?= $texto['ENLACE_ingresar'] ?>
						</a>
					  </li>
					
					<?php
					  if($res[0]['Permitir_Inscripcion_Estu_Conf']==1){
					?>
					<li>
						<a class="enlace_menu" id="a_inscripcion_estudiante">
							<?= $texto['ENLACE_inscripcion_Estudiante'] ?>
						</a>
					  </li>
					  
					<?php
					}
					?>
					<?php
					  if($res[0]['Permitir_Inscripcion_Empr_Conf']==1){
					?>
					<li>
						<a class="enlace_menu" id="a_inscripcion_empresa">
							<?= $texto['ENLACE_inscripcion_Empresa'] ?>
						</a>
					  </li>
					  
					<?php
					}
					?>
					<?php
					if($res[0]['Permitir_Desbloquear_Usuari_Conf']==1){
					?>
					  <li>
						<a class="enlace_menu" id="a_desbloquear">
							<?= $texto['ENLACE_desbloquear_usuario'] ?>
						</a>
					  </li>
					  
					<?php
					}
					?>
					<?php
					if($res[0]['Permitir_Recordar_Contrasena_Conf']==1){
					?>
					  <li>
                        <a class="enlace_menu" id="a_recordar">
                            <?=$texto['ENLACE_recordar_contrasena']?>
                        </a>
                      </li>
					<?php
					}
					?>
				</ul>
			</nav>
	</div>
	<script src="js/EXTERNAS/classie.js"></script>
	<script src="js/SAE/menu_index.js"></script>
	
	<script>
	  
	  //Activar animación de texto
	  function ActivaTextoTitulo(){
		  $(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":200});
	  }
	  ActivaTextoTitulo();

	  
	  
	  //Crear los mensajes de ayuda
	  $(document).ready( function(){
             <?php
            if(isset($TI)){
                if(($TI==1)||($TI=='')){
            ?>
                document.getElementById('txt_cedula_login').focus();
            <?php
                }else if ($TI==2) {
            ?>
                document.getElementById('txt_residencia_login').focus();
            <?php
                }else if ($TI==3) {
            ?>
                document.getElementById('txt_pasaporte_login').focus();
            <?php
                }
            }
            ?>
            /***********************************************/
            /***************  LOGIN  ***********************/
            /***********************************************/
            $('#TI_login').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Seleccione_Su_Tipo_Identificacion']?>"
            });
		   
            $('#txt_cedula_login').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_Digite_Su_Cedula']?>"
            });
            $('#txt_residencia_login').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_Digite_Su_Residencia']?>"
            });
            $('#txt_pasaporte_login').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_Digite_Su_Pasaporte']?>"
            });
             //With some options
            $('#clave_login').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_Digite_Su_Contrasenna']?>"
            });
            $('#ayuda').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_00000001']?>"
            });
              $('#div_recordar').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_recordar_usuario']?>"
            });
            /***********************************************/
            /************  DESBLOQUEAR  ********************/
            /***********************************************/
            $('#TI_desbloquear').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_TI']?>"
            });
		   
            $('#txt_cedula_desbloquear').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_cedula']?>"
            });
            $('#txt_residencia_desbloquear').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_residencia']?>"
            });
            $('#txt_pasaporte_desbloquear').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_pasaporte']?>"
            });
             //With some options
            $('#clave_desbloquear').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_contrasena']?>"
            });
            $('#preguntas_desbloquear').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_preguntas']?>"
            });
            $('#respuesta_desbloquear').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_respuesta']?>"
            });
            /***********************************************/
            /************     RECORDAR  ********************/
            /***********************************************/
            $('#TI_recordar').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_TI']?>"
            });
		   
            $('#txt_cedula_recordar').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_cedula']?>"
            });
            $('#txt_residencia_recordar').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_residencia']?>"
            });
            $('#txt_pasaporte_recordar').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_pasaporte']?>"
            });
            $('#preguntas_recordar').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_preguntas']?>"
            });
            $('#respuesta_recordar').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_respuesta']?>"
            });
            $('#correo_recordar').darkTooltip({
                opacity:0.9,
                size: 'large',
                animation:'flipIn',
                gravity:'west', // 
                confirm:false,
                theme:'dark',
                content: "<?=$texto['AYUDA_correo_recuperacion']?>"
            });
            //ocultamos los elementos
            $('#Desbloquear').hide();
            $('#Recordar').hide();
	  
            /***************************************************************/
            /**************     Opcion menu regresar    ********************/
            /***************************************************************/
            $("#a_regresar").on( "click", function() {
              document.getElementById('menu').className = 'overlay overlay-slidedown';
              Regresar_Desbloquear();
              
            });
            /***************************************************************/
            /********** Opcion menu inscripcion estudiante *****************/
            /***************************************************************/
            $("#a_inscripcion_estudiante").on( "click", function() {
              document.getElementById('menu').className = 'overlay overlay-slidedown';
              var dominio = document.getElementById('dominio').value;
              var ruta = document.getElementById('ruta').value;
              window.open(dominio+ruta+'<?=$Direccion_PI_Estu?>?Tipo=Estu');
            });
            /***************************************************************/
            /**********  Opcion menu inscripcion empresa   *****************/
            /***************************************************************/
            $("#a_inscripcion_empresa").on( "click", function() {
              document.getElementById('menu').className = 'overlay overlay-slidedown';
              var dominio = document.getElementById('dominio').value;
              var ruta = document.getElementById('ruta').value;
              window.open(dominio+ruta+'<?=$Direccion_PI_Emp?>?Tipo=Emp');
      
            });
            /***************************************************************/
            /************** Mostrar Ocultar Desbloquear ********************/
            /***************************************************************/
             $("#a_desbloquear").on( "click", function() {
                document.getElementById('menu').className = 'overlay overlay-slidedown';
                var estado = document.getElementById('Desbloquear').style.display;
                if (estado=='none') {
                  //$('#login').show(); y hide();fadeOut(500);fadeIn(700);
                  $('#login').fadeOut(500);
                  $('#Desbloquear').slideDown("slow");
                  //Darle el foco a la caja de usuario
                  document.getElementById('txt_cedula_desbloquear').value='';
                  document.getElementById('txt_residencia_desbloquear').value='';
                  document.getElementById('txt_pasaporte_desbloquear').value='';
                  document.getElementById('respuesta_desbloquear').value='';
                  
                }else{
                  $('#Desbloquear').fadeOut(500);
                  $('#login').slideDown("slow");
                }

			});
           
		  
            
	  });
            
	  function Regresar_Desbloquear() {
			  $('#Desbloquear').fadeOut(500);
			  $('#login').slideDown("slow");
			  //Darle el foco a la caja de usuario
			  document.getElementById('usuario').focus();
	  }
           
	</script>
           
  </body>
</html>