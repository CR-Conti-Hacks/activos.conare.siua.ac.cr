<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	
	if($_FILES["archivo_logo"]['name']!=''){
		if(move_uploaded_file ( $_FILES [ 'archivo_logo' ][ 'tmp_name' ], $path.'img/Logo/' .$_FILES["archivo_logo"]['name'])){
			$sql = "UPDATE tab_configuracion SET
						Logo_Empresa_Conf='".$_FILES["archivo_logo"]['name']."'
					WHERE Id_Conf=1";
			$res = transaccion($sql);
			//SI Inserto correctamente la consulta
			if ($res[0]== 1){
				
				/********************** Guardar en Bitacora **********************/
				$hoy = date("d/m/Y").' '.date("H:i:s");
				$sql = 'INSERT INTO tab_bitacora (Fecha_Bita,Id_Per_Usu_Bita, SQL_Bita)
					VALUES ("'.$hoy.'","'.$Id_Per_Usu.'","'.$sql.'");';
				$res = transaccion($sql);
				/**********************************************************/
				
				//todo salio bien
				echo 1;
			}else{
				echo 'e1';
			}
		}else{
				echo 'e2';
		} 
	
	}else{
		echo 'e3';
	}
?>