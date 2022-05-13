<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Act		= (isset($_GET['Id_Act'])) ? $_GET['Id_Act'] : '';
	$tipo		= (isset($_GET['tipo'])) ? $_GET['tipo'] : '';
	
	if($tipo == 'marcar'){
		$estado = '1';
	}elseif($tipo=="desmarcar"){
		$estado = '0';
	}
	
	$sql = "UPDATE tab_Activos SET Verificado_Act = ".$estado.", Id_Per_Usu_Act=".$Id_Per_Usu." WHERE Id_Act = ".$Id_Act;
	$res = transaccion($sql);	
		
	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>