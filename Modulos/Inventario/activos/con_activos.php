<?php
    
    /*************************************************************************/
    /****************************SEGURIDAD ***********************************/
    /*************************************************************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
  
    /*************************************************************************/
    /*******************  CONFIGURACIÓN ACTIVOS    ***************************/
    /*************************************************************************/
	include("configuracionActivos.php");



	/***************************************************************************/
	/************************   COLORES         ********************************/
	/***************************************************************************/
	$colorDesecho 		= "#DE6363";
	$colorDonacion 		= "#DDAC56";
	$colorMantenimiento	= "#69A0AE";





    /***************************************************************************/
	/************************   PARAMETROS  SAE  *******************************/
	/***************************************************************************/
	
	//Cantidad de regsitros iniciales
	$sae_cantidadRegistros      = (isset($_GET['sae_cantidadRegistros']))   ? $_GET['sae_cantidadRegistros']    : 10; 

    // Mostrar efecto
	$mostrar_efecto             = (isset($_GET['mostrar_efecto']))          ? $_GET['mostrar_efecto']           : '';
    

	/***************************************************************************/
	/************************   PARAMETROS   ACTIVO  ***************************/
	/***************************************************************************/
    
    //***************************************************************************************************************
    //Datos Activo 
    //***************************************************************************************************************
    $bs_Id_Act         		    = (isset($_GET['bs_Id_Act']))               ? $_GET['bs_Id_Act']                : '';
    $bs_Nombre_Act        	    = (isset($_GET['bs_Nombre_Act']))           ? $_GET['bs_Nombre_Act']            : '';
    $bs_Marca_Act               = (isset($_GET['bs_Marca_Act']))            ? $_GET['bs_Marca_Act']             : '';
    $bs_Modelo_Act              = (isset($_GET['bs_Modelo_Act']))           ? $_GET['bs_Modelo_Act']            : '';
    $bs_Color_Act               = (isset($_GET['bs_Color_Act']))            ? $_GET['bs_Color_Act']             : '';
	$bs_Numero_Serie_Act        = (isset($_GET['bs_Numero_Serie_Act']))     ? $_GET['bs_Numero_Serie_Act']      : '';

	
	//***************************************************************************************************************
    //Identificadores de Activo
    //***************************************************************************************************************
	$bs_Id_INS_Act     		    = (isset($_GET['bs_Id_INS_Act']))           ? $_GET['bs_Id_INS_Act']            : '';
    $bs_Id_Uni_Act              = (isset($_GET['bs_Id_Uni_Act']))           ? $_GET['bs_Id_Uni_Act']            : '0';

	
	
	//***************************************************************************************************************
	// Activo Fijo
	//***************************************************************************************************************
    $bs_Activo_Fijo_Act         = (isset($_GET['bs_Activo_Fijo_Act']))       ? $_GET['bs_Activo_Fijo_Act']        : '';
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

    //***************************************************************************************************************
    //Fecha y año Recepción
    //***************************************************************************************************************
	$bs_Fecha_Recepcion_Act		= (isset($_GET['bs_Fecha_Recepcion_Act']))  ? $_GET['bs_Fecha_Recepcion_Act']   : '';
	$bs_anno_inicio             = (isset($_GET['bs_anno_inicio']))          ? $_GET['bs_anno_inicio']        	: '';
	$bs_anno_fin             	= (isset($_GET['bs_anno_fin']))          	? $_GET['bs_anno_fin']        		: '';

	//***************************************************************************************************************
	//Datos de compra
	//***************************************************************************************************************
	$bs_Numero_OC            	= (isset($_GET['bs_Numero_OC']))         	? $_GET['bs_Numero_OC']          	: '0';
    $bs_Numero_Factu            = (isset($_GET['bs_Numero_Factu']))         ? $_GET['bs_Numero_Factu']          : '0';
	$bs_Numero_Prove            = (isset($_GET['bs_Numero_Prove']))         ? $_GET['bs_Numero_Prove']          : '0';

	$bs_Id_Compromiso    	    = (isset($_GET['bs_Id_Compromiso']))      	? $_GET['bs_Id_Compromiso']         : '0';
	$bs_Id_Partida    	    	= (isset($_GET['bs_Id_Partida']))      		? $_GET['bs_Id_Partida']       		: '0';
	$bs_Id_Transferencia   	    = (isset($_GET['bs_Id_Transferencia']))     ? $_GET['bs_Id_Transferencia']      : '0';


	//***************************************************************************************************************
	//Ubicación
	//***************************************************************************************************************
    $bs_Id_Zona_tmp_Act    	    = (isset($_GET['bs_Id_Zona_tmp_Act']))      ? $_GET['bs_Id_Zona_tmp_Act']       : '0';


    //***************************************************************************************************************
	//CONARE: Responsables
	//***************************************************************************************************************
	$bs_Id_Res   	    		= (isset($_GET['bs_Id_Res']))     			? $_GET['bs_Id_Res']      			: '0';
	$bs_Id_Cus   	    		= (isset($_GET['bs_Id_Cus']))     			? $_GET['bs_Id_Cus']      			: '0';

	
   
   	//***************************************************************************************************************
   	//Estado del activo: Desecho
   	//***************************************************************************************************************
    $bs_Desecho_Act             = (isset($_GET['bs_Desecho_Act']))          ? $_GET['bs_Desecho_Act']           : '';
	if(($bs_Desecho_Act=='false')||($bs_Desecho_Act=='')){
		$bs_Desecho_Act = FALSE;
	}elseif($bs_Desecho_Act){
		$bs_Desecho_Act = TRUE;
	}

   	//***************************************************************************************************************
   	//Estado del activo: Donación
   	//***************************************************************************************************************
    $bs_Donacion_Act            = (isset($_GET['bs_Donacion_Act']))         ? $_GET['bs_Donacion_Act']          : '';
	if(($bs_Donacion_Act=='false')||($bs_Donacion_Act=='')){
		$bs_Donacion_Act = FALSE;
	}elseif($bs_Donacion_Act){
		$bs_Donacion_Act = TRUE;
	}
   	
   	//***************************************************************************************************************
	//Estado del activo: Mantenimiento   	
	//***************************************************************************************************************
	$bs_Mantenimiento_Act           = (isset($_GET['bs_Mantenimiento_Act']))         ? $_GET['bs_Mantenimiento_Act']          : '';
	if(($bs_Mantenimiento_Act=='false')||($bs_Mantenimiento_Act=='')){

		$bs_Mantenimiento_Act = FALSE;
	}elseif($bs_Mantenimiento_Act){
		$bs_Mantenimiento_Act = TRUE;
	}
    

	//***************************************************************************************************************
	//Estado del activo: Verificación
	//***************************************************************************************************************
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



	
    
    
	/***************************************************************************/
	/************************      ORDENAMIENTO      ***************************/
	/***************************************************************************/
	
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

	$or_Activo_Fijo_Act   		= (isset($_GET['or_Activo_Fijo_Act']))		? $_GET['or_Activo_Fijo_Act'] 		: '';
    $or_tipo_Activo_Fijo_Act   	= (isset($_GET['or_tipo_Activo_Fijo_Act']))	? $_GET['or_tipo_Activo_Fijo_Act'] 	: 'ASC';

    
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $sae_cantidadRegistros;
    


	/***************************************************************************/
	/*********** DETERMINAR A QUE UNIVERSIDAD PERTENECE EL USUARIO   ***********/
	/***************************************************************************/
	$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu;
	$resMiembroUni = seleccion($sql);


    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
	$sql ="SELECT
			COUNT(Id_Act) AS Cant_Registros
			FROM tab_Activos
			INNER JOIN tab_zonas_tmp ON (Id_Zonas_tmp = Id_Zonas_tmp_Act)
			INNER JOIN tab_universidades ON (Id_Uni=Id_Uni_Act)
            INNER JOIN tab_facturas ON (Id_Factu=Id_Factu_Act)
            INNER JOIN tab_transferencias ON (Id_Trans=Id_Trans_Factu)
            INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
            INNER JOIN tab_compromisos ON (Id_Compr=Id_Compr_OC)
            INNER JOIN tab_partidas ON (Id_Parti=Id_Parti_OC)
            INNER JOIN tab_proveedores ON (Id_Prove=Id_Prove_OC)
			WHERE Activo_Act = '1'";	

	//MIEMBRO UNIVERSIDAD
	if(isset($resMiembroUni[0]['Id_Uni_PXU'])){
		if(count($resMiembroUni)>0){
					$sql.=" AND (";

                for($i=0;$i<count($resMiembroUni);$i++){
                	$sql.=" ( Id_Uni_Act =".$resMiembroUni[$i]['Id_Uni_PXU'].") ";
                	if(count($resMiembroUni) != ($i+1)){
                		$sql.=" OR ";
                	}
                }	
                	$sql.=" ) ";
        }
	}else{
		$sql.=" AND Id_Uni_Act =7";
	}

	//***************************************************************************************************************
	//Datos Activo 
	//***************************************************************************************************************
	if($bs_Id_Act  != "" ){
		$sql.=" AND Id_Act =".$bs_Id_Act;
	}
	if($bs_Nombre_Act  != "" ){
		$sql.=" AND Nombre_Act  like '%".$bs_Nombre_Act."%'";
	}
	if($bs_Marca_Act  != "" ){
		$sql.=" AND Marca_Act  like '%".$bs_Marca_Act."%'";
	}
    if($bs_Modelo_Act  != "" ){
		$sql.=" AND Modelo_Act  like '%".$bs_Modelo_Act."%'";
	}
    if($bs_Color_Act  != "" ){
		$sql.=" AND Color_Act  like '%".$bs_Color_Act."%'";
	}
	if($bs_Numero_Serie_Act  != "" ){
		$sql.=" AND Numero_Serie_Act  like '%".$bs_Numero_Serie_Act."%'";
	}


	//***************************************************************************************************************
	//Identificadores de Activo
	//***************************************************************************************************************
	if($bs_Id_INS_Act  != "" ){
		$sql.=" AND Id_INS_Act  like '%".$bs_Id_INS_Act."%'";
	}
	if($bs_Id_Uni_Act  != "0" ){
		$sql.=" AND Id_Uni_Act =".$bs_Id_Uni_Act;
	}

	//***************************************************************************************************************
	// Activo Fijo
	//***************************************************************************************************************
	if($bs_Activo_Fijo_Act){
		$sql.=" AND Activo_Fijo_Act  = 1";
	}
	if($bs_No_Activo_Fijo_Act){
		$sql.=" AND ( (Activo_Fijo_Act  = 0) OR (Activo_Fijo_Act  = '') OR (Activo_Fijo_Act  IS NULL))";
	}

	//***************************************************************************************************************
	//Fecha y año Recepción
	//***************************************************************************************************************
	if($bs_Fecha_Recepcion_Act  != "" ){
		$sql.=" AND Fecha_Recepcion_Act  like '%".$bs_Fecha_Recepcion_Act."%'";
	}
	if (($bs_anno_inicio  != "" ) && ($bs_anno_fin != "")){
		$sql.=" AND Fecha_Recepcion_Act >= CAST('".$bs_anno_inicio."' AS DATE)";
		$sql.=" AND Fecha_Recepcion_Act <= CAST('".$bs_anno_fin."' AS DATE)";
	}


	//***************************************************************************************************************
	//Datos de compra
	//***************************************************************************************************************
	if($bs_Numero_OC  != "0" ){
		$sql.=" AND Id_OC  =".$bs_Numero_OC;
	}
	if($bs_Numero_Factu  != "0" ){
		$sql.=" AND Id_Factu  =".$bs_Numero_Factu;
	}
	if($bs_Numero_Prove  != "0" ){
		$sql.=" AND Id_Prove  =".$bs_Numero_Prove;
	}

	if($bs_Id_Compromiso  != "0" ){
		$sql.=" AND Id_Compr  =".$bs_Id_Compromiso;
	}
	if($bs_Id_Partida!= "0" ){
		$sql.=" AND Id_Parti  =".$bs_Id_Partida;
	}
	if($bs_Id_Transferencia  != "0" ){
		$sql.=" AND Id_Trans_Factu  =".$bs_Id_Transferencia;
	}

	//***************************************************************************************************************
	//Ubicación
	//***************************************************************************************************************
    if($bs_Id_Zona_tmp_Act  != "0" ){
		$sql.=" AND Id_Zonas_tmp_Act =".$bs_Id_Zona_tmp_Act;
	}


	//***************************************************************************************************************
	//CONARE: Responsables
	//***************************************************************************************************************
	if($bs_Id_Res  != "0" ){
		$sql.=" AND Id_Res_Act  =".$bs_Id_Res;
	}
	if($bs_Id_Cus  != "0" ){
		$sql.=" AND Id_Cus_Act  =".$bs_Id_Cus;
	}


    //***************************************************************************************************************
	//Estados
	//***************************************************************************************************************
    if($bs_Desecho_Act){
		$sql.=" AND Desecho_Act  = ".$bs_Desecho_Act;
	}
    if($bs_Donacion_Act){
		$sql.=" AND Donacion_Act  = ".$bs_Donacion_Act;
	}
	if($bs_Mantenimiento_Act){
		$sql.=" AND Mantenimiento_Act  = ".$bs_Mantenimiento_Act;
	}

	//***************************************************************************************************************
	//Verificación
	//*************************************************************************************************************** 
    if($bs_Verificado_Act){
		$sql.=" AND Verificado_Act  = 1";
	}
	if($bs_No_Verificado_Act){
		$sql.=" AND Verificado_Act  = 0";
	}
    
    

	

	//Obtener los datos    
	$res_cant = seleccion($sql);
    


    /***************************************************************************/
	/*****************   CALCULO PAGINACION      *******************************/
	/***************************************************************************/
	$cant_pagi = ceil((int) $res_cant[0]['Cant_Registros'] / (int) $TAMANO_PAGINA);
	
	$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	} else {
		$inicio = (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	}
    
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
	$sql .=   " Activo_Fijo_Act,";


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
	$sql .=   " Verificado_Act ";
				
				
				
				
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
				WHERE Activo_Act = '1'";         
                
                



	//MIEMBRO UNIVERSIDAD
	
	if(isset($resMiembroUni[0]['Id_Uni_PXU'])){
		if(count($resMiembroUni)>0){
					$sql.=" AND (";

                for($i=0;$i<count($resMiembroUni);$i++){
                	$sql.=" ( Id_Uni_Act =".$resMiembroUni[$i]['Id_Uni_PXU'].") ";
                	if(count($resMiembroUni) != ($i+1)){
                		$sql.=" OR ";
                	}
                }	
                	$sql.=" ) ";
        }
	}


    //***************************************************************************************************************
	//Datos Activo 
	//***************************************************************************************************************
	if($bs_Id_Act  != "" ){
		$sql.=" AND Id_Act =".$bs_Id_Act;
	}
	if($bs_Nombre_Act  != "" ){
		$sql.=" AND Nombre_Act  like '%".$bs_Nombre_Act."%'";
	}
	if($bs_Marca_Act  != "" ){
		$sql.=" AND Marca_Act  like '%".$bs_Marca_Act."%'";
	}
    if($bs_Modelo_Act  != "" ){
		$sql.=" AND Modelo_Act  like '%".$bs_Modelo_Act."%'";
	}
    if($bs_Color_Act  != "" ){
		$sql.=" AND Color_Act  like '%".$bs_Color_Act."%'";
	}
	if($bs_Numero_Serie_Act  != "" ){
		$sql.=" AND Numero_Serie_Act  like '%".$bs_Numero_Serie_Act."%'";
	}


	//***************************************************************************************************************
	//Identificadores de Activo
	//***************************************************************************************************************
	if($bs_Id_INS_Act  != "" ){
		$sql.=" AND Id_INS_Act  like '%".$bs_Id_INS_Act."%'";
	}
	if($bs_Id_Uni_Act  != "0" ){
		$sql.=" AND Id_Uni_Act =".$bs_Id_Uni_Act;
	}

	//***************************************************************************************************************
	// Activo Fijo
	//***************************************************************************************************************
	if($bs_Activo_Fijo_Act){
		$sql.=" AND Activo_Fijo_Act  = 1";
	}
	if($bs_No_Activo_Fijo_Act){
		$sql.=" AND ( (Activo_Fijo_Act  = 0) OR (Activo_Fijo_Act  = '') OR (Activo_Fijo_Act  IS NULL))";
	}

	//***************************************************************************************************************
	//Fecha y año Recepción
	//***************************************************************************************************************
	if($bs_Fecha_Recepcion_Act  != "" ){
		$sql.=" AND Fecha_Recepcion_Act  like '%".$bs_Fecha_Recepcion_Act."%'";
	}
	if (($bs_anno_inicio  != "" ) && ($bs_anno_fin != "")){
		$sql.=" AND Fecha_Recepcion_Act >= CAST('".$bs_anno_inicio."' AS DATE)";
		$sql.=" AND Fecha_Recepcion_Act <= CAST('".$bs_anno_fin."' AS DATE)";
	}


	//***************************************************************************************************************
	//Datos de compra
	//***************************************************************************************************************
	if($bs_Numero_OC  != "0" ){
		$sql.=" AND Id_OC  =".$bs_Numero_OC;
	}
	if($bs_Numero_Factu  != "0" ){
		$sql.=" AND Id_Factu  =".$bs_Numero_Factu;
	}
	if($bs_Numero_Prove  != "0" ){
		$sql.=" AND Id_Prove  =".$bs_Numero_Prove;
	}

	if($bs_Id_Compromiso  != "0" ){
		$sql.=" AND Id_Compr  =".$bs_Id_Compromiso;
	}
	if($bs_Id_Partida!= "0" ){
		$sql.=" AND Id_Parti  =".$bs_Id_Partida;
	}
	if($bs_Id_Transferencia  != "0" ){
		$sql.=" AND Id_Trans_Factu  =".$bs_Id_Transferencia;
	}

	//***************************************************************************************************************
	//Ubicación
	//***************************************************************************************************************
    if($bs_Id_Zona_tmp_Act  != "0" ){
		$sql.=" AND Id_Zonas_tmp_Act =".$bs_Id_Zona_tmp_Act;
	}


	//***************************************************************************************************************
	//CONARE: Responsables
	//***************************************************************************************************************
	if($bs_Id_Res  != "0" ){
		$sql.=" AND Id_Res_Act  =".$bs_Id_Res;
	}
	if($bs_Id_Cus  != "0" ){
		$sql.=" AND Id_Cus_Act  =".$bs_Id_Cus;
	}


    //***************************************************************************************************************
	//Estados
	//***************************************************************************************************************
    if($bs_Desecho_Act){
		$sql.=" AND Desecho_Act  = ".$bs_Desecho_Act;
	}
    if($bs_Donacion_Act){
		$sql.=" AND Donacion_Act  = ".$bs_Donacion_Act;
	}
	if($bs_Mantenimiento_Act){
		$sql.=" AND Mantenimiento_Act  = ".$bs_Mantenimiento_Act;
	}

	//***************************************************************************************************************
	//Verificación
	//*************************************************************************************************************** 
    if($bs_Verificado_Act){
		$sql.=" AND Verificado_Act  = 1";
	}
	if($bs_No_Verificado_Act){
		$sql.=" AND Verificado_Act  = 0";
	}


    if ($or_Id_Act != "") {
	    $sql.=" ORDER BY ".$or_Id_Act.' '.$or_tipo_Id_Act;
	}else if($or_Nombre_Act !=''){
        $sql.=" ORDER BY ".$or_Nombre_Act.' '.$or_tipo_Nombre_Act;
    }else if($or_Marca_Act !=''){
        $sql.=" ORDER BY ".$or_Marca_Act.' '.$or_tipo_or_Marca_Act;
    }else if($or_Numero_Serie_Act !=''){
        $sql.=" ORDER BY ".$or_Numero_Serie_Act.' '.$or_tipo_Numero_Serie_Act;
    }else if($or_Nombre_Uni !=''){
        $sql.=" ORDER BY ".$or_Nombre_Uni.' '.$or_tipo_Nombre_Uni;
    }else if($or_Id_INS_Act !=''){
        $sql.=" ORDER BY ".$or_Id_INS_Act.' '.$or_tipo_Id_INS_Act;
    }else if($or_Nombre_Zonas_tmp !=''){
        $sql.=" ORDER BY ".$or_Nombre_Zonas_tmp.' '.$or_tipo_Nombre_Zonas_tmp;
    }else if($or_Activo_Fijo_Act !=''){
        $sql.=" ORDER BY ".$or_Activo_Fijo_Act.' '.$or_tipo_Activo_Fijo_Act;
    }else{       
	    $sql.=" ORDER BY Nombre_Act ASC";   
	}
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
	//error_log($sql);
    $res_principal = seleccion($sql);
    
//echo $sql;
?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
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


<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Activos</span>
	<br />
	<br />

	<hr class="contenedorConsultaInfoTipoEstadoActivolinea">
	<div class="contenedorConsultaInfoTipoEstadoActivo">
		<div style="background-color: <?= $colorDesecho?>;" class="contenedorConsultaInfoTipoEstadoActivoCirculo"></div>
		<span class="contenedorConsultaInfoTipoEstadoActivoTexto">Desecho</span>
	</div>
	<div class="contenedorConsultaInfoTipoEstadoActivo">
		<div style="background-color: <?= $colorDonacion?>;" class="contenedorConsultaInfoTipoEstadoActivoCirculo"></div>
		<span class="contenedorConsultaInfoTipoEstadoActivoTexto">Donación</span>
	</div>
	<div class="contenedorConsultaInfoTipoEstadoActivo">
		<div style="background-color: <?= $colorMantenimiento?>; " class="contenedorConsultaInfoTipoEstadoActivoCirculo"></div>
		<span class="contenedorConsultaInfoTipoEstadoActivoTexto">Mantenimiento</span>
	</div>

</div>


<!-- ***************************************************************************************-->
<!-- ********************** Formulario de busqueda    **************************************-->
<!-- ***************************************************************************************-->
<span class="centrado">
	<?=$texto['Mostrar_Busqueda']?>
	<a onclick="MostrarBusqueda()">
		<img src="img/SAE/buscar.png" alt="<?=$texto['Mostrar_Busqueda']?>" class="alineado_medio"/>
	</a>
</span>
<br />
<br />
<div id="Buscar" style="display:none;"  >
   	<?php
   		include("form_busqueda.php");
  	?>
	
</div>
<br />
<br />


<script>
var nombre_parametros_inicial = 	   	
										//paginación
										'pagina;inicio;'+

										//SAE
										'sae_cantidadRegistros;'+
										

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


var valores_parametros_inicial = 	
										//Paginación va dentro del código
										

										//SAE
										document.getElementById('sae_cantidadRegistros').value+';'+

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
								   		


var nombre_parametros_ordenamiento = 		
										//paginación
										'pagina;inicio;'+

										//SAE
										'sae_cantidadRegistros;'+

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
									   	'bs_No_Verificado_Act;';


var valores_parametros_ordenamiento = 		
										//Paginación reiniciar
										'0;0;'+

										//SAE
										document.getElementById('sae_cantidadRegistros').value+';'+

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
								   		document.getElementById('bs_No_Verificado_Act').checked+';';


var nombre_parametros_opcion = 		
										//Paginación
										'pagina;inicio;'+

										//Id_Act
										'Id_Act;'+
									
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
									    'or_tipo_Activo_Fijo_Act;'+

									    //SAE
										'sae_cantidadRegistros;';


var valores_parametros_opcion = 	

										//Paginación va dentro del código
										


										//Datos Activo //El ID_ACT se obtiene del código
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
								   		document.getElementById('or_tipo_Activo_Fijo_Act').value+';'+

										//SAE Debe ir al final
										document.getElementById('sae_cantidadRegistros').value+';';
</script>



<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	
	<br/>
	<br/>
	<div class="centrado">
		<?php if(in_array("3091",$_SESSION['Permisos'])){ ?>
		<button class="boton boton-gris" onclick="CargaPaginaMenu('Modulos/Inventario/activos/agr_activos.php',
													   nombre_parametros_inicial,
													   '0;0;'+
													   valores_parametros_inicial);">
													   <i class="fas fa-plus-circle"></i> Agregar</button>
		<?php } ?>	
		<button class="boton boton-gris" onclick="CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php','mostrar_efecto;','1;');">
													   <i class="fas fa-sync-alt"></i> Recargar</button>

		<?php if(in_array("3099",$_SESSION['Permisos'])){ ?>
		<button class="boton boton-gris" onclick="exportarTabla(<?=$pagina?>,<?=$inicio?>);">
													   <i class="fas fa-file-excel"></i> Exportar</button>
		<?php } ?>

													   
	</div>
	
	<br />
	<br />

	<!-- ****************************************************************************************** -->
	<!-- **************************       Combo Catindades Registros    *************************** -->
	<!-- ****************************************************************************************** -->

		
		<div class="centrado">
			<table class="centrado">
				<tr>
					<td>
						<label>Cantidad de Registros:</label>
					</td>
					<td style="width: 200px;">
						<select  id="sae_cantidadRegistros" name="sae_cantidadRegistros" 
						onChange="cambiaCantidadRegistros();
												window.scrollTo(0,0);"
						 class='fstdropdown-select' >
							<option value="10" <?php if($sae_cantidadRegistros == 10){ echo 'selected="selected"';} ?> >10</option>
							<option value="25" <?php if($sae_cantidadRegistros == 25){ echo 'selected="selected"';} ?> >25</option>
							<option value="100" <?php if($sae_cantidadRegistros == 100){ echo 'selected="selected"';} ?> >100</option>
							<option value="500" <?php if($sae_cantidadRegistros == 500){ echo 'selected="selected"';} ?> >500</option>
							<option value="1000" <?php if($sae_cantidadRegistros == 1000){ echo 'selected="selected"';} ?> >1000</option>
							<option value="2000" <?php if($sae_cantidadRegistros == 2000){ echo 'selected="selected"';} ?> >2000</option>
							<option value="3000" <?php if($sae_cantidadRegistros == 3000){ echo 'selected="selected"';} ?> >3000</option>
							<option value="6000" <?php if($sae_cantidadRegistros == 6000){ echo 'selected="selected"';} ?> >6000</option>
							<option value="10000" <?php if($sae_cantidadRegistros == 10000){ echo 'selected="selected"';} ?> >10000</option>
						</select>
					</td>
				</tr>
			</table>
		</div>
	
	<br/>
	<br/>
	<!-- ********************************************************************************************** -->
	<!-- **********************************  PAGINACION   ********************************************* -->
	<!-- ********************************************************************************************** -->
				<div class="Paginacion gris">
					<?php if ($pagina !=1){ ?>
						<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
																nombre_parametros_inicial,
																'<?=$pagina - 1 ?>;'+'<?=$inicio - $TAMANO_PAGINA ?>;'+
																valores_parametros_inicial);
									window.scrollTo(0,0);">
									<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
						&nbsp;&nbsp;&nbsp;
					<?php } ?>
					<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
					<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
						&nbsp;&nbsp;&nbsp;
						<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
															   nombre_parametros_inicial,
																'<?=$pagina + 1 ?>;'+'<?=$inicio + $TAMANO_PAGINA ?>;'+
																valores_parametros_inicial);
									window.scrollTo(0,0);">
									<img src="img/SAE/siguiente.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>   
					<?php } ?>
				</div>
	<!-- ********************************************************************************************** -->
	<!-- ******************************** FIN PAGINACION  ********************************************* -->
	<!-- ********************************************************************************************** -->

	<!-- ***************************************************************************************-->
	<!-- **********************Cantidad total de Registros **************************************-->
	<!-- ***************************************************************************************-->
	<span class="centrado gris font08"><?=$texto['Cantidad_Registros_X_Pagina'].' '.$res_cant[0]['Cant_Registros']?></span><br /><br />

