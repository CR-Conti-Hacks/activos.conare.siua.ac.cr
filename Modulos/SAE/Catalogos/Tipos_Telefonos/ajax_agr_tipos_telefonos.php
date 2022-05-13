<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_tipo_tele 		= (isset($_GET['txt_tipo_tele'])) ? $_GET['txt_tipo_tele'] : '';
	
	
	
	$sql = "INSERT INTO tab_tipos_telefonos (Nombre_Tip_Tel,Activo_Tip_Tel) VALUES (".
            "'".$txt_tipo_tele."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>