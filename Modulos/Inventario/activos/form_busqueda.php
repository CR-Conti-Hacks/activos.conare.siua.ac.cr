<?php

$funcionBuscarInput =   

"Buscar(".
"event,".
"'Modulos/Inventario/activos/con_activos.php',".

"'".//Comilla

//paginación
"pagina;inicio;".

//SAE
"sae_cantidadRegistros;".

//Datos Activo
"bs_Id_Act;".
"bs_Nombre_Act;".
"bs_Marca_Act;".
"bs_Modelo_Act;".
"bs_Color_Act;".
"bs_Numero_Serie_Act;".


//Identificadores de Activo
"bs_Id_INS_Act;".
"bs_Id_Uni_Act;".

//Activo Fijo
"bs_Activo_Fijo_Act;".
"bs_No_Activo_Fijo_Act;".

//Fecha y año Recepción
"bs_Fecha_Recepcion_Act;".
"bs_anno_inicio;".
"bs_anno_fin;".

//Datos de compra
"bs_Numero_OC;".
"bs_Numero_Factu;".
"bs_Numero_Prove;".
"bs_Id_Compromiso;".
"bs_Id_Partida;".
"bs_Id_Transferencia;".

//Ubicación
"bs_Id_Zona_tmp_Act;".

//CONARE: Responsables
"bs_Id_Res;".
"bs_Id_Cus;".

//Estados
"bs_Desecho_Act;".
"bs_Donacion_Act;".
"bs_Mantenimiento_Act;".

//Verificación
"bs_Verificado_Act;".
"bs_No_Verificado_Act;".

//Ordenamiento
"or_Id_Act;".
"or_tipo_Id_Act;".
"or_Nombre_Act;".
"or_tipo_Nombre_Act;".
"or_Marca_Act;".
"or_tipo_or_Marca_Act;".
"or_Numero_Serie_Act;".
"or_tipo_Numero_Serie_Act;".
"or_Nombre_Uni;".
"or_tipo_Nombre_Uni;".
"or_Id_INS_Act;".
"or_tipo_Id_INS_Act;".
"or_Nombre_Zonas_tmp;".
"or_tipo_Nombre_Zonas_tmp;".
"or_Activo_Fijo_Act;".
"or_tipo_Activo_Fijo_Act;".

"'". //Comilla

",". //Coma

//paginación
"'0;0;'+". 

//SAE
"document.getElementById('sae_cantidadRegistros').value".
"+';'+".

//Datos Activo 
"document.getElementById('bs_Id_Act').value".
"+';'+".
"document.getElementById('bs_Nombre_Act').value".
"+';'+".
"document.getElementById('bs_Marca_Act').value".
"+';'+".
"document.getElementById('bs_Modelo_Act').value".
"+';'+".
"document.getElementById('bs_Color_Act').value".
"+';'+".
"document.getElementById('bs_Numero_Serie_Act').value".
"+';'+".


//Identificadores de Activo
"document.getElementById('bs_Id_INS_Act').value".
"+';'+".
"document.getElementById('bs_Id_Uni_Act').value".
"+';'+".

//Activo Fijo
"document.getElementById('bs_Activo_Fijo_Act').checked".
"+';'+".
"document.getElementById('bs_No_Activo_Fijo_Act').checked".
"+';'+".


//Fecha y año Recepción
"document.getElementById('bs_Fecha_Recepcion_Act').value".
"+';'+".
"document.getElementById('bs_anno_inicio').value".
"+';'+".
"document.getElementById('bs_anno_fin').value".
"+';'+".


//Datos de compra
"document.getElementById('bs_Numero_OC').value".
"+';'+".
"document.getElementById('bs_Numero_Factu').value".
"+';'+".
"document.getElementById('bs_Numero_Prove').value".
"+';'+".
"document.getElementById('bs_Id_Compromiso').value".
"+';'+".
"document.getElementById('bs_Id_Partida').value".
"+';'+".
"document.getElementById('bs_Id_Transferencia').value".
"+';'+".


//Ubicación
"document.getElementById('bs_Id_Zona_tmp_Act').value".
"+';'+".

