<?php


/**
* Envia correo de trasiego
*/
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//TimeZone
date_default_timezone_set('America/Costa_Rica');

//inluir archivos de PHPmailer
require $path.'Include/Miniaplicaciones/PHPMailer/src/Exception.php';
require $path.'Include/Miniaplicaciones/PHPMailer/src/PHPMailer.php';
require $path.'Include/Miniaplicaciones/PHPMailer/src/SMTP.php';

//Creamos una instancia
$mail = new PHPMailer();

//Usamos SMTP
$mail->isSMTP();

//Usamos UTF_8
$mail->CharSet = 'UTF-8';

//servidor de correo
$mail->Host = 'correo.siua.ac.cr';

//Numero de puerto
$mail->Port = 25;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Usuario de correo
$mail->Username = 'trasiego@siua.ac.cr';

//Contraseña del usuario 
$mail->Password = 'Trasiego_ADM_2';

//Quien envia
$mail->setFrom('trasiego@siua.ac.cr', 'Trasiegos SIUA:'.$trasiegoId);

//A quien se envia
$mail->addAddress('trasiego@siua.ac.cr', 'trasiego@siua.ac.cr');



/*******************************************************************************/
/******************* Obtener los correos del usuario ***************************/
/*******************************************************************************/
//Obtenemos los correos del usuario habilitados para notificación
$sql = "SELECT Correo_Cor FROM tab_correos  WHERE Notificacion_Cor = '1' AND Id_Per_Cor = ".$Id_Per_Usu;
$resCorreos = seleccion($sql);

//obtenemos el nombre del usuario
$sql ="SELECT Nombre_Per, Apellido1_Per, Apellido2_Per FROM tab_personas WHERE Id_Per = ".$Id_Per_Usu;
$resPersona = seleccion($sql);


if(count($resCorreos)>0){
    for ($i=0; $i < count($resCorreos); $i++) { 
        $mail->addAddress($resCorreos[$i]['Correo_Cor'], $resPersona[0]['Nombre_Per']." ".$resPersona[0]['Apellido1_Per']." ".$resPersona[0]['Apellido2_Per']);
    }

}

/*******************************************************************************/
/************** FIN: Obtener los correos del usuario ***************************/
/*******************************************************************************/



//Es HTML
$mail->isHTML(true);

//Set an alternative reply-to address
//$mail->addReplyTo('correo@dominio.tld', 'Magic');





$correo = 	'<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Boleta Trasiego SIUA'.$trasiegoId.'</title>
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
			            Boleta Trasiego
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
            					N°: SIUA-'.$trasiegoId.'
            				</h2>
            				
            				<p style="font-size: 1rem;">Usuario autorizado:</p>
            				<h2 style="font-size: 1.6rem;line-height:1.8rem;color: #000000;font-weight: 400;margin:0; margin-bottom: 2rem;">
                                    '.$trasiegoNombre." / ".$trasiegoIdentificacion.'
                            </h2>
                            <table width="100%" style="font-size: 18px; color: #888;border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
                                <thead>
                                    <tr style="background-color: #172B3A; color: #FFF; text-align: center;">
                                        <th style=" border: 1px solid #FFF; padding-top: .2rem; padding-bottom: .2rem;">Motivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="color: #000; text-align: center;">
                                        <td>'.$trasiegoMotivo.'</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br />
                            <br />
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
            						</tr>
            					</thead>

            					<tbody>'.$trasiegoListaActivos.'</tbody>
            				</table>
            				<p><a target="_blank" href="https://sae.siua.ac.cr/inventario_publico/consulta_trasiego.php?Id_TRA='.$trasiegoId.'" class="btn btn-primary" style="font-size:1.8rem;padding: 3px 25px;display: inline-block;border-radius: 5px;background: #F57900;color: #ffffff; text-decoration: none;">Validar</a></p>
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
$mail->Subject = 'Aprobación de Trasiego'.$trasiegoId;
$mail->Body = $correo; // Mensaje a enviar




//send the message, check for errors

if (!$mail->send()) {

} else {

}

?>