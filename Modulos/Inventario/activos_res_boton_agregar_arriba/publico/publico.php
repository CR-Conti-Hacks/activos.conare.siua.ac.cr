<!doctype html>
  <?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../../';
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

	/***************************************************************************/
	/************************   DATOS DE UBICACION *****************************/
	/***************************************************************************/

	$instancia = mt_rand();

?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#2667C9">
    <meta name="description" content="Descripción Activos Sede Interuniversitaria de Alajuela">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Activos-SIUA</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="material.teal-red.min.css">

    <style>
		/** Roboto-Regular **/
		@font-face {
			font-family: 'Roboto-Regular';
			src: url('../../../Include/fuentes/roboto/Roboto-Regular.eot');
			src: local('☺'), url('../../../Include/fuentes/roboto/Roboto-Regular.woff')
		        format('woff'), url('../../../Include/fuentes/roboto/Roboto-Regular.ttf')
		        format('truetype'),
		        url('../../../Include/fuentes/roboto/Roboto-Regular.svg')
		        format('svg');
			font-weight: normal;
			font-style: normal;
		}


		body,html{
		  font-size: 12px;
			font-family: "Roboto-Regular",sans-serif;
		}

		img{
		  max-width: 100%;
		}
		.demo-layout{
		  background-color: #4287D6 !important;
		}
		.mdl-layout__title, .mdl-layout-title {
		 font-size: 2rem;
		}
		.demo-ribbon {
		  width: 100%;
		  height: 40vh;
		  background-color: #4287D6;
		  -webkit-flex-shrink: 0;
		      -ms-flex-negative: 0;
		          flex-shrink: 0;
		}

		.demo-main {
		  margin-top: -35vh;

		  -webkit-flex-shrink: 0;
		      -ms-flex-negative: 0;
		          flex-shrink: 0;
		}

		.demo-header .mdl-layout__header-row {
		  padding-left: 40px;
		}

		.demo-container {
		  max-width: 1600px;
		  width: calc(100% - 16px);
		  margin: 0 auto;

		}

		.demo-content {
		  border-radius: 2px;
		  padding: 20px 40px;
		  margin-bottom: 80px;
		}

		.demo-layout.is-small-screen .demo-content {
		  padding: 20px 28px;

		}

		.demo-content h3 {
		  margin-top: 30px;
		  text-align: center;
			font-size: 4rem;
			margin-bottom: 4rem;
		}

		/********************************************/
		/************** tabla con colsapn ***********/
		/********************************************/
		.container {
		   display: table;
		   border-collapse:collapse;
		   border: 1px solid #B3B4B5;
		   width: 80%;
		   text-align: center;
		   margin: 0 auto;
		}

		.Row {
		   display: table-row;
		}

		.Cell {
		   display: table-cell;
		   border: 1px solid #B3B4B5;
		   vertical-align: middle;
		   padding: 10px;
		}

		.firstcolumn {
		   display: table-cell;
		   border: 1px solid #B3B4B5;
		   vertical-align: middle;
		   padding: 10px;
		   width: 30%;
		}

		.merge {
		   display: table-cell;
		   border: solid;
		   border-width: thin;
		   padding-left: 5px;
		   padding-right: 5px;
		   text-align: right;
		   width: 100%;
		}

		.colapse {
		   display: table-cell;
		   border: none;
		   width: 0%;
		   margin-left: 40%;
		}

		.textstyle {
		   font-family: cursive;
		   font-style: normal;
		   font-variant: normal;
		   font-weight: normal;
		   font-size: larger;
		   line-height: 100%;
		   word-spacing: normal;
		   letter-spacing: 0.1ex;
		   text-decoration: none;
		   text-transform: none;
		}
		.azul{
		  background-color: #4287D6;
		  color: #FFF;
		  font-size: 1.5rem;
		}
		.gris{
		  background-color: #808384;
		  color: #FFF;
		  font-size: 1.5rem;
		}
		/********************************************/
		/********** FIN tabla con colsapn ***********/
		/********************************************/

		/**************************************************************************************************************************************************/
		/*************************************************** PC UGIT , PORTAIL UGIT , Tablet horizontal ***************************************************/
		/**************************************************************************************************************************************************/
		@media only screen and (min-width: 1200px) {
		    body{
		        /*background-color: #ED0E0E; /*rojo*/
		    }

		}


		/**************************************************************************************************************************************************/
		/******************************************************************  ? ****************************************************************************/
		/**************************************************************************************************************************************************/
		@media only screen and (min-width: 992px) and (max-width: 1199px) {
		    body{
		       /*background-color: #23C6B6; /*verde agua*/
		    }

		}


		/**************************************************************************************************************************************************/
		/******************************************************   Tablet vertical    **********************************************************************/
		/**************************************************************************************************************************************************/
		@media only screen and (min-width: 768px) and (max-width: 991px) {
		    body{
		       /*background-color: #1A1ADD; /*azul*/
		    }

		}
		/**************************************************************************************************************************************************/
		/***************************************        celular S6 horizontal chrome y firefox       ******************************************************/
		/**************************************************************************************************************************************************/
		@media only screen and (min-width: 480px) and (max-width: 767px) {
		    body{
		        /*background-color: #D81CBC; /*rosado*/
		    }
		}

		/**************************************************************************************************************************************************/
		/****************************************         celular S6 vertical chrome y firefox        *****************************************************/
		/**************************************************************************************************************************************************/
		@media only screen and (max-width: 479px) {
		    body{
		        /*background-color: #EAE60E; /*amarillo*/
		    }
		}
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
      <header class="demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--grey-100 mdl-color-text--grey-800">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Control de Activos - SIUA</span>
        </div>
      </header>
      <div class="demo-ribbon"></div>
      <main class="demo-main mdl-layout__content">
        <div class="demo-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">

            <h3>Activo: <?="SIUA-".$res[0]['Id_Act']?></h3>

						<div class="Table">
								<div class="container">
										<div class="Row">
												<div class="Cell azul">
													Información del activo
												</div>
										</div>
								</div>
                 <div class="container">
                    <div class="Row">
                        <div class="firstcolumn gris">
                            Foto:
                        </div>
                        <div class="Cell">
                            <img src="<?=$Foto_Act?>"  />
                        </div>
                    </div>
										<div class="Row">
                        <div class="firstcolumn gris">
                            Nombre:
                        </div>
                        <div class="Cell">
                            <?php if($res[0]['Nombre_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Nombre_Act'];}?>
                        </div>
                    </div>
										<div class="Row">
                        <div class="firstcolumn gris">
                            Marca:
                        </div>
                        <div class="Cell">
                            <?php if($res[0]['Marca_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Marca_Act'];}?>
                        </div>
                    </div>
										<div class="Row">
 											 <div class="firstcolumn gris">
 													 Modelo:
 											 </div>
 											 <div class="Cell">
 													 <?php if($res[0]['Modelo_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Modelo_Act'];}?>
 											 </div>
 									 </div>
										<div class="Row">
                        <div class="firstcolumn gris">
                            N° de Serie:
                        </div>
                        <div class="Cell">
                            <?php if($res[0]['Numero_Serie_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Numero_Serie_Act'];}?>
                        </div>
                    </div>
										<div class="Row">
												<div class="firstcolumn gris">
														Color:
												</div>
												<div class="Cell">
														<?php if($res[0]['Color_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Color_Act'];}?>
												</div>
										</div>
										<div class="Row">
                        <div class="firstcolumn gris">
                            Descripción:
                        </div>
                        <div class="Cell">
                            <?php if($res[0]['Descripcion_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Act'];}?>
                        </div>
                    </div>
                 </div>
                <div class="container">
                    <div class="Row">
                        <div class="Cell azul">
													Identificación
												</div>
                    </div>
               	</div>
								<div class="container">
									 <div class="Row">
											 <div class="firstcolumn gris">
													 N° Activo:
											 </div>
											 <div class="Cell">
													 <?="SIUA-".$res[0]['Id_Act']?>
											 </div>
									 </div>
									 <div class="Row">
											 <div class="firstcolumn gris">
												 	Institución:
											 </div>
											 <div class="Cell">
												 	<?php if($res[0]['Id_Uni_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Diminutivo_Uni'];}?>
											 </div>
									 </div>
									 <div class="Row">
											 <div class="firstcolumn gris">
												 	N° Institucional:
											 </div>
											 <div class="Cell">
												 	<?php if($res[0]['Id_INS_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Id_INS_Act'];}?>
											 </div>
									 </div>
									 <div class="Row">
											 <div class="firstcolumn gris">
												 	N° UGIT:
											 </div>
											 <div class="Cell">
												 	<?php if($res[0]['Id_UGIT_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Id_UGIT_Act'];}?>
											 </div>
									 </div>
								</div>
								<div class="container">
										<div class="Row">
												<div class="Cell azul">
													Ubicación
												</div>
										</div>
								</div>
								<div class="container">
									 <div class="Row">
											 <div class="firstcolumn gris">
													 Zona:
											 </div>
											 <div class="Cell">
													 <?php if($res[0]['Id_Zonas_tmp_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Nombre_Zonas_tmp'];}?>
											 </div>
									 </div>
								</div>
								<div class="container">
										<div class="Row">
												<div class="Cell azul">
													Estado del Activo
												</div>
										</div>
								</div>
								<div class="container">


									 <div class="Row">
											 <div class="firstcolumn gris">
													 Desecho:
											 </div>
											 <div class="Cell">
												 <?php
													 if(($res[0]['Desecho_Act']=="")||($res[0]['Desecho_Act']=="0")){
															$img = "no.png";
														}else if($res[0]['Desecho_Act']=="1"){
															$img = "si.png";
														}
													?>
													<img src="<?=$path?>img/SAE/<?=$img?>" />
											 </div>
									 </div>
									 <div class="Row">
											 <div class="firstcolumn gris">
													 Descripción de Desecho:
											 </div>
											 <div class="Cell">
													<?php if($res[0]['Descripcion_Dese_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Dese_Act'];}?>
											 </div>
									 </div>
									 <div class="Row">
											<div class="firstcolumn gris">
													Donación:
											</div>
											<div class="Cell">
												<?php
													if(($res[0]['Donacion_Act']=="")||($res[0]['Donacion_Act']=="0")){
														$img = "no.png";
													}else if($res[0]['Donacion_Act']=="1"){
														$img = "si.png";
													}
												 ?>
												 <img src="<?=$path?>img/SAE/<?=$img?>" />
											</div>
									</div>
									<div class="Row">
											<div class="firstcolumn gris">
													Descripción de Donación:
											</div>
											<div class="Cell">
												 <?php if($res[0]['Descripcion_Dona_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Dona_Act'];}?>
											</div>
									</div>
									<div class="Row">
										 <div class="firstcolumn gris">
												 Mantenimiento:
										 </div>
										 <div class="Cell">
											 <?php
											 		if(($res[0]['Mantenimiento_Act']=="")||($res[0]['Mantenimiento_Act']=="0")){
														$img = "no.png";
													}else if($res[0]['Mantenimiento_Act']=="1"){
														$img = "si.png";
													}
												?>
												<img src="<?=$path?>img/SAE/<?=$img?>" />
										 </div>
								 </div>
								 <div class="Row">
										 <div class="firstcolumn gris">
												 Descripción de Mantenimiento:
										 </div>
										 <div class="Cell">
												<?php if($res[0]['Descripcion_Mante_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Mante_Act'];}?>
										 </div>
								 </div>
								</div>

            <div class="demo-crumbs mdl-color-text--grey-500">
              NOTA: esta información debe ser tratada de manera responsable, la SIUA no se hace responsable de su uso no oficial.
            </div>
          </div>
        </div>
      </main>
    </div>

  </body>
</html>
