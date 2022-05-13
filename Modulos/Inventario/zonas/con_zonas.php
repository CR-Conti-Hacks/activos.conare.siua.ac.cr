<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto         = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $bs_nom_zona            = (isset($_GET['bs_nom_zona'])) ? $_GET['bs_nom_zona'] : '';
    $or_nom_zona	    	= (isset($_GET['or_nom_zona'])) ? $_GET['or_nom_zona'] : '';
	$or_nom_zona_tipo 		= (isset($_GET['or_nom_zona_tipo'])) ? $_GET['or_nom_zona_tipo'] : 'ASC';
    
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
    $sql ="SELECT COUNT(Id_Zonas_tmp) AS Cant_Registros FROM tab_zonas_tmp WHERE Activo_Zonas_tmp = '1'";
				
	if($bs_nom_zona  != "" ){
		$sql.=" AND Nombre_Zonas_tmp like '%".$bs_nom_zona."%'";
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
	$sql ="SELECT Id_Zonas_tmp, Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Activo_Zonas_tmp = '1'";
    if($bs_nom_zona  != "" ){
		$sql.=" AND Nombre_Zonas_tmp like '%".$bs_nom_zona."%'";
	}
    
    if ($or_nom_zona != "") {
	    $sql.=" ORDER BY ".$or_nom_zona.' '.$or_nom_zona_tipo;
	}else{
	    $sql.=" ORDER BY Nombre_Zonas_tmp ASC";   
	}
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
    $res = seleccion($sql);
    //echo $sql;

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="or_nom_zona" name="or_nom_zona" value="<?=$or_nom_zona?>" />
<input type="hidden" id="or_nom_zona_tipo" name="or_nom_zona_tipo" value="<?=$or_nom_zona_tipo?>" />



<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Zonas</span>
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
			<td class="fondo_Azul blanco">Nombre:</td>
			<td>
				<input type="text" name="bs_nom_zona" id="bs_nom_zona"  maxlength="50" value="<?=$bs_nom_zona?>" placeholder="Digite el nombre"
				onKeyPress="Buscar(
								event,
								'Modulos/Inventario/zonas/con_zonas.php',
								'bs_nom_zona;or_nom_zona;or_nom_zona_tipo;pagina;inicio;',
								document.getElementById('bs_nom_zona').value+';'+
                                document.getElementById('or_nom_zona').value+';'+
                                document.getElementById('or_nom_zona_tipo').value+';'+
                                '0;0;'
                                
							);"/>
			</td>
		</tr>		
	</table>
	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/Inventario/zonas/con_zonas.php',
								'bs_nom_zona;or_nom_zona;or_nom_zona_tipo;pagina;inicio;',
								document.getElementById('bs_nom_zona').value+';'+
                                document.getElementById('or_nom_zona').value+';'+
                                document.getElementById('or_nom_zona_tipo').value+';'+
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
    <table class="centrado width60P">		
            <tr class="centrado">
                <thead>
                    <th>
                        <a onClick="Ordenar('Modulos/Inventario/zonas/con_zonas.php',
												   'or_nom_zona',
												   'Nombre_Zonas_tmp',
												   'or_nom_zona_tipo',
												   'bs_nom_zona;pagina;inicio;',
                                                   document.getElementById('bs_nom_zona').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);"-->
                                Nombre
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
                <td><?=$res[$i]['Nombre_Zonas_tmp']?></td>
                <td class="centrado"><img src='img/SAE/modificar.png'
                onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/zonas/mod_zonas.php',
										'Id_Zonas_tmp;pagina;inicio;bs_nom_zona;or_nom_zona;or_nom_zona_tipo;',
										'<?=$res[$i]['Id_Zonas_tmp']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_zona?>;<?=$or_nom_zona?>;<?=$or_nom_zona_tipo?>;')"
                                        
                ></td>
                <td class="centrado">
                	<img src='img/SAE/eliminar.png' 
				 onClick="MostrarVentana(
										this,
										10,
										'Modulos/Inventario/zonas/eli_zonas.php',
										'Id_Zonas_tmp;pagina;inicio;bs_nom_zona;or_nom_zona;or_nom_zona_tipo;',
										'<?=$res[$i]['Id_Zonas_tmp']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_zona?>;<?=$or_nom_zona?>;<?=$or_nom_zona_tipo?>;')"
				
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
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/zonas/con_zonas.php','pagina;inicio;or_nom_zona;or_nom_zona_tipo;bs_nom_zona;',
								'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_zona').value+';'
								+document.getElementById('or_nom_zona_tipo').value+';'
								+document.getElementById('bs_nom_zona').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/Inventario/zonas/con_zonas.php','pagina;inicio;or_nom_zona;or_nom_zona_tipo;bs_nom_zona;',
								'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_zona').value+';'
								+document.getElementById('or_nom_zona_tipo').value+';'
								+document.getElementById('bs_nom_zona').value+';');
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
	<?php if(in_array("3002",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/zonas/agr_zonas.php','pagina;inicio;or_nom_zona;or_nom_zona_tipo;bs_nom_zona;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_zona').value+';'
								+document.getElementById('or_nom_zona_tipo').value+';'
								+document.getElementById('bs_nom_zona').value+';1;');">Agregar Zona</button>
	</div>
	<?php } ?>


<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_nom_zona').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el nombre de la zona"
	});
	
</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>