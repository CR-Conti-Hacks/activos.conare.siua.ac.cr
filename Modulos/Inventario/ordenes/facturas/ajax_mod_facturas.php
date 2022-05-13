<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Factu 			= (isset($_GET['Id_Factu'])) ? $_GET['Id_Factu'] : '';
	$orden_compra		= (isset($_GET['orden_compra'])) ? $_GET['orden_compra'] : '';
	$txt_factura		= (isset($_GET['txt_factura'])) ? $_GET['txt_factura'] : '';
	$transferencia		= (isset($_GET['transferencia'])) ? $_GET['transferencia'] : '';
	$fecha_factura		= (isset($_GET['fecha_factura'])) ? $_GET['fecha_factura'] : '';
	
	if($orden_compra==0){
		$orden_compra ="NULL";
	}
	if($transferencia==0){
		$transferencia ="NULL";
	}
	
	$sql = "UPDATE tab_facturas SET Id_Trans_Factu = ".$transferencia.", Id_OC_Factu=".$orden_compra.", Numero_Factu='".$txt_factura."',
				Fecha_Factu='".$fecha_factura."' WHERE Id_Factu=".$Id_Factu;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>