//CONARE: Responsables
"document.getElementById('bs_Id_Res').value".
"+';'+".
"document.getElementById('bs_Id_Cus').value".
"+';'+".

//Estados
"document.getElementById('bs_Desecho_Act').checked".
"+';'+".
"document.getElementById('bs_Donacion_Act').checked".
"+';'+".
"document.getElementById('bs_Mantenimiento_Act').checked".
"+';'+".

//Verificación
"document.getElementById('bs_Verificado_Act').checked".
"+';'+".
"document.getElementById('bs_No_Verificado_Act').checked".
"+';'+".

//Ordenamiento
"document.getElementById('or_Id_Act').value".
"+';'+".
"document.getElementById('or_tipo_Id_Act').value".
"+';'+".
"document.getElementById('or_Nombre_Act').value".
"+';'+".
"document.getElementById('or_tipo_Nombre_Act').value".
"+';'+".
"document.getElementById('or_Marca_Act').value".
"+';'+".
"document.getElementById('or_tipo_or_Marca_Act').value".
"+';'+".
"document.getElementById('or_Numero_Serie_Act').value".
"+';'+".
"document.getElementById('or_tipo_Numero_Serie_Act').value".
"+';'+".
"document.getElementById('or_Nombre_Uni').value".
"+';'+".
"document.getElementById('or_tipo_Nombre_Uni').value".
"+';'+".
"document.getElementById('or_Id_INS_Act').value".
"+';'+".
"document.getElementById('or_tipo_Id_INS_Act').value".
"+';'+".
"document.getElementById('or_Nombre_Zonas_tmp').value".
"+';'+".
"document.getElementById('or_tipo_Nombre_Zonas_tmp').value".
"+';'+".
"document.getElementById('or_Activo_Fijo_Act').value".
"+';'+".
"document.getElementById('or_tipo_Activo_Fijo_Act').value".
"+';'".//Ultimo

");"; //Cierre funcion


$funcionBuscarSelectCheckBox =   

"Buscar(".
"'',".
"'Modulos/Inventario/activos/con_activos.php',".

"'".//Comilla

//paginación
"pagina;inicio;".

//SAE
"sae_cantidadRegistros;".

//Datos Activo
"bs_Id_Act;".
"bs_Nombre_Act;".
"bs_Marca_Act;".
"bs_Modelo_Act;".
"bs_Color_Act;".
"bs_Numero_Serie_Act;".


//Identificadores de Activo
"bs_Id_INS_Act;".
"bs_Id_Uni_Act;".

//Activo Fijo
"bs_Activo_Fijo_Act;".
"bs_No_Activo_Fijo_Act;".

//Fecha y año Recepción
"bs_Fecha_Recepcion_Act;".
"bs_anno_inicio;".
"bs_anno_fin;".

//Datos de compra
"bs_Numero_OC;".
"bs_Numero_Factu;".
"bs_Numero_Prove;".
"bs_Id_Compromiso;".
"bs_Id_Partida;".
"bs_Id_Transferencia;".

//Ubicación
"bs_Id_Zona_tmp_Act;".

//CONARE: Responsables
"bs_Id_Res;".
"bs_Id_Cus;".

//Estados
"bs_Desecho_Act;".
"bs_Donacion_Act;".
"bs_Mantenimiento_Act;".

//Verificación
"bs_Verificado_Act;".
"bs_No_Verificado_Act;".

//Ordenamiento
"or_Id_Act;".
"or_tipo_Id_Act;".
"or_Nombre_Act;".
"or_tipo_Nombre_Act;".
"or_Marca_Act;".
"or_tipo_or_Marca_Act;".
"or_Numero_Serie_Act;".
"or_tipo_Numero_Serie_Act;".
"or_Nombre_Uni;".
"or_tipo_Nombre_Uni;".
"or_Id_INS_Act;".
"or_tipo_Id_INS_Act;".
"or_Nombre_Zonas_tmp;".
"or_tipo_Nombre_Zonas_tmp;".
"or_Activo_Fijo_Act;".
"or_tipo_Activo_Fijo_Act;".

"'". //Comilla

",". //Coma

//paginación
"'0;0;'+". 

//SAE
"document.getElementById('sae_cantidadRegistros').value".
"+';'+".

