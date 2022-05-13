<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto         = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $bs_num_orden          	= (isset($_GET['bs_num_orden'])) ? $_GET['bs_num_orden'] : '';
	$bs_compromiso         	= (isset($_GET['bs_compromiso'])) ? $_GET['bs_compromiso'] : '0';
	$bs_partida          	= (isset($_GET['bs_partida'])) ? $_GET['bs_partida'] : '0';
	$bs_proveedor          	= (isset($_GET['bs_proveedor'])) ? $_GET['bs_proveedor'] : '0';
	$bs_fecha_orden         = (isset($_GET['bs_fecha_orden'])) ? $_GET['bs_fecha_orden'] : '';
	$bs_anno          		= (isset($_GET['bs_anno'])) ? $_GET['bs_anno'] : '0';
	
	
    $or_num_orden	    	= (isset($_GET['or_num_orden'])) ? $_GET['or_num_orden'] : '';
	$or_num_orden_tipo 		= (isset($_GET['or_num_orden_tipo'])) ? $_GET['or_num_orden_tipo'] : 'ASC';
	
	$or_nom_proveedor	    = (isset($_GET['or_nom_proveedor'])) ? $_GET['or_nom_proveedor'] : '';
	$or_nom_proveedor_tipo 	= (isset($_GET['or_nom_proveedor_tipo'])) ? $_GET['or_nom_proveedor_tipo'] : 'ASC';
	
	$or_num_partida	    	= (isset($_GET['or_num_partida'])) ? $_GET['or_num_partida'] : '';
	$or_num_partida_tipo 	= (isset($_GET['or_num_partida_tipo'])) ? $_GET['or_num_partida_tipo'] : 'ASC';
	
	$or_num_compromiso	    = (isset($_GET['or_num_compromiso'])) ? $_GET['or_num_compromiso'] : '';
	$or_num_compromiso_tipo = (isset($_GET['or_num_compromiso_tipo'])) ? $_GET['or_num_compromiso_tipo'] : 'ASC';
	
	$or_fecha_orden		    = (isset($_GET['or_fecha_orden'])) ? $_GET['or_fecha_orden'] : '';
	$or_fecha_orden_tipo 	= (isset($_GET['or_fecha_orden_tipo'])) ? $_GET['or_fecha_orden_tipo'] : 'ASC';
	
	$or_anno		    	= (isset($_GET['or_anno'])) ? $_GET['or_anno'] : '';
	$or_anno_tipo 			= (isset($_GET['or_anno_tipo'])) ? $_GET['or_anno_tipo'] : 'ASC';
    
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
    $sql ="SELECT COUNT(Id_OC) AS Cant_Registros FROM tab_ordenes_compras WHERE Activo_OC = '1'";
				
	if($bs_num_orden  != "" ){
		$sql.=" AND Numero_OC like '%".$bs_num_orden."%'";
	}
	if($bs_compromiso  != "0" ){
		$sql.=" AND Id_Compr_OC = ".$bs_compromiso;
	}
	if($bs_partida  != "0" ){
		$sql.=" AND Id_Parti_OC = ".$bs_partida;
	}
	if($bs_proveedor  != "0" ){
		$sql.=" AND Id_Prove_OC = ".$bs_proveedor;
	}
	if($bs_fecha_orden  != "" ){
		$sql.=" AND Fecha_OC like '%".$bs_fecha_orden."%'";
	}
    if($bs_anno  != "0" ){
		$sql.=" AND Anno_OC = ".$bs_anno;
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
				Id_OC, 
				Id_Prove_OC, 
				Nombre_Prove,
				Id_Parti_OC,
				Numero_Parti,
				Id_Compr_OC,
				Numero_Compr,
				Numero_OC,
				Fecha_OC,
				Anno_OC 
			FROM tab_ordenes_compras 
			INNER JOIN tab_proveedores ON (Id_Prove=Id_Prove_OC)
			INNER JOIN tab_partidas ON (Id_Parti=Id_Parti_OC)
			INNER JOIN tab_compromisos ON (Id_Compr=Id_Compr_OC)
			WHERE Activo_OC = '1'";
	if($bs_num_orden  != "" ){
		$sql.=" AND Numero_OC like '%".$bs_num_orden."%'";
	}
	if($bs_compromiso  != "0" ){
		$sql.=" AND Id_Compr_OC = ".$bs_compromiso;
	}
	if($bs_partida  != "0" ){
		$sql.=" AND Id_Parti_OC = ".$bs_partida;
	}
	if($bs_proveedor  != "0" ){
		$sql.=" AND Id_Prove_OC = ".$bs_proveedor;
	}
	if($bs_fecha_orden  != "" ){
		$sql.=" AND Fecha_OC like '%".$bs_fecha_orden."%'";
	}
    if($bs_anno  != "0" ){
		$sql.=" AND Anno_OC = ".$bs_anno;
	}
    if ($or_num_orden != "") {
	    $sql.=" ORDER BY ".$or_num_orden.' '.$or_num_orden_tipo;
	}else if($or_nom_proveedor !=''){
	    $sql.=" ORDER BY ".$or_nom_proveedor.' '.$or_nom_proveedor_tipo;
	}else if($or_num_partida!=''){
	    $sql.=" ORDER BY ".$or_num_partida.' '.$or_num_partida_tipo;
	}else if($or_num_compromiso!=''){
	    $sql.=" ORDER BY ".$or_num_compromiso.' '.$or_num_compromiso_tipo;
	}else if($or_fecha_orden!=''){
	    $sql.=" ORDER BY ".$or_fecha_orden.' '.$or_fecha_orden_tipo;
	}else if($or_anno!=''){
	    $sql.=" ORDER BY ".$or_anno.' '.$or_anno_tipo;
	}else{
	    $sql.=" ORDER BY Numero_OC ASC";   
	}
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
    $res = seleccion($sql);
    //echo $sql;

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="or_num_orden" name="or_num_orden" value="<?=$or_num_orden?>" />
<input type="hidden" id="or_num_orden_tipo" name="or_num_orden_tipo" value="<?=$or_num_orden_tipo?>" />

<input type="hidden" id="or_nom_proveedor" name="or_nom_proveedor" value="<?=$or_nom_proveedor?>" />
<input type="hidden" id="or_nom_proveedor_tipo" name="or_nom_proveedor_tipo" value="<?=$or_nom_proveedor_tipo?>" />

<input type="hidden" id="or_num_partida" name="or_num_partida" value="<?=$or_num_partida?>" />
<input type="hidden" id="or_num_partida_tipo" name="or_num_partida_tipo" value="<?=$or_num_partida_tipo?>" />

<input type="hidden" id="or_num_compromiso" name="or_num_compromiso" value="<?=$or_num_compromiso?>" />
<input type="hidden" id="or_num_compromiso_tipo" name="or_num_compromiso_tipo" value="<?=$or_num_compromiso_tipo?>" />

<input type="hidden" id="or_fecha_orden" name="or_fecha_orden" value="<?=$or_fecha_orden?>" />
<input type="hidden" id="or_fecha_orden_tipo" name="or_fecha_orden_tipo" value="<?=$or_fecha_orden_tipo?>" />

<input type="hidden" id="or_anno" name="or_anno" value="<?=$or_anno?>" />
<input type="hidden" id="or_anno_tipo" name="or_anno_tipo" value="<?=$or_anno_tipo?>" />

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Ordenes de Compras</span>
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
<table class="width550 centrado" >		
		<tr>
			<td class="fondo_Azul blanco">Número:</td>
			<td>
				<input type="text" name="bs_num_orden" id="bs_num_orden"  maxlength="50" value="<?=$bs_num_orden?>" placeholder="Digite el número de orden"
				onKeyPress="Buscar(
								event,
								
								'Modulos/Inventario/ordenes/con_ordenes.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
								document.getElementById('bs_num_orden').value+';'+
                                document.getElementById('bs_compromiso').value+';'+
                                document.getElementById('bs_partida').value+';'+
								document.getElementById('bs_proveedor').value+';'+
								document.getElementById('bs_fecha_orden').value+';'+
								document.getElementById('bs_anno').value+';'+
                                '0;0;'+
								document.getElementById('or_num_orden').value+';'+
								document.getElementById('or_num_orden_tipo').value+';'+
								document.getElementById('or_nom_proveedor').value+';'+
								document.getElementById('or_nom_proveedor_tipo').value+';'+
								document.getElementById('or_num_partida').value+';'+
								document.getElementById('or_num_partida_tipo').value+';'+
								document.getElementById('or_num_compromiso').value+';'+
								document.getElementById('or_num_compromiso_tipo').value+';'+
								document.getElementById('or_fecha_orden').value+';'+
								document.getElementById('or_fecha_orden_tipo').value+';'+
								document.getElementById('or_anno').value+';'+
								document.getElementById('or_anno_tipo').value+';'
							);"/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Compromiso:</td>
			<td>
				<select name="bs_compromiso" id="bs_compromiso"
						onchange="Buscar(
								'',
								'Modulos/Inventario/ordenes/con_ordenes.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
								document.getElementById('bs_num_orden').value+';'+
                                document.getElementById('bs_compromiso').value+';'+
                                document.getElementById('bs_partida').value+';'+
								document.getElementById('bs_proveedor').value+';'+
								document.getElementById('bs_fecha_orden').value+';'+
								document.getElementById('bs_anno').value+';'+
                                '0;0;'+
								document.getElementById('or_num_orden').value+';'+
								document.getElementById('or_num_orden_tipo').value+';'+
								document.getElementById('or_nom_proveedor').value+';'+
								document.getElementById('or_nom_proveedor_tipo').value+';'+
								document.getElementById('or_num_partida').value+';'+
								document.getElementById('or_num_partida_tipo').value+';'+
								document.getElementById('or_num_compromiso').value+';'+
								document.getElementById('or_num_compromiso_tipo').value+';'+
								document.getElementById('or_fecha_orden').value+';'+
								document.getElementById('or_fecha_orden_tipo').value+';'+
								document.getElementById('or_anno').value+';'+
								document.getElementById('or_anno_tipo').value+';'
                                
							);">
					<option value="0">[Seleccione]</option>
					
					<?php
						$sql ="SELECT Id_Compr, Numero_Compr FROM tab_compromisos WHERE Activo_Compr = '1'";
						$res_com = seleccion($sql);
						
						
						for($i=0;$i<count($res_com);$i++){
					?>
						<option value='<?=$res_com[$i]["Id_Compr"]?>'
					<?php
						if ($bs_compromiso == $res_com[$i]["Id_Compr"]){
							echo "selected";
						}
					?>
						>
							<?=$res_com[$i]["Numero_Compr"]?>
						</option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Partida:</td>
			<td>
				<select name="bs_partida" id="bs_partida"
				onchange="Buscar(
								'',
								'Modulos/Inventario/ordenes/con_ordenes.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
								document.getElementById('bs_num_orden').value+';'+
                                document.getElementById('bs_compromiso').value+';'+
                                document.getElementById('bs_partida').value+';'+
								document.getElementById('bs_proveedor').value+';'+
								document.getElementById('bs_fecha_orden').value+';'+
								document.getElementById('bs_anno').value+';'+
                                '0;0;'+
								document.getElementById('or_num_orden').value+';'+
								document.getElementById('or_num_orden_tipo').value+';'+
								document.getElementById('or_nom_proveedor').value+';'+
								document.getElementById('or_nom_proveedor_tipo').value+';'+
								document.getElementById('or_num_partida').value+';'+
								document.getElementById('or_num_partida_tipo').value+';'+
								document.getElementById('or_num_compromiso').value+';'+
								document.getElementById('or_num_compromiso_tipo').value+';'+
								document.getElementById('or_fecha_orden').value+';'+
								document.getElementById('or_fecha_orden_tipo').value+';'+
								document.getElementById('or_anno').value+';'+
								document.getElementById('or_anno_tipo').value+';'
                                
							);"	>
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Parti, Numero_Parti FROM tab_partidas WHERE Activo_Parti = '1'";
						$res_par = seleccion($sql);
						
						
						for($i=0;$i<count($res_par);$i++){
					?>
						<option value='<?=$res_par[$i]["Id_Parti"]?>'
					<?php
						if ($bs_partida == $res_par[$i]["Id_Parti"]){
							echo "selected";
						}
					?>
						
						>
							<?=$res_par[$i]["Numero_Parti"]?>
						</option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Proveedor:</td>
			<td>
				<select name="bs_proveedor" id="bs_proveedor"
					onchange="Buscar(
								'',
								'Modulos/Inventario/ordenes/con_ordenes.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
								document.getElementById('bs_num_orden').value+';'+
                                document.getElementById('bs_compromiso').value+';'+
                                document.getElementById('bs_partida').value+';'+
								document.getElementById('bs_proveedor').value+';'+
								document.getElementById('bs_fecha_orden').value+';'+
								document.getElementById('bs_anno').value+';'+
                                '0;0;'+
								document.getElementById('or_num_orden').value+';'+
								document.getElementById('or_num_orden_tipo').value+';'+
								document.getElementById('or_nom_proveedor').value+';'+
								document.getElementById('or_nom_proveedor_tipo').value+';'+
								document.getElementById('or_num_partida').value+';'+
								document.getElementById('or_num_partida_tipo').value+';'+
								document.getElementById('or_num_compromiso').value+';'+
								document.getElementById('or_num_compromiso_tipo').value+';'+
								document.getElementById('or_fecha_orden').value+';'+
								document.getElementById('or_fecha_orden_tipo').value+';'+
								document.getElementById('or_anno').value+';'+
								document.getElementById('or_anno_tipo').value+';'
                                
							);"	>
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Prove, Nombre_Prove FROM tab_proveedores WHERE Activo_Prove = '1'";
						$res_pro = seleccion($sql);
						
						
						for($i=0;$i<count($res_pro);$i++){
					?>
						<option value='<?=$res_pro[$i]["Id_Prove"]?>'
					<?php
						if ($bs_proveedor == $res_pro[$i]["Id_Prove"]){
							echo "selected";
						}
					?>
						>
							<?=$res_pro[$i]["Nombre_Prove"]?>
						</option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Fecha:</td>
			<td>
				<input type="text" name="bs_fecha_orden" id="bs_fecha_orden" placeholder="Seleccione la fecha de la orden de compra" value="<?=$bs_fecha_orden?>" readonly
				onchange="Buscar(
								'',
								'Modulos/Inventario/ordenes/con_ordenes.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
								document.getElementById('bs_num_orden').value+';'+
                                document.getElementById('bs_compromiso').value+';'+
                                document.getElementById('bs_partida').value+';'+
								document.getElementById('bs_proveedor').value+';'+
								document.getElementById('bs_fecha_orden').value+';'+
								document.getElementById('bs_anno').value+';'+
                                '0;0;'+
								document.getElementById('or_num_orden').value+';'+
								document.getElementById('or_num_orden_tipo').value+';'+
								document.getElementById('or_nom_proveedor').value+';'+
								document.getElementById('or_nom_proveedor_tipo').value+';'+
								document.getElementById('or_num_partida').value+';'+
								document.getElementById('or_num_partida_tipo').value+';'+
								document.getElementById('or_num_compromiso').value+';'+
								document.getElementById('or_num_compromiso_tipo').value+';'+
								document.getElementById('or_fecha_orden').value+';'+
								document.getElementById('or_fecha_orden_tipo').value+';'+
								document.getElementById('or_anno').value+';'+
								document.getElementById('or_anno_tipo').value+';'
                                
							);"
				/>
				<img src="img/SAE/limpiar.png"  onclick="document.getElementById('bs_fecha_orden').value = '';"/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Año:</td>
			<td>
				<select name="bs_anno" id="bs_anno"
					onchange="Buscar(
								'',
								'Modulos/Inventario/ordenes/con_ordenes.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
								document.getElementById('bs_num_orden').value+';'+
                                document.getElementById('bs_compromiso').value+';'+
                                document.getElementById('bs_partida').value+';'+
								document.getElementById('bs_proveedor').value+';'+
								document.getElementById('bs_fecha_orden').value+';'+
								document.getElementById('bs_anno').value+';'+
                                '0;0;'+
								document.getElementById('or_num_orden').value+';'+
								document.getElementById('or_num_orden_tipo').value+';'+
								document.getElementById('or_nom_proveedor').value+';'+
								document.getElementById('or_nom_proveedor_tipo').value+';'+
								document.getElementById('or_num_partida').value+';'+
								document.getElementById('or_num_partida_tipo').value+';'+
								document.getElementById('or_num_compromiso').value+';'+
								document.getElementById('or_num_compromiso_tipo').value+';'+
								document.getElementById('or_fecha_orden').value+';'+
								document.getElementById('or_fecha_orden_tipo').value+';'+
								document.getElementById('or_anno').value+';'+
								document.getElementById('or_anno_tipo').value+';'
                                
							);"	>
					<option value="0" <?php if($bs_anno == 0){ echo "selected"; }?>>[Seleccione]</option>
					<option value="2012" <?php if($bs_anno == 2012){ echo "selected"; }?>>2012</option>
					<option value="2013" <?php if($bs_anno == 2013){ echo "selected"; }?>>2013</option>
					<option value="2014" <?php if($bs_anno == 2014){ echo "selected"; }?>>2014</option>
					<option value="2015" <?php if($bs_anno == 2015){ echo "selected"; }?>>2015</option>
					<option value="2016" <?php if($bs_anno == 2016){ echo "selected"; }?>>2016</option>
					<option value="2017" <?php if($bs_anno == 2017){ echo "selected"; }?>>2017</option>
				</select>
			</td>
		</tr>
	</table>

	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/Inventario/ordenes/con_ordenes.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
								document.getElementById('bs_num_orden').value+';'+
                                document.getElementById('bs_compromiso').value+';'+
                                document.getElementById('bs_partida').value+';'+
								document.getElementById('bs_proveedor').value+';'+
								document.getElementById('bs_fecha_orden').value+';'+
								document.getElementById('bs_anno').value+';'+
                                '0;0;'+
								document.getElementById('or_num_orden').value+';'+
								document.getElementById('or_num_orden_tipo').value+';'+
								document.getElementById('or_nom_proveedor').value+';'+
								document.getElementById('or_nom_proveedor_tipo').value+';'+
								document.getElementById('or_num_partida').value+';'+
								document.getElementById('or_num_partida_tipo').value+';'+
								document.getElementById('or_num_compromiso').value+';'+
								document.getElementById('or_num_compromiso_tipo').value+';'+
								document.getElementById('or_fecha_orden').value+';'+
								document.getElementById('or_fecha_orden_tipo').value+';'+
								document.getElementById('or_anno').value+';'+
								document.getElementById('or_anno_tipo').value+';'
							);"
	><?=$texto['Buscar']?></button>
