<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

    //Recibir los parametros
	$activado 	        = (isset($_GET['activado'])) ? $_GET['activado'] : '';
	$Id_Usuario 		= (isset($_GET['Id_Usuario'])) ? $_GET['Id_Usuario'] : '';
    $Nombre      		= (isset($_GET['Nombre'])) ? $_GET['Nombre'] : '';
    $Cedula      		= (isset($_GET['Cedula'])) ? $_GET['Cedula'] : '';
        
?>
	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<?php
    //verificar si hay que activarlo o desactivarlo
    if($activado==0){
        $texto1 = $texto['Esta_Seguro_act'] ;
        $texto2 = $texto['Activar'];
    ?>
        <h3><?= $texto['Act_Usuario'] ?></h3>
    <?php
    }elseif($activado==1){
        $texto1 = $texto['Esta_Seguro_des'];
        $texto2 = $texto['Desactivar'];
    ?>
        <h3><?= $texto['Des_Usuario'] ?></h3>
    <?php
    }
    ?>
    
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto1.$texto['Usuario'] ?> :</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$Nombre?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="Act_Des_Usuario('<?=$activado?>','<?=$Id_Usuario?>')" ><?=$texto2?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    