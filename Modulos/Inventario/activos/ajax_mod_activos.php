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
    /**************************   FUNCIONES    *********************************/
    /***************************************************************************/
    function crearTablaCambioHMA($arreglo){
    	$tablaModificacion = '';
		   	$tablaModificacion .= '<table class="saeHistoActivoTabla">';
		   		
	   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFilaTitulo">';
	   			$tablaModificacion .= '<td>Campo</td>';
	   			$tablaModificacion .= '<td>Valor Anterior</td>';
	   			$tablaModificacion .= '<td>Nuevo Valor</td>';
	   		$tablaModificacion .= '</tr>';

	   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
	   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
	   				$tablaModificacion .= $arreglo['Etiqueta'];
	   			$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '<td>';
	   				$tablaModificacion .= $arreglo['Anterior'];
	   			$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '<td>';
   					$tablaModificacion .= $arreglo['Nuevo'];;
   				$tablaModificacion .= '</td>';
   			$tablaModificacion .= '</tr>';

	   	$tablaModificacion .= '</table>';

	   	return $tablaModificacion;

    }


    function crearFilaCambioHMA($arreglo){
    	$tablaModificacion = '';
		   		
	   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
	   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
	   				$tablaModificacion .= $arreglo['Etiqueta'];
	   			$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '<td>';
	   				$tablaModificacion .= $arreglo['Anterior'];
	   			$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '<td>';
   					$tablaModificacion .= $arreglo['Nuevo'];;
   				$tablaModificacion .= '</td>';
   			$tablaModificacion .= '</tr>';



	   	return $tablaModificacion;

    }

	/***************************************************************************/
    /**************************   PARAMETROS   *********************************/
    /***************************************************************************/

    //Id_Act
	$Id_Act					= (isset($_POST['Id_Act'])) ? $_POST['Id_Act'] : '';


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
	$motivoCambioUbicacion		= (isset($_POST['motivoCambioUbicacion'])) 	? $_POST['motivoCambioUbicacion'] 		: '';
	
	
	
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
	/************************   SQL DATOS ACTUALES  ****************************/
	/***************************************************************************/

	//SELECT PRINCIPAL
	$sql ="SELECT ";

	//***************************************************************************************************************
	//Datos Activo 
	//***************************************************************************************************************
	$sql .=   " Id_Act,
				Nombre_Act,
				Marca_Act,
				Modelo_Act,
				Color_Act,
				Numero_Serie_Act,
				Descripcion_Act,
				Foto_Act,
				
				";

	//***************************************************************************************************************
	//Identificadores de Activo
	//***************************************************************************************************************
	$sql .=   " Id_INS_Act,
				Id_Uni_Act,
				Diminutivo_Uni,
				";


	//***************************************************************************************************************
	// Activo Fijo
	//***************************************************************************************************************
	$sql .=   " Activo_Fijo_Act,";


	//***************************************************************************************************************
	//Fecha y año Recepción
	//***************************************************************************************************************
	$sql .=   " Fecha_Recepcion_Act,
				Tiempo_Garantia_Act,";


	//***************************************************************************************************************
	//Datos de compra
	//***************************************************************************************************************
	$sql .=   " Id_OC,
                Numero_OC,

                Id_Factu,
                Id_Factu_Act,
                Numero_Factu,
                Costo_Act,

                Id_Prove,
                Nombre_Prove,

                Id_Compr,
                Numero_Compr,

                Id_Parti_OC,
                Numero_Parti,

                Id_Trans_Factu,
                Numero_Trans,
                ";


    //***************************************************************************************************************
	//Ubicación
	//***************************************************************************************************************
    $sql .=   " Id_Zonas_tmp_Act,
				Nombre_Zonas_tmp,";


	//***************************************************************************************************************
	//CONARE: Responsables
	//***************************************************************************************************************
	$sql .=   " Id_Res_Act,
				Id_Cus_Act,";


	//***************************************************************************************************************
	//Estados
	//***************************************************************************************************************
	$sql .=   " Desecho_Act,
				Descripcion_Dese_Act,
				Donacion_Act,
				Descripcion_Dona_Act,			
				Mantenimiento_Act,
				Descripcion_Mante_Act,
				";

	//***************************************************************************************************************
	//Verificación
	//***************************************************************************************************************
	$sql .=   " Verificado_Act,";


	//***************************************************************************************************************
	//Usuario
	//***************************************************************************************************************
	$sql .=   	" 
				Id_Per_Usu_Act,
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per
				";
				
				
				
				
	//***************************************************************************************************************
	//Tablas
	//***************************************************************************************************************			
    $sql .=   " FROM tab_Activos
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

	$resDatosActuales = seleccion($sql);

	/********************************************************************************************/
	/************************      VARIABLE PARA CONTROL DE CAMBIOS        **********************/
	/********************************************************************************************/
	$arrayCambiosTotal = array();
	$arrayCambios = array();
	$existeCambio =0;

	











	/********************************************************************************************/
	/********************************************************************************************/
	/************************   PASO1:  ACTUALIZAR FOTO       ***********************************/
	/********************************************************************************************/
	/********************************************************************************************/

	//********************************************************************************************
	//Paso 1.1: Variables para alamcenar la foto
	//********************************************************************************************
   	$foto = "";
	
	//********************************************************************************************
	//Paso 1.2: Si viene una foto actualice la foto
	//********************************************************************************************
   	if(isset($_FILES["Foto_Act"]['name'])){

   		//********************************************************************************************
		//Paso 1.3: Subimos la foto al servidor
		//********************************************************************************************
	  	if(move_uploaded_file ( $_FILES [ 'Foto_Act' ][ 'tmp_name' ], $path.'img/inventario/activos/' .$_FILES["Foto_Act"]['name'])){
			

	  		//********************************************************************************************
			//Paso 1.4: Actualizamos la BD foto en el activo
			//********************************************************************************************
			$foto = $_FILES["Foto_Act"]['name'];
			$sql = "UPDATE tab_Activos SET Foto_Act = '".$foto."' WHERE Id_Act=".$Id_Act;
			$resFoto = transaccion($sql);

			//********************************************************************************************
			//Paso 1.5: Verificar error
			//********************************************************************************************
			if ($resFoto[0]== 1){

			   	//********************************************************************************************
				//Paso 1.6: Reportar cambio en array de control de cambios
				//********************************************************************************************
				$arrayCambios = array(	
										"Etiqueta"=>"Fotografía", 
										"Anterior"=>$resDatosActuales[0]['Foto_Act'],
										"Nuevo"=>$foto
									);
				$arrayCambiosTotal[] = $arrayCambios;
				$existeCambio =1;


				//********************************************************************************************
				//Paso 1.7: Registramos en HMA
				//********************************************************************************************
				$tablaModificacion = crearTablaCambioHMA($arrayCambios);


			   	$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
										Id_Act_HMA,
										Id_Per_Usu_HMA,
										Fecha_HMA,
										Modificaciones_HMA
									) VALUES (".
										$Id_Act.",".
										$Id_Per_Usu.",".
										"'".date('Y-m-d H:i:s')."',".
										"'".$tablaModificacion."'"
				.")";
				$resHMA = transaccion($sql);

			}else{
				//********************************************************************************************
				//Paso 1.8: Reportarmos error al modificar fotografía
				//********************************************************************************************
				ob_get_clean();
				echo "e1"; 
				exit();
			}
		   


	  }
   	}//Fin de cambio de foto activo

   	/********************************************************************************************/
	/********************************************************************************************/
	/*********************  FIN PASO1:  ACTUALIZAR FOTO       ***********************************/
	/********************************************************************************************/
	/********************************************************************************************/

















   	/********************************************************************************************/
	/********************************************************************************************/
	/************************   PASO2:  ACTUALIZAR VERIFICACION    ******************************/
	/********************************************************************************************/
	/********************************************************************************************/
	
	//********************************************************************************************
	//Paso 2.1: Si la verificación es diferente
	//********************************************************************************************
	if($resDatosActuales[0]['Verificado_Act'] != $Verificado_Act){
		

		//********************************************************************************************
		//Paso 2.2: Actualizamos la base de datos
		//********************************************************************************************
		$sql = "UPDATE tab_Activos SET Id_Per_Usu_Act = '".$Id_Per_Usu."', Verificado_Act='".$Verificado_Act."'  WHERE Id_Act=".$Id_Act;
		$resVeri = transaccion($sql);


		//********************************************************************************************
		//Paso 2.3: Verificar error
		//********************************************************************************************
		if ($resVeri[0]== 1){

			//********************************************************************************************
			//Paso 2.4: Reportar cambio en array de control de cambios
			//********************************************************************************************
			if($Verificado_Act == '1'){
		   		$veriNuevo = "Sí";
		   	}else{
		   		$veriNuevo = "No";
		   	}

		   	if($resDatosActuales[0]['Verificado_Act'] == '1'){
		   		$veriAnterior = "Sí";
		   	}else{
		   		$veriAnterior = "No";
		   	}
		   	
			$arrayCambios = array(	
									"Etiqueta"=>"Verificado", 
									"Anterior"=>$resDatosActuales[0]['Verificado_Act'],
									"Nuevo"=>$Verificado_Act
								);
			$arrayCambiosTotal[] = $arrayCambios;
			$existeCambio =1;

			//********************************************************************************************
			//Paso 2.5: Insertamos en HVERI
			//********************************************************************************************
			$sql = "INSERT INTO tab_sae_historial_verificados (Id_Act_HV,Id_Per_Usu_HV,Fecha_HV,Estado_HV) VALUES (".
					$Id_Act.",".
					$Id_Per_Usu.",".
					"'".date('Y-m-d H:i:s')."',".
					"'".$Verificado_Act."'"
			.")";
			$resHVeri = transaccion($sql);


			//********************************************************************************************
			//Paso 2.6: Insertamos en HMA
			//********************************************************************************************
			$tablaModificacion = crearTablaCambioHMA($arrayCambios);
			$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
										Id_Act_HMA,
										Id_Per_Usu_HMA,
										Fecha_HMA,
										Modificaciones_HMA
									) VALUES (".
										$Id_Act.",".
										$Id_Per_Usu.",".
										"'".date('Y-m-d H:i:s')."',".
										"'".$tablaModificacion."'"
				.")";
			$resHMA = transaccion($sql);
		}else{
			//********************************************************************************************
			//Paso 2.7: Reportarmos error al modificar verificar
			//********************************************************************************************
			ob_get_clean();
			echo "e2"; 
			exit();
		}

	}//Fin vertificación de activo

	/********************************************************************************************/
	/********************************************************************************************/
	/*********************  FIN PASO2:  ACTUALIZAR VERIFICACION    ******************************/
	/********************************************************************************************/
	/********************************************************************************************/







	/********************************************************************************************/
	/********************************************************************************************/
	/*********************     PASO3:  ACTUALIZAR ZONA             ******************************/
	/********************************************************************************************/
	/********************************************************************************************/

	/****************************************************************************/
	/***************** PASO 3.1:  COMPROBAR ZONA      ***************************/
	/****************************************************************************/
	//Si modifico la zona inserte en bitacora
	if($resDatosActuales[0]['Id_Zonas_tmp_Act'] != $Id_Zonas_tmp_Act){

		//********************************************************************************************
		//Paso 3.2: Actualizamos la base de datos
		//********************************************************************************************
		$sql = "UPDATE tab_Activos SET Id_Zonas_tmp_Act = '".$Id_Zonas_tmp_Act."'  WHERE Id_Act=".$Id_Act;
		$resZona = transaccion($sql);


		//********************************************************************************************
		//Paso 3.3: Verificar error
		//********************************************************************************************
		if ($resZona[0]== 1){

			/************************************************************************/
			//Paso 3.3.1: Creamos boleta de trasiego
			/************************************************************************/
			$sql = "INSERT INTO tab_sae_trasiegos (
									Fecha_TRA,
									Motivo_TRA,
									Id_Per_Usu_TRA
								) VALUES (".
									"'".date('Y-m-d H:i:s')."',".
									"'".$motivoCambioUbicacion."',".
									$Id_Per_Usu
			.")";
	

			$resTRA = transaccion($sql);

			/**************************************************************/
			//Paso 3.3.2: obtenemos el ID del trasiego
			/**************************************************************/
			$sql = "SELECT MAX(Id_TRA) AS UltimoIDTRA FROM tab_sae_trasiegos";
			$resUltimoIDTRA = seleccion($sql);
			$IDTRA = $resUltimoIDTRA[0]['UltimoIDTRA'];

	
			/************************************************************************************/
		   	//Paso 3.3.3: Insertamos en historial de zona
		   	/************************************************************************************/
			$sql = "INSERT INTO tab_sae_historial_zona (
									Id_Act_HZ,
									Id_Per_Usu_HZ,
									Id_Zonas_tmp_Anterior_HZ,
									Id_Zonas_tmp_Nuevo_HZ,
									Fecha_HZ,
									Motivo_HZ
								) VALUES (".
					$Id_Act.",".
					$Id_Per_Usu.",".
					$resDatosActuales[0]['Id_Zonas_tmp_Act'].",".
					$Id_Zonas_tmp_Act.",".
					"'".date('Y-m-d H:i:s')."',".
					"'".$motivoCambioUbicacion."'"

			.")";


			$resHZ = transaccion($sql);


			/**************************************************************/
			//Paso 3.4.4: obtenemos el ID del HZ
			/**************************************************************/
			$sql = "SELECT MAX(Id_HZ) AS UltimoIDHZ FROM tab_sae_historial_zona";
			$resUltimoIDHZ = seleccion($sql);
			$IDHZ = $resUltimoIDHZ[0]['UltimoIDHZ'];



			/************************************************************************************/
		   	//Paso 3.3.5: Insertamos en historial de zona
		   	/************************************************************************************/
			$sql = "INSERT INTO tab_sae_TXHZ (
									Id_TRA_TXHZ,
									Id_HZ_TXHZ
								) VALUES (".
					$IDTRA.",".
					$IDHZ
			.")";
			$resTXHZ = transaccion($sql);



			/************************************************************************/
			//Paso 3.3.6: Obtener el nombre de la zona actual
			/************************************************************************/
			$sql = "SELECT 
				    	Nombre_Zonas_tmp
					FROM tab_zonas_tmp 
					WHERE Id_Zonas_tmp = ".$resDatosActuales[0]['Id_Zonas_tmp_Act'];
			$resZonaAct = seleccion($sql);

			/************************************************************************/
			//Paso 3.3.7: Obtener el nombre de la zona nueva
			/************************************************************************/
			$sql = "SELECT 
				    	Nombre_Zonas_tmp
					FROM tab_zonas_tmp 
					WHERE Id_Zonas_tmp = ".$Id_Zonas_tmp_Act;
			$resZonaNueva = seleccion($sql);


			//********************************************************************************************
			//Paso 3.3.8: Reportar cambio en array de control de cambios
			//********************************************************************************************
			$arrayCambios = array(	
									"Etiqueta"=>"Zona", 
									"Anterior"=>$resDatosActuales[0]['Id_Zonas_tmp_Act']." / ".$resZonaAct[0]['Nombre_Zonas_tmp'],
									"Nuevo"=>$Id_Zonas_tmp_Act." / ".$resZonaNueva[0]['Nombre_Zonas_tmp']."<br />Motivo: ".$motivoCambioUbicacion."<br />id Trasiego: ".$IDTRA
								);
			$arrayCambiosTotal[] = $arrayCambios;
			$existeCambio =1;


			//********************************************************************************************
			//Paso 3.3.9: Insertamos en HMA
			//********************************************************************************************
			$tablaModificacion = crearTablaCambioHMA($arrayCambios);
			$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
										Id_Act_HMA,
										Id_Per_Usu_HMA,
										Fecha_HMA,
										Modificaciones_HMA
									) VALUES (".
										$Id_Act.",".
										$Id_Per_Usu.",".
										"'".date('Y-m-d H:i:s')."',".
										"'".$tablaModificacion."'"
				.")";
			$resHMA = transaccion($sql);

			//********************************************************************************************
			//Paso 3.3.10: Enviar correo de trasiego
			//********************************************************************************************
			if($Enviar_Correo_Trasiego_ACON == 1 && $enviarCorreoTrasiego=='1'){
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
				$trasiegoMotivo 			= $motivoCambioUbicacion;
				$trasiegoIdentificacion 	= $resDatosUsuario[0]['Cedula_Per'];
				$trasiegoNombre 			= $resDatosUsuario[0]['Nombre_Per']." ".$resDatosUsuario[0]['Apellido1_Per']." ".$resDatosUsuario[0]['Apellido2_Per'];

				include_once($path."Modulos/Inventario/activos/envia_correo_trasiego.php");
			}

		}else{
			//********************************************************************************************
			//Paso 2.7: Reportarmos error al modificar verificar
			//********************************************************************************************
			error_log("No Entreo");
			ob_get_clean();
			echo "e3"; 
			exit();
		}

	}//Fin zona


	/********************************************************************************************/
	/********************************************************************************************/
	/********************* FIN PASO3:  ACTUALIZAR ZONA             ******************************/
	/********************************************************************************************/
	/********************************************************************************************/





















	/********************************************************************************************/
	/********************************************************************************************/
	/*********************     PASO4:  ACTUALIZAR DATOS            ******************************/
	/********************************************************************************************/
	/********************************************************************************************/

	if (
    		
    		($resDatosActuales[0]['Nombre_Act'] != $Nombre_Act) ||
    		($resDatosActuales[0]['Marca_Act'] != $Marca_Act) ||
    		($resDatosActuales[0]['Modelo_Act'] != $Modelo_Act)||
			($resDatosActuales[0]['Color_Act'] != $Color_Act) ||
    		($resDatosActuales[0]['Numero_Serie_Act'] != $Numero_Serie_Act) ||
    		($resDatosActuales[0]['Descripcion_Act'] != $Descripcion_Act) ||


    		($resDatosActuales[0]['Id_INS_Act'] != $Id_INS_Act)	||
    		($resDatosActuales[0]['Id_Uni_Act'] != $Id_Uni_Act) ||

			($resDatosActuales[0]['Activo_Fijo_Act'] != $Activo_Fijo_Act) ||

    		($resDatosActuales[0]['Fecha_Recepcion_Act'] != $Fecha_Recepcion_Act) ||
			($resDatosActuales[0]['Tiempo_Garantia_Act'] != $Tiempo_Garantia_Act) ||

    		($resDatosActuales[0]['Id_Factu_Act'] != $Id_Factu_Act) ||
    		($resDatosActuales[0]['Costo_Act'] != $Costo_Act) ||
    		
    		($resDatosActuales[0]['Id_Res_Act'] != $Id_Res_Act) ||
    		($resDatosActuales[0]['Id_Cus_Act'] != $Id_Cus_Act) ||

			($resDatosActuales[0]['Desecho_Act'] != $Desecho_Act) ||
			($resDatosActuales[0]['Descripcion_Dese_Act'] != $Descripcion_Dese_Act) ||
			($resDatosActuales[0]['Donacion_Act'] != $Donacion_Act) ||
			($resDatosActuales[0]['Descripcion_Dona_Act'] != $Descripcion_Dona_Act) ||
			($resDatosActuales[0]['Mantenimiento_Act'] != $Mantenimiento_Act) ||
			($resDatosActuales[0]['Descripcion_Mante_Act'] != $Descripcion_Mante_Act) 
		){



			/****************************************************************************/
			/********************* Limpiar campos de descripcion ************************/
			/****************************************************************************/
			if($Desecho_Act==0){
				$Descripcion_Dese_Act = "";
			}

			if($Donacion_Act==0){
				$Descripcion_Dona_Act = "";
			}

			if($Mantenimiento_Act==0){
				$Descripcion_Mante_Act = "";
			}

			//********************************************************************************************
			//Paso 4.1: SQL PRINCIPAL
			//********************************************************************************************

			$sql = "UPDATE tab_Activos SET ";

			//***************************************************************************************************************
			//Datos Activo 
			//***************************************************************************************************************
			$sql .= "Nombre_Act = '".$Nombre_Act."',";
			$sql .= "Marca_Act = '".$Marca_Act."',";
			$sql .= "Modelo_Act = '".$Modelo_Act."',";
			$sql .= "Color_Act = '".$Color_Act."',";
			$sql .= "Numero_Serie_Act = '".$Numero_Serie_Act."',";
			$sql .= "Descripcion_Act = '".$Descripcion_Act."',";


			//***************************************************************************************************************
			//Identificadores de Activo
			//***************************************************************************************************************
			$sql .= "Id_INS_Act = '".$Id_INS_Act."',";
			$sql .= "Id_Uni_Act = ".$Id_Uni_Act.",";

			//***************************************************************************************************************
			//Activo Fijo
			//***************************************************************************************************************
			$sql .= "Activo_Fijo_Act = '".$Activo_Fijo_Act."',";

			//***************************************************************************************************************
			//Fecha y año Recepción
			//***************************************************************************************************************
			$sql .= "Fecha_Recepcion_Act = '".$Fecha_Recepcion_Act."',";
			$sql .= "Tiempo_Garantia_Act = ".$Tiempo_Garantia_Act.",";

			//***************************************************************************************************************
			//Datos de compra
			//***************************************************************************************************************
			$sql .= "Id_Factu_Act = ".$Id_Factu_Act.",";
			$sql .= "Costo_Act = '".$Costo_Act."',";


			//***************************************************************************************************************
			//CONARE: Responsables
			//***************************************************************************************************************
			$sql .= "Id_Res_Act = ".$Id_Res_Act.",";
			$sql .= "Id_Cus_Act = ".$Id_Cus_Act.",";


			//***************************************************************************************************************
			//Estados
			//***************************************************************************************************************
			$sql .= "Desecho_Act = '".$Desecho_Act."',";
			$sql .= "Descripcion_Dese_Act = '".$Descripcion_Dese_Act."',";
			$sql .= "Donacion_Act = '".$Donacion_Act."',";
			$sql .= "Descripcion_Dona_Act = '".$Descripcion_Dona_Act."',";
			$sql .= "Mantenimiento_Act = '".$Mantenimiento_Act."',";
			$sql .= "Descripcion_Mante_Act = '".$Descripcion_Mante_Act."' ";


							
			//***************************************************************************************************************
			//WHERE
			//***************************************************************************************************************   
			$sql .=	" WHERE Id_Act=".$Id_Act;
			$resDatos = transaccion($sql);


			//********************************************************************************************
			//Paso 4.2: Verificar error
			//********************************************************************************************
			if ($resDatos[0]== 1){
				
				//********************************************************************************************
				//Paso 4.3: Verificar cambios
				//********************************************************************************************
				//Almacena todas las filas de cambios
				$filaModificacion ="";

				/************************************************************************/
			   	/**********************     Nombre Activo    ****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Nombre_Act'] != $Nombre_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Nombre", 
							"Anterior"=>$resDatosActuales[0]['Nombre_Act'],
							"Nuevo"=>$Nombre_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
				}


				/************************************************************************/
			   	/**********************          Marca        ***************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Marca_Act'] != $Marca_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Marca", 
							"Anterior"=>$resDatosActuales[0]['Marca_Act'],
							"Nuevo"=>$Marca_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}



			   	/************************************************************************/
			   	/**********************         Modelo        ***************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Modelo_Act'] != $Modelo_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Modelo", 
							"Anterior"=>$resDatosActuales[0]['Modelo_Act'],
							"Nuevo"=>$Modelo_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************         Color         ***************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Color_Act'] != $Color_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Color", 
							"Anterior"=>$resDatosActuales[0]['Color_Act'],
							"Nuevo"=>$Color_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************       Numero serie    ***************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Numero_Serie_Act'] != $Numero_Serie_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Número de serie", 
							"Anterior"=>$resDatosActuales[0]['Numero_Serie_Act'],
							"Nuevo"=>$Numero_Serie_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************      DESCRIPCION     ****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Descripcion_Act'] != $Descripcion_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Descripción", 
							"Anterior"=>$resDatosActuales[0]['Descripcion_Act'],
							"Nuevo"=>$Descripcion_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}



			   	/************************************************************************/
			   	/********************** ACT Institucional *******************************/
			   	/************************************************************************/
			   	if($Ocultar_Activo_Institucional_ACON !="1"){
				   	if($resDatosActuales[0]['Id_INS_Act'] != $Id_INS_Act){

				   		//************************************************
						// Reportar cambio en array de control de cambios
						//************************************************
				   		$arrayCambios = array(	
								"Etiqueta"=>"Act. Institucional", 
								"Anterior"=>$resDatosActuales[0]['Id_INS_Act'],
								"Nuevo"=>$Id_INS_Act
							);
						$arrayCambiosTotal[] = $arrayCambios;
						$existeCambio =1;

						//************************************************
						//Insertamos en fila HMA
						//************************************************
						$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   		}
			   	}



			   	/************************************************************************/
			   	/**********************      Id Universidad *****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Id_Uni_Act'] != $Id_Uni_Act){

			   		//************************************************
			   		//Obtener el nombre de la universidad actual
			   		//************************************************
					$sql = "SELECT Nombre_uni FROM tab_universidades WHERE Id_Uni = ".$resDatosActuales[0]['Id_Uni_Act'];
					$resUniAct = seleccion($sql);

					//************************************************
					//Obtener el nombre de la universidad nueva
					//************************************************
					$sql = "SELECT Nombre_uni FROM tab_universidades WHERE Id_Uni = ".$Id_Uni_Act;
					$resUniNew = seleccion($sql);

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Institución", 
							"Anterior"=>$resDatosActuales[0]['Id_Uni_Act']." / ".$resUniAct[0]['Nombre_uni'],
							"Nuevo"=>$Id_Uni_Act." / ".$resUniNew[0]['Nombre_uni']
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************   Activo Fijo        ****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Activo_Fijo_Act'] != $Activo_Fijo_Act){

			   		//************************************************
					// Textos humanos
					//************************************************
			   		if($resDatosActuales[0]['Activo_Fijo_Act']==1){
			   			$AFActual ="Sí";
			   		}else{
			   			$AFActual ="No";
			   		}

			   		if($Activo_Fijo_Act==1){
			   			$AFNuevo ="Sí";
			   		}else{
			   			$AFNuevo ="No";
			   		}

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Activo fijo", 
							"Anterior"=>$resDatosActuales[0]['Activo_Fijo_Act']." / ".$AFActual,
							"Nuevo"=>$Activo_Fijo_Act." / ".$AFNuevo
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}



			   	/************************************************************************/
			   	/**********************    Fecha recepción   ****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Fecha_Recepcion_Act'] != $Fecha_Recepcion_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Fecha recepción", 
							"Anterior"=>$resDatosActuales[0]['Fecha_Recepcion_Act'],
							"Nuevo"=>$Fecha_Recepcion_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}



			   	/************************************************************************/
			   	/**********************   Tiempo garantia     ***************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Tiempo_Garantia_Act'] != $Tiempo_Garantia_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Tiempo garantía", 
							"Anterior"=>$resDatosActuales[0]['Tiempo_Garantia_Act'],
							"Nuevo"=>$Tiempo_Garantia_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************      Id Factura   *******************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Id_Factu_Act'] != $Id_Factu_Act){


			   		//************************************************
					// Obtener el número de la factura actual
					//************************************************
					$sql = "SELECT 
								Numero_Factu,
							    Numero_OC
							FROM tab_facturas 
							INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
							WHERE Id_Factu = ".$resDatosActuales[0]['Id_Factu_Act'];
					$resFacAct = seleccion($sql);

					//************************************************
					// Obtener el número de la factura nueva
					//************************************************
					$sql = "SELECT 
								Numero_Factu,
							    Numero_OC
							FROM tab_facturas 
							INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
							WHERE Id_Factu = ".$Id_Factu_Act;
					$resFacNew = seleccion($sql);

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Factura", 
							"Anterior"=>"ID Registro: ".$resDatosActuales[0]['Id_Factu_Act']." / Número Factura: ".$resFacAct[0]['Numero_Factu']." / Número Orden: ".$resFacAct[0]['Numero_OC'],
							"Nuevo"=>"ID Registro: ".$Id_Factu_Act." / Número Factura: ".$resFacNew[0]['Numero_Factu']." / Número Orden: ".$resFacNew[0]['Numero_OC']
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************       Costo Activo   ****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Costo_Act'] != $Costo_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Costo", 
							"Anterior"=>$resDatosActuales[0]['Costo_Act'],
							"Nuevo"=>$Costo_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}




			   	/************************************************************************/
			   	/**********************   Responsable     *******************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Id_Res_Act'] != $Id_Res_Act){

			   		//************************************************
					// Obtener el nombre del responsable anterior
					//************************************************
			   		$sql = "SELECT Id_Res,Nombre_Res FROM tab_Responsables WHERE Id_Res = ".$resDatosActuales[0]['Id_Res_Act'];
					$resResOld = seleccion($sql);

					//************************************************
					// Obtener el nombre del responsable actual
					//************************************************
					$sql = "SELECT Id_Res,Nombre_Res FROM tab_Responsables WHERE Id_Res = ".$Id_Res_Act;
					$resResNew = seleccion($sql);



			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Responsable", 
							"Anterior"=>$resDatosActuales[0]['Id_Res_Act']." / ".$resResOld[0]['Nombre_Res'],
							"Nuevo"=>$Id_Res_Act." / ".$resResNew[0]['Nombre_Res']
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************     Custodio      *******************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Id_Cus_Act'] != $Id_Cus_Act){

			   		//************************************************
					// Obtener el nombre del responsable anterior
					//************************************************
			   		$sql = "SELECT Id_Cus,Nombre_Cus FROM tab_Custodios WHERE Id_Cus = ".$resDatosActuales[0]['Id_Cus_Act'];
					$resCusOld = seleccion($sql);

					//************************************************
					// Obtener el nombre del responsable actual
					//************************************************
					$sql = "SELECT Id_Cus,Nombre_Cus FROM tab_Custodios WHERE Id_Cus = ".$Id_Cus_Act;
					$resCusNew = seleccion($sql);



			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Custodio", 
							"Anterior"=>$resDatosActuales[0]['Id_Cus_Act']." / ".$resCusOld[0]['Nombre_Cus'],
							"Nuevo"=>$Id_Cus_Act." / ".$resCusNew[0]['Nombre_Cus']
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;


					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);

					//************************************************
					//Si el custodio se modifica el mensaje de correo es agregar
					//************************************************
					$existeCambioCustodio = 1;

			   	}



			   	/************************************************************************/
			   	/**********************   Desecho Activo     ****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Costo_Act'] != $Costo_Act){


			   		//************************************************
					// Textos humanos
					//************************************************
			   		if($resDatosActuales[0]['Desecho_Act']==1){
			   			$desechoActual ="Sí";
			   		}else{
			   			$desechoActual ="No";
			   		}

			   		if($Desecho_Act==1){
			   			$desechoNuevo ="Sí";
			   		}else{
			   			$desechoNuevo ="No";
			   		}
			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Desecho", 
							"Anterior"=>$resDatosActuales[0]['Desecho_Act']." / ".$desechoActual,
							"Nuevo"=>$Desecho_Act." / ".$desechoNuevo
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}




			   	/************************************************************************/
			   	/********************** Descripcion Desecho  ****************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Descripcion_Dese_Act'] != $Descripcion_Dese_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Descripción desecho", 
							"Anterior"=>$resDatosActuales[0]['Descripcion_Dese_Act'],
							"Nuevo"=>$Descripcion_Dese_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	/************************************************************************/
			   	/**********************   Donacion Activo     ***************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Donacion_Act'] != $Donacion_Act){


			   		//************************************************
					// Textos humanos
					//************************************************
			   		if($resDatosActuales[0]['Donacion_Act']==1){
			   			$donacionActual ="Sí";
			   		}else{
			   			$donacionActual ="No";
			   		}

			   		if($Donacion_Act==1){
			   			$donacionNuevo ="Sí";
			   		}else{
			   			$donacionNuevo ="No";
			   		}

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Donación", 
							"Anterior"=>$resDatosActuales[0]['Donacion_Act']." / ".$donacionActual,
							"Nuevo"=>$Donacion_Act." / ".$donacionNuevo
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}



		   		/************************************************************************/
			   	/********************** Descripcion Donacion  ***************************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Descripcion_Dona_Act'] != $Descripcion_Dona_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Descripción donación", 
							"Anterior"=>$resDatosActuales[0]['Descripcion_Dona_Act'],
							"Nuevo"=>$Descripcion_Dona_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}



			   	/************************************************************************/
			   	/**********************   Mantenimiento Activo    ***********************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Mantenimiento_Act'] != $Mantenimiento_Act){


			   		//************************************************
					// Textos humanos
					//************************************************
			   		if($resDatosActuales[0]['Mantenimiento_Act']==1){
			   			$manteActual ="Sí";
			   		}else{
			   			$manteActual ="No";
			   		}

			   		if($Mantenimiento_Act==1){
			   			$manteNuevo ="Sí";
			   		}else{
			   			$manteNuevo ="No";
			   		}

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Mantenimiento", 
							"Anterior"=>$resDatosActuales[0]['Mantenimiento_Act']." / ".$manteActual,
							"Nuevo"=>$Mantenimiento_Act." / ".$manteNuevos
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}



			   	/************************************************************************/
			   	/********************** Descripcion Mantenimiento  **********************/
			   	/************************************************************************/
			   	if($resDatosActuales[0]['Descripcion_Mante_Act'] != $Descripcion_Mante_Act){

			   		//************************************************
					// Reportar cambio en array de control de cambios
					//************************************************
			   		$arrayCambios = array(	
							"Etiqueta"=>"Descripción mantenimiento", 
							"Anterior"=>$resDatosActuales[0]['Descripcion_Mante_Act'],
							"Nuevo"=>$Descripcion_Mante_Act
						);
					$arrayCambiosTotal[] = $arrayCambios;
					$existeCambio =1;

					//************************************************
					//Insertamos en fila HMA
					//************************************************
					$filaModificacion .= crearfilaCambioHMA($arrayCambios);
			   	}


			   	//****************************************************************************************
				//Paso 4.4: Crear tabla de cambios
				//****************************************************************************************
			   	$tablaModificacion = '';
			   	$tablaModificacion .= '<table class="saeHistoActivoTabla">';
			   		
			   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFilaTitulo">';
			   			$tablaModificacion .= '<td>Campo</td>';
			   			$tablaModificacion .= '<td>Valor Anterior</td>';
			   			$tablaModificacion .= '<td>Nuevo Valor</td>';
			   		$tablaModificacion .= '</tr>';
			   	$tablaModificacion .= $filaModificacion;

			   	$tablaModificacion .= '</table>';

			   	//****************************************************************************************
				//Paso 4.4: Insertar en HMA
				//****************************************************************************************
		   		$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
									Id_Act_HMA,
									Id_Per_Usu_HMA,
									Fecha_HMA,
									Modificaciones_HMA
								) VALUES (".
									$Id_Act.",".
									$Id_Per_Usu.",".
									"'".date('Y-m-d H:i:s')."',".
									"'".$tablaModificacion."'"
				.")";
				$resHMA = transaccion($sql);

			}else{
				//********************************************************************************************
				//Paso 1.8: Reportarmos error al modificar fotografía
				//********************************************************************************************
				ob_get_clean();
				echo "e4"; 
				exit();
			}

		}//Fin if cambios datos




	ob_get_clean();
	if($existeCambio == 0){
		echo "na";
	}else if($existeCambio == 1){


		/************************************************************************************/
		/*****************************    Enviar Correo Custodio       **********************/
		/************************************************************************************/
		if($Enviar_Correo_Custodio_ACON == '1' && $existeCambio ==1){
			
			/* Limpiar el correo */	
			$correo = "";

			//Crear las filas de cambios para el correo del custodio
			$cambiosActivoCorreo = '<tr>';
			$cambiosActivoCorreo .= '<th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Campo:</th>';
			$cambiosActivoCorreo .= '<th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Valor Anterior:</th>';
			$cambiosActivoCorreo .= '<th style=" background-color: #2899C0; color: #FFF;border: 1px solid #2899C0;  text-align: center; border: 1px solid #FFF;padding-top: .2rem; padding-bottom: .2rem;">Valor Nuevo:</th>';
			$cambiosActivoCorreo .= '</tr>';
			for($i =0;$i <count($arrayCambiosTotal); $i++){
				$cambiosActivoCorreo .= '<tr>';
				$cambiosActivoCorreo .= '<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$arrayCambiosTotal[$i]['Etiqueta'].'</td>';
				$cambiosActivoCorreo .= '<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$arrayCambiosTotal[$i]['Anterior'].'</td>';
				$cambiosActivoCorreo .= '<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$arrayCambiosTotal[$i]['Nuevo'].'</td>';
				$cambiosActivoCorreo .= '</tr>';


			}
			$IDACT = $Id_Act;
			
			/*Incluir el archivo*/
			include_once($path."Modulos/Inventario/activos/envia_correo_custodio_modificar.php");	
		}

		echo "1";
	}

?>