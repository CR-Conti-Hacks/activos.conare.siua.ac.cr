<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	
	if($_FILES["file_logo_CT"]['name']!=''){
		if(move_uploaded_file ( $_FILES [ 'file_logo_CT' ][ 'tmp_name' ], $path.'img/Centros_Trabajo/' .$_FILES["file_logo_CT"]['name'])){
				echo '1';
		}else{
				echo 'e1';
		}
	}
?>