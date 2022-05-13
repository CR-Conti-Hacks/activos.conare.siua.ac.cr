<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/

	

    /******************************************************************************/
	/*******************      RECIBIR PARAMETROS     ******************************/
	/******************************************************************************/
	$Id_Zona			= (isset($_POST['Id_Zona'])) 	? $_POST['Id_Zona'] 	: '';
	$Id_Ins				= (isset($_POST['Id_Ins'])) 	? $_POST['Id_Ins'] 		: '';

	/***************************************************************************/
	/*********** DETERMINAR A QUE UNIVERSIDA PERTENECE EL USUARIO   ************/
	/***************************************************************************/
	$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu;
	$resMiembroUni = seleccion($sql);


	/******************************************************************************/
	/*******************    Obtener los Activos por actualizar  *******************/
	/******************************************************************************/
	$sql = "SELECT 
					Id_Act,
					Verificado_Act 
    				FROM tab_Activos
					WHERE Id_Zonas_tmp_Act = ".$Id_Zona;
	
	//Si especifico la universidad miembro
	if($Id_Ins!=0){
		$sql .= " AND Id_Uni_Act = ".$Id_Ins;
	//Si no la especifíco validamos que solo sean las que es miembro
	}else{
		$sql .= " AND (";
		$cantidad = count($resMiembroUni);
		for ($i=0; $i < $cantidad; $i++) { 
			$sql .= " (Id_Uni_Act = ".$resMiembroUni[$i]['Id_Uni_PXU'].") ";
			if(($i +1) < $cantidad){
				$sql .= " || ";
			}
		}
		$sql .= " )";
	}

	$resActivo = seleccion($sql);
	$ocurrioError = 0;
	for ($i=0; $i < count($resActivo); $i++) { 
		$sql = "UPDATE tab_Activos
						SET
						Verificado_Act = 0,
						Id_Per_Usu_Act = ".$Id_Per_Usu."
						WHERE Id_Act = ".$resActivo[$i]['Id_Act'];
		$res = transaccion($sql);

		//Si se actualizó de forma correcta    
	    if ($res[0]== 1){
	    	/***************************************************************/
	    	/***************** Historial Verificado ************************/
	    	/***************************************************************/
	    	$sql = "INSERT INTO tab_sae_historial_verificados (Id_Act_HV,Id_Per_Usu_HV,fecha_HV,estado_HV) VALUES (".
				$resActivo[$i]['Id_Act'].",".
				$Id_Per_Usu.",".
				"'".date('Y-m-d H:i:s')."',".
				"'0'"
			.")";
			$res = transaccion($sql);

			/************************************************************************************/
		   	/**************************** Historial Activo: VERIFICAR ***************************/
		   	/************************************************************************************/
		   	$tablaModificacion = '';
		   	$tablaModificacion .= '<table class="saeHistoActivoTabla">';
		   		
		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFilaTitulo">';
		   			$tablaModificacion .= '<td>Campo</td>';
		   			$tablaModificacion .= '<td>Valor Anterior</td>';
		   			$tablaModificacion .= '<td>Nuevo Valor</td>';
		   		$tablaModificacion .= '</tr>';

		   		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
		   			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
		   				$tablaModificacion .= 'Verificado';
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
		   				$tablaModificacion .= $resActivo[$i]['Verificado_Act'];
		   			$tablaModificacion .= '</td>';
		   			$tablaModificacion .= '<td>';
	   					$tablaModificacion .= '0';
	   				$tablaModificacion .= '</td>';
	   			$tablaModificacion .= '</tr>';
		   	$tablaModificacion .= '</table>';


		   	$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
									Id_Act_HMA,
									Id_Per_Usu_HMA,
									fecha_HMA,
									modificaciones_HMA
								) VALUES (".
									$resActivo[$i]['Id_Act'].",".
									$Id_Per_Usu.",".
									"'".date('Y-m-d H:i:s')."',".
									"'".$tablaModificacion."'"
			.")";
			$resHMA = transaccion($sql);
	    }else{
	    	$ocurrioError = 1;
	    }
	}
	ob_get_clean();
	if ($ocurrioError== 0){
		echo 1;		
	}else{
		echo 'e1';
	}



	
	
	



?>