<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_compromiso		= (isset($_GET['txt_compromiso'])) ? $_GET['txt_compromiso'] : '';
	
	
	
	$sql = "INSERT INTO tab_compromisos (Numero_Compr,Activo_Compr) VALUES (".
            "'".$txt_compromiso."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>