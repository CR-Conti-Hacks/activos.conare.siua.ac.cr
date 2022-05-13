<?php
	
	/*************************************************************************/
	/****************************   PATH   ***********************************/
	/*************************************************************************/
	$path = '../../../';
	
	/*************************************************************************/
	/****************************SEGURIDAD ***********************************/
	/*************************************************************************/
	include($path."Seguridad_Interfaz_GET.php");
	

	/*************************************************************************/
    /*******************  CONFIGURACIÓN ACTIVOS    ***************************/
    /*************************************************************************/
	include("configuracionActivos.php");


	
	/*************************************************************************/
	/****************************PARAMETROS  SAE  ****************************/
	/*************************************************************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) 			? $_GET['mostrar_efecto'] 			: '';


	/*************************************************************************/
	/****************************PARAMETROS  ACTIVO  *************************/
	/*************************************************************************/

	//ID ACTIVO
    $Id_Act     		        = (isset($_GET['Id_Act'])) 			        ? $_GET['Id_Act'] 			        : '';



	//Datos Activo 
    $bs_Id_Act         		    = (isset($_GET['bs_Id_Act']))               ? $_GET['bs_Id_Act']                : '';
    $bs_Nombre_Act        	    = (isset($_GET['bs_Nombre_Act']))           ? $_GET['bs_Nombre_Act']            : '';
    $bs_Marca_Act               = (isset($_GET['bs_Marca_Act']))            ? $_GET['bs_Marca_Act']             : '';
    $bs_Modelo_Act              = (isset($_GET['bs_Modelo_Act']))           ? $_GET['bs_Modelo_Act']            : '';
    $bs_Color_Act               = (isset($_GET['bs_Color_Act']))            ? $_GET['bs_Color_Act']             : '';
    $bs_Numero_Serie_Act        = (isset($_GET['bs_Numero_Serie_Act']))     ? $_GET['bs_Numero_Serie_Act']      : '';

    //Identificadores de Activo
	$bs_Id_INS_Act     		    = (isset($_GET['bs_Id_INS_Act']))           ? $_GET['bs_Id_INS_Act']            : '';
    $bs_Id_Uni_Act              = (isset($_GET['bs_Id_Uni_Act']))           ? $_GET['bs_Id_Uni_Act']            : '0';

    //Activo Fijo
    $bs_Activo_Fijo_Act         = (isset($_GET['bs_Activo_Fijo_Act']))       ? $_GET['bs_Activo_Fijo_Act']        : '';
    $bs_No_Activo_Fijo_Act      = (isset($_GET['bs_No_Activo_Fijo_Act']))    ? $_GET['bs_No_Activo_Fijo_Act']     : '';

    //Fecha y año Recepción
	$bs_Fecha_Recepcion_Act		= (isset($_GET['bs_Fecha_Recepcion_Act']))  ? $_GET['bs_Fecha_Recepcion_Act']   : '';
	$bs_anno_inicio             = (isset($_GET['bs_anno_inicio']))          ? $_GET['bs_anno_inicio']        	: '';
	$bs_anno_fin             	= (isset($_GET['bs_anno_fin']))          	? $_GET['bs_anno_fin']        		: '';


	//Datos de compra
	$bs_Numero_OC            	= (isset($_GET['bs_Numero_OC']))         	? $_GET['bs_Numero_OC']          	: '0';
    $bs_Numero_Factu            = (isset($_GET['bs_Numero_Factu']))         ? $_GET['bs_Numero_Factu']          : '0';
	$bs_Numero_Prove            = (isset($_GET['bs_Numero_Prove']))         ? $_GET['bs_Numero_Prove']          : '0';
	$bs_Id_Compromiso    	    = (isset($_GET['bs_Id_Compromiso']))      	? $_GET['bs_Id_Compromiso']         : '0';
	$bs_Id_Partida    	    	= (isset($_GET['bs_Id_Partida']))      		? $_GET['bs_Id_Partida']       		: '0';
	$bs_Id_Transferencia   	    = (isset($_GET['bs_Id_Transferencia']))     ? $_GET['bs_Id_Transferencia']      : '0';


	
	//Ubicación
    $bs_Id_Zona_tmp_Act    	    = (isset($_GET['bs_Id_Zona_tmp_Act']))      ? $_GET['bs_Id_Zona_tmp_Act']       : '0';

	//CONARE: Responsables
	$bs_Id_Res   	    		= (isset($_GET['bs_Id_Res']))     			? $_GET['bs_Id_Res']      			: '0';
	$bs_Id_Cus   	    		= (isset($_GET['bs_Id_Cus']))     			? $_GET['bs_Id_Cus']      			: '0';
	
    //Estados
    $bs_Desecho_Act             = (isset($_GET['bs_Desecho_Act']))          ? $_GET['bs_Desecho_Act']           : '';
    $bs_Donacion_Act            = (isset($_GET['bs_Donacion_Act']))         ? $_GET['bs_Donacion_Act']          : '';
	$bs_Mantenimiento_Act       = (isset($_GET['bs_Mantenimiento_Act']))    ? $_GET['bs_Mantenimiento_Act']    	: '';

	//Verificación
    $bs_Verificado_Act          = (isset($_GET['bs_Verificado_Act']))       ? $_GET['bs_Verificado_Act']        : '';
	$bs_No_Verificado_Act       = (isset($_GET['bs_No_Verificado_Act']))    ? $_GET['bs_No_Verificado_Act']     : '';
    
    
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
    $or_Nombre_Zonas_tmp	    = (isset($_GET['or_Nombre_Zonas_tmp']))     ? $_GET['or_Nombre_Zonas_tmp']      : '';
	$or_tipo_Nombre_Zonas_tmp   = (isset($_GET['or_tipo_Nombre_Zonas_tmp']))? $_GET['or_tipo_Nombre_Zonas_tmp'] : 'ASC';
	$or_Activo_Fijo_Act			= (isset($_GET['or_Activo_Fijo_Act']))     	? $_GET['or_Activo_Fijo_Act']      	: '';
	$or_tipo_Activo_Fijo_Act   	= (isset($_GET['or_tipo_Activo_Fijo_Act']))	? $_GET['or_tipo_Activo_Fijo_Act'] 	: 'ASC';


    
    $pagina   = (isset($_GET['pagina']))? $_GET['pagina'] : '1';
    $inicio   = (isset($_GET['inicio']))? $_GET['inicio'] : '0';



    /***************************************************************************/
	/************************   SQL PRINCIPAL   ********************************/
	/***************************************************************************/

	//SELECT PRINCIPAL
	$sql ="SELECT ";

	//***************************************************************************************************************
	//Datos Activo 
	//***************************************************************************************************************
	$sql .=   " Id_Act,
				Nombre_Act,
				Marca_Act,
				Modelo_Act,
				Color_Act,
				Numero_Serie_Act,
				Descripcion_Act,
				Foto_Act,
				
				";

	//***************************************************************************************************************
	//Identificadores de Activo
	//***************************************************************************************************************
	$sql .=   " Id_INS_Act,
				Id_Uni_Act,
				Diminutivo_Uni,
				";


	//***************************************************************************************************************
	// Activo Fijo
	//***************************************************************************************************************
	$sql .=   " Activo_Fijo_ACT,";


	//***************************************************************************************************************
	//Fecha y año Recepción
	//***************************************************************************************************************
	$sql .=   " Fecha_Recepcion_Act,
				Tiempo_Garantia_Act,";


	//***************************************************************************************************************
	//Datos de compra
	//***************************************************************************************************************
	$sql .=   " Id_OC,
                Numero_OC,

                Id_Factu,
                Id_Factu_Act,
                Numero_Factu,
                Costo_Act,

                Id_Prove,
                Nombre_Prove,

                Id_Compr,
                Numero_Compr,

                Id_Parti_OC,
                Numero_Parti,

                Id_Trans_Factu,
                Numero_Trans,
                ";


    //***************************************************************************************************************
	//Ubicación
	//***************************************************************************************************************
    $sql .=   " Id_Zonas_tmp_Act,
				Nombre_Zonas_tmp,";


	//***************************************************************************************************************
	//CONARE: Responsables
	//***************************************************************************************************************
	$sql .=   " Id_Res_Act,
				Id_Cus_Act,";


	//***************************************************************************************************************
	//Estados
	//***************************************************************************************************************
	$sql .=   " Desecho_Act,
				Descripcion_Dese_Act,
				Donacion_Act,
				Descripcion_Dona_Act,			
				Mantenimiento_Act,
				Descripcion_Mante_Act,
				";

	//***************************************************************************************************************
	//Verificación
	//***************************************************************************************************************
	$sql .=   " Verificado_Act,";


	//***************************************************************************************************************
	//Usuario
	//***************************************************************************************************************
	$sql .=   	" 
				Id_Per_Usu_Act,
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per
				";
				
				
				
				
	//***************************************************************************************************************
	//Tablas
	//***************************************************************************************************************			
    $sql .=   " FROM tab_Activos
				INNER JOIN tab_zonas_tmp ON (Id_Zonas_tmp = Id_Zonas_tmp_Act)
				INNER JOIN tab_universidades ON (Id_Uni=Id_Uni_Act)
	            INNER JOIN tab_facturas ON (Id_Factu=Id_Factu_Act)
	            INNER JOIN tab_transferencias ON (Id_Trans=Id_Trans_Factu)
	            INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
	            INNER JOIN tab_compromisos ON (Id_Compr=Id_Compr_OC)
	            INNER JOIN tab_partidas ON (Id_Parti=Id_Parti_OC)
	            INNER JOIN tab_proveedores ON (Id_Prove=Id_Prove_OC)
	            INNER JOIN tab_personas ON (Id_Per = Id_Per_Usu_Act)
				WHERE Activo_Act = '1' AND Id_Act=".$Id_Act;

    $res_principal = seleccion($sql);



	//Comprobar si tiene o no foto
	if($res_principal[0]['Foto_Act'] ==''){
		$Foto_Act = $dominio.$ruta.'img/inventario/activos/default.png';
	}else{
		$Foto_Act = $dominio.$ruta.'img/inventario/activos/'.$res_principal[0]['Foto_Act'];
	}

	/***************************************************************************/

