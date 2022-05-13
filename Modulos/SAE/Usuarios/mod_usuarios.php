<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/****************************PARAMETROS  ***********************************/
	$Id_Usuario 				= (isset($_GET['Id_Usuario'])) ? $_GET['Id_Usuario'] : '';
	

	
	/***************************************************************************/
	
	/****************************     SQL    ***********************************/
	$sql = "SELECT Id_Rol_Usu,Id_Preg_Usu, Respuesta_Preg_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$Id_Usuario;
	$res = seleccion($sql);
	
	$sql = "SELECT 	Id_Rol, Nombre_Rol 	FROM tab_roles 	WHERE Activo_Rol = '1' 	AND Id_Rol != 1	AND Id_Rol != 2";
	$roles = seleccion($sql);
	
	$sql = "SELECT Id_Preg, Pregunta_Preg FROM tab_preguntas WHERE Activo_Preg = 1";
	$preguntas = seleccion($sql);

	/***************************************************************************/
	
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Usuario" name="Id_Usuario" value="<?= $Id_Usuario?>" />

	

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['TITULO_mod_usuario'] ?></h3>
	<br />
	<br />
	<div>
		<!-- ****************************************************************************************** -->
		<!-- **************************       FORM         ******************************************** -->
		<!-- ****************************************************************************************** -->
			<table class="centrado width550 font09" >
				<tr id="fila_id_usuario">
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Id_Usuario']?>:</td>
					<td class="centrado " >
						<?=$Id_Usuario?>
					</td>
				</tr id="fila_id_usuario">
				<tr id="fila_perfil">
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Perfil']?>:</td>
					<td>
						 <select name="sl_perfil" id="sl_perfil" >
							<option value="0">[Seleccione]</option>
							<?php for($i=0;$i<count($roles);$i++){
									if($roles[$i]["Id_Rol"] == $res[0]['Id_Rol_Usu']){
										$seleccionado =  'selected="selected"';
									}else{
										$seleccionado =  '';
									}
								?>
									<option value="<?=$roles[$i]["Id_Rol"]?>" <?=$seleccionado?>>
										<?=$roles[$i]["Nombre_Rol"]?>
									</option>
							<?php }?>	
						</select>
					</td>
				</tr>
				<tr id="fila_contrasena">
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Contrasena']?>:</td>
					<td>
						<input type="text" name="contrasena" id="contrasena" maxlength="100" value=""  placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena']?>" />
           
					</td>
				</tr>
				<tr id="fila_confirmacion">
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Confirmar_Contrasena']?>:</td>
					<td>
						<input type="text" name="confirmar_contrasena" id="confirmar_contrasena" maxlength="100" value="" placeholder="<?=$texto['PLACEHOLDER_Digite_Confirmacion']?>" />
						<br />
						<span class="gris font06">*Nota: Si no digita una contraseña se mantendrá la actual.</span>
					</td>
				</tr>
				<tr id="fila_pregunta">
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Pregunta_secreta']?>:</td>
					<td>
						<select name="sl_pregunta" id="sl_pregunta" >
							<option value="0">[Seleccione]</option>
							<?php for($i=0;$i<count($preguntas);$i++){
									if($preguntas[$i]["Id_Preg"] == $res[0]['Id_Preg_Usu']){
										$seleccionado =  'selected="selected"';
									}else{
										$seleccionado =  '';
									}
								?>
									<option value="<?=$preguntas[$i]["Id_Preg"]?>" <?=$seleccionado?>>
										<?=$preguntas[$i]["Pregunta_Preg"]?>
									</option>
							<?php }?>	
						</select>
					</td>
				</tr>
				<tr id="fila_respuesta">
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Respuesta']?>:</td>
					<td>
						<input type="password" name="respuesta" id="respuesta" maxlength="100" value="<?=$res[0]['Respuesta_Preg_Usu']?>" placeholder="<?=$texto['PLACEHOLDER_Digite_Respuesta']?>"/>
					</td>
				</tr>
			</table>
		<!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
			<br/>
			<br/>
			<div class="centrado">
				<button class="boton" onclick="modificarUsuario()" ><?=$texto['Guardar']?></button>
				<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
			</div>
		
	</div>
<script>
	
	$('#fila_id_usuario').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Modificar_Id_Usuario']?>"
	});
	$('#fila_perfil').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Seleccione_Perfil']?>"
	});
	$('#fila_contrasena').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Contrasenna']?>"
	});
	$('#fila_confirmacion').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Confirmacion']?>"
	});
	$('#fila_pregunta').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Seleccione_Pregunta_Secreta']?>"
	});
	$('#fila_respuesta').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Respuesta_Secreta']?>"
	});
	
	
	
</script>
