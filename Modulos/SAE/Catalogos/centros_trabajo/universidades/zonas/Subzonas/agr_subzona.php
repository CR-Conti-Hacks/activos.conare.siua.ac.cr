<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
/*************************************************************************/

	/****************************PARAMETROS (ORDENAR) ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$Id_CT				= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : ''; //Parámetro de CT
	$Id_Uni				= (isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : ''; //Parámetro de Uni
	$Id_Zon				= (isset($_GET['Id_Zon'])) ? $_GET['Id_Zon'] : ''; //Parámetro de Zona
	
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
	
	$or_nom_sz 					= (isset($_GET['or_nom_sz'])) ? $_GET['or_nom_sz'] : '';
	$or_nom_sz_tipo 			= (isset($_GET['or_nom_sz_tipo'])) ? $_GET['or_nom_sz_tipo'] : 'ASC';
	
	$or_dim_sz 					= (isset($_GET['or_dim_sz'])) ? $_GET['or_dim_sz'] : '';
	$or_dim_sz_tipo 			= (isset($_GET['or_dim_sz_tipo'])) ? $_GET['or_dim_sz_tipo'] : 'ASC';
	
	$bs_nom_ct 					= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : 'ASC';
	
	$bs_nom_uni 					= (isset($_GET['bs_nom_uni'])) ? $_GET['bs_nom_uni'] : '';
	$bs_dim_uni 				= (isset($_GET['bs_dim_uni'])) ? $_GET['bs_dim_uni'] : 'ASC';
	
	$bs_nom_zon 					= (isset($_GET['bs_nom_zon'])) ? $_GET['bs_nom_zon'] : '';
	$bs_dim_zon 				= (isset($_GET['bs_dim_zon'])) ? $_GET['bs_dim_zon'] : 'ASC';
	
	$bs_nom_sz 					= (isset($_GET['bs_nom_sz'])) ? $_GET['bs_nom_sz'] : '';
	$bs_dim_sz 				= (isset($_GET['bs_dim_sz'])) ? $_GET['bs_dim_sz'] : 'ASC';
	
	/***************************************************************************/	
	$Logo_SZ="";
?>

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Agregar_SZ'] ?></span>
</div>
<br />
<br />

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos (Ordenar)  ******************************************** -->
<!-- ****************************************************************************************** -->

<input type="hidden" id="Id_CT" name="Id_CT" value="<?=$Id_CT?>" />
<input type="hidden" id="Id_Uni" name="Id_Uni" value="<?=$Id_Uni?>" />
<input type="hidden" id="Id_Zon" name="Id_Zon" value="<?=$Id_Zon?>" />

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

<input type="hidden" id="or_nom_sz" name="or_nom_sz" value="<?=$or_nom_sz?>" />
<input type="hidden" id="or_nom_sz_tipo" name="or_nom_sz_tipo" value="<?=$or_nom_sz_tipo?>" />

<input type="hidden" id="or_dim_sz" name="or_dim_sz" value="<?=$or_dim_sz?>" />
<input type="hidden" id="or_dim_sz_tipo" name="or_dim_sz_tipo" value="<?=$or_dim_sz_tipo?>" />

<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />

<input type="hidden" id="bs_nom_uni" name="bs_nom_uni" value="<?=$bs_nom_uni?>" />
<input type="hidden" id="bs_dim_uni" name="bs_dim_uni" value="<?=$bs_dim_uni?>" />

<input type="hidden" id="bs_nom_zon" name="bs_nom_zon" value="<?=$bs_nom_zon?>" />
<input type="hidden" id="bs_dim_zon" name="bs_dim_zon" value="<?=$bs_dim_zon?>" />

<input type="hidden" id="bs_nom_sz" name="bs_nom_sz" value="<?=$bs_nom_sz?>" />
<input type="hidden" id="bs_dim_sz" name="bs_dim_sz" value="<?=$bs_dim_sz?>" />

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width500" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?> </th></tr>
		<tr>
			<td><?=$texto['Nombre']?>: </td>
			<td>
				<input type="text" name="txt_nombre_SZ" id="txt_nombre_SZ"  maxlength="200" onKeyPress="return SZ_ENTER_soloTexto(event)"  />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Diminutivo']?>: </td>
			<td>
				<input type="text" name="txt_diminutivo_SZ" id="txt_diminutivo_SZ"  maxlength="45" onKeyUp="return Convierte_Mayuscula(id)" onKeyPress="return SZ_ENTER_soloTexto(event)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Telefono']?>: </td>
			<td>
				<input type="text" name="txt_telefono_SZ" id="txt_telefono_SZ"  maxlength="9" onKeyPress="return soloNumeros(event)" onkeyup="mascara(this,'-',patron_telefono,true)"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Fax']?>: </td>
			<td>
				<input type="text" name="txt_fax_SZ" id="txt_fax_SZ"  maxlength="9" onKeyPress="return soloNumeros(event)"  onkeyup="mascara(this,'-',patron_telefono,true)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Correo']?>: </td>
			<td>
				<input type="text" name="txt_correo_SZ" id="txt_correo_SZ"  maxlength="100" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Latitud']?>: </td>
			<td>
				<input type="text" name="txt_latitud_SZ" id="txt_latitud_SZ"  maxlength="20" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Longitud']?>: </td>
			<td>
				<input type="text" name="txt_longitud_SZ" id="txt_longitud_SZ"  maxlength="20" />
			</td>
		</tr>
		
	</table>
	
<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarSZ();" ><?=$texto['Guardar']?></button>
		<?php if(in_array("1061",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/Subzonas/con_subzonas.php','Id_Zon;Id_Uni;Id_CT;bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;bs_nom_uni;or_nom_uni;or_nom_uni_tipo;bs_dim_uni;or_dim_uni;or_dim_uni_tipo;bs_nom_zon;or_nom_zon;or_nom_zon_tipo;bs_dim_zon;or_dim_zon;or_dim_zon_tipo;bs_nom_sz;or_nom_sz;or_nom_sz_tipo;bs_dim_sz;or_dim_sz;or_dim_sz_tipo;mostrar_efecto;',
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
														   
														   
														   ';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
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
			  content: "<?=$texto['AYUDA_Nombre_SZ']?>"
		  });
		
		$('#txt_diminutivo_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Diminutivo_SZ']?>"
		  });
		$('#txt_telefono_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Telefono_SZ']?>"
		  });
		$('#txt_fax_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Fax_SZ']?>"
		  });

		$('#txt_correo_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Correo_SZ']?>"
		  });
		$('#txt_latitud_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Latitud_SZ']?>"
		  });
		$('#txt_longitud_SZ').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Longitud_SZ']?>"
		  });
		
		
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>