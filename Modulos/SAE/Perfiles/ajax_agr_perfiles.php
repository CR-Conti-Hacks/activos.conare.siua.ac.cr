<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_nombre 		= (isset($_GET['txt_nombre'])) ? $_GET['txt_nombre'] : '';
	
	
	
	$sql = "INSERT INTO tab_roles (Nombre_Rol,Activo_Rol) VALUES (".
            "'".$txt_nombre."',".
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