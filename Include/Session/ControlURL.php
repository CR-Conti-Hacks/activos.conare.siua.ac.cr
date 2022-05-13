<?php

//Agregamos la libreria de encriptacio
include ("../Autenticacion/encriptacion.php");

//agregamos libreria de conexion a abase de datos
include('../Bd/bd.php');

    //obtenemos los datos
    $direccion_web = $_GET["direccion_web"];
    $cedula_encriptada = $_GET["cedula_encriptada"];
    

        //Obtenemos la llave de encriptacion
        $sql = "SELECT Llave_Encriptacion_Conf FROM tab_configuracion WHERE Id_Conf = 1";
        $res = seleccion($sql);
        
        //Guardamos la llave
        $llave_encrip = $res[0]['Llave_Encriptacion_Conf'];
        
        //desencripta la llave
        $cedula_desencriptada = desencriptar($cedula_encriptada ,$llave_encrip);
        
        //obtenemos el Id de la persona
        $sql =  "SELECT Id_Per FROM tab_personas WHERE Cedula_Per = '".$cedula_desencriptada."'";
        $res_id = seleccion($sql);
        
        

        $sql="SELECT Nombre_Session_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$res_id[0]['Id_Per'];
        $res_session=seleccion($sql);
	
        session_name($res_session[0]['Nombre_Session_Usu']);
        session_start();
        
        //Grabar la URL
        //ip+ruta+Principal.php?cedula=
        $_SESSION['dir_url']=$direccion_web.$cedula_encriptada;

        echo 1;


?>