//Datos Activo 
"document.getElementById('bs_Id_Act').value".
"+';'+".
"document.getElementById('bs_Nombre_Act').value".
"+';'+".
"document.getElementById('bs_Marca_Act').value".
"+';'+".
"document.getElementById('bs_Modelo_Act').value".
"+';'+".
"document.getElementById('bs_Color_Act').value".
"+';'+".
"document.getElementById('bs_Numero_Serie_Act').value".
"+';'+".


//Identificadores de Activo
"document.getElementById('bs_Id_INS_Act').value".
"+';'+".
"document.getElementById('bs_Id_Uni_Act').value".
"+';'+".

//Activo Fijo
"document.getElementById('bs_Activo_Fijo_Act').checked".
"+';'+".
"document.getElementById('bs_No_Activo_Fijo_Act').checked".
"+';'+".


//Fecha y año Recepción
"document.getElementById('bs_Fecha_Recepcion_Act').value".
"+';'+".
"document.getElementById('bs_anno_inicio').value".
"+';'+".
"document.getElementById('bs_anno_fin').value".
"+';'+".


//Datos de compra
"document.getElementById('bs_Numero_OC').value".
"+';'+".
"document.getElementById('bs_Numero_Factu').value".
"+';'+".
"document.getElementById('bs_Numero_Prove').value".
"+';'+".
"document.getElementById('bs_Id_Compromiso').value".
"+';'+".
"document.getElementById('bs_Id_Partida').value".
"+';'+".
"document.getElementById('bs_Id_Transferencia').value".
"+';'+".


//Ubicación
"document.getElementById('bs_Id_Zona_tmp_Act').value".
"+';'+".

//CONARE: Responsables
"document.getElementById('bs_Id_Res').value".
"+';'+".
"document.getElementById('bs_Id_Cus').value".
"+';'+".

//Estados
"document.getElementById('bs_Desecho_Act').checked".
"+';'+".
"document.getElementById('bs_Donacion_Act').checked".
"+';'+".
"document.getElementById('bs_Mantenimiento_Act').checked".
"+';'+".

//Verificación
"document.getElementById('bs_Verificado_Act').checked".
"+';'+".
"document.getElementById('bs_No_Verificado_Act').checked".
"+';'+".

//Ordenamiento
"document.getElementById('or_Id_Act').value".
"+';'+".
"document.getElementById('or_tipo_Id_Act').value".
"+';'+".
"document.getElementById('or_Nombre_Act').value".
"+';'+".
"document.getElementById('or_tipo_Nombre_Act').value".
"+';'+".
"document.getElementById('or_Marca_Act').value".
"+';'+".
"document.getElementById('or_tipo_or_Marca_Act').value".
"+';'+".
"document.getElementById('or_Numero_Serie_Act').value".
"+';'+".
"document.getElementById('or_tipo_Numero_Serie_Act').value".
"+';'+".
"document.getElementById('or_Nombre_Uni').value".
"+';'+".
"document.getElementById('or_tipo_Nombre_Uni').value".
"+';'+".
"document.getElementById('or_Id_INS_Act').value".
"+';'+".
"document.getElementById('or_tipo_Id_INS_Act').value".
"+';'+".
"document.getElementById('or_Nombre_Zonas_tmp').value".
"+';'+".
"document.getElementById('or_tipo_Nombre_Zonas_tmp').value".
"+';'+".
"document.getElementById('or_Activo_Fijo_Act').value".
"+';'+".
"document.getElementById('or_tipo_Activo_Fijo_Act').value".
"+';'".//Ultimo

");"; //Cierre funcion
?>

