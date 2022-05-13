<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto         	= (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    
	$bs_id_llave          		= (isset($_GET['bs_id_llave'])) ? $_GET['bs_id_llave'] : '';
	$bs_nombre_llave          	= (isset($_GET['bs_nombre_llave'])) ? $_GET['bs_nombre_llave'] : '';
	$bs_espacio_llave          	= (isset($_GET['bs_espacio_llave'])) ? $_GET['bs_espacio_llave'] : '';
    
	$or_id_llave	    		= (isset($_GET['or_id_llave'])) ? $_GET['or_id_llave'] : '';
	$or_id_llave_tipo 			= (isset($_GET['or_id_llave_tipo'])) ? $_GET['or_id_llave_tipo'] : 'ASC';
	
	$or_nombre_llave	    	= (isset($_GET['or_nombre_llave'])) ? $_GET['or_nombre_llave'] : '';
	$or_nombre_llave_tipo 		= (isset($_GET['or_nombre_llave_tipo'])) ? $_GET['or_nombre_llave_tipo'] : 'ASC';
	
	$or_espacio_llave	    	= (isset($_GET['or_espacio_llave'])) ? $_GET['or_espacio_llave'] : '';
	$or_espacio_llave_tipo 		= (isset($_GET['or_espacio_llave_tipo'])) ? $_GET['or_espacio_llave_tipo'] : 'ASC';
    
	
    /***************************************************************************/
	/************************   PAGINACION      ********************************/
	/***************************************************************************/
	$sql ="SELECT Cantidad_Registros_Conf FROM tab_configuracion WHERE Id_Conf = 1";
	$cant_regitros = seleccion($sql);
	
	$TAMANO_PAGINA = $cant_regitros[0]['Cantidad_Registros_Conf'];
    
    
    /***************************************************************************/
	/************************   SQL PAGINACION  ********************************/
	/***************************************************************************/
    $sql ="SELECT COUNT(Id_LLA) AS Cant_Registros FROM tab_preslla_llaves WHERE Activo_LLA = '1'";
				
	if($bs_id_llave  != "" ){
		$sql.=" AND Id_LLA = ".$bs_id_llave;
	}
	
	if($bs_nombre_llave  != "" ){
		$sql.=" AND Nombre_LLA like '%".$bs_nombre_llave."%'";
	}
	
	if($bs_espacio_llave  != "" ){
		$sql.=" AND Espacio_LLA = ".$bs_espacio_llave;
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
	$sql ="SELECT Id_LLA, Nombre_LLA,Espacio_LLA,Foto_LLA  FROM tab_preslla_llaves WHERE Activo_LLA = '1'";
	
    if($bs_id_llave  != "" ){
		$sql.=" AND Id_LLA = ".$bs_id_llave;
	}
	
	if($bs_nombre_llave  != "" ){
		$sql.=" AND Nombre_LLA like '%".$bs_nombre_llave."%'";
	}
	
	if($bs_espacio_llave  != "" ){
		$sql.=" AND Espacio_LLA = ".$bs_espacio_llave;
	}
    
	
    if ($or_id_llave != "") {
	    $sql.=" ORDER BY ".$or_id_llave.' '.$or_id_llave_tipo;
	}else if($or_nombre_llave!=""){
		$sql.=" ORDER BY ".$or_nombre_llave.' '.$or_nombre_llave_tipo;
	}else if($or_espacio_llave!=""){
		$sql.=" ORDER BY ".$or_espacio_llave.' '.$or_espacio_llave_tipo;
	}else{
	    $sql.=" ORDER BY Id_LLA ASC";   
	}
    
	
    $sql.=" limit " . $inicio . "," . $TAMANO_PAGINA;
    
    
    $res = seleccion($sql);
    //echo $sql;

?>

<!-- ****************************************************************************************** -->
<!-- **************************** Campos Ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="or_id_llave" name="or_id_llave" value="<?=$or_id_llave?>" />
<input type="hidden" id="or_id_llave_tipo" name="or_id_llave_tipo" value="<?=$or_id_llave_tipo?>" />
<input type="hidden" id="or_nombre_llave" name="or_nombre_llave" value="<?=$or_nombre_llave?>" />
<input type="hidden" id="or_nombre_llave_tipo" name="or_nombre_llave_tipo" value="<?=$or_nombre_llave_tipo?>" />
<input type="hidden" id="or_espacio_llave" name="or_espacio_llave" value="<?=$or_espacio_llave?>" />
<input type="hidden" id="or_espacio_llave_tipo" name="or_espacio_llave_tipo" value="<?=$or_espacio_llave_tipo?>" />



<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Consultar Llaves</span>
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
    <table class="width20P centrado" >		
		<tr>
			<td class="fondo_Azul blanco">ID:</td>
			<td>
				<input type="text" name="bs_id_llave" id="bs_id_llave"  maxlength="2" value="<?=$bs_id_llave?>" placeholder="Digite el id de llave"
				onKeyPress="Buscar(
								event,
								'Modulos/Llaves/llaves/con_llaves.php',
								'bs_id_llave;'+
								'bs_nombre_llave;'+
								'bs_espacio_llave;'+
								'or_id_llave;'+
								'or_id_llave_tipo;'+
								'or_nombre_llave;'+
								'or_nombre_llave_tipo;'+
								'or_espacio_llave;'+
								'or_espacio_llave_tipo;'+
								'pagina;inicio;',
								document.getElementById('bs_id_llave').value+';'+
								document.getElementById('bs_nombre_llave').value+';'+
								document.getElementById('bs_espacio_llave').value+';'+
                                document.getElementById('or_id_llave').value+';'+
                                document.getElementById('or_id_llave_tipo').value+';'+
								document.getElementById('or_nombre_llave').value+';'+
                                document.getElementById('or_nombre_llave_tipo').value+';'+
								document.getElementById('or_espacio_llave').value+';'+
                                document.getElementById('or_espacio_llave_tipo').value+';'+
                                '0;0;'
                                
							);"/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Nombre:</td>
			<td>
				<input type="text" name="bs_nombre_llave" id="bs_nombre_llave"  maxlength="100" value="<?=$bs_nombre_llave?>" placeholder="Digite el nombre"
				onKeyPress="Buscar(
								event,
								'Modulos/Llaves/llaves/con_llaves.php',
								'bs_id_llave;'+
								'bs_nombre_llave;'+
								'bs_espacio_llave;'+
								'or_id_llave;'+
								'or_id_llave_tipo;'+
								'or_nombre_llave;'+
								'or_nombre_llave_tipo;'+
								'or_espacio_llave;'+
								'or_espacio_llave_tipo;'+
								'pagina;inicio;',
								document.getElementById('bs_id_llave').value+';'+
								document.getElementById('bs_nombre_llave').value+';'+
								document.getElementById('bs_espacio_llave').value+';'+
                                document.getElementById('or_id_llave').value+';'+
                                document.getElementById('or_id_llave_tipo').value+';'+
								document.getElementById('or_nombre_llave').value+';'+
                                document.getElementById('or_nombre_llave_tipo').value+';'+
								document.getElementById('or_espacio_llave').value+';'+
                                document.getElementById('or_espacio_llave_tipo').value+';'+
                                '0;0;'
                                
							);"/>
			</td>
		</tr>
		<tr>
			<td class="fondo_Azul blanco">Espacio:</td>
			<td>
				<input type="text" name="bs_espacio_llave" id="bs_espacio_llave"  maxlength="2" value="<?=$bs_espacio_llave?>" placeholder="Digite el número de espacio"
				onKeyPress="Buscar(
								event,
								'Modulos/Llaves/llaves/con_llaves.php',
								'bs_id_llave;'+
								'bs_nombre_llave;'+
								'bs_espacio_llave;'+
								'or_id_llave;'+
								'or_id_llave_tipo;'+
								'or_nombre_llave;'+
								'or_nombre_llave_tipo;'+
								'or_espacio_llave;'+
								'or_espacio_llave_tipo;'+
								'pagina;inicio;',
								document.getElementById('bs_id_llave').value+';'+
								document.getElementById('bs_nombre_llave').value+';'+
								document.getElementById('bs_espacio_llave').value+';'+
                                document.getElementById('or_id_llave').value+';'+
                                document.getElementById('or_id_llave_tipo').value+';'+
								document.getElementById('or_nombre_llave').value+';'+
                                document.getElementById('or_nombre_llave_tipo').value+';'+
								document.getElementById('or_espacio_llave').value+';'+
                                document.getElementById('or_espacio_llave_tipo').value+';'+
                                '0;0;'
                                
							);"/>
			</td>
		</tr>
	</table>
	<br />
	<button class="boton" onclick="javascript:
						Buscar(
								'',
								'Modulos/Llaves/llaves/con_llaves.php',
								'bs_id_llave;'+
								'bs_nombre_llave;'+
								'bs_espacio_llave;'+
								'or_id_llave;'+
								'or_id_llave_tipo;'+
								'or_nombre_llave;'+
								'or_nombre_llave_tipo;'+
								'or_espacio_llave;'+
								'or_espacio_llave_tipo;'+
								'pagina;inicio;',
								document.getElementById('bs_id_llave').value+';'+
								document.getElementById('bs_nombre_llave').value+';'+
								document.getElementById('bs_espacio_llave').value+';'+
                                document.getElementById('or_id_llave').value+';'+
                                document.getElementById('or_id_llave_tipo').value+';'+
								document.getElementById('or_nombre_llave').value+';'+
                                document.getElementById('or_nombre_llave_tipo').value+';'+
								document.getElementById('or_espacio_llave').value+';'+
                                document.getElementById('or_espacio_llave_tipo').value+';'+
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
                        <a onClick="Ordenar('Modulos/Llaves/llaves/con_llaves.php',
													'or_id_llave',
													'Id_LLA',
													'or_id_llave_tipo',

													'bs_id_llave;'+
													'bs_nombre_llave;'+
													'bs_espacio_llave;'+
													'pagina;inicio;',
													document.getElementById('bs_id_llave').value+';'+
													document.getElementById('bs_nombre_llave').value+';'+
													document.getElementById('bs_espacio_llave').value+';'+
													'0;0;'
												);
								window.scrollTo(0,0);">
                                ID
                        </a>
                    </th>
					 <th>
                        <a onClick="Ordenar('Modulos/Llaves/llaves/con_llaves.php',
													'or_nombre_llave',
													'Nombre_LLA',
													'or_nombre_llave_tipo',

													'bs_id_llave;'+
													'bs_nombre_llave;'+
													'bs_espacio_llave;'+
													'pagina;inicio;',
													document.getElementById('bs_id_llave').value+';'+
													document.getElementById('bs_nombre_llave').value+';'+
													document.getElementById('bs_espacio_llave').value+';'+
													'0;0;'
												);
								window.scrollTo(0,0);">
                                Nombre
                        </a>
                    </th>
					  <th>
                        <a onClick="Ordenar('Modulos/Llaves/llaves/con_llaves.php',
													'or_espacio_llave',
													'Espacio_LLA',
													'or_espacio_llave_tipo',

													'bs_id_llave;'+
													'bs_nombre_llave;'+
													'bs_espacio_llave;'+
													'pagina;inicio;',
													document.getElementById('bs_id_llave').value+';'+
													document.getElementById('bs_nombre_llave').value+';'+
													document.getElementById('bs_espacio_llave').value+';'+
													'0;0;'
												);
								window.scrollTo(0,0);">
                                Espacio
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
                <td class="centrado"><?=$res[$i]['Id_LLA']?></td>
				<td class="centrado"><?=$res[$i]['Nombre_LLA']?></td>
				<td class="centrado"><?=$res[$i]['Espacio_LLA']?></td>
                <td class="centrado"><img src='img/SAE/modificar.png'
                onClick="/*MostrarVentana(
										this,
										10,
										'Modulos/Inventario/compromisos/mod_compromisos.php',
										'Id_Compr;pagina;inicio;bs_id_llave;or_id_llave;or_id_llave_tipo;',
										'<?=$res[$i]['Id_Compr']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_id_llave?>;<?=$or_id_llave?>;<?=$or_id_llave_tipo?>;')*/"
                                        
                ></td>
                <td class="centrado"><img src='img/SAE/eliminar.png' 
				 onClick="/*MostrarVentana(
										this,
										10,
										'Modulos/Inventario/compromisos/eli_compromisos.php',
										'Id_Compr;pagina;inicio;bs_id_llave;or_id_llave;or_id_llave_tipo;',
										'<?=$res[$i]['Id_Compr']?>;<?=$pagina?>;<?=$inicio?>;<?=$bs_id_llave?>;<?=$or_id_llave?>;<?=$or_id_llave_tipo?>;')*/"
				
				></td>
            </tr>
            
            
            <?php
                }
            }else{
            ?>
                <tr>
					<td colspan="5" class="centrado"><?=$texto['No_Datos']?></td>
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
					<a onClick="CargaPaginaMenu(
												'Modulos/Llaves/llaves/con_llaves.php',
												'pagina;'+
												'inicio;'+
												'or_id_llave;'+
												'or_id_llave_tipo;'+
												'or_nombre_llave;'+
												'or_nombre_llave_tipo;'+
												'or_espacio_llave;'+
												'or_espacio_llave_tipo;'+
												'bs_id_llave;'+
												'bs_nombre_llave;'+
												'bs_espacio_llave;',
												'<?=$pagina - 1 ?>;'+
												'<?=$inicio - $TAMANO_PAGINA ?>;'+
												document.getElementById('or_id_llave').value+';'+
												document.getElementById('or_id_llave_tipo').value+';'+
												document.getElementById('or_nombre_llave').value+';'+
												document.getElementById('or_nombre_llave_tipo').value+';'+
												document.getElementById('or_espacio_llave').value+';'+
												document.getElementById('or_espacio_llave_tipo').value+';'+
												document.getElementById('bs_id_llave').value+';'+
												document.getElementById('bs_nombre_llave').value+';'+
												document.getElementById('bs_espacio_llave').value+';'
											);
								window.scrollTo(0,0);"
					>
								<img src="img/SAE/anterior.png" alt="<?=$texto['Anterior']?>" class="alineado_medio" /></a>
					&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?=$texto['Pagina']?>: <?= $pagina ?> <?=$texto['de']?> <?= $cant_pagi ?>
				<?php if (($cant_pagi != $pagina)&&($cant_pagi != 0)) { ?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="CargaPaginaMenu(
												'Modulos/Llaves/llaves/con_llaves.php',
												'pagina;'+
												'inicio;'+
												'or_id_llave;'+
												'or_id_llave_tipo;'+
												'or_nombre_llave;'+
												'or_nombre_llave_tipo;'+
												'or_espacio_llave;'+
												'or_espacio_llave_tipo;'+
												'bs_id_llave;'+
												'bs_nombre_llave;'+
												'bs_espacio_llave;',
												'<?=$pagina + 1 ?>;'+
												'<?=$inicio + $TAMANO_PAGINA ?>;'+
												document.getElementById('or_id_llave').value+';'+
												document.getElementById('or_id_llave_tipo').value+';'+
												document.getElementById('or_nombre_llave').value+';'+
												document.getElementById('or_nombre_llave_tipo').value+';'+
												document.getElementById('or_espacio_llave').value+';'+
												document.getElementById('or_espacio_llave_tipo').value+';'+
												document.getElementById('bs_id_llave').value+';'+
												document.getElementById('bs_nombre_llave').value+';'+
												document.getElementById('bs_espacio_llave').value+';'
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
	<?php if(in_array("10002",$_SESSION['Permisos'])){ ?>
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="CargaPaginaMenu('Modulos/Llaves/llaves/agr_llaves.php',
								'bs_id_llave;'+
								'bs_nombre_llave;'+
								'bs_espacio_llave;'+
								'or_id_llave;'+
								'or_id_llave_tipo;'+
								'or_nombre_llave;'+
								'or_nombre_llave_tipo;'+
								'or_espacio_llave;'+
								'or_espacio_llave_tipo;'+
								'mostrar_efecto;',
								document.getElementById('bs_id_llave').value+';'+
								document.getElementById('bs_nombre_llave').value+';'+
								document.getElementById('bs_espacio_llave').value+';'+
								document.getElementById('or_id_llave').value+';'+
								document.getElementById('or_id_llave_tipo').value+';'+
								document.getElementById('or_nombre_llave').value+';'+
								document.getElementById('or_nombre_llave_tipo').value+';'+
								document.getElementById('or_espacio_llave').value+';'+
								document.getElementById('or_espacio_llave_tipo').value+';'+
								'1;');">Agregar Llave</button>
	</div>
	<?php } ?>


<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
	<?php if($mostrar_efecto==1) { ?>
		$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
	<?php }?>
	$('#bs_id_llave').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el número de llave"
	});
	$('#bs_nombre_llave').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el nombre de llave"
	});
	$('#bs_espacio_llave').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: "Digite el número del espacio del casillero"
	});
	
</script>

<?php
	include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
?>