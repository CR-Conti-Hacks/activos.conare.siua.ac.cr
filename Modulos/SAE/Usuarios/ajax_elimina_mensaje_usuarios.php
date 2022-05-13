<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Men 		= (isset($_GET['Id_Men'])) ? $_GET['Id_Men'] : '';
	
	
	
	$sql = "DELETE FROM tab_mensajes_usuarios WHERE Id_Men = ".$Id_Men;
	$res = transaccion($sql);	
		
	//SI Inserto correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 0;
	}

?>