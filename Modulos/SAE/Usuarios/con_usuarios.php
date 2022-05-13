<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$or_id_usuario 				= (isset($_GET['or_id_usuario'])) ? $_GET['or_id_usuario'] : '';
	$or_id_usuario_tipo 		= (isset($_GET['or_id_usuario_tipo'])) ? $_GET['or_id_usuario_tipo'] : 'ASC';
	
	$or_cedula 					= (isset($_GET['or_cedula'])) ? $_GET['or_cedula'] : '';
	$or_cedula_tipo 			= (isset($_GET['or_cedula_tipo'])) ? $_GET['or_cedula_tipo'] : 'ASC';
	
	$or_nombre 					= (isset($_GET['or_nombre'])) ? $_GET['or_nombre'] : '';
	$or_nombre_tipo 			= (isset($_GET['or_nombre_tipo'])) ? $_GET['or_nombre_tipo'] : 'ASC';
		
	$or_ape1 					= (isset($_GET['or_ape1'])) ? $_GET['or_ape1'] : '';
	$or_ape1_tipo 				= (isset($_GET['or_ape1_tipo'])) ? $_GET['or_ape1_tipo'] : 'ASC';
		
	$or_ape2 					= (isset($_GET['or_ape2'])) ? $_GET['or_ape2'] : '';
	$or_ape2_tipo 				= (isset($_GET['or_ape2_tipo'])) ? $_GET['or_ape2_tipo'] : 'ASC';
	
	$or_rol 					= (isset($_GET['or_rol'])) ? $_GET['or_rol'] : '';
	$or_rol_tipo 				= (isset($_GET['or_rol_tipo'])) ? $_GET['or_rol_tipo'] : 'ASC';
	
	$or_estado_conexion 		= (isset($_GET['or_estado_conexion'])) ? $_GET['or_estado_conexion'] : '';
	$or_estado_conexion_tipo	= (isset($_GET['or_estado_conexion_tipo'])) ? $_GET['or_estado_conexion_tipo'] : 'ASC';
	
	$or_fecha_conexion 			= (isset($_GET['or_fecha_conexion'])) ? $_GET['or_fecha_conexion'] : '';
	$or_fecha_conexion_tipo		= (isset($_GET['or_fecha_conexion_tipo'])) ? $_GET['or_fecha_conexion_tipo'] : 'ASC';
	
	$or_cookie 					= (isset($_GET['or_cookie'])) ? $_GET['or_cookie'] : '';
	$or_cookie_tipo				= (isset($_GET['or_cookie_tipo'])) ? $_GET['or_cookie_tipo'] : 'ASC';
	
	
	/***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
	
	
	/***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
	$sql ="SELECT COUNT(Id_Per_Usu) AS Cant_Registros
			FROM tab_usuarios
			INNER JOIN tab_roles ON(Id_Rol = Id_Rol_Usu)
			INNER JOIN tab_personas ON(Id_Per = Id_Per_Usu)
			WHERE (Id_Per_Usu != 1 ) AND (Id_Per_Usu != 2 ) AND (Activo_Per='1')";
				
	$bs_id_usuario=(isset($_GET['bs_id_usuario'])) ? $_GET['bs_id_usuario'] : ''; 
	if($bs_id_usuario != "" ){
		$sql.=" AND Id_Per_Usu =".$bs_id_usuario." ";
	}
	
	$bs_cedula=(isset($_GET['bs_cedula'])) ? $_GET['bs_cedula'] : ''; 
	if($bs_cedula != "" ){
		$sql.=" AND Cedula_Per ='".$bs_cedula."' ";
	}
	$bs_nombre = (isset($_GET['bs_nombre'])) ? $_GET['bs_nombre'] : '';
	if ($bs_nombre != "") {
		$sql.=" AND (Nombre_Per like '%" . $bs_nombre . "%' OR Apellido1_Per like '%" . $bs_nombre . "%' OR Apellido2_Per like '%" . $bs_nombre . "%')";
	}
	$bs_roles=(isset($_GET['bs_roles'])) ? $_GET['bs_roles'] : '0'; 
	if($bs_roles != "0" ){
		$sql.=" AND Id_Rol_Usu = ".$bs_roles;
	}
	$bs_estado_conexion=(isset($_GET['bs_estado_conexion'])) ? $_GET['bs_estado_conexion'] : '0'; 
	if($bs_estado_conexion != "0" ){
		if($bs_estado_conexion==1){
			$sql.=" AND Estado_Conexion_Usu = 1 ";	
		}elseif($bs_estado_conexion==2){
			$sql.=" AND Estado_Conexion_Usu = 0 ";	
		}
		
	}
	$res_cant = seleccion($sql);

	/***************************************************************************/
	/*****************   CALCULO PAGINACION      *******************************/
	/***************************************************************************/
	$cant_pagi = ceil((int) $res_cant[0]['Cant_Registros'] / (int) $TAMANO_PAGINA);
	
	$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	} else {
		$inicio = (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	}
	
	/***************************************************************************/
	/************************   SQL PRINCIPAL   ********************************/
	/***************************************************************************/
	$sql ="SELECT 
				Id_Per_Usu, 
				Cedula_Per,
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per,
				Id_Rol_Usu,
				Nombre_Rol,
				Estado_Conexion_Usu, 
				Fecha_Hora_Conexion_Usu,
				Cookie_Usu,
				Activo_Usu
			FROM tab_usuarios
			INNER JOIN tab_roles ON(Id_Rol = Id_Rol_Usu)
			INNER JOIN tab_personas ON(Id_Per = Id_Per_Usu)
			WHERE (Id_Per_Usu != 1 ) AND (Id_Per_Usu != 2 ) AND (Activo_Per='1')";
	
	/***************************************************************************/
	/************************   BUSQUEDAS       ********************************/
	/***************************************************************************/

	if($bs_id_usuario != "" ){
		$sql.=" AND Id_Per_Usu =".$bs_id_usuario." ";
	}
	$bs_cedula=(isset($_GET['bs_cedula'])) ? $_GET['bs_cedula'] : ''; 
	if($bs_cedula != "" ){
		$sql.=" AND Cedula_Per ='".$bs_cedula."' ";
	}
	$bs_nombre = (isset($_GET['bs_nombre'])) ? $_GET['bs_nombre'] : '';
	if ($bs_nombre != "") {
		$sql.=" AND (Nombre_Per like '%" . $bs_nombre . "%' OR Apellido1_Per like '%" . $bs_nombre . "%' OR Apellido2_Per like '%" . $bs_nombre . "%')";
	}

	$bs_roles=(isset($_GET['bs_roles'])) ? $_GET['bs_roles'] : '0'; 
	if($bs_roles != "0" ){
		$sql.=" AND Id_Rol_Usu = ".$bs_roles;
	}
	
	$bs_estado_conexion=(isset($_GET['bs_estado_conexion'])) ? $_GET['bs_estado_conexion'] : '0'; 
	if($bs_estado_conexion != "0" ){
		if($bs_estado_conexion==1){
			$sql.=" AND Estado_Conexion_Usu = 1 ";	
		}elseif($bs_estado_conexion==2){
			$sql.=" AND Estado_Conexion_Usu = 0 ";	
		}
		
	}
	
	/***************************************************************************/
	/************************   ORDENAMIENTO    ********************************/
	/***************************************************************************/
	$or_id_usuario= (isset($_GET['or_id_usuario'])) ? $_GET['or_id_usuario'] : '';
	if ($or_id_usuario != "") {
	    $sql.=" ORDER BY ".$or_id_usuario.' '.$or_id_usuario_tipo;
	}elseif($or_cedula!=""){
		$sql.=" ORDER BY ".$or_cedula.' '.$or_cedula_tipo;
	}elseif($or_nombre!=""){
		$sql.=" ORDER BY ".$or_nombre.' '.$or_nombre_tipo;
	}elseif($or_ape1!=""){
		$sql.=" ORDER BY ".$or_ape1.' '.$or_ape1_tipo;
	}elseif($or_ape2!=""){
		$sql.=" ORDER BY ".$or_ape2.' '.$or_ape2_tipo;
	}elseif($or_rol!=""){
		$sql.=" ORDER BY ".$or_rol.' '.$or_rol_tipo;
	}elseif($or_estado_conexion!=""){
		$sql.=" ORDER BY ".$or_estado_conexion.' '.$or_estado_conexion_tipo;
	}elseif($or_fecha_conexion!=""){
		$sql.=" ORDER BY ".$or_fecha_conexion.' '.$or_fecha_conexion_tipo;
	}elseif($or_cookie!=""){
		$sql.=" ORDER BY ".$or_cookie.' '.$or_cookie_tipo;
	}else{
	    $sql.=" ORDER BY Id_Per_Usu ASC";   
	}
	
	
	$sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
	
	$res = seleccion($sql);
	//echo $sql;
?>
<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />

<input type="hidden" id="or_id_usuario" name="or_id_usuario" value="<?=$or_id_usuario?>" />
<input type="hidden" id="or_id_usuario_tipo" name="or_id_usuario_tipo" value="<?=$or_id_usuario_tipo?>" />

<input type="hidden" id="or_cedula" name="or_cedula" value="<?=$or_cedula?>" />
<input type="hidden" id="or_cedula_tipo" name="or_cedula_tipo" value="<?=$or_cedula_tipo?>" />

<input type="hidden" id="or_nombre" name="or_nombre" value="<?=$or_nombre?>" />
<input type="hidden" id="or_nombre_tipo" name="or_nombre_tipo" value="<?=$or_nombre_tipo?>" />

<input type="hidden" id="or_ape1" name="or_ape1" value="<?=$or_ape1?>" />
<input type="hidden" id="or_ape1_tipo" name="or_ape1_tipo" value="<?=$or_ape1_tipo?>" />

<input type="hidden" id="or_ape2" name="or_ape2" value="<?=$or_ape2?>" />
<input type="hidden" id="or_ape2_tipo" name="or_ape2_tipo" value="<?=$or_ape2_tipo?>" />

<input type="hidden" id="or_rol" name="or_rol" value="<?=$or_rol?>" />
<input type="hidden" id="or_rol_tipo" name="or_rol_tipo" value="<?=$or_rol_tipo?>" />

<input type="hidden" id="or_estado_conexion" name="or_estado_conexion" value="<?=$or_estado_conexion?>" />
<input type="hidden" id="or_estado_conexion_tipo" name="or_estado_conexion_tipo" value="<?=$or_estado_conexion_tipo?>" />

<input type="hidden" id="or_fecha_conexion" name="or_fecha_conexion" value="<?=$or_fecha_conexion?>" />
<input type="hidden" id="or_fecha_conexion_tipo" name="or_fecha_conexion_tipo" value="<?=$or_fecha_conexion_tipo?>" />

<input type="hidden" id="or_cookie" name="or_cookie" value="<?=$or_cookie?>" />
<input type="hidden" id="or_cookie_tipo" name="or_cookie_tipo" value="<?=$or_cookie_tipo?>" />
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_con_usuarios'] ?></span>
</div>


<!-- ***************************************************************************************-->
<!-- ********************** Formulario de busqueda    **************************************-->
<!-- ***************************************************************************************-->
<span class="centrado">
	<?=$texto['Mostrar_Busqueda']?>
	<a onclick="MostrarBusqueda()">
		<img src="img/SAE/buscar.png" alt="<?=$texto['Mostrar_Busqueda']?>" class="alineado_medio"/>
	</a>
</span>

<div id="Buscar" style="display:none;"  >
    <table class="width500 centrado" >		
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Id_Usuario"]?>:</td>
			<td class="fondo_gris_claro2">
				<input type="text" name="bs_id_usuario" id="bs_id_usuario"  maxlength="10" value="<?= $bs_id_usuario ?>" placeholder="<?=$texto['PLACEHOLDER_Digite_ID_Usuario']?>"
				onkeyPress="return Buscar_Usuarios_Solo_Numeros(
								event,
								'Modulos/SAE/Usuarios/con_usuarios.php',
								'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								document.getElementById('bs_id_usuario').value+';'+
								document.getElementById('bs_cedula').value+';'+
								document.getElementById('bs_nombre').value+';'+
								document.getElementById('bs_roles').value+';'+
								document.getElementById('bs_estado_conexion').value+';'
							);"
				/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Cedula"]?>:</td>
			<td class="fondo_gris_claro2">
				<input type="text" name="bs_cedula" id="bs_cedula"  value="<?= $bs_cedula?>" placeholder="<?=$texto['PLACEHOLDER_Digite_Cedula']?>"
				onkeyup="mascara(this,'-',patron_cedula,true)" maxlength="11"
				onKeyPress="Buscar_Usuario_Cedula(
								event,
								'Modulos/SAE/Usuarios/con_usuarios.php',
								'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								document.getElementById('bs_id_usuario').value+';'+
								document.getElementById('bs_cedula').value+';'+
								document.getElementById('bs_nombre').value+';'+
								document.getElementById('bs_roles').value+';'+
								document.getElementById('bs_estado_conexion').value+';'
							);"
				/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Nombre"]?>:</td>
			<td class="fondo_gris_claro2">
				<input type="text" name="bs_nombre" id="bs_nombre"  maxlength="60" value="<?= $bs_nombre ?>" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre']?>"
				onKeyPress="Buscar(
								event,
								'Modulos/SAE/Usuarios/con_usuarios.php',
								'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
								'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
								document.getElementById('bs_id_usuario').value+';'+
								document.getElementById('bs_cedula').value+';'+
								document.getElementById('bs_nombre').value+';'+
								document.getElementById('bs_roles').value+';'+
								document.getElementById('bs_estado_conexion').value+';'
							);"/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Rol"]?>:</td>
			<td class="fondo_gris_claro2">
				<select name="bs_roles" id="bs_roles"
						onchange="Buscar(
									'',
									'Modulos/SAE/Usuarios/con_usuarios.php',
									'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
									'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
									document.getElementById('bs_id_usuario').value+';'+
									document.getElementById('bs_cedula').value+';'+
									document.getElementById('bs_nombre').value+';'+
									document.getElementById('bs_roles').value+';'+
									document.getElementById('bs_estado_conexion').value+';'
								);"
				>
					<option value="0"><?=$texto['Seleccione']?></option>
					<?php
						$sql = "SELECT Id_Rol, Nombre_Rol FROM tab_roles WHERE (Id_Rol !=1) AND (Id_Rol != 2) AND Activo_Rol = 1";
						$res_roles = seleccion($sql);
					
						for($i=0;$i<count($res_roles);$i++){
							echo("<option value='".$res_roles[$i]["Id_Rol"]."'");
							if($res_roles[$i]["Id_Rol"]==$bs_roles ){
								echo(" selected='selected'");
							}
							echo(" >".$res_roles[$i]["Nombre_Rol"]."</option>");
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco"><?=$texto["Estado_Conexion"]?>:</td>
			<td class="fondo_gris_claro2">
				<select name="bs_estado_conexion" id="bs_estado_conexion"
						onchange="Buscar(
									'',
									'Modulos/SAE/Usuarios/con_usuarios.php',
									'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
									'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
									document.getElementById('bs_id_usuario').value+';'+
									document.getElementById('bs_cedula').value+';'+
									document.getElementById('bs_nombre').value+';'+
									document.getElementById('bs_roles').value+';'+
									document.getElementById('bs_estado_conexion').value+';'
								);"
				>
					<option value="0"><?=$texto['Seleccione']?></option>
					<option value="1" <?php if($bs_estado_conexion==1){ echo 'selected="selected"'; }?> ><?=$texto['Conectado']?></option>
					<option value="2" <?php if($bs_estado_conexion==2){ echo 'selected="selected"'; }?>><?=$texto['No_conectado']?></option>
					
					
				</select>
			</td>
		</tr>
	</table>
	<br />
	<button class="boton" onclick="javascript:	Buscar_Usuarios_Boton();"><?=$texto['Buscar']?></button>
