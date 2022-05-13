<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto         		= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $bs_nom_transferencia           = (isset($_GET['bs_nom_transferencia'])) ? $_GET['bs_nom_transferencia'] : '';
    $or_nom_transferencia	    	= (isset($_GET['or_nom_transferencia'])) ? $_GET['or_nom_transferencia'] : '';
	$or_nom_transferencia_tipo 		= (isset($_GET['or_nom_transferencia_tipo'])) ? $_GET['or_nom_transferencia_tipo'] : 'ASC';
    
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
    $sql ="SELECT COUNT(Id_Trans) AS Cant_Registros FROM tab_transferencias WHERE Activo_Trans = '1'";
				
	if($bs_nom_transferencia  != "" ){
		$sql.=" AND Numero_Trans like '%".$bs_nom_transferencia."%'";
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
	$sql ="SELECT Id_Trans, Numero_Trans FROM tab_transferencias WHERE Activo_Trans = '1'";
    if($bs_nom_transferencia  != "" ){
		$sql.=" AND Numero_Trans like '%".$bs_nom_transferencia."%'";
	}
    
    if ($or_nom_transferencia != "") {
	    $sql.=" ORDER BY ".$or_nom_transferencia.' '.$or_nom_transferencia_tipo;
	}else{
	    $sql.=" ORDER BY Numero_Trans ASC";   
	}
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
    $res = seleccion($sql);
    //echo $sql;

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="or_nom_transferencia" name="or_nom_transferencia" value="<?=$or_nom_transferencia?>" />
<input type="hidden" id="or_nom_transferencia_tipo" name="or_nom_transferencia_tipo" value="<?=$or_nom_transferencia_tipo?>" />



<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Transferencias</span>
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
    <table class="width30P centrado" >		
		<tr>
			<td class="fondo_Azul blanco">Número Transferencia:</td>
			<td>
				<input type="text" name="bs_nom_transferencia" id="bs_nom_transferencia"  maxlength="45" value="<?=$bs_nom_transferencia?>" placeholder="Digite el numero "
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/transferencias/con_transferencias.php',
								'bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;pagina;inicio;',
								document.getElementById('bs_nom_transferencia').value+';'+
                                document.getElementById('or_nom_transferencia').value+';'+
                                document.getElementById('or_nom_transferencia_tipo').value+';'+
                                '0;0;'
                                
							);"/>
			</td>
		</tr>		
	</table>
	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/Inventario/transferencias/con_transferencias.php',
								'bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;pagina;inicio;',
								document.getElementById('bs_nom_transferencia').value+';'+
                                document.getElementById('or_nom_transferencia').value+';'+
                                document.getElementById('or_nom_transferencia_tipo').value+';'+
                                '0;0;'
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
    <table class="centrado width40P">		
            <tr class="centrado">
                <thead>
                    <th>
                        <a onClick="Ordenar('Modulos/Inventario/transferencias/con_transferencias.php',
												   'or_nom_transferencia',
												   'Numero_Trans',
												   'or_nom_transferencia_tipo',
												   'bs_nom_transferencia;pagina;inicio;',
                                                   document.getElementById('bs_nom_transferencia').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);"-->
                                Número
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
                <td><?=$res[$i]['Numero_Trans']?></td>
                <td class="centrado"><img src='img/SAE/modificar.png'
                onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/transferencias/mod_transferencias.php',
										'Id_Trans;pagina;inicio;bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;',
										'<?=$res[$i]['Id_Trans']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_transferencia?>;<?=$or_nom_transferencia?>;<?=$or_nom_transferencia_tipo?>;')"
                                        
                ></td>
                <td class="centrado"><img src='img/SAE/eliminar.png' 
				 onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/transferencias/eli_transferencias.php',
										'Id_Trans;pagina;inicio;bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;',
										'<?=$res[$i]['Id_Trans']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_transferencia?>;<?=$or_nom_transferencia?>;<?=$or_nom_transferencia_tipo?>;')"
				
				></td>
            </tr>
            
            
            <?php
                }
            }else{
            ?>
                <tr>
					<td colspan="3" class="centrado"><?=$texto['No_Datos']?></td>
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
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/transferencias/con_transferencias.php','pagina;inicio;or_nom_transferencia;or_nom_transferencia_tipo;bs_nom_transferencia;',
								'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_transferencia').value+';'
								+document.getElementById('or_nom_transferencia_tipo').value+';'
								+document.getElementById('bs_nom_transferencia').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/transferencias/con_transferencias.php','pagina;inicio;or_nom_transferencia;or_nom_transferencia_tipo;bs_nom_transferencia;',
								'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_transferencia').value+';'
								+document.getElementById('or_nom_transferencia_tipo').value+';'
								+document.getElementById('bs_nom_transferencia').value+';');
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
	<?php if(in_array("3011",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/transferencias/agr_transferencias.php','pagina;inicio;or_nom_transferencia;or_nom_transferencia_tipo;bs_nom_transferencia;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_transferencia').value+';'
								+document.getElementById('or_nom_transferencia_tipo').value+';'
								+document.getElementById('bs_nom_transferencia').value+';1;');">Agregar Transferencia</button>
	</div>
	<?php } ?>


<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_nom_transferencia').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el nombre de la transferencia"
	});
	
</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>