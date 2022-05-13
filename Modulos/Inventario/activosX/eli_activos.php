<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
        
    /****************************PARAMETROS  ***********************************/
	$Id_Act     		        = (isset($_GET['Id_Act'])) 			        ? $_GET['Id_Act'] 			        : '';
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
    
    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Act, Nombre_Act FROM tab_Activos WHERE Id_Act = ".$Id_Act;
    $res = seleccion($sql);
        
?>
	<!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden"	id="Id_Act"			            name="Id_Act"			        value="<?=$Id_Act?>" />
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

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Eliminar Activo</h3>
	<br />
	
<div class="centrado">
	<img src="img/SAE/advertencia.png" alt="Advertencia" >
	<br />
	<span class="font10"><?= $texto['Esta_Seguro_el']?> Activo:</span>
	<br />
	<br />
	<span class="font12 rojo">"<?=$res[0]['Nombre_Act']?>"</span>
	<br/>
	<br/>
	<button class="boton" onclick="eliminarActivo()" ><?=$texto['Eliminar']?></button>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
</div>
    