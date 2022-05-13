<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	$Id_Zon= (isset($_POST['Id_Zon'])) ? $_POST['Id_Zon'] : '';
	if($_FILES["file_logo_Zon"]['name']!=''){
		if(move_uploaded_file ( $_FILES [ 'file_logo_Zon' ][ 'tmp_name' ], $path.'img/Zonas/' .$_FILES["file_logo_Zon"]['name'])){
			$sql = "UPDATE tab_zonas SET
						Logo_Zon='".$_FILES["file_logo_Zon"]['name']."' 
					WHERE Id_Zon=".$Id_Zon;
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