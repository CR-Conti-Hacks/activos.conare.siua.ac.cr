<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$id_usuario = (isset($_GET['id_usuario'])) ? $_GET['id_usuario'] : '';
	$estado = (isset($_GET['estado'])) ? $_GET['estado'] : '';
	
	//Comprobamos el estado 1 = activado 0 = desactivado
	if($estado ==1){
		$sql = "UPDATE tab_usuarios SET Activo_Usu = 0 WHERE Id_Per_Usu = ".$id_usuario;
	}elseif($estado ==0){
		$sql = "UPDATE tab_usuarios SET Activo_Usu = 1 WHERE Id_Per_Usu = ".$id_usuario;
	}
					
	$res = transaccion($sql);	
		
	//Si Inserto correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 0;
	}

?>