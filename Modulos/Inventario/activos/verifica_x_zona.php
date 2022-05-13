<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/
	
	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) 	? $_GET['mostrar_efecto'] 	: '';
	$id_zona     		= (isset($_GET['id_zona'])) 		? $_GET['id_zona'] 			: '';
	$id_ins     		= (isset($_GET['id_ins'])) 			? $_GET['id_ins'] 			: '';


	/***************************************************************************/
	/*********** DETERMINAR A QUE UNIVERSIDA PERTENECE EL USUARIO   ************/
	/***************************************************************************/
	$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu;
	$resMiembroUni = seleccion($sql);

	error_log($id_zona);

	if( ($id_zona!="") && ($id_zona != 1)){
		
		$sql = "SELECT 
						Id_Act, 
				        Id_INS_Act, 
				        Id_Uni_Act,
				        Nombre_Act,
				        Foto_Act,
				        Verificado_Act, 
				        Marca_Act, 
				        Modelo_Act,
				        Numero_Serie_Act,
				        Diminutivo_Uni
				FROM tab_Activos
				INNER JOIN tab_universidades ON (Id_Uni = Id_Uni_Act)
				WHERE 
				(Activo_ACT = '1') AND 
				Id_Zonas_tmp_Act = ".$id_zona;

		//Si se paso un paremetro de Id_Ins
		if($id_ins!=0){
			$sql .= " AND Id_Uni_Act = ".$id_ins;
		}else{
			$cantiUniUsu = count($resMiembroUni);
			if($cantiUniUsu>0){
				$sql .= " AND (";
				for($a=0;$a<$cantiUniUsu;$a++){
					$sql .= " ( Id_Uni_Act =".$resMiembroUni[$a]['Id_Uni_PXU'].")";
					if(($a+1)<$cantiUniUsu){
						$sql .= " OR ";
					}
				}
				$sql .= ")";
			}
		}

		error_log($sql);
		$resActivos = seleccion($sql);
	}else{
		$resActivos = array();
	}
	

?>
<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Verifica Activos X Zona</span>
</div>


<style>
	input,select,textarea{
		width: 90%;
	}
</style>

<div class="centrado">

		<button class="boton" onclick="valida_desverificar_x_zona_institucion(this);">
			Desverificar X (Zona e Institución)
		</button>
		<br />
		<br />
