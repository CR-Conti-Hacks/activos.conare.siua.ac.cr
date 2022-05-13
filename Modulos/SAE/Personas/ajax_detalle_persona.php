<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_Usuario	= (isset($_GET['Id_Usuario'])) ? $_GET['Id_Usuario'] : '';
	$cedula     = (isset($_GET['cedula'])) ? $_GET['cedula'] : '';


	//Si se envio el Id de usuario
	if($Id_Usuario!=''){
		$sql = "SELECT Cedula_Per FROM tab_personas WHERE Id_Per = ".$Id_Usuario;
		$res = seleccion($sql);
		$cedula = $res[0]['Cedula_Per'];
	//Se envio la cedula
	}elseif($cedula !=''){
		$sql = "SELECT Id_Per FROM tab_personas WHERE Cedula_Per = ".$cedula;
		$res = seleccion($sql);
		$Id_Usuario = $res[0]['Id_Per'];
	}
	
	
	/***************************************************************************/
	/************************   DATOS DE PERSONA *******************************/
	/***************************************************************************/
	//Si se pide por Id de usuario
	if( (isset($Id_Usuario)) && ($Id_Usuario!='') ){
		//Si se pide por ID de USUARIO
		$sql = "SELECT 
				Cedula_Per, 
				Tipo_Identificacion_Per,
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per,
				Genero_Per,
				Direccion_Per,
				Foto_Per,
				Fecha_Nacimiento_Per
			FROM tab_personas
			WHERE Id_Per = ".$Id_Usuario;	
	//Si se solicita por cedula de usuario
	}elseif((isset($cedula)) && ($cedula!='') ){
		//Si se pide por cedula
		$sql = "SELECT 
				Cedula_Per, 
				Tipo_Identificacion_Per,
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per,
				Genero_Per,
				Direccion_Per,
				Foto_Per,
				Fecha_Nacimiento_Per
			FROM tab_personas
			WHERE Cedula_Per = '".$cedula."'";
	}
	$res = seleccion($sql);

	//DATOS de la persona
	$Cedula_Per = $res[0]['Cedula_Per'];
	$Tipo_Identificacion_Per = $res[0]['Tipo_Identificacion_Per'];
	$Tipo_Genero = $res[0]['Genero_Per'];
	
	//tipo de identificacion
	if($Tipo_Identificacion_Per==1){
		$TIP = $texto['Cedula'].":";
	}elseif($Tipo_Identificacion_Per==2){
		$TIP = $texto['Pasaporte'].":";
	}elseif($Tipo_Identificacion_Per==3){
		$TIP = $texto['Residencia'];
	}
	
	//Tipo de genero
	if($Tipo_Genero=='1'){
		$Genero = $texto['Masculino'];
	}elseif($Tipo_Genero == '2'){
		$Genero = $texto['Femenino'];
	}
	//datos generales
	$Nombre_Per = $res[0]['Nombre_Per'];
	$Apellido1_Per = $res[0]['Apellido1_Per'];
	$Apellido2_Per = $res[0]['Apellido2_Per'];
	$Direccion = $res[0]['Direccion_Per'];
	$Foto_Per = $res[0]['Foto_Per'];
	$Fecha_Nacimiento_Per = $res[0]['Fecha_Nacimiento_Per'];
	
	//Comprobar si tiene o no foto
	if($Foto_Per ==''){
		$Foto_Per = $dominio.$ruta.'img/Usuarios/default.png';
	}else{
		$Foto_Per = $dominio.$ruta.'img/Usuarios/'.$Foto_Per;
	}

	
	
	
	/***************************************************************************/
	/************************   DATOS DE UBICACION *****************************/
	/***************************************************************************/
	$sql = "SELECT Nivel_Ubicacion_Conf FROM tab_configuracion";
	$res_ubi = seleccion($sql);
	$nivel_ubi = $res_ubi[0]['Nivel_Ubicacion_Conf'];
	
	//Si el nivel de ubicacion es 1 = paises
	if($nivel_ubi==1){
		if( (isset($Id_Usuario)) && ($Id_Usuario!='') ){
			//Si se pide por ID de USUARIO
			$sql = "SELECT 
					Id_Pai_Per,
					Nombre_Pai
				FROM tab_personas
				INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
				WHERE Id_Per = ".$Id_Usuario;
		}elseif((isset($cedula)) && ($cedula!='') ){
			//Si se pide por cedula
			$sql = "SELECT 
					Id_Pai_Per,
					Nombre_Pai
				FROM tab_personas
				INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
				WHERE Cedula_Per = '".$Cedula_Per."'";
		}
		$res_pai = seleccion($sql);
		$Id_Pai_Per = $res_pai[0]['Id_Pai_Per'];
		$Nombre_Pai = $res_pai[0]['Nombre_Pai'];
		$Id_Pro_Per = '';
		$Nombre_Pro = '';
		$Id_Can_Per = '';
		$Nombre_Can = '';
		$Id_Dist_Per = '';
		$Nombre_Dist = '';
	
	//Provincias	
	}elseif($nivel_ubi==2){
		if( (isset($Id_Usuario)) && ($Id_Usuario!='') ){
			//Si se pide por ID de USUARIO
			$sql = "SELECT 
						Id_Pai_Per,
						Nombre_Pai,
						Id_Pro_Per,
						Nombre_Pro
					FROM tab_personas
					INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
					INNER JOIN tab_provincias ON (Id_Pro = Id_Pro_Per)
					WHERE Id_Per =".$Id_Usuario;
		}elseif((isset($cedula)) && ($cedula!='') ){
			//Si se pide por cedula
			$sql = "SELECT 
					Id_Pai_Per,
						Nombre_Pai,
						Id_Pro_Per,
						Nombre_Pro
					FROM tab_personas
					INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
					INNER JOIN tab_provincias ON (Id_Pro = Id_Pro_Per)
				WHERE Cedula_Per = '".$Cedula_Per."'";
		}
		$res_pai = seleccion($sql);
		$Id_Pai_Per = $res_pai[0]['Id_Pai_Per'];
		$Nombre_Pai = $res_pai[0]['Nombre_Pai'];
		$Id_Pro_Per = $res_pai[0]['Id_Pro_Per'];
		$Nombre_Pro = $res_pai[0]['Nombre_Pro'];
		$Id_Can_Per = '';
		$Nombre_Can = '';
		$Id_Dist_Per = '';
		$Nombre_Dist = '';
		
	//Cantones	
	}elseif($nivel_ubi==3){
		if( (isset($Id_Usuario)) && ($Id_Usuario!='') ){
			//Si se pide por ID de USUARIO
			$sql = "SELECT 
						Id_Pai_Per,
						Nombre_Pai,
						Id_Pro_Per,
						Nombre_Pro,
						Id_Can_Per,
						Nombre_Can
					FROM tab_personas
					INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
					INNER JOIN tab_provincias ON (Id_Pro = Id_Pro_Per)
					INNER JOIN tab_cantones ON (Id_Can = Id_Can_Per)
					WHERE Id_Per =".$Id_Usuario;
		}elseif((isset($cedula)) && ($cedula!='') ){
			//Si se pide por cedula
			$sql = "SELECT 
							Id_Pai_Per,
							Nombre_Pai,
							Id_Pro_Per,
							Nombre_Pro,
							Id_Can_Per,
							Nombre_Can
						FROM tab_personas
						INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
						INNER JOIN tab_provincias ON (Id_Pro = Id_Pro_Per)
						INNER JOIN tab_cantones ON (Id_Can = Id_Can_Per)
				WHERE Cedula_Per = '".$Cedula_Per."'";
		}
		$res_pai = seleccion($sql);
		$Id_Pai_Per = $res_pai[0]['Id_Pai_Per'];
		$Nombre_Pai = $res_pai[0]['Nombre_Pai'];
		$Id_Pro_Per = $res_pai[0]['Id_Pro_Per'];
		$Nombre_Pro = $res_pai[0]['Nombre_Pro'];
		$Id_Can_Per = $res_pai[0]['Id_Can_Per'];
		$Nombre_Can = $res_pai[0]['Nombre_Can'];
		$Id_Dist_Per = '';
		$Nombre_Dist = '';
	
	
	//Distritos
	}elseif($nivel_ubi==4){
		if( (isset($Id_Usuario)) && ($Id_Usuario!='') ){
			//Si se pide por ID de USUARIO
			$sql = "SELECT 
						Id_Pai_Per,
						Nombre_Pai,
						Id_Pro_Per,
						Nombre_Pro,
						Id_Can_Per,
						Nombre_Can,
                        Id_Dist_Per,
                        Nombre_Dist
					FROM tab_personas
					INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
					INNER JOIN tab_provincias ON (Id_Pro = Id_Pro_Per)
					INNER JOIN tab_cantones ON (Id_Can = Id_Can_Per)
                    INNER JOIN tab_distritos ON (Id_Dist = Id_Dist_Per)
					WHERE Id_Per =".$Id_Usuario;
		}elseif((isset($cedula)) && ($cedula!='') ){
			//Si se pide por cedula
			$sql = "SELECT 
						Id_Pai_Per, 
						Nombre_Pai,
						Id_Pro_Per,
						Nombre_Pro,
						Id_Can_Per,
						Nombre_Can,
                        Id_Dist_Per,
                        Nombre_Dist
					FROM tab_personas
					INNER JOIN tab_paises ON (Id_Pai = Id_Pai_Per)
					INNER JOIN tab_provincias ON (Id_Pro = Id_Pro_Per)
					INNER JOIN tab_cantones ON (Id_Can = Id_Can_Per)
                    INNER JOIN tab_distritos ON (Id_Dist = Id_Dist_Per)
				WHERE Cedula_Per = '".$Cedula_Per."'";
		}
		$res_pai = seleccion($sql);
		$Id_Pai_Per = $res_pai[0]['Id_Pai_Per'];
		$Nombre_Pai = $res_pai[0]['Nombre_Pai'];
		$Id_Pro_Per = $res_pai[0]['Id_Pro_Per'];
		$Nombre_Pro = $res_pai[0]['Nombre_Pro'];
		$Id_Can_Per = $res_pai[0]['Id_Can_Per'];
		$Nombre_Can = $res_pai[0]['Nombre_Can'];
		$Id_Dist_Per = $res_pai[0]['Id_Dist_Per'];
		$Nombre_Dist = $res_pai[0]['Nombre_Dist'];
	}
	
	//Obtener los telefonos de la persona
	$sql= "SELECT Id_Tel, Telefono_Tel, Nombre_Tip_Tel, Publico_Tel, Notificacion_Tel
				FROM tab_telefonos
				INNER JOIN tab_tipos_telefonos ON (Id_Tip_Tel = Id_Tip_Tel_Tel)
				WHERE Id_Per_Tel =".$Id_Usuario;
	$res_telefonos = seleccion($sql);
		
	
	//Obtener los correos de la persona
	$sql= "SELECT Id_Cor, Correo_Cor, Publico_Cor, Notificacion_Cor
			FROM tab_correos
			WHERE Id_Per_Cor = ".$Id_Usuario;
	$res_email = seleccion($sql);

	/*******************************************************/
	/****************** Inscripcion CT  ********************/
	/*******************************************************/
	$sql = "SELECT Id_CT_PXCT, Nombre_CT 
			FROM tab_personas_x_ct
			INNER JOIN tab_centros_trabajos ON (Id_CT = Id_CT_PXCT)
			WHERE Id_Per_PXCT = ".$Id_Usuario;
	$res_inscp_ct = seleccion($sql);
	
	/*******************************************************/
	/****************** Inscripcion UNI  *******************/
	/*******************************************************/
	$sql = "SELECT Id_Uni_PXU, Nombre_Uni 
			FROM tab_personas_x_universidades
			INNER JOIN tab_universidades ON (Id_Uni = Id_Uni_PXU)
			WHERE Id_Per_PXU = ".$Id_Usuario;
	$res_inscp_uni = seleccion($sql);
	
	/*******************************************************/
	/****************** Inscripcion ESC  *******************/
	/*******************************************************/
	$sql = "SELECT Id_Esc_PXE, Nombre_Esc 
			FROM tab_personas_x_escuelas
			INNER JOIN tab_escuelas ON (Id_Esc = Id_Esc_PXE)
			WHERE Id_Per_PXE= ".$Id_Usuario;
	$res_inscp_esc = seleccion($sql);
	
	/*******************************************************/
	/****************** Inscripcion CAR  *******************/
	/*******************************************************/
	$sql = "SELECT Id_Car_PXC, Nombre_Car 
			FROM tab_personas_x_carreras
			INNER JOIN tab_carreras ON (Id_Car = Id_Car_PXC)
			WHERE Id_Per_PXC= ".$Id_Usuario;
	$res_inscp_car = seleccion($sql);
	

		