</div>
<br />
<br />



<!-- ***************************************************************************************-->
<!-- **********************Cantida total de Registros **************************************-->
<!-- ***************************************************************************************-->
<span class="centrado gris font08"><?=$texto['Cantidad_Registros_X_Pagina'].' '.$res_cant[0]['Cant_Registros']?></span><br /><br />



<!-- ***************************************************************************************-->
<!-- **********************          TABLA            **************************************-->
<!-- ***************************************************************************************-->
<div class="component">

	<table class="centrado font09 width70P ">		
		<tr class="centrado">
			<thead>
					<?php if(in_array("1053",$_SESSION['Permisos'])){ ?>
					<th>
						<?=$texto['Ver_Detalle']?>
					</th>
					<?php } //Derecho consultar detalle de usuario?>
					
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_id_usuario',
												   'Id_Per_Usu',
												   'or_id_usuario_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
								<?=$texto['Id_Usuario']?>
						</a>
					</th>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_cedula',
												   'Cedula_Per',
												   'or_cedula_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Cedula']?>
						</a>
					</th>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_nombre',
												   'Nombre_Per',
												   'or_nombre_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Nombre']?>
						</a>
					</th>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_ape1',
												   'Apellido1_Per',
												   'or_ape1_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Ape1']?>
						</a>
					</th>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_ape2',
												   'Apellido2_Per',
												   'or_ape2_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Ape2']?>
						</a>
					</th>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_rol',
												   'Id_Rol_Usu',
												   'or_rol_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Rol']?>
						</a>
					</th>
					<?php if(in_array("1054",$_SESSION['Permisos'])){ ?>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_estado_conexion',
												   'Estado_Conexion_Usu',
												   'or_estado_conexion_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Estado_Conexion']?>
						</a>
					</th>
				<?php } ?>
				<?php if(in_array("1054",$_SESSION['Permisos'])){ ?>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_fecha_conexion',
												   'Fecha_Hora_Conexion_Usu',
												   'or_fecha_conexion_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Fecha_Conexion']?>
						</a>
					</th>
				<?php } ?>
				<?php if(in_array("1056",$_SESSION['Permisos'])){ ?>
					<th>
						<a onClick="javascript:Ordenar('Modulos/SAE/Usuarios/con_usuarios.php',
												   'or_cookie',
												   'Cookie_Usu',
												   'or_cookie_tipo',
												   'pagina;inicio;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
													document.getElementById('bs_id_usuario').value+';'+
													document.getElementById('bs_cedula').value+';'+
													document.getElementById('bs_nombre').value+';'+
													document.getElementById('bs_roles').value+';'+
													document.getElementById('bs_estado_conexion').value+';'
												);
								window.scrollTo(0,0);">
							<?=$texto['Cookie']?>
						</a>
					</th>
				<?php } ?>
				<?php if(in_array("1057",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Modificar']?></a></th>
				<?php } ?>
				<?php if(in_array("1058",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Enviar_Mensaje']?></a></th>
				<?php } ?>
				<?php if(in_array("1059",$_SESSION['Permisos'])){ ?>
					<th><a><?=$texto['Activar_Desactivar']?></a></th>
				<?php } ?>
				
			</thead>
		</tr>
		<?php
		if(count($res)>0){
			for($i=0;$i<count($res);$i++){
		?>
				<tr>
					<?php if(in_array("1053",$_SESSION['Permisos'])){ ?>
						<td class="centrado">
							<a onclick="MostrarDetalle('Modulos/SAE/Personas/ajax_Detalle_Persona.php','Id_Usuario;','<?=$res[$i]['Id_Per_Usu']?>;','<?=$i?>');">
								<img name="img_detalle<?=$i?>" id="img_detalle<?=$i?>" alt="<?= $texto['Ver_Detalle']?>" src="img/SAE/mostrar_detalle.png"  />
							</a>
							
						</td>
					<?php } //Derecho de consultar detalle de persona?>
					
					<td class="centrado"><?= $res[$i]['Id_Per_Usu']?></td>
					<td class="izquierda"><?= $res[$i]['Cedula_Per']?></td>
					<td class="izquierda"><?= $res[$i]['Nombre_Per']?></td>
					<td class="izquierda"><?= $res[$i]['Apellido1_Per']?></td>
					<td class="izquierda"><?= $res[$i]['Apellido2_Per']?></td>
					<td class="izquierda"><?= $res[$i]['Nombre_Rol']?></td>
					<?php if(in_array("1054",$_SESSION['Permisos'])){ ?>
						<td class="centrado">
						<?php
							if(($res[$i]["Estado_Conexion_Usu"]==1)){ 
						?>	
								<img src='img/SAE/conectado.png' alt='<?=$texto['Conectado']?>'
									<?php if(in_array("1055",$_SESSION['Permisos'])){ ?>
										onClick="MostrarVentana(
												   this,
												   1,
												   'Modulos/SAE/Usuarios/desconectar_usuarios.php',
												   'pagina;inicio;'+
												   'Id_Usuario;'+
												   'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
												   'or_id_usuario;or_id_usuario_tipo;'+
												   'or_cedula;or_cedula_tipo;'+
												   'or_nombre;or_nombre_tipo;'+
												   'or_ape1;or_ape1_tipo;'+
												   'or_ape2;or_ape2_tipo;'+
												   'or_rol;or_rol_tipo;'+
												   'or_estado_conexion;or_estado_conexion_tipo;'+
												   'or_fecha_conexion;or_fecha_conexion_tipo;'+
												   'or_cookie;or_cookie_tipo;',
												   '<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
												   '<?=$res[$i]['Id_Per_Usu']?>'+';'+
												   '<?=$bs_id_usuario?>'+';'+'<?=$bs_cedula?>'+';'+'<?=$bs_nombre?>'+';'+'<?=$bs_roles?>'+';'+'<?=$bs_estado_conexion?>'+';'+
												   document.getElementById('or_id_usuario').value+';'+
												   document.getElementById('or_id_usuario_tipo').value+';'+
												   document.getElementById('or_cedula').value+';'+
												   document.getElementById('or_cedula_tipo').value+';'+
												   document.getElementById('or_nombre').value+';'+
												   document.getElementById('or_nombre_tipo').value+';'+
												   document.getElementById('or_ape1').value+';'+
												   document.getElementById('or_ape1_tipo').value+';'+
												   document.getElementById('or_ape2').value+';'+
												   document.getElementById('or_ape2_tipo').value+';'+
												   document.getElementById('or_rol').value+';'+
												   document.getElementById('or_rol_tipo').value+';'+
												   document.getElementById('or_estado_conexion').value+';'+
												   document.getElementById('or_estado_conexion_tipo').value+';'+
												   document.getElementById('or_fecha_conexion').value+';'+
												   document.getElementById('or_fecha_conexion_tipo').value+';'+
												   document.getElementById('or_cookie').value+';'+
												   document.getElementById('or_cookie_tipo').value+';'
												   )"
									<?php } //Permiso de desconectar a un usuario?>
									>
							<?php }else{?>
								<img src='img/SAE/no_conectado.png' alt='<?=$texto['No_conectado']?>'>
							<?php } ?>
					
					</td>
					<?php  } //Derecho de consultar estado de conexion ?>
					
					
					
					<?php if(in_array("1054",$_SESSION['Permisos'])){ ?>
						<td class="centrado">
							<?php
						
							if($res[$i]['Fecha_Hora_Conexion_Usu']!=''){
								$fecha = $res[$i]['Fecha_Hora_Conexion_Usu'];
							}else{
								$fecha = "<span class='gris'>".$texto['No_conectado']."</span>";							
							}
								echo $fecha;
							?>
							
						</td>
					<?php  } //Derecho de consultar estado de conexion ?>
					
					
					<?php if(in_array("1056",$_SESSION['Permisos'])){ ?>
						<td class="centrado">
							<?php if(($res[$i]["Cookie_Usu"]!='')){ 
							?>	
								<img src='img/SAE/cookie.png' alt='<?=$texto['Cookie']?>'>
							<?php }else{?>
								<img src='img/SAE/no_cookie.png' alt='<?=$texto['No_Cookie']?>'>
							<?php } ?>
							
	
						</td>
					<?php } //derecho de consultar cookie ?>
					
					
					
					<?php if(in_array("1057",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/modificar.png' alt='<?=$texto['Modificar']?>'
							onClick="MostrarVentana(
										this,
										1,
										'Modulos/SAE/Usuarios/mod_usuarios.php',
										'pagina;inicio;'+
										'Id_Usuario;'+
										'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
										'or_id_usuario;or_id_usuario_tipo;'+
										'or_cedula;or_cedula_tipo;'+
										'or_nombre;or_nombre_tipo;'+
										'or_ape1;or_ape1_tipo;'+
										'or_ape2;or_ape2_tipo;'+
										'or_rol;or_rol_tipo;'+
										'or_estado_conexion;or_estado_conexion_tipo;'+
										'or_fecha_conexion;or_fecha_conexion_tipo;'+
										'or_cookie;or_cookie_tipo;',
										'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
										'<?=$res[$i]['Id_Per_Usu']?>'+';'+
										'<?=$bs_id_usuario?>'+';'+'<?=$bs_cedula?>'+';'+'<?=$bs_nombre?>'+';'+'<?=$bs_roles?>'+';'+'<?=$bs_estado_conexion?>'+';'+
										document.getElementById('or_id_usuario').value+';'+
										document.getElementById('or_id_usuario_tipo').value+';'+
										document.getElementById('or_cedula').value+';'+
										document.getElementById('or_cedula_tipo').value+';'+
										document.getElementById('or_nombre').value+';'+
										document.getElementById('or_nombre_tipo').value+';'+
										document.getElementById('or_ape1').value+';'+
										document.getElementById('or_ape1_tipo').value+';'+
										document.getElementById('or_ape2').value+';'+
										document.getElementById('or_ape2_tipo').value+';'+
										document.getElementById('or_rol').value+';'+
										document.getElementById('or_rol_tipo').value+';'+
										document.getElementById('or_estado_conexion').value+';'+
										document.getElementById('or_estado_conexion_tipo').value+';'+
										document.getElementById('or_fecha_conexion').value+';'+
										document.getElementById('or_fecha_conexion_tipo').value+';'+
										document.getElementById('or_cookie').value+';'+
										document.getElementById('or_cookie_tipo').value+';'
										)"
						>
					</td>
					<?php } //derecho de modificar un usuario ?>
					
					
					
					
					
					<?php if(in_array("1058",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/mensaje.png' alt='<?=$texto['Modificar']?>'
							onClick="MostrarVentana(
										this,
										1,
										'Modulos/SAE/Usuarios/enviar_mensaje_usuarios.php',
										'pagina;inicio;'+
										'Id_Usuario;'+
										'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
										'or_id_usuario;or_id_usuario_tipo;'+
										'or_cedula;or_cedula_tipo;'+
										'or_nombre;or_nombre_tipo;'+
										'or_ape1;or_ape1_tipo;'+
										'or_ape2;or_ape2_tipo;'+
										'or_rol;or_rol_tipo;'+
										'or_estado_conexion;or_estado_conexion_tipo;'+
										'or_fecha_conexion;or_fecha_conexion_tipo;'+
										'or_cookie;or_cookie_tipo;',
										'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
										'<?=$res[$i]['Id_Per_Usu']?>'+';'+
										'<?=$bs_id_usuario?>'+';'+'<?=$bs_cedula?>'+';'+'<?=$bs_nombre?>'+';'+'<?=$bs_roles?>'+';'+'<?=$bs_estado_conexion?>'+';'+
										document.getElementById('or_id_usuario').value+';'+
										document.getElementById('or_id_usuario_tipo').value+';'+
										document.getElementById('or_cedula').value+';'+
										document.getElementById('or_cedula_tipo').value+';'+
										document.getElementById('or_nombre').value+';'+
										document.getElementById('or_nombre_tipo').value+';'+
										document.getElementById('or_ape1').value+';'+
										document.getElementById('or_ape1_tipo').value+';'+
										document.getElementById('or_ape2').value+';'+
										document.getElementById('or_ape2_tipo').value+';'+
										document.getElementById('or_rol').value+';'+
										document.getElementById('or_rol_tipo').value+';'+
										document.getElementById('or_estado_conexion').value+';'+
										document.getElementById('or_estado_conexion_tipo').value+';'+
										document.getElementById('or_fecha_conexion').value+';'+
										document.getElementById('or_fecha_conexion_tipo').value+';'+
										document.getElementById('or_cookie').value+';'+
										document.getElementById('or_cookie_tipo').value+';'
										);"
						>
					</td>
					<?php } //Derecho de enviar un mensaje ?>
					
					
					<?php if(in_array("1059",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<?php
							//Un mismo usuario no se puede desactivar
							if($res[$i]["Id_Per_Usu"]==$Id_Per_Usu){ ?>
							<img src='img/SAE/denegado.png'
								onClick="MostrarVentana(
												this,
												1,
												'Modulos/SAE/Usuarios/act_des_usuarios_bloqueo.php','','')"
								 
								 
								 />
						<?php }else{ ?>
								<?php if(($res[$i]["Activo_Usu"]!='')){ 
								?>	
									<img src='img/SAE/si.png' alt='<?=$texto['Desactivar']?>'
									style="width: 25px"
									onClick="MostrarVentana(
												this,
												1,
												'Modulos/SAE/Usuarios/act_des_usuarios.php',
												'pagina;inicio;'+
												'Id_Usuario;'+
												'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
												'or_id_usuario;or_id_usuario_tipo;'+
												'or_cedula;or_cedula_tipo;'+
												'or_nombre;or_nombre_tipo;'+
												'or_ape1;or_ape1_tipo;'+
												'or_ape2;or_ape2_tipo;'+
												'or_rol;or_rol_tipo;'+
												'or_estado_conexion;or_estado_conexion_tipo;'+
												'or_fecha_conexion;or_fecha_conexion_tipo;'+
												'or_cookie;or_cookie_tipo;'+
												'activado;Nombre;',
												'<?=$pagina?>'+';'+'<?=$inicio?>'+';'+
												'<?=$res[$i]['Id_Per_Usu']?>'+';'+
												'<?=$bs_id_usuario?>'+';'+'<?=$bs_cedula?>'+';'+'<?=$bs_nombre?>'+';'+'<?=$bs_roles?>'+';'+'<?=$bs_estado_conexion?>'+';'+
												document.getElementById('or_id_usuario').value+';'+
												document.getElementById('or_id_usuario_tipo').value+';'+
												document.getElementById('or_cedula').value+';'+
												document.getElementById('or_cedula_tipo').value+';'+
												document.getElementById('or_nombre').value+';'+
												document.getElementById('or_nombre_tipo').value+';'+
												document.getElementById('or_ape1').value+';'+
												document.getElementById('or_ape1_tipo').value+';'+
												document.getElementById('or_ape2').value+';'+
												document.getElementById('or_ape2_tipo').value+';'+
												document.getElementById('or_rol').value+';'+
												document.getElementById('or_rol_tipo').value+';'+
												document.getElementById('or_estado_conexion').value+';'+
												document.getElementById('or_estado_conexion_tipo').value+';'+
												document.getElementById('or_fecha_conexion').value+';'+
												document.getElementById('or_fecha_conexion_tipo').value+';'+
												document.getElementById('or_cookie').value+';'+
												document.getElementById('or_cookie_tipo').value+';'+
												'1;'+ '<?=$res[$i]['Nombre_Per']?>'+' '+'<?=$res[$i]['Apellido1_Per']?>'+' '+'<?=$res[$i]['Apellido2_Per']?>'+';'
												)"
									>
								<?php }else{?>
									<img src='img/SAE/no.png' style="width: 25px" alt='<?=$texto['Activar']?>'>
								<?php } ?>
						<?php } ?>
					</td>
					<?php } //Derecho de activar o desactivar usuario ?>
				</tr>
				<?php if(in_array("1053",$_SESSION['Permisos'])){ ?>
					<tr>
						<td colspan="13" >
							<div id="X<?=$i?>" style="display: none;" class="fondo_gris_oscuro">
								
							</div>
						</td>
					</tr>
				<?php } ?>
		<?php
			}
		}else{?>
				<tr>
					<td colspan="13" style="text-align: center;"><?=$texto['No_Datos']?></td>
				</tr>   
                
		<?php
		} //Fin else
		?>
	</table>