</div>
<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width40P" >
		<tr><th colspan="2" class="centrado">Paso1: Seleccione la ubicación  que desea verificar:</th></tr>
		<tr>
			<td>Seleccione la zona</td>
			<td>
				<select id="id_zona" name="id_zona" onchange="Buscar(
																	'',
																	'Modulos/Inventario/activos/verifica_x_zona.php',
												  					'id_zona;id_ins;',
												   					document.getElementById('id_zona').value+';'+
												   					document.getElementById('id_ins').value+';');">
					<option value="0">[Seleccione]</option>
					<?php
						$sql ="SELECT Id_Zonas_tmp,Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Activo_Zonas_tmp = '1' ORDER BY Nombre_Zonas_tmp ";
						$res = seleccion($sql);
						for($i=0;$i<count($res);$i++){

					?>
						<option value="<?=$res[$i]['Id_Zonas_tmp']?>" 
							<?php
								if($res[$i]['Id_Zonas_tmp'] == $id_zona){
									echo "selected='selected' ";
								}
							?>
						>
							<?=$res[$i]['Nombre_Zonas_tmp']?>
						</option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Paso2: Seleccione de cual institución desea verificar:</th></tr>
		<tr>
			<td>Seleccione la institución</td>
			<td>
				<select id="id_ins" name="id_ins" onchange="Buscar(
																	'',
																	'Modulos/Inventario/activos/verifica_x_zona.php',
												  					'id_zona;id_ins;',
												   					document.getElementById('id_zona').value+';'+
												   					document.getElementById('id_ins').value+';');"/>
				<option value="0">[TODAS]</option>

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
												if($res[$i]['Id_Uni'] == $id_ins){
													echo "selected='selected' ";
												}
											?>

					                	><?=$res[$i]['Diminutivo_Uni']?></option>

					                	<?php
					                		break;
					                	} 
					                }	
					        }
						}
					}
				?>
			</select>
			</td>
		</tr>
		<tr><th colspan="2" class="centrado">Paso3: Digite o escanee los códigos de activos SIUA:</th></tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<input type="text" name="Id_Act" id="Id_Act" maxlength="10" onkeypress="ENTER(event,'verificacionVerificarActivoSIUA()')" placeholder="Digite el activo siua..." class="verificacionInputEscanear" 
				<?php
					if( ($id_zona=="") || ($id_zona == 1)){
						echo 'disabled="disabled"';
					}
				?>
				 />
			</td>
	
		</tr>
	</table>

	<?php
		if( ($id_zona!="") && ($id_zona != 1)){
	?>
	<!-- ****************************************************************************************** -->
	<!-- **************************      Activos no verificados     ******************************* -->
	<!-- ****************************************************************************************** -->
	<div class="verificacionContenedor">
		<h3 class="verificacionTituloLista">Lista de activos no verificados</h3>
		<div class="verificacionSubtituloLista">
			<div class="verificacionColumnaTituloFoto">
				Foto
			</div>
			<div class="verificacionColumnaTituloId">
				Id Activo
			</div>
			<div class="verificacionColumnaTituloNombre">
				Nombre
			</div>
			<div class="verificacionColumnaTituloSerie">
				Serie
			</div>
			<div class="verificacionColumnaTituloMarca">
				Marca
			</div>
			<div class="verificacionColumnaTituloModelo">
				Modelo
			</div>
			<div class="verificacionColumnaTituloUni">
				Institución
			</div>
			<div class="verificacionColumnaTituloVeri">
				Verificación
			</div>
		</div>
		<div id="listaActivosNoVerificados">
			<?php
	            if(count($resActivos)>0){
	                for($i=0;$i<count($resActivos);$i++){
	        ?>
	        	<div id="fila<?=$resActivos[$i]['Id_Act']?>" class="verificacionFilaActivo">
	        		<div class="verificacionColumnaFoto">
	        			<?php
	        				if($resActivos[$i]['Foto_Act']==''){
								$Foto_Act = $path."img/inventario/activos/default.png";
							}else{
								$Foto_Act = $path."img/inventario/activos/".$resActivos[$i]['Foto_Act'];
								if(!file_exists($Foto_Act)){
									$Foto_Act = $path."img/inventario/activos/default.png";
								}
							}
	        			?>
	        			<a id="fancybox_principal<?=$resActivos[$i]['Id_Act']?>" href="<?=$Foto_Act?>" data-fancybox-group="gallery" title="<?=$resActivos[$i]['Nombre_Act']?>">
	        				<img src="<?=$Foto_Act?>" style="width: 60px; height: 60px; border-radius: 10px;"/>
	        			</a>
	        			<script type="text/javascript">
								$('#fancybox_principal<?=$resActivos[$i]['Id_Act']?>').fancybox();
						</script>
	        		</div>
	        		<div class="verificacionColumnaId">
	        			<?php 
	        				if($resActivos[$i]['Id_Act']!= ""){
	        					$texto = $resActivos[$i]['Id_Act'];
	        				}else{
	        					$texto = "-";
	        				}
	        				echo $texto;
	        			?>
	        		</div>
	        		<div class="verificacionColumnaNombre">
	        			<?php 
	        				if($resActivos[$i]['Nombre_Act']!= ""){
	        					$texto = $resActivos[$i]['Nombre_Act'];
	        				}else{
	        					$texto = "-";
	        				}
	        				echo $texto;
	        			?>
	        		</div>
	        		<div class="verificacionColumnaSerie">
	        			<?php 
	        				if($resActivos[$i]['Numero_Serie_Act']!= ""){
	        					$texto = $resActivos[$i]['Numero_Serie_Act'];
	        				}else{
	        					$texto = "-";
	        				}
	        				echo $texto;
	        			?>
	        		</div>
	        		<div class="verificacionColumnaMarca">
	        			<?php 
	        				if($resActivos[$i]['Marca_Act']!= ""){
	        					$texto = $resActivos[$i]['Marca_Act'];
	        				}else{
	        					$texto = "-";
	        				}
	        				echo $texto;
	        			?>
	        		</div>
	        		<div class="verificacionColumnaModelo">
	        			<?php 
	        				if($resActivos[$i]['Modelo_Act']!= ""){
	        					$texto = $resActivos[$i]['Modelo_Act'];
	        				}else{
	        					$texto = "-";
	        				}
	        				echo $texto;
	        			?>
	        		</div>
	        		<div class="verificacionColumnaUni">
	        			<?php 
	        				if($resActivos[$i]['Diminutivo_Uni']!= ""){
	        					$texto = $resActivos[$i]['Diminutivo_Uni'];
	        				}else{
	        					$texto = "-";
	        				}
	        				echo $texto;
	        			?>
	        		</div>
	        		<div class="verificacionColumnaVeri">
	        			<?php 
	        				
	    					if($resActivos[$i]['Verificado_Act']==1){
	    				?>
	    					<img id="imagen<?=$resActivos[$i]['Id_Act']?>" src="img/SAE/si.png" />
	    				<?php
	    					}else if($resActivos[$i]['Verificado_Act']==0){
	    				?>
	    					<img id="imagen<?=$resActivos[$i]['Id_Act']?>" src="img/SAE/no.png" />
	    				<?php
	    					}
	    				
	        			?>
	        		</div>
	        	</div>
	        <?php
	        		}
	        	}

	        ?>

			</div>		
		</div>
	</div>

	<!-- ****************************************************************************************** -->
	<!-- **************************      Activos verificados        ******************************* -->
	<!-- ****************************************************************************************** -->
	<div class="verificacionContenedor">
		<h3 class="verificacionTituloLista">Lista de activos verificados</h3>
		<div class="verificacionSubtituloLista">
			<div class="verificacionColumnaTituloFoto">
				Foto
			</div>
			<div class="verificacionColumnaTituloId">
				Id Activo
			</div>
			<div class="verificacionColumnaTituloNombre">
				Nombre
			</div>
			<div class="verificacionColumnaTituloSerie">
				Serie
			</div>
			<div class="verificacionColumnaTituloMarca">
				Marca
			</div>
			<div class="verificacionColumnaTituloModelo">
				Modelo
			</div>
			<div class="verificacionColumnaTituloUni">
				Institución
			</div>
			<div class="verificacionColumnaTituloVeri">
				Verificación
			</div>
		</div>
		<div id="listaActivosVerificados">		
		</div>
	</div>

	<?php

		}//Ya el suuario selecciono una zona
	?>

	
<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		document.getElementById('id_zona').focus();



		$('#id_zona').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la ubicación a verificar"
		});
		$('#id_ins').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Seleccione la institución a la que pertenecen los activos"
		});
		<?php
			if( ($id_zona=="") || ($id_zona == 1)){
				$texto = "Primero debe seleccionar la zona a validar";
				$class = "red";
			}else{
				$texto = "Digite el número de activo SIUA";
				$class = "dark";
			}
		?>
		$('#Id_Act').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'<?=$class?>',
			  content: "<?=$texto?>"
		});


		
		
</script>