?>


<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden"	id="Id_Act"			            name="Id_Act"			        value="<?=$Id_Act?>" />


<input type="hidden"	id="bs_Id_Act" 					name="bs_Id_Act" 				value="<?=$bs_Id_Act?>" />
<input type="hidden"	id="bs_Nombre_Act" 				name="bs_Nombre_Act" 			value="<?=$bs_Nombre_Act?>" />
<input type="hidden"	id="bs_Marca_Act" 				name="bs_Marca_Act" 			value="<?=$bs_Marca_Act?>" />
<input type="hidden"	id="bs_Modelo_Act" 				name="bs_Modelo_Act" 			value="<?=$bs_Modelo_Act?>" />
<input type="hidden"	id="bs_Color_Act" 				name="bs_Color_Act" 			value="<?=$bs_Color_Act?>" />
<input type="hidden"	id="bs_Numero_Serie_Act" 		name="bs_Numero_Serie_Act" 		value="<?=$bs_Numero_Serie_Act?>" />


<input type="hidden"	id="bs_Id_INS_Act" 				name="bs_Id_INS_Act" 			value="<?=$bs_Id_INS_Act?>" />
<input type="hidden"	id="bs_Id_Uni_Act" 				name="bs_Id_Uni_Act" 			value="<?=$bs_Id_Uni_Act?>" />


