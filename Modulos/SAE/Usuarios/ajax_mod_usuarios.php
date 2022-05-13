<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
    //Recibir los parametros
	$id_usuario 		    = (isset($_GET['id_usuario'])) ? $_GET['id_usuario'] : '';
	$id_perfil 				= (isset($_GET['id_perfil'])) ? $_GET['id_perfil'] : '';
	$contrasena 			= (isset($_GET['contrasena'])) ? $_GET['contrasena'] : '';
	$confirmar_contrasena	= (isset($_GET['confirmar_contrasena'])) ? $_GET['confirmar_contrasena'] : '';
	$sl_pregunta		    = (isset($_GET['sl_pregunta'])) ? $_GET['sl_pregunta'] : '';
	$respuesta		    	= (isset($_GET['respuesta'])) ? $_GET['respuesta'] : '';
	
	$sql = "SELECT Id_Rol_Usu,Id_Preg_Usu, Respuesta_Preg_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$id_usuario;
	$res_usuario = seleccion($sql);
	
	//Si el perfil cambio
	if($res_usuario[0]['Id_Rol_Usu']!=$id_perfil){
		$sql ="UPDATE tab_usuarios SET Id_Rol_Usu = ".$id_perfil." WHERE Id_Per_Usu = ".$id_usuario;
		$res = transaccion($sql);
		if($res[0]!=1){
			echo 'e1';
			exit;
		}
	}
	//Si cambio la contraseña
	if(($contrasena!='')&&($contrasena == $confirmar_contrasena)){
		$sql ="UPDATE tab_usuarios SET Password_Usu = '".$contrasena."'"." WHERE Id_Per_Usu = ".$id_usuario;
		$res = transaccion($sql);
		if($res[0]!=1){
			echo 'e2';
			exit;
		}
	}
	
	//Si cambio la pregunta
	if($res_usuario[0]['Id_Preg_Usu']!=$sl_pregunta){
		$sql ="UPDATE tab_usuarios SET Id_Preg_Usu = ".$sl_pregunta." WHERE Id_Per_Usu = ".$id_usuario;
		$res = transaccion($sql);
		if($res[0]!=1){
			echo 'e3';
			exit;
		}
	}
	
	//Si cambio la respuesta
	if(($respuesta!='')&&($respuesta != $res_usuario[0]['Respuesta_Preg_Usu'])){
		$sql ="UPDATE tab_usuarios SET Respuesta_Preg_Usu = '".$respuesta."'"." WHERE Id_Per_Usu = ".$id_usuario;
		$res = transaccion($sql);
		if($res[0]!=1){
			echo 'e4';
			exit;
		}
	}
	
	//si todo sale bien
	echo 1;
?>