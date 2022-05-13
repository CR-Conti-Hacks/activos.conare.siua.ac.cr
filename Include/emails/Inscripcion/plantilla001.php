<?php

$Mensaje = '
<!DOCTYPE html>
<html lang="'.$idioma.'">
	<body style="margin:0;padding:0;-webkit-font-smoothing:antialiased; -webkit-text-size-adjust:none; 	width: 100%!important; 	height: 100%;	background-color: #FFF;">
	<meta http-equiv="Content-Type"  content="text/html charset=UTF-8" />
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<style>
		body {
			font-family: "Lato", sans-serif;
		}
	</style>
	<table style="width: 100%; background-color: #0D7CFF;">
		<tr>
			<td></td>
			<td>
					<div style="padding:15px;max-width:600px;margin:0 auto;	display:block;">
					<table style="width: 100%;">
						<tr>
							<td>';
/*******************************************************/
/*************** Saber si una imagen existe ************/
/*******************************************************/
if (is_array(@getimagesize($img_logo))){
	$Mensaje .= '<img src="'.$img_logo.'" style="width: 200px;" />';
}
							
								$Mensaje .='
							</td>
							<td align="right" >
								<span style="margin-right: 0px; font-weight:400;font-size: 2.5em; color: #FFF;">'.$Saludo.'</span>
							</td>
						</tr>
					</table>
					</div>
					
			</td>
			<td></td>
		</tr>
	</table>
	
	<table style="width: 100%;">
		<tr>
			<td></td>
			<td style="display:block!important;max-width:600px!important;margin:0 auto!important; clear:both!important;">
	
				<div style="padding:15px;max-width:600px;margin:0 auto;	display:block;">
				<table>
					<tr>
						<td>
							<br />						
							<span style="font-weight:300;font-size: 1.6em;color: #2D434C;">'. $texto['Hola'].', '.$txt_nombre.' '.$txt_ape1.' '.$txt_ape2.'</span>
							<hr style="background-color: #C0C3C6;border: none;height: 0.1em;">
							<br />
							<p align="justify" style="padding-left:5px;padding-right:5px;margin-bottom:10px;font-weight:100;font-size:1em;line-height:1.6;color: #464749;">
								'.$texto['CORREO_Texto1_Inscripcion'].
								$Nombre_Conf.' ('.$Nombre_Resumen_Conf.'), '.
								$texto['CORREO_Texto2_Inscripcion'].'
								<a href="'.$Direccion_Web_Conf.$Direccion_Carpeta_Conf.'" target="_blank" style="text-decoration: none; color: #20BFDB; cursor: pointer;">'.$Direccion_Web_Conf.$Direccion_Carpeta_Conf.'</a>, 
								 '.'    '.$texto['CORREO_Texto3_Inscripcion'].'
							</p>
							<p align="justify" style="padding-left:8px;padding-right:8px; padding-bottom: 15px; padding-top: 15px;margin-bottom:10px;font-weight:100;line-height:1.6;color: #464749;background-color: rgba(121, 210, 216, 0.3);font-size: .8em;">
								<span style="font-weight: bold;font-size: 15px;">'.$texto['Nota'].':</span>
								'.$texto['CORREO_Texto4_Inscripcion'].' 
								<span style="font-weight: bold;font-size: 15px; padding-left: 15px; color: #2785AA;">'.$Para.'</span>.
							</p>
							<p align="justify" style="padding-left:5px;padding-right:5px;margin-bottom:10px;font-weight:100;font-size:1em;line-height:1.6;color: #464749;">
								'.$texto['CORREO_Texto5_Inscripcion'].'
								<a href="'.$Direccion_Web_Conf.$Direccion_Carpeta_Conf.'" target="_blank" style="text-decoration: none; color: #20BFDB; cursor: pointer;">
								'.$Direccion_Web_Conf.$Direccion_Carpeta_Conf.'</a>,
								'.$texto['CORREO_Texto6_Inscripcion'].'
								<span style="font-weight: 400; color: #000;">'.$texto['CORREO_Texto7_Inscripcion'].'</span>
							</p>
							<br />
							<br />
							<table style="width:100%; background-color: #E6E9ED;">
								<tr>
									<td>';
									