?>
<br />
<div id="img_pdf" class="width800"
	 onclick="window.open('	<?=$dominio.$ruta?>'+
							'Modulos/SAE/Personas/ajax_pdf_detalle_persona.php?Id_Per_Usu='+document.getElementById('Id_Per_Usu').value+
							'&cedula_global='+document.getElementById('cedula_global').value+
							'&Key_Usu='+document.getElementById('Key_Usu').value);">
</div>
<br />
<table class="centrado width800">
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Detalle_Informacion']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Foto']?>:</td>
		<td class="centrado fondo_gris_claro2">
			<div class="img_redonda">
				<a id="fancybox<?=$Cedula_Per?>" href="<?=$Foto_Per?>" data-fancybox-group="gallery" title="<?=$Nombre_Per.' '.$Apellido1_Per.' '.$Apellido2_Per?>"><img src="<?=$Foto_Per?>" /></a>		
			</div>
		</td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Persona']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?=$TIP?></td>
		<td><?=$Cedula_Per?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Nombre']?>:</td>
		<td><?=$Nombre_Per.' '.$Apellido1_Per.' '.$Apellido2_Per?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Genero']?>:</td>
		<td><?=$Genero?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2"><?=$texto['Datos_Ubicacion']?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Direccion']?>:</td>
		<td><?=$Direccion?></td>
	</tr>
	<?php
	if($Nombre_Pai!=''){
	?>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Pais']?>:</td>
		<td><?=$Nombre_Pai?></td>
	</tr>
	
	<?php	
	}
	?>
	<?php
	if($Nombre_Pro!=''){
	?>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Provincia']?>:</td>
		<td><?=$Nombre_Pro?></td>
	</tr>
	
	<?php	
	}
	?>
	<?php
	if($Nombre_Can!=''){
	?>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Canton']?>:</td>
		<td><?=$Nombre_Can?></td>
	</tr>
	
	<?php	
	}
	?>
	<?php
	if($Nombre_Dist!=''){
	?>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Distrito']?>:</td>
		<td><?=$Nombre_Dist?></td>
	</tr>
	
	<?php	
	}
	?>
	
