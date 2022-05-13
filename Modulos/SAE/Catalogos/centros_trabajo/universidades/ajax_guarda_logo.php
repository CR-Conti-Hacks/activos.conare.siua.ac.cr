<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	
	if($_FILES["file_logo_Uni"]['name']!=''){
		if(move_uploaded_file ( $_FILES [ 'file_logo_Uni' ][ 'tmp_name' ], $path.'img/Universidades/' .$_FILES["file_logo_Uni"]['name'])){
				echo '1';
		}else{
				echo 'e1';
		}
	}
?>