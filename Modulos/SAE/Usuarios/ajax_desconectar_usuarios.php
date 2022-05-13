<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$id_usuario = (isset($_GET['id_usuario'])) ? $_GET['id_usuario'] : '';
	
	
	
	//destruimos los datos de conexión del usuario
	$sql = "UPDATE tab_usuarios SET Estado_Conexion_Usu = 0, Fecha_Hora_Conexion_Usu=NULL, Key_Usu = NULL, Nombre_Session_Usu = NULL, URL_Usu = NULL 
			   WHERE Id_Per_Usu = ".$id_usuario;
					
	$res = transaccion($sql);	
		
	//SI Inserto correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 0;
	}

?>