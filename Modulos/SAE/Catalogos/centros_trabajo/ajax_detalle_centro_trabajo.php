<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_CT	= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '';
	
	/***************************************************************************/
	/************************   DATOS DE PERSONA *******************************/
	/***************************************************************************/
	//Si se pide por Id de usuario
	if( (isset($Id_CT)) && ($Id_CT!='') ){
		//Si se pide por ID de USUARIO
		$sql = "SELECT 
				Id_CT, 
				Nombre_CT, 
				Diminutivo_CT, 
				Logo_CT, 
				Telefono_CT, 
				Fax_CT, 
				Direccion_CT, 
				Correo_CT 
			FROM tab_centros_trabajos 
			WHERE Id_CT = ".$Id_CT;	
	//Si se solicita por cedula de usuario
	}
	
	$res = seleccion($sql);

	//DATOS deL Centro de TRabajo
	$Nombre_CT=$res[0]['Nombre_CT'];
	$Diminutivo_CT=$res[0]['Diminutivo_CT'];
	$Logo_CT=$res[0]['Logo_CT'];
	$Telefono_CT=$res[0]['Telefono_CT'];
	$Fax_CT=$res[0]['Fax_CT'];
	$Direccion_CT=$res[0]['Direccion_CT'];
	$Correo_CT=$res[0]['Correo_CT'];
	
	//Comprobar si tiene o no foto
	if($Logo_CT ==''){
		$Logo_CT = 'default.png';
	}

	if($Telefono_CT==''){
		$Telefono_CT="-";
	}
	if($Fax_CT==''){
		$Fax_CT="-";
	}
	if($Direccion_CT==''){
		$Direccion_CT="-";
	}
	if($Correo_CT==''){
		$Correo_CT="-";
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
		<td style="text-align: center;"><img src="img/Centros_Trabajo/<?=$Logo_CT?>" style="width: 120px;" /></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_CT']?></td>
	</tr>

	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Nombre']?>:</td>
		<td><?=$Nombre_CT?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Diminutivo']?>:</td>
		<td><?=$Diminutivo_CT?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Contacto']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Telefono']?>:</td>
		<td><?=$Telefono_CT?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Fax']?>:</td>
		<td><?=$Fax_CT?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Correo']?>:</td>
		<td><?=$Correo_CT?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Ubicacion']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Direccion']?>:</td>
		<td><?=$Direccion_CT?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Mapa']?>:</td>
		<td></td>
	</tr>
	
</table>

<br />
<br />
<br />