<!-- ***************************************************************************************-->
<!-- **********************          TABLA            **************************************-->
<!-- ***************************************************************************************-->
<style type="text/css">
	#table_activos thead th {
    position: sticky;
    top:0;
}
</style>
    <table class="centrado width90P tabConsultaActivos" id="table_activos">		
            <tr class="centrado">
                <thead>
					<?php if(in_array("3093",$_SESSION['Permisos'])){ ?>
					<th>
						<?=$texto['Ver_Detalle']?>
					</th>
					<?php }?>
                    <th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Id_Act',
													'Id_Act',
													'or_tipo_Id_Act',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                                Activo
                        </a>
                    </th>
					<th>
                        Imagen
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Nombre_Act',
													'Nombre_Act',
													'or_tipo_Nombre_Act',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                                Nombre
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Marca_Act',
													'Marca_Act',
													'or_tipo_or_Marca_Act',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                                Marca
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Numero_Serie_Act',
													'Numero_Serie_Act',
													'or_tipo_Numero_Serie_Act',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                                # Serie
                        </a>
                    </th>
					
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Nombre_Uni',
													'Diminutivo_Uni',
													'or_tipo_Nombre_Uni',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                                Institución
                        </a>
                    </th>
					<th 
						<?php if($Ocultar_Activo_Institucional_ACON =='1'){?>
							style="display: none;"
						<?php } ?>
						>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Id_INS_Act',
													'Id_INS_Act',
													'or_tipo_Id_INS_Act',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                                Act. Insti.
                        </a>
                    </th>
                    <th>Histo-Activo</th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Nombre_Zonas_tmp',
													'Nombre_Zonas_tmp',
													'or_tipo_Nombre_Zonas_tmp',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                                Zona
                        </a>
                    </th>

                    

                    <th>Trasiegos</th>
                    <th>
                    	<a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Activo_Fijo_Act',
													'Activo_Fijo_Act',
													'or_tipo_Activo_Fijo_Act',
													nombre_parametros_ordenamiento,
													valores_parametros_ordenamiento
												);
								window.scrollTo(0,0);">
                    			Activo fijo
                    	</a>
                    </th>
					<?php if(in_array("3095",$_SESSION['Permisos'])){ ?>
						<th><?=$texto['Modificar']?></th>
					<?php } ?>
					<?php if(in_array("3096",$_SESSION['Permisos'])){ ?>
	                    <th><?=$texto['Eliminar']?></th>
					<?php }?>
					<?php if(in_array("3097",$_SESSION['Permisos'])){ ?>
						<th><?=$texto['Codigo']?></th>
					<?php } ?>
					<?php if(in_array("3094",$_SESSION['Permisos'])){ ?>
						<th>Verificar</th>
						<th>Histo-Veri</th>
					<?php } ?>
                </thead>
            </tr>
            
            <?php
            if(count($res_principal)>0){
                for($i=0;$i<count($res_principal);$i++){
            ?>
            <tr class="centrado" 

			<?php


				/*Para color de los desechos y donacion*/
				if ($res_principal[$i]['Desecho_Act']=='1' ){
					echo ' style="background-color: '.$colorDesecho.'"';
				}else if($res_principal[$i]['Donacion_Act']=='1' ){
					echo ' style="background-color: '.$colorDonacion.'"';
				}else if($res_principal[$i]['Mantenimiento_Act']=='1' ){
					echo ' style="background-color: '.$colorMantenimiento.'"';
				}

			?>
            >
				<?php if(in_array("3093",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<a onclick="MostrarDetalle('Modulos/Inventario/activos/ajax_detalle_activo.php','Id_Act;','<?=$res_principal[$i]['Id_Act']?>;','<?=$i?>');">
							<img name="img_detalle<?=$i?>" id="img_detalle<?=$i?>" alt="<?= $texto['Ver_Detalle']?>" src="img/SAE/mostrar_detalle.png"  />
						</a>		
					</td>
				<?php }?>
                <td class="centrado"><?=$Diminutivo_ACON?>-<?=$res_principal[$i]['Id_Act']?></td>
				<td class="centrado">
					<div class="img_redonda">
						<?php
							if($res_principal[$i]['Foto_Act']==''){
								
								$Foto_Act = $dominio.$ruta."img/inventario/activos/default.png";
							}else{
								
								//Obtenemos la foto
								$Foto_Act = "img/inventario/activos/".$res_principal[$i]['Foto_Act'];
								//verificamos si existe
								if(!file_exists($path.$Foto_Act)){
									$Foto_Act = $dominio.$ruta."img/inventario/activos/default.png";
								}else{
									//Le asignamos ruta Web
									$Foto_Act = $dominio.$ruta."img/inventario/activos/".$res_principal[$i]['Foto_Act'];
								}
							}
				
						
						?>
						<a id="fancybox_principal<?=$res_principal[$i]['Id_Act']?>" href="<?=$Foto_Act?>" data-fancybox-group="gallery" title="<?=$res_principal[$i]['Nombre_Act']?>">
							<img src="<?=$Foto_Act?>" style="height: 50px;">
						</a>
					</div>
				</td>
				<td class="centrado"><?=$res_principal[$i]['Nombre_Act']?></td>
				<td class="centrado"><?php if($res_principal[$i]['Marca_Act']==""){ echo "DESCONOCIDA";}else{ echo $res_principal[$i]['Marca_Act'];}?></td>
				<td class="centrado"><?php if($res_principal[$i]['Numero_Serie_Act']==""){ echo "DESCONOCIDO";}else{ echo $res_principal[$i]['Numero_Serie_Act'];}?></td>
				
				<td class="centrado"><?php if($res_principal[$i]['Id_Uni_Act']==""){ echo "DESCONOCIDO";}else{ echo $res_principal[$i]['Diminutivo_Uni'];}?></td>
				<td class="centrado" 
					<?php if($Ocultar_Activo_Institucional_ACON =='1'){?>
						style="display:none;"
					<?php }?>
					><?php if($res_principal[$i]['Id_INS_Act']==""){ echo "DESCONOCIDO";}else{ echo $res_principal[$i]['Id_INS_Act'];}?></td>
				<td class="centrado">
					<img src='img/SAE/ver_derechos.png'
									onClick="CargaPaginaMenu(
											'Modulos/Inventario/activos/historial_activo.php',
											nombre_parametros_opcion,
											'<?=$pagina?>;<?=$inicio?>;'+
											'<?=$res_principal[$i]['Id_Act']?>;'+
											valores_parametros_opcion
											)"/>
				</td>
				<td class="centrado"><?=$res_principal[$i]['Nombre_Zonas_tmp']?></td>
				
				<td class="centrado">
					<img src='img/SAE/ver_derechos.png'
									onClick="CargaPaginaMenu(
											'Modulos/Inventario/activos/historial_trasiegos.php',
											nombre_parametros_opcion,
											'<?=$pagina?>;<?=$inicio?>;'+
											'<?=$res_principal[$i]['Id_Act']?>;'+
											valores_parametros_opcion

											)"/>
				</td>
				<td class="centrado">
					<?php
						if($res_principal[$i]['Activo_Fijo_Act']=='' || $res_principal[$i]['Activo_Fijo_Act']==0){
							
							$AF = "img/SAE/no.png";
							$AF_valor = 0;
						}else{
							$AF = "img/SAE/si.png";
							$AF_valor = 1;
						}
					
					?>
					
					<?php 	if(in_array("3095",$_SESSION['Permisos'])){ ?>
						<img 
								name="imgAF<?=$i?>" 
								id="imgAF<?=$i?>" 
								style="width: 25px"
								data-valor="<?=$AF_valor ?>"
								src="<?=$AF?>" 
									onClick="modifica_Activo_Fijo(this.id, <?=$res_principal[$i]['Id_Act']?>);" />
					<?php 	}else{ ?>
						<img style="width: 25px" src="<?=$AF?>">
					<?php 
							}
					?>

				</td>
				
				<?php if(in_array("3095",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/modificar.png'
							onClick="CargaPaginaMenu(
											'Modulos/Inventario/activos/mod_activos.php',
											nombre_parametros_opcion,
											'<?=$pagina?>;<?=$inicio?>;'+
											'<?=$res_principal[$i]['Id_Act']?>;'+
											valores_parametros_opcion

											)"
											
					></td>
				<?php } ?>
				<?php if(in_array("3096",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<img src='img/SAE/eliminar.png' 
					 		onClick="MostrarVentana(
											this,
											1,
											'Modulos/Inventario/activos/eli_activos.php',
											nombre_parametros_opcion,
											'<?=$pagina?>;<?=$inicio?>;'+
											'<?=$res_principal[$i]['Id_Act']?>;'+
											valores_parametros_opcion
											)"
					
					></td>
				<?php } ?>
				<?php if(in_array("3097",$_SESSION['Permisos'])){ ?>
				<td class="centrado"><img src='img/SAE/facturas.png' 
				 onClick="MostrarVentana(
										this,
										1,
										'Modulos/Inventario/activos/imprimir_codigos.php',
										'Id_Act;',
										'<?=$res_principal[$i]['Id_Act']?>;')"
				
				></td>
				<?php } ?>
				<?php if(in_array("3094",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<input name="ch_verificar<?=$i?>" id="ch_verificar<?=$i?>"   class="cmn-toggle cmn-toggle-round" type="checkbox"  <?php if($res_principal[$i]['Verificado_Act']){ echo 'checked="checked"';}?>
							onclick="Verificar_Activo(this.id, <?=$res_principal[$i]['Id_Act']?>);"/>
						
						<label for="ch_verificar<?=$i?>"></label>
					</td>
					<td class="centrado">
						<img src='img/SAE/ver_derechos.png'
									onClick="CargaPaginaMenu(
											'Modulos/Inventario/activos/historial_verificar.php',
											nombre_parametros_opcion,
											'<?=$pagina?>;<?=$inicio?>;'+
											'<?=$res_principal[$i]['Id_Act']?>;'+
											valores_parametros_opcion
											)"/>
					</td>
				<?php } ?>
            </tr>
            <?php if(in_array("3093",$_SESSION['Permisos'])){ ?>
				<tr>
					<td colspan="16" >
						<div id="X<?=$i?>" style="display: none;" class="fondo_gris_oscuro">
						</div>
					</td>
				</tr>
			<?php } ?>
            <script type="text/javascript">
					$('#fancybox_principal<?=$res_principal[$i]['Id_Act']?>').fancybox();
			</script>
            <?php
                }
            }else{
            ?>
                <tr>
					<td colspan="17" class="centrado"><?=$texto['No_Datos']?></td>
				</tr>   
            <?php
            }
            ?>
    </table>
    
