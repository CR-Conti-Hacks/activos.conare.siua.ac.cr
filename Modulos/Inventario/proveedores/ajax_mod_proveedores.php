<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Prove 		= (isset($_GET['Id_Prove'])) ? $_GET['Id_Prove'] : '';
	$txt_proveedore			= (isset($_GET['txt_proveedore'])) ? $_GET['txt_proveedore'] : '';
	
	
	$sql = "UPDATE tab_proveedores SET Nombre_Prove = '".$txt_proveedore."' WHERE Id_Prove=".$Id_Prove;
		
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>