/*************************************************************/
/*************** Saber que redes sociales existen ************/
/*************************************************************/
$ancho = "100%";
if(($Direccion_Facebook_Conf!='')||($Direccion_Twitter_Conf!='')||($Direccion_GooglePlus_Conf!='')){
	$Mensaje .= '<table align="left" style="width: 30%;float:left;font-size: 0.8em;float:left;">
					<tr>
						<td style="padding: 15px;">				
							<span style="font-size: 1.4em;">'.$texto['Contactenos'].':</span>
								<p>';
	if($Direccion_Facebook_Conf!=''){
		$Mensaje .=	'<a href="'.$Direccion_Facebook_Conf.'" style="padding: 3px 7px;font-size:0.9em;margin-bottom:8px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #3B5998!important;">
							'.$texto['Facebook'].'
					</a>';
	}
	if($Direccion_Twitter_Conf!=''){
		$Mensaje .= '<a href="'.$Direccion_Twitter_Conf.'" style="padding: 3px 7px;font-size:0.9em;margin-bottom:8px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #1daced!important;">
							'.$texto['Twitter'].'
					</a>';
	}
	if($Direccion_GooglePlus_Conf!=''){
		$Mensaje .=	'<a href="'.$Direccion_GooglePlus_Conf.'" style="padding: 3px 7px;font-size:0.9em;margin-bottom:8px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #DB4A39!important;">
							'.$texto['Google_Mas'].'
					</a>';
	}
	$Mensaje .=				'</p>
						</td>
					</tr>
				</table>';
	$ancho = "70%";
}

$Mensaje .=								'<table align="left" style="width: '.$ancho.';float:left;font-size: 0.8em;float:left;">
											<tr>
												<td style="padding: 15px;">				
																				
													<span style="font-size: 1.4em;">'.$texto['Informacion'].':</span>
													<br>';
									if($Direccion_Conf!=''){
										$Mensaje .=	'<p style="margin: 0; padding: 0; margin-top: 5px; margin-bottom: 5px;">
														<span style="font-weight: 400;font-size: 1em; color: #3E4851;">'.$texto['Direccion'].':</span>
														<span style="color:#696F72;font-size: 0.9em;">'.$Direccion_Conf.'</span>
													</p>';
									}
									
									if($Telefono_Conf !=''){
										$Mensaje .=	'<p style="margin: 0; padding: 0; margin-top: 5px; margin-bottom: 5px;">
														<span style="font-weight: 400;font-size: 1em; color: #3E4851;">'.$texto['Telefono'].':</span>
														<span style="color:#696F72;font-size: 0.9em;">+('.$Codigo_Pai.') '.$Telefono_Conf.'</span>
													</p>';
									}
									if($Fax_Conf!=''){
										$Mensaje .=	'<p style="margin: 0; padding: 0; margin-top: 5px; margin-bottom: 5px;">
														<span style="font-weight: 400;font-size: 1em; color: #3E4851;">Fax:</span>
														<span style="color:#696F72;font-size: 0.9em;">+(506) 2441-7246</span>
													</p>';
									}
									if($Email_Conf!=''){
										$Mensaje .=	'<p style="margin: 0; padding: 0; margin-top: 5px; margin-bottom: 5px;">
														<span style="font-weight: 400;font-size: 1em; color: #3E4851;">'.$texto['Correo'].':</span>
														<a style="font-size: 1em;text-decoration:none;color: #20BFDB;" href="emailto:'.$Email_Conf.'">'.$Email_Conf.'</a>
													</p>';
									}
					
$Mensaje .=										'</td>
											</tr>
										</table>
										
										<span style="display: block; clear: both;"></span>	
										
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</div>
			</td>
			<td></td>
		</tr>
	</table>
</body>
</html>
';

return $Mensaje;
?>