</table>
<table class="centrado width800">
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="4"><?=$texto['Telefonos']?>:</td>
	</tr>
    <tr>
        <td  class="centrado fondo_gris_claro blanco "><?= $texto['Telefono']?>:</td>
        <td  class="centrado fondo_gris_claro blanco "><?= $texto['Tipo_Telefono']?>:</td>
        <td  class="centrado fondo_gris_claro blanco "><?= $texto['Notificacion']?>:</td>
        <td  class="centrado fondo_gris_claro blanco "><?= $texto['Publico']?>:</td>
    </tr>
	<?php if(count($res_telefonos)>0){ ?>
		<?php for($i=0; $i < count($res_telefonos);$i++){ ?>
			  
			   <tr class="centrado">
					<td class="centrado">
						<?= $res_telefonos[$i]['Telefono_Tel'] ?>
					</td>
					<td class="centrado">
						<?= $res_telefonos[$i]['Nombre_Tip_Tel'] ?>
					</td>
					<td class="centrado">
						<?php if($res_telefonos[$i]['Notificacion_Tel'] == '1'){
								$noti = "si";
						}elseif($res_telefonos[$i]['Notificacion_Tel'] == '0'){
								$noti = "no";
						}
						?>
						<img src="img/SAE/<?=$noti?>.png" style=" width: 20px;" />        
					</td>
					<td class="centrado">
						<?php if($res_telefonos[$i]['Publico_Tel'] == '1'){
								$publi = "si";
						}elseif($res_telefonos[$i]['Publico_Tel'] == '0'){
								$publi = "no";
						}
						?>
						<img src="img/SAE/<?=$publi?>.png" style=" width: 20px;" />        
					</td>
	
			   </tr>
								
		<?php } ?>
	<?php }else{?>
		<tr>
			<td colspan="4" style="text-align: center;"><?=$texto['No_Datos']?></td>
		</tr> 
	<?php } ?>
	
