<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Zon=(isset($_GET['Id_Zon'])) ? $_GET['Id_Zon'] : '';
    $Id_CT=(isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '';
	$Id_Uni=(isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : '';
	$txt_nombre 		= (isset($_GET['txt_nombre'])) ? $_GET['txt_nombre'] : '';
	$txt_diminutivo		= (isset($_GET['txt_diminutivo'])) ? $_GET['txt_diminutivo'] : '';
	$txt_telefono 	= (isset($_GET['txt_telefono'])) ? $_GET['txt_telefono'] : '';
	$txt_fax		= (isset($_GET['txt_fax'])) ? $_GET['txt_fax'] : '';
	$txt_direccion		    = (isset($_GET['txt_direccion'])) ? $_GET['txt_direccion'] : '';
	$txt_correo		    = (isset($_GET['txt_correo'])) ? $_GET['txt_correo'] : '';
	
	
	$sql = "UPDATE tab_zonas SET Nombre_Zon = '".$txt_nombre."', Diminutivo_Zon = '".$txt_diminutivo."', Telefono_Zon ='".$txt_telefono."', Fax_Zon='".$txt_fax."', Direccion_Zon='".$txt_direccion."', Correo_Zon='".$txt_correo."' ".
	" WHERE Id_Zon=".$Id_Zon." AND Id_Uni_Zon=".$Id_Uni;

		
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