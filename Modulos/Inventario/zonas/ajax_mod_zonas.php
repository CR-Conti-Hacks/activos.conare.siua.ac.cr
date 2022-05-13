<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Zonas_tmp 		= (isset($_GET['Id_Zonas_tmp'])) ? $_GET['Id_Zonas_tmp'] : '';
	$txt_zona			= (isset($_GET['txt_zona'])) ? $_GET['txt_zona'] : '';
	
	
	$sql = "UPDATE tab_zonas_tmp SET Nombre_Zonas_tmp = '".$txt_zona."' WHERE Id_Zonas_tmp=".$Id_Zonas_tmp;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>