<table class="width80P centrado" >
	<!-- *********************************************************************************************************************************************-->
	<!-- ******************************************      BUSQUEDA FILA 1       ***********************************************************************-->
	<!-- *********************************************************************************************************************************************-->
	<tr>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 1           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">N° Act. <?=$Diminutivo_ACON?>:</td>
		<td>
			<input type="text" name="bs_Id_Act" id="bs_Id_Act"  maxlength="30" value="<?=$bs_Id_Act?>" placeholder="Digite el número de activo..."
			onKeyPress="<?=$funcionBuscarInput?>"
			/>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Nombre:</td>
		<td>
			<input type="text" name="bs_Nombre_Act" id="bs_Nombre_Act"  maxlength="200" value="<?=$bs_Nombre_Act?>" placeholder="Digite el nombre del activo..."
			onKeyPress="<?=$funcionBuscarInput?>"
			/>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Orden:</td>
		<td>
			<select id="bs_Numero_OC" name="bs_Numero_OC" 
			onchange="<?=$funcionBuscarSelectCheckBox?>"  class='fstdropdown-select'/>
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
		<td class="fondo_Azul blanco">Marca:</td>
		<td>
			<input type="text" name="bs_Marca_Act" id="bs_Marca_Act"  maxlength="150" value="<?=$bs_Marca_Act?>" placeholder="Digite la marca del activo..."
			onKeyPress="<?=$funcionBuscarInput?>"
			/>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Modelo:</td>
		<td>
			<input type="text" name="bs_Modelo_Act" id="bs_Modelo_Act"  maxlength="150" value="<?=$bs_Modelo_Act?>" placeholder="Digite el modelo del activo..."
			onKeyPress="<?=$funcionBuscarInput?>"
			/>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">N° Factura:</td>
		<td>
			<div id="div_Id_Factu_Act">
				<select id="bs_Numero_Factu" name="bs_Numero_Factu" <?php if($bs_Numero_OC=='' || $bs_Numero_OC=='0'){ echo 'disabled="disabled"'; } ?>
				onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'/>
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
		<td class="fondo_Azul blanco">Color:</td>
		<td>
			<input type="text" name="bs_Color_Act" id="bs_Color_Act"  maxlength="150" value="<?=$bs_Color_Act?>" placeholder="Digite el color del activo..."
			onKeyPress="<?=$funcionBuscarInput?>"
			/>
		</td>

		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">N° Serie:</td>
		<td>
			<input type="text" name="bs_Numero_Serie_Act" id="bs_Numero_Serie_Act"  maxlength="150" value="<?=$bs_Numero_Serie_Act?>" placeholder="Digite el número de serie..."
			onKeyPress="<?=$funcionBuscarInput?>"
			/>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Proveedor:</td>
		<td>
			<select id="bs_Numero_Prove" name="bs_Numero_Prove" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'/>
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
		<td class="fondo_Azul blanco">Institución:</td>
		<td>
			<select id="bs_Id_Uni_Act" name="bs_Id_Uni_Act" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'/>
				<option value="0">[Seleccione]</option>
				<?php
					$sql ="SELECT Id_Uni,Diminutivo_Uni FROM tab_universidades WHERE Activo_Uni = '1' ORDER BY Diminutivo_Uni";
					$res = seleccion($sql);
					for($i=0;$i<count($res);$i++){
						//MIEMBRO UNIVERSIDAD
						if(isset($resMiembroUni[0]['Id_Uni_PXU'])){
							if(count($resMiembroUni)>0){

					                for($a=0;$a<count($resMiembroUni);$a++){
					                	if($resMiembroUni[$a]['Id_Uni_PXU'] == $res[$i]['Id_Uni']){
					                	?>

					                	<option value="<?=$res[$i]['Id_Uni']?>"

					                	<?php
					                		break;
					                	} 
					                }	
					        }
						}
				?>

					
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
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Zona:</td>
		<td>
			<select id="bs_Id_Zona_tmp_Act" name="bs_Id_Zona_tmp_Act" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'/>
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
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Compromiso:</td>
		<td>
			<select id="bs_Id_Compromiso" name="bs_Id_Compromiso" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'/>
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
		<td class="fondo_Azul blanco">Activo Fijo:</td>
		<td>
			<input name="bs_Activo_Fijo_Act" id="bs_Activo_Fijo_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_Activo_Fijo_Act){ echo 'checked="checked"';}?>
			onclick="
					document.getElementById('bs_No_Activo_Fijo_Act').checked=false;
					<?=$funcionBuscarSelectCheckBox?>
					"/>
			<label for="bs_Activo_Fijo_Act"></label>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Donación:</td>
		<td>
			<input name="bs_Donacion_Act" id="bs_Donacion_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_Donacion_Act){ echo 'checked="checked"';}?>
			onclick="<?=$funcionBuscarSelectCheckBox?>"/>
			<label for="bs_Donacion_Act"></label>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Partida:</td>
		<td>
			<select id="bs_Id_Partida" name="bs_Id_Partida" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'/>
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
		<td class="fondo_Azul blanco">Activo No Fijo:</td>
		<td>
			<input name="bs_No_Activo_Fijo_Act" id="bs_No_Activo_Fijo_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_No_Activo_Fijo_Act){ echo 'checked="checked"';}?>
			onclick="
					document.getElementById('bs_Activo_Fijo_Act').checked=false;
					<?=$funcionBuscarSelectCheckBox?>
					"/>
			<label for="bs_No_Activo_Fijo_Act"></label>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Desecho:</td>
		<td>
			<input name="bs_Desecho_Act" id="bs_Desecho_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_Desecho_Act){ echo 'checked="checked"';}?>
			onclick="<?=$funcionBuscarSelectCheckBox?>"/>
			<label for="bs_Desecho_Act"></label>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Transferencia:</td>
		<td>
			<select id="bs_Id_Transferencia" name="bs_Id_Transferencia" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'/>
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
		<td class="fondo_Azul blanco">Verificado:</td>
		<td>
			<input name="bs_Verificado_Act" id="bs_Verificado_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox"  <?php if($bs_Verificado_Act){ echo 'checked="checked"';}?>
				onclick="
						document.getElementById('bs_No_Verificado_Act').checked=false;
						<?=$funcionBuscarSelectCheckBox?> 
						"/>
			<label for="bs_Verificado_Act"></label>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Mantenimiento:</td>
		<td>
			<input name="bs_Mantenimiento_Act" id="bs_Mantenimiento_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_Mantenimiento_Act){ echo 'checked="checked"';}?>
			onclick="<?=$funcionBuscarSelectCheckBox?>"/>
			<label for="bs_Mantenimiento_Act"></label>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Fecha de Recepción:</td>
		<td>
			<input name="bs_Fecha_Recepcion_Act" id="bs_Fecha_Recepcion_Act"   type="text"  placeholder="Seleccione la fecha de recepción" readonly value="<?=$bs_Fecha_Recepcion_Act?>"
			onclick="<?=$funcionBuscarInput?>"/>
		</td>
		
		
	</tr>
	
	<!-- *********************************************************************************************************************************************-->
	<!-- ******************************************      BUSQUEDA FILA 7       ***********************************************************************-->
	<!-- *********************************************************************************************************************************************-->
	<tr>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 1           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">No Verificado:</td>
		<td>
			<input name="bs_No_Verificado_Act" id="bs_No_Verificado_Act"  class="cmn-toggle cmn-toggle-round" type="checkbox" <?php if($bs_No_Verificado_Act){ echo 'checked="checked"';}?>
			onclick="
					document.getElementById('bs_Verificado_Act').checked=false;
					<?=$funcionBuscarSelectCheckBox?> 
						"/>
			<label for="bs_No_Verificado_Act"></label>
		</td>

		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Responsable:</td>
		<td>
			<select id="bs_Id_Res" name="bs_Id_Res" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'>
				<option value="0">[Seleccione]</option>
				<?php

					/***************************************************************************/
					/*********** DETERMINAR A QUE UNIVERSIDAD PERTENECE EL USUARIO   ***********/
					/***************************************************************************/
					$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu;
					$resMiembroUni = seleccion($sql);

					//MIEMBRO UNIVERSIDAD
					$sqltmp = "";
					if(isset($resMiembroUni[0]['Id_Uni_PXU'])){
						if(count($resMiembroUni)>0){
									$sqltmp .=" WHERE (";

				                for($i=0;$i<count($resMiembroUni);$i++){
				                	$sqltmp .=" ( Id_Uni_Res =".$resMiembroUni[$i]['Id_Uni_PXU'].") ";
				                	if(count($resMiembroUni) != ($i+1)){
				                		$sqltmp.=" OR ";
				                	}
				                }	
				                	$sqltmp.=" ) ";
				        }
					}
					$sql ="SELECT Id_Res,Nombre_Res FROM tab_Responsables ".$sqltmp."ORDER BY Nombre_Res ASC";
					$res = seleccion($sql);
					for($i=0;$i<count($res);$i++){
				?>
					<option value="<?=$res[$i]['Id_Res']?>"

					<?php
						if($bs_Id_Res==$res[$i]['Id_Res']){
							echo 'selected="selected"';
						}
					?>
					><?=$res[$i]['Nombre_Res']?></option>
				<?php
					}
				?>
			</select>
			
		</td>

		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Fecha Inicio:</td>
		<td>
			<input name="bs_anno_inicio" id="bs_anno_inicio"   type="text"  placeholder="Seleccione la fecha de inicio" readonly value="<?=$bs_anno_inicio?>"
			onclick="document.getElementById('bs_anno_fin').disabled = false;"/>

		</td>
		
	</tr>

	<!-- *********************************************************************************************************************************************-->
	<!-- ******************************************      BUSQUEDA FILA 8       ***********************************************************************-->
	<!-- *********************************************************************************************************************************************-->
	<tr>
		
		
			<!-- **********************************************************************-->
			<!-- ******************           COLUMNA 1           *********************-->
			<!-- **********************************************************************-->
			<td class="fondo_Azul blanco"><?php if($Ocultar_Activo_Institucional_ACON !='1'){?>N° Act. Institucional:<?php } ?></td>
			<td >
				<input type="text" name="bs_Id_INS_Act" id="bs_Id_INS_Act"  maxlength="45" value="<?=$bs_Id_INS_Act?>" placeholder="Digite el número de activo institucional..."
				onKeyPress="<?=$funcionBuscarInput?>"
				<?php if($Ocultar_Activo_Institucional_ACON =='1'){?> style="display: none;"<?php }?>/>
			</td>
		
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 2           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Custodio:</td>
		<td>
			<select id="bs_Id_Cus" name="bs_Id_Cus" 
			onchange="<?=$funcionBuscarSelectCheckBox?>" class='fstdropdown-select'>
				<option value="0">[Seleccione]</option>
					<?php

						/***************************************************************************/
						/*********** DETERMINAR A QUE UNIVERSIDAD PERTENECE EL USUARIO   ***********/
						/***************************************************************************/
						$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu;
						$resMiembroUni = seleccion($sql);

						//MIEMBRO UNIVERSIDAD
						$sqltmp = "";
						if(isset($resMiembroUni[0]['Id_Uni_PXU'])){
							if(count($resMiembroUni)>0){
										$sqltmp .=" WHERE (";

					                for($i=0;$i<count($resMiembroUni);$i++){
					                	$sqltmp .=" ( Id_Uni_Cus =".$resMiembroUni[$i]['Id_Uni_PXU'].") ";
					                	if(count($resMiembroUni) != ($i+1)){
					                		$sqltmp.=" OR ";
					                	}
					                }	
					                	$sqltmp.=" ) ";
					        }
						}
						$sql ="SELECT Id_Cus,Nombre_Cus FROM tab_Custodios ".$sqltmp." ORDER BY Nombre_Cus ASC ";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){
					?>
						<option value="<?=$res[$i]['Id_Cus']?>"
						<?php
							if($bs_Id_Cus==$res[$i]['Id_Cus']){
								echo 'selected="selected"';
							}
						?>

						><?=$res[$i]['Nombre_Cus']?></option>
					<?php
						}
					?>
			</select>
		</td>
		<!-- **********************************************************************-->
		<!-- ******************           COLUMNA 3           *********************-->
		<!-- **********************************************************************-->
		<td class="fondo_Azul blanco">Fecha Fin:</td>
		<td>
			<input name="bs_anno_fin" id="bs_anno_fin"   type="text"  placeholder="Seleccione la fecha de fin" readonly value="<?=$bs_anno_fin?>"
			onclick="" disabled="disabled"/>
		</td>
	</tr>
</table>

<br />
<button 
class="boton" 
onclick="validaFormularioBusquedaActivos();"
>
<i class="fas fa-search"></i> <?=$texto['Buscar']?>
</button>

<button 
class="boton boton-gris" 
onclick="activosBuscarLimpiar();"
>
<i class="fas fa-eraser"></i> <?=$texto['Limpiar']?>
</button>