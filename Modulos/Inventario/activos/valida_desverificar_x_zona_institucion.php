<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Zona     		        = (isset($_GET['Id_Zona'])) 			        ? $_GET['Id_Zona'] 			       : '';
    $Id_Ins                     = (isset($_GET['Id_Ins']))                      ? $_GET['Id_Ins']                  : '';


    /***************************************************************************/
	/*********** DETERMINAR A QUE UNIVERSIDA PERTENECE EL USUARIO   ************/
	/***************************************************************************/
	$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu;
	$resMiembroUni = seleccion($sql);



    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Id_Zonas_tmp = ".$Id_Zona;
    $resZona = seleccion($sql);
    if($Id_Ins==0){
    	$textoIns = "";
        for ($i=0; $i < count($resMiembroUni); $i++) { 
        	$sql ="SELECT Nombre_Uni, Diminutivo_Uni FROM tab_universidades WHERE Id_uni = ".$resMiembroUni[$i]['Id_Uni_PXU'];
        	$resIns = seleccion($sql);
        	$textoIns .= '"'.$resIns[0]['Nombre_Uni']." (".$resIns[0]['Diminutivo_Uni'].")".'"'."<br />";	
        	$textoInsTitulo = "Para las instituciones:";
        }
    }else{
       	$sql ="SELECT Nombre_Uni, Diminutivo_Uni FROM tab_universidades WHERE Id_uni = ".$Id_Ins;
        $resIns = seleccion($sql);
        $textoIns = $resIns[0]['Nombre_Uni']." (".$resIns[0]['Diminutivo_Uni'].")";
        $textoInsTitulo = "Para la institución:";
    }
        
?>
    <h3 style="background-color: #F70;">¿Esta seguro que desea desverificar los activos?</h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10">Para la zona:</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$resZona[0]['Nombre_Zonas_tmp']?>"</span>
    <br />
    <br />
    <span class="font10"><?=$textoInsTitulo?></span>
    <br />
    <br />
    <span class="font12 rojo"><?=$textoIns?></span>
	<br/>
	<br/>
	<button class="boton" onclick="desverificar_x_zona_institucion()" >Desverificar</button>
	<button class="boton" onclick="CerrarVentana()" >Cancelar</button>
</div>
    