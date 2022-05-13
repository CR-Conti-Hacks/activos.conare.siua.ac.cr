<?php
	
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	
	if($_FILES["file_logo_Zon"]['name']!=''){
		if(move_uploaded_file ( $_FILES [ 'file_logo_Zon' ][ 'tmp_name' ], $path.'img/Zonas/' .$_FILES["file_logo_Zon"]['name'])){
				echo '1';
		}else{
				echo 'e1';
		}
	}
?>