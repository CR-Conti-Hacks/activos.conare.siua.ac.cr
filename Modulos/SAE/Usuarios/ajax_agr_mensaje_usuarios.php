<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$Id_Per_Usu_Men 	= (isset($_GET['Id_Per_Usu_Men'])) ? $_GET['Id_Per_Usu_Men'] : '';
	$Mensaje_Men 		= (isset($_GET['Mensaje_Men'])) ? $_GET['Mensaje_Men'] : '';
	$Diseno_Men		    = (isset($_GET['Diseno_Men'])) ? $_GET['Diseno_Men'] : '';
	$Efecto_Men		    = (isset($_GET['Efecto_Men'])) ? $_GET['Efecto_Men'] : '';
	$Tipo_Men		    = (isset($_GET['Tipo_Men'])) ? $_GET['Tipo_Men'] : '';
	$Tiempo_Men		    = (isset($_GET['Tiempo_Men'])) ? $_GET['Tiempo_Men'] : '';
	
	
	
	$sql = "INSERT INTO tab_mensajes_usuarios (Id_Per_Usu_Men,Mensaje_Men, Diseno_Men, Efecto_Men,Tipo_Men,Tiempo_Men,Estado_Men) VALUES (".
            "".$Id_Per_Usu_Men.",".
            "'".$Mensaje_Men."',".
            "'".$Diseno_Men."',".
			"'".$Efecto_Men."',".
			"'".$Tipo_Men."',".
			"".$Tiempo_Men.",'0')";

    $res = transaccion($sql);
    if ($res[0]== 1){
        echo  '1';
    }else{
        echo 'e1';
    }
    

?>