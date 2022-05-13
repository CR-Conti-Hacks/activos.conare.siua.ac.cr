<?php

/*************************************************************************/
/*******************  CONFIGURACIÓN SERVIDOR CORREO    *******************/
/*************************************************************************/
$sql = "SELECT 	Id_COCO,
			    Charset_COCO,
			    URL_Servidor_COCO,
			    Puerto_Servidor_COCO,
			    SMTPAuth_Servidor_COCO,
			    Usuario_Servidor_COCO,
			    Password_Servidor_COCO,
			    Sender_Correo_COCO
		FROM tab_sae_correo_configuracion 
		WHERE Id_COCO = 1;";
$res_con = seleccion($sql);

/*************************************************************************/
/*******************        VARIABLES  ACTIVOS     ***********************/
/*************************************************************************/
$Charset_COCO 						= $res_con[0]["Charset_COCO"];
$URL_Servidor_COCO 					= $res_con[0]["URL_Servidor_COCO"];
$Puerto_Servidor_COCO 				= $res_con[0]["Puerto_Servidor_COCO"];
$SMTPAuth_Servidor_COCO 			= $res_con[0]["SMTPAuth_Servidor_COCO"];
$Usuario_Servidor_COCO 				= $res_con[0]["Usuario_Servidor_COCO"];
$Password_Servidor_COCO 			= $res_con[0]["Password_Servidor_COCO"];
$Sender_Correo_COCO 				= $res_con[0]["Sender_Correo_COCO"];


?>