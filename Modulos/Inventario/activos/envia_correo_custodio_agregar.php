<?php



/*************************************************************************/
/*******************  CONFIGURACIÓN SERVIDOR CORREO  *********************/
/*************************************************************************/
include($path."Modulos/SAE/Catalogos/configuracion_correo/saeConfiguracionServidorCorreo.php");



/***********************************************************/
/***********  CONFIGURACIÓN DE MENSAJES ********************/
/***********************************************************/
$titulo = "SAE: Nuevo activo bajo su custodia: ".$Diminutivo_ACON.'-'.$IDACT;;
$men = "Le informamos que se le ha asignado un nuevo activo bajo su custodia a través del sistema de activos SAE, si esto es un error por favor comuiniquese con los encargados del sistema";
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


$campos ='<tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Id Activo:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Diminutivo_ACON.'-'.$IDACT.'</td>
          </tr>
          <tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Fotografía:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">
              <img src="'.$correoFoto.'" style="width:40px" />
            </td>
          </tr>
          <tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Nombre:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Nombre_Act.'</td>
          </tr>
          <tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Marca:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Marca_Act.'</td>
          </tr>
          <tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Modelo:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Modelo_Act.'</td>
          </tr>
          <tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Color:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Color_Act.'</td>
          </tr>
          <tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">N°. Serie:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Numero_Serie_Act.'</td>
          </tr>
          <tr>
            <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Descripción:</th>
            <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Descripcion_Act.'</td>
          </tr>
          ';

if($Ocultar_Activo_Institucional_ACON !="1"){
  $campos .= '<tr>
                <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Act. Institucional:</th>
                <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Id_INS_Act.'</td>
              </tr>';
}


$campos .= '<tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Institución:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$nombreInstitucion.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Activo fijo:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Activo_Fijo_Act." / ".$AFNuevo.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Fecha recepción:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Fecha_Recepcion_Act.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Tiempo garantía:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Tiempo_Garantia_Act.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Factura:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.'ID Registro: '.$Id_Factu_Act.' / Número Factura: '.$resFacNew[0]['Numero_Factu'].' / Número Orden: '.$resFacNew[0]['Numero_OC'].'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Costo:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Costo_Act.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Zona:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Id_Zonas_tmp_Act.' / '.$resZonNew[0]['Nombre_Zonas_tmp'].'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Responsable:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Id_Res_Act.' / '.$resResNew[0]['Nombre_Res'].'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Custodio:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Id_Cus_Act.' / '.$resCusNew[0]['Nombre_Cus'].'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Desecho:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Desecho_Act.' / '.$desechoNuevo.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Descripción desecho:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$desechoDescripNuevo.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Donación:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Donacion_Act.' / '.$donacionNuevo.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Descripción donación:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$donacionDescripNuevo.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Mantenimiento:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Mantenimiento_Act.' / '.$manteNuevo.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Descripción mantenimiento:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$mantenimientoDescripNuevo.'</td>
            </tr>
            <tr>
              <th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Verificación:</th>
              <td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$Verificado_Act.' / '.$veriNuevo.'</td>
            </tr>
            ';

$correo = 	'<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>'.$titulo.$IDACT .'</title>
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
                      '.$campos.'
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