<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_CT=(isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '';
	$file_logo= (isset($_GET['file_logo'])) ? $_GET['file_logo'] : '';
	$txt_nombre 		= (isset($_GET['txt_nombre'])) ? $_GET['txt_nombre'] : '';
	$txt_diminutivo		= (isset($_GET['txt_diminutivo'])) ? $_GET['txt_diminutivo'] : '';
	$txt_telefono 	= (isset($_GET['txt_telefono'])) ? $_GET['txt_telefono'] : '';
	$txt_fax		= (isset($_GET['txt_fax'])) ? $_GET['txt_fax'] : '';
	$txt_direccion		    = (isset($_GET['txt_direccion'])) ? $_GET['txt_direccion'] : '';
	$txt_correo		    = (isset($_GET['txt_correo'])) ? $_GET['txt_correo'] : '';
	$txt_latitud		    = (isset($_GET['txt_latitud'])) ? $_GET['txt_latitud'] : '';
	$txt_longitud		    = (isset($_GET['txt_longitud'])) ? $_GET['txt_longitud'] : '';

	
	$sql = "INSERT INTO tab_universidades (Id_CT_Uni, Nombre_Uni, Diminutivo_Uni, Logo_Uni, Telefono_Uni, Fax_Uni, Direccion_Uni, Correo_Uni, Latitud_Uni, Longitud_Uni, Activo_Uni) VALUES (".
	        $Id_CT.", ".
			"'".$txt_nombre."',".
            "'".$txt_diminutivo."',".
            "'".$file_logo."',".
			"'".$txt_telefono."',".
			"'".$txt_fax."',".
			"'".$txt_direccion."',".
			"'".$txt_correo."',".
			"'".$txt_latitud."',".
			"'".$txt_longitud."',".
            "'1')";
	
    $res = transaccion($sql);
    if ($res[0]== 1){
		/********************** Guardar en Bitacora **********************/
		$hoy = date("d/m/Y").' '.date("H:i:s");
		$sql = 'INSERT INTO tab_bitacora (Fecha_Bita,Id_Per_Usu_Bita, SQL_Bita)
				VALUES ("'.$hoy.'","'.$Id_Per_Usu.'","'.$sql.'");';
		$res = transaccion($sql);
		/**********************************************************/
        echo  '1';
    }else{
        echo 'e1';
    }


?>