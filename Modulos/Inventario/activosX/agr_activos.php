<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) 			? $_GET['mostrar_efecto'] 			: '';
	/*Busquedas*/
	$bs_Id_Compromiso    	    = (isset($_GET['bs_Id_Compromiso']))      	? $_GET['bs_Id_Compromiso']         : '0';
	$bs_Id_Partida    	    	= (isset($_GET['bs_Id_Partida']))      		? $_GET['bs_Id_Partida']       		: '0';
	$bs_Id_Transferencia   	    = (isset($_GET['bs_Id_Transferencia']))     ? $_GET['bs_Id_Transferencia']      : '0';
    $bs_Id_Act         		    = (isset($_GET['bs_Id_Act']))               ? $_GET['bs_Id_Act']                : '';
    $bs_Id_Zona_tmp_Act    	    = (isset($_GET['bs_Id_Zona_tmp_Act']))      ? $_GET['bs_Id_Zona_tmp_Act']       : '0';
	$bs_Id_INS_Act     		    = (isset($_GET['bs_Id_INS_Act']))           ? $_GET['bs_Id_INS_Act']            : '';
    $bs_Id_UGIT_Act         	= (isset($_GET['bs_Id_UGIT_Act']))          ? $_GET['bs_Id_UGIT_Act']           : '';
    $bs_Numero_OC            	= (isset($_GET['bs_Numero_OC']))         	? $_GET['bs_Numero_OC']          	: '0';
    $bs_Numero_Factu            = (isset($_GET['bs_Numero_Factu']))         ? $_GET['bs_Numero_Factu']          : '0';
	$bs_Numero_Prove            = (isset($_GET['bs_Numero_Prove']))         ? $_GET['bs_Numero_Prove']          : '0';
    $bs_Id_Uni_Act              = (isset($_GET['bs_Id_Uni_Act']))           ? $_GET['bs_Id_Uni_Act']            : '0';
	$bs_Fecha_Recepcion_Act		= (isset($_GET['bs_Fecha_Recepcion_Act']))  ? $_GET['bs_Fecha_Recepcion_Act']   : '';
    $bs_Nombre_Act        	    = (isset($_GET['bs_Nombre_Act']))           ? $_GET['bs_Nombre_Act']            : '';
    $bs_Desecho_Act             = (isset($_GET['bs_Desecho_Act']))          ? $_GET['bs_Desecho_Act']           : '';
    $bs_Donacion_Act            = (isset($_GET['bs_Donacion_Act']))         ? $_GET['bs_Donacion_Act']          : '';
    $bs_Verificado_Act          = (isset($_GET['bs_Verificado_Act']))       ? $_GET['bs_Verificado_Act']        : '';
	$bs_No_Verificado_Act       = (isset($_GET['bs_No_Verificado_Act']))    ? $_GET['bs_No_Verificado_Act']     : '';
    $bs_Numero_Serie_Act        = (isset($_GET['bs_Numero_Serie_Act']))     ? $_GET['bs_Numero_Serie_Act']      : '';
    $bs_Marca_Act               = (isset($_GET['bs_Marca_Act']))            ? $_GET['bs_Marca_Act']             : '';
    $bs_Modelo_Act              = (isset($_GET['bs_Modelo_Act']))           ? $_GET['bs_Modelo_Act']            : '';
    $bs_Color_Act               = (isset($_GET['bs_Color_Act']))            ? $_GET['bs_Color_Act']             : '';
    /*ordenamientos*/
	$or_Id_Act	                = (isset($_GET['or_Id_Act']))               ? $_GET['or_Id_Act']                : '';
	$or_tipo_Id_Act 	        = (isset($_GET['or_tipo_Id_Act']))          ? $_GET['or_tipo_Id_Act']           : 'ASC';
    $or_Nombre_Act	            = (isset($_GET['or_Nombre_Act']))           ? $_GET['or_Nombre_Act']            : '';
	$or_tipo_Nombre_Act         = (isset($_GET['or_tipo_Nombre_Act']))      ? $_GET['or_tipo_Nombre_Act']       : 'ASC';
	$or_Marca_Act	            = (isset($_GET['or_Marca_Act']))            ? $_GET['or_Marca_Act']             : '';
	$or_tipo_or_Marca_Act       = (isset($_GET['or_tipo_or_Marca_Act']))    ? $_GET['or_tipo_or_Marca_Act']     : 'ASC';
    $or_Numero_Serie_Act	    = (isset($_GET['or_Numero_Serie_Act']))     ? $_GET['or_Numero_Serie_Act']      : '';
	$or_tipo_Numero_Serie_Act   = (isset($_GET['or_tipo_Numero_Serie_Act']))? $_GET['or_tipo_Numero_Serie_Act'] : 'ASC';
    $or_Nombre_Uni	            = (isset($_GET['or_Nombre_Uni']))           ? $_GET['or_Nombre_Uni']            : '';
	$or_tipo_Nombre_Uni         = (isset($_GET['or_tipo_Nombre_Uni']))      ? $_GET['or_tipo_Nombre_Uni']       : 'ASC';
    $or_Id_INS_Act	            = (isset($_GET['or_Id_INS_Act']))           ? $_GET['or_Id_INS_Act']            : '';
	$or_tipo_Id_INS_Act         = (isset($_GET['or_tipo_Id_INS_Act']))      ? $_GET['or_tipo_Id_INS_Act']       : 'ASC';
    $or_Id_UGIT_Act	            = (isset($_GET['or_Id_UGIT_Act']))          ? $_GET['or_Id_UGIT_Act']           : '';
	$or_tipo_Id_UGIT            = (isset($_GET['or_tipo_Id_UGIT']))         ? $_GET['or_tipo_Id_UGIT']          : 'ASC';
    $or_Id_Nombre_Zonas_tmp	    = (isset($_GET['or_Nombre_Zonas_tmp']))     ? $_GET['or_Nombre_Zonas_tmp']      : '';
	$or_tipo_Nombre_Zonas_tmp   = (isset($_GET['or_tipo_Nombre_Zonas_tmp']))? $_GET['or_tipo_Nombre_Zonas_tmp'] : 'ASC';
    
	
	/***************************************************************************/

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Activo</span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden"	id="bs_Id_Compromiso"			name="bs_Id_Compromiso"			value="<?=$bs_Id_Compromiso?>" />
<input type="hidden"	id="bs_Id_Partida"				name="bs_Id_Partida"			value="<?=$bs_Id_Partida?>" />
<input type="hidden"	id="bs_Id_Transferencia"		name="bs_Id_Transferencia"		value="<?=$bs_Id_Transferencia?>" />
<input type="hidden"	id="bs_Id_Act" 					name="bs_Id_Act" 				value="<?=$bs_Id_Act?>" />
<input type="hidden"	id="bs_Id_Zona_tmp_Act" 		name="bs_Id_Zona_tmp_Act" 		value="<?=$bs_Id_Zona_tmp_Act?>" />
<input type="hidden"	id="bs_Id_INS_Act" 				name="bs_Id_INS_Act" 			value="<?=$bs_Id_INS_Act?>" />
<input type="hidden"	id="bs_Id_UGIT_Act" 			name="bs_Id_UGIT_Act" 			value="<?=$bs_Id_UGIT_Act?>" />
<input type="hidden"	id="bs_Numero_Factu" 			name="bs_Numero_Factu" 			value="<?=$bs_Numero_Factu?>" />
<input type="hidden"	id="bs_Numero_OC" 				name="bs_Numero_OC" 			value="<?=$bs_Numero_OC?>" />
<input type="hidden"	id="bs_Numero_Prove" 			name="bs_Numero_Prove" 			value="<?=$bs_Numero_Prove?>" />
<input type="hidden"	id="bs_Id_Uni_Act" 				name="bs_Id_Uni_Act" 			value="<?=$bs_Id_Uni_Act?>" />
<input type="hidden"	id="bs_Fecha_Recepcion_Act"		name="bs_Fecha_Recepcion_Act" 	value="<?=$bs_Fecha_Recepcion_Act?>" />
<input type="hidden"	id="bs_Nombre_Act" 				name="bs_Nombre_Act" 			value="<?=$bs_Nombre_Act?>" />
<input type="hidden"	id="bs_Desecho_Act" 			name="bs_Desecho_Act" 			value="<?=$bs_Desecho_Act?>" />
<input type="hidden"	id="bs_Donacion_Act" 			name="bs_Donacion_Act" 			value="<?=$bs_Donacion_Act?>" />
<input type="hidden"	id="bs_Verificado_Act" 			name="bs_Verificado_Act" 		value="<?=$bs_Verificado_Act?>" />
<input type="hidden"	id="bs_No_Verificado_Act" 		name="bs_No_Verificado_Act" 	value="<?=$bs_No_Verificado_Act?>" />
<input type="hidden"	id="bs_Numero_Serie_Act" 		name="bs_Numero_Serie_Act" 		value="<?=$bs_Numero_Serie_Act?>" />
<input type="hidden"	id="bs_Marca_Act" 				name="bs_Marca_Act" 			value="<?=$bs_Marca_Act?>" />
<input type="hidden"	id="bs_Modelo_Act" 				name="bs_Modelo_Act" 			value="<?=$bs_Modelo_Act?>" />
<input type="hidden"	id="bs_Color_Act" 				name="bs_Color_Act" 			value="<?=$bs_Color_Act?>" />

	
<input type="hidden" 	id="or_Id_Act" 					name="or_Id_Act" 				value="<?=$or_Id_Act?>" />
<input type="hidden" 	id="or_tipo_Id_Act" 			name="or_tipo_Id_Act" 			value="<?=$or_tipo_Id_Act?>" />
<input type="hidden" 	id="or_Nombre_Act" 				name="or_Nombre_Act" 			value="<?=$or_Nombre_Act?>" />
<input type="hidden" 	id="or_tipo_Nombre_Act" 		name="or_tipo_Nombre_Act" 		value="<?=$or_tipo_Nombre_Act?>" />
<input type="hidden" 	id="or_Marca_Act" 				name="or_Marca_Act" 			value="<?=$or_Marca_Act?>" />
<input type="hidden" 	id="or_tipo_or_Marca_Act" 		name="or_tipo_or_Marca_Act" 	value="<?=$or_tipo_or_Marca_Act?>" />
<input type="hidden" 	id="or_Numero_Serie_Act" 		name="or_Numero_Serie_Act" 		value="<?=$or_Numero_Serie_Act?>" />
<input type="hidden" 	id="or_tipo_Numero_Serie_Act" 	name="or_tipo_Numero_Serie_Act" value="<?=$or_tipo_Numero_Serie_Act?>" />
<input type="hidden" 	id="or_Nombre_Uni" 				name="or_Nombre_Uni" 			value="<?=$or_Nombre_Uni?>" />
<input type="hidden" 	id="or_tipo_Nombre_Uni" 		name="or_tipo_Nombre_Uni" 		value="<?=$or_tipo_Nombre_Uni?>" />
<input type="hidden" 	id="or_Id_INS_Act" 				name="or_Id_INS_Act" 			value="<?=$or_Id_INS_Act?>" />
<input type="hidden" 	id="or_tipo_Id_INS_Act" 		name="or_tipo_Id_INS_Act" 		value="<?=$or_tipo_Id_INS_Act?>" />
<input type="hidden" 	id="or_Id_UGIT_Act" 			name="or_Id_UGIT_Act" 			value="<?=$or_Id_UGIT_Actt?>" />
<input type="hidden" 	id="or_tipo_Id_UGIT" 			name="or_tipo_Id_UGIT" 			value="<?=$or_tipo_Id_UGIT?>" />
<input type="hidden" 	id="or_Nombre_Zonas_tmp" 		name="or_Nombre_Zonas_tmp" 		value="<?=$or_Nombre_Zonas_tmp?>" />
<input type="hidden" 	id="or_tipo_Nombre_Zonas_tmp" 	name="or_tipo_Nombre_Zonas_tmp" value="<?=$or_tipo_Nombre_Zonas_tmp?>" />

