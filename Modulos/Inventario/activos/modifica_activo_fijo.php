<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/

	/*************************************************************************/
	/************             RECIBIR PARAMETROS                    **********/
	/*************************************************************************/
	$Id_Act						= (isset($_POST['Id_Act'])) ? $_POST['Id_Act'] : '';
	$tipo						= (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
	
	
	if($tipo == 'SIAF'){
		$estadoNuevo = '1';
		$valorNuevo ="Sí";
		$estadoAnterior = '0';
		$valorAnterior = "No";
	}elseif($tipo=="NOAF"){
		$estadoNuevo = '0';
		$valorNuevo ="No";
		$estadoAnterior = '1';
		$valorAnterior = "Sí";
	}
	
	$sql = "UPDATE tab_Activos SET Activo_Fijo_ACT = ".$estadoNuevo.", Id_Per_Usu_Act=".$Id_Per_Usu." WHERE Id_Act = ".$Id_Act;
	$res = transaccion($sql);	


	/**************************************************************************************************************/
	/* Insertar en el historial de activo */
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
   	/**********************   Activo Fijo        ****************************/
   	/************************************************************************/

		$tablaModificacion .= '<tr class="saeHistoActivoTablaFila">';
			$tablaModificacion .= '<td class="saeHistoActivoTablaSubtitulo">';
				$tablaModificacion .= 'Activo fijo';
			$tablaModificacion .= '</td>';
			$tablaModificacion .= '<td>';
				$tablaModificacion .= $estadoAnterior ." (".$valorAnterior .")";
			$tablaModificacion .= '</td>';
			$tablaModificacion .= '<td>';
				$tablaModificacion .= $estadoNuevo ." (".$valorNuevo .")";
			$tablaModificacion .= '</td>';
		$tablaModificacion .= '</tr>';

	$tablaModificacion .= '</table>';

	$sql = "INSERT INTO tab_sae_inv_historial_modificacion_activos (
									Id_Act_HMA,
									Id_Per_Usu_HMA,
									fecha_HMA,
									modificaciones_HMA
								) VALUES (".
									$Id_Act.",".
									$Id_Per_Usu.",".
									"'".date('Y-m-d H:i:s')."',".
									"'".$tablaModificacion."'"
			.")";
			$resHMA = transaccion($sql);
			/************************************************************************************/
		   	/**************************** Historial Activo    ***********************************/
		   	/************************************************************************************/
	/**************************************************************************************************************/
	/**************************************************************************************************************/
	/**************************************************************************************************************/
	

	//SI actualizo correctamente la consulta
	if ($res[0]== 1){
		echo 1;		
	}else{
		echo 'e1';
	}

?>