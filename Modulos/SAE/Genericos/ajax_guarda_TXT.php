<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
    $valor = $_GET['valor'];
    $tabla = $_GET['tabla'];
    $nombre_campo = $_GET['nombre_campo'];

	if($valor=='null'){
		$sql = 'UPDATE '.$tabla.' SET '.$nombre_campo.'=NULL'.' WHERE Id_Conf = 1';	
	}else{
		$sql = 'UPDATE '.$tabla.' SET '.$nombre_campo.'="'.$valor.'" WHERE Id_Conf = 1';
	}
    
	//echo $sql;
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>