<?php

    /*****************************************************************************************/
	/******************************      PATH         ****************************************/
	/*****************************************************************************************/
	$path='../../../';
	include($path."Include/Bd/bd.php");
    
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$identificacion_verificar	= (isset($_GET['identificacion_verificar'])) ? $_GET['identificacion_verificar'] : '';
    
    $sql ="SELECT Cedula_Per FROM tab_personas WHERE Cedula_Per = '".$identificacion_verificar."'";
    $res = seleccion($sql);
    
    if(isset($res[0]['Cedula_Per']) && ($res[0]['Cedula_Per'])!=''){
        echo 1;
    }else{
        echo 0;
    }
    
    
?>