</table>
<table class="centrado width800">
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="4"><?=$texto['Correos']?>:</td>
	</tr>
    <tr>
        <td  class="centrado fondo_gris_claro blanco "><?= $texto['Correo']?>:</td>
        <td  class="centrado fondo_gris_claro blanco "><?= $texto['Notificacion']?>:</td>
        <td  class="centrado fondo_gris_claro blanco "><?= $texto['Publico']?>:</td>
    </tr>
	<?php if(count($res_email)>0){ ?>
		<?php for($i=0; $i < count($res_email);$i++){ ?>
			  
			   <tr class="centrado">
					<td class="centrado">
						<?= $res_email[$i]['Correo_Cor'] ?>
					</td>
					<td class="centrado">
						<?php if($res_email[$i]['Notificacion_Cor'] == '1'){
								$noti = "si";
						}elseif($res_email[$i]['Notificacion_Cor'] == '0'){
								$noti = "no";
						}
						?>
						<img src="img/SAE/<?=$noti?>.png" style=" width: 20px;"/>        
					</td>
					<td class="centrado">
						<?php if($res_email[$i]['Publico_Cor'] == '1'){
								$publi = "si";
						}elseif($res_email[$i]['Publico_Cor'] == '0'){
								$publi = "no";
						}
						?>
						<img src="img/SAE/<?=$publi?>.png" style=" width: 20px;" />        
					</td>
	
			   </tr>
								
		<?php } ?>
	<?php }else{?>
		<tr>
			<td colspan="3" style="text-align: center;"><?=$texto['No_Datos']?></td>
		</tr> 
	<?php } ?>
