<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto      		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$Id_SZ      		= (isset($_GET['Id_SZ'])) ? $_GET['Id_SZ'] : '';
	$Id_Zon      		= (isset($_GET['Id_Zon'])) ? $_GET['Id_Zon'] : '';
	$Id_Uni      		= (isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : '';
	$Id_CT      		= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '';
	
	$bs_nom_ct			= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : '';
	$bs_nom_uni			= (isset($_GET['bs_nom_uni'])) ? $_GET['bs_nom_uni'] : '';
	$bs_dim_uni		= (isset($_GET['bs_dim_uni'])) ? $_GET['bs_dim_uni'] : '';
	$bs_nom_zon			= (isset($_GET['bs_nom_zon'])) ? $_GET['bs_nom_zon'] : '';
	$bs_dim_zon		= (isset($_GET['bs_dim_zon'])) ? $_GET['bs_dim_zon'] : '';
	$bs_nom_sz			= (isset($_GET['bs_nom_sz'])) ? $_GET['bs_nom_sz'] : '';
	$bs_dim_sz		= (isset($_GET['bs_dim_sz'])) ? $_GET['bs_dim_sz'] : '';
	
	$or_nom_ct 		= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_dim_ct 		= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_nom_uni 		= (isset($_GET['or_nom_uni'])) ? $_GET['or_nom_uni'] : '';
	$or_dim_uni		= (isset($_GET['or_dim_uni'])) ? $_GET['or_dim_uni'] : '';
	$or_nom_zon 		= (isset($_GET['or_nom_zon'])) ? $_GET['or_nom_zon'] : '';
	$or_dim_zon		= (isset($_GET['or_dim_zon'])) ? $_GET['or_dim_zon'] : '';
	$or_nom_sz 		= (isset($_GET['or_nom_sz'])) ? $_GET['or_nom_sz'] : '';
	$or_dim_sz		= (isset($_GET['or_dim_sz'])) ? $_GET['or_dim_sz'] : '';
	
	$or_nom_ct_tipo 	= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	$or_dim_ct_tipo 	= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	$or_nom_uni_tipo 	= (isset($_GET['or_nom_uni_tipo'])) ? $_GET['or_nom_uni_tipo'] : 'ASC';
	$or_dim_uni_tipo 	= (isset($_GET['or_dim_uni_tipo'])) ? $_GET['or_dim_uni_tipo'] : 'ASC';
	$or_nom_zon_tipo 	= (isset($_GET['or_nom_zon_tipo'])) ? $_GET['or_nom_zon_tipo'] : 'ASC';
	$or_dim_zon_tipo 	= (isset($_GET['or_dim_zon_tipo'])) ? $_GET['or_dim_zon_tipo'] : 'ASC';
	$or_nom_sz_tipo 	= (isset($_GET['or_nom_sz_tipo'])) ? $_GET['or_nom_sz_tipo'] : 'ASC';
	$or_dim_sz_tipo 	= (isset($_GET['or_dim_sz_tipo'])) ? $_GET['or_dim_sz_tipo'] : 'ASC';
	
	
	
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
	$sql = "SELECT Nombre_SZ, Diminutivo_SZ, Telefono_SZ, Fax_SZ, Correo_SZ, Latitud_SZ, Longitud_SZ FROM tab_sub_zona WHERE Id_SZ = ".$Id_SZ;
	$res = seleccion($sql);
	
	/***************************************************************************/
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_SZ" name="Id_SZ" value="<?=$Id_SZ?>" />
	<input type="hidden" id="Id_Zon" name="Id_Zon" value="<?=$Id_Zon?>" />
	<input type="hidden" id="Id_CT" name="Id_CT" value="<?= $Id_CT?>" />
	<input type="hidden" id="Id_Uni" name="Id_Uni" value="<?=$Id_Uni?>" />
	
	<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
	<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />
	<input type="hidden" id="bs_nom_uni" name="bs_nom_uni" value="<?=$bs_nom_uni?>" />
	<input type="hidden" id="bs_dim_uni" name="bs_dim_uni" value="<?=$bs_dim_uni?>" />
	<input type="hidden" id="bs_nom_zon" name="bs_nom_zon" value="<?=$bs_nom_zon?>" />
	<input type="hidden" id="bs_dim_zon" name="bs_dim_zon" value="<?=$bs_dim_zon?>" />
	<input type="hidden" id="bs_nom_sz" name="bs_nom_sz" value="<?=$bs_nom_sz?>" />
	<input type="hidden" id="bs_dim_sz" name="bs_dim_sz" value="<?=$bs_dim_sz?>" />
	
	<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
	<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
	<input type="hidden" id="or_nom_uni" name="or_nom_ct" value="<?=$or_nom_uni?>" />
	<input type="hidden" id="or_dim_uni" name="or_dim_ct" value="<?=$or_dim_uni?>" />
	<input type="hidden" id="or_nom_zon" name="or_nom_zon" value="<?=$or_nom_zon?>" />
	<input type="hidden" id="or_dim_zon" name="or_dim_zon" value="<?=$or_dim_zon?>" />
	<input type="hidden" id="or_nom_sz" name="or_nom_sz" value="<?=$or_nom_sz?>" />
	<input type="hidden" id="or_dim_sz" name="or_dim_sz" value="<?=$or_dim_sz?>" />
	
	<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />
	<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />
	<input type="hidden" id="or_nom_uni_tipo" name="or_nom_uni_tipo" value="<?=$or_nom_uni_tipo?>" />
	<input type="hidden" id="or_dim_uni_tipo" name="or_dim_uni_tipo" value="<?=$or_dim_uni_tipo?>" />
	<input type="hidden" id="or_nom_zon_tipo" name="or_nom_zon_tipo" value="<?=$or_nom_zon_tipo?>" />
	<input type="hidden" id="or_dim_zon_tipo" name="or_dim_zon_tipo" value="<?=$or_dim_zon_tipo?>" />
	<input type="hidden" id="or_nom_sz_tipo" name="or_nom_sz_tipo" value="<?=$or_nom_sz_tipo?>" />
	<input type="hidden" id="or_dim_sz_tipo" name="or_dim_sz_tipo" value="<?=$or_dim_sz_tipo?>" />
	
	<div id="Titulo_Adentro">
		<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Modificar_SZ'] ?></span>
	</div>
	<div>
		<!-- ****************************************************************************************** -->
		<!-- **************************       FORM         ******************************************** -->
		<!-- ****************************************************************************************** -->
			<table class="centrado width550 font09" >
				<tr><th colspan="2" class="centrado blanco fondo_azul linea_abajo_blanca"><?=$texto['Por_Favor_Complete']?> </th></tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Nombre']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_nombre_SZ" id="txt_nombre_SZ"  maxlength="200" value="<?=$res[0]['Nombre_SZ']?>" onKeyPress="return SZ_ENTER_soloTexto(event)" />
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Diminutivo']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_diminutivo_SZ" id="txt_diminutivo_SZ"  maxlength="45" onKeyUp="return Convierte_Mayuscula(id)" onKeyPress="return SZ_ENTER_soloTexto(event)" value="<?=$res[0]['Diminutivo_SZ']?>"/> 
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Telefono']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_telefono_SZ" id="txt_telefono_SZ"  maxlength="9" onKeyPress="return soloNumeros(event)" onkeyup="mascara(this,'-',patron_telefono,true)" value="<?=$res[0]['Telefono_SZ']?>"/>
					</td>
				</tr>
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Fax']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_fax_SZ" id="txt_fax_SZ"  maxlength="9" onKeyPress="return soloNumeros(event)"  onkeyup="mascara(this,'-',patron_telefono,true)" value="<?=$res[0]['Fax_SZ']?>" />
					</td>
				</tr>
		
				<tr>
					<td class="blanco fondo_azul linea_abajo_blanca"><?=$texto['Correo']?>:</td>
					<td class="centrado ">
						<input type="text" name="txt_correo_SZ" id="txt_correo_SZ"  maxlength="100" value="<?=$res[0]['Correo_SZ']?>"/>
					</td>
				</tr>
				
			</table>
		<!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
			<br/>
			<br/>
			<div class="centrado">
				<button class="boton" onclick="modificarSZ()" ><?=$texto['Guardar']?></button>
				
				<button class="boton"  onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/Subzonas/con_subzonas.php','Id_Zon;Id_Uni;Id_CT;bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;bs_nom_uni;or_nom_uni;or_nom_uni_tipo;bs_dim_uni;or_dim_uni;or_dim_uni_tipo;bs_nom_zon;or_nom_zon;or_nom_zon_tipo;bs_dim_zon;or_dim_zon;or_dim_zon_tipo;bs_nom_sz;or_nom_sz;or_nom_sz_tipo;bs_dim_sz;or_dim_sz;or_dim_sz_tipo;mostrar_efecto;',
														   document.getElementById('Id_Zon').value+';'+
														   document.getElementById('Id_Uni').value+';'+
														   document.getElementById('Id_CT').value+';'+
														   
														   
														   document.getElementById('bs_nom_ct').value+';'+
														   document.getElementById('or_nom_ct').value+';'+
														   document.getElementById('or_nom_ct_tipo').value+';'+
														   
														   document.getElementById('bs_dim_ct').value+';'+
														   document.getElementById('or_dim_ct').value+';'+
														   document.getElementById('or_dim_ct_tipo').value+';'+
														   
														   document.getElementById('bs_nom_uni').value+';'+
														   document.getElementById('or_nom_uni').value+';'+
														   document.getElementById('or_nom_uni_tipo').value+';'+
														   
														   document.getElementById('bs_dim_uni').value+';'+
														   document.getElementById('or_dim_uni').value+';'+
														   document.getElementById('or_dim_uni_tipo').value+';'+
														   
														   document.getElementById('bs_nom_zon').value+';'+
														   document.getElementById('or_nom_zon').value+';'+
														   document.getElementById('or_nom_zon_tipo').value+';'+
														   
														   document.getElementById('bs_dim_zon').value+';'+
														   document.getElementById('or_dim_zon').value+';'+
														   document.getElementById('or_dim_zon_tipo').value+';'+
														   
														   document.getElementById('bs_nom_sz').value+';'+
														   document.getElementById('or_nom_sz').value+';'+
														   document.getElementById('or_nom_sz_tipo').value+';'+
														   
														   document.getElementById('bs_dim_sz').value+';'+
														   document.getElementById('or_dim_sz').value+';'+
														   document.getElementById('or_dim_sz_tipo').value+
														   
														   
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

		
		$('#txt_nombre_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Nombre_SZ']?>"
		  });
		
		$('#txt_diminutivo_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Diminutivo_SZ']?>"
		  });
		$('#txt_telefono_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Telefono_SZ']?>"
		  });
		$('#txt_fax_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Fax_SZ']?>"
		  });

		$('#txt_correo_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Modificar_Correo_SZ']?>"
		  });
		
		
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>

	
