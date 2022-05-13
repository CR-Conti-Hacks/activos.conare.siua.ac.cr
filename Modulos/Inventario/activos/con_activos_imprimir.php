<?php
	
	/***************************************************************************/
    /****************************   HEADER   ***********************************/
    /***************************************************************************/
	header('Content-Type: text/html; charset=UTF-8');
	header("Cache-Control: no-cache, must-revalidate");
	
	/***************************************************************************/
    /*********************       TIME ZONE       *******************************/
    /***************************************************************************/
  	date_default_timezone_set('America/Costa_Rica');


	/***************************************************************************/
    /***************************    PATH     ***********************************/
    /***************************************************************************/
	$path = '../../../';


	/***************************************************************************/
	/**********************     REQUISITOS SAE        **************************/
	/***************************************************************************/
    include($path."Include/Bd/bd.php");
    include($path."configuracion.php");
    include($path."Include/Autenticacion/encriptacion.php");


    /*************************************************************************/
    /*******************  CONFIGURACIÓN ACTIVOS    ***************************/
    /*************************************************************************/
	include("configuracionActivos.php");


    /***************************************************************************/
	/**********************      DATOS DE USUARIO     **************************/
	/***************************************************************************/
    if(isset($_GET['Id_Per_Usu'])){
        //Obtenemos la llave de encriptación
	    $sql = "SELECT Llave_Encriptacion_Conf FROM tab_configuracion WHERE Id_Conf = 1";
		$llave = seleccion($sql);
     	$llave_encrip  = $llave[0]['Llave_Encriptacion_Conf'];
		
		//para recargar
		$pId_Per_Usu = $_GET['Id_Per_Usu'];
		$pcedula_global = $_GET['cedula_global'];
		$pKey_Usu = $_GET['Key_Usu'];

		//parametros globales	
		$Id_Per_Usu = desencriptar($_GET['Id_Per_Usu'],$llave_encrip);
		$cedula_global = desencriptar($_GET['cedula_global'],$llave_encrip);
		$Key_Usu = $_GET['Key_Usu'];


	}
	

	/***************************************************************************/
	/************************   COLORES         ********************************/
	/***************************************************************************/
	$colorDesecho 		= "#DE6363";
	$colorDonacion 		= "#DDAC56";
	$colorMantenimiento	= "#69A0AE";



    /***************************************************************************/
	/************************   PARAMETROS SAE  ********************************/
	/***************************************************************************/


	$sae_cantidadRegistros      = (isset($_GET['sae_cantidadRegistros']))   ? $_GET['sae_cantidadRegistros']    : ''; //Cantidad de regsitros iniciales
	$mostrar_efecto             = (isset($_GET['mostrar_efecto']))          ? $_GET['mostrar_efecto']           : '';


	/*************************************************************************/
	/****************************PARAMETROS  ACTIVO  *************************/
	/*************************************************************************/
    
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
    $bs_Activo_Fijo_Act         = (isset($_GET['bs_Activo_Fijo_Act']))      ? $_GET['bs_Activo_Fijo_Act']       : '';
	if(($bs_Activo_Fijo_Act=='false')||($bs_Activo_Fijo_Act=='')){
		$bs_Activo_Fijo_Act = FALSE;
	}elseif($bs_Activo_Fijo_Act){
		$bs_Activo_Fijo_Act = TRUE;
	}

    $bs_No_Activo_Fijo_Act       = (isset($_GET['bs_No_Activo_Fijo_Act']))    ? $_GET['bs_No_Activo_Fijo_Act']     : '';
	if(($bs_No_Activo_Fijo_Act=='false')||($bs_No_Activo_Fijo_Act=='')){
		$bs_No_Activo_Fijo_Act = FALSE;
	}elseif($bs_No_Activo_Fijo_Act){
		$bs_No_Activo_Fijo_Act = TRUE;
	}

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
	if(($bs_Desecho_Act=='false')||($bs_Desecho_Act=='')){
		$bs_Desecho_Act = FALSE;
	}elseif($bs_Desecho_Act){
		$bs_Desecho_Act = TRUE;
	}
    $bs_Donacion_Act            = (isset($_GET['bs_Donacion_Act']))         ? $_GET['bs_Donacion_Act']          : '';
	if(($bs_Donacion_Act=='false')||($bs_Donacion_Act=='')){
		$bs_Donacion_Act = FALSE;
	}elseif($bs_Donacion_Act){
		$bs_Donacion_Act = TRUE;
	}
	$bs_Mantenimiento_Act       = (isset($_GET['bs_Mantenimiento_Act']))    ? $_GET['bs_Mantenimiento_Act']    	: '';
	if(($bs_Mantenimiento_Act=='false')||($bs_Mantenimiento_Act=='')){
		$bs_Mantenimiento_Act = FALSE;
	}elseif($bs_Mantenimiento_Act){
		$bs_Mantenimiento_Act = TRUE;
	}
	
    $bs_Verificado_Act          = (isset($_GET['bs_Verificado_Act']))       ? $_GET['bs_Verificado_Act']        : '';
	if(($bs_Verificado_Act=='false')||($bs_Verificado_Act=='')){
		$bs_Verificado_Act = FALSE;
	}elseif($bs_Verificado_Act){
		$bs_Verificado_Act = TRUE;
	}
	$bs_No_Verificado_Act       = (isset($_GET['bs_No_Verificado_Act']))    ? $_GET['bs_No_Verificado_Act']     : '';
	if(($bs_No_Verificado_Act=='false')||($bs_No_Verificado_Act=='')){
		$bs_No_Verificado_Act = FALSE;
	}elseif($bs_No_Verificado_Act){
		$bs_No_Verificado_Act = TRUE;
	}
	

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



	/*************************************************************************/
	/*****************      PARAMETROS  CAMPOS       *************************/
	/*************************************************************************/

	//Campos
  	if(isset($_GET['campos'])){
	    $campos = strval($_GET['campos']);
	    //hacemos un explode para separar
	    $campos = explode(";", $campos);
	    //eliminamos el último campos
	    array_pop($campos);

  	}else{
    	$campos = 
    			"activo;".
    			"nombre;".
    			"marca;".
    			"modelo;".
    			"color;".
    			"serie;".
    			"descripcion;".

    			"institucional;".
    			"institucion;".

    			"activoFijo;".

    			"fechaRecepcion;".
    			"tiempoGarantia;".

    			"orden;".
    			"factura;".
    			"costo;".
    			"proveedor;".
    			"compromiso;".
    			"partida;".
    			"transferencia;".
    			
    			"zona;".

    			"responsable;".
    			"custodio;".

    			"desecho;".
    			"descripcionDesecho;".
    			"mantenimiento;".
    			"descripcionmantenimiento;".
    			"donacion;".
    			"descripcionDonacion;".

    			"verificado;".
    			"verificadoPor;".
    			"verificacionFecha;";
    	//hacemos un explode para separar
    	$campos = explode(";", $campos);

    	//eliminamos el último campos
    	array_pop($campos);
  	}



  	/*************************************************************************/
	/*****************      PARAMETROS  MOSTRAR      *************************/
	/*************************************************************************/
	if(isset($_GET['mostrar'])){
	    $mostrar = strval($_GET['mostrar']);
	    //hacemos un explode para separar
	    $mostrar = explode(";", $mostrar);
	    //eliminamos el último campos
	    array_pop($mostrar);

	}else{
		if($Ocultar_Activo_Institucional_ACON !='1'){
	    	$mostrar = "1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;";
	   	}else{
	   		$mostrar = "1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;";
	   	}
	    //hacemos un explode para separar
	    $mostrar = explode(";", $mostrar);
	    //eliminamos el último campos
	    array_pop($mostrar);
	}  


	/***************************************************************************/
	/*********** DETERMINAR A QUE UNIVERSIDAD PERTENECE EL USUARIO   ***********/
	/***************************************************************************/
	$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu;
	$resMiembroUni = seleccion($sql);


    
    /***************************************************************************/
	/************************   SQL PRINCIPAL   ********************************/
	/***************************************************************************/
	include("con_activos_imprimir_sql_principal.php");

