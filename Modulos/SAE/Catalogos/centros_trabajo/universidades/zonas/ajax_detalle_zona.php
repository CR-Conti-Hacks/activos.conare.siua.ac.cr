<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_Zon	= (isset($_GET['Id_Zon'])) ? $_GET['Id_Zon'] : '';
	
	/***************************************************************************/
	/************************   DATOS DE PERSONA *******************************/
	/***************************************************************************/
	//Si se pide por Id de usuario
	if( (isset($Id_Zon)) && ($Id_Zon!='') ){
		//Si se pide por ID de USUARIO
		$sql = "SELECT 
				Id_Zon, 
				Nombre_Zon, 
				Diminutivo_Zon, 
				Logo_Zon, 
				Telefono_Zon, 
				Fax_Zon, 
				Direccion_Zon, 
				Correo_Zon 
			FROM tab_zonas 
			WHERE Id_Zon = ".$Id_Zon;	
	//Si se solicita por cedula de usuario
	}
	
	$res = seleccion($sql);

	//DATOS deL Centro de TRabajo
	$Nombre_Zon=$res[0]['Nombre_Zon'];
	$Diminutivo_Zon=$res[0]['Diminutivo_Zon'];
	$Logo_Zon=$res[0]['Logo_Zon'];
	$Telefono_Zon=$res[0]['Telefono_Zon'];
	$Fax_Zon=$res[0]['Fax_Zon'];
	$Direccion_Zon=$res[0]['Direccion_Zon'];
	$Correo_Zon=$res[0]['Correo_Zon'];
	
	//Comprobar si tiene o no foto
	if($Logo_Zon ==''){
		$Logo_Zon = 'default.png';
	}

	if($Telefono_Zon==''){
		$Telefono_Zon="-";
	}
	if($Fax_Zon==''){
		$Fax_Zon="-";
	}
	if($Direccion_Zon==''){
		$Direccion_Zon="-";
	}
	if($Correo_Zon==''){
		$Correo_Zon="-";
	}

?>
<br />
<br />
<table class="centrado width800">
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Detalle_Informacion']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Foto']?>:</td>
		<td style="text-align: center;"><img src="img/Zonas/<?=$Logo_Zon?>" style="width: 120px;" /></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_CT']?></td>
	</tr>

	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Nombre']?>:</td>
		<td><?=$Nombre_Zon?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Diminutivo']?>:</td>
		<td><?=$Diminutivo_Zon?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Contacto']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Telefono']?>:</td>
		<td><?=$Telefono_Zon?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Fax']?>:</td>
		<td><?=$Fax_Zon?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Correo']?>:</td>
		<td><?=$Correo_Zon?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Ubicacion']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Direccion']?>:</td>
		<td><?=$Direccion_Zon?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Mapa']?>:</td>
		<td></td>
	</tr>
	
</table>

<br />
<br />
<br />
