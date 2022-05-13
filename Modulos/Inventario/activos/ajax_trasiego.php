<?php
    
	/*************************************************************************/
    /****************************SEGURIDAD ***********************************/
	/*************************************************************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");

	/*************************************************************************/
	/************             RECIBIR PARAMETROS                    **********/
	/*************************************************************************/
	$zona						= (isset($_POST['zona'])) ? $_POST['zona'] : '';
	$motivo						= (isset($_POST['motivo'])) ? $_POST['motivo'] : '';
	$enviarCorreoTrasiego		= (isset($_POST['enviarCorreoTrasiego'])) ? $_POST['enviarCorreoTrasiego'] : '';
	$LAXG						= (isset($_POST['LAXG'])) ? $_POST['LAXG'] : '';
	$LAXG = explode("/", $LAXG);



	/*************************************************************************/
	/************ Función que hace rollback de las actualizaziones ***********/
	/*************************************************************************/
	function regresarZonas($LAXG,$arrayIZA){
		for ($i=0; $i < count($LAXG)-1; $i++) { 
			$sql = "UPDATE tab_Activos SET ".
							"Id_Zonas_tmp_Act = ".$arrayIZA[$i]."".
				" WHERE Id_Act=".$LAXG[$i];
			$res = transaccion($sql);
		}
		ob_get_clean();
		echo "e1";/*Ocurrior error al insertar algún registro*/
		exit();
	}
	/*************************************************************************/
	/*************************************************************************/
	/*************************************************************************/




	/*******************************************************************************************/
	/******************* MANDAMOS A ACTUALIZAR LAS ZONAS EN ACTIVOS  ***************************/
	/*******************************************************************************************/
	
	/*Variablles de control*/
	$arrayIdZonaActual = array();/*Almacena los id de zonas actuales*/
	$ocurrioError =  0;/*0=No 1=Si*/

	for ($i=0; $i < count($LAXG)-1; $i++) { 
		
		/************************************************************************/
		/*Obtenemos el ID de la zona actual*/
		/************************************************************************/
		$sql = "SELECT Id_Zonas_tmp_Act FROM tab_Activos WHERE Id_Act = ".$LAXG[$i];
		$resIdZonaAct = seleccion($sql);
		$arrayIdZonaActual[] = $resIdZonaAct[0]['Id_Zonas_tmp_Act'];

		

		/************************************************************************/
		/*Mandamos a guardar*/
		/************************************************************************/
		//Verificamos si las zonas son diferentes actualizamos sino saltamos
		if($resIdZonaAct[0]['Id_Zonas_tmp_Act'] != $zona){
			$sql = "UPDATE tab_Activos SET ".
								"Id_Zonas_tmp_Act = ".$zona."".
					" WHERE Id_Act=".$LAXG[$i];
			$res = transaccion($sql);
		    //Si ocurrio error rollback
		    if ($res[0]!= 1){
		    	regresarZonas($LAXG, $arrayIdZonaActual);
		    	$ocurrioError =  1;
		    	break;

		    }   
		}
	}
	/*******************************************************************************************/
	/****************   FIN: MANDAMOS A ACTUALIZAR LAS ZONAS EN ACTIVOS  ***********************/
	/*******************************************************************************************/





	/*******************************************************************************************/
	/*******************            SINO OCURRIO UN ERROR            ***************************/
	/*******************************************************************************************/
	if($ocurrioError ==0){

		/************************************************************************/
		/*Paso1: Creamos boleta de trasiego*/
		/************************************************************************/
		$sql = "INSERT INTO tab_sae_trasiegos (
								fecha_TRA,
								motivo_TRA,
								Id_Per_Usu_TRA
							) VALUES (".
								"'".date('Y-m-d H:i:s')."',".
								"'".$motivo."',".
								$Id_Per_Usu
		.")";
		$resTRA = transaccion($sql);

		/**************************************************************/
		//PASO2: obtenemos el ID del trasiego
		/**************************************************************/
		$sql = "SELECT MAX(Id_TRA) AS UltimoIDTRA FROM tab_sae_trasiegos";
		$resUltimoIDTRA = seleccion($sql);
		$IDTRA = $resUltimoIDTRA[0]['UltimoIDTRA'];


		$trasiegoListaActivos = "";
		for ($i=0; $i < count($LAXG)-1; $i++) { 
			
			/************************************************************************************/
		   	//Paso3: insertamos en historial de zona
		   	/************************************************************************************/
			$sql = "INSERT INTO tab_sae_historial_zona (
									Id_Act_HZ,
									Id_Zonas_tmp_Anterior_HZ,
									Id_Zonas_tmp_Nuevo_HZ
								) VALUES (".
					$LAXG[$i].",".
					$arrayIdZonaActual[$i].",".
					$zona
			.")";
			$res = transaccion($sql);

			/**************************************************************/
			//PASO4: obtenemos el ID del trasiego
			/**************************************************************/
			$sql = "SELECT MAX(Id_HZ) AS UltimoIDHZ FROM tab_sae_historial_zona";
			$resUltimoIDHZ = seleccion($sql);
			$IDHZ = $resUltimoIDHZ[0]['UltimoIDHZ'];

			/************************************************************************************/
		   	//Paso5: insertamos en historial de zona
		   	/************************************************************************************/
			$sql = "INSERT INTO tab_sae_TXHZ (
									Id_TRA_TXHZ,
									Id_HZ_TXHZ
								) VALUES (".
					$IDTRA.",".
					$IDHZ
			.")";
			$res = transaccion($sql);



			/************************************************************************/
			/*Paso6: Obtener el nombre de la zona actual*/
			/************************************************************************/
			$sql = "SELECT 
				    	Nombre_Zonas_tmp
					FROM tab_zonas_tmp 
					WHERE Id_Zonas_tmp = ".$arrayIdZonaActual[$i];
			$resZonaAct = seleccion($sql);

			/************************************************************************/
			/*Paso7: Obtener el nombre de la zona nueva*/
			/************************************************************************/
			$sql = "SELECT 
				    	Nombre_Zonas_tmp
					FROM tab_zonas_tmp 
					WHERE Id_Zonas_tmp = ".$zona;
			$resZonaNueva = seleccion($sql);



			/************************************************************************/
		   	// Paso8: Historial Activo:ZONA
		   	/************************************************************************/
		   		
		   	$tablaModificacion = '';
		   	$tablaModificacion .= '<table class="saeHistoActivoTabla">';
		   		
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFilaTitulo">';
		   			$tablaModificacion .= '<td>Campo</td>';
		   			$tablaModificacion .= '<td>Valor Anterior</td>';
		   			$tablaModificacion .= '<td>Nuevo Valor</td>';
		   		$tablaModificacion .= '</tr>';

		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Zona';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= $arrayIdZonaActual[$i]." / ".$resZonaAct[0]['Nombre_Zonas_tmp'];
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= $zona." / ".$resZonaNueva[0]['Nombre_Zonas_tmp']."<br />Motivo: ".$motivo."<br />id Trasiego: ".$IDTRA;
	   				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';
		   	$tablaModificacion .= '</table>';


		   	$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
									Id_Act_HMA,
									Id_Per_Usu_HMA,
									fecha_HMA,
									modificaciones_HMA
								) VALUES (".
									$LAXG[$i].",".
									$Id_Per_Usu.",".
									"'".date('Y-m-d H:i:s')."',".
									"'".$tablaModificacion."'"
			.")";
			$resHMA = transaccion($sql);
			
			/************************************************************************/
		   	// Paso9: Crear lista de activos para correo
		   	/************************************************************************/
		   	$trasiegoListaActivos .=			
									'<tr style="border: 1px solid #BBB; text-align: center;">
            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$LAXG[$i].'</td>
            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$resZonaAct[0]['Nombre_Zonas_tmp'].'</td>
            							<td style="border: 1px solid #BBB;padding-top: .2rem; padding-bottom: .2rem;">'.$resZonaNueva[0]['Nombre_Zonas_tmp'].'</td>
                   					</tr>';

		}//for
        
        if($enviarCorreoTrasiego == 1){
			/*Crear formato de correo*/	
			$correo = "";

			/*Obtenemos los datos del trasiego*/
			$sql = "SELECT 
						Id_TRA, 
						DATE(fecha_TRA) AS Fecha,
                        DATE_FORMAT(fecha_TRA, '%r') as Hora,
						motivo_TRA,
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
			$trasiegoMotivo 			= $motivo;
			$trasiegoIdentificacion 	= $resDatosUsuario[0]['Cedula_Per'];
			$trasiegoNombre 			= $resDatosUsuario[0]['Nombre_Per']." ".$resDatosUsuario[0]['Apellido1_Per']." ".$resDatosUsuario[0]['Apellido2_Per'];

			include_once($path."Modulos/Inventario/activos/envia_correo_trasiegos.php");

		}

		ob_get_clean();
		echo  '1';
	}else{
		echo 'e2';
	}

	


	
    

?>