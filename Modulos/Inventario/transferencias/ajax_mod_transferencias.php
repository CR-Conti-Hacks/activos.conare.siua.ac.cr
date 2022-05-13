<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Trans 			= (isset($_GET['Id_Trans'])) ? $_GET['Id_Trans'] : '';
	$txt_transferencia	= (isset($_GET['txt_transferencia'])) ? $_GET['txt_transferencia'] : '';
	
	
	$sql = "UPDATE tab_transferencias SET Numero_Trans = '".$txt_transferencia."' WHERE Id_Trans=".$Id_Trans;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>