<input type="hidden"	id="bs_Activo_Fijo_Act" 		name="bs_Activo_Fijo_Act" 		value="<?=$bs_Activo_Fijo_Act?>" />
<input type="hidden"	id="bs_No_Activo_Fijo_Act" 		name="bs_No_Activo_Fijo_Act" 	value="<?=$bs_No_Activo_Fijo_Act?>" />


<input type="hidden"	id="bs_Fecha_Recepcion_Act"		name="bs_Fecha_Recepcion_Act" 	value="<?=$bs_Fecha_Recepcion_Act?>" />
<input type="hidden"	id="bs_anno_inicio"				name="bs_anno_inicio" 			value="<?=$bs_anno_inicio?>" />
<input type="hidden"	id="bs_anno_fin"				name="bs_anno_fin" 				value="<?=$bs_anno_fin?>" />


<input type="hidden"	id="bs_Numero_OC" 				name="bs_Numero_OC" 			value="<?=$bs_Numero_OC?>" />
<input type="hidden"	id="bs_Numero_Factu" 			name="bs_Numero_Factu" 			value="<?=$bs_Numero_Factu?>" />
<input type="hidden"	id="bs_Numero_Prove" 			name="bs_Numero_Prove" 			value="<?=$bs_Numero_Prove?>" />
<input type="hidden"	id="bs_Id_Compromiso"			name="bs_Id_Compromiso"			value="<?=$bs_Id_Compromiso?>" />
<input type="hidden"	id="bs_Id_Partida"				name="bs_Id_Partida"			value="<?=$bs_Id_Partida?>" />
<input type="hidden"	id="bs_Id_Transferencia"		name="bs_Id_Transferencia"		value="<?=$bs_Id_Transferencia?>" />


<input type="hidden"	id="bs_Id_Zona_tmp_Act" 		name="bs_Id_Zona_tmp_Act" 		value="<?=$bs_Id_Zona_tmp_Act?>" />

<input type="hidden"	id="bs_Id_Res" 					name="bs_Id_Res" 				value="<?=$bs_Id_Res?>" />
<input type="hidden"	id="bs_Id_Cus" 					name="bs_Id_Cus" 				value="<?=$bs_Id_Cus?>" />



<input type="hidden"	id="bs_Desecho_Act" 			name="bs_Desecho_Act" 			value="<?=$bs_Desecho_Act?>" />
<input type="hidden"	id="bs_Donacion_Act" 			name="bs_Donacion_Act" 			value="<?=$bs_Donacion_Act?>" />
<input type="hidden"	id="bs_Mantenimiento_Act" 		name="bs_Mantenimiento_Act" 	value="<?=$bs_Mantenimiento_Act?>" />


<input type="hidden"	id="bs_Verificado_Act" 			name="bs_Verificado_Act" 		value="<?=$bs_Verificado_Act?>" />
<input type="hidden"	id="bs_No_Verificado_Act" 		name="bs_No_Verificado_Act" 	value="<?=$bs_No_Verificado_Act?>" />


	
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
<input type="hidden" 	id="or_Nombre_Zonas_tmp" 		name="or_Nombre_Zonas_tmp" 		value="<?=$or_Nombre_Zonas_tmp?>" />
<input type="hidden" 	id="or_tipo_Nombre_Zonas_tmp" 	name="or_tipo_Nombre_Zonas_tmp" value="<?=$or_tipo_Nombre_Zonas_tmp?>" />
<input type="hidden" 	id="or_Activo_Fijo_Act" 		name="or_Activo_Fijo_Act" 		value="<?=$or_Activo_Fijo_Act?>" />
<input type="hidden" 	id="or_tipo_Activo_Fijo_Act" 	name="or_tipo_Activo_Fijo_Act"  value="<?=$or_tipo_Activo_Fijo_Act?>" />


<input type="hidden" 	id="pagina" 	name="pagina" value="<?=$pagina?>" />
<input type="hidden" 	id="inicio" 	name="inicio" value="<?=$inicio?>" />

<style>
	input,select,textarea{
		width: 90%;
	}
</style>

