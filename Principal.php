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

//Base de datos
include("Include/Bd/bd.php");

//Incluimos conexion a la bd
$path='';
include("configuracion.php");

?>
<script type="text/javascript" src="<?=$path?>lang/lang.<?=$idioma?>.js"></script>

<?php

//Obtener los datos de configuracion del sistema
$sql = "SELECT 
			   Nombre_Session_Conf, 
			   Direccion_Carpeta_Conf, 
			   Direccion_Web_Conf, 
			   Llave_Encriptacion_Conf,
			   Cantidad_Registros_Conf
		   FROM tab_configuracion
		   WHERE Id_Conf = 1";
$res_principal = seleccion($sql);

//Variables
$dominio = $res_principal[0]['Direccion_Web_Conf'];
$ruta = $res_principal[0]['Direccion_Carpeta_Conf'];
$nom_session = $res_principal[0]['Nombre_Session_Conf'];
$llave_encrip = $res_principal[0]['Llave_Encriptacion_Conf'];


/*************************************************************************/
/******************** Proceso de Verificacion ****************************/
/*************************************************************************/

/* Paso 1: Incluir libreria de encriptación */
include("Include/Autenticacion/encriptacion.php");

//obtener el parametro de cedula encriptada
$cedula_encriptada = (isset($_GET['cedula'])) ? $_GET['cedula'] : '';

//Si el parametro no se paso saquelo de aqui
if($cedula_encriptada == ''){
        //redirigir
	header('Location:'.$dominio.$ruta.'index.php');

//Si el parametro se paso
}else{
    
        
    //Desencriptamos la cedula
    $cedula = desencriptar($cedula_encriptada,$llave_encrip);
	 
    //obtenemos los datos de la persona para saber si existe y esta activa
	$sql = "SELECT Id_Per, Activo_Per FROM tab_personas WHERE Cedula_Per = '".$cedula."'";
	$persona = seleccion($sql);
	
	//La persona no existe saquelo
	if($persona[0]['Id_Per']==''){
?>
	<script type="text/javascript">
           alert(texto['Usuario_No_Existe']);
		   window.location.replace('<?php echo $dominio; echo $ruta; ?>');
	</script>
<?php
	 exit;

	 //Si la persona esta desactivada saquela
	}elseif($persona[0]['Activo_Per']!=1){
	 
?>
	 <script type="text/javascript">
           alert(texto['Persona_Desactivado']);
		   window.location.replace('<?php echo $dominio; echo $ruta; ?>');
	 </script>

<?php
	 exit;
	 //Si existe y esta activa compruebe que es un usuario y que no esta activo
	 }else{
		  
		  $sql = "SELECT Id_Per_Usu,Activo_Usu, Nombre_Session_Usu,Estado_Conexion_Usu,Key_Usu FROM tab_usuarios WHERE Id_Per_Usu =".$persona[0]['Id_Per'];
		  $usuario = seleccion($sql);
		  $Key_Usu = $usuario[0]['Key_Usu'];
		  //No es usuario
		  if($usuario[0]['Id_Per_Usu']==''){
			   
?>
	 <script type="text/javascript">
           alert(texto['Persona_No_Derechos']);
		   window.location.replace('<?php echo $dominio; echo $ruta; ?>');
	 </script>

<?php
		  exit;
		  //El usuario esta desactivado
		  }elseif($usuario[0]['Activo_Usu'] != '1'){
			   
?>
		  <script type="text/javascript">
           alert(texto['Usuario_Desactivado']);
		   window.location.replace('<?php echo $dominio; echo $ruta; ?>');
		  </script>

<?php
		  exit;
		  //verifique el estado de conexion del usuario != 1 conectado en otro navegador saquelo
		 
		  
		   }elseif(($usuario[0]['Estado_Conexion_Usu'] == 1)){
			   
			   	//Destruimos la session
			   	session_name($usuario[0]['Nombre_Session_Usu']);
			   	session_start();
			   if(isset($_SESSION['Key'])){
				   if($usuario[0]['Key_Usu']!=$_SESSION['Key']){
						session_unset();
						$_SESSION = array();
						if (ini_get("session.use_cookies")) {
							 $params = session_get_cookie_params();
							 setcookie(session_name(), '', time() - 42000,
								 $params["path"], $params["domain"],
								 $params["secure"], $params["httponly"]
							 );
						 }
						session_destroy();
						
						//destruimos los datos de conexión del usuario
						$sql = "UPDATE tab_usuarios SET Estado_Conexion_Usu = 0, Fecha_Hora_Conexion_Usu=NULL, Key_Usu = NULL, Nombre_Session_Usu = NULL, URL_Usu = NULL 
									   WHERE Id_Per_Usu = ".$usuario[0]['Id_Per_Usu'];
						$destroy = transaccion($sql);	
	?>
						<script type="text/javascript">
							 alert(texto['Usuario_En_Otra_Session']);
							 window.location.replace('<?php echo $dominio; echo $ruta; ?>');
					    </script>
	<?php
				   }
				}
	  
			   
			   
		  	  

		  



			   
		  //exit;    
		  //Si el usuario se encuentra activo en el sistema   
		  }elseif($usuario[0]['Activo_Usu']==1){
			   
			   //Actualice la dirección URL generada en la BD
			   $sql ="UPDATE tab_usuarios SET
                        URL_Usu = 'http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."'
					    WHERE ID_Per_Usu = ".$usuario[0]['Id_Per_Usu'];
               $res_url = transaccion($sql);
          
			    //Si la URL se actualizo correctamente        
			   if($res_url[0]==1){
					//obtener el nombre de la session
					$sql="SELECT Nombre_Session_Usu, Key_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$usuario[0]['Id_Per_Usu'];
					$res_key=seleccion($sql);
					
					//Si se obtuvo el nombre de la session correctamente 
					if($res_key[0]['Nombre_Session_Usu']!=''){
						
						 //iniciamos la session
						 session_name($res_key[0]['Nombre_Session_Usu']);
						 session_start();
						 
						 //Si no existe la key en la session puede ser una session falsa o alterada
						 if(isset($_SESSION['Key'])== ''){
								 header('Location:'.$dominio.$ruta.'index.php');
						 
						 // Verificar Key de la session y compararla contra la de la BD para ver si es la actual
						 }elseif($_SESSION['Key'] != $res_key[0]['Key_Usu']){
							  header('Location:'.$dominio.$ruta.'index.php');
						 }
					}
					
					
			   }
			   
		  
		  //En cualquier otro caso saquelo de aqui
		  }else{
			   //Cualquier otro caso donde no se 0 = desactivado o 1 = activado saquelo de aqui
			   header('Location:'.$dominio.$ruta.'index.php');
		  }		  
	 }
}

