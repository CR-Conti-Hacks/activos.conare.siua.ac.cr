<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Rol 		    = (isset($_GET['Id_Rol'])) ? $_GET['Id_Rol'] : '';
	$txt_nombre 		= (isset($_GET['txt_nombre'])) ? $_GET['txt_nombre'] : '';

	
	
	$sql = "UPDATE tab_roles SET Nombre_Rol = '".$txt_nombre."' WHERE Id_Rol=".$Id_Rol;
		
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