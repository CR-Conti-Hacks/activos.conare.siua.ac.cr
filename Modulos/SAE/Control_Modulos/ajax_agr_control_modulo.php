<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_nombre 		= (isset($_GET['txt_nombre'])) ? $_GET['txt_nombre'] : '';
	$txt_descripcion 	= (isset($_GET['txt_descripcion'])) ? $_GET['txt_descripcion'] : '';
	$txtpInicial		= (isset($_GET['txt_pInicial'])) ? $_GET['txt_pInicial'] : '';
	$txtpFinal		    = (isset($_GET['txt_pFinal'])) ? $_GET['txt_pFinal'] : '';
	
	
	$sql = "INSERT INTO tab_control_modulos (Descripcion_Cont_Mod,Nombre_Cont_Mod, Permiso_Inicial_Cont_Mod, Permiso_Final_Cont_Mod, Activo_Cont_Mod) VALUES (".
            "'".$txt_descripcion."',".
            "'".$txt_nombre."',".
            $txtpInicial.",".
			$txtpFinal.",".
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