?>
<html>
<head>
	<!-- ************************************************************************************************* -->
	<!-- ******************************* PARA DISEÑO  **************************************************** -->
	<!-- ************************************************************************************************* -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
	<!-- ************************************************************************************************* -->
	<!-- ******************************* ICONOS      **************************************************** -->
	<!-- ************************************************************************************************* -->
	<link rel='stylesheet prefetch' href='../../../css/EXTERNOS/fontawesome/css/all.css'>

	<!-- ************************************************************************************************* -->
	<!-- ******************************* PRELOADER     *************************************************** -->
	<!-- ************************************************************************************************* -->
	<link rel="stylesheet" href="aqua.min.css">

	<!-- ************************************************************************************************* -->
	<!-- ******************************* ESTILO       **************************************************** -->
	<!-- ************************************************************************************************* -->
	<link rel="stylesheet" href="con_Activos_imprimir.css">
	
</head>
<body>


<!-- ************************************************************************************************* -->
<!-- ******************************* PRELOADER     *************************************************** -->
<!-- ************************************************************************************************* -->
<div id="preloader" style="display: block;">
	<div id="preloader_contenedor">
		<div class="lds-dual-ring"></div>
		<br />
		<span>SAE: Generando Reporte...</span>
	</div>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->


<input type="hidden"	id="Id_Per_Usu" 				name="Id_Per_Usu" 				value="<?=$pId_Per_Usu?>" />
<input type="hidden"	id="cedula_global" 				name="cedula_global" 			value="<?=$pcedula_global?>" />
<input type="hidden"	id="Key_Usu" 					name="Key_Usu" 					value="<?=$pKey_Usu?>" />		

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

