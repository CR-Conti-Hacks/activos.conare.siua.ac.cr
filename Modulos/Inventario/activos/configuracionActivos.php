<?php

/*************************************************************************/
/*******************  CONFIGURACIÓN ACTIVOS    ***************************/
/*************************************************************************/
$sql = "SELECT 
				Id_ACON, 
				Diminutivo_ACON, 
				Ocultar_Activo_Institucional_ACON, 
				Enviar_Correo_Custodio_ACON,
				Dominio_Impresion_ACON,
				Enviar_Correo_Trasiego_ACON,
				Correo_Trasiego_ACON
		FROM tab_activos_configuracion 
		WHERE Id_ACON = 1";
$res_con = seleccion($sql);

/*************************************************************************/
/*******************        VARIABLES  ACTIVOS     ***********************/
/*************************************************************************/
$Diminutivo_ACON 						= $res_con[0]["Diminutivo_ACON"];
$Ocultar_Activo_Institucional_ACON 		= $res_con[0]["Ocultar_Activo_Institucional_ACON"];
$Enviar_Correo_Custodio_ACON 			= $res_con[0]["Enviar_Correo_Custodio_ACON"];
$Dominio_Impresion_ACON 				= $res_con[0]["Dominio_Impresion_ACON"];
$Enviar_Correo_Trasiego_ACON 			= $res_con[0]["Enviar_Correo_Trasiego_ACON"];
$Correo_Trasiego_ACON 					= $res_con[0]["Correo_Trasiego_ACON"];


?>