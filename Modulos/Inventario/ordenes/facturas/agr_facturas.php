<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     	= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
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
	
	
	
	$Id_OC 					= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '';
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

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Agregar Factura</span>
	<br />
	<?php
		$sql = "SELECT Numero_OC FROM tab_ordenes_compras WHERE Id_OC = ".$Id_OC;
		$titulo = seleccion($sql);
	?>
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();" style="font-size: .6em">Orden N°: <?=$titulo[0]['Numero_OC']?></span>
</div>

<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_num_orden" name="bs_num_orden" value="<?=$bs_num_orden?>" />
<input type="hidden" id="bs_compromiso" name="bs_compromiso" value="<?=$bs_compromiso?>" />
<input type="hidden" id="bs_partida" name="bs_partida" value="<?=$bs_partida?>" />
<input type="hidden" id="bs_proveedor" name="bs_proveedor" value="<?=$bs_proveedor?>" />
<input type="hidden" id="bs_anno" name="bs_anno" value="<?=$bs_anno?>" />
<input type="hidden" id="bs_fecha_orden" name="bs_fecha_orden" value="<?=$bs_fecha_orden?>" />


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

<input type="hidden" id="Id_OC" name="Id_OC" value="<?=$Id_OC?>" />
<input type="hidden" id="bs_num_factu" name="bs_num_factu" value="<?=$bs_num_factu?>" />
<input type="hidden" id="bs_num_trans" name="bs_num_trans" value="<?=$bs_num_trans?>" />
<input type="hidden" id="bs_fecha_factu" name="bs_fecha_factu" value="<?=$bs_fecha_factu?>" />



<input type="hidden" id="or_num_factu" name="or_num_factu" value="<?=$or_num_factu?>" />
<input type="hidden" id="or_num_factu_tipo" name="or_num_factu_tipo" value="<?=$or_num_factu_tipo?>" />
<input type="hidden" id="or_num_trans" name="or_num_trans" value="<?=$or_num_trans?>" />
<input type="hidden" id="or_num_trans_tipo" name="or_num_trans_tipo" value="<?=$or_num_trans_tipo?>" />
<input type="hidden" id="or_fecha_factu" name="or_fecha_factu" value="<?=$or_fecha_factu?>" />
<input type="hidden" id="or_fecha_factu_tipo" name="or_fecha_factu_tipo" value="<?=$or_fecha_factu_tipo?>" />



<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width30P" >
		<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
		<tr>
			<td>Número:</td>
			<td>
				<input type="text" name="txt_factura" id="txt_factura" maxlength="100" onkeypress="ENTER(event,'agregarFactura()')" placeholder="Digite el número..."  />
			</td>
		</tr>
		<tr>
			<td>Transferencia:</td>
			<td>
				<select name="transferencia" id="transferencia">
					<?php
						$sql ="SELECT Id_Trans, Numero_Trans FROM tab_transferencias WHERE Activo_Trans = '1'";
						$res = seleccion($sql);
						
						
						for($i=0;$i<count($res);$i++){
					?>
						<option value='<?=$res[$i]["Id_Trans"]?>'>
							<?=$res[$i]["Numero_Trans"]?>
						</option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Fecha de factura:
			</td>
			<td>
				<input type="text" name="fecha_factura" id="fecha_factura" placeholder="Seleccione la fecha de la factura" readonly/>
			</td>
		</tr>
		
	</table>

<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarFactura()" >Guardar</button>
		
		<?php if(in_array("3072",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/con_facturas.php',
														    'bs_num_orden;'+
															'bs_compromiso;'+
															'bs_partida;'+
															'bs_proveedor;'+
															'bs_fecha_orden;'+
															'bs_anno;'+
															'or_num_orden;'+
															'or_num_orden_tipo;'+
															'or_nom_proveedor;'+
															'or_nom_proveedor_tipo;'+
															'or_num_partida;'+
															'or_num_partida_tipo;'+
															'or_num_compromiso;'+
															'or_num_compromiso_tipo;'+
															'or_fecha_orden;'+
															'or_fecha_orden_tipo;'+
															'or_anno;'+
															'or_anno_tipo;'+
															'mostrar_efecto;'+
															'Id_OC;'+
															'bs_num_factu;'+
															'bs_num_trans;'+
															'bs_fecha_factu;'+
															'or_num_factu;'+
															'or_num_factu_tipo;'+
															'or_num_trans;'+
															'or_num_trans_tipo;'+
															'or_fecha_factu;'+
															'or_fecha_factu_tipo;',
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
															document.getElementById('or_anno_tipo').value+';1;'+
															document.getElementById('Id_OC').value+';'+
															document.getElementById('bs_num_factu').value+';'+
															document.getElementById('bs_num_trans').value+';'+
															document.getElementById('bs_fecha_factu').value+';'+
															document.getElementById('or_num_factu').value+';'+
															document.getElementById('or_num_factu_tipo').value+';'+
															document.getElementById('or_num_trans').value+';'+
															document.getElementById('or_num_trans_tipo').value+';'+
															document.getElementById('or_fecha_factu').value+';'+
															document.getElementById('or_fecha_factu_tipo').value+';'
															)" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>		

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('txt_factura').focus();
		$('#transferencia').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el número de transferencia"
		});
		$('#txt_factura').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de factura"
		});
		$('#fecha_orden').darkTooltip({
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
		$( "#fecha_factura" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});
</script>