<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ********************************************    TITULO       ***************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<div class="jumbotron">
  <h1 id="titulo">SAE: Impresión de activos</h1>
</div>




<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ********************************************  CONFIGURACIÖN  ***************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<?php 
include("con_activos_imprimir_campos_orden.php");
?>




<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ********************************************     TABLA       ***************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<?php 
include("con_activos_imprimir_tabla.php");
?>

   




	<!-- ************************************************************************************************* -->
	<!-- ******************************* JQUERY       **************************************************** -->
	<!-- ************************************************************************************************* -->
    <script  src="../../../js/EXTERNAS/jquery-3.1.1.js"></script>

    <!-- ************************************************************************************************* -->
	<!-- ******************************* PARA DRAG AND DROP  ********************************************* -->
	<!-- ************************************************************************************************* -->
    <script  src="../../../Include/Miniaplicaciones/jQuery-Drag-drop-Sorting/jquery.sortable.min.js"></script>
    

    <!-- ************************************************************************************************* -->
	<!-- ******************************* PARA DISEÑO  **************************************************** -->
	<!-- ************************************************************************************************* -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	

	<!-- ************************************************************************************************* -->
	<!-- ******************************* SCRIPT       **************************************************** -->
	<!-- ************************************************************************************************* -->
	<script src="con_activos_imprimir_js.js"></script>

	<!-- ************************************************************************************************* -->
	<!-- *******************************PARA GUARDAR EL ARCHIVO ****************************************** -->
	<!-- ************************************************************************************************* -->
	<script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/libs/FileSaver/FileSaver.min.js"></script>

	<!-- ************************************************************************************************* -->
	<!-- *******************************PARA EXPORTAR EN XLSX     **************************************** -->
	<!-- ************************************************************************************************* -->
	<script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/libs/js-xlsx/xlsx.core.min.js"></script>

	<!-- ************************************************************************************************* -->
	<!-- **********************PARA EXPORTAR EN PDF (Sin soporte carecteres)     ************************* -->
	<!-- ************************************************************************************************* -->
	<script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/libs/jsPDF/jspdf.umd.min.js"></script>

	<!-- ************************************************************************************************* -->
	<!-- **********************PARA EXPORTAR EN PDF (CON soporte carecteres)     ************************* -->
	<!-- ************************************************************************************************* -->
	<!--script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/libs/pdfmake/pdfmake.min.js"></script-->
	<!--script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/libs/pdfmake/vfs_fonts.js"></script-->


	<!-- ************************************************************************************************* -->
	<!-- **********************            PARA EXPORTAR EN PNG                  ************************* -->
	<!-- ************************************************************************************************* -->
	<script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/libs/es6-promise/es6-promise.auto.min.js"></script>
	<script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/libs/html2canvas/html2canvas.min.js"></script>

	<!-- ************************************************************************************************* -->
	<!-- *******************************REQUERIDO TableExport ******************************************** -->
	<!-- ************************************************************************************************* -->
	<script type="text/javascript" src="../../../Include/Miniaplicaciones/tableExport.jquery.plugin/tableExport.min.js"></script>


</body>
</html>