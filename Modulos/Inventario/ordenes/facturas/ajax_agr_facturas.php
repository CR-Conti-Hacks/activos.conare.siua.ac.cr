<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_OC				= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '';
	$txt_factura		= (isset($_GET['txt_factura'])) ? $_GET['txt_factura'] : '';
	$transferencia		= (isset($_GET['transferencia'])) ? $_GET['transferencia'] : '';
	$fecha_factura		= (isset($_GET['fecha_factura'])) ? $_GET['fecha_factura'] : '';
	
	if($transferencia==0){
		$transferencia ="NULL";
	}
	
	$sql = "INSERT INTO tab_facturas (Id_Trans_Factu,Id_OC_Factu,Numero_Factu,Fecha_Factu,Activo_Factu) VALUES (".
            $transferencia.",".
			$Id_OC.",".
			"'".$txt_factura."',".
			"'".$fecha_factura."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>