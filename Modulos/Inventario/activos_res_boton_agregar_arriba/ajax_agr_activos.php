<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/

	
    //Recibir los parametros
	$Nombre_Act		= ( isset($_POST['Nombre_Act'])) ? $_POST['Nombre_Act'] : '';
	$Marca_Act		= (isset($_POST['Marca_Act'])) ? $_POST['Marca_Act'] : '';
	$Modelo_Act		= (isset($_POST['Modelo_Act'])) ? $_POST['Modelo_Act'] : '';
	$Numero_Serie_Act		= (isset($_POST['Numero_Serie_Act'])) ? $_POST['Numero_Serie_Act'] : '';
	$Color_Act		= (isset($_POST['Color_Act'])) ? $_POST['Color_Act'] : '';
	$Descripcion_Act		= (isset($_POST['Descripcion_Act'])) ? $_POST['Descripcion_Act'] : '';
	$Id_Zonas_tmp_Act		= (isset($_POST['Id_Zonas_tmp_Act'])) ? $_POST['Id_Zonas_tmp_Act'] : '';
	$Id_Uni_Act		= (isset($_POST['Id_Uni_Act'])) ? $_POST['Id_Uni_Act'] : '';
	$Id_INS_Act		= (isset($_POST['Id_INS_Act'])) ? $_POST['Id_INS_Act'] : '';
	$Id_UGIT_Act		= (isset($_POST['Id_UGIT_Act'])) ? $_POST['Id_UGIT_Act'] : '';
	$Fecha_Recepcion_Act		= (isset($_POST['Fecha_Recepcion_Act'])) ? $_POST['Fecha_Recepcion_Act'] : '';
	$Tiempo_Garantia_Act		= (isset($_POST['Tiempo_Garantia_Act'])) ? $_POST['Tiempo_Garantia_Act'] : 0;
	$Id_OC		= (isset($_POST['Id_OC'])) ? $_POST['Id_OC'] : '';
	$Id_Factu_Act		= (isset($_POST['Id_Factu_Act'])) ? $_POST['Id_Factu_Act'] : '';
	$Costo_Act		= (isset($_POST['Costo_Act'])) ? $_POST['Costo_Act'] : '';
	$Desecho_Act		= (isset($_POST['Desecho_Act'])) ? $_POST['Desecho_Act'] : '';
	$Descripcion_Dese_Act		= (isset($_POST['Descripcion_Dese_Act'])) ? $_POST['Descripcion_Dese_Act'] : '';
	$Donacion_Act		= (isset($_POST['Donacion_Act'])) ? $_POST['Donacion_Act'] : '';
	$Descripcion_Dona_Act		= (isset($_POST['Descripcion_Dona_Act'])) ? $_POST['Descripcion_Dona_Act'] : '';
	$Mantenimiento_Act		= (isset($_POST['Mantenimiento_Act'])) ? $_POST['Mantenimiento_Act'] : '';
	$Descripcion_Mante_Act		= (isset($_POST['Descripcion_Mante_Act'])) ? $_POST['Descripcion_Mante_Act'] : '';
	$Verificado_Act		= (isset($_POST['Verificado_Act'])) ? $_POST['Verificado_Act'] : '';


	//Trae foto
   $foto = "";
   if($_FILES["Foto_Act"]['name']!=''){
	  if(move_uploaded_file ( $_FILES [ 'Foto_Act' ][ 'tmp_name' ], $path.'img/inventario/activos/' .$_FILES["Foto_Act"]['name'])){
			$foto = $_FILES["Foto_Act"]['name'];
									
	  }
   }
	
	$sql = "INSERT INTO tab_Activos (
						Id_Zonas_tmp_Act,
						Id_INS_Act,
						Id_UGIT_Act,
						Id_Factu_Act,
						Id_Uni_Act,
						Fecha_Recepcion_Act,
						Nombre_Act,
						Descripcion_Act,
						Foto_Act,
						Costo_Act,
						Desecho_Act,
						Descripcion_Dese_Act,
						Donacion_Act,
						Descripcion_Dona_Act,
						Verificado_Act,
						Id_Per_Usu_Act,
						Numero_Serie_Act,
						Marca_Act,
						Modelo_Act,
						Color_Act,
						Mantenimiento_Act,
						Descripcion_Mante_Act,
						Tiempo_Garantia_Act,
						Activo_Act
						) VALUES (".
			$Id_Zonas_tmp_Act.",".
            "'".$Id_INS_Act."',".
			"'".$Id_UGIT_Act."',".
			$Id_Factu_Act.",".
			$Id_Uni_Act.",".
			"'".$Fecha_Recepcion_Act."',".
			"'".$Nombre_Act."',".
			"'".$Descripcion_Act."',".
			"'".$foto."',".
			"'".$Costo_Act."',".
			"'".$Desecho_Act."',".
			"'".$Descripcion_Dese_Act."',".
			"'".$Donacion_Act."',".
			"'".$Descripcion_Dona_Act."',".
			"'".$Verificado_Act."',".
			$Id_Per_Usu.",".
			"'".$Numero_Serie_Act."',".
			"'".$Marca_Act."',".
			"'".$Modelo_Act."',".
			"'".$Color_Act."',".
			"'".$Mantenimiento_Act."',".
			"'".$Descripcion_Mante_Act."',".
			"".$Tiempo_Garantia_Act.",".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>