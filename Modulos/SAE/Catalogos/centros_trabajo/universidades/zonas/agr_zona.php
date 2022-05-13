<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
/*************************************************************************/

	/****************************PARAMETROS (ORDENAR) ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$Id_CT				= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : ''; //Parámetro de CT
	$Id_Uni				= (isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : ''; //Parámetro de CT
	
	$or_nom_ct 				= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_nom_ct_tipo 		= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	
	$or_dim_ct 					= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_dim_ct_tipo 			= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	
	$or_nom_uni 					= (isset($_GET['or_nom_uni'])) ? $_GET['or_nom_uni'] : '';
	$or_nom_uni_tipo 			= (isset($_GET['or_nom_uni_tipo'])) ? $_GET['or_nom_uni_tipo'] : 'ASC';
	
	$or_dim_uni 					= (isset($_GET['or_dim_uni'])) ? $_GET['or_dim_uni'] : '';
	$or_dim_uni_tipo 			= (isset($_GET['or_dim_uni_tipo'])) ? $_GET['or_dim_uni_tipo'] : 'ASC';
	
	$or_nom_zon 					= (isset($_GET['or_nom_zon'])) ? $_GET['or_nom_zon'] : '';
	$or_nom_zon_tipo 			= (isset($_GET['or_nom_zon_tipo'])) ? $_GET['or_nom_zon_tipo'] : 'ASC';
	
	$or_dim_zon 					= (isset($_GET['or_dim_zon'])) ? $_GET['or_dim_zon'] : '';
	$or_dim_zon_tipo 			= (isset($_GET['or_dim_zon_tipo'])) ? $_GET['or_dim_zon_tipo'] : 'ASC';
	
	$bs_nom_ct 					= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : 'ASC';
	
	$bs_nom_uni 					= (isset($_GET['bs_nom_uni'])) ? $_GET['bs_nom_uni'] : '';
	$bs_dim_uni 				= (isset($_GET['bs_dim_uni'])) ? $_GET['bs_dim_uni'] : 'ASC';
	
	$bs_nom_zon 					= (isset($_GET['bs_nom_zon'])) ? $_GET['bs_nom_zon'] : '';
	$bs_dim_zon 				= (isset($_GET['bs_dim_zon'])) ? $_GET['bs_dim_zon'] : 'ASC';
	
	/***************************************************************************/	
	$Logo_Zon="";
?>

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Agregar_Zon'] ?></span>
</div>
<br />
<br />

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos (Ordenar)  ******************************************** -->
<!-- ****************************************************************************************** -->

<input type="hidden" id="Id_CT" name="Id_CT" value="<?=$Id_CT?>" />
<input type="hidden" id="Id_Uni" name="Id_Uni" value="<?=$Id_Uni?>" />

<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />

<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />

<input type="hidden" id="or_nom_uni" name="or_nom_uni" value="<?=$or_nom_uni?>" />
<input type="hidden" id="or_nom_uni_tipo" name="or_nom_uni_tipo" value="<?=$or_nom_uni_tipo?>" />

<input type="hidden" id="or_dim_uni" name="or_dim_uni" value="<?=$or_dim_uni?>" />
<input type="hidden" id="or_dim_uni_tipo" name="or_dim_uni_tipo" value="<?=$or_dim_uni_tipo?>" />

<input type="hidden" id="or_nom_zon" name="or_nom_zon" value="<?=$or_nom_zon?>" />
<input type="hidden" id="or_nom_zon_tipo" name="or_nom_zon_tipo" value="<?=$or_nom_zon_tipo?>" />

<input type="hidden" id="or_dim_zon" name="or_dim_zon" value="<?=$or_dim_zon?>" />
<input type="hidden" id="or_dim_zon_tipo" name="or_dim_zon_tipo" value="<?=$or_dim_zon_tipo?>" />

<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />

<input type="hidden" id="bs_nom_uni" name="bs_nom_uni" value="<?=$bs_nom_uni?>" />
<input type="hidden" id="bs_dim_uni" name="bs_dim_uni" value="<?=$bs_dim_uni?>" />