<script>
var nombre_parametros = 	   	
										//paginación
										'pagina;inicio;'+


										//Datos Activo 
									   	'bs_Id_Act;'+
									   	'bs_Nombre_Act;'+
									   	'bs_Marca_Act;'+
									   	'bs_Modelo_Act;'+
									   	'bs_Color_Act;'+
									   	'bs_Numero_Serie_Act;'+

									   	//Identificadores de Activo
									   	'bs_Id_INS_Act;'+
									   	'bs_Id_Uni_Act;'+
									   	
									   	// Activo Fijo
									   	'bs_Activo_Fijo_Act;'+
									   	'bs_No_Activo_Fijo_Act;'+

									   	//Fecha y año Recepción
									   	'bs_Fecha_Recepcion_Act;'+
									   	'bs_anno_inicio;'+
									   	'bs_anno_fin;'+
									   	
									   	//Datos de compra
									   	'bs_Numero_OC;'+
									   	'bs_Numero_Factu;'+
									   	'bs_Numero_Prove;'+
								   		'bs_Id_Compromiso;'+
									   	'bs_Id_Partida;'+
									   	'bs_Id_Transferencia;'+

									   	//Ubicación
									   	'bs_Id_Zona_tmp_Act;'+
									   	
									   	//CONARE: Responsables
									   	'bs_Id_Res;'+
									   	'bs_Id_Cus;'+

									   	//Estados
									   	'bs_Desecho_Act;'+
									   	'bs_Donacion_Act;'+
									   	'bs_Mantenimiento_Act;'+

									   	//Verificación
									   	'bs_Verificado_Act;'+
									   	'bs_No_Verificado_Act;'+

									   	//Ordenamiento
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
									    'or_Nombre_Zonas_tmp;'+
									    'or_tipo_Nombre_Zonas_tmp;'+
									    'or_Activo_Fijo_Act;'+
									    'or_tipo_Activo_Fijo_Act;';


var valores_parametros = 	
										//Paginación se obtienen del código
										

										//Datos Activo 
								   		document.getElementById('bs_Id_Act').value+';'+
								   		document.getElementById('bs_Nombre_Act').value+';'+
								   		document.getElementById('bs_Marca_Act').value+';'+
								   		document.getElementById('bs_Modelo_Act').value+';'+
								   		document.getElementById('bs_Color_Act').value+';'+
								   		document.getElementById('bs_Numero_Serie_Act').value+';'+

										//Identificadores de Activo
								   		document.getElementById('bs_Id_INS_Act').value+';'+
								   		document.getElementById('bs_Id_Uni_Act').value+';'+

								   		//Activo Fijo
								   		document.getElementById('bs_Activo_Fijo_Act').checked+';'+
								   		document.getElementById('bs_No_Activo_Fijo_Act').checked+';'+
								   		
								   		//Fecha y año Recepción
								   		document.getElementById('bs_Fecha_Recepcion_Act').value+';'+
								   		document.getElementById('bs_anno_inicio').value+';'+
								   		document.getElementById('bs_anno_fin').value+';'+

								   		//Datos de compra
								   		document.getElementById('bs_Numero_OC').value+';'+
								   		document.getElementById('bs_Numero_Factu').value+';'+
								   		document.getElementById('bs_Numero_Prove').value+';'+
								   		document.getElementById('bs_Id_Compromiso').value+';'+
								   		document.getElementById('bs_Id_Partida').value+';'+
								   		document.getElementById('bs_Id_Transferencia').value+';'+
								   		
								   		//Ubicación
								   		document.getElementById('bs_Id_Zona_tmp_Act').value+';'+

								   		//CONARE: Responsables
								   		document.getElementById('bs_Id_Res').value+';'+
								   		document.getElementById('bs_Id_Cus').value+';'+
								   		
								   		//Estados
								   		document.getElementById('bs_Desecho_Act').checked+';'+
								   		document.getElementById('bs_Donacion_Act').checked+';'+
								   		document.getElementById('bs_Mantenimiento_Act').checked+';'+

								   		//Verificación
								   		document.getElementById('bs_Verificado_Act').checked+';'+
								   		document.getElementById('bs_No_Verificado_Act').checked+';'+
								   		

								   		//Ordenamiento
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
								   		document.getElementById('or_Nombre_Zonas_tmp').value+';'+
								   		document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';'+
								   		document.getElementById('or_Activo_Fijo_Act').value+';'+
								   		document.getElementById('or_tipo_Activo_Fijo_Act').value+';';
								   		



</script>


<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Modificar Activo</span>
	<hr>
	<span class="Texto_Titulo2" ><b>ID ACT: </b><?= $Diminutivo_ACON ?>-<?= $res_principal[0]['Id_Act']?> <br/> <b>Nombre:</b> <?= $res_principal[0]['Nombre_Act']?></span>
</div>


