<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_SZ	= (isset($_GET['Id_SZ'])) ? $_GET['Id_SZ'] : '';
	
	/***************************************************************************/
	/************************   DATOS DE PERSONA *******************************/
	/***************************************************************************/

	if( (isset($Id_SZ)) && ($Id_SZ!='') ){
		$sql = "SELECT 
				Id_SZ, 
				Nombre_SZ, 
				Diminutivo_SZ,  
				Telefono_SZ, 
				Fax_SZ, 
				Correo_SZ 
			FROM tab_sub_zona 
			WHERE Id_SZ = ".$Id_SZ;	
	}
	
	$res = seleccion($sql);


	$Nombre_SZ=$res[0]['Nombre_SZ'];
	$Diminutivo_SZ=$res[0]['Diminutivo_SZ'];
	$Telefono_SZ=$res[0]['Telefono_SZ'];
	$Fax_SZ=$res[0]['Fax_SZ'];
	$Correo_SZ=$res[0]['Correo_SZ'];
	

	if($Telefono_SZ==''){
		$Telefono_SZ="-";
	}
	if($Fax_SZ==''){
		$Fax_SZ="-";
	}
	if($Correo_SZ==''){
		$Correo_SZ="-";
	}

?>
<br />
<br />
<table class="centrado width700">
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Detalle_Informacion']?></td>
	</tr>

	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Nombre']?>:</td>
		<td><?=$Nombre_SZ?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Diminutivo']?>:</td>
		<td><?=$Diminutivo_SZ?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Contacto']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Telefono']?>:</td>
		<td><?=$Telefono_SZ?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Fax']?>:</td>
		<td><?=$Fax_SZ?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Correo']?>:</td>
		<td><?=$Correo_SZ?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Ubicacion']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Mapa']?>:</td>
		<td></td>
	</tr>
</table>

<br />
<br />
<br />
