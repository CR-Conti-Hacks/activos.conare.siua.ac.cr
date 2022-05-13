<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_zona		= (isset($_GET['txt_zona'])) ? $_GET['txt_zona'] : '';
	
	
	
	$sql = "INSERT INTO tab_zonas_tmp (Nombre_Zonas_tmp,Activo_Zonas_tmp) VALUES (".
            "'".$txt_zona."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>