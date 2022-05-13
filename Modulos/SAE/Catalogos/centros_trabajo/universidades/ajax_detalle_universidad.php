<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_Uni	= (isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : '';
	
	/***************************************************************************/
	/************************   DATOS DE PERSONA *******************************/
	/***************************************************************************/
	//Si se pide por Id de usuario
	if( (isset($Id_Uni)) && ($Id_Uni!='') ){
		//Si se pide por ID de USUARIO
		$sql = "SELECT 
				Id_Uni, 
				Nombre_Uni, 
				Diminutivo_Uni, 
				Logo_Uni, 
				Telefono_Uni, 
				Fax_Uni, 
				Direccion_Uni, 
				Correo_Uni 
			FROM tab_universidades 
			WHERE Id_Uni = ".$Id_Uni;	
	//Si se solicita por cedula de usuario
	}
	
	$res = seleccion($sql);

	//DATOS deL Centro de TRabajo
	$Nombre_Uni=$res[0]['Nombre_Uni'];
	$Diminutivo_Uni=$res[0]['Diminutivo_Uni'];
	$Logo_Uni=$res[0]['Logo_Uni'];
	$Telefono_Uni=$res[0]['Telefono_Uni'];
	$Fax_Uni=$res[0]['Fax_Uni'];
	$Direccion_Uni=$res[0]['Direccion_Uni'];
	$Correo_Uni=$res[0]['Correo_Uni'];
	
	//Comprobar si tiene o no foto
	if($Logo_Uni ==''){
		$Logo_Uni = 'default.png';
	}

	if($Telefono_Uni==''){
		$Telefono_Uni="-";
	}
	if($Fax_Uni==''){
		$Fax_Uni="-";
	}
	if($Direccion_Uni==''){
		$Direccion_Uni="-";
	}
	if($Correo_Uni==''){
		$Correo_Uni="-";
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
		<td style="text-align: center;"><img src="img/Universidades/<?=$Logo_Uni?>" style="width: 120px;" /></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_CT']?></td>
	</tr>

	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Nombre']?>:</td>
		<td><?=$Nombre_Uni?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Diminutivo']?>:</td>
		<td><?=$Diminutivo_Uni?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Contacto']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Telefono']?>:</td>
		<td><?=$Telefono_Uni?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Fax']?>:</td>
		<td><?=$Fax_Uni?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Correo']?>:</td>
		<td><?=$Correo_Uni?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Ubicacion']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Direccion']?>:</td>
		<td><?=$Direccion_Uni?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Mapa']?>:</td>
		<td></td>
	</tr>
	
</table>

<br />
<br />
<br />
