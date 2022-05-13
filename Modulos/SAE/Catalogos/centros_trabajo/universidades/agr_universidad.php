<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../../../';
	include($path."Seguridad_Interfaz_GET.php");
/*************************************************************************/

	/****************************PARAMETROS (ORDENAR) ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	$Id_CT				= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : ''; //Parámetro de CT
	
	$or_nom_ct 				= (isset($_GET['or_nom_ct'])) ? $_GET['or_nom_ct'] : '';
	$or_nom_ct_tipo 		= (isset($_GET['or_nom_ct_tipo'])) ? $_GET['or_nom_ct_tipo'] : 'ASC';
	
	$or_dim_ct 					= (isset($_GET['or_dim_ct'])) ? $_GET['or_dim_ct'] : '';
	$or_dim_ct_tipo 			= (isset($_GET['or_dim_ct_tipo'])) ? $_GET['or_dim_ct_tipo'] : 'ASC';
	
	$or_nom_uni 					= (isset($_GET['or_nom_uni'])) ? $_GET['or_nom_uni'] : '';
	$or_nom_uni_tipo 			= (isset($_GET['or_nom_uni_tipo'])) ? $_GET['or_nom_uni_tipo'] : 'ASC';
	
	$or_dim_uni 					= (isset($_GET['or_dim_uni'])) ? $_GET['or_dim_uni'] : '';
	$or_dim_uni_tipo 			= (isset($_GET['or_dim_uni_tipo'])) ? $_GET['or_dim_uni_tipo'] : 'ASC';
	
	$bs_nom_ct 					= (isset($_GET['bs_nom_ct'])) ? $_GET['bs_nom_ct'] : '';
	$bs_dim_ct			= (isset($_GET['bs_dim_ct'])) ? $_GET['bs_dim_ct'] : 'ASC';
	
	$bs_nom_uni 					= (isset($_GET['bs_nom_uni'])) ? $_GET['bs_nom_uni'] : '';
	$bs_dim_uni 				= (isset($_GET['bs_dim_uni'])) ? $_GET['bs_dim_uni'] : 'ASC';
	
	/***************************************************************************/	
	$Logo_Uni="";
?>

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Agregar_U'] ?></span>
</div>
<br />
<br />

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos (Ordenar)  ******************************************** -->
<!-- ****************************************************************************************** -->

<input type="hidden" id="Id_CT" name="Id_CT" value="<?=$Id_CT?>" />

<input type="hidden" id="or_nom_ct" name="or_nom_ct" value="<?=$or_nom_ct?>" />
<input type="hidden" id="or_nom_ct_tipo" name="or_nom_ct_tipo" value="<?=$or_nom_ct_tipo?>" />

<input type="hidden" id="or_dim_ct" name="or_dim_ct" value="<?=$or_dim_ct?>" />
<input type="hidden" id="or_dim_ct_tipo" name="or_dim_ct_tipo" value="<?=$or_dim_ct_tipo?>" />

<input type="hidden" id="or_nom_uni" name="or_nom_uni" value="<?=$or_nom_uni?>" />
<input type="hidden" id="or_nom_uni_tipo" name="or_nom_uni_tipo" value="<?=$or_nom_uni_tipo?>" />

<input type="hidden" id="or_dim_uni" name="or_dim_uni" value="<?=$or_dim_uni?>" />
<input type="hidden" id="or_dim_uni_tipo" name="or_dim_uni_tipo" value="<?=$or_dim_uni_tipo?>" />

<input type="hidden" id="bs_nom_ct" name="bs_nom_ct" value="<?=$bs_nom_ct?>" />
<input type="hidden" id="bs_dim_ct" name="bs_dim_ct" value="<?=$bs_dim_ct?>" />

<input type="hidden" id="bs_nom_uni" name="bs_nom_uni" value="<?=$bs_nom_uni?>" />
<input type="hidden" id="bs_dim_uni" name="bs_dim_uni" value="<?=$bs_dim_uni?>" />


<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width500" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?> </th></tr>
		<tr>
			<td><?=$texto['Logo_Centro_Trabajo']?>: </td>
			<td>
				<input type="hidden" id="archivo_logo_original" name="archivo_logo_original" value="<?=$Logo_Uni?>" />
				<input type="file" name="file_logo_Uni" id="file_logo_Uni" class="dropify" data-default-file="" data-height="100" onchange="Sube_Logo_Uni()"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Nombre']?>: </td>
			<td>
				<input type="text" name="txt_nombre_Uni" id="txt_nombre_Uni"  maxlength="200" onKeyPress="return Uni_ENTER_soloTexto(event)"  />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Diminutivo']?>: </td>
			<td>
				<input type="text" name="txt_diminutivo_Uni" id="txt_diminutivo_Uni"  maxlength="45" onKeyUp="return Convierte_Mayuscula(id)" onKeyPress="return Uni_ENTER_soloTexto(event)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Telefono']?>: </td>
			<td>
				<input type="text" name="txt_telefono_Uni" id="txt_telefono_Uni"  maxlength="9" onKeyPress="return soloNumeros(event)" onkeyup="mascara(this,'-',patron_telefono,true)"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Fax']?>: </td>
			<td>
				<input type="text" name="txt_fax_Uni" id="txt_fax_Uni"  maxlength="9" onKeyPress="return soloNumeros(event)"  onkeyup="mascara(this,'-',patron_telefono,true)" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Direccion']?>: </td>
			<td class="centrado">
				<input readonly type=text name="txt_tam_Uni" id="txt_tam_Uni" size=3 maxlength=3 value="350" class="width50 gris">
				<br />
				<textarea id="txt_direccion_Uni" name="txt_direccion_Uni" class="textArea300"
				onKeyDown="validaCantidadTexArea('txt_direccion_Uni','txt_tam_Uni',350);"
				onKeyUp="validaCantidadTexArea('txt_direccion_Uni','txt_tam_Uni',350);"></textarea>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Correo']?>: </td>
			<td>
				<input type="text" name="txt_correo_Uni" id="txt_correo_Uni"  maxlength="100" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Latitud']?>: </td>
			<td>
				<input type="text" name="txt_latitud_Uni" id="txt_latitud_Uni"  maxlength="20" />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Longitud']?>: </td>
			<td>
				<input type="text" name="txt_longitud_Uni" id="txt_longitud_Uni"  maxlength="20" />
			</td>
		</tr>
		
	</table>
	
<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarUni();" ><?=$texto['Guardar']?></button>
		<?php if(in_array("1051",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/con_universidades.php',
													   'Id_CT;bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;mostrar_efecto;',
													   document.getElementById('Id_CT').value+';'+
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
		
		$('#file_logo_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Logo_U']?>"
		  });
		
		$('#txt_nombre_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nombre_U']?>"
		  });
		
		$('#txt_diminutivo_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Diminutivo_U']?>"
		  });
		$('#txt_telefono_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Telefono_U']?>"
		  });
		$('#txt_fax_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Fax_U']?>"
		  });
		$('#txt_direccion_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Direccion_U']?>"
		  });
		$('#txt_correo_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Correo_U']?>"
		  });
		$('#txt_latitud_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Latitud_U']?>"
		  });
		$('#txt_longitud_Uni').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Longitud_U']?>"
		  });
		
		
        /*********************************************** Necesario para carga de archivos *************************/
        /* para diseño de subir archivos */
         $('.dropify').dropify();
</script>