<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$txt_proveedore		= (isset($_GET['txt_proveedore'])) ? $_GET['txt_proveedore'] : '';
	
	
	
	$sql = "INSERT INTO tab_proveedores (Nombre_Prove,Activo_Prove) VALUES (".
            "'".$txt_proveedore."',".
            "'1')";
	
	
    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>