/*************************************************************************/
/****************** FIN Proceso de Verificacion **************************/
/*************************************************************************/


//Convertimos la cedula en cedula global para definirla y ponerla
//Como una cosntante de la cedula de la persona logeada en el sistema
//actualemente
$cedula_global = $cedula;
$Id_Per_Usu = $usuario[0]['Id_Per_Usu'];


/* Crear session de datos del usuario*/
include("Include/Autenticacion/Crea_Session.php");


//actualizar la fecha y hora de conexion
$fecha = getdate();
$fec = $fecha["year"]."/".$fecha["mon"]."/".$fecha["mday"]." ".$fecha["hours"].":".$fecha["minutes"];
$sql="UPDATE tab_usuarios SET Estado_Conexion_Usu= '1', Fecha_Hora_Conexion_Usu='".$fec."' WHERE Id_Per_Usu= ".$Id_Per_Usu;
$res = transaccion($sql);


?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="theme-color" content="#2667C9">
        <?php
            $sql="SELECT Nombre_Per, Apellido1_Per,Apellido2_Per FROM tab_personas WHERE Cedula_Per ='".$cedula_global."'";
            $res = seleccion($sql);
        ?>
         <title> <?php echo $texto['Bienvenido'].' '.$res[0]['Nombre_Per'].' '.$res[0]['Apellido1_Per'].' '.$res[0]['Apellido2_Per']?></title>
           

        
        <?php
            include('Inc_script.php');
			
			//Encriptamos el Id del usuario
			$Id_Per_Usu = encriptar($Id_Per_Usu,$llave_encrip);
        ?>
    </head>
	<!-- onunload="Salir('<?//$Id_Per_Usu?>')"-->
    <body onload="VerificaMensajeUsuario()">

    	<div class="preloader" id="saePreloader" style="display: none;">
		    <div class="wrapperPreloader">
		        <div class="circle"></div>
		        <div class="circle"></div>
		        <div class="circle"></div>
		        <div class="shadow"></div>
		        <div class="shadow"></div>
		        <div class="shadow"></div>
		        <span id="saePreloaderTexto">Procesando...</span>
		    </div>
		</div>

        
        <input type="hidden" value="<?=$cedula_encriptada ?>" id="cedula_global" name="cedula_global" />
		<input type="hidden" value="<?=$Id_Per_Usu?>" id="Id_Per_Usu" name="Id_Per_Usu" /> 
        <input type="hidden" name="dominio" id="dominio" value="<?= $dominio ?>" />
        <input type="hidden" name="ruta" id="ruta" value="<?= $ruta ?>" />
		<input type="hidden" name="Key_Usu" id="Key_Usu" value="<?= $Key_Usu ?>" />

		 
		 <!-- Esto es para notificaciones 2 para loadingcircle-->
		  <div class="notification-shape shape-progress" id="notification-shape">
			<svg width="70px" height="70px"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
		  </div>
		  <input type="hidden" value="0" name="id_notificacion" id="id_notificacion" />
         <div id="contenedor">
            <div id="encabezado">
               <?php  include('menu.php'); ?>
            </div>
            <div id="cuerpo">
            </div>
            <div id="pie">
                <iframe src="https://footerugit.siua.ac.cr/index.php?texto=gris_oscuro&detalle=anaranjado" class="pie_pagina"></iframe>
            </div>
			
			<div id="ventana_emergente" >
		   
			</div>
			 <!-- esto es necesario para desvanecer el fondo-->
		     <div class="md-overlay"></div>  
		</div>
			
			
			
			   

		 <a href="#0" class="cd-top">Top</a>
		 
		 
		 
		 
         <script type="text/javascript">
           /* window.onbeforeunload = function(e) {
                Salir('<?//$Id_Per_Usu?>');
            };
            */
            //Desactivamos el clic derecho del mouse
            //document.oncontextmenu = function(){return false}
			/*   $(window).keydown(function(event){
					if(event.keyCode == 13) {
					  event.preventDefault();
					  return false;
					}
				  });
			   */
         </script>
    </body>
</html>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>