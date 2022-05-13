<?php
    include("../../../../Include/Bd/bd.php");


    $sql = "SELECT Direccion_Web_Conf, Direccion_Carpeta_Conf FROM tab_configuracion";
    $res = seleccion($sql);
    

    header('Location: '.$res[0]['Direccion_Web_Conf'].$res[0]['Direccion_Carpeta_Conf'].'index.php');

?>