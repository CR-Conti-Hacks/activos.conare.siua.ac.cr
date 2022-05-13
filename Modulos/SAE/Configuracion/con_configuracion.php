<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	//Obtener los datos de configuracion del sistema
	$sql = "SELECT 
				   Nombre_Session_Conf, 
				   Direccion_Carpeta_Conf, 
				   Direccion_Web_Conf, 
				   Llave_Encriptacion_Conf,
				   Cantidad_Registros_Conf
			   FROM tab_configuracion
			   WHERE Id_Conf = 1";
	$res_principal = seleccion($sql);
	
	//Variables
	$dominio = $res_principal[0]['Direccion_Web_Conf'];
	$ruta = $res_principal[0]['Direccion_Carpeta_Conf'];

	$sql = "SELECT
				Id_Conf,
				Id_Pai_Conf,
				Nombre_Conf,
				Titulo_Bienvenida_Conf,
				Nombre_Resumen_Conf,
				Quienes_Somos_Conf,
				Direccion_Conf,
				Telefono_Conf,
				Email_Conf,
				Fax_Conf,
				Permitir_Inscripcion_Estu_Conf,
                Titulo_Inscripcion_Estu_Conf,
                Id_Rol_Estu_Conf,
                Id_PI_Estu_Conf,
				Permitir_Inscripcion_Empr_Conf,
                Titulo_Inscripcion_Emp_Conf,
                Id_Rol_Emp_Conf,
                Id_PI_Emp_Conf,
				Permitir_Contacto_Rol_Conf,
				Permitir_Desbloquear_Usuari_Conf,
				Permitir_Recordar_Contrasena_Conf,
				Enviar_Correo_Inscripcion_Conf,
                Id_PlanCor_Inscripcion_Conf,
				Nombre_Session_Conf,
				Tiempo_Session_Conf,
				Direccion_Carpeta_Conf,
				Direccion_Web_Conf,
				LDAP_Conf,
				IP_LDAP_Conf,
				Cadena_LDAP_Conf,
				Logo_Empresa_Conf,
				Mostrar_Logo_Conf,
				Width_Logo_Conf,
				Height_Logo_Conf,
				Cantidad_Registros_Conf,
				Llave_Encriptacion_Conf,
				Nivel_Ubicacion_Conf,
				Nombre_Empresa_Conf,
				Pedir_Fecha_Nacimiento,
                Pedir_Grados_Academicos,
                Direccion_Facebook_Conf,
                Usuario_Facebook_Conf,
                Password_Facebook_Conf,
                Direccion_Twitter_Conf,
                Usuario_Twitter_Conf,
                Password_Twitter_Conf,
                Direccion_GooglePlus_Conf,
                Usuario_GooglePlus_Conf,
                Password_GooglePlus_Conf
			FROM tab_configuracion
			WHERE Id_Conf = 1";
	$res = seleccion($sql);
	
	

	


	if(!empty($res[0]['Id_Conf'])){
		
		/***************************************** efecto titulo    *************************************************/
		$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
		
		/************************************************ LOGO ******************************************************/
		$Logo_Empresa_Conf					= (isset($res[0]['Logo_Empresa_Conf'])) ? $res[0]['Logo_Empresa_Conf'] : '';
		$Mostrar_Logo_Conf					= (isset($res[0]['Mostrar_Logo_Conf'])) ? $res[0]['Mostrar_Logo_Conf'] : '0';
		$Width_Logo_Conf					= (isset($res[0]['Width_Logo_Conf'])) ? $res[0]['Width_Logo_Conf'] : '0';
		$Height_Logo_Conf					= (isset($res[0]['Height_Logo_Conf'])) ? $res[0]['Height_Logo_Conf'] : '0';
		
		/************************************************ Empresa ******************************************************/
		$Nombre_Empresa_Conf				= (isset($res[0]['Nombre_Empresa_Conf'])) ? $res[0]['Nombre_Empresa_Conf'] : 'Configurar';
		$Quienes_Somos_Conf					= (isset($res[0]['Quienes_Somos_Conf'])) ? $res[0]['Quienes_Somos_Conf'] : 'Configurar';
		$Id_Pai_Conf 						= (isset($res[0]['Id_Pai_Conf'])) ? $res[0]['Id_Pai_Conf'] : 'Configurar';
		$Nombre_Pai							= (isset($res[0]['Nombre_Pai'])) ? $res[0]['Nombre_Pai'] : 'Configurar';
		$Direccion_Conf						= (isset($res[0]['Direccion_Conf'])) ? $res[0]['Direccion_Conf'] : 'Configurar';
		$Telefono_Conf						= (isset($res[0]['Telefono_Conf'])) ? $res[0]['Telefono_Conf'] : '0000-0000';
		$Fax_Conf		 					= (isset($res[0]['Fax_Conf']) ) ? $res[0]['Fax_Conf'] : 'Configurar';
		$Email_Conf		 					= (isset($res[0]['Email_Conf'])) ? $res[0]['Email_Conf'] : 'Configurar';
		
		
		/************************************************ Sistema ******************************************************/
		$Id_Conf 							= $res[0]['Id_Conf'];
		$Nombre_Conf						= (isset($res[0]['Nombre_Conf'])) ? $res[0]['Nombre_Conf'] : 'Configurar';
		$Nombre_Resumen_Conf				= (isset($res[0]['Nombre_Resumen_Conf'])) ? $res[0]['Nombre_Resumen_Conf'] : 'Configurar';
		$Titulo_Bienvenida_Conf				= (isset($res[0]['Titulo_Bienvenida_Conf'])) ? $res[0]['Titulo_Bienvenida_Conf'] : 'Configurar';
		
		$Nombre_Session_Conf				= (isset($res[0]['Nombre_Session_Conf'])) ? $res[0]['Nombre_Session_Conf'] : 'Configurar';
		$Tiempo_Session_Conf				= (isset($res[0]['Tiempo_Session_Conf'])) ? $res[0]['Tiempo_Session_Conf'] : '0';
		$Direccion_Web_Conf					= (isset($res[0]['Direccion_Web_Conf'])) ? $res[0]['Direccion_Web_Conf'] : 'Configurar';
		$Direccion_Carpeta_Conf				= (isset($res[0]['Direccion_Carpeta_Conf'])) ? $res[0]['Direccion_Carpeta_Conf'] : 'Configurar';
		$Llave_Encriptacion_Conf			= (isset($res[0]['Llave_Encriptacion_Conf'])) ? $res[0]['Llave_Encriptacion_Conf'] : 'Configurar';
		$Nivel_Ubicacion_Conf				= (isset($res[0]['Nivel_Ubicacion_Conf'])) ? $res[0]['Nivel_Ubicacion_Conf'] : '1';
		$Cantidad_Registros_Conf			= (isset($res[0]['Cantidad_Registros_Conf'])) ? $res[0]['Cantidad_Registros_Conf'] : '0';
		$Id_Rol_Conf						= (isset($res[0]['Id_Rol_Conf'])) ? $res[0]['Id_Rol_Conf'] : '0';
		
		$Permitir_Inscripcion_Estu_Conf		= (isset($res[0]['Permitir_Inscripcion_Estu_Conf'])) ? $res[0]['Permitir_Inscripcion_Estu_Conf'] : '0';
        $Titulo_Inscripcion_Estu_Conf		= (isset($res[0]['Titulo_Inscripcion_Estu_Conf'])) ? $res[0]['Titulo_Inscripcion_Estu_Conf'] : 'Configurar';
        $Id_Rol_Estu_Conf           		= (isset($res[0]['Id_Rol_Estu_Conf'])) ? $res[0]['Id_Rol_Estu_Conf'] : '0';
        $Id_PI_Estu_Conf             		= (isset($res[0]['Id_PI_Estu_Conf'])) ? $res[0]['Id_PI_Estu_Conf'] : '0';
        
		$Permitir_Inscripcion_Empr_Conf		= (isset($res[0]['Permitir_Inscripcion_Empr_Conf'])) ? $res[0]['Permitir_Inscripcion_Empr_Conf'] : '0';
        $Titulo_Inscripcion_Emp_Conf		= (isset($res[0]['Titulo_Inscripcion_Emp_Conf'])) ? $res[0]['Titulo_Inscripcion_Emp_Conf'] : 'Configurar';
        $Id_Rol_Emp_Conf           		    = (isset($res[0]['Id_Rol_Emp_Conf'])) ? $res[0]['Id_Rol_Emp_Conf'] : '0';
        $Id_PI_Emp_Conf             		= (isset($res[0]['Id_PI_Emp_Conf'])) ? $res[0]['Id_PI_Emp_Conf'] : '0';
        
		$Permitir_Contacto_Rol_Conf			= (isset($res[0]['Permitir_Contacto_Rol_Conf'])) ? $res[0]['Permitir_Contacto_Rol_Conf'] : '0';
		$Permitir_Desbloquear_Usuari_Conf	= (isset($res[0]['Permitir_Desbloquear_Usuari_Conf'])) ? $res[0]['Permitir_Desbloquear_Usuari_Conf'] : '0';
		$Permitir_Recordar_Contrasena_Conf	= (isset($res[0]['Permitir_Recordar_Contrasena_Conf'])) ? $res[0]['Permitir_Recordar_Contrasena_Conf'] : '0';
		$Enviar_Correo_Inscripcion_Conf		= (isset($res[0]['Enviar_Correo_Inscripcion_Conf'])) ? $res[0]['Enviar_Correo_Inscripcion_Conf'] : '0';
		$Id_PlanCor_Inscripcion_Conf        = (isset($res[0]['Id_PlanCor_Inscripcion_Conf'])) ? $res[0]['Id_PlanCor_Inscripcion_Conf'] : '0';
		
		$LDAP_Conf		 					= (isset($res[0]['LDAP_Conf'])) ? $res[0]['LDAP_Conf'] : '0';
		$IP_LDAP_Conf						= (isset($res[0]['IP_LDAP_Conf'])) ? $res[0]['IP_LDAP_Conf'] : 'Configurar';
		$Cadena_LDAP_Conf					= (isset($res[0]['Cadena_LDAP_Conf'])) ? $res[0]['Cadena_LDAP_Conf'] : 'Configurar';
		
        $Pedir_Grados_Academicos    		= (isset($res[0]['Pedir_Grados_Academicos'])) ? $res[0]['Pedir_Grados_Academicos'] : '0';
		$Pedir_Fecha_Nacimiento	            = (isset($res[0]['Pedir_Fecha_Nacimiento'])) ? $res[0]['Pedir_Fecha_Nacimiento'] : '0';
		
		/************************************************ SOCIAL  ******************************************************/
        $Direccion_Facebook_Conf	        = (isset($res[0]['Direccion_Facebook_Conf'])) ? $res[0]['Direccion_Facebook_Conf'] : 'Configurar';
        $Usuario_Facebook_Conf	            = (isset($res[0]['Usuario_Facebook_Conf'])) ? $res[0]['Usuario_Facebook_Conf'] : 'Configurar';
        $Password_Facebook_Conf	            = (isset($res[0]['Password_Facebook_Conf'])) ? $res[0]['Password_Facebook_Conf'] : 'Configurar';
        
        $Direccion_Twitter_Conf	            = (isset($res[0]['Direccion_Twitter_Conf'])) ? $res[0]['Direccion_Twitter_Conf'] : 'Configurar';
        $Usuario_Twitter_Conf	            = (isset($res[0]['Usuario_Twitter_Conf'])) ? $res[0]['Usuario_Twitter_Conf'] : 'Configurar';
        $Password_Twitter_Conf	            = (isset($res[0]['Password_Twitter_Conf'])) ? $res[0]['Password_Twitter_Conf'] : 'Configurar';
        
        $Direccion_GooglePlus_Conf          = (isset($res[0]['Direccion_GooglePlus_Conf'])) ? $res[0]['Direccion_GooglePlus_Conf'] : 'Configurar';
        $Usuario_GooglePlus_Conf            = (isset($res[0]['Usuario_GooglePlus_Conf'])) ? $res[0]['Usuario_GooglePlus_Conf'] : 'Configurar';
        $Password_GooglePlus_Conf	        = (isset($res[0]['Password_GooglePlus_Conf'])) ? $res[0]['Password_GooglePlus_Conf'] : 'Configurar';
               
		

		
		$Tam_quienes = strlen($Quienes_Somos_Conf);
		$Tam_quienes = 1000 - $Tam_quienes;
		$Tam_direccion = strlen($Direccion_Conf);
		$Tam_direccion = 200 - $Tam_direccion;

	}
