<?php



/*************************************************************************/
/*******************  CONFIGURACIÓN SERVIDOR CORREO  *********************/
/*************************************************************************/
include($path."Modulos/SAE/Catalogos/configuracion_correo/saeConfiguracionServidorCorreo.php");



/***********************************************************/
/***********  CONFIGURACIÓN DE MENSAJES ********************/
/***********************************************************/
//Si se modifica el custodio el mensaje es de agregar
if(isset($existeCambioCustodio)){
  if($existeCambioCustodio ==1){
    $titulo = "SAE: Nuevo activo bajo su custodia: ".$Diminutivo_ACON.'-'.$IDACT;
    $men = "Le informamos que se le ha asignado un nuevo activo bajo su custodia a través del sistema de activos SAE, si esto es un error por favor comuiniquese con los encargados del sistema";
  
    }else{
      $titulo = "SAE: activo bajo su custodia modificado: ".$Diminutivo_ACON.'-'.$IDACT;
      $men = "Le informamos que se le ha modificado la información del activo: ".$Diminutivo_ACON.'-'.$IDACT." que se encuentra bajo su custodia a través del sistema de activos SAE, si esto es un error por favor comuiniquese con los encargados del sistema";
  }
} 
$tituloActivo ="INFORMACIÓN DEL ACTIVO:";

/***********************************************************/
/***********   OBTENER CUSTODIO DATOS   ********************/
/***********************************************************/
$sql = "SELECT Id_Cus,Nombre_Cus, Correo_Cus FROM tab_Custodios WHERE Id_Cus = ".$Id_Cus_Act;
$resCusNew = seleccion($sql);

$nombreCustodio = $resCusNew[0]['Nombre_Cus'];
$correoCustodio = $resCusNew[0]['Correo_Cus'];



/********************************************/
/*******   VERIFICACIÓN DE CORREO ***********/
/********************************************/
//Si no existe un correo para el custodio salga
if($correoCustodio ==""){
  exit();
}




/********************************************/
/*******   VERIFICACIÓN DE FOTO   ***********/
/********************************************/
if($foto ==""){
  $correoFoto = $dominio.$ruta."img/inventario/activos/default.png";
}else{
  //Obtenemos la foto
  $fotoTmp = "img/inventario/activos/".$foto; 
  if(!file_exists($path.$fotoTmp)){
    $correoFoto = $dominio.$ruta."img/inventario/activos/default.png";
  }else{
    $correoFoto = $dominio.$ruta."img/inventario/activos/".$foto;
  }
}


/**
* Envia correo de trasiego
*/
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//TimeZone
date_default_timezone_set('America/Costa_Rica');

//inluir archivos de PHPmailer
//inluir archivos de PHPmailer
if (!class_exists('PHPMailer\PHPMailer\Exception')){
  require $path.'Include/Miniaplicaciones/PHPMailer/src/Exception.php';
  require $path.'Include/Miniaplicaciones/PHPMailer/src/PHPMailer.php';
  require $path.'Include/Miniaplicaciones/PHPMailer/src/SMTP.php';
}
//Creamos una instancia
$mail = new PHPMailer();

//Usamos SMTP
$mail->isSMTP();

//Usamos UTF_8
$mail->CharSet = $Charset_COCO;

//servidor de correo
$mail->Host = $URL_Servidor_COCO;

//Numero de puerto
$mail->Port = $Puerto_Servidor_COCO;

if($SMTPAuth_Servidor_COCO == '1'){
  $smtpAuth = true;
}else{
  $smtpAuth = false;
}
//Whether to use SMTP authentication
$mail->SMTPAuth = $smtpAuth;

//Usuario de correo
$mail->Username = $Usuario_Servidor_COCO;

//Contraseña del usuario 
$mail->Password = $Password_Servidor_COCO;

//Quien envia
$mail->setFrom($Sender_Correo_COCO, $titulo);

//A quien se envia
$mail->addAddress($correoCustodio, $correoCustodio);

//Es HTML
$mail->isHTML(true);

//Set an alternative reply-to address
//$mail->addReplyTo('correo@dominio.tld', 'Magic');



/*Imprimir datos de correo para verificar*/
//error_log(print_r($mail,true));




$correo = 	'<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>'.$titulo.'</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
</head>

<body width="100%" style="margin: 0; padding: 0 !important; background-color: #FFF;font-family: '."'".'Lato'."'".', sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.6);">
	<center style="width: 100%; background-color: #FFF;">

    <div style="max-width: 100%; margin: 0 auto;">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
      	<tr>
          <td valign="top"  style=";background: #ffffff;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
          		<tr style="background-color: #172B3A;">
          			<td style="text-align: center;color: #FFF;font-size: 1.6rem;font-weight: 700; padding-top: 1.5rem; padding-bottom: 1.5rem;">
			            '.$titulo.'
			         </td>
          		</tr>
          	</table>
          </td>
	    </tr>

		<tr>
          <td valign="middle" style="padding: 2em 0 2em 0;background: #ffffff;">
            <table style="border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
            	<tr>
            		<td>
            			<div class="text" style="padding:2px; text-align: center;">
            				<h2 style="font-size: 3rem;color: #000000;font-weight: 400;margin: 0;">
            					N°: '.$Diminutivo_ACON.'-'.$IDACT.'
            				</h2>
            				
            				<p style="font-size: 1rem;">Usuario custodio:</p>
            				<h2 style="font-size: 1.6rem;line-height:1.8rem;color: #000000;font-weight: 400;margin:0; margin-bottom: 2rem;">
                                    '.$nombreCustodio.'
                            </h2>
                    <p style="font-size: 1rem;">Fecha y hora:</p>
                    <h2 style="font-size: 1.6rem;line-height:1.8rem;color: #000000;font-weight: 400;margin:0; margin-bottom: 2rem;">
                            '.date('Y-m-d H:i:s').'
                    </h2>
            				<p style="font-size: 1rem;">'.$tituloActivo.'</p>
            				<table  width="100%" style="font-size: 16px; color: rgba(0,0,0,.6); border: 1px solid #BBB; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
                      '.$cambiosActivoCorreo.'
            				</table>

            			</div>
            			
            		</td>
            	</tr>
            </table>
          </td>
	      </tr>
      </table>
    </div>
  </center>
</body>
</html>
			';




//Set the subject line
$mail->Subject = "'".$titulo."'";
$mail->Body = $correo; // Mensaje a enviar




//send the message, check for errors

if (!$mail->send()) {

} else {

}

?>