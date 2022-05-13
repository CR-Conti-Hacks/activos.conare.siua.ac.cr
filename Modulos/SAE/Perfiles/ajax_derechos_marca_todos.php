<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Rol 		    = (isset($_GET['Id_Rol'])) ? $_GET['Id_Rol'] : '';
	$sistema 			= (isset($_GET['sistema'])) ? $_GET['sistema'] : '';
	$marcado		 	= (isset($_GET['marcado'])) ? $_GET['marcado'] : '';
	
	/*PASO #1: Comprobamos que hay que hacer
		marcado=1 marcar todos
		marcado=0 desmarcar todos*/
	
	//Si desmarcado
	if($marcado == 0){
		/*PASO #1: Eliminamos los derechos actuales del perfil*/
		$sql ="DELETE FROM tab_permisos WHERE Id_Rol_Perm = ".$Id_Rol;
		$res = transaccion($sql);
		if ($res[0]== 1){
			echo 1;
		}else{
			echo 'e1';
		}
		
	//Si es marcado
	}elseif ($marcado ==1){
		/*PASO #1: Eliminamos los derechos actuales del perfil*/
		$sql ="DELETE FROM tab_permisos WHERE Id_Rol_Perm = ".$Id_Rol;
		$res = transaccion($sql);
		
		//Si todo salio bien
		if ($res[0]== 1){
			$sql ="SELECT Id_Der FROM tab_derechos WHERE Id_Cont_Mod_Der = ".$sistema;
			$res_derechos = seleccion($sql);
			
			for($i=0; $i < count($res_derechos); $i++){
				$sql = "INSERT INTO tab_permisos (Id_Der_Perm, Id_rol_Perm) VALUES (".$res_derechos[$i]['Id_Der'].",".$Id_Rol.")";
				$res = transaccion($sql);
			}
			if ($res[0]== 1){
				echo 2;
			}else{
				echo 'e3';
			}	
			
		}else{
			echo 'e2';
		}
	}
	


?>