?>
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_con_configuracion'] ?></span>
</div>

 

		<div class="component">
			<table class="centrado width60P"  >
				<thead>
					<tr>
						<th><?=$texto['Caracteristica']?>:</th>
						<th><?=$texto['Valor']?>:</th>
					</tr>
				</thead>
				<!-- ********************************************************************************-->
				<!-- **************************** LOGO    *******************************************-->
				<!-- ********************************************************************************-->
				<tr >
					<td ><?=$texto['Logo_Empresa']?>: </td>
					<td   align="center">
						<?php
							if($Logo_Empresa_Conf==''){
								$imagen = $dominio.$ruta."img/Logo/ugit.png";
								$real = "ugit.png";
							}else{
								$imagen = $dominio.$ruta."img/Logo/$Logo_Empresa_Conf";
								$real = $Logo_Empresa_Conf;
							}
						?>
                        <div class="width70P centrado">
                            <input type="hidden" id="archivo_logo_original" name="archivo_logo_original" value="<?=$Logo_Empresa_Conf?>" />
                            <input type="file" id="archivo_logo" name="archivo_logo" class="dropify" 
							   data-default-file="<?=$imagen?>" data-height="150" data-max-file-size="1M" onchange="Sube_Logo()"/>    
                        </div>
						
					</td>
				</tr>
				<tr>
					<td ><?=$texto['Mostrar_logo']?>:</td>
					<td id="td_mostrar_logo" >
						<?php
							if($Mostrar_Logo_Conf=='0'){
								$marcado = "";
						}elseif($Mostrar_Logo_Conf=='1'){
								$marcado = 'checked="checked"';
							}
						?>
						<input id="ch_mostrar_logo" class="cmn-toggle cmn-toggle-round" type="checkbox" <?=$marcado?>
						onclick="Guarda_Checkbox(this,'tab_configuracion','Mostrar_Logo_Conf','Modulos/SAE/Genericos/ajax_guarda_checkbox.php')"/>
						<label for="ch_mostrar_logo"></label>
					</td>
				</tr>
				<tr>
					<td><?=$texto['Ancho_logo']?>: </td>
					<td id="td_ancho_logo">
						<span id="etiqueta_ancho" name="etiqueta_ancho" onclick="ActivaEdicion('etiqueta_ancho','campo_ancho','txt_ancho',0)" ><?=$Width_Logo_Conf?>px</span>
						<span id="campo_ancho" name="campo_ancho"  style="display: none;">
							<input type="text" id="txt_ancho" name="txt_ancho" class="width50" maxlength="3" value="<?=$Width_Logo_Conf?>" placeholder="<?=$texto['PLACEHOLDER_Ancho']?>"
							onKeyPress="return GuardaMedida_ancho(event,'txt_ancho','tab_configuracion','Width_Logo_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_ancho','campo_ancho','px')" />px &nbsp;
						</span>
						
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Alto_logo']?>: </td>
					<td id="td_alto_logo">
						<span id="etiqueta_alto" name="etiqueta_alto" onclick="ActivaEdicion('etiqueta_alto','campo_alto','txt_alto',0)" ><?=$Height_Logo_Conf?>px</span>
						<span id="campo_alto" name="campo_alto"  style="display: none;">
							<input type="text" id="txt_alto" name="txt_alto" class="width50" maxlength="3" value="<?=$Height_Logo_Conf?>" placeholder="<?=$texto['PLACEHOLDER_Alto']?>"
							onKeyPress="return GuardaMedida_alto(event,'txt_alto','tab_configuracion','Height_Logo_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_alto','campo_alto','px')" />px &nbsp;
						</span>
					</td>		
				</tr>
				<!-- ********************************************************************************-->
				<!-- **************************** EMPRESA *******************************************-->
				<!-- ********************************************************************************-->
				<tr >
					<td><?=$texto['Nombre_Empresa']?>: </td>
					<td id="td_nombre_empresa">
						<span id="etiqueta_nombre_empresa" name="etiqueta_nombre_empresa" onclick="ActivaEdicion('etiqueta_nombre_empresa','campo_nombre_empresa','txt_nombre_empresa',0)" ><?=$Nombre_Empresa_Conf?></span>
						<span id="campo_nombre_empresa" name="campo_nombre_empresa"  style="display: none;">
							<input type="text" id="txt_nombre_empresa" name="txt_nombre_empresa" class="width300" value="<?=$Nombre_Empresa_Conf?>" maxlength="150"  placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre']?>"
							onKeyPress="Guarda_Nombre_Empresa(event,'txt_nombre_empresa','tab_configuracion','Nombre_Empresa_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_nombre_empresa','campo_nombre_empresa','')" />
						</span>
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Quienes_somos']?>: </td>
					<td id="td_quienes" >
						<span id="etiqueta_quienes" name="etiqueta_quienes" onclick="ActivaEdicion('etiqueta_quienes','campo_quienes','txt_quienes',0)" ><?=$Quienes_Somos_Conf?></span>
						<span id="campo_quienes" name="campo_quienes"  style="display: none;" class="centrado">
							<div class="centrado">
								<span class="gris font06" ><?=$texto['1000_Caracteres']?></span>
									<br/>
									<input readonly type=text name="Tam_quienes" id="Tam_quienes" size=3 maxlength=3 value="<?=$Tam_quienes ?>" class="width50 gris">
									<br />
									<textarea id="txt_quienes" name="txt_quienes" class="width500 height350"  placeholder="<?=$texto['PLACEHOLDER_Digite_Quienes_Somos'] ?>"
									onKeyPress="Guarda_Nombre_Quienes(event,'txt_quienes','tab_configuracion','Quienes_Somos_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_quienes','campo_quienes','')"
									onKeyDown="validaCantidadTexArea('txt_quienes','Tam_quienes',1000);" onKeyUp="validaCantidadTexArea('txt_quienes','Tam_quienes',1000);"><?=$Quienes_Somos_Conf?></textarea>
								</span>
							</div>
								
	
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Pais']?>: </td>
					<td id="td_pais">
						<select name="pais" id="pais"  onchange="Guarda_Pais_Conf('pais')">
							<option value="0">[Seleccione]</option>
							<?php
								$sql = "SELECT Id_Pai,Nombre_Pai FROM tab_paises WHERE Activo_Pai='1' ORDER BY Nombre_Pai";
								$paises = seleccion($sql);
								
								
								for($i=0;$i<count($paises);$i++){
									echo("<option value='".$paises[$i]["Id_Pai"]."'");
										if($paises[$i]["Id_Pai"]==$Id_Pai_Conf ){
											echo(" selected='selected'");
										}
										
									echo(" >".$paises[$i]["Nombre_Pai"]."</option>");
								}
							?>
						</select>
					</td>	
						
				</tr>
				<tr>
					<td><?=$texto['Direccion']?>: </td>
					<td id="td_direccion">
						<span id="etiqueta_direccion" name="etiqueta_direccion" onclick="ActivaEdicion('etiqueta_direccion','campo_direccion','txt_direccion',0)" ><?=$Direccion_Conf?></span>
						<span id="campo_direccion" name="campo_direccion"  style="display: none;" class="centrado">
							 <span class="gris font06">( el tamaño maximo del texto 200 es de caracteres )</span>
							 <br/>
							 <input readonly type=text name="Tam_direccion" id="Tam_direccion" size=3 maxlength=3 value="<?=$Tam_direccion ?>" class="width50 gris">
							<br />
							<textarea id="txt_direccion" name="txt_direccion" class="width500 height200" placeholder="<?=$texto['PLACEHOLDER_Digite_Direccion'] ?>"
								onKeyPress="Guarda_Direccion_Conf(event,'txt_direccion','tab_configuracion','Direccion_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_direccion','campo_direccion','')"
								onKeyDown="validaCantidadTexArea('txt_direccion','Tam_direccion',200);" onKeyUp="validaCantidadTexArea('txt_direccion','Tam_direccion',200);"><?=$Direccion_Conf?></textarea>
						</span>
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Telefono']?>: </td>
					<td id="td_telefono">
						<span id="etiqueta_tel" name="etiqueta_tel" onclick="ActivaEdicion('etiqueta_tel','campo_tel','txt_tel',0)" ><?=$Telefono_Conf?></span>
						<span id="campo_tel" name="campo_tel"  style="display: none;">
							<input type="text" id="txt_tel" name="txt_tel" class="width100" value="<?=$Telefono_Conf?>" placeholder="<?=$texto['PLACEHOLDER_Telefono'] ?>"
							onkeyup="mascara(this,'-',patron_telefono,true)" maxlength="9"
							onKeyPress="return Guarda_Telefono_Conf(event,'txt_tel','tab_configuracion','Telefono_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_tel','campo_tel','')" />
						</span>

					</td>		
				</tr>
				<tr>
					<td><?=$texto['Fax']?>: </td>
					<td id="td_fax">
						<span id="etiqueta_fax" name="etiqueta_fax" onclick="ActivaEdicion('etiqueta_fax','campo_fax','txt_fax',0)" ><?=$Fax_Conf?></span>
						<span id="campo_fax" name="campo_fax"  style="display: none;">
							<input type="text" id="txt_fax" name="txt_fax" class="width100" value="<?=$Fax_Conf?>" placeholder="<?=$texto['PLACEHOLDER_Fax'] ?>"
							onkeyup="mascara(this,'-',patron_telefono,true)" maxlength="9"
							onKeyPress="return Guarda_Fax_Conf(event,'txt_fax','tab_configuracion','Fax_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_fax','campo_fax','')" />
						</span>
				
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Correo_electronico']?>: </td>
					<td id="td_correo">
						<span id="etiqueta_correo" name="etiqueta_correo" onclick="ActivaEdicion('etiqueta_correo','campo_correo','txt_correo',0)" ><?=$Email_Conf?></span>
						<span id="campo_correo" name="campo_correo"  style="display: none;">
							<input type="text" id="txt_correo" name="txt_correo" class="width350" value="<?=$Email_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Correo'] ?>"
							onKeyPress="return Guarda_Correo_Conf(event,'txt_correo','tab_configuracion','Email_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_correo','campo_correo','')" />
						</span>
					</td>		
				</tr>
				<!-- ********************************************************************************-->
				<!-- **************************** SISTEMA *******************************************-->
				<!-- ********************************************************************************-->
				<tr >
					<td><?= $texto['Nombre_sistema']?>: </td>
					<td id="td_nombre_sistema">
						<span id="etiqueta_nombre_sistema" name="etiqueta_nombre_sistema" onclick="ActivaEdicion('etiqueta_nombre_sistema','campo_nombre_sistema','txt_nombre_sistema',0)" ><?=$Nombre_Conf?></span>
						<span id="campo_nombre_sistema" name="campo_nombre_sistema"  style="display: none;">
							<input type="text" id="txt_nombre_sistema" name="txt_nombre_sistema" class="width300" value="<?=$Nombre_Conf?>" maxlength="200" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre'] ?>"
							onKeyPress="Guarda_Nombre_Sistema(event,'txt_nombre_sistema','tab_configuracion','Nombre_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_nombre_sistema','campo_nombre_sistema','')" />
						</span>
					</td>		
				</tr>
				<tr >
					<td><?= $texto['Nombre_resumen']?>: </td>
					<td id="td_nombre_resumen">
						<span id="etiqueta_nombre_resumen" name="etiqueta_nombre_resumen" onclick="ActivaEdicion('etiqueta_nombre_resumen','campo_nombre_resumen','txt_nombre_resumen',0)" ><?=$Nombre_Resumen_Conf?></span>
						<span id="campo_nombre_resumen" name="campo_nombre_resumen"  style="display: none;">
							<input type="text" id="txt_nombre_resumen" name="txt_nombre_resumen" class="width100" value="<?=$Nombre_Resumen_Conf?>" maxlength="20" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre'] ?>"
							onKeyPress="Guarda_Nombre_Resumen(event,'txt_nombre_resumen','tab_configuracion','Nombre_Resumen_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_nombre_resumen','campo_nombre_resumen','')" />
						</span>
					</td>		
				</tr>
				<tr >
					<td><?=$texto['Titulo_Bienvenida']?>: </td>
					<td id="td_bienvenida">
						<span id="etiqueta_bienvenida" name="etiqueta_bienvenida" onclick="ActivaEdicion('etiqueta_bienvenida','campo_bienvenida','txt_bienvenida',0)" ><?=$Titulo_Bienvenida_Conf?></span>
						<span id="campo_bienvenida" name="campo_bienvenida"  style="display: none;">
							<input type="text" id="txt_bienvenida" name="txt_bienvenida" class="width400" value="<?=$Titulo_Bienvenida_Conf?>" maxlength="200" placeholder="<?=$texto['PLACEHOLDER_Digite_Titulo_Bienvenida'] ?>"
							onKeyPress="Guarda_Bienvenida(event,'txt_bienvenida','tab_configuracion','Titulo_Bienvenida_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_bienvenida','campo_bienvenida','')" />
						</span>
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Nombre_session']?>: </td>
					<td id="td_nombre_session">
						<span id="etiqueta_session" name="etiqueta_session" onclick="ActivaEdicion('etiqueta_session','campo_session','txt_session',0)" ><?=$Nombre_Session_Conf?></span>
						<span id="campo_session" name="campo_session"  style="display: none;">
							<input type="text" id="txt_session" name="txt_session" class="width100" value="<?=$Nombre_Session_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre_Sesion'] ?>"
							onKeyPress="Guarda_Session_Conf(event,'txt_session','tab_configuracion','Nombre_Session_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_session','campo_session','')" />
						</span>	
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Tiempo_session']?>: </td>
					<td id="td_tiempo_session">
						<span id="etiqueta_tiempo_session" name="etiqueta_tiempo_session" onclick="ActivaEdicion('etiqueta_tiempo_session','campo_tiempo_session','txt_tiempo_session',0)" ><?=$Tiempo_Session_Conf?> segundos</span>
						<span id="campo_tiempo_session" name="campo_tiempo_session"  style="display: none;">
							<input type="text" id="txt_tiempo_session" name="txt_tiempo_session" class="width80" maxlength="8" value="<?=$Tiempo_Session_Conf?>" placeholder="<?=$texto['PLACEHOLDER_Tiempo'] ?>"
							onKeyPress="return GuardaMedida_TS(event,'txt_tiempo_session','tab_configuracion','Tiempo_Session_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_tiempo_session','campo_tiempo_session',' segundos')" />segundos &nbsp;
						</span>
					</td>		
				</tr>
				<tr >
					<td><?=$texto['Nombre_dominio']?>: </td>
					<td id="td_dominio">
						<span id="etiqueta_dominio" name="etiqueta_dominio" onclick="ActivaEdicion('etiqueta_dominio','campo_dominio','txt_dominio',0)" ><?=$Direccion_Web_Conf?></span>
						<span id="campo_dominio" name="campo_dominio"  style="display: none;">
							<input type="text" id="txt_dominio" name="txt_dominio" class="width350" value="<?=$Direccion_Web_Conf?>" maxlength="200" placeholder="<?=$texto['PLACEHOLDER_Digite_Dominio'] ?>"
							onKeyPress="Guarda_Dominio_Conf(event,'txt_dominio','tab_configuracion','Direccion_Web_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_dominio','campo_dominio','')" />
						</span>
					</td>		
				</tr>
				<tr >
					<td><?=$texto['Carpeta_sistema']?>: </td>
					<td id="td_carpeta">
						<span id="etiqueta_carpeta" name="etiqueta_carpeta" onclick="ActivaEdicion('etiqueta_carpeta','campo_carpeta','txt_carpeta',0); habilitaBtnVerificaCarpeta('1');" ><?=$Direccion_Carpeta_Conf?></span>
						<span id="campo_carpeta" name="campo_carpeta"  style="display: none;">
							<input type="text" id="txt_carpeta" name="txt_carpeta" class="width350" value="<?=$Direccion_Carpeta_Conf?>" maxlength="200" placeholder="<?=$texto['PLACEHOLDER_Digite_Carpeta'] ?>"
							onKeyPress="Guarda_Carpeta_Conf(event,'txt_carpeta','tab_configuracion','Direccion_Carpeta_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_carpeta','campo_carpeta','')" />
						</span>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="boton" onclick="Verificar_Carpeta()"  disabled="disabled" id="btn_verifica_carpeta" name="btn_verifica_carpeta">Verificar Dirección</button>
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Llave_encriptacion']?>: </td>
					<td id="td_llave">
						<span id="etiqueta_llave" name="etiqueta_llave" onclick="ActivaEdicion('etiqueta_llave','campo_llave','txt_llave',0)" ><?=$Llave_Encriptacion_Conf?></span>
						<span id="campo_llave" name="campo_llave"  style="display: none;">
							<input type="text" id="txt_llave" name="txt_llave" class="width150" value="<?=$Llave_Encriptacion_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Clave_Encriptación'] ?>"
							onKeyPress="Guarda_Llave_Conf(event,'txt_llave','tab_configuracion','Llave_Encriptacion_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_llave','campo_llave','')" />
						</span>
					</td>		
				</tr>
				<tr>
					<td><?=$texto['Nivel_ubicacion']?>: </td>
					<td id="td_nivel_ubicacion">
						<select name="ubicacion" id="ubicacion" onchange="Guarda_Nivel_Ubicacion_Conf('ubicacion')">
							<option value="1" <?php if($Nivel_Ubicacion_Conf == '1'){ echo 'selected'; } ?>><?=$texto['Paises']?></option>
							<option value="2" <?php if($Nivel_Ubicacion_Conf == '2'){ echo 'selected'; } ?>><?=$texto['Provincias']?></option>
							<option value="3" <?php if($Nivel_Ubicacion_Conf == '3'){ echo 'selected'; } ?>><?=$texto['Cantones']?></option>
							<option value="4" <?php if($Nivel_Ubicacion_Conf == '4'){ echo 'selected'; } ?>><?=$texto['Distritos']?></option>
						</select>
					</td>		
				</tr>
				<tr id="td_cant_registros">
					<td><?=$texto['Cantidad_Registros']?>: </td>
					<td >
						<span id="etiqueta_cant_registros" name="etiqueta_cant_registros" onclick="ActivaEdicion('etiqueta_cant_registros','campo_cant_registros','txt_cant_registros',0)" ><?=$Cantidad_Registros_Conf?><?= $texto['X_pagina']?></span>
						<span id="campo_cant_registros" name="campo_cant_registros"  style="display: none;">
							<input type="text" id="txt_cant_registros" name="txt_cant_registros" class="width80" maxlength="3" value="<?=$Cantidad_Registros_Conf?>" placeholder="<?=$texto['PLACEHOLDER_Cantidad'] ?>"
							onKeyPress="return GuardaCantidad_Registros_Conf(event,'txt_cant_registros','tab_configuracion','Cantidad_Registros_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_cant_registros','campo_cant_registros','<?= $texto['X_pagina']?>')" /><?= $texto['X_pagina']?>
						</span>
					</td>		
				</tr>
				
				<tr>
					<td><?=$texto['Perm_Ins_Emp']?>:</td>
					<td id="td_PIEMP">
						<?php
							if($Permitir_Inscripcion_Empr_Conf=='0'){
								$marcado = "";
							}elseif($Permitir_Inscripcion_Empr_Conf=='1'){
								$marcado = 'checked="checked"';
							}
						?>
						<input id="ch_permitir_Ins_Emp" class="cmn-toggle cmn-toggle-round" type="checkbox" <?=$marcado?>
						onclick="Guarda_Checkbox(this,'tab_configuracion','Permitir_Inscripcion_Empr_Conf','Modulos/SAE/Genericos/ajax_guarda_checkbox.php')"/>
						<label for="ch_permitir_Ins_Emp"></label>
						
					</td>
				</tr>
                <tr id="td_Ins_Emp">
					<td><?=$texto['Titulo_Inscripcion_Empresa']?>: </td>
					<td>
						<span id="etiqueta_TI_Emp" name="etiqueta_TI_Emp" onclick="ActivaEdicion('etiqueta_TI_Emp','campo_TI_Emp','txt_TI_Emp',0)" ><?=$Titulo_Inscripcion_Emp_Conf?></span>
						<span id="campo_TI_Emp" name="campo_TI_Emp"  style="display: none;">
							<input type="text" id="txt_TI_Emp" name="txt_TI_Emp" class="width400" value="<?=$Titulo_Inscripcion_Emp_Conf?>" maxlength="200" placeholder="<?=$texto['PLACEHOLDER_Digite_Titulo'] ?>"
							onKeyPress="Guarda_Titulo_Inscripcion_Emp(event,'txt_TI_Emp','tab_configuracion','Titulo_Inscripcion_Emp_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_TI_Emp','campo_TI_Emp','')" />
						</span>
					</td>		
				</tr>
                <tr>
					<td><?=$texto['Perfil_defecto_emp']?>: </td>
					<td id="td_perfil_emp">
						<select name="perfiles_emp" id="perfiles_emp" onchange="Guarda_Perfil_Default_Conf('perfiles_emp','Emp')">
							<?php
								$sql = "SELECT Id_Rol, Nombre_Rol FROM tab_roles WHERE Activo_Rol = '1' AND Id_Rol != 1 AND Id_Rol != 2 ORDER BY Nombre_Rol";
								$roles = seleccion($sql);
								
								
								for($i=0;$i<count($roles);$i++){
									echo("<option value='".$roles[$i]["Id_Rol"]."'");
										if($roles[$i]["Id_Rol"]==$Id_Rol_Emp_Conf){
											echo(" selected='selected'");
										}
										
									echo(" >".$roles[$i]["Nombre_Rol"]."</option>");
								}
							?>
						</select>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Plantilla_Inscripcion_defecto_emp']?>: </td>
					<td id="td_plantilla_inscripcion_emp">
						<select name="PI_emp" id="PI_emp" onchange="Guarda_PI_Conf('PI_emp','Emp'); Cambia_imagen_PI('PI_emp','thumb_PI_Emp');">
							<?php
								$sql = "SELECT Id_PI, Nombre_PI, Direccion_PI,Imagen_PI FROM tab_plantillas_inscripcion ORDER BY Nombre_PI";
								$PI = seleccion($sql);
								
								
								for($i=0;$i<count($PI);$i++){
									echo("<option value='".$PI[$i]["Id_PI"]."'");
										if($PI[$i]["Id_PI"]==$Id_PI_Emp_Conf){
											echo(" selected='selected'");
                                            $imagen = $PI[$i]['Imagen_PI'];
										}
										
									echo(" >".$PI[$i]["Nombre_PI"]."</option>");
								}
							?>
						</select>
					</td>	
				</tr>
                <tr id="tr_pi_emp">
                    <td><?=$texto['Demo_Plantilla']?>: </td>
                    <td>
                        <img src="<?=$imagen?>" class="ancho100" id="thumb_PI_Emp">
                    </td>
                </tr>
                
                
                
                
                
                
                
                
				<tr>
					<td><?=$texto['Perm_Ins_Est']?>:</td>
					<td id="td_PIEST">
						<?php
							if($Permitir_Inscripcion_Estu_Conf=='0'){
								$marcado = "";
						}elseif($Permitir_Inscripcion_Estu_Conf=='1'){
								$marcado = 'checked="checked"';
							}
						?>
						<input id="ch_permitir_Ins_Est" class="cmn-toggle cmn-toggle-round" type="checkbox" <?=$marcado?>
						onclick="Guarda_Checkbox(this,'tab_configuracion','Permitir_Inscripcion_Estu_Conf','Modulos/SAE/Genericos/ajax_guarda_checkbox.php')"/>
						<label for="ch_permitir_Ins_Est"></label>
					</td>
				</tr>
                <tr id="td_Ins_Estu">
					<td><?=$texto['Titulo_Inscripcion_Estudiante']?>: </td>
					<td>
						<span id="etiqueta_TI_Estu" name="etiqueta_TI_Estu" onclick="ActivaEdicion('etiqueta_TI_Estu','campo_TI_Estu','txt_TI_Estu',0)" ><?=$Titulo_Inscripcion_Estu_Conf?></span>
						<span id="campo_TI_Estu" name="campo_TI_Estu"  style="display: none;">
							<input type="text" id="txt_TI_Estu" name="txt_TI_Estu" class="width400" value="<?=$Titulo_Inscripcion_Estu_Conf?>" maxlength="200" placeholder="<?=$texto['PLACEHOLDER_Digite_Titulo'] ?>"
							onKeyPress="Guarda_Titulo_Inscripcion_Estu(event,'txt_TI_Estu','tab_configuracion','Titulo_Inscripcion_Estu_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_TI_Estu','campo_TI_Estu','')" />
						</span>
					</td>		
				</tr>
                <tr>
					<td><?=$texto['Perfil_defecto_estu']?>: </td>
					<td id="td_perfil_estu">
						<select name="perfiles_estu" id="perfiles_estu" onchange="Guarda_Perfil_Default_Conf('perfiles_estu','Estu')">
							<?php
								$sql = "SELECT Id_Rol, Nombre_Rol FROM tab_roles WHERE Activo_Rol = '1' AND Id_Rol != 1 AND Id_Rol != 2 ORDER BY Nombre_Rol";
								$roles = seleccion($sql);
								
								
								for($i=0;$i<count($roles);$i++){
									echo("<option value='".$roles[$i]["Id_Rol"]."'");
										if($roles[$i]["Id_Rol"]==$Id_Rol_Estu_Conf){
											echo(" selected='selected'");
										}
										
									echo(" >".$roles[$i]["Nombre_Rol"]."</option>");
								}
							?>
						</select>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Plantilla_Inscripcion_defecto_estu']?>: </td>
					<td id="td_plantilla_inscripcion_estu">
						<select name="PI_estu" id="PI_estu" onchange="Guarda_PI_Conf('PI_estu','Estu'); Cambia_imagen_PI('PI_estu','thumb_PI_Estu');">
							<?php
								$sql = "SELECT Id_PI, Nombre_PI, Direccion_PI,Imagen_PI FROM tab_plantillas_inscripcion ORDER BY Nombre_PI";
								$PI = seleccion($sql);
								
								
								for($i=0;$i<count($PI);$i++){
									echo("<option value='".$PI[$i]["Id_PI"]."'");
										if($PI[$i]["Id_PI"]==$Id_PI_Estu_Conf){
											echo(" selected='selected'");
                                            $imagen = $PI[$i]['Imagen_PI'];
										}
										
									echo(" >".$PI[$i]["Nombre_PI"]."</option>");
								}
							?>
						</select>
					</td>	
				</tr>
                <tr id="tr_pi_estu">
                    <td><?=$texto['Demo_Plantilla']?>: </td>
                    <td>
                        <img src="<?=$imagen?>" class="ancho100" id="thumb_PI_Estu">
                    </td>
                </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
				<tr>
					<td><?=$texto['Enviar_Correo_Inscripcion']?>: </td>
					<td id="td_enviar_correo">
						<?php
							if($Enviar_Correo_Inscripcion_Conf=='0'){
								$marcado = "";
						}elseif($Enviar_Correo_Inscripcion_Conf=='1'){
								$marcado = 'checked="checked"';
							}
						?>
						<input id="ch_enviar_correo" class="cmn-toggle cmn-toggle-round" type="checkbox" <?=$marcado?>
						onclick="Guarda_Checkbox(this,'tab_configuracion','Enviar_Correo_Inscripcion_Conf','Modulos/SAE/Genericos/ajax_guarda_checkbox.php')"/>
						<label for="ch_enviar_correo"></label>
					</td>
				</tr>
                <tr>
					<td><?=$texto['Plantilla_Inscripcion_defecto_Correo']?>: </td>
					<td id="td_plantilla_inscripcion_correo">
						<select name="PI_Correo" id="PI_Correo" onchange="Guarda_PlanCor_Conf('PI_Correo'); Cambia_imagen_PlanCor_Inscripcion('PI_Correo','thumb_PI_Correo');">
							<?php
								$sql = "SELECT Id_PlanCor, Nombre_PlanCor, Direccion_PlanCor,Imagen_PlanCor FROM tab_plantillas_correos WHERE Tipo_PlanCor = '1' ORDER BY Nombre_PlanCor";
								$PlanCor = seleccion($sql);
								
								
								for($i=0;$i<count($PlanCor);$i++){
									echo("<option value='".$PlanCor[$i]["Id_PlanCor"]."'");
										if($PlanCor[$i]["Id_PlanCor"]==$Id_PlanCor_Inscripcion_Conf){
											echo(" selected='selected'");
                                            $imagen = $PlanCor[$i]['Imagen_PlanCor'];
										}
										
									echo(" >".$PlanCor[$i]["Nombre_PlanCor"]."</option>");
								}
							?>
						</select>
					</td>	
				</tr>
                 <tr id="tr_PI_Correo">
                    <td><?=$texto['Demo_Plantilla']?>: </td>
                    <td>
                        <img src="<?=$imagen?>" class="ancho100" id="thumb_PI_Correo">
                    </td>
                </tr>
                <tr>
					<td><?=$texto['Pedir_Grado_Academico']?>: </td>
					<td id="td_pedir_grado">
						<?php
							if($Pedir_Grado_Academico=='0'){
								$marcado = "";
						}elseif($Pedir_Grado_Academico=='1'){
								$marcado = 'checked="checked"';
							}
						?>
						<input id="ch_pedir_GA" class="cmn-toggle cmn-toggle-round" type="checkbox" <?=$marcado?>
						onclick="Guarda_Checkbox(this,'tab_configuracion','Pedir_Grados_Academicos','Modulos/SAE/Genericos/ajax_guarda_checkbox.php')"/>
						<label for="ch_pedir_GA"></label>
					</td>
				</tr>
                <tr>
					<td><?=$texto['Pedir_Fecha_Nacimiento']?>: </td>
					<td id="td_pedir_FN">
						<?php
							if($Pedir_Fecha_Nacimiento=='0'){
								$marcado = "";
						}elseif($Pedir_Fecha_Nacimiento=='1'){
								$marcado = 'checked="checked"';
							}
						?>
						<input id="ch_pedir_FN" class="cmn-toggle cmn-toggle-round" type="checkbox" <?=$marcado?>
						onclick="Guarda_Checkbox(this,'tab_configuracion','Pedir_Fecha_Nacimiento','Modulos/SAE/Genericos/ajax_guarda_checkbox.php')"/>
						<label for="ch_pedir_FN"></label>
					</td>
				</tr>
				<tr>
					<td><?=$texto['Usar_LDAP']?>: </td>
					<td id="td_usar_ldap">
						<?php
							if($LDAP_Conf=='0'){
								$marcado = "";
						}elseif($LDAP_Conf=='1'){
								$marcado = 'checked="checked"';
							}
						?>
						<input id="ch_ldap" class="cmn-toggle cmn-toggle-round" type="checkbox" <?=$marcado?>
						onclick="Guarda_Checkbox(this,'tab_configuracion','LDAP_Conf','Modulos/SAE/Genericos/ajax_guarda_checkbox.php')"/>
						<label for="ch_ldap"></label>
					</td>
				</tr>
				<tr>
					<tr>
					<td><?=$texto['IP_LDAP']?>: </td>
					<td id="td_ip_ldap">
						<span id="etiqueta_ip_ldap" name="etiqueta_ip_ldap" onclick="ActivaEdicion('etiqueta_ip_ldap','campo_ip_ldap','txt_ip_ldap',0)" ><?=$IP_LDAP_Conf?></span>
						<span id="campo_ip_ldap" name="campo_ip_ldap"  style="display: none;">
							<input type="text" id="txt_ip_ldap" name="txt_ip_ldap" class="width150" value="<?=$IP_LDAP_Conf?>" maxlength="15" placeholder="<?=$texto['PLACEHOLDER_IP'] ?>"
							onKeyPress="Guarda_IP_LDAP(event,'txt_ip_ldap','tab_configuracion','IP_LDAP_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_ip_ldap','campo_ip_ldap','')" />
						</span>
					</td>	
				</tr>
				<tr>
					<td><?=$texto['Cadena_LDAP']?>: </td>
					<td id="td_cadena_ldap">
						<span id="etiqueta_cadena_ldap" name="etiqueta_cadena_ldap" onclick="ActivaEdicion('etiqueta_cadena_ldap','campo_cadena_ldap','txt_cadena_ldap',0)" ><?=$Cadena_LDAP_Conf?></span>
						<span id="campo_cadena_ldap" name="campo_cadena_ldap"  style="display: none;">
							<input type="text" id="txt_cadena_ldap" name="txt_cadena_ldap" class="width300" value="<?=$Cadena_LDAP_Conf?>" maxlength="200" placeholder="<?=$texto['PLACEHOLDER_Digite_Cadena'] ?>"
							onKeyPress="Guarda_IP_LDAP(event,'txt_cadena_ldap','tab_configuracion','Cadena_LDAP_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_cadena_ldap','campo_cadena_ldap','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Direccion_Facebook']?>: </td>
					<td id="td_direccion_facebook">
						<span id="etiqueta_direccion_facebook" name="etiqueta_direccion_facebook" onclick="ActivaEdicion('etiqueta_direccion_facebook','campo_direccion_facebook','txt_direccion_facebook',0)" ><?=$Direccion_Facebook_Conf?></span>
						<span id="campo_direccion_facebook" name="campo_direccion_facebook"  style="display: none;">
							<input type="text" id="txt_direccion_facebook" name="txt_direccion_facebook" class="width300" value="<?=$Direccion_Facebook_Conf?>" maxlength="300" placeholder="<?=$texto['PLACEHOLDER_Digite_Direccion_Facebook'] ?>"
							onKeyPress="Guarda_Direccion_Facebook(event,'txt_direccion_facebook','tab_configuracion','Direccion_Facebook_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_direccion_facebook','campo_direccion_facebook','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Usuario_Facebook']?>: </td>
					<td id="td_usuario_facebook">
						<span id="etiqueta_usuario_facebook" name="etiqueta_usuario_facebook" onclick="ActivaEdicion('etiqueta_usuario_facebook','campo_usuario_facebook','txt_usuario_facebook',0)" ><?=$Usuario_Facebook_Conf?></span>
						<span id="campo_usuario_facebook" name="campo_usuario_facebook"  style="display: none;">
							<input type="text" id="txt_usuario_facebook" name="txt_usuario_facebook" class="width300" value="<?=$Usuario_Facebook_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Usuario_Facebook'] ?>"
							onKeyPress="Guarda_Usuario_Facebook(event,'txt_usuario_facebook','tab_configuracion','Usuario_Facebook_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_usuario_facebook','campo_usuario_facebook','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Password_Facebook']?>: </td>
					<td id="td_password_facebook">
						<span id="etiqueta_password_facebook" name="etiqueta_password_facebook" onclick="ActivaEdicion('etiqueta_password_facebook','campo_password_facebook','txt_password_facebook',0)" ><?=$Password_Facebook_Conf?></span>
						<span id="campo_password_facebook" name="campo_password_facebook"  style="display: none;">
							<input type="password" id="txt_password_facebook" name="txt_password_facebook" class="width300" value="<?=$Password_Facebook_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena_Facebook'] ?>"
							onKeyPress="Guarda_Password_Facebook(event,'txt_password_facebook','tab_configuracion','Password_Facebook_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_password_facebook','campo_password_facebook','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Direccion_Twitter']?>: </td>
					<td id="td_direccion_twitter">
						<span id="etiqueta_direccion_twitter" name="etiqueta_direccion_twitter" onclick="ActivaEdicion('etiqueta_direccion_twitter','campo_direccion_twitter','txt_direccion_twitter',0)" ><?=$Direccion_Twitter_Conf?></span>
						<span id="campo_direccion_twitter" name="campo_direccion_twitter"  style="display: none;">
							<input type="text" id="txt_direccion_twitter" name="txt_direccion_twitter" class="width300" value="<?=$Direccion_Twitter_Conf?>" maxlength="300" placeholder="<?=$texto['PLACEHOLDER_Digite_Direccion_Twitter'] ?>"
							onKeyPress="Guarda_Direccion_Twitter(event,'txt_direccion_twitter','tab_configuracion','Direccion_Twitter_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_direccion_twitter','campo_direccion_twitter','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Usuario_Twitter']?>: </td>
					<td id="td_usuario_twitter">
						<span id="etiqueta_usuario_twitter" name="etiqueta_usuario_twitter" onclick="ActivaEdicion('etiqueta_usuario_twitter','campo_usuario_twitter','txt_usuario_twitter',0)" ><?=$Usuario_Twitter_Conf?></span>
						<span id="campo_usuario_twitter" name="campo_usuario_twitter"  style="display: none;">
							<input type="text" id="txt_usuario_twitter" name="txt_usuario_twitter" class="width300" value="<?=$Usuario_Twitter_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Usuario_Twitter'] ?>"
							onKeyPress="Guarda_Usuario_Twitter(event,'txt_usuario_twitter','tab_configuracion','Usuario_Twitter_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_usuario_twitter','campo_usuario_twitter','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Password_Twitter']?>: </td>
					<td id="td_password_twitter">
						<span id="etiqueta_password_twitter" name="etiqueta_password_twitter" onclick="ActivaEdicion('etiqueta_password_twitter','campo_password_twitter','txt_password_twitter',0)" ><?=$Password_Twitter_Conf?></span>
						<span id="campo_password_twitter" name="campo_password_twitter"  style="display: none;">
							<input type="password" id="txt_password_twitter" name="txt_password_twitter" class="width300" value="<?=$Password_Twitter_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena_Twitter'] ?>"
							onKeyPress="Guarda_Password_Twitter(event,'txt_password_twitter','tab_configuracion','Password_Twitter_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_password_twitter','campo_password_twitter','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Direccion_Google_Plus']?>: </td>
					<td id="td_direccion_google_plus">
						<span id="etiqueta_direccion_google_plus" name="etiqueta_direccion_google_plus" onclick="ActivaEdicion('etiqueta_direccion_google_plus','campo_direccion_google_plus','txt_direccion_google_plus',0)" ><?=$Direccion_GooglePlus_Conf?></span>
						<span id="campo_direccion_google_plus" name="campo_direccion_google_plus"  style="display: none;">
							<input type="text" id="txt_direccion_google_plus" name="txt_direccion_google_plus" class="width300" value="<?=$Direccion_GooglePlus_Conf?>" maxlength="300" placeholder="<?=$texto['PLACEHOLDER_Digite_Direccion_Google_Plus'] ?>"
							onKeyPress="Guarda_Direccion_Google_Plus(event,'txt_direccion_google_plus','tab_configuracion','Direccion_GooglePlus_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_direccion_google_plus','campo_direccion_google_plus','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Usuario_Google_Plus']?>: </td>
					<td id="td_usuario_google_plus">
						<span id="etiqueta_usuario_google_plus" name="etiqueta_usuario_google_plus" onclick="ActivaEdicion('etiqueta_usuario_google_plus','campo_usuario_google_plus','txt_usuario_google_plus',0)" ><?=$Usuario_GooglePlus_Conf?></span>
						<span id="campo_usuario_google_plus" name="campo_usuario_google_plus"  style="display: none;">
							<input type="text" id="txt_usuario_google_plus" name="txt_usuario_google_plus" class="width300" value="<?=$Usuario_GooglePlus_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Usuario_Google_Plus'] ?>"
							onKeyPress="Guarda_Usuario_Google_Plus(event,'txt_usuario_google_plus','tab_configuracion','Usuario_GooglePlus_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_usuario_google_plus','campo_usuario_google_plus','')" />
						</span>
					</td>	
				</tr>
                <tr>
					<td><?=$texto['Password_Google_Plus']?>: </td>
					<td id="td_password_google_plus">
						<span id="etiqueta_password_google_plus" name="etiqueta_password_google_plus" onclick="ActivaEdicion('etiqueta_password_google_plus','campo_password_google_plus','txt_password_google_plus',0)" ><?=$Password_GooglePlus_Conf?></span>
						<span id="campo_password_google_plus" name="campo_password_google_plus"  style="display: none;">
							<input type="password" id="txt_password_google_plus" name="txt_password_google_plus" class="width300" value="<?=$Password_GooglePlus_Conf?>" maxlength="60" placeholder="<?=$texto['PLACEHOLDER_Digite_Contrasena_Google_Plus'] ?>"
							onKeyPress="Guarda_Password_Google_Plus(event,'txt_password_google_plus','tab_configuracion','Password_GooglePlus_Conf','Modulos/SAE/Genericos/ajax_guarda_TXT.php','etiqueta_password_google_plus','campo_password_google_plus','')" />
						</span>
					</td>	
				</tr>
			</table>
		</div>


