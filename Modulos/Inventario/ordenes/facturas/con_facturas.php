<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto         = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$Id_OC          		= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '';
	
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
    
	$bs_num_factu 			= (isset($_GET['bs_num_factu'])) ? $_GET['bs_num_factu'] : '';
	$bs_num_trans 			= (isset($_GET['bs_num_trans'])) ? $_GET['bs_num_trans'] : '0';
	$bs_fecha_factu 		= (isset($_GET['bs_fecha_factu'])) ? $_GET['bs_fecha_factu'] : '';
	
	$or_num_factu 			= (isset($_GET['or_num_factu'])) ? $_GET['or_num_factu'] : '';
	$or_num_factu_tipo 		= (isset($_GET['or_num_factu_tipo'])) ? $_GET['or_num_factu_tipo'] : 'ASC';
	$or_num_trans 			= (isset($_GET['or_num_trans'])) ? $_GET['or_num_trans'] : '';
	$or_num_trans_tipo 		= (isset($_GET['or_num_trans_tipo'])) ? $_GET['or_num_trans_tipo'] : 'ASC';
	$or_fecha_factu			= (isset($_GET['or_fecha_factu'])) ? $_GET['or_fecha_factu'] : '';
	$or_fecha_factu_tipo	= (isset($_GET['or_fecha_factu_tipo'])) ? $_GET['or_fecha_factu_tipo'] : 'ASC';
	
	
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
    $sql ="SELECT COUNT(Id_Factu) AS Cant_Registros FROM tab_facturas WHERE Activo_Factu = '1' AND Id_OC_Factu = ".$Id_OC;
				
	if($bs_num_factu  != "" ){
		$sql.=" AND Numero_Factu like '%".$bs_num_factu."%'";
	}
	if($bs_num_trans  != "0" ){
		$sql.=" AND Id_Trans_Factu = ".$bs_num_trans;
	}
	if($bs_fecha_factu != "" ){
		$sql.=" AND Fecha_Factu like '%".$bs_fecha_factu."%'";
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
				Id_Factu, 
				Id_Trans_Factu,
				Numero_Trans,
				Numero_Factu,
				Fecha_Factu
			FROM tab_facturas
			INNER JOIN tab_transferencias ON (Id_Trans=Id_Trans_Factu)
			WHERE Activo_Factu = '1' AND Id_OC_Factu = ".$Id_OC;
	if($bs_num_factu  != "" ){
		$sql.=" AND Numero_Factu like '%".$bs_num_factu."%'";
	}
	if($bs_num_trans  != "0" ){
		$sql.=" AND Id_Trans_Factu = ".$bs_num_trans;
	}
	if($bs_fecha_factu != "" ){
		$sql.=" AND Fecha_Factu like '%".$bs_fecha_factu."%'";
	}
	
    if ($or_num_factu != "") {
	    $sql.=" ORDER BY ".$or_num_factu.' '.$or_num_factu_tipo;
	}else if($or_num_trans !=''){
	    $sql.=" ORDER BY ".$or_num_trans.' '.$or_num_trans_tipo;
	}else if($or_fecha_factu!=''){
	    $sql.=" ORDER BY ".$or_fecha_factu.' '.$or_fecha_factu_tipo;
	}else{
	    $sql.=" ORDER BY Numero_Factu ASC";   
	}
	

	
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
    $res = seleccion($sql);
    //echo $sql;

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="Id_OC" name="Id_OC" value="<?=$Id_OC?>" />

<input type="hidden" id="bs_num_orden" name="bs_num_orden" value="<?=$bs_num_orden?>" />
<input type="hidden" id="bs_compromiso" name="bs_compromiso" value="<?=$bs_compromiso?>" />
<input type="hidden" id="bs_partida" name="bs_partida" value="<?=$bs_partida?>" />
<input type="hidden" id="bs_proveedor" name="bs_proveedor" value="<?=$bs_proveedor?>" />
<input type="hidden" id="bs_fecha_orden" name="bs_fecha_orden" value="<?=$bs_fecha_orden?>" />
<input type="hidden" id="bs_anno" name="bs_anno" value="<?=$bs_anno?>" />

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



<input type="hidden" id="or_num_factu" name="or_num_factu" value="<?=$or_num_factu?>" />
<input type="hidden" id="or_num_factu_tipo" name="or_num_factu_tipo" value="<?=$or_num_factu_tipo?>" />
<input type="hidden" id="or_num_trans" name="or_num_trans" value="<?=$or_num_trans?>" />
<input type="hidden" id="or_num_trans_tipo" name="or_num_trans_tipo" value="<?=$or_num_trans_tipo?>" />
<input type="hidden" id="or_fecha_factu" name="or_fecha_factu" value="<?=$or_fecha_factu?>" />
<input type="hidden" id="or_fecha_factu_tipo" name="or_fecha_factu_tipo" value="<?=$or_fecha_factu_tipo?>" />


<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Facturas</span>
	<br />
	<?php
		$sql = "SELECT Numero_OC FROM tab_ordenes_compras WHERE Id_OC = ".$Id_OC;
		$titulo = seleccion($sql);
	?>
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();" style="font-size: .6em">Orden N°: <?=$titulo[0]['Numero_OC']?></span>
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
				<input type="text" name="bs_num_factu" id="bs_num_factu"  maxlength="50" value="<?=$bs_num_factu?>" placeholder="Digite el número de factura"
				onKeyPress="Buscar(
								event,
								
								'Modulos/Inventario/ordenes/facturas/con_facturas.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
								'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
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
								document.getElementById('or_anno_tipo').value+';'+
								document.getElementById('bs_num_factu').value+';'+
								document.getElementById('bs_num_trans').value+';'+
								document.getElementById('bs_fecha_factu').value+';'+
								document.getElementById('or_num_factu').value+';'+
								document.getElementById('or_num_factu_tipo').value+';'+
								document.getElementById('or_num_trans').value+';'+
								document.getElementById('or_num_trans_tipo').value+';'+
								document.getElementById('or_fecha_factu').value+';'+
								document.getElementById('or_fecha_factu_tipo').value+';'+
								document.getElementById('Id_OC').value+';'
								
							);"/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Transferecia:</td>
			<td>
				<select name="bs_num_trans" id="bs_num_trans"
						onchange="Buscar(
								'',
								'Modulos/Inventario/ordenes/facturas/con_facturas.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
								'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
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
								document.getElementById('or_anno_tipo').value+';'+
								document.getElementById('bs_num_factu').value+';'+
								document.getElementById('bs_num_trans').value+';'+
								document.getElementById('bs_fecha_factu').value+';'+
								document.getElementById('or_num_factu').value+';'+
								document.getElementById('or_num_factu_tipo').value+';'+
								document.getElementById('or_num_trans').value+';'+
								document.getElementById('or_num_trans_tipo').value+';'+
								document.getElementById('or_fecha_factu').value+';'+
								document.getElementById('or_fecha_factu_tipo').value+';'+
								document.getElementById('Id_OC').value+';'
                                
							);">
					<option value="0">[Seleccione]</option>
					
					<?php
						$sql ="SELECT Id_Trans, Numero_Trans FROM tab_transferencias WHERE Activo_Trans = '1'";
						$res_com = seleccion($sql);
						
						
						for($i=0;$i<count($res_com);$i++){
					?>
						<option value='<?=$res_com[$i]["Id_Trans"]?>'
					<?php
						if ($bs_num_trans == $res_com[$i]["Id_Trans"]){
							echo "selected";
						}
					?>
						>
							<?=$res_com[$i]["Numero_Trans"]?>
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
				<input type="text" name="bs_fecha_factu" id="bs_fecha_factu" placeholder="Seleccione la fecha de la factura" value="<?=$bs_fecha_factu?>" readonly
				onchange="Buscar(
								'',
								'Modulos/Inventario/ordenes/facturas/con_facturas.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
								'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
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
								document.getElementById('or_anno_tipo').value+';'+
								document.getElementById('bs_num_factu').value+';'+
								document.getElementById('bs_num_trans').value+';'+
								document.getElementById('bs_fecha_factu').value+';'+
								document.getElementById('or_num_factu').value+';'+
								document.getElementById('or_num_factu_tipo').value+';'+
								document.getElementById('or_num_trans').value+';'+
								document.getElementById('or_num_trans_tipo').value+';'+
								document.getElementById('or_fecha_factu').value+';'+
								document.getElementById('or_fecha_factu_tipo').value+';'+
								document.getElementById('Id_OC').value+';'
                                
							);"
				/>
				<img src="img/SAE/limpiar.png"  onclick="document.getElementById('bs_fecha_factu').value = '';"/>
			</td>
		</tr>
	</table>

	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/Inventario/ordenes/facturas/con_facturas.php',
								'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
								'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
								'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
								'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
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
								document.getElementById('or_anno_tipo').value+';'+
								document.getElementById('bs_num_factu').value+';'+
								document.getElementById('bs_num_trans').value+';'+
								document.getElementById('bs_fecha_factu').value+';'+
								document.getElementById('or_num_factu').value+';'+
								document.getElementById('or_num_factu_tipo').value+';'+
								document.getElementById('or_num_trans').value+';'+
								document.getElementById('or_num_trans_tipo').value+';'+
								document.getElementById('or_fecha_factu').value+';'+
								document.getElementById('or_fecha_factu_tipo').value+';'+
								document.getElementById('Id_OC').value+';'
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
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/facturas/con_facturas.php',
													'or_num_factu',
													'Numero_Factu',
													'or_num_factu_tipo',
													'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
													'Id_OC;or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
													'bs_num_factu;bs_num_trans;bs_fecha_factu;',
													document.getElementById('bs_num_orden').value+';'+
													document.getElementById('bs_compromiso').value+';'+
													document.getElementById('bs_partida').value+';'+
													document.getElementById('bs_proveedor').value+';'+
													document.getElementById('bs_fecha_orden').value+';'+
													document.getElementById('bs_anno').value+';'+
													'<?=$pagina.';'.$inicio.';'?>'+
													document.getElementById('Id_OC').value+';'+
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
													document.getElementById('or_anno_tipo').value+';'+
													document.getElementById('bs_num_factu').value+';'+
													document.getElementById('bs_num_trans').value+';'+
													document.getElementById('bs_fecha_factu').value+';'
												   
												);">
                                Número
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/facturas/con_facturas.php',
												   'or_num_trans',
												   'Numero_Trans',
												   'or_num_trans_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
													'Id_OC;or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
													'bs_num_factu;bs_num_trans;bs_fecha_factu;',
													document.getElementById('bs_num_orden').value+';'+
													document.getElementById('bs_compromiso').value+';'+
													document.getElementById('bs_partida').value+';'+
													document.getElementById('bs_proveedor').value+';'+
													document.getElementById('bs_fecha_orden').value+';'+
													document.getElementById('bs_anno').value+';'+
													'<?=$pagina.';'.$inicio.';'?>'+
													document.getElementById('Id_OC').value+';'+
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
													document.getElementById('or_anno_tipo').value+';'+
													document.getElementById('bs_num_factu').value+';'+
													document.getElementById('bs_num_trans').value+';'+
													document.getElementById('bs_fecha_factu').value+';'
												);
								window.scrollTo(0,0);">
                                Transferencia
                        </a>
                    </th>
					<th>
                        <a onClick="Ordenar('Modulos/Inventario/ordenes/facturas/con_facturas.php',
												   'or_fecha_factu',
												   'Fecha_Factu',
												   'or_fecha_factu_tipo',
												   'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;pagina;inicio;'+
													'Id_OC;or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
													'bs_num_factu;bs_num_trans;bs_fecha_factu;',
													document.getElementById('bs_num_orden').value+';'+
													document.getElementById('bs_compromiso').value+';'+
													document.getElementById('bs_partida').value+';'+
													document.getElementById('bs_proveedor').value+';'+
													document.getElementById('bs_fecha_orden').value+';'+
													document.getElementById('bs_anno').value+';'+
													'<?=$pagina.';'.$inicio.';'?>'+
													document.getElementById('Id_OC').value+';'+
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
													document.getElementById('or_anno_tipo').value+';'+
													document.getElementById('bs_num_factu').value+';'+
													document.getElementById('bs_num_trans').value+';'+
													document.getElementById('bs_fecha_factu').value+';'
												);
								window.scrollTo(0,0);">
                                Fecha (Y/M/D)
                        </a>
                    </th>
                    <th><?=$texto['Modificar']?></th>
                    <th><?=$texto['Eliminar']?></th>
                </thead>
            </tr>
            
            <?php
            if(count($res)>0){
                for($i=0;$i<count($res);$i++){
            ?>
            <tr>
                <td><?=$res[$i]['Numero_Factu']?></td>
				<td><?=$res[$i]['Numero_Trans']?></td>
				<td><?=$res[$i]['Fecha_Factu']?></td>
                <td class="centrado"><img src='img/SAE/modificar.png'
					onClick="MostrarVentana(
										this,
										1,
										'Modulos/Inventario/ordenes/facturas/mod_facturas.php',
										'Id_Factu;pagina;inicio;'+
										'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
										'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
										'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
										'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
										'<?=$res[$i]['Id_Factu']?>;'+'<?=$pagina?>;'+'<?=$inicio?>;'+
										'<?=$bs_num_orden?>;'+'<?=$bs_compromiso?>;'+'<?=$bs_partida?>;'+'<?=$bs_proveedor?>;'+'<?=$bs_fecha_orden?>;'+'<?=$bs_anno?>;'+
										'<?=$or_num_orden?>;'+'<?=$or_num_orden_tipo?>;'+'<?=$or_nom_proveedor?>;'+'<?=$or_nom_proveedor_tipo?>;'+'<?=$or_num_partida?>;'+'<?=$or_num_partida_tipo?>;'+
										'<?=$or_num_compromiso?>;'+'<?=$or_num_compromiso_tipo?>;'+'<?=$or_fecha_orden?>;'+'<?=$or_fecha_orden_tipo?>;'+'<?=$or_anno?>;'+'<?=$or_anno_tipo?>;'+
										'<?=$bs_num_factu?>;'+'<?=$bs_num_trans?>;'+'<?=$bs_fecha_factu?>;'+'<?=$or_num_factu?>;'+'<?=$or_num_factu_tipo?>;'+'<?=$or_num_trans?>;'+'<?=$or_num_trans_tipo?>;'+'<?=$or_fecha_factu?>;'+'<?=$or_fecha_factu_tipo?>;'+'<?=$Id_OC?>;'
										)"
                ></td>
                <td class="centrado"><img src='img/SAE/eliminar.png' 
					onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/ordenes/facturas/eli_facturas.php',
										'Id_Factu;pagina;inicio;'+
										'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
										'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
										'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
										'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
										'<?=$res[$i]['Id_Factu']?>;'+'<?=$pagina?>;'+'<?=$inicio?>;'+
										'<?=$bs_num_orden?>;'+'<?=$bs_compromiso?>;'+'<?=$bs_partida?>;'+'<?=$bs_proveedor?>;'+'<?=$bs_fecha_orden?>;'+'<?=$bs_anno?>;'+
										'<?=$or_num_orden?>;'+'<?=$or_num_orden_tipo?>;'+'<?=$or_nom_proveedor?>;'+'<?=$or_nom_proveedor_tipo?>;'+'<?=$or_num_partida?>;'+'<?=$or_num_partida_tipo?>;'+
										'<?=$or_num_compromiso?>;'+'<?=$or_num_compromiso_tipo?>;'+'<?=$or_fecha_orden?>;'+'<?=$or_fecha_orden_tipo?>;'+'<?=$or_anno?>;'+'<?=$or_anno_tipo?>;'+
										'<?=$bs_num_factu?>;'+'<?=$bs_num_trans?>;'+'<?=$bs_fecha_factu?>;'+'<?=$or_num_factu?>;'+'<?=$or_num_factu_tipo?>;'+'<?=$or_num_trans?>;'+'<?=$or_num_trans_tipo?>;'+'<?=$or_fecha_factu?>;'+'<?=$or_fecha_factu_tipo?>;'+'<?=$Id_OC?>;'
										)"
				></td>
            </tr>
            
            
            <?php
                }
            }else{
            ?>
                <tr>
					<td colspan="8" class="centrado"><?=$texto['No_Datos']?></td>
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
						<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/con_facturas.php','pagina;inicio;'+
									'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
									'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
									'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
									'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
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
									document.getElementById('or_anno_tipo').value+';'+
									document.getElementById('bs_num_factu').value+';'+
									document.getElementById('bs_num_trans').value+';'+
									document.getElementById('bs_fecha_factu').value+';'+
									document.getElementById('or_num_factu').value+';'+
									document.getElementById('or_num_factu_tipo').value+';'+
									document.getElementById('or_num_trans').value+';'+
									document.getElementById('or_num_trans_tipo').value+';'+
									document.getElementById('or_fecha_factu').value+';'+
									document.getElementById('or_fecha_factu_tipo').value+';'+
									document.getElementById('Id_OC').value+';'
									);
									window.scrollTo(0,0);">
									<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
						&nbsp;&nbsp;&nbsp;
					<?php } ?>
					<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
					<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
						&nbsp;&nbsp;&nbsp;
						<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/con_facturas.php','pagina;inicio;'+
									'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
									'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
									'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
									'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
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
									document.getElementById('or_anno_tipo').value+';'+
									document.getElementById('bs_num_factu').value+';'+
									document.getElementById('bs_num_trans').value+';'+
									document.getElementById('bs_fecha_factu').value+';'+
									document.getElementById('or_num_factu').value+';'+
									document.getElementById('or_num_factu_tipo').value+';'+
									document.getElementById('or_num_trans').value+';'+
									document.getElementById('or_num_trans_tipo').value+';'+
									document.getElementById('or_fecha_factu').value+';'+
									document.getElementById('or_fecha_factu_tipo').value+';'+
									document.getElementById('Id_OC').value+';'
									);
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
		
		<br/>
		<br/>
		<div class="centrado">
			<?php if(in_array("3071",$_SESSION['Permisos'])){ ?>
				<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/agr_facturas.php',
										'pagina;inicio;mostrar_efecto;'+
										'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
										'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
										'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
										'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
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
										document.getElementById('or_anno_tipo').value+';'+
										document.getElementById('bs_num_factu').value+';'+
										document.getElementById('bs_num_trans').value+';'+
										document.getElementById('bs_fecha_factu').value+';'+
										document.getElementById('or_num_factu').value+';'+
										document.getElementById('or_num_factu_tipo').value+';'+
										document.getElementById('or_num_trans').value+';'+
										document.getElementById('or_num_trans_tipo').value+';'+
										document.getElementById('or_fecha_factu').value+';'+
										document.getElementById('or_fecha_factu_tipo').value+';'+
										document.getElementById('Id_OC').value+';'
										);">Agregar Factura</button>
			<?php } ?>
			<?php if(in_array("3052",$_SESSION['Permisos'])){ ?>
				<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/ordenes/con_ordenes.php',
										'mostrar_efecto;'+
										'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
										'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
										'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
										'1;'+
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
										document.getElementById('or_anno_tipo').value+';'
										);">Regresar</button>
			<?php } ?>
		</div>
		
<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_num_factu').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el número de factura"
	});
	$('#bs_num_trans').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Seleccione el número de transferencia"
	});
	$('#bs_fecha_factu').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Seleccione la fecha de la factura"
	});
	
	/*************************************************************/
	/*******************    CALENDARIO   *************************/
	/*************************************************************/	
	$( "#bs_fecha_factu" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});
	
</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>