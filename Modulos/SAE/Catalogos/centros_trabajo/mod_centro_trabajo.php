<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto      		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$Id_CT      		= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '';
	$or_nom_ct 		= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_nom_ct_tipo 	= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	$bs_nom_ct			= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$or_dim_ct 		= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_dim_ct_tipo 	= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : '';
	
	
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
	
	
	
	/**************************SQL Principal********************************/
	$sql = "SELECT Nombre_CT, Diminutivo_CT, Logo_CT, Telefono_CT, Fax_CT, Direccion_CT, Correo_CT, Latitud_CT, Longitud_CT FROM tab_centros_trabajos WHERE Id_CT = ".$Id_CT;
	$res = seleccion($sql);
	$tamanoTextArea=350-strlen($res[0]['Direccion_CT']);
	
	$Logo_CT= (isset($res[0]['Logo_CT'])) ? $res[0]['Logo_CT'] : '';
	/***************************************************************************/
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_CT" name="Id_CT" value="<?= $Id_CT?>" />
	<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
	<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
	<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />
	<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />
	<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
	<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />

	
	<div id="Titulo_Adentro">
		<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Modificar_CT'] ?></span>
	</div>
	<div>
		<!-- ****************************************************************************************** -->
		<!-- **************************       FORM         ******************************************** -->
		<!-- ****************************************************************************************** -->
			<table class="centrado width550 font09" >
				<tr><th colspan="2" class="centrado blanco fondo_azul linea_abajo_blanca"><?=$texto['Por_Favor_Complete']?> </th></tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Logo_Empresa']?>: </td>
					<td   class="centrado ">
						<?php
							if($Logo_CT==''){
								$imagen = $dominio.$ruta."img/Logo/ugit.png";
								$real = "ugit.png";
							}else{
								$imagen = $dominio.$ruta."img/Centros_Trabajo/$Logo_CT";
								$real = $Logo_CT;
							}
						?>
						<input type="hidden" id="archivo_logo_original" name="archivo_logo_original" value="<?=$Logo_CT?>" />
						<input type="file" id="file_logo_CT" name="file_logo_CT" class="dropify" 
							   data-default-file="<?=$imagen?>" data-height="150" data-max-file-size="1M" onchange="Modificar_Logo()"/>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Nombre']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_nombre_CT" id="txt_nombre_CT"  maxlength="200" value="<?=$res[0]['Nombre_CT']?>" onKeyPress="return CT_ENTER_soloTexto(event)" />
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Diminutivo']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_diminutivo_CT" id="txt_diminutivo_CT"  maxlength="45" onKeyUp="return Convierte_Mayuscula(id)" onKeyPress="return CT_ENTER_soloTexto(event)" value="<?=$res[0]['Diminutivo_CT']?>"/> 
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Telefono']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_telefono_CT" id="txt_telefono_CT"  maxlength="9" onKeyPress="return soloNumeros(event)" onkeyup="mascara(this,'-',patron_telefono,true)" value="<?=$res[0]['Telefono_CT']?>"/>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Fax']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_fax_CT" id="txt_fax_CT"  maxlength="9" onKeyPress="return soloNumeros(event)"  onkeyup="mascara(this,'-',patron_telefono,true)" value="<?=$res[0]['Fax_CT']?>" />
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Direccion']?>:</td>
					<td class="centrado">
						<input readonly type=text name="txt_tam_CT" id="txt_tam_CT" size=3 maxlength=3 value="<?=$tamanoTextArea?>" class="width50 gris">
						<br />
						<textarea id="txt_direccion_CT" name="txt_direccion_CT" class="textArea300"
						onKeyDown="validaCantidadTexArea('txt_direccion_CT','txt_tam_CT',350);"
						onKeyUp="validaCantidadTexArea('txt_direccion_CT','txt_tam_CT',350);"><?=$res[0]['Direccion_CT']?></textarea>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Correo']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_correo_CT" id="txt_correo_CT"  maxlength="100" value="<?=$res[0]['Correo_CT']?>"/>
					</td>
				</tr>
				
			</table>
		<!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
			<br/>
			<br/>
			<div class="centrado">
				<button class="boton" onclick="modificar()" ><?=$texto['Guardar']?></button>
				<button class="boton"  onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php','pagina;inicio;Id_CT;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+<?=$Id_CT?>+';'
								+document.getElementById('bs_nom_ct').value+';'
								+document.getElementById('bs_dim_ct').value+';'
								+document.getElementById('or_nom_ct').value+';'
								+document.getElementById('or_dim_ct').value+';'
								+document.getElementById('or_nom_ct_tipo').value+';'
								+document.getElementById('or_dim_ct_tipo').value+
								';1;');"><?=$texto['Regresar']?>
		</button>
			</div>
		
	</div>
	<!-- ****************************************************************************************** -->
	<!-- **************************     SCRIPT         ******************************************** -->
	<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		
		$('#file_logo_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Logo_CT']?>"
		  });
		
		$('#txt_nombre_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Nombre_CT']?>"
		  });
		
		$('#txt_diminutivo_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Diminutivo_CT']?>"
		  });
		$('#txt_telefono_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Telefono_CT']?>"
		  });
		$('#txt_fax_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Fax_CT']?>"
		  });
		$('#txt_direccion_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Direccion_CT']?>"
		  });
		$('#txt_correo_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Correo_CT']?>"
		  });
		$('#txt_latitud_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Latitud_CT']?>"
		  });
		$('#txt_longitud_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Longitud_CT']?>"
		  });
		
		
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>

	
