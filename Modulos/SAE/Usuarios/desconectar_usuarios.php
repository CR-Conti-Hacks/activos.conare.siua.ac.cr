<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/****************************PARAMETROS  ***********************************/
	$Id_Usuario = (isset($_GET['Id_Usuario'])) ? $_GET['Id_Usuario'] : '';
	

	
	/***************************************************************************/
	
	/****************************     SQL    ***********************************/
    $sql ="SELECT 
				Id_Per_Usu, 
				Cedula_Per,
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per
    		FROM tab_usuarios
			INNER JOIN tab_personas ON(Id_Per = Id_Per_Usu)
			WHERE Id_Per_Usu = ".$Id_Usuario;
	$res = seleccion($sql);
	

	/***************************************************************************/
	
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Usuario" name="Id_Usuario" value="<?= $Id_Usuario?>" />

	

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['TITULO_desconectar_usuario'] ?></h3>
	<br />
    
    
	<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_desconectar_usuario'] ?> :</span>
	<br />
	<br />
    <table class="centrado font09">
        <tr>
            <td>
                <?=$texto['Id_Usuario']?>:
            </td>
            <td>
                <span class="font12 rojo">" <?=$res[0]['Id_Per_Usu']?>"</span>
            </td>
        </tr>
        <tr>
            <td>
                <?=$texto['Cedula']?>:
            </td>
            <td>
                <span class="font12 rojo">" <?=$res[0]['Cedula_Per']?>"</span>
            </td>
        </tr>
        <tr>
            <td>
                <?=$texto['Nombre']?>:
            </td>
            <td>
                <span class="font12 rojo">" <?=$res[0]['Nombre_Per'].' '.$res[0]['Apellido1_Per'].' '.$res[0]['Apellido2_Per']?>"</span>
            </td>
        </tr>
    </table>
	<br >
	<br >
	<button class="boton" onclick="desconectarUsuario(<?=$Id_Usuario?>)" ><?=$texto['Desconectar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>


