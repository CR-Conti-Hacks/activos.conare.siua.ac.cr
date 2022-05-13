<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_CT=(isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '';
	$Id_Uni=(isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : '';
	$Id_Zon=(isset($_GET['Id_Zon'])) ? $_GET['Id_Zon'] : '';
	$txt_nombre 		= (isset($_GET['txt_nombre'])) ? $_GET['txt_nombre'] : '';
	$txt_diminutivo		= (isset($_GET['txt_diminutivo'])) ? $_GET['txt_diminutivo'] : '';
	$txt_telefono 	= (isset($_GET['txt_telefono'])) ? $_GET['txt_telefono'] : '';
	$txt_fax		= (isset($_GET['txt_fax'])) ? $_GET['txt_fax'] : '';
	$txt_correo		    = (isset($_GET['txt_correo'])) ? $_GET['txt_correo'] : '';
	$txt_latitud		    = (isset($_GET['txt_latitud'])) ? $_GET['txt_latitud'] : '';
	$txt_longitud		    = (isset($_GET['txt_longitud'])) ? $_GET['txt_longitud'] : '';

	
	$sql = "INSERT INTO tab_sub_zona (Id_Zon_SZ, Nombre_SZ, Diminutivo_SZ, Telefono_SZ, Fax_SZ, Correo_SZ, Latitud_SZ, Longitud_SZ, Activo_SZ) VALUES (".
	        $Id_Zon.", ".
			"'".$txt_nombre."',".
            "'".$txt_diminutivo."',".
			"'".$txt_telefono."',".
			"'".$txt_fax."',".
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