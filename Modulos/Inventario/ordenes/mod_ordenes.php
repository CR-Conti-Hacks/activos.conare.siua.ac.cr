<?php
   /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/


    /****************************PARAMETROS  ***********************************/
	$Id_OC      		= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
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


    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_OC, Id_Prove_OC,Id_Parti_OC,Id_Compr_OC,Numero_OC,Fecha_OC,Anno_OC FROM tab_ordenes_compras WHERE Id_OC = ".$Id_OC;
    $res_principal = seleccion($sql);

?>
<style>
	input,select{
		width: 100%;
	}
</style>
    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_OC" name="Id_OC" value="<?= $Id_OC?>" />
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

    <!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Modificar Orden de Compra</h3>
	<br />
	<br />
	<div>

        <!-- ****************************************************************************************** -->
        <!-- **************************       FORM         ******************************************** -->
        <!-- ****************************************************************************************** -->
		<table class="centrado width100P" >
			<tr><th colspan="2" class="centrado">Por favor complete</th></tr>
			<tr>
				<td>Compromiso:</td>
				<td>
					<select name="compromiso" id="compromiso">
						<?php
							$sql ="SELECT Id_Compr, Numero_Compr FROM tab_compromisos WHERE Activo_Compr = '1'";
							$res = seleccion($sql);


							for($i=0;$i<count($res);$i++){
						?>
							<option value='<?=$res[$i]["Id_Compr"]?>'
							<?php
							if($res[$i]["Id_Compr"]==$res_principal[0]["Id_Compr_OC"]){
								echo "selected";
							}
							?>
							>
								<?=$res[$i]["Numero_Compr"]?>
							</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Partida:</td>
				<td>
					<select name="partida" id="partida">
						<?php
							$sql ="SELECT Id_Parti, Numero_Parti FROM tab_partidas WHERE Activo_Parti = '1'";
							$res = seleccion($sql);


							for($i=0;$i<count($res);$i++){
						?>
							<option value='<?=$res[$i]["Id_Parti"]?>'
							<?php
							if($res[$i]["Id_Parti"]==$res_principal[0]["Id_Parti_OC"]){
								echo "selected";
							}
							?>
							>
								<?=$res[$i]["Numero_Parti"]?>
							</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Proveedor:</td>
				<td>
					<select name="proveedor" id="proveedor">
						<?php
							$sql ="SELECT Id_Prove, Nombre_Prove FROM tab_proveedores WHERE Activo_Prove = '1'";
							$res = seleccion($sql);


							for($i=0;$i<count($res);$i++){
						?>
							<option value='<?=$res[$i]["Id_Prove"]?>'
							<?php
							if($res[$i]["Id_Prove"]==$res_principal[0]["Id_Prove_OC"]){
								echo "selected";
							}
							?>
							>
								<?=$res[$i]["Nombre_Prove"]?>
							</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Número:</td>
				<td>
					<input type="text" name="txt_ordene" id="txt_ordene" maxlength="100" onkeypress="ENTER(event,'modificarOrden()')" placeholder="Digite el número..."  value="<?=$res_principal[0]['Numero_OC']?>" />
				</td>
			</tr>
			<tr>
				<td>
					Año:
				</td>
				<td>
					<select name="anno" id="anno" >
						<option value="0">[Seleccione]</option>
						<option value="DESC" <?php if($res_principal[0]['Anno_OC']=="DESC"){ echo "selected";}?>>DESCONOCIDO</option>
						<?php
							$annoInicio = 2006;
							$annoActual = date("Y");
							$annoFin = $annoActual + 20;
							for ($i = $annoInicio; $i <= $annoFin; $i++){
								echo '<option value="'.$i.'" ';
								if($res_principal[0]['Anno_OC']==$i){
									echo "selected";	
								}
								echo '>'.$i.'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Fecha de orden:
				</td>
				<td>
					<input type="text" name="fecha_orden" id="fecha_orden" placeholder="Seleccione la fecha de la orden de compra" readonly value="<?=$res_principal[0]['Fecha_OC']?>"/>
				</td>
			</tr>

		</table>

        <!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="modificarOrden()" ><?=$texto['Guardar']?></button>
			<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
		</div>
	</div>
<script>
		document.getElementById('compromiso').focus();
		$('#compromiso').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', //
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el número del compromiso"
		});
		$('#partida').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', //
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el número de la partida"
		});
		$('#proveedor').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', //
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el nombre del proveedor"
		});
		$('#txt_ordene').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', //
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre de la ordene"
		});
		$('#anno').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', //
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione el año de la orden"
		});
		$('#fecha_orden').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', //
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la fecha de la orden"
		});

		/*************************************************************/
		/*******************    CALENDARIO   *************************/
		/*************************************************************/
		$( "#fecha_orden" ).dateDropper({borderRadius:0,color:'#2196f3',animation:'fadein',lang:'es'});
</script>
