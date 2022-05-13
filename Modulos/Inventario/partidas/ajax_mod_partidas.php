<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Parti 			= (isset($_GET['Id_Parti'])) ? $_GET['Id_Parti'] : '';
	$txt_partida		= (isset($_GET['txt_partida'])) ? $_GET['txt_partida'] : '';
	
	
	$sql = "UPDATE tab_partidas SET Numero_Parti = '".$txt_partida."' WHERE Id_Parti=".$Id_Parti;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>