<!-- ********************************************************************************************** -->
<!-- **********************************  PAGINACION   ********************************************* -->
<!-- ********************************************************************************************** -->
			<div class="Paginacion gris">
				<?php if ($pagina !=1){ ?>
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
															nombre_parametros_inicial,
															'<?=$pagina - 1 ?>;'+'<?=$inicio - $TAMANO_PAGINA ?>;'+
															valores_parametros_inicial);
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
														   nombre_parametros_inicial,
															'<?=$pagina + 1 ?>;'+'<?=$inicio + $TAMANO_PAGINA ?>;'+
															valores_parametros_inicial);
								window.scrollTo(0,0);">
								<img src="img/SAE/siguiente.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>   
				<?php } ?>
			</div>
<!-- ********************************************************************************************** -->
<!-- ******************************** FIN PAGINACION  ********************************************* -->
<!-- ********************************************************************************************** -->

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<?php if(in_array("3091",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<?php if(in_array("3091",$_SESSION['Permisos'])){ ?>
		<button class="boton boton-gris" onclick="CargaPaginaMenu('Modulos/Inventario/activos/agr_activos.php',
													   nombre_parametros_inicial,
													   '0;0;'+
													   valores_parametros_inicial);">
													   <i class="fas fa-plus-circle"></i> Agregar</button>
		<?php } ?>	
		<button class="boton boton-gris" onclick="CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php','mostrar_efecto;','1;');">
													   <i class="fas fa-sync-alt"></i> Recargar</button>

		<?php if(in_array("3099",$_SESSION['Permisos'])){ ?>
		<button class="boton boton-gris" onclick="exportarTabla(<?=$pagina?>,<?=$inicio?>);">
													   <i class="fas fa-file-excel"></i> Exportar</button>
		<?php } ?>
	</div-->
	<?php } ?>


<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$( "#bs_Fecha_Recepcion_Act" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});

	$( "#bs_anno_inicio" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});
	$( "#bs_anno_fin" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});

	//Activar comobox filtro
	setFstDropdown();

	</script>
