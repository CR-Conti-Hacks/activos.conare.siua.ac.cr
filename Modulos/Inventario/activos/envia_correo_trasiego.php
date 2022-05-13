<?php

/***********************************************************/
/***********   VERIFICACIÓN CORREO TRASIEGO   **************/
/***********************************************************/
//Si no existe correo de trasiego salga
if($Correo_Trasiego_ACON==""){
exit();
}


/*************************************************************************/
/*******************  CONFIGURACIÓN SERVIDOR CORREO  *********************/
/*************************************************************************/
include($path."Modulos/SAE/Catalogos/configuracion_correo/saeConfiguracionServidorCorreo.php");


/***********************************************************/
/***********  CONFIGURACIÓN DE MENSAJES ********************/
/***********************************************************/
$titulo = "SAE: Aprobación de Trasiego: ".$Diminutivo_ACON.'-'.'TRA-'.$trasiegoId;
$tituloResumen ="Boleta Trasiego";



/***********************************************************/
/***********     OBTENER DATOS HZ       ********************/
/***********************************************************/
$sql = "SELECT 
        hz.Id_HZ AS ID_HZ, 
        hz.Id_Act_HZ AS Id_Act,
        hz.Id_Per_Usu_HZ AS Id_Per_Usu,
        hz.Id_Zonas_tmp_Anterior_HZ AS Zona_Anterior,
        hz.Id_Zonas_tmp_Nuevo_HZ AS Zona_Nueva,
        hz.Fecha_HZ AS Fecha,
        hz.Motivo_HZ AS Motivo
FROM tab_sae_historial_zona as hz
INNER JOIN tab_sae_TXHZ AS txhz ON (hz.Id_HZ = txhz.Id_HZ_TXHZ)
WHERE ID_TRA_TXHZ = ".$trasiegoId;

$resTRA = seleccion($sql);

//Datos de HZ
$trasiegoIdAct  = $resTRA[0]['Id_Act'];
$trasiegoMotivo = $resTRA[0]['Motivo'];

/***********************************************************/
/***********     OBTENER NOMBRES ZONAS  ********************/
/***********************************************************/
$Zona_Anterior  = $resTRA[0]['Zona_Anterior'];
$Zona_Nueva     = $resTRA[0]['Zona_Nueva'];

//Zona Anterior
$sql = "SELECT Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Id_Zonas_tmp = ".$Zona_Anterior;

$resZA  = seleccion($sql);
$trasiegoZonaAnterior = $resZA[0]['Nombre_Zonas_tmp'];

//Zona Nueva
$sql = "SELECT Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Id_Zonas_tmp = ".$Zona_Nueva ;
$resZN  = seleccion($sql);
$trasiegoZonaNueva = $resZN[0]['Nombre_Zonas_tmp'];






/**
* Envia correo de trasiego
*/
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//TimeZone
date_default_timezone_set('America/Costa_Rica');

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
$mail->addAddress($Correo_Trasiego_ACON, $Correo_Trasiego_ACON);

//Es HTML
$mail->isHTML(true);

//error_log(print_r($mail,true));






$correo = 	'<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>'.$tituloResumen.': '.$Diminutivo_ACON.'-'.'TRA-'.$trasiegoId.'</title>
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
			            '.$tituloResumen.'
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
            					N°: '.$Diminutivo_ACON.'-'.'TRA-'.$trasiegoId.'
            				</h2>
            				
            				<p style="font-size: 1rem;">Usuario autorizado:</p>
            				<h2 style="font-size: 1.6rem;line-height:1.8rem;color: #000000;font-weight: 400;margin:0; margin-bottom: 2rem;">
                                    '.$trasiegoNombre." / ".$trasiegoIdentificacion.'
                            </h2>
            				<table width="100%" style="font-size: 18px; color: #888;border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
            					<thead>
            						<tr style="background-color: #172B3A; color: #FFF; text-align: center;">
            							<th style=" border: 1px solid #FFF; padding-top: .2rem; padding-bottom: .2rem;">Fecha</th>
            							<th style=" border: 1px solid #FFF; padding-top: .2rem; padding-bottom: .2rem;">Hora</th
            						</tr>
            					</thead>
            					<tbody>
            						<tr style="color: #000; text-align: center;">
            							<td>'.$trasiegoFecha.'</td>
            							<td>'.$trasiegoHora.'</td>
            						</tr>
            					</tbody>
            				</table>
            				<p style="font-size: 1rem;">A continuación se lista los activos aprobados para trasiego</p>
            				<table  width="100%" style="font-size: 16px; color: rgba(0,0,0,.6); border: 1px solid #BBB; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
            					<thead>
            						<tr  style="background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center;">
            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Id Activo</th>
            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Zona anterior</th>
            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Zona nueva</th>
            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Motivo</th>
            						</tr>
            					</thead>
            					<tbody>
            						<tr style="border: 1px solid #BBB; text-align: center;">
            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$trasiegoIdAct.'</td>
            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$trasiegoZonaAnterior.'</td>
            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$trasiegoZonaNueva.'</td>
            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$trasiegoMotivo.'</td>

            						</tr>
            					</tbody>
            				</table>
            				<p><a target="_blank" href="'.$dominio.$ruta.'inventario_publico/consulta_trasiego.php?Id_TRA='.$trasiegoId.'" class="btn btn-primary" style="font-size:1.8rem;padding: 3px 25px;display: inline-block;border-radius: 5px;background: #F57900;color: #ffffff; text-decoration: none;">Validar</a></p>
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
$mail->Subject = $titulo;
$mail->Body = $correo; // Mensaje a enviar




//send the message, check for errors

if (!$mail->send()) {

} else {

}

?>