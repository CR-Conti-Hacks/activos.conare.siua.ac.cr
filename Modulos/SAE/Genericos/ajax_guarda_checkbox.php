<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
    
    //Recibir los parametros
    $marcado = $_GET['marcado'];
    $tabla = $_GET['tabla'];
    $nombre_campo = $_GET['nombre_campo'];

    $sql = 'UPDATE '.$tabla.' SET '.$nombre_campo.'='.$marcado;
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>