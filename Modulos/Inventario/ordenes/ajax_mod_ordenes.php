<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_OC 			= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '';
	$compromiso		= (isset($_GET['compromiso'])) ? $_GET['compromiso'] : '';
	$partida		= (isset($_GET['partida'])) ? $_GET['partida'] : '';
	$proveedor		= (isset($_GET['proveedor'])) ? $_GET['proveedor'] : '';
	$txt_ordene		= (isset($_GET['txt_ordene'])) ? $_GET['txt_ordene'] : '';
	$anno			= (isset($_GET['anno'])) ? $_GET['anno'] : '';
	$fecha_orden	= (isset($_GET['fecha_orden'])) ? $_GET['fecha_orden'] : '';
	
	if($compromiso==0){
		$compromiso ="NULL";
	}
	if($partida==0){
		$partida ="NULL";
	}
	if($proveedor==0){
		$proveedor="NULL";
	}
	
	
	$sql = "UPDATE tab_ordenes_compras SET Id_Prove_OC = ".$proveedor.", Id_Parti_OC=".$partida.", Id_Compr_OC=".$compromiso.", Numero_OC='".$txt_ordene."',
				Fecha_OC='".$fecha_orden."', Anno_OC= '".$anno."' WHERE Id_OC=".$Id_OC;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>