<style>
	input,select,textarea{
		width: 90%;
	}
</style>
<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width40P" >
		<tr><th colspan="2" class="centrado">Datos Generales:</th></tr>
		<tr>
			<td>Fotografía</td>
			<td >
				<div style="width: 85%;" >
					<input type="file" id="Foto_Act" name="Foto_Act" class="dropify" data-default-file="" data-height="100" />    
				</div>
			</td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td>
				<input type="text" name="Nombre_Act" id="Nombre_Act" maxlength="200" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el nombre..."  />
			</td>
		</tr>
		<tr>
			<td>Marca</td>
			<td>
				<input type="text" name="Marca_Act" id="Marca_Act" maxlength="150" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el nombre..."  />
			</td>
		</tr>
		<tr>
			<td>Modelo:</td>
			<td>
				<input type="text" name="Modelo_Act" id="Modelo_Act" maxlength="150" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el modelo..."  />
			</td>
		</tr>
		<tr>
			<td>Número de Serie</td>
			<td>
				<input type="text" name="Numero_Serie_Act" id="Numero_Serie_Act" maxlength="150" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el número de serie..."  />
			</td>
		</tr>
		<tr>
			<td>Color</td>
			<td>
				<input type="text" name="Color_Act" id="Color_Act" maxlength="150" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el color..."  />
			</td>
		</tr>
		<tr>
			<td>Descripción</td>
			<td>
				<textarea id="Descripcion_Act" name="Descripcion_Act" placeholder="Digite la descripción.." maxlength="1000" onkeypress="ENTER(event,'agregarActivo()')"></textarea>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Datos de Ubicación:</th></tr>
		<tr>
			<td>Ubicación</td>
			<td>
				<select id="Id_Zonas_tmp_Act" name="Id_Zonas_tmp_Act">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Zonas_tmp,Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Activo_Zonas_tmp = '1' ORDER BY Nombre_Zonas_tmp";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Zonas_tmp']?>"><?=$res[$i]['Nombre_Zonas_tmp']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Datos de Identificación:</th></tr>
		<tr>
			<td>Dueño</td>
			<td>
				<select id="Id_Uni_Act" name="Id_Uni_Act">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Uni,Diminutivo_Uni FROM tab_universidades WHERE Activo_Uni = '1' ORDER BY  Diminutivo_Uni";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Uni']?>"><?=$res[$i]['Diminutivo_Uni']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Activo institucional</td>
			<td>
				<input type="text" name="Id_INS_Act" id="Id_INS_Act" maxlength="45" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el activo institucional..."  />
			</td>
		</tr>
		<tr>
			<td>Activo UGIT</td>
			<td>
				<input type="text" name="Id_UGIT_Act" id="Id_UGIT_Act" maxlength="45" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el activo UGIT..."  />
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Datos de Empresa:</th></tr>
		<tr>
			<td>Fecha de Recepción</td>
			<td>
				<input type="text" name="Fecha_Recepcion_Act" id="Fecha_Recepcion_Act" placeholder="Seleccione la fecha de recepción"  readonly />
			</td>
		</tr>
		<tr>
			<td>Orden de compra</td>
			<td>
				<select id="Id_OC" name="Id_OC" onchange="Habilitar_Facturas('1')">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_OC,Numero_OC FROM tab_ordenes_compras WHERE Activo_OC = '1' ORDER BY  Numero_OC";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_OC']?>"><?=$res[$i]['Numero_OC']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Factura</td>
			<td>
				<div id="div_Id_Factu_Act">
					<select id="Id_Factu_Act" name="Id_Factu_Act" disabled="disabled">
						<option value="0">[Seleccione]</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Costo</td>
			<td>
				<input type="text" name="Costo_Act" id="Costo_Act" maxlength="100" onkeypress="ENTER(event,'agregarActivo()')" placeholder="Digite el costo..."  />
			</td>
		</tr>
		<tr>
			<td>Desecho</td>
			<td id="td_Desecho_Act">
				<input id="Desecho_Act" name="Desecho_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" />
				<label for="Desecho_Act"></label>
			</td>
		</tr>
		<tr>
			<td>Motivo Desecho</td>
			<td>
				<textarea id="Descripcion_Dese_Act" name="Descripcion_Dese_Act" placeholder="Digite la descripción.." maxlength="250" onkeypress="ENTER(event,'agregarActivo()')"></textarea>
			</td>
		</tr>
		<tr>
			<td>Donación</td>
			<td id="td_Donacion_Act">
				<input id="Donacion_Act" name="Donacion_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" />
				<label for="Donacion_Act"></label>
			</td>
		</tr>
		<tr>
			<td>Motivo Donación</td>
			<td>
				<textarea id="Descripcion_Dona_Act" name="Descripcion_Dona_Act" placeholder="Digite la descripción.." maxlength="250" onkeypress="ENTER(event,'agregarActivo()')"></textarea>
			</td>
		</tr>
		<tr>
			<td>Verificación</td>
			<td id="td_Verificado_Act">
				<input id="Verificado_Act" name="Verificado_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" />
				<label for="Verificado_Act"></label>
			</td>
		</tr>
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarActivo()" >Guardar</button>
		
		<?php if(in_array("3092",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
													   'pagina;inicio;'+
													   'bs_Id_Compromiso;'+
													   'bs_Id_Partida;'+
													   'bs_Id_Transferencia;'+
													   'bs_Id_Act;'+
													   'bs_Id_Zona_tmp_Act;'+
													   'bs_Id_INS_Act;'+
													   'bs_Id_UGIT_Act;'+
													   'bs_Numero_Factu;'+
													   'bs_Numero_OC;'+
													   'bs_Numero_Prove;'+
													   'bs_Id_Uni_Act;'+
													   'bs_Fecha_Recepcion_Act;'+
													   'bs_Nombre_Act;'+
													   'bs_Desecho_Act;'+
													   'bs_Donacion_Act;'+
													   'bs_Verificado_Act;'+
													   'bs_No_Verificado_Act;'+
													   'bs_Numero_Serie_Act;'+
													   'bs_Marca_Act;'+
													   'bs_Modelo_Act;'+
													   'bs_Color_Act;'+
													   'or_Id_Act;'+
													   'or_tipo_Id_Act;'+
													   'or_Nombre_Act;'+
													   'or_tipo_Nombre_Act;'+
													   'or_Marca_Act;'+
													   'or_tipo_or_Marca_Act;'+
													   'or_Numero_Serie_Act;'+
													   'or_tipo_Numero_Serie_Act;'+
													   'or_Nombre_Uni;'+
													   'or_tipo_Nombre_Uni;'+
													   'or_Id_INS_Act;'+
													   'or_tipo_Id_INS_Act;'+
													   'or_Id_UGIT_Act;'+
													   'or_tipo_Id_UGIT;'+
													   'or_Nombre_Zonas_tmp;'+
													   'or_tipo_Nombre_Zonas_tmp;',
													   '0;0;'+
													   document.getElementById('bs_Id_Compromiso').value+';'+
													   document.getElementById('bs_Id_Partida').value+';'+
													   document.getElementById('bs_Id_Transferencia').value+';'+
													   document.getElementById('bs_Id_Act').value+';'+
													   document.getElementById('bs_Id_Zona_tmp_Act').value+';'+
													   document.getElementById('bs_Id_INS_Act').value+';'+
													   document.getElementById('bs_Id_UGIT_Act').value+';'+
													   document.getElementById('bs_Numero_Factu').value+';'+
													   document.getElementById('bs_Numero_OC').value+';'+
													   document.getElementById('bs_Numero_Prove').value+';'+
													   document.getElementById('bs_Id_Uni_Act').value+';'+
													   document.getElementById('bs_Fecha_Recepcion_Act').value+';'+
													   document.getElementById('bs_Nombre_Act').value+';'+
													   document.getElementById('bs_Desecho_Act').value+';'+
													   document.getElementById('bs_Donacion_Act').value+';'+
													   document.getElementById('bs_Verificado_Act').value+';'+
													   document.getElementById('bs_No_Verificado_Act').value+';'+
													   document.getElementById('bs_Numero_Serie_Act').value+';'+
													   document.getElementById('bs_Marca_Act').value+';'+
													   document.getElementById('bs_Modelo_Act').value+';'+
													   document.getElementById('bs_Color_Act').value+';'+
													   document.getElementById('or_Id_Act').value+';'+
													   document.getElementById('or_tipo_Id_Act').value+';'+
													   document.getElementById('or_Nombre_Act').value+';'+
													   document.getElementById('or_tipo_Nombre_Act').value+';'+
													   document.getElementById('or_Marca_Act').value+';'+
													   document.getElementById('or_tipo_or_Marca_Act').value+';'+
													   document.getElementById('or_Numero_Serie_Act').value+';'+
													   document.getElementById('or_tipo_Numero_Serie_Act').value+';'+
													   document.getElementById('or_Nombre_Uni').value+';'+
													   document.getElementById('or_tipo_Nombre_Uni').value+';'+
													   document.getElementById('or_Id_INS_Act').value+';'+
													   document.getElementById('or_tipo_Id_INS_Act').value+';'+
													   document.getElementById('or_Id_UGIT_Act').value+';'+
													   document.getElementById('or_tipo_Id_UGIT').value+';'+
													   document.getElementById('or_Nombre_Zonas_tmp').value+';'+
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';' )" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

	
<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		$('.dropify').dropify();
		$( "#Fecha_Recepcion_Act" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});
		document.getElementById('Nombre_Act').focus();
		/*************************************************************/
		/*******************  ESTILO DROPIFY *************************/
		/*************************************************************/
        
		
		$('#Foto_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Capture la fotografía del activo (OPCIONAL)"
		});
		$('#Nombre_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre del activo"
		});
		$('#Marca_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite la marca del activo (OPCIONAL)"
		});
		$('#Modelo_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el modelo del activo (OPCIONAL)"
		});
		$('#Numero_Serie_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de serie (OPCIONAL)"
		});
		$('#Color_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el color del activo (OPCIONAL)"
		});
		$('#Descripcion_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite la descripción del activo"
		});
		$('#Id_Zonas_tmp_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la zona donde se encuentra físicamente el activo"
		});
		$('#Id_Uni_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la institución a la que pertenece el activo (OPCIONAL)"
		});
		$('#Id_INS_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de activo de la institución si cuenta con uno (OPCIONAL)"
		});
		$('#Id_UGIT_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de activo UGIT si cuenta con uno (OPCIONAL)"
		});
		$('#Fecha_Recepcion_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la fecha de recepción del activo en la SIUA (OPCIONAL)"
		});
		$('#Id_OC').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el número de orden de compra (OPCIONAL)"
		});
		$('#Id_Factu_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el número de factura (OPCIONAL)"
		});
		$('#Costo_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el monto en colones del costo del producto (OPCIONAL)"
		});
		$('#td_Desecho_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción si el activo a sido desechado (OPCIONAL)"
		});
		$('#Descripcion_Dese_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Se marca el activo como 'desecho', debe digitar una descripción del motivo (OPCIONAL)"
		});
		$('#td_Donacion_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción si el activo a sido donado (OPCIONAL)"
		});
		$('#Descripcion_Dona_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Se marca el activo como 'donación', debe digitar una descripción del motivo (OPCIONAL)"
		});
		$('#td_Verificado_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción solo si garantiza que la información del activo es correcta! (NOTA: Se relaciona el ID de usuario con esta verificación)"
		});
		
</script>