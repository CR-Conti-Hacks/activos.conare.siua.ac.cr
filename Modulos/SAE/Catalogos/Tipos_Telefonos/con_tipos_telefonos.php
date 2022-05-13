<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto         = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $bs_nom_tip_tel         = (isset($_GET['bs_nom_tip_tel'])) ? $_GET['bs_nom_tip_tel'] : '';
    $or_nom_TipoTele	    = (isset($_GET['or_nom_TipoTele'])) ? $_GET['or_nom_TipoTele'] : '';
	$or_nom_TipoTele_tipo 	= (isset($_GET['or_nom_TipoTele_tipo'])) ? $_GET['or_nom_TipoTele_tipo'] : 'ASC';
    
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
    $sql ="SELECT COUNT(Id_Tip_Tel) AS Cant_Registros FROM tab_tipos_telefonos WHERE Activo_Tip_Tel = '1'";
				
	if($bs_nom_tip_tel  != "" ){
		$sql.=" AND Nombre_Tip_Tel like '%".$bs_nom_tip_tel."%'";
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
	$sql ="SELECT Id_Tip_Tel,Nombre_Tip_Tel FROM tab_tipos_telefonos WHERE Activo_Tip_Tel = '1'";
    if($bs_nom_tip_tel  != "" ){
		$sql.=" AND Nombre_Tip_Tel like '%".$bs_nom_tip_tel."%'";
	}
    
    if ($or_nom_TipoTele != "") {
	    $sql.=" ORDER BY ".$or_nom_TipoTele.' '.$or_nom_TipoTele_tipo;
	}else{
	    $sql.=" ORDER BY Nombre_Tip_Tel ASC";   
	}
    
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
    $res = seleccion($sql);
    

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="or_nom_TipoTele" name="or_nom_TipoTele" value="<?=$or_nom_TipoTele?>" />
<input type="hidden" id="or_nom_TipoTele_tipo" name="or_nom_TipoTele_tipo" value="<?=$or_nom_TipoTele_tipo?>" />



<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Consultar_Tipos_Telefonos']  ?></span>
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
			<td class="fondo_Azul blanco"><?=$texto["Nombre"]?></td>
			<td>
				<input type="text" name="bs_nom_tip_tel" id="bs_nom_tip_tel"  maxlength="50" value="<?=$bs_nom_tip_tel?>" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre']?>"
				onKeyPress="Buscar(
								event,
								'Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php',
								'bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;pagina;inicio;',
								document.getElementById('bs_nom_tip_tel').value+';'+
                                document.getElementById('or_nom_TipoTele').value+';'+
                                document.getElementById('or_nom_TipoTele_tipo').value+';'+
                                '<?=$pagina.';'.$inicio.';'?>'
                                
							);"/>
			</td>
		</tr>		
	</table>
	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php',
								'bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;pagina;inicio;',
								document.getElementById('bs_nom_tip_tel').value+';'+
                                document.getElementById('or_nom_TipoTele').value+';'+
                                document.getElementById('or_nom_TipoTele_tipo').value+';'+
                                '<?=$pagina.';'.$inicio.';'?>'
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
                        <a onClick="Ordenar('Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php',
												   'or_nom_TipoTele',
												   'Nombre_Tip_Tel',
												   'or_nom_TipoTele_tipo',
												   'bs_nom_tip_tel;pagina;inicio;',
                                                   document.getElementById('bs_nom_tip_tel').value+';'+
                                                   '<?=$pagina.';'.$inicio.';'?>'
												);
								window.scrollTo(0,0);">
                                <?=$texto['Nombre']?>
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
                <td><?=$res[$i]['Nombre_Tip_Tel']?></td>
                <td class="centrado"><img src='img/SAE/modificar.png'
                onClick="MostrarVentana(
										this,
										10,
										'Modulos/SAE/Catalogos/Tipos_Telefonos/mod_tipos_telefonos.php',
										'Id_Tip_Tel;pagina;inicio;bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;',
										'<?=$res[$i]['Id_Tip_Tel']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_tip_tel?>;<?=$or_nom_TipoTele?>;<?=$or_nom_TipoTele_tipo?>;')"
                                        
                ></td>
                <td class="centrado"><img src='img/SAE/eliminar.png' 
				 onClick="MostrarVentana(
										this,
										10,
										'Modulos/SAE/Catalogos/Tipos_Telefonos/eli_tipos_telefonos.php',
										'Id_Tip_Tel;pagina;inicio;bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;',
										'<?=$res[$i]['Id_Tip_Tel']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_nom_tip_tel?>;<?=$or_nom_TipoTele?>;<?=$or_nom_TipoTele_tipo?>;')"
				
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
					<a onClick="javascript:CargaPaginaMenu('Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php','pagina;inicio;or_nom_TipoTele;or_nom_TipoTele_tipo;bs_nom_tip_tel;',
								'<?=$pagina - 1 ?>;<?=$inicio - $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_TipoTele').value+';'
								+document.getElementById('or_nom_TipoTele_tipo').value+';'
								+document.getElementById('bs_nom_tip_tel').value+';');
								window.scrollTo(0,0);">
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="javascript:CargaPaginaMenu('Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php','pagina;inicio;or_nom_TipoTele;or_nom_TipoTele_tipo;bs_nom_tip_tel;',
								'<?=$pagina + 1 ?>;<?=$inicio + $TAMANO_PAGINA ?>;'
								+document.getElementById('or_nom_TipoTele').value+';'
								+document.getElementById('or_nom_TipoTele_tipo').value+';'
								+document.getElementById('bs_nom_tip_tel').value+';');
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
	<?php if(in_array("1151",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Catalogos/Tipos_Telefonos/agr_tipos_telefonos.php','pagina;inicio;or_nom_TipoTele;or_nom_TipoTele_tipo;bs_nom_tip_tel;mostrar_efecto;',
								'<?=$pagina?>;<?=$inicio?>;'
								+document.getElementById('or_nom_TipoTele').value+';'
								+document.getElementById('or_nom_TipoTele_tipo').value+';'
								+document.getElementById('bs_nom_tip_tel').value+';1;');"><?=$texto['TITULO_Agregar_Tipos_Telefonos']?></button>
	</div>
	<?php } ?>


<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_nom_tip_tel').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "<?=$texto['AYUDA_Digite_Tipos_Telefonos']?>"
	});
</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>