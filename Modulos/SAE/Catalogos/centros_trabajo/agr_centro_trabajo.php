<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
/*************************************************************************/

	/****************************PARAMETROS (ORDENAR) ***********************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_ct 		= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_dim_ct 		= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_nom_ct_tipo 	= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	$or_dim_ct_tipo 	= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	$bs_nom_ct			= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : '';
	
	/***************************************************************************/	
	$Logo_CT="";
?>

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Agregar_Centro_Trabajo'] ?></span>
</div>
<br />
<br />

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos (Ordenar)  ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />
<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />
<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />


<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width500" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?> </th></tr>
		<tr>
			<td><?=$texto['Logo_Centro_Trabajo']?>: </td>
			<td>
				<input type="hidden" id="archivo_logo_original" name="archivo_logo_original" value="<?=$Logo_CT?>" />
				<input type="file" name="file_logo_CT" id="file_logo_CT" class="dropify" data-default-file="" data-height="100" onchange="Sube_Logo_CT()"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Nombre']?>: </td>
			<td>
				<input type="text" name="txt_nombre_CT" id="txt_nombre_CT"  maxlength="200" onKeyPress="return CT_ENTER_soloTexto(event)"  />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Diminutivo']?>: </td>
			<td>
				<input type="text" name="txt_diminutivo_CT" id="txt_diminutivo_CT"  maxlength="45" onKeyUp="return Convierte_Mayuscula(id)" onKeyPress="return CT_ENTER_soloTexto(event)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Telefono']?>: </td>
			<td>
				<input type="text" name="txt_telefono_CT" id="txt_telefono_CT"  maxlength="9" onKeyPress="return soloNumeros(event)" onkeyup="mascara(this,'-',patron_telefono,true)"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Fax']?>: </td>
			<td>
				<input type="text" name="txt_fax_CT" id="txt_fax_CT"  maxlength="9" onKeyPress="return soloNumeros(event)"  onkeyup="mascara(this,'-',patron_telefono,true)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Direccion']?>: </td>
			<td class="centrado">
				<input readonly type=text name="txt_tam_CT" id="txt_tam_CT" size=3 maxlength=3 value="350" class="width50 gris">
				<br />
				<textarea id="txt_direccion_CT" name="txt_direccion_CT" class="textArea300"
				onKeyDown="validaCantidadTexArea('txt_direccion_CT','txt_tam_CT',350);"
				onKeyUp="validaCantidadTexArea('txt_direccion_CT','txt_tam_CT',350);"></textarea>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Correo']?>: </td>
			<td>
				<input type="text" name="txt_correo_CT" id="txt_correo_CT"  maxlength="100" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Latitud']?>: </td>
			<td>
				<input type="text" name="txt_latitud_CT" id="txt_latitud_CT"  maxlength="20" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Longitud']?>: </td>
			<td>
				<input type="text" name="txt_longitud_CT" id="txt_longitud_CT"  maxlength="20" />
			</td>
		</tr>
		
	</table>
	
<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarCT();" ><?=$texto['Guardar']?></button>
		<?php if(in_array("1034",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php',
													   'bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_ct').value+';'+
													   document.getElementById('or_nom_ct').value+';'+
													   document.getElementById('or_nom_ct_tipo').value+';'+
													   document.getElementById('bs_dim_ct').value+';'+
													   document.getElementById('or_dim_ct').value+';'+
													   document.getElementById('or_dim_ct_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
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
			  content: "<?=$texto['AYUDA_Logo_Centro_Trabajo']?>"
		  });
		
		$('#txt_nombre_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nombre_Centro_Trabajo']?>"
		  });
		
		$('#txt_diminutivo_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Diminutivo_Centro_Trabajo']?>"
		  });
		$('#txt_telefono_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Telefono_Centro_Trabajo']?>"
		  });
		$('#txt_fax_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Fax_Centro_Trabajo']?>"
		  });
		$('#txt_direccion_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Direccion_Centro_Trabajo']?>"
		  });
		$('#txt_correo_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Correo_Centro_Trabajo']?>"
		  });
		$('#txt_latitud_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Latitud_Centro_Trabajo']?>"
		  });
		$('#txt_longitud_CT').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Longitud_Centro_Trabajo']?>"
		  });
		
		
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>