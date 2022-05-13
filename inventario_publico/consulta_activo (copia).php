<!DOCTYPE html>

<html lang="es-CR">
  <head>
    <?php 
    	include("header.php");
    ?>
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
	$Id_Act	= (isset($_GET['Id_Act'])) ? $_GET['Id_Act'] : '';

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
	if($Id_Act!=''){


			$sql ="SELECT
						Id_Act,
						Id_Zonas_tmp_Act,
						Nombre_Zonas_tmp,
						Id_INS_Act,
						Id_UGIT_Act,
						Id_Factu_Act,
						Id_Uni_Act,
						Diminutivo_Uni,
						Fecha_Recepcion_Act,
						Tiempo_Garantia_Act,
						Nombre_Act,
						Descripcion_Act,
						Foto_Act,
						Costo_Act,
						Desecho_Act,
						Descripcion_Dese_Act,
						Donacion_Act,
						Descripcion_Dona_Act,
						Mantenimiento_Act,
						Descripcion_Mante_Act,
						Verificado_Act,
						Numero_Serie_Act,
						Marca_Act,
						Modelo_Act,
						Color_Act,
										Id_Factu,
										Numero_Factu,
										Id_Trans_Factu,
										Numero_Trans,
										Id_OC,
										Numero_OC,
										Id_Compr,
										Numero_Compr,
										Id_Parti_OC,
										Numero_Parti,
										Id_Prove,
										Nombre_Prove,
						Id_Per_Usu_Act,
						Nombre_Per,
						Apellido1_Per,
						Apellido2_Per
					FROM tab_Activos
					INNER JOIN tab_zonas_tmp ON (Id_Zonas_tmp = Id_Zonas_tmp_Act)
					INNER JOIN tab_universidades ON (Id_Uni=Id_Uni_Act)
								INNER JOIN tab_facturas ON (Id_Factu=Id_Factu_Act)
								INNER JOIN tab_transferencias ON (Id_Trans=Id_Trans_Factu)
								INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
								INNER JOIN tab_compromisos ON (Id_Compr=Id_Compr_OC)
								INNER JOIN tab_partidas ON (Id_Parti=Id_Parti_OC)
								INNER JOIN tab_proveedores ON (Id_Prove=Id_Prove_OC)
					INNER JOIN tab_personas ON (Id_Per = Id_Per_Usu_Act)
					WHERE Activo_Act = '1' AND Id_Act=".$Id_Act;
				$res = seleccion($sql);

			//Comprobar si tiene o no foto
			if($res[0]['Foto_Act'] ==''){
				$Foto_Act = $dominio.$ruta.'img/inventario/activos/default.png';
			}else{
				$Foto_Act = $dominio.$ruta.'img/inventario/activos/'.$res[0]['Foto_Act'];
			}
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

		<!-- ******************************************************************************** -->
		<!-- *************************** icono mail   *************************************** -->
		<!-- ******************************************************************************** -->
		<a id="boton_mic" class="mdl-button mdl-button--fab mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast mdl-shadow--4dp" onclick="startButton(event);">
			<i class="material-icons">record_voice_over</i>
		</a>

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
								<h1 class="mdl-card__title-text">Consultar Activo:</h1>
							</div>
							<!-- ****************** -->
							<!-- **** CONTENEDOR  * -->
							<!-- ****************** -->
							<div class="mdl-grid" style="width: 95%">

								<!-- ****************** -->
								<!-- **  N° Activo   ** -->
								<!-- ****************** -->
								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-tablet mdl-cell--12-phone centrado">
									<form  id="form_busqueda_numero" method="get">


										<label class="titulo_busqueda" >N° activo</label>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
									    <label class="mdl-button mdl-js-button mdl-button--icon" for="txt_numero_activo">
									      <i class="material-icons">search</i>
									    </label>
									    <div class="mdl-textfield__expandable-holder">
									      <input class="mdl-textfield__input" type="number" id="txt_numero_activo" onkeypress="return soloNumeros(event);" pattern="\d*" maxlength="4">
									      <label class="mdl-textfield__label" for="sample-expandable">Busqueda de Activo</label>
									    </div>

									  </div>
										<br />
										<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">
										  Buscar
										</button>
									</form>
								</div>

								<!-- ****************** -->
								<!-- **      QR      ** -->
								<!-- ****************** -->
								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-tablet mdl-cell--12-phone centrado" id="div_qr">
									<label class="titulo_busqueda" >QR</label>
									<img  src="img/demo_qr.png" border="0" alt="QR" id="demo_qr">
								</div>

								<!-- ****************** -->
								<!-- **   BARRAS     ** -->
								<!-- ****************** -->
								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-tablet mdl-cell--12-phone centrado" id="div_barras">
									<label class="titulo_busqueda" >Código Barras</label>
									<img  src="img/demo_barras.png" border="0" alt="Código de Barras" id="demo_barras">
								</div>

							</div>
						</div>
					</div>


					<!-- ******************************************************************************** -->
					<!-- ***********************    Ventana  de QR       ***************************** -->
					<!-- ******************************************************************************** -->
					<div class="modal-wrapper" id="vent_act_qr">
					  <div class="modal">
					    <div class="head">
								Escanear QR
					      <a class="btn-close" id="btn_cerrar_vent_act_qr" href="#">
					        <i class="fa fa-times" aria-hidden="true"></i>
					      </a>
					    </div>
					    <div class="content-modal">
								<video id="qr_camara"></video>

					    </div>
					  </div>
					</div>

					<!-- ******************************************************************************** -->
					<!-- ***********************    Ventana  de BARRAS       ***************************** -->
					<!-- ******************************************************************************** -->
					<div class="modal-wrapper" id="vent_act_barras">
					  <div class="modal">
					    <div class="head">
								Código Barras (39code)
					      <a class="btn-close" id="btn_cerrar_vent_act_barras" href="#">
					        <i class="fa fa-times" aria-hidden="true"></i>
					      </a>
					    </div>
					    <div class="content-modal">
								<div id="interactive" class="viewport"></div>

					    </div>
					  </div>
					</div>



					<!-- ******************************************************************************** -->
					<!-- ***********************    Ventana  de Activo       ***************************** -->
					<!-- ******************************************************************************** -->
					<div class="modal-wrapper" id="vent_act_img">
					  <div class="modal">
					    <div class="head">
								Activo: <?php
									if(isset($res[0]['Id_Act']))
										echo "SIUA-".$res[0]['Id_Act'];
								?>
					      <a class="btn-close" id="btn_cerrar_vent_act_img" href="#">
					        <i class="fa fa-times" aria-hidden="true"></i>
					      </a>
					    </div>
					    <div class="content-modal">
									<img  src="<?php  
									if(isset($Foto_Act))
										echo $Foto_Act;

									?>" border="0" alt="Foto Acticulo" style="width:100%;" >
					    </div>
					  </div>
					</div>

					<!-- ******************************************************************************** -->
					<!-- ***********************    Ventana  de microfono   ***************************** -->
					<!-- ******************************************************************************** -->
					<div class="modal-wrapper" id="vent_microfono">
					  <div class="modal">
					    <div class="head">
								Hable por favor!
					      <a class="btn-close" id="btn_cerrar_vent_microfono" href="#">
					        <i class="fa fa-times" aria-hidden="true"></i>
					      </a>
					    </div>
					    <div class="content-modal">
								<div id="results">
								  <span id="final_span" class="final"></span>
								  <span id="interim_span" class="interim"></span>
								  <p>
								</div>
								<div id="container_micro">
									<span class="blue"></span>
									<span class="red"></span>
									<span class="yellow"></span>
									<span class="green"></span>
								</div>
					    </div>
					  </div>
					</div>
					<!-- ******************************************************************************** -->
					<!-- ***********************    Detalle  de Activo       ***************************** -->
					<!-- ******************************************************************************** -->
          			<div class="mdl-grid site-max-width"<?php if(($Id_Act =='')||($res[0]['Id_Act'] =="")){ echo 'hidden';}?> >
            			<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
              				<div class="mdl-card__title">
                				<h1 class="mdl-card__title-text">Activo: <?php 
                											if(isset($res[0]['Id_Act']))
                												echo "SIUA-".$res[0]['Id_Act'];
                										?>
                				</h1>
              				</div>
	              			<div class="mdl-card__media">
								<img class="article-image" src="<?php  if(isset($Foto_Act))	echo $Foto_Act; ?>" border="0" alt="Foto Acticulo" id="foto_Activo">
							</div>

							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone  titulo">Información del activo</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Nombre:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Nombre_Act'])){
											if($res[0]['Nombre_Act']==""){ 
												echo "DESCONOCIDA";
											}else{ 
												echo $res[0]['Nombre_Act'];
											}	
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Marca:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Marca_Act'])){
											if($res[0]['Marca_Act']==""){ 
												echo "DESCONOCIDA";
											}else{ 
												echo $res[0]['Marca_Act'];
											}	
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Modelo:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Modelo_Act'])){
											if($res[0]['Modelo_Act']==""){ 
												echo "DESCONOCIDO";
											}else{ 
												echo $res[0]['Modelo_Act'];
											}	
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">N° de Serie:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Numero_Serie_Act'])){
											if($res[0]['Numero_Serie_Act']==""){ 
												echo "DESCONOCIDA";
											}else{ 
												echo $res[0]['Numero_Serie_Act'];
											}	
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Color:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Color_Act'])){
											if($res[0]['Color_Act']==""){ 
												echo "DESCONOCIDO";
											}else{ 
												echo $res[0]['Color_Act'];
											}	
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Descripción:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Descripcion_Act'])){
											if($res[0]['Descripcion_Act']==""){ 
												echo "DESCONOCIDA";
											}else{ 
												echo $res[0]['Descripcion_Act'];
											}	
										}
									?>
								</div>

							</div>

							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone  titulo">Identificación</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">N° Activo:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php
										
										if(isset($res[0]['Id_Act']))
									 		echo "SIUA-".$res[0]['Id_Act'];
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Institución:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Id_Uni_Act'])){
											if($res[0]['Id_Uni_Act']==""){ 
												echo "DESCONOCIDA";
											}else{ 
												echo $res[0]['Diminutivo_Uni'];
											}	
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">N° Institucional:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Id_INS_Act'])){
											if($res[0]['Id_INS_Act']==""){ 
												echo "DESCONOCIDO";
											}else{ 
												echo $res[0]['Id_INS_Act'];
											}	
										}
									?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">N° UGIT:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Id_UGIT_Act'])){
											if($res[0]['Id_UGIT_Act']==""){ 
												echo "DESCONOCIDO";
											}else{ 
												echo $res[0]['Id_UGIT_Act'];
											}	
										}
									?>
								</div>

							</div>

							<div class="mdl-grid" style="min-width:100%;">
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone  titulo">Ubicación</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Zona:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
									<?php 
										if(isset($res[0]['Id_Zonas_tmp_Act'])){
											if($res[0]['Id_Zonas_tmp_Act']==""){ 
												echo "DESCONOCIDA";
											}else{ 
												echo $res[0]['Nombre_Zonas_tmp'];
											}	
										}
									?>
								</div>

							</div>

							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-tablet mdl-cell--12-phone  titulo">Estado del Activo</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Desecho:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
										<?php
											if(isset($res[0]['Desecho_Act'])){
												if(($res[0]['Desecho_Act']=="")||($res[0]['Desecho_Act']=="0")){
													$img = "no.png";
												}else if($res[0]['Desecho_Act']=="1"){
													$img = "si.png";
												}	
											}
											
										 ?>
										 <img src="<?=$path?>img/SAE/<?php
										 	if(isset($img))
										 		echo $img; ?>" />
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Descripción de Desecho:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
										<?php 
											if(isset($res[0]['Descripcion_Dese_Act'])){
												if($res[0]['Descripcion_Dese_Act']==""){ 
													echo "DESCONOCIDA";
												}else{ 
													echo $res[0]['Descripcion_Dese_Act'];
												}	
											}
										?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Donación:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
										<?php
											if(isset($res[0]['Donacion_Act'])){
												if(($res[0]['Donacion_Act']=="")||($res[0]['Donacion_Act']=="0")){
													$img = "no.png";
												}else if($res[0]['Donacion_Act']=="1"){
													$img = "si.png";
												}	
											}
										?>
										<img src="<?=$path?>img/SAE/<?php
										 	if(isset($img))
										 		echo $img; ?>" />
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Descripción de Donación:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
										<?php 
											if(isset($res[0]['Descripcion_Dona_Act'])){
												if($res[0]['Descripcion_Dona_Act']==""){ 
													echo "DESCONOCIDA";
												}else{ 
													echo $res[0]['Descripcion_Dona_Act'];
												}	
											}
										?>
								</div>

								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Mantenimiento:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
										<?php
												if(isset($res[0]['Mantenimiento_Act'])){
													if(($res[0]['Mantenimiento_Act']=="")||($res[0]['Mantenimiento_Act']=="0")){
														$img = "no.png";
													}else if($res[0]['Mantenimiento_Act']=="1"){
														$img = "si.png";
													}
												}
												
										 ?>
										 <img src="<?=$path?>img/SAE/<?php
										 	if(isset($img))
										 		echo $img; ?>" />
								</div>
								<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-tablet mdl-cell--4-phone subtitulo">Descripción de Mantenimiento:</div>
								<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-tablet mdl-cell--4-phone valor">
										<?php 
											if(isset($res[0]['Descripcion_Mante_Act'])){
												if($res[0]['Descripcion_Mante_Act']==""){ 
													echo "DESCONOCIDA";
												}else{ 
													echo $res[0]['Descripcion_Mante_Act'];
												}	
											}
										?>
								</div>

							</div>

          				</div>
        			</div><!-- site-contens  -->
        	<!-- ******************************************************************************** -->
			<!-- ***********************   SI no existe el Activo   ***************************** -->
			<!-- ******************************************************************************** -->
			<?php 
				if($res[0]['Id_Act'] ==""){

			?>
	        	<div class="mdl-grid site-max-width" >
	            	<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
	             		<div class="mdl-card__title">
			                <h1 class="mdl-card__title-text"> ERROR: Activo no encontrado! </h1>
			            </div>

              			<div class="mdl-card__media">
							<img class="article-image" src="<?php  if(isset($Foto_Act))	echo $Foto_Act; ?>" border="0" alt="Foto Acticulo" id="foto_Activo">
						</div>

	            	</div>
	            </div>
	        <?php } ?>

		</div><!-- DIV PRINCIPAL  site-content -->
			<?php 
				include("footer.php");
			?>
	</main>






        <script src="scripts/material.min.js"></script>
		<script src="scripts/consulta_activo.js"></script>

		<!-- Jquery -->
		<script src="scripts/jquery-3.2.0.min.js"></script>


		<!-- LECTOR QR -->
		<script src="scripts/instascan.min.js"></script>

		<!-- LECTOR barras -->
		<script src="scripts/barras/adapter-latest.js"></script>
		<script src="scripts/barras/quagga.js"></script>
		<script src="scripts/barras/live_w_locator.js"></script>

		<!-- web_speech -->
		<script src="scripts/web_speech.js"></script>
  </body>
</html>