</table>

<!-- ******************************************************************************************************************
**************************************************** INSCRIPCIONES ****************************************************
******************************************************************************************************************-->
<?php if( (count($res_inscp_ct)>0) || (count($res_inscp_uni)>0) ||(count($res_inscp_esc)>0) || (count($res_inscp_car)>0)){ ?>
	<table class="centrado width800">
		<tr>
			<td class="centrado fondo_azul2 blanco font12" colspan="4"><?=$texto['Inscripciones']?>:</td>
		</tr>
	
	<?php if(count($res_inscp_ct>0)) {?>
		<tr>
			<td  class="centrado fondo_gris_claro blanco "><?= $texto['Centro_Trabajo']?>:</td>
		</tr>
		<?php for($i=0; $i < count($res_inscp_ct);$i++){ ?>
			<tr class="centrado">
				<td class="centrado">
					<?= $res_inscp_ct[$i]['Nombre_CT'] ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	
	<?php if(count($res_inscp_uni>0)) {?>
		<tr>
			<td  class="centrado fondo_gris_claro blanco "><?= $texto['Universidades']?>:</td>
		</tr>
		<?php for($i=0; $i < count($res_inscp_uni);$i++){ ?>
			<tr class="centrado">
				<td class="centrado">
					<?= $res_inscp_uni[$i]['Nombre_Uni'] ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	
	<?php if(count($res_inscp_esc>0)) {?>
		<tr>
			<td  class="centrado fondo_gris_claro blanco "><?= $texto['Escuelas']?>:</td>
		</tr>
		<?php for($i=0; $i < count($res_inscp_esc);$i++){ ?>
			<tr class="centrado">
				<td class="centrado">
					<?= $res_inscp_esc[$i]['Nombre_Esc'] ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	
	<?php if(count($res_inscp_car>0)) {?>
		<tr>
			<td  class="centrado fondo_gris_claro blanco "><?= $texto['Carreras']?>:</td>
		</tr>
		<?php for($i=0; $i < count($res_inscp_car);$i++){ ?>
			<tr class="centrado">
				<td class="centrado">
					<?= $res_inscp_car[$i]['Nombre_Car'] ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	
	</table>
<?php } ?>
<br />
<br />
<br />
<script type="text/javascript">
		$('#fancybox<?=$Cedula_Per?>').fancybox();
</script>
