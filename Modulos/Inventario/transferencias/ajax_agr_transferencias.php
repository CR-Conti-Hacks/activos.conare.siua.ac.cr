<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_transferencia		= (isset($_GET['txt_transferencia'])) ? $_GET['txt_transferencia'] : '';
	
	
	
	$sql = "INSERT INTO tab_transferencias (Numero_Trans,Activo_Trans) VALUES (".
            "'".$txt_transferencia."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>