</div>
<br />
<br />

<!-- ***************************************************************************************-->
<!-- **********************Cantidad total de Registros **************************************-->
<!-- ***************************************************************************************-->
<span class="centrado gris font08"><?=$texto['Cantidad_Registros_X_Pagina'].' '.$res_cant[0]['Cant_Registros']?></span><br /><br />

<!-- ***************************************************************************************-->
<!-- **********************          TABLA            **************************************-->
<!-- ***************************************************************************************-->
    <table class="centrado width70P">		
            <tr class="centrado">
                <thead>
                    <th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/con_ordenes.php',
												   'or_num_orden',
												   'Numero_OC',
												   'or_num_orden_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;',
                                                   document.getElementById('bs_num_orden').value+';'+
												   document.getElementById('bs_compromiso').value+';'+
												   document.getElementById('bs_partida').value+';'+
												   document.getElementById('bs_proveedor').value+';'+
												   document.getElementById('bs_fecha_orden').value+';'+
												   document.getElementById('bs_anno').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);">
                                Número
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/con_ordenes.php',
												   'or_nom_proveedor',
												   'Nombre_Prove',
												   'or_nom_proveedor_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;',
                                                   document.getElementById('bs_num_orden').value+';'+
												   document.getElementById('bs_compromiso').value+';'+
												   document.getElementById('bs_partida').value+';'+
												   document.getElementById('bs_proveedor').value+';'+
												   document.getElementById('bs_fecha_orden').value+';'+
												   document.getElementById('bs_anno').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);">
                                Proveedor
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/con_ordenes.php',
												   'or_num_partida',
												   'Numero_Parti',
												   'or_num_partida_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;',
                                                   document.getElementById('bs_num_orden').value+';'+
												   document.getElementById('bs_compromiso').value+';'+
												   document.getElementById('bs_partida').value+';'+
												   document.getElementById('bs_proveedor').value+';'+
												   document.getElementById('bs_fecha_orden').value+';'+
												   document.getElementById('bs_anno').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);">
                                Partida
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/con_ordenes.php',
												   'or_num_compromiso',
												   'Numero_Compr',
												   'or_num_compromiso_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;',
                                                   document.getElementById('bs_num_orden').value+';'+
												   document.getElementById('bs_compromiso').value+';'+
												   document.getElementById('bs_partida').value+';'+
												   document.getElementById('bs_proveedor').value+';'+
												   document.getElementById('bs_fecha_orden').value+';'+
												   document.getElementById('bs_anno').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);">
                                Compromiso
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/con_ordenes.php',
												   'or_fecha_orden',
												   'Fecha_OC',
												   'or_fecha_orden_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;',
                                                   document.getElementById('bs_num_orden').value+';'+
												   document.getElementById('bs_compromiso').value+';'+
												   document.getElementById('bs_partida').value+';'+
												   document.getElementById('bs_proveedor').value+';'+
												   document.getElementById('bs_fecha_orden').value+';'+
												   document.getElementById('bs_anno').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);">
                                Fecha (Y/M/D)
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/con_ordenes.php',
												   'or_anno',
												   'Anno_OC',
												   'or_anno_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;',
                                                   document.getElementById('bs_num_orden').value+';'+
												   document.getElementById('bs_compromiso').value+';'+
												   document.getElementById('bs_partida').value+';'+
												   document.getElementById('bs_proveedor').value+';'+
												   document.getElementById('bs_fecha_orden').value+';'+
												   document.getElementById('bs_anno').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);"-->
                                Año
                        </a>
                    </th>
                    <th><?=$texto['Modificar']?></th>
					<?php if(in_array("3070",$_SESSION['Permisos'])){ ?>
						<th>Facturas</th>
					<?php } ?>
                    <th><?=$texto['Eliminar']?></th>
                </thead>
            </tr>
            
            <?php
            if(count($res)>0){
                for($i=0;$i<count($res);$i++){
            ?>
            <tr>
                <td><?=$res[$i]['Numero_OC']?></td>
				<td><?=$res[$i]['Nombre_Prove']?></td>
				<td><?=$res[$i]['Numero_Parti']?></td>
				<td><?=$res[$i]['Numero_Compr']?></td>
				<td><?=$res[$i]['Fecha_OC']?></td>
				<td><?=$res[$i]['Anno_OC']?></td>
                <td class="centrado"><img src='img/SAE/modificar.png'
					onClick="MostrarVentana(
										this,
										1,
										'Modulos/Inventario/ordenes/mod_ordenes.php',
										'Id_OC;pagina;inicio;'+
										'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
										'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
										'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
										'<?=$res[$i]['Id_OC']?>;'+'<?=$pagina?>;'+'<?=$inicio?>;'+
										'<?=$bs_num_orden?>;'+'<?=$bs_compromiso?>;'+'<?=$bs_partida?>;'+'<?=$bs_proveedor?>;'+'<?=$bs_fecha_orden?>;'+'<?=$bs_anno?>;'+
										'<?=$or_num_orden?>;'+'<?=$or_num_orden_tipo?>;'+'<?=$or_nom_proveedor?>;'+'<?=$or_nom_proveedor_tipo?>;'+'<?=$or_num_partida?>;'+'<?=$or_num_partida_tipo?>;'+
										'<?=$or_num_compromiso?>;'+'<?=$or_num_compromiso_tipo?>;'+'<?=$or_fecha_orden?>;'+'<?=$or_fecha_orden_tipo?>;'+'<?=$or_anno?>;'+'<?=$or_anno_tipo?>;')"
                                        
                ></td>
				<?php if(in_array("3070",$_SESSION['Permisos'])){ ?>
					<td class="centrado"><img src='img/SAE/facturas.png'
						onClick="javascript:CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/con_facturas.php',
										'Id_OC;bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
										'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
										'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
										'<?=$res[$i]['Id_OC']?>;'+
										document.getElementById('bs_num_orden').value+';'+
										document.getElementById('bs_compromiso').value+';'+
										document.getElementById('bs_partida').value+';'+
										document.getElementById('bs_proveedor').value+';'+
										document.getElementById('bs_fecha_orden').value+';'+
										document.getElementById('bs_anno').value+';'+
										document.getElementById('or_num_orden').value+';'+
										document.getElementById('or_num_orden_tipo').value+';'+
										document.getElementById('or_nom_proveedor').value+';'+
										document.getElementById('or_nom_proveedor_tipo').value+';'+
										document.getElementById('or_num_partida').value+';'+
										document.getElementById('or_num_partida_tipo').value+';'+
										document.getElementById('or_num_compromiso').value+';'+
										document.getElementById('or_num_compromiso_tipo').value+';'+
										document.getElementById('or_fecha_orden').value+';'+
										document.getElementById('or_fecha_orden_tipo').value+';'+
										document.getElementById('or_anno').value+';'+
										document.getElementById('or_anno_tipo').value+';');
										window.scrollTo(0,0);"
											
					></td>
				<?php } ?>
                <td class="centrado"><img src='img/SAE/eliminar.png' 
					onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/ordenes/eli_ordenes.php',
										'Id_OC;pagina;inicio;'+
										'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
										'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
										'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
										'<?=$res[$i]['Id_OC']?>;'+'<?=$pagina?>;'+'<?=$inicio?>;'+
										'<?=$bs_num_orden?>;'+'<?=$bs_compromiso?>;'+'<?=$bs_partida?>;'+'<?=$bs_proveedor?>;'+'<?=$bs_fecha_orden?>;'+'<?=$bs_anno?>;'+
										'<?=$or_num_orden?>;'+'<?=$or_num_orden_tipo?>;'+'<?=$or_nom_proveedor?>;'+'<?=$or_nom_proveedor_tipo?>;'+'<?=$or_num_partida?>;'+'<?=$or_num_partida_tipo?>;'+
										'<?=$or_num_compromiso?>;'+'<?=$or_num_compromiso_tipo?>;'+'<?=$or_fecha_orden?>;'+'<?=$or_fecha_orden_tipo?>;'+'<?=$or_anno?>;'+'<?=$or_anno_tipo?>;')"
				></td>
            </tr>
            
            
            <?php
                }
            }else{
            ?>
                <tr>
					<td colspan="9" class="centrado"><?=$texto['No_Datos']?></td>
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
						<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/ordenes/con_ordenes.php','pagina;inicio;'+
									'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
									'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
									'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
									'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'+
									document.getElementById('bs_num_orden').value+';'+
									document.getElementById('bs_compromiso').value+';'+
									document.getElementById('bs_partida').value+';'+
									document.getElementById('bs_proveedor').value+';'+
									document.getElementById('bs_fecha_orden').value+';'+
									document.getElementById('bs_anno').value+';'+
									document.getElementById('or_num_orden').value+';'+
									document.getElementById('or_num_orden_tipo').value+';'+
									document.getElementById('or_nom_proveedor').value+';'+
									document.getElementById('or_nom_proveedor_tipo').value+';'+
									document.getElementById('or_num_partida').value+';'+
									document.getElementById('or_num_partida_tipo').value+';'+
									document.getElementById('or_num_compromiso').value+';'+
									document.getElementById('or_num_compromiso_tipo').value+';'+
									document.getElementById('or_fecha_orden').value+';'+
									document.getElementById('or_fecha_orden_tipo').value+';'+
									document.getElementById('or_anno').value+';'+
									document.getElementById('or_anno_tipo').value+';');
									window.scrollTo(0,0);">
									<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
						&nbsp;&nbsp;&nbsp;
					<?php } ?>
					<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
					<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
						&nbsp;&nbsp;&nbsp;
						<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/ordenes/con_ordenes.php','pagina;inicio;'+
									'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
									'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
									'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
									'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'+
									document.getElementById('bs_num_orden').value+';'+
									document.getElementById('bs_compromiso').value+';'+
									document.getElementById('bs_partida').value+';'+
									document.getElementById('bs_proveedor').value+';'+
									document.getElementById('bs_fecha_orden').value+';'+
									document.getElementById('bs_anno').value+';'+
									document.getElementById('or_num_orden').value+';'+
									document.getElementById('or_num_orden_tipo').value+';'+
									document.getElementById('or_nom_proveedor').value+';'+
									document.getElementById('or_nom_proveedor_tipo').value+';'+
									document.getElementById('or_num_partida').value+';'+
									document.getElementById('or_num_partida_tipo').value+';'+
									document.getElementById('or_num_compromiso').value+';'+
									document.getElementById('or_num_compromiso_tipo').value+';'+
									document.getElementById('or_fecha_orden').value+';'+
									document.getElementById('or_fecha_orden_tipo').value+';'+
									document.getElementById('or_anno').value+';'+
									document.getElementById('or_anno_tipo').value+';');
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
		<?php if(in_array("3051",$_SESSION['Permisos'])){ ?>
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/ordenes/agr_ordenes.php',
									'pagina;inicio;mostrar_efecto;'+
									'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
									'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
									'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
									'<?=$pagina?>;<?=$inicio?>;1;'+
									document.getElementById('bs_num_orden').value+';'+
									document.getElementById('bs_compromiso').value+';'+
									document.getElementById('bs_partida').value+';'+
									document.getElementById('bs_proveedor').value+';'+
									document.getElementById('bs_fecha_orden').value+';'+
									document.getElementById('bs_anno').value+';'+
									document.getElementById('or_num_orden').value+';'+
									document.getElementById('or_num_orden_tipo').value+';'+
									document.getElementById('or_nom_proveedor').value+';'+
									document.getElementById('or_nom_proveedor_tipo').value+';'+
									document.getElementById('or_num_partida').value+';'+
									document.getElementById('or_num_partida_tipo').value+';'+
									document.getElementById('or_num_compromiso').value+';'+
									document.getElementById('or_num_compromiso_tipo').value+';'+
									document.getElementById('or_fecha_orden').value+';'+
									document.getElementById('or_fecha_orden_tipo').value+';'+
									document.getElementById('or_anno').value+';'+
									document.getElementById('or_anno_tipo').value+';');">Agregar Orden de Compra</button>
		</div>
		<?php } ?>
<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_num_orden').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el número de orden"
	});
	$('#bs_compromiso').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Seleccione el número de compromiso"
	});
	$('#bs_partida').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Seleccione el número de partida"
	});
	$('#bs_proveedor').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Seleccione el proveedor"
	});
	$('#bs_fecha_orden').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Seleccione la fecha de la orden de compra"
	});
	$('#bs_anno').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Seleccione el año de la orden de compra"
	});
		/*************************************************************/
		/*******************    CALENDARIO   *************************/
		/*************************************************************/	
		$( "#bs_fecha_orden" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});
	
</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>