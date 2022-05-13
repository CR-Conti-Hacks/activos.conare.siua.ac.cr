<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
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

	
	$sql = "INSERT INTO tab_ordenes_compras (Id_Prove_OC,Id_Parti_OC,Id_Compr_OC,Numero_OC,Fecha_OC,Anno_OC,Activo_OC) VALUES (".
            $proveedor.",".
			$partida.",".
			$compromiso.",".
			"'".$txt_ordene."',".
			"'".$fecha_orden."',".
			"'".$anno."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>