<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	$Id_CT= (isset($_POST['Id_CT'])) ? $_POST['Id_CT'] : '';
	if($_FILES["file_logo_CT"]['name']!=''){
		if(move_uploaded_file ( $_FILES [ 'file_logo_CT' ][ 'tmp_name' ], $path.'img/Centros_Trabajo/' .$_FILES["file_logo_CT"]['name'])){
			$sql = "UPDATE tab_centros_trabajos SET
						Logo_CT='".$_FILES["file_logo_CT"]['name']."' 
					WHERE Id_CT=".$Id_CT;
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