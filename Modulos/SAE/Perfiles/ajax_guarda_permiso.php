<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Rol 		    = (isset($_GET['Id_Rol'])) ? $_GET['Id_Rol'] : '';
	$Id_Der 			= (isset($_GET['Id_Der'])) ? $_GET['Id_Der'] : '';
	$marcado		 	= (isset($_GET['marcado'])) ? $_GET['marcado'] : '';
	
	/*PASO #1: Comprobamos que hay que hacer
		marcado=1 marcar todos
		marcado=0 desmarcar todos*/
	
	//Si desmarcado
	if($marcado == 0){
		/*PASO #1: Eliminamos los derechos actuales del perfil*/
		$sql ="DELETE FROM tab_permisos WHERE Id_Rol_Perm = ".$Id_Rol." AND Id_Der_Perm = ".$Id_Der;
		$res = transaccion($sql);
		if ($res[0]== 1){
			echo 1;
		}else{
			echo 'e1';
		}
		
	//Si es marcado
	}elseif ($marcado ==1){
		$sql = "INSERT INTO tab_permisos (Id_Der_Perm, Id_rol_Perm) VALUES (".$Id_Der.",".$Id_Rol.")";
		$res = transaccion($sql);
		if($res[0]==1){
			echo 2;
		}else{
			echo 'e2';
		}
	}
	
?>