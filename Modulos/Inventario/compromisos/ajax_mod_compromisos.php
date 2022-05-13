<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Compr 			= (isset($_GET['Id_Compr'])) ? $_GET['Id_Compr'] : '';
	$txt_compromiso		= (isset($_GET['txt_compromiso'])) ? $_GET['txt_compromiso'] : '';
	
	
	$sql = "UPDATE tab_compromisos SET Numero_Compr = '".$txt_compromiso."' WHERE Id_Compr=".$Id_Compr;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>