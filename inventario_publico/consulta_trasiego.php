<!DOCTYPE html>

<html lang="es-CR">
  <head>
    <?php 
    	include("header.php");
    ?>
    <?php
	    $colorEnlaceFooterUgit = "anaranjado";
    ?>
    <style>
    	.mdl-grid {
     		width: 90%;
		}

    	/*Definición de colores*/
    	:root {
		  --fondo1: #ff6f00 !important;
		  --fondo2: #ff6f00 !important;
		  --circulos: #FFF !important;
		   --boton: #f57f17 !important;
		}

		/*Header*/
    	.mdl-layout__header {
    		background-color: var(--fondo1);
    	}	
    	/*Card*/
    	div.mdl-card__title {
		    background-color: var(--fondo2);
		    color: #FFF;
		}
		/*Boton*/
	    .mdl-button--accent.mdl-button--accent.mdl-button--raised, .mdl-button--accent.mdl-button--accent.mdl-button--fab {
	        color: #FFF;
	        background-color: var(--boton);
	    }

		/*Preloader*/
		.loading::before {
		    background-color: var(--fondo1);
		}
		.loading:not(:required)::after {
		    -webkit-box-shadow: var(--circulos) 1.5em 0 0 0, var(--circulos) 1.1em 1.1em 0 0, var(--circulos) 0 1.5em 0 0, var(--circulos) -1.1em 1.1em 0 0, var(--circulos) -1.5em 0 0 0, var(--circulos) -1.1em -1.1em 0 0, var(--circulos) 0 -1.5em 0 0, var(--circulos) 1.1em -1.1em 0 0;
		    box-shadow: var(--circulos) 1.5em 0 0 0, var(--circulos) 1.1em 1.1em 0 0, var(--circulos) 0 1.5em 0 0, var(--circulos) -1.1em 1.1em 0 0, var(--circulos) -1.5em 0 0 0, var(--circulos) -1.1em -1.1em 0 0, var(--circulos) 0 -1.5em 0 0, var(--circulos) 1.1em -1.1em 0 0;
		    color: #FFF;
		}
		.titulo {
		    background-color: var(--fondo1);
		}

		.site-max-width {
		  max-width: 1200px;
		}
    </style>
  </head>

  <body id="top">

	<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../';

	include($path."Include/Bd/bd.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_TRA	= (isset($_GET['Id_TRA'])) ? $_GET['Id_TRA'] : '';

	/***************************************************************************/
	/************************   CONFIGURACION    *******************************/
	/***************************************************************************/
	$sql ="SELECT Direccion_Web_Conf, Direccion_Carpeta_Conf FROM tab_configuracion WHERE Id_Conf=1";
	$res_conf = seleccion($sql);
	$dominio = $res_conf[0]['Direccion_Web_Conf'];
	$ruta = $res_conf[0]['Direccion_Carpeta_Conf'];


	/***************************************************************************/
	/************************   DATOS DEL ACTIVO *******************************/
	/***************************************************************************/
	//Si existe un activo busquelo
	if($Id_TRA!=''){

		/*Obtenemos los datos del trasiego*/
		$sql = "SELECT 
					Id_TRA, 
					DATE(fecha_TRA) AS Fecha,
                    DATE_FORMAT(fecha_TRA, '%r') as Hora,
					motivo_TRA,
					Id_Per_Usu_TRA 
					FROM tab_sae_trasiegos WHERE Id_TRA = ".$Id_TRA;
		$resDatosTrasigeo = seleccion($sql);

		/*Obtenemos los datos del usuario*/
		$sql = "SELECT 
						Nombre_Per,
						Apellido1_Per,
						Apellido2_Per,
						Cedula_Per
				FROM tab_usuarios
				INNER JOIN tab_personas ON (Id_Per =Id_Per_Usu)
				WHERE Id_Per_Usu = ".$resDatosTrasigeo[0]['Id_Per_Usu_TRA'];
		$resDatosUsuario = seleccion($sql);

		/*Creamos la variables del correo*/
		$trasiegoId 				= $Id_TRA;
		$trasiegoFecha 				= $resDatosTrasigeo[0]['Fecha'];
		$trasiegoHora 				= $resDatosTrasigeo[0]['Hora'];
		$trasiegoMotivo 			= $resDatosTrasigeo[0]['motivo_TRA'];
		$trasiegoIdentificacion 	= $resDatosUsuario[0]['Cedula_Per'];
		$trasiegoNombre 			= $resDatosUsuario[0]['Nombre_Per']." ".$resDatosUsuario[0]['Apellido1_Per']." ".$resDatosUsuario[0]['Apellido2_Per'];

		$sql = "SELECT 
					h.Id_HZ,
				    h.Id_Act_HZ,
				    h.Id_Zonas_tmp_Anterior_HZ,
				    h.Id_Zonas_tmp_Nuevo_HZ,

				    z1.Nombre_Zonas_tmp AS Zona_Anterior,
					z2.Nombre_Zonas_tmp AS Zona_Nueva
				FROM tab_sae_TXHZ
				INNER JOIN (tab_sae_historial_zona	AS h ) ON (h.Id_HZ = Id_HZ_TXHZ)
				INNER JOIN (tab_zonas_tmp 			AS z1) ON (h.Id_Zonas_tmp_Anterior_HZ = z1.Id_Zonas_tmp) 
				INNER JOIN (tab_zonas_tmp 			AS z2) ON (h.Id_Zonas_tmp_Nuevo_HZ = z2.Id_Zonas_tmp)
				WHERE Id_TRA_TXHZ = ".$trasiegoId;

		$resDetalle = seleccion($sql);
	}


	?>

	<!-- ******************************************************************************** -->
	<!-- ***************************  Hidden      *************************************** -->
	<!-- ******************************************************************************** -->
	<input type="hidden" id="dominio" name="dominio" value="<?=$dominio?>" />
	<input type="hidden" id="ruta" name="ruta" value="<?=$ruta?>" />

	<!-- ******************************************************************************** -->
	<!-- **************  para ocultar fondo en ventana    ******************************* -->
	<!-- ******************************************************************************** -->
	<div class="page-wrapper"></div>

	<div class="loading">Cargando &#8230;</div>


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

     	<?php 
     		include("menu.php"); 
     	?>

	<!-- ******************************************************************************** -->
	<!-- ***************************    MAIN      *************************************** -->
	<!-- ******************************************************************************** -->
    <main class="mdl-layout__content">
        <div class="site-content">

					<!-- *********************************************** -->
					<!-- **************** CONSULTA   ******************* -->
					<!-- *********************************************** -->
					<div class="mdl-grid site-max-width" >
						<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">

							<!-- ****************** -->
							<!-- ****  TITULO  **** -->
							<!-- ****************** -->
							<div class="mdl-card__title">
								<h1 class="mdl-card__title-text">Consultar Trasiego:</h1>
							</div>
							<!-- ****************** -->
							<!-- **** CONTENEDOR  * -->
							<!-- ****************** -->
							<div class="mdl-grid" style="width: 95%">


								<!-- ****************** -->
								<!-- **  N° Activo   ** -->
								<!-- ****************** -->
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--4-tablet mdl-cell--12-phone centrado">
									<form  id="form_busqueda_numero" method="get">


										<label class="titulo_busqueda" >N° activo</label>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
									    <label class="mdl-button mdl-js-button mdl-button--icon" for="txt_numero_activo">
									      <i class="material-icons">search</i>
									    </label>
									    <div class="mdl-textfield__expandable-holder">
									      <input class="mdl-textfield__input" type="number" id="txt_numero_activo" onkeypress="return soloNumeros(event);" pattern="\d*" maxlength="4">
									      <label class="mdl-textfield__label" for="sample-expandable">Busqueda de Trasiego</label>
									    </div>

									  </div>
										<br />
										<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">
										  Buscar
										</button>
									</form>
								</div>

								
							</div>
						</div>
					</div>


				
					<!-- ******************************************************************************** -->
					<!-- ***********************    Detalle  de Activo       ***************************** -->
					<!-- ******************************************************************************** -->
          			<div class="mdl-grid site-max-width"<?php if(($Id_TRA =='')||($resDatosTrasigeo[0]['Id_TRA'] =="")){ echo 'hidden';}?> >
            			<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
              				<div class="mdl-card__title">
                				<h1 class="mdl-card__title-text">Datos del Trasiego: <?php 
                											if(isset($trasiegoId))
                												echo "SIUA-".$trasiegoId;
                										?>
                				</h1>
              				</div>
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone  titulo">Información del usuario</div>
								

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Identificación:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($trasiegoIdentificacion)){
											echo $trasiegoIdentificacion;
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Nombre:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($trasiegoNombre)){
											echo $trasiegoNombre;
										}
									?>
								</div>
							</div>
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone  titulo">Fecha y hora de Aprobación</div>
								

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Fecha:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($trasiegoFecha)){
											echo $trasiegoFecha;
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Hora:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($trasiegoHora)){
											echo $trasiegoHora;
										}
									?>
								</div>
							</div>

							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone  titulo">Activos Aprobados</div>

								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone">
									<table  width="100%" style="border: 1px solid #BBB; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;">
		            					<thead>
		            						<tr class="subtitulo">
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Foto</th>
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Id Activo</th>
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Nombre</th>
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Serie</th>
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Marca</th>
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Modelo</th>
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Zona anterior</th>
		            							<th style=" border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Zona nueva</th>
		            						</tr>
		            					</thead>
		            					<tbody>
		            						<?php 
		            							if(count($resDetalle)>0){
               										for($i=0;$i<count($resDetalle);$i++){

               											/*Obtener foto*/
               											$sql = "SELECT Foto_Act, Nombre_Act, Numero_Serie_Act, Marca_Act, Modelo_Act FROM tab_Activos WHERE Id_Act = ".$resDetalle[$i]['Id_Act_HZ'];
               											$resFoto = seleccion($sql);
               											

               											if($resFoto[0]['Foto_Act']==''){
								
															$Foto_Act = $path."img/inventario/activos/default.png";
														}else{
															$Foto_Act = $path."img/inventario/activos/".$resFoto[0]['Foto_Act'];

															if(!file_exists($Foto_Act)){
																$Foto_Act = $path."img/inventario/activos/default.png";
															}
														}
               								?>
               									<tr style="border: 1px solid #BBB; text-align: center;" class="valor">
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">
			            								<img src="<?=$Foto_Act?>" style="width: 60px;"/>
			            							</td>
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;"><?=$resDetalle[$i]['Id_Act_HZ']?></td>
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem; line-height: 1.3rem;">
			            								<?=$resFoto[0]['Nombre_Act']?>
			            							</td>
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem; line-height: 1.3rem;">
			            								<?=$resFoto[0]['Numero_Serie_Act']?>
			            							</td>
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem; line-height: 1.3rem;">
			            								<?=$resFoto[0]['Marca_Act']?>
			            							</td>
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem; line-height: 1.3rem;">
			            								<?=$resFoto[0]['Modelo_Act']?>
			            							</td>
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;"><?=$resDetalle[$i]['Zona_Anterior']?></td>
			            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;"><?=$resDetalle[$i]['Zona_Nueva']?></td>
			            						</tr>

               								<?php
               										}
               									}


		            						?>
		            						
		            					</tbody>
		            				</table>
								</div>
								
							</div>





							
          				</div>
        			</div><!-- site-contens  -->



        	

		</div><!-- DIV PRINCIPAL  site-content -->
			<?php 
				include("footer.php");
			?>
	</main>






        <script src="scripts/material.min.js"></script>
		<script src="scripts/consulta_trasiego.js"></script>

		<!-- Jquery -->
		<script src="scripts/jquery-3.2.0.min.js"></script>




  </body>
</html>
