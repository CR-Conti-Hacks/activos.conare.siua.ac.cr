<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/

	
    //Recibir los parametros
	$txt_nombre_lla		= ( isset($_POST['txt_nombre_lla'])) ? $_POST['txt_nombre_lla'] : '';
	$txt_descripcion_lla		= (isset($_POST['txt_descripcion_lla'])) ? $_POST['txt_descripcion_lla'] : '';
	$txt_espacio_lla		= (isset($_POST['txt_espacio_lla'])) ? $_POST['txt_espacio_lla'] : '';
	


	//Trae foto
   $foto = "";
   if(isset($_FILES["Foto_lla"]['name'])){
	  if(move_uploaded_file ( $_FILES [ 'Foto_lla' ][ 'tmp_name' ], $path.'img/llaves/llaves/' .$_FILES["Foto_lla"]['name'])){
			$foto = $_FILES["Foto_lla"]['name'];
									
	  }
   }
	
	$sql = "INSERT INTO tab_preslla_llaves (
						Nombre_LLA,
						Descripcion_LLA,
						Espacio_LLA,
						Foto_LLA,
						Activo_LLA
						) VALUES (".
			"'".$txt_nombre_lla."',".
            "'".$txt_descripcion_lla."',".
			$txt_espacio_lla.",".
			"'".$foto."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>