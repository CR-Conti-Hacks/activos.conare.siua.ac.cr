<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Tip_Tel 		= (isset($_GET['Id_Tip_Tel'])) ? $_GET['Id_Tip_Tel'] : '';
	$txt_tipo_tele 		= (isset($_GET['txt_tipo_tele'])) ? $_GET['txt_tipo_tele'] : '';
	
	
	$sql = "UPDATE tab_tipos_telefonos SET Nombre_Tip_Tel = '".$txt_tipo_tele."' WHERE Id_Tip_Tel=".$Id_Tip_Tel;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>