</div>

<!-- ********************************************************************************************** -->
<!-- **********************************  PAGINACION   ********************************************* -->
<!-- ********************************************************************************************** -->
			<div class="Paginacion gris">
				<?php if ($pagina !=1){ ?>
					<a onClick="javascript:CargaPaginaMenu(
															'Modulos/SAE/Usuarios/con_usuarios.php',
															'pagina;inicio;'+
															'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
															'or_id_usuario;or_id_usuario_tipo;'+
															'or_cedula;or_cedula_tipo;'+
															'or_nombre;or_nombre_tipo;'+
															'or_ape1;or_ape1_tipo;'+
															'or_ape2;or_ape2_tipo;'+
															'or_rol;or_rol_tipo;'+
															'or_estado_conexion;or_estado_conexion_tipo;'+
															'or_fecha_conexion;or_fecha_conexion_tipo;'+
															'or_cookie;or_cookie_tipo;',
														   
															'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'+
															document.getElementById('bs_id_usuario').value+';'+
															document.getElementById('bs_cedula').value+';'+
															document.getElementById('bs_nombre').value+';'+
															document.getElementById('bs_roles').value+';'+
															document.getElementById('bs_estado_conexion').value+';'+
															document.getElementById('or_id_usuario').value+';'+
															document.getElementById('or_id_usuario_tipo').value+';'+
															document.getElementById('or_cedula').value+';'+
															document.getElementById('or_cedula_tipo').value+';'+
															document.getElementById('or_nombre').value+';'+
															document.getElementById('or_nombre_tipo').value+';'+
															document.getElementById('or_ape1').value+';'+
															document.getElementById('or_ape1_tipo').value+';'+
															document.getElementById('or_ape2').value+';'+
															document.getElementById('or_ape2_tipo').value+';'+
															document.getElementById('or_rol').value+';'+
															document.getElementById('or_rol_tipo').value+';'+
															document.getElementById('or_estado_conexion').value+';'+
															document.getElementById('or_estado_conexion_tipo').value+';'+
															document.getElementById('or_fecha_conexion').value+';'+
															document.getElementById('or_fecha_conexion_tipo').value+';'+
															document.getElementById('or_cookie').value+';'+
															document.getElementById('or_cookie_tipo').value+';'
															);window.scrollTo(0,0);"
					>
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?= $texto['Pagina']?>: <?= $pagina ?> <?= $texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu(
															'Modulos/SAE/Usuarios/con_usuarios.php',
															'pagina;inicio;'+
															'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
															'or_id_usuario;or_id_usuario_tipo;'+
															'or_cedula;or_cedula_tipo;'+
															'or_nombre;or_nombre_tipo;'+
															'or_ape1;or_ape1_tipo;'+
															'or_ape2;or_ape2_tipo;'+
															'or_rol;or_rol_tipo;'+
															'or_estado_conexion;or_estado_conexion_tipo;'+
															'or_fecha_conexion;or_fecha_conexion_tipo;'+
															'or_cookie;or_cookie_tipo;',
														   
															'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'+
															document.getElementById('bs_id_usuario').value+';'+
															document.getElementById('bs_cedula').value+';'+
															document.getElementById('bs_nombre').value+';'+
															document.getElementById('bs_roles').value+';'+
															document.getElementById('bs_estado_conexion').value+';'+
															document.getElementById('or_id_usuario').value+';'+
															document.getElementById('or_id_usuario_tipo').value+';'+
															document.getElementById('or_cedula').value+';'+
															document.getElementById('or_cedula_tipo').value+';'+
															document.getElementById('or_nombre').value+';'+
															document.getElementById('or_nombre_tipo').value+';'+
															document.getElementById('or_ape1').value+';'+
															document.getElementById('or_ape1_tipo').value+';'+
															document.getElementById('or_ape2').value+';'+
															document.getElementById('or_ape2_tipo').value+';'+
															document.getElementById('or_rol').value+';'+
															document.getElementById('or_rol_tipo').value+';'+
															document.getElementById('or_estado_conexion').value+';'+
															document.getElementById('or_estado_conexion_tipo').value+';'+
															document.getElementById('or_fecha_conexion').value+';'+
															document.getElementById('or_fecha_conexion_tipo').value+';'+
															document.getElementById('or_cookie').value+';'+
															document.getElementById('or_cookie_tipo').value+';'
															);
															window.scrollTo(0,0);">
								<img src="img/SAE/siguiente.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>   
				<?php } ?>
			</div>
