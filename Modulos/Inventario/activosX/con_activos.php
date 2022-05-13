<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
    /*efectos*/
	$mostrar_efecto             = (isset($_GET['mostrar_efecto']))          ? $_GET['mostrar_efecto']           : '';
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
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
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
	if($bs_Id_Compromiso  != "0" ){
		$sql.=" AND Id_Compr  =".$bs_Id_Compromiso;
	}
	if($bs_Id_Partida!= "0" ){
		$sql.=" AND Id_Parti  =".$bs_Id_Partida;
	}
	if($bs_Id_Transferencia  != "0" ){
		$sql.=" AND Id_Trans_Factu  =".$bs_Id_Transferencia;
	}
	if($bs_Id_Act  != "" ){
		$sql.=" AND Id_Act =".$bs_Id_Act;
	}
    if($bs_Id_Zona_tmp_Act  != "0" ){
		$sql.=" AND Id_Zonas_tmp_Act =".$bs_Id_Zona_tmp_Act;
	}
    if($bs_Id_INS_Act  != "" ){
		$sql.=" AND Id_INS_Act  like '%".$bs_Id_INS_Act."%'";
	}
    if($bs_Id_UGIT_Act  != "" ){
		$sql.=" AND Id_UGIT_Act  like '%".$bs_Id_UGIT_Act."%'";
	}
    if($bs_Numero_Factu  != "0" ){
		$sql.=" AND Id_Factu  =".$bs_Numero_Factu;
	}
	if($bs_Numero_OC  != "0" ){
		$sql.=" AND Id_OC  =".$bs_Numero_OC;
	}
	if($bs_Numero_Prove  != "0" ){
		$sql.=" AND Id_Prove  =".$bs_Numero_Prove;
	}
    if($bs_Id_Uni_Act  != "0" ){
		$sql.=" AND Id_Uni_Act =".$bs_Id_Uni_Act;
	}
    if($bs_Fecha_Recepcion_Act  != "" ){
		$sql.=" AND Fecha_Recepcion_Act  like '%".$bs_Fecha_Recepcion_Act."%'";
	}
    if($bs_Nombre_Act  != "" ){
		$sql.=" AND Nombre_Act  like '%".$bs_Nombre_Act."%'";
	}
    if($bs_Desecho_Act){
		$sql.=" AND Desecho_Act  = ".$bs_Desecho_Act;
	}
    if($bs_Donacion_Act){
		$sql.=" AND Donacion_Act  = ".$bs_Donacion_Act;
	}
    if($bs_Verificado_Act){
		$sql.=" AND Verificado_Act  = 1";
	}
	if($bs_No_Verificado_Act){
		$sql.=" AND Verificado_Act  = 0";
	}
    if($bs_Numero_Serie_Act  != "" ){
		$sql.=" AND Numero_Serie_Act  like '%".$bs_Numero_Serie_Act."%'";
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
	$sql ="SELECT
				Id_Act,
				Id_Zonas_tmp_Act,
				Nombre_Zonas_tmp,
				Id_INS_Act,
				Id_UGIT_Act,
				Id_Factu_Act,
				Id_Uni_Act,
				Diminutivo_Uni,
				Fecha_Recepcion_Act,
				Nombre_Act,
				Descripcion_Act,
				Foto_Act,
				Costo_Act,
				Desecho_Act,
				Descripcion_Dese_Act,
				Donacion_Act,
				Descripcion_Dona_Act,
				Verificado_Act,
				Numero_Serie_Act,
				Marca_Act,
				Modelo_Act,
				Color_Act,
                Id_Factu,
                Numero_Factu,
                Id_Trans_Factu,
                Numero_Trans,
                Id_OC,
                Numero_OC,
                Id_Compr,
                Numero_Compr,
                Id_Parti_OC,
                Numero_Parti,
                Id_Prove,
                Nombre_Prove
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
    if($bs_Id_Compromiso  != "0" ){
		$sql.=" AND Id_Compr  =".$bs_Id_Compromiso;
	}
	if($bs_Id_Partida!= "0" ){
		$sql.=" AND Id_Parti  =".$bs_Id_Partida;
	}
	if($bs_Id_Transferencia  != "0" ){
		$sql.=" AND Id_Trans_Factu  =".$bs_Id_Transferencia;
	}
	if($bs_Id_Act  != "" ){
		$sql.=" AND Id_Act =".$bs_Id_Act;
	}
    if($bs_Id_Zona_tmp_Act  != "0" ){
		$sql.=" AND Id_Zonas_tmp_Act =".$bs_Id_Zona_tmp_Act;
	}
    if($bs_Id_INS_Act  != "" ){
		$sql.=" AND Id_INS_Act  like '%".$bs_Id_INS_Act."%'";
	}
    if($bs_Id_UGIT_Act  != "" ){
		$sql.=" AND Id_UGIT_Act  like '%".$bs_Id_UGIT_Act."%'";
	}
    if($bs_Numero_Factu  != "0" ){
		$sql.=" AND Id_Factu  =".$bs_Numero_Factu;
	}
	if($bs_Numero_OC  != "0" ){
		$sql.=" AND Id_OC  =".$bs_Numero_OC;
	}
	if($bs_Numero_Prove  != "0" ){
		$sql.=" AND Id_Prove  =".$bs_Numero_Prove;
	}
    if($bs_Id_Uni_Act  != "0" ){
		$sql.=" AND Id_Uni_Act =".$bs_Id_Uni_Act;
	}
    if($bs_Fecha_Recepcion_Act  != "" ){
		$sql.=" AND Fecha_Recepcion_Act  like '%".$bs_Fecha_Recepcion_Act."%'";
	}
    if($bs_Nombre_Act  != "" ){
		$sql.=" AND Nombre_Act  like '%".$bs_Nombre_Act."%'";
	}
    if($bs_Desecho_Act){
		$sql.=" AND Desecho_Act  = ".$bs_Desecho_Act;
	}
    if($bs_Donacion_Act){
		$sql.=" AND Donacion_Act  = ".$bs_Donacion_Act;
	}
    if($bs_Verificado_Act){
		$sql.=" AND Verificado_Act  = 1";
	}
	if($bs_No_Verificado_Act){
		$sql.=" AND Verificado_Act  = 0";
	}
    if($bs_Numero_Serie_Act  != "" ){
		$sql.=" AND Numero_Serie_Act  like '%".$bs_Numero_Serie_Act."%'";
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
    }else if($or_Id_UGIT_Act !=''){
        $sql.=" ORDER BY ".$or_Id_UGIT_Act.' '.$or_tipo_Id_UGIT;
    }else if($or_Id_Nombre_Zonas_tmp !=''){
        $sql.=" ORDER BY ".$or_Id_Nombre_Zonas_tmp.' '.$or_tipo_Nombre_Zonas_tmp;
    }else{
	    $sql.=" ORDER BY Nombre_Act ASC";   
	}
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
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
<input type="hidden" 	id="or_Id_UGIT_Act" 			name="or_Id_UGIT_Act" 			value="<?=$or_Id_UGIT_Actt?>" />
<input type="hidden" 	id="or_tipo_Id_UGIT" 			name="or_tipo_Id_UGIT" 			value="<?=$or_tipo_Id_UGIT?>" />
<input type="hidden" 	id="or_Nombre_Zonas_tmp" 		name="or_Nombre_Zonas_tmp" 		value="<?=$or_Nombre_Zonas_tmp?>" />
<input type="hidden" 	id="or_tipo_Nombre_Zonas_tmp" 	name="or_tipo_Nombre_Zonas_tmp" value="<?=$or_tipo_Nombre_Zonas_tmp?>" />

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Activos</span>
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
    <table class="width80P centrado" >
		<!-- *********************************************************************************************************************************************-->
		<!-- ******************************************      BUSQUEDA FILA 1       ***********************************************************************-->
		<!-- *********************************************************************************************************************************************-->
		<tr>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">N° Activo:</td>
			<td>
				<input type="text" name="bs_Id_Act" id="bs_Id_Act"  maxlength="30" value="<?=$bs_Id_Act?>" placeholder="Digite el número de activo..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 2           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Nombre:</td>
			<td>
				<input type="text" name="bs_Nombre_Act" id="bs_Nombre_Act"  maxlength="200" value="<?=$bs_Nombre_Act?>" placeholder="Digite el nombre del activo..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 3           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Orden:</td>
			<td>
				<select id="bs_Numero_OC" name="bs_Numero_OC" onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_OC,Numero_OC FROM tab_ordenes_compras WHERE Activo_OC = '1' ORDER BY Numero_OC";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_OC']?>"
						<?php
							if($bs_Numero_OC==$res[$i]['Id_OC']){
								echo 'selected="selected"';
							}
						?>
						
						><?=$res[$i]['Numero_OC']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<!-- *********************************************************************************************************************************************-->
		<!-- ******************************************      BUSQUEDA FILA 2       ***********************************************************************-->
		<!-- *********************************************************************************************************************************************-->
		<tr>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">N° Act. Institucional:</td>
			<td>
				<input type="text" name="bs_Id_INS_Act" id="bs_Id_INS_Act"  maxlength="45" value="<?=$bs_Id_INS_Act?>" placeholder="Digite el número de activo institucional..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 2           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Marca:</td>
			<td>
				<input type="text" name="bs_Marca_Act" id="bs_Marca_Act"  maxlength="150" value="<?=$bs_Marca_Act?>" placeholder="Digite la marca del activo..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 3           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">N° Factura:</td>
			<td>
				<div id="div_Id_Factu_Act">
					<select id="bs_Numero_Factu" name="bs_Numero_Factu" <?php if($bs_Numero_OC=='' || $bs_Numero_OC=='0'){ echo 'disabled="disabled"'; } ?>
					onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
						<option value="0">[Seleccione]</option>
						<?php
						if($bs_Numero_OC!=''){
							$sql ="SELECT Id_Factu,Numero_Factu FROM tab_facturas WHERE Activo_Factu = '1' AND  Id_OC_Factu=".$bs_Numero_OC." ORDER BY Numero_Factu";
							$res = seleccion($sql);
							for($i=0;$i<count($res);$i++){
						?>
							<option value="<?=$res[$i]['Id_Factu']?>"
							<?php
								if($bs_Numero_Factu==$res[$i]['Id_Factu']){
									echo 'selected="selected"';
								}
							?>
							
							><?=$res[$i]['Numero_Factu']?></option>
						<?php
							}
						}
						?>
					</select>
				</div>
			</td>
		</tr>
		<!-- *********************************************************************************************************************************************-->
		<!-- ******************************************      BUSQUEDA FILA 3       ***********************************************************************-->
		<!-- *********************************************************************************************************************************************-->
		<tr>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">N° Act. UGIT:</td>
			<td>
				<input type="text" name="bs_Id_UGIT_Act" id="bs_Id_UGIT_Act"  maxlength="45" value="<?=$bs_Id_UGIT_Act?>" placeholder="Digite el número de activo UGIT..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 2           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Modelo:</td>
			<td>
				<input type="text" name="bs_Modelo_Act" id="bs_Modelo_Act"  maxlength="150" value="<?=$bs_Modelo_Act?>" placeholder="Digite el modelo del activo..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 3           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Proveedor:</td>
			<td>
				<select id="bs_Numero_Prove" name="bs_Numero_Prove" onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Prove,Nombre_Prove FROM tab_proveedores WHERE Activo_Prove = '1' ORDER BY Nombre_Prove";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Prove']?>"
						<?php
							if($bs_Numero_Prove==$res[$i]['Id_Prove']){
								echo 'selected="selected"';
							}
						?>
						
						><?=$res[$i]['Nombre_Prove']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<!-- *********************************************************************************************************************************************-->
		<!-- ******************************************      BUSQUEDA FILA 4       ***********************************************************************-->
		<!-- *********************************************************************************************************************************************-->
		<tr>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">N° Serie:</td>
			<td>
				<input type="text" name="bs_Numero_Serie_Act" id="bs_Numero_Serie_Act"  maxlength="150" value="<?=$bs_Numero_Serie_Act?>" placeholder="Digite el número de serie..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 2           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Color:</td>
			<td>
				<input type="text" name="bs_Color_Act" id="bs_Color_Act"  maxlength="150" value="<?=$bs_Color_Act?>" placeholder="Digite el color del activo..."
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 3           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Compromiso:</td>
			<td>
				<select id="bs_Id_Compromiso" name="bs_Id_Compromiso" onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Compr,Numero_Compr FROM tab_compromisos WHERE Activo_Compr = '1' ORDER BY Numero_Compr";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Compr']?>"
						<?php
							if($bs_Id_Compromiso==$res[$i]['Id_Compr']){
								echo 'selected="selected"';
							}
						?>
						
						><?=$res[$i]['Numero_Compr']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<!-- *********************************************************************************************************************************************-->
		<!-- ******************************************      BUSQUEDA FILA 5       ***********************************************************************-->
		<!-- *********************************************************************************************************************************************-->
		<tr>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Zona:</td>
			<td>
				<select id="bs_Id_Zona_tmp_Act" name="bs_Id_Zona_tmp_Act" onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Zonas_tmp,Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Activo_Zonas_tmp = '1' ORDER BY Nombre_Zonas_tmp";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Zonas_tmp']?>"
						<?php
							if($bs_Id_Zona_tmp_Act==$res[$i]['Id_Zonas_tmp']){
								echo 'selected="selected"';
							}
						?>
						><?=$res[$i]['Nombre_Zonas_tmp']?></option>
					<?php
						}
					?>
				</select>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 2           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Institución:</td>
			<td>
				<select id="bs_Id_Uni_Act" name="bs_Id_Uni_Act" onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Uni,Diminutivo_Uni FROM tab_universidades WHERE Activo_Uni = '1' ORDER BY Diminutivo_Uni";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Uni']?>"
						<?php
							if($bs_Id_Uni_Act==$res[$i]['Id_Uni']){
								echo 'selected="selected"';
							}
						?>
						
						><?=$res[$i]['Diminutivo_Uni']?></option>
					<?php
						}
					?>
				</select>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 3           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Partida:</td>
			<td>
				<select id="bs_Id_Partida" name="bs_Id_Partida" onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Parti,Numero_Parti FROM tab_partidas WHERE Activo_Parti = '1' ORDER BY Numero_Parti";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Parti']?>"
						<?php
							if($bs_Id_Partida==$res[$i]['Id_Parti']){
								echo 'selected="selected"';
							}
						?>
						><?=$res[$i]['Numero_Parti']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<!-- *********************************************************************************************************************************************-->
		<!-- ******************************************      BUSQUEDA FILA 6       ***********************************************************************-->
		<!-- *********************************************************************************************************************************************-->
		<tr>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Verificado:</td>
			<td>
				<input name="bs_Verificado_Act" id="bs_Verificado_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox"  <?php if($bs_Verificado_Act){ echo 'checked="checked"';}?>
				onclick="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';'); document.getElementById('bs_No_Verificado_Act').checked=false;"/>
				<label for="bs_Verificado_Act"></label>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 2           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">No Verificado:</td>
			<td>
				<input name="bs_No_Verificado_Act" id="bs_No_Verificado_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_No_Verificado_Act){ echo 'checked="checked"';}?>
				onclick="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';'); document.getElementById('bs_Verificado_Act').checked=false;""/>
				<label for="bs_No_Verificado_Act"></label>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 3           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Transferencia:</td>
			<td>
				<select id="bs_Id_Transferencia" name="bs_Id_Transferencia" onchange="Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Trans,Numero_Trans FROM tab_transferencias WHERE Activo_Trans = '1' ORDER BY Numero_Trans";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Trans']?>"
						<?php
							if($bs_Id_Transferencia==$res[$i]['Id_Trans']){
								echo 'selected="selected"';
							}
						?>
						><?=$res[$i]['Numero_Trans']?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<!-- *********************************************************************************************************************************************-->
		<!-- ******************************************      BUSQUEDA FILA 7       ***********************************************************************-->
		<!-- *********************************************************************************************************************************************-->
		<tr>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Desecho:</td>
			<td>
				<input name="bs_Desecho_Act" id="bs_Desecho_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_Desecho_Act){ echo 'checked="checked"';}?>
				onclick="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
				<label for="bs_Desecho_Act"></label>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 2           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Donación:</td>
			<td>
				<input name="bs_Donacion_Act" id="bs_Donacion_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_Donacion_Act){ echo 'checked="checked"';}?>
				onclick="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
				<label for="bs_Donacion_Act"></label>
			</td>
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 3           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco">Fecha de Recepción:</td>
			<td>
				<input name="bs_Fecha_Recepcion_Act" id="bs_Fecha_Recepcion_Act"   type="text"  placeholder="Seleccione la fecha de recepción" readonly value="<?=$bs_Fecha_Recepcion_Act?>"
				onclick="Buscar(
								event,
								'Modulos/Inventario/activos/con_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');"/>
			</td>
		</tr>
	</table>
	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/Inventario/activos/con_activos.php',
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
								document.getElementById('bs_Desecho_Act').checked+';'+
								document.getElementById('bs_Donacion_Act').checked+';'+
								document.getElementById('bs_Verificado_Act').checked+';'+
								document.getElementById('bs_No_Verificado_Act').checked+';'+
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
								document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';'
							);"
	><?=$texto['Buscar']?></button>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<?php if(in_array("3091",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/activos/agr_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
													   Agregar Activo</button>
	</div-->
	<?php } ?>
<br />
<br />
<!-- ***************************************************************************************-->
<!-- **********************Cantidad total de Registros **************************************-->
<!-- ***************************************************************************************-->
<span class="centrado gris font08"><?=$texto['Cantidad_Registros_X_Pagina'].' '.$res_cant[0]['Cant_Registros']?></span><br /><br />

<!-- ***************************************************************************************-->
<!-- **********************          TABLA            **************************************-->
<!-- ***************************************************************************************-->
    <table class="centrado width90P">		
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
												);
								window.scrollTo(0,0);">
                                Institución
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Id_INS_Act',
													'Id_INS_Act',
													'or_tipo_Id_INS_Act',
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
												);
								window.scrollTo(0,0);">
                                Act. Insti.
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Id_UGIT_Act',
													'Id_UGIT_Act',
													'or_tipo_Id_UGIT',
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
												);
								window.scrollTo(0,0);">
                                Act. UGIT.
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/activos/con_activos.php',
													'or_Nombre_Zonas_tmp',
													'Nombre_Zonas_tmp',
													'or_tipo_Nombre_Zonas_tmp',
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
													'bs_Color_Act;',
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
													document.getElementById('bs_Desecho_Act').checked+';'+
													document.getElementById('bs_Donacion_Act').checked+';'+
													document.getElementById('bs_Verificado_Act').checked+';'+
													document.getElementById('bs_No_Verificado_Act').checked+';'+
													document.getElementById('bs_Numero_Serie_Act').value+';'+
													document.getElementById('bs_Marca_Act').value+';'+
													document.getElementById('bs_Modelo_Act').value+';'+
													document.getElementById('bs_Color_Act').value+';'
												);
								window.scrollTo(0,0);">
                                Zona
                        </a>
                    </th>
                    <th><?=$texto['Modificar']?></th>
                    <th><?=$texto['Eliminar']?></th>
					<th>Verificar</th>
                </thead>
            </tr>
            
            <?php
            if(count($res_principal)>0){
                for($i=0;$i<count($res_principal);$i++){
            ?>
            <tr class="centrado">
				<?php if(in_array("3093",$_SESSION['Permisos'])){ ?>
					<td class="centrado">
						<a onclick="MostrarDetalle('Modulos/Inventario/activos/ajax_detalle_activo.php','Id_Act;','<?=$res_principal[$i]['Id_Act']?>;','<?=$i?>');">
							<img name="img_detalle<?=$i?>" id="img_detalle<?=$i?>" alt="<?= $texto['Ver_Detalle']?>" src="img/SAE/mostrar_detalle.png"  />
						</a>		
					</td>
				<?php }?>
                <td class="centrado">SIUA-<?=$res_principal[$i]['Id_Act']?></td>
				<td class="centrado">
					<div class="img_redonda">
						<?php
							if($res_principal[$i]['Foto_Act']==''){
								
								$Foto_Act = "img/inventario/activos/default.png";
							}else{
								$Foto_Act = "img/inventario/activos/default.png".$res_principal[$i]['Foto_Act'];
							}
						
						?>
						<a id="fancybox<?=$res_principal[$i]['Id_Act']?>" href="<?=$Foto_Act?>" data-fancybox-group="gallery" title="<?=$res_principal[$i]['Nombre_Act']?>">
							<img src="<?=$Foto_Act?>" style="height: 50px;">
						</a>
					</div>
				</td>
				<td class="centrado"><?=$res_principal[$i]['Nombre_Act']?></td>
				<td class="centrado"><?php if($res_principal[$i]['Marca_Act']==""){ echo "DESCONOCIDA";}else{ echo $res_principal[$i]['Marca_Act'];}?></td>
				<td class="centrado"><?php if($res_principal[$i]['Numero_Serie_Act']==""){ echo "DESCONOCIDO";}else{ echo $res_principal[$i]['Numero_Serie_Act'];}?></td>
				
				<td class="centrado"><?php if($res_principal[$i]['Id_Uni_Act']==""){ echo "DESCONOCIDO";}else{ echo $res_principal[$i]['Diminutivo_Uni'];}?></td>
				<td class="centrado"><?php if($res_principal[$i]['Id_INS_Act']==""){ echo "DESCONOCIDO";}else{ echo $res_principal[$i]['Id_INS_Act'];}?></td>
				<td class="centrado"><?php if($res_principal[$i]['Id_UGIT_Act']==""){ echo "DESCONOCIDO";}else{ echo $res_principal[$i]['Id_UGIT_Act'];}?></td>
				<td class="centrado"><?=$res_principal[$i]['Nombre_Zonas_tmp']?></td>
				
                <td class="centrado"><img src='img/SAE/modificar.png'
                onClick="CargaPaginaMenu(
										'Modulos/Inventario/activos/mod_activos.php',
										'Id_Act;'+
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
										'<?=$res_principal[$i]['Id_Act']?>;'+
										'<?=$pagina?>;<?=$inicio?>;'+
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
										document.getElementById('bs_Desecho_Act').checked+';'+
										document.getElementById('bs_Donacion_Act').checked+';'+
										document.getElementById('bs_Verificado_Act').checked+';'+
										document.getElementById('bs_No_Verificado_Act').checked+';'+
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
										document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';')"
                                        
                ></td>
                <td class="centrado"><img src='img/SAE/eliminar.png' 
				 onClick="MostrarVentana(
										this,
										1,
										'Modulos/Inventario/activos/eli_activos.php',
										'Id_Act;'+
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
										'<?=$res_principal[$i]['Id_Act']?>;'+
										'<?=$pagina?>;<?=$inicio?>;'+
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
										document.getElementById('bs_Desecho_Act').checked+';'+
										document.getElementById('bs_Donacion_Act').checked+';'+
										document.getElementById('bs_Verificado_Act').checked+';'+
										document.getElementById('bs_No_Verificado_Act').checked+';'+
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
										document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';')"
				
				></td>
				<td class="centrado">
					<input name="ch_verificar<?=$i?>" id="ch_verificar<?=$i?>"   class="cmn-toggle cmn-toggle-round" type="checkbox"  <?php if($res_principal[$i]['Verificado_Act']){ echo 'checked="checked"';}?>
						onclick="Verificar_Activo(this.id, <?=$res_principal[$i]['Id_Act']?>);"/>
					
					<label for="ch_verificar<?=$i?>"></label>
				</td>
            </tr>
            <?php if(in_array("3093",$_SESSION['Permisos'])){ ?>
				<tr>
					<td colspan="12" >
						<div id="X<?=$i?>" style="display: none;" class="fondo_gris_oscuro">
						</div>
					</td>
				</tr>
			<?php } ?>
            <script type="text/javascript">
					$('#fancybox<?=$res_principal[$i]['Id_Act']?>').fancybox();
			</script>
            <?php
                }
            }else{
            ?>
                <tr>
					<td colspan="13" class="centrado"><?=$texto['No_Datos']?></td>
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
															'<?=$pagina - 1 ?>;'+'<?=$inicio - $TAMANO_PAGINA ?>;'+
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
															document.getElementById('bs_Desecho_Act').checked+';'+
															document.getElementById('bs_Donacion_Act').checked+';'+
															document.getElementById('bs_Verificado_Act').checked+';'+
															document.getElementById('bs_No_Verificado_Act').checked+';'+
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
															document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
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
															'<?=$pagina + 1 ?>;'+'<?=$inicio + $TAMANO_PAGINA ?>;'+
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
															document.getElementById('bs_Desecho_Act').checked+';'+
															document.getElementById('bs_Donacion_Act').checked+';'+
															document.getElementById('bs_Verificado_Act').checked+';'+
															document.getElementById('bs_No_Verificado_Act').checked+';'+
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
															document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');
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
		<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/activos/agr_activos.php',
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
													   document.getElementById('bs_Desecho_Act').checked+';'+
													   document.getElementById('bs_Donacion_Act').checked+';'+
													   document.getElementById('bs_Verificado_Act').checked+';'+
													   document.getElementById('bs_No_Verificado_Act').checked+';'+
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
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');">
													   Agregar Activo</button>
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
	

</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>