<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->

	<div class="centrado">
		<button class="boton" onclick="modificarActivo()" >Guardar</button>
		
		<?php if(in_array("3092",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
													   nombre_parametros,
													   document.querySelector('#pagina').value+';'+
													   document.querySelector('#inicio').value+';'+
													   valores_parametros)" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>
	<br/>
	<br/>

<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width40P" >
		<tr><th colspan="2" class="centrado">Datos Generales:</th></tr>
		<tr id="tr_Foto_Act">
			<td>Fotografía</td>
			<td >
				<div style="width: 85%;" >
					<input type="file" id="Foto_Act" name="Foto_Act" class="dropify" data-default-file="<?=$Foto_Act?>" data-height="100" />    
				</div>
			</td>
		</tr>
		<tr id="tr_Nombre_Act">
			<td>Nombre</td>
			<td>
				<input type="text" name="Nombre_Act" id="Nombre_Act" maxlength="200" onkeypress="ENTER(event,'modificarActivo()')" placeholder="Digite el nombre..." value="<?=$res_principal[0]['Nombre_Act']?>"  />
			</td>
		</tr>
		<tr id="tr_Marca_Act">
			<td>Marca</td>
			<td>
				<input type="text" name="Marca_Act" id="Marca_Act" maxlength="150" onkeypress="ENTER(event,'modificarActivo()')" placeholder="Digite el nombre..." value="<?=$res_principal[0]['Marca_Act']?>" />
			</td>
		</tr>
		<tr id="tr_Modelo_Act">
			<td>Modelo:</td>
			<td>
				<input type="text" name="Modelo_Act" id="Modelo_Act" maxlength="150" onkeypress="ENTER(event,'modificarActivo()')" placeholder="Digite el modelo..." value="<?=$res_principal[0]['Modelo_Act']?>" />
			</td>
		</tr>
		<tr id="tr_Numero_Serie_Act">
			<td>Número de Serie</td>
			<td>
				<input type="text" name="Numero_Serie_Act" id="Numero_Serie_Act" maxlength="150" onkeypress="ENTER(event,'modificarActivo()')" placeholder="Digite el número de serie..."  value="<?=$res_principal[0]['Numero_Serie_Act']?>" />
			</td>
		</tr>
		<tr id="tr_Color_Act">
			<td>Color</td>
			<td>
				<input type="text" name="Color_Act" id="Color_Act" maxlength="150" onkeypress="ENTER(event,'modificarActivo()')" placeholder="Digite el color..."  value="<?=$res_principal[0]['Color_Act']?>" />
			</td>
		</tr>
		<tr id="tr_Descripcion_Act">
			<td>Descripción</td>
			<td>
				<textarea id="Descripcion_Act" name="Descripcion_Act" placeholder="Digite la descripción.." onkeypress="ENTER(event,'modificarActivo()')"><?=$res_principal[0]['Descripcion_Act']?></textarea>
			</td>
		</tr>

		<tr><th colspan="2" class="centrado">Tipo de Activo:</th></tr>
		<tr id="tr_Activo_Fijo_Act">
			<td>Activo Fijo</td>
			<td id="td_Activo_Fijo_Act">
				<input id="Activo_Fijo_Act" name="Activo_Fijo_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($res_principal[0]['Activo_Fijo_ACT']=='1'){ echo 'checked="checked"'; } ?>/>
				<label for="Activo_Fijo_Act"></label>
			</td>
		</tr>


		<tr><th colspan="2" class="centrado">Datos de Ubicación:</th></tr>
		<tr id="tr_Id_Zonas_tmp_Act">
			<td>Ubicación</td>
			<td>
				<select id="Id_Zonas_tmp_Act" name="Id_Zonas_tmp_Act"   <?php if(!in_array("3098",$_SESSION['Permisos'])){ echo 'disabled="disabled"'; }?>  class='fstdropdown-select'>
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Zonas_tmp,Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Activo_Zonas_tmp = '1' ORDER BY Nombre_Zonas_tmp";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Zonas_tmp']?>"
                        <?php
                        if($res[$i]['Id_Zonas_tmp']==$res_principal[0]['Id_Zonas_tmp_Act']){
                            echo "selected='selected'";
                        }
                        ?>
                        ><?=$res[$i]['Nombre_Zonas_tmp']?></option>
					<?php
						}
					?>
				</select>
				<input type="hidden" name="Id_Zonas_tmp_Act_Actual" id="Id_Zonas_tmp_Act_Actual" value="<?=$res_principal[0]['Id_Zonas_tmp_Act']?>">
				<input type="hidden" name="Id_Zonas_tmp_Act_Cambio" id="Id_Zonas_tmp_Act_Cambio" value="0">
			</td>
		</tr>
		<tr id="tr_MotivoCambioubicacion" style="display: none;">
			<td>Motivo de cambio:</td>
			<td>
				<textarea name="motivoCambioUbicacion" id="motivoCambioUbicacion" rows="5"></textarea>
			</td>
		</tr>
		<tr id="tr_MotivoCambioubicacionCorreo"  <?php if($Enviar_Correo_Trasiego_ACON != "1"){ ?>style="display: none;" <?php } ?>>
			<td>Enviar correo trasiego:</td>
			<td>
				<input type="checkbox" name="enviarCorreoTrasiego" id="enviarCorreoTrasiego">
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Datos de Identificación:</th></tr>
		
		<tr <?php if($Ocultar_Activo_Institucional_ACON == "1"){ ?>style="display: none;" <?php } ?> id="tr_Id_INS_Act">
			<td>Activo institucional</td>
			<td>
				<input type="text" name="Id_INS_Act" id="Id_INS_Act" maxlength="45" onkeypress="ENTER(event,'modificarActivo()')" placeholder="Digite el activo institucional..." value="<?=$res_principal[0]['Id_INS_Act']?>" />
			</td>
		</tr>

		<tr id="tr_Id_Uni_Act">
			<td>Institución</td>
			<td>
				<select id="Id_Uni_Act" name="Id_Uni_Act" class='fstdropdown-select'  onchange="Habilita_Responsables_Custodios(this.id,'Id_Res_Act','Id_Cus_Act')">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Uni,Diminutivo_Uni FROM tab_universidades WHERE Activo_Uni = '1' ";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Uni']?>"
                        <?php
                        if($res[$i]['Id_Uni']==$res_principal[0]['Id_Uni_Act']){
                            echo "selected='selected'";
                        }
                        ?>
                        ><?=$res[$i]['Diminutivo_Uni']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr id="tr_Id_Res_Act">
			<td>Responsable:</td>
			<td>
				<select id="Id_Res_Act" name="Id_Res_Act"  class='fstdropdown-select' >
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Res,Nombre_Res FROM tab_Responsables WHERE Activo_Res = '1' ";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Res']?>"
                        <?php
                        if($res[$i]['Id_Res']==$res_principal[0]['Id_Res_Act']){
                            echo "selected='selected'";
                        }
                        ?>
                        ><?=$res[$i]['Nombre_Res']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr id="tr_Id_Cus_Act">
			<td>Custodio:</td>
			<td>
				<select id="Id_Cus_Act" name="Id_Cus_Act" disabled="disabled" class='fstdropdown-select'>
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Cus,Nombre_Cus FROM tab_Custodios WHERE Activo_Cus = '1' ";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Cus']?>"
                        <?php
                        if($res[$i]['Id_Cus']==$res_principal[0]['Id_Cus_Act']){
                            echo "selected='selected'";
                        }
                        ?>
                        ><?=$res[$i]['Nombre_Cus']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>


		<tr><th colspan="2" class="centrado">Datos de Empresa:</th></tr>
		<tr id="tr_Fecha_Recepcion_Act">
			<td>Fecha de Recepción</td>
			<td>
				<input type="text" name="Fecha_Recepcion_Act" id="Fecha_Recepcion_Act" placeholder="Seleccione la fecha de recepción"  readonly  value="<?=$res_principal[0]['Fecha_Recepcion_Act']?>" />
			</td>
		</tr>
        <tr id="tr_Tiempo_Garantia_Act">
			<td>Tiempo de garantía</td>
			<td>
				<input type="text" name="Tiempo_Garantia_Act" id="Tiempo_Garantia_Act" placeholder="Digite el tiempo de garantía" value="<?=$res_principal[0]['Tiempo_Garantia_Act']?>" style="width: 50%;" maxlength="3" onKeyPress="return ENTER_soloNumeros(event,'modificarActivo()')"/> meses.
			</td>
		</tr>
		<tr id="tr_Id_OC">
			<td>Orden de compra</td>
			<td>
				<select id="Id_OC" name="Id_OC" onchange="Habilitar_Facturas('1')" class='fstdropdown-select' >
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_OC,Numero_OC FROM tab_ordenes_compras WHERE Activo_OC = '1' ORDER BY Numero_OC";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_OC']?>"
                        <?php
                        if($res[$i]['Id_OC']==$res_principal[0]['Id_OC']){
                            echo "selected='selected'";
                        }
                        ?>
                        ><?=$res[$i]['Numero_OC']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr id="tr_Id_Factu_Act">
			<td>Factura</td>
			<td>
                <div id="div_Id_Factu_Act">
					<select id="Id_Factu_Act" name="Id_Factu_Act" class='fstdropdown-select' >
                        <?php
                            $sql ="SELECT Id_Factu,Numero_Factu FROM tab_facturas WHERE Activo_Factu = '1' AND  Id_OC_Factu=".$res_principal[0]['Id_OC'];
                            $res = seleccion($sql);
                            for($i=0;$i<count($res);$i++){
                        ?>
                            <option value="<?=$res[$i]['Id_Factu']?>"
                            <?php
                                if($res[$i]['Id_Factu']==$res_principal[0]['Id_Factu_Act']){
                                    echo "selected='selected'";
                                }
                            ?>
                            
                            ><?=$res[$i]['Numero_Factu']?></option>
                        <?php
                            }
                        ?>
                    </select>
				</div>
			</td>
		</tr>
		<tr id="tr_Costo_Act">
			<td>Costo</td>
			<td>
				<input type="text" name="Costo_Act" id="Costo_Act" maxlength="100" onkeypress="ENTER(event,'modificarActivo()')" placeholder="Digite el costo..." value="<?=$res_principal[0]['Costo_Act']?>"  />
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Estado del Activo:</th></tr>
		<tr id="tr_Desecho_Act">
			<td>Desecho</td>
			<td id="td_Desecho_Act">
				<input id="Desecho_Act" name="Desecho_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($res_principal[0]['Desecho_Act']=='1'){ echo 'checked="checked"'; } ?>/>
				<label for="Desecho_Act"></label>
			</td>
		</tr>
		<tr id="tr_Descripcion_Dese_Act">
			<td>Motivo Desecho</td>
			<td>
				<textarea id="Descripcion_Dese_Act" name="Descripcion_Dese_Act" placeholder="Digite la descripción.." maxlength="250" onkeypress="ENTER(event,'modificarActivo()')" <?php if($res_principal[0]['Desecho_Act']=='0'){ echo 'disabled="disabled"'; } ?>><?=$res_principal[0]['Descripcion_Dese_Act']?></textarea>
			</td>
		</tr>
		<tr id="tr_Donacion_Act">
			<td>Donación</td>
			<td id="td_Donacion_Act">
				<input id="Donacion_Act" name="Donacion_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($res_principal[0]['Donacion_Act']=='1'){ echo 'checked="checked"'; } ?> />
				<label for="Donacion_Act"></label>
			</td>
		</tr>
		<tr id="tr_Descripcion_Dona_Act">
			<td>Motivo Donación</td>
			<td>
				<textarea id="Descripcion_Dona_Act" name="Descripcion_Dona_Act" placeholder="Digite la descripción.." maxlength="250" onkeypress="ENTER(event,'modificarActivo()')" <?php if($res_principal[0]['Donacion_Act']=='0'){ echo 'disabled="disabled"'; } ?>><?=$res_principal[0]['Descripcion_Dona_Act']?></textarea>
			</td>
		</tr>
        <tr id="tr_Mantenimiento_Act">
			<td>Mantenimiento</td>
			<td id="td_Mantenimiento_Act">
				<input id="Mantenimiento_Act" name="Mantenimiento_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($res_principal[0]['Mantenimiento_Act']=='1'){ echo 'checked="checked"'; } ?> />
				<label for="Mantenimiento_Act"></label>
			</td>
		</tr>
		<tr id="tr_Descripcion_Mante_Act">
			<td>Motivo Mantenimiento</td>
			<td>
				<textarea id="Descripcion_Mante_Act" name="Descripcion_Mante_Act" placeholder="Digite la descripción.." maxlength="250" onkeypress="ENTER(event,'modificarActivo()')" <?php if($res_principal[0]['Mantenimiento_Act']=='0'){ echo 'disabled="disabled"'; } ?>><?=$res_principal[0]['Descripcion_Mante_Act']?></textarea>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Verificación del Activo:</th></tr>
		<tr id="tr_Verificado_Act">
			<td>Verificación</td>
			<td id="td_Verificado_Act">
				<input id="Verificado_Act" name="Verificado_Act" class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($res_principal[0]['Verificado_Act']=='1'){ echo 'checked="checked"'; } ?> />
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
		<button class="boton" onclick="modificarActivo()" >Guardar</button>
		
		<?php if(in_array("3092",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
													   nombre_parametros,
													   document.querySelector('#pagina').value+';'+
													   document.querySelector('#inicio').value+';'+
													   valores_parametros)" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

	
<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>


		/*******************************************************************************************/
		/**********************************  Mostrar Efecto  ***************************************/
		/*******************************************************************************************/
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		
		/*******************************************************************************************/
		/**********************************  Efecto Imagén   ***************************************/
		/*******************************************************************************************/
		$('.dropify').dropify({
						messages: {
					        'default': 'Arraste y suelte aquí o haga clic',
					        'replace': 'Arraste y suelte aquí o haga clic para remplazar',
					        'remove':  'Eliminar',
					        'error':   'Ooops, ha ocurrido un error.'
					    },
					    error: {
					        'fileSize': 'El tamaño del archivo es muy grande ({{ value }} máx).',
					        'minWidth': 'El ancho del archivo es muy pequeño ({{ value }}}px min).',
					        'maxWidth': 'El ancho del archivo es muy grande ({{ value }}}px max).',
					        'minHeight': 'La altura del archivo es muy pequeña ({{ value }}}px min).',
					        'maxHeight': 'La altura del archivo es muy grande ({{ value }}px max).',
					        'imageFormat': 'El formato de la imagen no esta permitido ({{ value }} only).'
					    }


		});

		/*******************************************************************************************/
		/**********************************   CALENDARIO     ***************************************/
		/*******************************************************************************************/
		$( "#Fecha_Recepcion_Act" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});



		/*******************************************************************************************/
		/******************************   FOCUS INICIAL      ***************************************/
		/*******************************************************************************************/
		document.getElementById('Nombre_Act').focus();


		/*******************************************************************************************/
		/******************************  COMBOS CON BUSQUEDA  **************************************/
		/*******************************************************************************************/
		setFstDropdown();
	  

		/******************************************************************************/
		/*****************************  ZONA     **************************************/
		/******************************************************************************/
		document.querySelector("#Id_Zonas_tmp_Act").addEventListener('change',function(){
			

			if(this.value != document.querySelector("#Id_Zonas_tmp_Act_Actual").value){
				//Si cambia de ubicacion
				document.querySelector("#tr_MotivoCambioubicacion").style.display = "table-row";
				document.querySelector("#Id_Zonas_tmp_Act_Cambio").value = 1;
				document.querySelector("#motivoCambioUbicacion").value = "";

				//enviarCorreoTrasiego
				document.querySelector("#tr_MotivoCambioubicacionCorreo").style.display = "table-row";
				//document.querySelector("#enviarCorreoTrasiego").checked=true;

			}else{
				//Si regresa a la actual
				document.querySelector("#tr_MotivoCambioubicacion").style.display = "none";
				document.querySelector("#Id_Zonas_tmp_Act_Cambio").value = 0;
				document.querySelector("#motivoCambioUbicacion").value = "";
			}
		});


		/******************************************************************************/
		/*****************************  Desecho  **************************************/
		/******************************************************************************/
		document.querySelector("#Desecho_Act").addEventListener('click',function(){
			if(this.checked){
				//Limpiar donación
				document.querySelector("#Donacion_Act").checked=false;
				document.querySelector("#Descripcion_Dona_Act").value="";
				document.querySelector("#Descripcion_Dona_Act").disabled = true;


				//Limpiar mantenimiento
				document.querySelector("#Mantenimiento_Act").checked=false;
				document.querySelector("#Descripcion_Mante_Act").value="";
				document.querySelector("#Descripcion_Mante_Act").disabled = true;

				document.querySelector("#Descripcion_Dese_Act").disabled = false;
				document.querySelector("#Descripcion_Dese_Act").focus();

			}else{
				document.querySelector("#Descripcion_Dese_Act").value="";
				document.querySelector("#Descripcion_Dese_Act").disabled = true;
			}

		});	

		/******************************************************************************/
		/*****************************  Donación **************************************/
		/******************************************************************************/
		document.querySelector("#Donacion_Act").addEventListener('click',function(){
			if(this.checked){

				//Limpiar DESECHO
				document.querySelector("#Desecho_Act").checked=false;
				document.querySelector("#Descripcion_Dese_Act").value="";
				document.querySelector("#Descripcion_Dese_Act").disabled = true;


				//Limpiar mantenimiento
				document.querySelector("#Mantenimiento_Act").checked=false;
				document.querySelector("#Descripcion_Mante_Act").value="";
				document.querySelector("#Descripcion_Mante_Act").disabled = true;

				document.querySelector("#Descripcion_Dona_Act").disabled = false;
				document.querySelector("#Descripcion_Dona_Act").focus();

			}else{
				document.querySelector("#Descripcion_Dona_Act").value="";
				document.querySelector("#Descripcion_Dona_Act").disabled = true;
			}

		});	

		/******************************************************************************/
		/***************************   Mantenimiento  *********************************/
		/******************************************************************************/
		document.querySelector("#Mantenimiento_Act").addEventListener('click',function(){
			if(this.checked){

				//Limpiar DESECHO
				document.querySelector("#Desecho_Act").checked=false;
				document.querySelector("#Descripcion_Dese_Act").value="";
				document.querySelector("#Descripcion_Dese_Act").disabled = true;

				//Limpiar donación
				document.querySelector("#Donacion_Act").checked=false;
				document.querySelector("#Descripcion_Dona_Act").value="";
				document.querySelector("#Descripcion_Dona_Act").disabled = true;

				document.querySelector("#Descripcion_Mante_Act").disabled = false;
				document.querySelector("#Descripcion_Mante_Act").focus();

			}else{
				document.querySelector("#Descripcion_Mante_Act").value="";
				document.querySelector("#Descripcion_Mante_Act").disabled = true;
			}

		});			


		/*************************************************************/
		/*******************  ESTILO DROPIFY *************************/
		/*************************************************************/
        
		
		$('#tr_Foto_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Cargue la fotografía del activo (OPCIONAL)"
		});
		$('#tr_Nombre_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre del activo"
		});
		$('#tr_Marca_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite la marca del activo (OPCIONAL)"
		});
		$('#tr_Modelo_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el modelo del activo (OPCIONAL)"
		});
		$('#tr_Numero_Serie_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de serie (OPCIONAL)"
		});
		$('#tr_Color_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el color del activo (OPCIONAL)"
		});
		$('#tr_Descripcion_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite la descripción del activo"
		});
		$('#tr_Activo_Fijo_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción si el activo es un activo fijo"
		});
		
		<?php 
			//Si no tiene derecho a trasiego de activos
			if(!in_array("3098",$_SESSION['Permisos'])){ 
				$mensajeZona = "ATENCIÓN: Usted no cuenta con el permiso de trasiego de activos, por tanto no puede modificar la zona";
				$claseZona ="red";
			}else{
				$mensajeZona = "Seleccione la zona donde se encuentra físicamente el activo";
				$claseZona ="dark";
			}
		?>
		$('#tr_Id_Zonas_tmp_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'<?=$claseZona?>',
		
			  content: "<?=$mensajeZona?>"
		});
		$('#tr_MotivoCambioubicacion').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el motivo del cambio de la ubicación"
		});
		$('#tr_MotivoCambioubicacionCorreo').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque la casilla si desea enviar un correo de trasiego"
		});
		$('#tr_Id_Uni_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la institución a la que pertenece el activo"
		});
		$('#tr_Id_Res_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el responsable del activo"
		});
		$('#tr_Id_Cus_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el custodio del activo"
		});

		$('#tr_Id_INS_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de activo de la institución si cuenta con uno (OPCIONAL)"
		});

		$('#tr_Fecha_Recepcion_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la fecha de recepción del activo"
		});
		$('#tr_Tiempo_Garantia_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el tiempo de garantía que tiene el activo en meses!"
		});
		
		$('#tr_Id_OC').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el número de orden de compra"
		});
		$('#tr_Id_Factu_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el número de factura"
		});
		$('#tr_Costo_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el monto en colones del costo del producto"
		});
		$('#tr_Desecho_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción si el activo a sido desechado (OPCIONAL)"
		});
		$('#tr_Descripcion_Dese_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Se marca el activo como 'desecho', debe digitar una descripción del motivo"
		});
		$('#tr_Donacion_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción si el activo a sido donado (OPCIONAL)"
		});
		$('#tr_Descripcion_Dona_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Se marca el activo como 'donación', debe digitar una descripción del motivo"
		});
		$('#tr_Mantenimiento_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción si el activo a sido enviado a mantenimiento o garantía (OPCIONAL)"
		});
		$('#tr_Descripcion_Mante_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Se marca el activo como 'Mantenimiento', debe digitar una descripción del motivo"
		});
		$('#tr_Verificado_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Marque esta opción solo si garantiza que la información del activo es correcta! (NOTA: Se relaciona el ID de usuario con esta verificación)"
		});
		
</script>