<!-- ********************************************************************************************** -->
<!-- ******************************** FIN PAGINACION  ********************************************* -->
<!-- ********************************************************************************************** -->


<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<?php if(in_array("1051",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu(
														'Modulos/SAE/Usuarios/agr_usuarios.php',
														'pagina;inicio;'+
														'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
														'or_id_usuario;or_id_usuario_tipo;'+
														'or_cedula;or_cedula_tipo;'+
														'or_nombre;or_nombre_tipo;'+
														'or_ape1;or_ape1_tipo;'+
														'or_ape2;or_ape2_tipo;'+
														'or_rol;or_rol_tipo;'+
														'or_estado_conexion;or_estado_conexion_tipo;'+
														'or_fecha_conexion;or_fecha_conexion_tipo;'+
														'or_cookie;or_cookie_tipo;'+
														'mostrar_efecto;',
														'<?=$pagina?>;<?=$inicio?>;'+
														document.getElementById('bs_id_usuario').value+';'+
														document.getElementById('bs_cedula').value+';'+
														document.getElementById('bs_nombre').value+';'+
														document.getElementById('bs_roles').value+';'+
														document.getElementById('bs_estado_conexion').value+';'+
														document.getElementById('or_id_usuario').value+';'+
														document.getElementById('or_id_usuario_tipo').value+';'+
														document.getElementById('or_cedula').value+';'+
														document.getElementById('or_cedula_tipo').value+';'+
														document.getElementById('or_nombre').value+';'+
														document.getElementById('or_nombre_tipo').value+';'+
														document.getElementById('or_ape1').value+';'+
														document.getElementById('or_ape1_tipo').value+';'+
														document.getElementById('or_ape2').value+';'+
														document.getElementById('or_ape2_tipo').value+';'+
														document.getElementById('or_rol').value+';'+
														document.getElementById('or_rol_tipo').value+';'+
														document.getElementById('or_estado_conexion').value+';'+
														document.getElementById('or_estado_conexion_tipo').value+';'+
														document.getElementById('or_fecha_conexion').value+';'+
														document.getElementById('or_fecha_conexion_tipo').value+';'+
														document.getElementById('or_cookie').value+';'+
														document.getElementById('or_cookie_tipo').value+';'
												);">
			<?=$texto['TITULO_agr_usuario']?>
		</button>
	</div>
	<?php } ?>
	

	

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_id_usuario').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_ID_Usuario']?>"
	});
	$('#bs_cedula').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Cedula']?>"
	});
	$('#bs_nombre').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Nombre']?>"
	});
	$('#bs_roles').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Seleccione_Perfil']?>"
	});
	$('#bs_estado_conexion').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Nombre']?>"
	});
</script>
<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>