<br />
<script>
	<?php if($mostrar_efecto==1) { ?>
	
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	
	<?php } ?>
		  //Ayuda Logo Imagen
		 $('#archivo_logo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Logo_Empresa_Conf']?>"
		  });
		 $('#td_mostrar_logo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Mostrar_Logo_Conf']?>"
		  });
		 $('#td_ancho_logo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Ancho_Logo_Conf']?>"
		  });
		 $('#td_alto_logo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Alto_Logo_Conf']?>"
		  });
		 $('#td_nombre_empresa').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nombre_Empresa_Conf']?>"
		  });
		 $('#td_quienes').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Quienes_Conf']?>"
		  });
		 $('#td_pais').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Pais_Conf']?>"
		  });
		 $('#td_direccion').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Direccion_Conf']?>"
		  });
		 $('#td_telefono').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Telefono_Conf']?>"
		  });
		 $('#td_fax').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Fax_Conf']?>"
		  });
		 $('#td_correo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Correo_Conf']?>"
		  });
		 $('#td_nombre_sistema').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nombre_Sistema_Conf']?>"
		  });
		 $('#td_nombre_resumen').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Diminutivo_Sistema_Conf']?>"
		  });
		 $('#td_bienvenida').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Titulo_Bienvenida_Conf']?>"
		  });
		 $('#td_nombre_session').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nombre_Sesion_Conf']?>"
		  });
		 $('#td_tiempo_session').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Tiempo_Sesion_Conf']?>"
		  });
		 $('#td_dominio').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Dominio_Conf']?>"
		  });
		 $('#td_carpeta').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Carpeta_Conf']?>"
		  });
		 $('#td_llave').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Llave_Conf']?>"
		  });
		 $('#td_nivel_ubicacion').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nivel_Ubicacion_Conf']?>"
		  });
		 $('#td_cant_registros').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Cantidad_Registros_Conf']?>"
		  });
		 $('#td_perfil_emp').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Perfil_Defecto_Emp_Conf']?>"
		  });
         $('#td_perfil_estu').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Perfil_Defecto_Estu_Conf']?>"
		  });
         $('#td_Ins_Emp').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Titulo_Inscripcion_Emp_Conf']?>"
		  });
         $('#td_Ins_Estu').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Titulo_Inscripcion_Estu_Conf']?>"
		  });
         
         $('#td_plantilla_inscripcion_emp').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Plantilla_Inscripcion_Emp_Conf']?>"
		  });
         $('#tr_pi_emp').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Demo_Plantilla_Inscripcion_Emp_Conf']?>"
		  });
         $('#td_plantilla_inscripcion_estu').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Plantilla_Inscripcion_Estu_Conf']?>"
		  });
          $('#tr_pi_estu').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Demo_Plantilla_Inscripcion_Estu_Conf']?>"
		  });
         
         
		 $('#td_PIEMP').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Permitir_Empr_Conf']?>"
		  });
		 $('#td_PIEST').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Permitir_Estu_Conf']?>"
		  });
		 
		  $('#td_enviar_correo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Enviar_Correo_Conf']?>"
		  });
          $('#td_plantilla_inscripcion_correo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Plantilla_Inscripcion_Correo_Conf']?>"
		  });
          $('#tr_PI_Correo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Demo_Plantilla_Inscripcion_Correo_Conf']?>"
		  });
		 $('#td_usar_ldap').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Utilizar_LDAP_Conf']?>"
		  });
		 $('#td_ip_ldap').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_IP_LDAP_Conf']?>"
		  });
		 $('#td_cadena_ldap').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Cadena_LDAP_Conf']?>"
		  });
          $('#td_pedir_grado').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Pedir_Grado_Academico_Conf']?>"
		  });
          $('#td_pedir_FN').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Pedir_Fecha_Nacimiento_Conf']?>"
		  });
          
          $('#td_direccion_facebook').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Direccion_Facebook_Conf']?>"
		  });
          $('#td_usuario_facebook').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Usuario_Facebook_Conf']?>"
		  });
          $('#td_password_facebook').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Password_Facebook_Conf']?>"
		  });
        
            $('#td_direccion_twitter').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Direccion_Twitter_Conf']?>"
		  });
          $('#td_usuario_twitter').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Usuario_Twitter_Conf']?>"
		  });
          $('#td_password_twitter').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Password_Twitter_Conf']?>"
		  });
          
          $('#td_direccion_google_plus').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Direccion_Google_Plus_Conf']?>"
		  });
          $('#td_usuario_google_plus').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Usuario_Google_Plus_Conf']?>"
		  });
          $('#td_password_google_plus').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Password_Google_Plus_Conf']?>"
		  });
        
        
        
        
        
                
                
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>
<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>