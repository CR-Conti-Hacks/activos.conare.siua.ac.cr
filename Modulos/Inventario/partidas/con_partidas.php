<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto         = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $bs_nom_partida         = (isset($_GET['bs_nom_partida'])) ? $_GET['bs_nom_partida'] : '';
    $or_nom_partida	    	= (isset($_GET['or_nom_partida'])) ? $_GET['or_nom_partida'] : '';
	$or_nom_partida_tipo 	= (isset($_GET['or_nom_partida_tipo'])) ? $_GET['or_nom_partida_tipo'] : 'ASC';
    
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
    $sql ="SELECT COUNT(Id_Parti) AS Cant_Registros FROM tab_partidas WHERE Activo_Parti = '1'";
				
	if($bs_nom_partida  != "" ){
		$sql.=" AND Numero_Parti like '%".$bs_nom_partida."%'";
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
	$sql ="SELECT Id_Parti, Numero_Parti FROM tab_partidas WHERE Activo_Parti = '1'";
    if($bs_nom_partida  != "" ){
		$sql.=" AND Numero_Parti like '%".$bs_nom_partida."%'";
	}
    
    if ($or_nom_partida != "") {
	    $sql.=" ORDER BY ".$or_nom_partida.' '.$or_nom_partida_tipo;
	}else{
	    $sql.=" ORDER BY Numero_Parti ASC";   
	}
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
    $res = seleccion($sql);
    //echo $sql;

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="or_nom_partida" name="or_nom_partida" value="<?=$or_nom_partida?>" />
<input type="hidden" id="or_nom_partida_tipo" name="or_nom_partida_tipo" value="<?=$or_nom_partida_tipo?>" />



<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Partidas</span>
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
    <table class="width200 centrado" >		
		<tr>
			<td class="fondo_Azul blanco">Número:</td>
			<td>
				<input type="text" name="bs_nom_partida" id="bs_nom_partida"  maxlength="50" value="<?=$bs_nom_partida?>" placeholder="Digite el nombre"
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/partidas/con_partidas.php',
								'bs_nom_partida;or_nom_partida;or_nom_partida_tipo;pagina;inicio;',
								document.getElementById('bs_nom_partida').value+';'+
                                document.getElementById('or_nom_partida').value+';'+
                                document.getElementById('or_nom_partida_tipo').value+';'+
                                '0;0;'
                                
							);"/>
			</td>
		</tr>		
	</table>
	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/Inventario/partidas/con_partidas.php',
								'bs_nom_partida;or_nom_partida;or_nom_partida_tipo;pagina;inicio;',
								document.getElementById('bs_nom_partida').value+';'+
                                document.getElementById('or_nom_partida').value+';'+
                                document.getElementById('or_nom_partida_tipo').value+';'+
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
                        <a onClick="Ordenar('Modulos/Inventario/partidas/con_partidas.php',
												   'or_nom_partida',
												   'Numero_Parti',
												   'or_nom_partida_tipo',
												   'bs_nom_partida;pagina;inicio;',
                                                   document.getElementById('bs_nom_partida').value+';'+
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
                <td><?=$res[$i]['Numero_Parti']?></td>
                <td class="centrado"><img src='img/SAE/modificar.png'
                onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/partidas/mod_partidas.php',
										'Id_Parti;pagina;inicio;bs_nom_partida;or_nom_partida;or_nom_partida_tipo;',
										'<?=$res[$i]['Id_Parti']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_partida?>;<?=$or_nom_partida?>;<?=$or_nom_partida_tipo?>;')"
                                        
                ></td>
                <td class="centrado"><img src='img/SAE/eliminar.png' 
				 onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/partidas/eli_partidas.php',
										'Id_Parti;pagina;inicio;bs_nom_partida;or_nom_partida;or_nom_partida_tipo;',
										'<?=$res[$i]['Id_Parti']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_partida?>;<?=$or_nom_partida?>;<?=$or_nom_partida_tipo?>;')"
				
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
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/partidas/con_partidas.php','pagina;inicio;or_nom_partida;or_nom_partida_tipo;bs_nom_partida;',
								'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_partida').value+';'
								+document.getElementById('or_nom_partida_tipo').value+';'
								+document.getElementById('bs_nom_partida').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/partidas/con_partidas.php','pagina;inicio;or_nom_partida;or_nom_partida_tipo;bs_nom_partida;',
								'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_partida').value+';'
								+document.getElementById('or_nom_partida_tipo').value+';'
								+document.getElementById('bs_nom_partida').value+';');
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
	<?php if(in_array("3031",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/partidas/agr_partidas.php','pagina;inicio;or_nom_partida;or_nom_partida_tipo;bs_nom_partida;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_partida').value+';'
								+document.getElementById('or_nom_partida_tipo').value+';'
								+document.getElementById('bs_nom_partida').value+';1;');">Agregar Partida</button>
	</div>
	<?php } ?>


<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_nom_partida').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el nombre de la partida"
	});
	
</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>