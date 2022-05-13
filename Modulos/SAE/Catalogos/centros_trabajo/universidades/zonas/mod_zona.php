<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto      		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$Id_Zon      		= (isset($_GET['Id_Zon'])) ? $_GET['Id_Zon'] : '';
	$Id_Uni      		= (isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : '';
	$Id_CT      		= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '';
	
	$bs_nom_ct			= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : '';
	$bs_nom_uni			= (isset($_GET['bs_nom_uni'])) ? $_GET['bs_nom_uni'] : '';
	$bs_dim_uni		= (isset($_GET['bs_dim_uni'])) ? $_GET['bs_dim_uni'] : '';
	$bs_nom_zon			= (isset($_GET['bs_nom_zon'])) ? $_GET['bs_nom_zon'] : '';
	$bs_dim_zon		= (isset($_GET['bs_dim_zon'])) ? $_GET['bs_dim_zon'] : '';
	
	$or_nom_ct 		= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_dim_ct 		= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_nom_uni 		= (isset($_GET['or_nom_uni'])) ? $_GET['or_nom_uni'] : '';
	$or_dim_uni		= (isset($_GET['or_dim_uni'])) ? $_GET['or_dim_uni'] : '';
	$or_nom_zon 		= (isset($_GET['or_nom_zon'])) ? $_GET['or_nom_zon'] : '';
	$or_dim_zon		= (isset($_GET['or_dim_zon'])) ? $_GET['or_dim_zon'] : '';
	
	$or_nom_ct_tipo 	= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	$or_dim_ct_tipo 	= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	$or_nom_uni_tipo 	= (isset($_GET['or_nom_uni_tipo'])) ? $_GET['or_nom_uni_tipo'] : 'ASC';
	$or_dim_uni_tipo 	= (isset($_GET['or_dim_uni_tipo'])) ? $_GET['or_dim_uni_tipo'] : 'ASC';
	$or_nom_zon_tipo 	= (isset($_GET['or_nom_zon_tipo'])) ? $_GET['or_nom_zon_tipo'] : 'ASC';
	$or_dim_zon_tipo 	= (isset($_GET['or_dim_zon_tipo'])) ? $_GET['or_dim_zon_tipo'] : 'ASC';
	
	
	
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
	$sql = "SELECT Nombre_Zon, Diminutivo_Zon, Logo_Zon, Telefono_Zon, Fax_Zon, Direccion_Zon, Correo_Zon, Latitud_Zon, Longitud_Zon FROM tab_zonas WHERE Id_Zon = ".$Id_Zon;
	$res = seleccion($sql);
	$tamanoTextArea=350-strlen($res[0]['Direccion_Zon']);
	
	$Logo_Zon= (isset($res[0]['Logo_Zon'])) ? $res[0]['Logo_Zon'] : '';
	/***************************************************************************/
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Zon" name="Id_Zon" value="<?=$Id_Zon?>" />
	<input type="hidden" id="Id_CT" name="Id_CT" value="<?= $Id_CT?>" />
	<input type="hidden" id="Id_Uni" name="Id_Uni" value="<?=$Id_Uni?>" />
	
	<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
	<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />
	<input type="hidden" id="bs_nom_uni" name="bs_nom_uni" value="<?=$bs_nom_uni?>" />
	<input type="hidden" id="bs_dim_uni" name="bs_dim_uni" value="<?=$bs_dim_uni?>" />
	<input type="hidden" id="bs_nom_zon" name="bs_nom_zon" value="<?=$bs_nom_zon?>" />
	<input type="hidden" id="bs_dim_zon" name="bs_dim_zon" value="<?=$bs_dim_zon?>" />
	
	<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
	<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
	<input type="hidden" id="or_nom_uni" name="or_nom_ct" value="<?=$or_nom_uni?>" />
	<input type="hidden" id="or_dim_uni" name="or_dim_ct" value="<?=$or_dim_uni?>" />
	<input type="hidden" id="or_nom_zon" name="or_nom_zon" value="<?=$or_nom_zon?>" />
	<input type="hidden" id="or_dim_zon" name="or_dim_zon" value="<?=$or_dim_zon?>" />
	
	<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />
	<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />
	<input type="hidden" id="or_nom_uni_tipo" name="or_nom_uni_tipo" value="<?=$or_nom_uni_tipo?>" />
	<input type="hidden" id="or_dim_uni_tipo" name="or_dim_uni_tipo" value="<?=$or_dim_uni_tipo?>" />
	<input type="hidden" id="or_nom_zon_tipo" name="or_nom_zon_tipo" value="<?=$or_nom_zon_tipo?>" />
	<input type="hidden" id="or_dim_zon_tipo" name="or_dim_zon_tipo" value="<?=$or_dim_zon_tipo?>" />
	
	<div id="Titulo_Adentro">
		<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Modificar_Zon'] ?></span>
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
							if($Logo_Zon==''){
								$imagen = $dominio.$ruta."img/Zonas/ugit.png";
								$real = "ugit.png";
							}else{
								$imagen = $dominio.$ruta."img/Zonas/$Logo_Zon";
								$real = $Logo_Zon;
							}
						?>
						<input type="hidden" id="archivo_logo_original" name="archivo_logo_original" value="<?=$Logo_Zon?>" />
						<input type="file" id="file_logo_Zon" name="file_logo_Zon" class="dropify" 
							   data-default-file="<?=$imagen?>" data-height="150" data-max-file-size="1M" onchange="Modificar_Logo_Zon()"/>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Nombre']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_nombre_Zon" id="txt_nombre_Zon"  maxlength="200" value="<?=$res[0]['Nombre_Zon']?>" onKeyPress="return Zon_ENTER_soloTexto(event)" />
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Diminutivo']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_diminutivo_Zon" id="txt_diminutivo_Zon"  maxlength="45" onKeyUp="return Convierte_Mayuscula(id)" onKeyPress="return Zon_ENTER_soloTexto(event)" value="<?=$res[0]['Diminutivo_Zon']?>"/> 
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Telefono']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_telefono_Zon" id="txt_telefono_Zon"  maxlength="9" onKeyPress="return soloNumeros(event)" onkeyup="mascara(this,'-',patron_telefono,true)" value="<?=$res[0]['Telefono_Zon']?>"/>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Fax']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_fax_Zon" id="txt_fax_Zon"  maxlength="9" onKeyPress="return soloNumeros(event)"  onkeyup="mascara(this,'-',patron_telefono,true)" value="<?=$res[0]['Fax_Zon']?>" />
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Direccion']?>:</td>
					<td class="centrado">
						<input readonly type=text name="txt_tam_Zon" id="txt_tam_Zon" size=3 maxlength=3 value="<?=$tamanoTextArea?>" class="width50 gris">
						<br />
						<textarea id="txt_direccion_Zon" name="txt_direccion_Zon" class="textArea300"
						onKeyDown="validaCantidadTexArea('txt_direccion_Zon','txt_tam_Zon',350);"
						onKeyUp="validaCantidadTexArea('txt_direccion_Zon','txt_tam_Zon',350);"><?=$res[0]['Direccion_Zon']?></textarea>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Correo']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_correo_Zon" id="txt_correo_Zon"  maxlength="100" value="<?=$res[0]['Correo_Zon']?>"/>
					</td>
				</tr>
				
			</table>
		<!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
			<br/>
			<br/>
			<div class="centrado">
				<button class="boton" onclick="modificarZon()" ><?=$texto['Guardar']?></button>
				
				<button class="boton"  onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php','pagina;inicio;Id_CT;Id_Uni;bs_nom_ct;bs_dim_ct;or_nom_ct;or_dim_ct;or_nom_ct_tipo;or_dim_ct_tipo;bs_nom_uni;bs_dim_uni;or_nom_uni;or_nom_uni_tipo;or_dim_uni;or_dim_uni_tipo;mostrar_efecto;',
												'<?=$pagina?>;<?=$inicio?>;'
												+<?=$Id_CT?>+';'+<?=$Id_Uni?>+';'
												+document.getElementById('bs_nom_ct').value+';'
												+document.getElementById('bs_dim_ct').value+';'
												+document.getElementById('or_nom_ct').value+';'
												+document.getElementById('or_dim_ct').value+';'
												+document.getElementById('or_nom_ct_tipo').value+';'
												+document.getElementById('or_dim_ct_tipo').value+';'+
												+document.getElementById('bs_nom_uni').value+';'+
												+document.getElementById('bs_dim_uni').value+';'+
												+document.getElementById('or_nom_uni').value+';'+
												+document.getElementById('or_nom_uni_tipo').value+';'+
												+document.getElementById('or_dim_uni').value+';'+
												+document.getElementById('or_dim_uni_tipo').value+
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
		
		$('#file_logo_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Logo_Zon']?>"
		  });
		
		$('#txt_nombre_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Nombre_Zon']?>"
		  });
		
		$('#txt_diminutivo_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Diminutivo_Zon']?>"
		  });
		$('#txt_telefono_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Telefono_Zon']?>"
		  });
		$('#txt_fax_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Fax_Zon']?>"
		  });
		$('#txt_direccion_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Direccion_Zon']?>"
		  });
		$('#txt_correo_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Correo_Zon']?>"
		  });
		$('#txt_latitud_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Latitud_Zon']?>"
		  });
		$('#txt_longitud_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Longitud_Zon']?>"
		  });
		
		
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>

	
