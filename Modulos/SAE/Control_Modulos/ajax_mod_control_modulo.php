<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Cont_Mod 		    = (isset($_GET['Id_Cont_Mod'])) ? $_GET['Id_Cont_Mod'] : '';
	$txt_nombre 		= (isset($_GET['txt_nombre'])) ? $_GET['txt_nombre'] : '';
	$txt_desc	= (isset($_GET['txt_desc'])) ? $_GET['txt_desc'] : '';
	$txt_inicial    = (isset($_GET['txt_inicial'])) ? $_GET['txt_inicial'] : '';
	$txt_final    = (isset($_GET['txt_final'])) ? $_GET['txt_final'] : '';
	
	
	$sql = "UPDATE tab_control_modulos SET Nombre_Cont_Mod = '".$txt_nombre."', Descripcion_Cont_Mod='".$txt_desc."', Permiso_Inicial_Cont_Mod=".$txt_inicial.", Permiso_Final_Cont_Mod=".$txt_final.
	" WHERE Id_Cont_Mod=".$Id_Cont_Mod;

		
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