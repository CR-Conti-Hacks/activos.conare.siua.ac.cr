<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_partida		= (isset($_GET['txt_partida'])) ? $_GET['txt_partida'] : '';
	
	
	
	$sql = "INSERT INTO tab_partidas (Numero_Parti,Activo_Parti) VALUES (".
            "'".$txt_partida."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>