<input type="hidden" id="bs_nom_zon" name="bs_nom_zon" value="<?=$bs_nom_zon?>" />
<input type="hidden" id="bs_dim_zon" name="bs_dim_zon" value="<?=$bs_dim_zon?>" />


<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width500" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?> </th></tr>
		<tr>
			<td><?=$texto['Logo_Centro_Trabajo']?>: </td>
			<td>
				<input type="hidden" id="archivo_logo_original" name="archivo_logo_original" value="<?=$Logo_Zon?>" />
				<input type="file" name="file_logo_Zon" id="file_logo_Zon" class="dropify" data-default-file="" data-height="100" onchange="Sube_Logo_Zon()"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Nombre']?>: </td>
			<td>
				<input type="text" name="txt_nombre_Zon" id="txt_nombre_Zon"  maxlength="200" onKeyPress="return Zon_ENTER_soloTexto(event)"  />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Diminutivo']?>: </td>
			<td>
				<input type="text" name="txt_diminutivo_Zon" id="txt_diminutivo_Zon"  maxlength="45" onKeyUp="return Convierte_Mayuscula(id)" onKeyPress="return Zon_ENTER_soloTexto(event)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Telefono']?>: </td>
			<td>
				<input type="text" name="txt_telefono_Zon" id="txt_telefono_Zon"  maxlength="9" onKeyPress="return soloNumeros(event)" onkeyup="mascara(this,'-',patron_telefono,true)"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Fax']?>: </td>
			<td>
				<input type="text" name="txt_fax_Zon" id="txt_fax_Zon"  maxlength="9" onKeyPress="return soloNumeros(event)"  onkeyup="mascara(this,'-',patron_telefono,true)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Direccion']?>: </td>
			<td class="centrado">
				<input readonly type=text name="txt_tam_Zon" id="txt_tam_Zon" size=3 maxlength=3 value="350" class="width50 gris">
				<br />
				<textarea id="txt_direccion_Zon" name="txt_direccion_Zon" class="textArea300"
				onKeyDown="validaCantidadTexArea('txt_direccion_Zon','txt_tam_Zon',350);"
				onKeyUp="validaCantidadTexArea('txt_direccion_Zon','txt_tam_Zon',350);"></textarea>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Correo']?>: </td>
			<td>
				<input type="text" name="txt_correo_Zon" id="txt_correo_Zon"  maxlength="100" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Latitud']?>: </td>
			<td>
				<input type="text" name="txt_latitud_Zon" id="txt_latitud_Zon"  maxlength="20" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Longitud']?>: </td>
			<td>
				<input type="text" name="txt_longitud_Zon" id="txt_longitud_Zon"  maxlength="20" />
			</td>
		</tr>
		
	</table>
	
<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarZon();" ><?=$texto['Guardar']?></button>
		<?php if(in_array("1061",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php','Id_Uni;Id_CT;bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;bs_nom_uni;or_nom_uni;or_nom_uni_tipo;bs_dim_uni;or_dim_uni;or_dim_uni_tipo;bs_nom_zon;or_nom_zon;or_nom_zon_tipo;bs_dim_zon;or_dim_zon;or_dim_zon_tipo;mostrar_efecto;',
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
														   document.getElementById('or_dim_zon_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
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
			  content: "<?=$texto['AYUDA_Logo_Zon']?>"
		  });
		
		$('#txt_nombre_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nombre_Zon']?>"
		  });
		
		$('#txt_diminutivo_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Diminutivo_Zon']?>"
		  });
		$('#txt_telefono_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Telefono_Zon']?>"
		  });
		$('#txt_fax_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Fax_Zon']?>"
		  });
		$('#txt_direccion_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Direccion_Zon']?>"
		  });
		$('#txt_correo_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Correo_Zon']?>"
		  });
		$('#txt_latitud_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Latitud_Zon']?>"
		  });
		$('#txt_longitud_Zon').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Longitud_Zon']?>"
		  });
		
		
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>