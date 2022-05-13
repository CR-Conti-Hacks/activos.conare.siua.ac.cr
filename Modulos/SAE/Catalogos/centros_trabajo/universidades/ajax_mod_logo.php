<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	$Id_Uni= (isset($_POST['Id_Uni'])) ? $_POST['Id_Uni'] : '';
	if($_FILES["file_logo_Uni"]['name']!=''){
		if(move_uploaded_file ( $_FILES [ 'file_logo_Uni' ][ 'tmp_name' ], $path.'img/Universidades/' .$_FILES["file_logo_Uni"]['name'])){
			$sql = "UPDATE tab_universidades SET
						Logo_Uni='".$_FILES["file_logo_Uni"]['name']."' 
					WHERE Id_Uni=".$Id_Uni;
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