<?php
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
	$sql .=   " Verificado_Act,
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
    
    
	//error_log($sql);
    $res_principal = seleccion($sql);

   // error_log($sql);
?>