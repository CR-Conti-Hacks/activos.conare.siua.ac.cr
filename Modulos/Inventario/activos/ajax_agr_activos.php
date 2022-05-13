<?php
	
	
	/***************************************************************************/
    /****************************   PATH     ***********************************/
    /***************************************************************************/
	$path = '../../../';

	/***************************************************************************/
    /****************************   PATH     ***********************************/
    /***************************************************************************/
	date_default_timezone_set('America/Costa_Rica');

	
	/***************************************************************************/
    /****************************  SEGURIDAD ***********************************/
    /***************************************************************************/
	include($path."Seguridad_Gestor_POST.php");


	/*************************************************************************/
    /*******************  CONFIGURACIÓN ACTIVOS    ***************************/
    /*************************************************************************/
	include("configuracionActivos.php");


	

	/***************************************************************************/
    /**************************   PARAMETROS   *********************************/
    /***************************************************************************/

    //Datos Activo 
	$Nombre_Act					= ( isset($_POST['Nombre_Act'])) 			? $_POST['Nombre_Act'] 					: '';
	$Marca_Act					= (isset($_POST['Marca_Act'])) 				? $_POST['Marca_Act'] 					: '';
	$Modelo_Act					= (isset($_POST['Modelo_Act'])) 			? $_POST['Modelo_Act'] 					: '';
	$Color_Act					= (isset($_POST['Color_Act'])) 				? $_POST['Color_Act'] 					: '';
	$Numero_Serie_Act			= (isset($_POST['Numero_Serie_Act'])) 		? $_POST['Numero_Serie_Act'] 			: '';
	$Descripcion_Act			= (isset($_POST['Descripcion_Act'])) 		? $_POST['Descripcion_Act'] 			: '';

		
	//Identificadores de Activo
	$Id_INS_Act					= (isset($_POST['Id_INS_Act'])) 			? $_POST['Id_INS_Act'] 					: '';
	$Id_Uni_Act					= (isset($_POST['Id_Uni_Act'])) 			? $_POST['Id_Uni_Act'] 					: '';


	//Activo Fijo
	$Activo_Fijo_Act			= (isset($_POST['Activo_Fijo_Act'])) 		? $_POST['Activo_Fijo_Act'] 			: '';


	//Fecha y año Recepción
	$Fecha_Recepcion_Act		= (isset($_POST['Fecha_Recepcion_Act'])) 	? $_POST['Fecha_Recepcion_Act'] 		: '';
	$Tiempo_Garantia_Act		= (isset($_POST['Tiempo_Garantia_Act'])) 	? $_POST['Tiempo_Garantia_Act'] 		: 0;
	

	//Datos de compra
	$Id_OC						= (isset($_POST['Id_OC'])) 					? $_POST['Id_OC'] 						: '';
	$Id_Factu_Act				= (isset($_POST['Id_Factu_Act'])) 			? $_POST['Id_Factu_Act'] 				: '';
	$Costo_Act					= (isset($_POST['Costo_Act'])) 				? $_POST['Costo_Act'] 					: '';
	
	//Ubicación
	$Id_Zonas_tmp_Act			= (isset($_POST['Id_Zonas_tmp_Act'])) 		? $_POST['Id_Zonas_tmp_Act'] 			: '';


	//CONARE: Responsables
	$Id_Res_Act					= (isset($_POST['Id_Res_Act'])) 			? $_POST['Id_Res_Act'] 					: '';
	$Id_Cus_Act					= (isset($_POST['Id_Cus_Act'])) 			? $_POST['Id_Cus_Act'] 					: '';
	

	//Estados
	$Desecho_Act				= (isset($_POST['Desecho_Act'])) 			? $_POST['Desecho_Act'] 				: '';
	$Descripcion_Dese_Act		= (isset($_POST['Descripcion_Dese_Act'])) 	? $_POST['Descripcion_Dese_Act']		: '';
	$Donacion_Act				= (isset($_POST['Donacion_Act'])) 			? $_POST['Donacion_Act'] 				: '';
	$Descripcion_Dona_Act		= (isset($_POST['Descripcion_Dona_Act'])) 	? $_POST['Descripcion_Dona_Act']		: '';
	$Mantenimiento_Act			= (isset($_POST['Mantenimiento_Act'])) 		? $_POST['Mantenimiento_Act'] 			: '';
	$Descripcion_Mante_Act		= (isset($_POST['Descripcion_Mante_Act'])) 	? $_POST['Descripcion_Mante_Act']		: '';

	//Verificación
	$Verificado_Act				= (isset($_POST['Verificado_Act'])) 		? $_POST['Verificado_Act'] 				: '';

	//trasiego
	$enviarCorreoTrasiego		= (isset($_POST['enviarCorreoTrasiego'])) 	? $_POST['enviarCorreoTrasiego'] 		: '';



	/***************************************************************************/
    /*********************   VERIFICACIÓN DE FOTO   ****************************/
    /***************************************************************************/
   	$foto = "";
   	if(isset($_FILES["Foto_Act"]['name'])){

	   if($_FILES["Foto_Act"]['name']!=''){
		  if(move_uploaded_file ( $_FILES [ 'Foto_Act' ][ 'tmp_name' ], $path.'img/inventario/activos/' .$_FILES["Foto_Act"]['name'])){
				$foto = $_FILES["Foto_Act"]['name'];
										
		  }
	   }
	}
	
	
	/***************************************************************************/
    /*********************      SQL PRINCICPAL      ****************************/
    /***************************************************************************/
	$sql = "INSERT INTO tab_Activos (";

	//**************************************************************************
	//Datos Activo 
	//**************************************************************************
	$sql .= "
			Foto_Act,
			Nombre_Act,
			Marca_Act,
			Modelo_Act,
			Color_Act,
			Numero_Serie_Act,
			Descripcion_Act,
			";

	//**************************************************************************
	//Identificadores de Activo
	//**************************************************************************
	$sql .= "
			Id_INS_Act,
			Id_Uni_Act,
			";

	//**************************************************************************
	//Activo Fijo
	//**************************************************************************
	$sql .= "
			Activo_Fijo_Act,
			";

	//**************************************************************************
	//Fecha y año Recepción 
	//**************************************************************************
	$sql .= "
			Fecha_Recepcion_Act,
			Tiempo_Garantia_Act,
			";

	//**************************************************************************
	//Datos de compra
	//**************************************************************************
	$sql .= "
			Id_Factu_Act,
			Costo_Act,
			";

	//**************************************************************************
	//Ubicación
	//**************************************************************************
	$sql .= "
			Id_Zonas_tmp_Act,
			";

	//**************************************************************************
	//CONARE: Responsables
	//**************************************************************************
	$sql .= "
			Id_Res_Act,
			Id_Cus_Act,
			";

						
	//**************************************************************************
	//Estados
	//**************************************************************************
	$sql .= "
			Desecho_Act,
			Descripcion_Dese_Act,
			Donacion_Act,
			Descripcion_Dona_Act,
			Mantenimiento_Act,
			Descripcion_Mante_Act,
			";


	//**************************************************************************
	//Verificación
	//**************************************************************************
	$sql .= "
			Verificado_Act,
			Id_Per_Usu_Act,
			";


	//**************************************************************************
	//SAE Activo 
	//**************************************************************************
	$sql .= "
			Activo_Act
			";

	//**************************************************************************
	//VALUES
	//**************************************************************************
	$sql .= "
			) VALUES (
			";
						
	//**************************************************************************
	//Datos Activo 
	//**************************************************************************
	$sql .= "'".	$foto 				."'"	.",".
			"'".	$Nombre_Act 		."'"	.",".
			"'".	$Marca_Act 			."'"	.",".
			"'".	$Modelo_Act 		."'"	.",".
			"'".	$Color_Act 			."'"	.",".
			"'".	$Numero_Serie_Act 	."'"	.",".
			"'".	$Descripcion_Act 	."'"	.","
			;
						

	//**************************************************************************
	//Identificadores de Activo
	//**************************************************************************
	$sql .= "'".	$Id_INS_Act			."'"	.",".
			"".		$Id_Uni_Act			.","	
			;

	//**************************************************************************
	//Activo Fijo
	//**************************************************************************
	$sql .= "'". 	$Activo_Fijo_Act 	."'"	.","
			;

	//**************************************************************************
	//Fecha y año Recepción 
	//**************************************************************************
	$sql .= "'". 	$Fecha_Recepcion_Act 		."'"	.",".
			"". 	$Tiempo_Garantia_Act 		.","	
			;

	//**************************************************************************
	//Datos de compra
	//**************************************************************************
	$sql .= "". 	$Id_Factu_Act				.","	.
			"'". 	$Costo_Act					."'"	.","
			;

	//**************************************************************************
	//Ubicación
	//**************************************************************************
	$sql .= "".		$Id_Zonas_tmp_Act			.","
			;

	//**************************************************************************
	//CONARE: Responsables
	//**************************************************************************
	$sql .= "".		$Id_Res_Act					.",".
			"".		$Id_Res_Act					.","
			;

						
	//**************************************************************************
	//Estados
	//**************************************************************************
	$sql .= "'".	$Desecho_Act 				."'"	.",".
			"'".	$Descripcion_Dese_Act		."'"	.",".
			"'".	$Donacion_Act 				."'"	.",".
			"'".	$Descripcion_Dona_Act 		."'"	.",".
			"'".	$Mantenimiento_Act 			."'"	.",".
			"'".	$Descripcion_Mante_Act 		."'"	.","
			;


	//**************************************************************************
	//Verificación
	//**************************************************************************
	$sql .= "'". 	$Verificado_Act 			."'"	.",".
			"". 	$Id_Per_Usu 				.","
			;


	//**************************************************************************
	//SAE Activo 
	//**************************************************************************
	$sql .= "'1'";


	//**************************************************************************
	//Cierre
	//**************************************************************************
	$sql .= ");";	


	//**************************************************************************
	//Guardar datos
	//**************************************************************************

	$res = transaccion($sql);

    /***************************************************************************/
    /*********************  HISTORIAL DE ACTIVO     ****************************/
    /***************************************************************************/

    //Si se guardao correctamente
    if ($res[0]== 1){

    	
    	//**************************************************************************
		//Obtener el'último ID insertado 
		//**************************************************************************
    	$sql = "SELECT MAX(Id_Act) AS ID FROM tab_Activos;";
    	$res = seleccion($sql);



    	//**************************************************************************
		//Si se obtuvo
		//**************************************************************************
    	if(count($res)>0){

            for($i=0;$i<count($res);$i++){

            	//**************************************************************************
				//Guardar ID del activo
				//**************************************************************************
            	$IDACT = $res[$i]['ID'];


		    	/**************************************************************************************************************/
				//Insertar en el historial de verificación
				/**************************************************************************************************************/
				$sql = "INSERT INTO tab_sae_historial_verificados (Id_Act_HV,Id_Per_Usu_HV,Fecha_HV,Estado_HV) VALUES (".
						$IDACT.",".
						$Id_Per_Usu.",".
						"'".date('Y-m-d H:i:s')."',".
						"'".$Verificado_Act."'"
				.")";

				$res = transaccion($sql);





				/**************************************************************************************************************/
				// Insertar en primer trasiego
				/**************************************************************************************************************/
				//obtener ID
				$sql = "INSERT INTO tab_sae_trasiegos (
										Fecha_TRA,
										Motivo_TRA,
										Id_Per_Usu_TRA
									) VALUES (".
										"'".date('Y-m-d H:i:s')."',".
										"'INGRESO AL SISTEMA',".
										$Id_Per_Usu
				.")";
				$resTRA = transaccion($sql);

				//**************************************************************************
				//Obtener el'último ID insertado 
				//**************************************************************************
		    	$sql = "SELECT MAX(Id_TRA) AS ID FROM tab_sae_trasiegos";
		    	$res = seleccion($sql);
				$IDTRA = $res[0]['ID'];


				/**************************************************************************************************************/
				// Insertar en el historial de zona 
				/**************************************************************************************************************/
				$sql = "INSERT INTO tab_sae_historial_zona (
    								Id_Act_HZ,
    								Id_Per_Usu_HZ,
    								Id_Zonas_tmp_Anterior_HZ,
    								Id_Zonas_tmp_Nuevo_HZ,
    								Fecha_HZ,
	    							Motivo_HZ
	    							) VALUES (".
						$IDACT.",".
						$Id_Per_Usu.",".
						$Id_Zonas_tmp_Act.",".
						$Id_Zonas_tmp_Act.",".
						"'".date('Y-m-d H:i:s')."',".
						"'PRIMERA ZONA'"
				.")";
				$res = transaccion($sql);

				//**************************************************************************
				//Obtener el'último ID insertado 
				//**************************************************************************
		    	$sql = "SELECT MAX(Id_HZ) AS ID FROM tab_sae_historial_zona";
		    	$res = seleccion($sql);
				$IDHZ = $res[0]['ID'];



				/**************************************************************************************************************/
				// Insertar en TXHZ
				/**************************************************************************************************************/
				$sql = "INSERT INTO tab_sae_TXHZ (
    								Id_TRA_TXHZ,
    								Id_HZ_TXHZ
	    							) VALUES (".
						$IDTRA.",".
						$IDHZ
				.")";

				$resTXHZ = transaccion($sql);




				/**************************************************************************************************************/
				//Insertar en el historial de activo
				/**************************************************************************************************************/


				/************************************************************************************/
			   	/**************************** Historial Activo: TODOS DATOS *************************/
			   	/************************************************************************************/
			   		
			   	$tablaModificacion = '';
			   	$tablaModificacion .= '<table class="saeHistoActivoTabla">';
			   		
			   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFilaTitulo">';
			   			$tablaModificacion .= '<td>Campo</td>';
			   			$tablaModificacion .= '<td>Valor Anterior</td>';
			   			$tablaModificacion .= '<td>Nuevo Valor</td>';
			   		$tablaModificacion .= '</tr>';


			   	/************************************************************************/
			   	/**********************      ID ACT       *******************************/
			   	/************************************************************************/
			   	
				   	$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
			   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
			   				$tablaModificacion .= 'Id Act.';
			   			$tablaModificacion .= '</td>';
			   			$tablaModificacion .= '<td>';
			   				$tablaModificacion .= "";
			   			$tablaModificacion .= '</td>';
			   			$tablaModificacion .= '<td>';
		   					$tablaModificacion .= $IDACT;
		 				$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/**********************         Foto         ****************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Fotografía';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $foto;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/**********************     Nombre Activo    ****************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Nombre activo';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Nombre_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



	   			/************************************************************************/
			   	/**********************          Marca       ***************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Marca';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Marca_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';


		   		/************************************************************************/
			   	/**********************         Modelo        ***************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Modelo';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Modelo_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/**********************         Color         ***************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Color';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Color_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';

		   		

	   			/************************************************************************/
			   	/**********************       Numero serie    ***************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Número de serie';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Numero_Serie_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';


	   			/************************************************************************/
			   	/**********************      DESCRIPCION     ****************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Descripción';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Descripcion_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';





	   			/************************************************************************/
			   	/********************** ACT Institucional *******************************/
			   	/************************************************************************/
			   	if($Ocultar_Activo_Institucional_ACON !="1"){
			   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
			   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
			   				$tablaModificacion .= 'Act. Institucional';
			   			$tablaModificacion .= '</td>';
			   			$tablaModificacion .= '<td>';
			   				$tablaModificacion .= "";
			   			$tablaModificacion .= '</td>';
			   			$tablaModificacion .= '<td>';
		   					$tablaModificacion .= $Id_INS_Act;
		 				$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '</tr>';
	   			}




	   			/************************************************************************/
			   	/**********************      Id Universidad *****************************/
			   	/************************************************************************/
				/*Obtener el nombre de la universidad nueva*/
				$sql = "SELECT Nombre_uni FROM tab_universidades WHERE Id_Uni = ".$Id_Uni_Act;
				$resUniNew = seleccion($sql);
				$nombreInstitucion = $resUniNew[0]['Nombre_uni'];

		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Institución';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Id_Uni_Act." / ".$nombreInstitucion;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';





	   			/************************************************************************/
			   	/**********************   Activo Fijo        ****************************/
			   	/************************************************************************/

		   		if($Activo_Fijo_Act==1){
		   			$AFNuevo ="Sí";
		   		}else{
		   			$AFNuevo ="No";
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Activo fijo';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .=  "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Activo_Fijo_Act." / ".$AFNuevo;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



	   			/************************************************************************/
			   	/**********************    Fecha recepción  ****************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Fecha recepción';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Fecha_Recepcion_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



	   			/************************************************************************/
			   	/**********************   Tiempo garantia     ***************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Tiempo garantía';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Tiempo_Garantia_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';





	   			/************************************************************************/
			   	/**********************      Id Factura   *******************************/
			   	/************************************************************************/
				/*Obtener el número de la factura nueva*/
				$sql = "SELECT 
							Numero_Factu,
						    Numero_OC
						FROM tab_facturas 
						INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
						WHERE Id_Factu = ".$Id_Factu_Act;
				$resFacNew = seleccion($sql);

		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Factura';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= "ID Registro: ".$Id_Factu_Act." / Número Factura: ".$resFacNew[0]['Numero_Factu']." / Número Orden: ".$resFacNew[0]['Numero_OC'];
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';


	   			/************************************************************************/
			   	/**********************       Costo Activo   ****************************/
			   	/************************************************************************/
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Costo';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Costo_Act;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';





	   			/************************************************************************/
			   	/**********************      ZONA           *****************************/
			   	/************************************************************************/
				/*Obtener el nombre de la zona nueva*/
				$sql = "SELECT Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Id_Zonas_tmp = ".$Id_Zonas_tmp_Act;
				$resZonNew = seleccion($sql);


		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Zona';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Id_Zonas_tmp_Act." / ".$resZonNew[0]['Nombre_Zonas_tmp'];
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';





	   			/************************************************************************/
			   	/**********************   Responsable     *******************************/
			   	/************************************************************************/
			   	/*Obtener el nombre del responsable*/
				$sql = "SELECT Id_Res,Nombre_Res FROM tab_Responsables WHERE Id_Res = ".$Id_Res_Act;
				$resResNew = seleccion($sql);


			   	$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Responsable';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Id_Res_Act." / ".$resResNew[0]['Nombre_Res'];
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';


	   			/************************************************************************/
			   	/**********************   Custodio        *******************************/
			   	/************************************************************************/
			   	/*Obtener el nombre del responsable*/
				$sql = "SELECT Id_Cus,Nombre_Cus FROM tab_Custodios WHERE Id_Cus = ".$Id_Cus_Act;
				$resCusNew = seleccion($sql);


			   	$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Custodio';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Id_Cus_Act." / ".$resCusNew[0]['Nombre_Cus'];
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';


			   	


	   		


		   		/************************************************************************/
			   	/**********************   Desecho Activo     ****************************/
			   	/************************************************************************/
		   		if($Desecho_Act==1){
		   			$desechoNuevo ="Sí";
		   		}else{
		   			$desechoNuevo ="No";
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Desecho';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Desecho_Act." / ".$desechoNuevo;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/********************** Descripcion Desecho  ****************************/
			   	/************************************************************************/
			   	if($Descripcion_Dese_Act==""){
		   			$desechoDescripNuevo ="-";
		   		}else{
		   			$desechoDescripNuevo =$Descripcion_Dese_Act;
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Descripción desecho';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $desechoDescripNuevo;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/**********************   Donacion Activo     ***************************/
			   	/************************************************************************/
		   		if($Donacion_Act==1){
		   			$donacionNuevo ="Sí";
		   		}else{
		   			$donacionNuevo ="No";
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Donación';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Donacion_Act." / ".$donacionNuevo;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/********************** Descripcion Donacion  ***************************/
			   	/************************************************************************/
			   	if($Descripcion_Dona_Act==""){
		   			$donacionDescripNuevo ="-";
		   		}else{
		   			$donacionDescripNuevo =$Descripcion_Dona_Act;
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Descripción donación';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $donacionDescripNuevo;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/**********************   Mantenimiento Activo    ***********************/
			   	/************************************************************************/
		   		if($Mantenimiento_Act==1){
		   			$manteNuevo ="Sí";
		   		}else{
		   			$manteNuevo ="No";
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Mantenimiento';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Mantenimiento_Act." / ".$manteNuevo;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		   		/************************************************************************/
			   	/********************** Descripcion Mantenimiento  **********************/
			   	/************************************************************************/
		   		if($Descripcion_Mante_Act==""){
		   			$mantenimientoDescripNuevo ="-";
		   		}else{
		   			$mantenimientoDescripNuevo =$Descripcion_Mante_Act;
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Descripción mantenimiento';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $mantenimientoDescripNuevo;
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';




	   			/************************************************************************/
			   	/**********************       VERIFICACIÓN         **********************/
			   	/************************************************************************/
		   		if($Verificado_Act==1){
		   			$veriNuevo ="Sí";
		   		}else{
		   			$veriNuevo ="No";
		   		}
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Verificación';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= "";
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $Verificado_Act." (".$veriNuevo.")";
	 				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';



		    	$tablaModificacion .= '</table>';


			   	$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
										Id_Act_HMA,
										Id_Per_Usu_HMA,
										Fecha_HMA,
										Modificaciones_HMA
									) VALUES (".
										$IDACT.",".
										$Id_Per_Usu.",".
										"'".date('Y-m-d H:i:s')."',".
										"'".$tablaModificacion."'"
				.")";
				$resHMA = transaccion($sql);
				/************************************************************************************/
			   	/**************************** Historial Activo    ***********************************/
			   	/************************************************************************************/

            }
        }


        /************************************************************************************/
		/*****************************    Enviar Correo Custodio       **********************/
		/************************************************************************************/
		if($Enviar_Correo_Custodio_ACON == '1'){
			
			/* Limpiar el correo */	
			$correo = "";

			/*Incluir el archivo*/
			include_once($path."Modulos/Inventario/activos/envia_correo_custodio_agregar.php");	
		}


		/************************************************************************************/
		/***************************** enviar correo boleta trasiego   **********************/
		/************************************************************************************/
		if($Enviar_Correo_Trasiego_ACON == 1 && $enviarCorreoTrasiego){

			/*Crear formato de correo*/	
			$correo = "";

			/*Obtenemos los datos del trasiego*/
			$sql = "SELECT 
						Id_TRA, 
						DATE(Fecha_TRA) AS Fecha,
                        DATE_FORMAT(Fecha_TRA, '%r') as Hora,
						Motivo_TRA AS Motivo,
						Id_Per_Usu_TRA 
						FROM tab_sae_trasiegos WHERE Id_TRA = ".$IDTRA;
			$resDatosTrasigeo = seleccion($sql);

			/*Obtenemos los datos del usuario*/
			$sql = "SELECT 
							Nombre_Per,
							Apellido1_Per,
							Apellido2_Per,
							Cedula_Per
					FROM tab_usuarios
					INNER JOIN tab_personas ON (Id_Per =Id_Per_Usu)
					WHERE Id_Per_Usu = ".$Id_Per_Usu;
			$resDatosUsuario = seleccion($sql);

			/*Creamos la variables del correo*/
			$trasiegoId 				= $IDTRA;
			$trasiegoFecha 				= $resDatosTrasigeo[0]['Fecha'];
			$trasiegoHora 				= $resDatosTrasigeo[0]['Hora'];
			$trasiegoMotivo 			= $resDatosTrasigeo[0]['Motivo'];
			$trasiegoIdentificacion 	= $resDatosUsuario[0]['Cedula_Per'];
			$trasiegoNombre 			= $resDatosUsuario[0]['Nombre_Per']." ".$resDatosUsuario[0]['Apellido1_Per']." ".$resDatosUsuario[0]['Apellido2_Per'];

			include_once($path."Modulos/Inventario/activos/envia_correo_trasiego.php");

		}


		/************************************************************************************/
		/*****************************         RESULTADO               **********************/
		/************************************************************************************/
        echo  '1';
    }else{

    	/************************************************************************************/
		/*****************************         RESULTADO               **********************/
		/************************************************************************************/
        echo 'e1';
    }
    

?>