<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Act		= (isset($_POST['Id_Act'])) 	? $_POST['Id_Act'] 	: '';
	$Id_Zona	= (isset($_POST['Id_Zona'])) 	? $_POST['Id_Zona'] : '';
	$Id_Ins		= (isset($_POST['Id_Ins'])) 	? $_POST['Id_Ins'] : '';


	/*******************************************************************************/
	//PASO1: Verificar que sea un número de actyivo SIUA
	/*******************************************************************************/
	$sql = "SELECT Id_Uni_Act, Nombre_Act, Id_Zonas_tmp_Act FROM tab_Activos WHERE Id_Act = ".$Id_Act;
	$res = seleccion($sql);	

	/****************************************************************************************************************************/
	/****************************************************************************************************************************/
	/****************************************************************************************************************************/
	function saeVerificarActivo($Id_Act,$Id_Per_Usu){
		$sql = "UPDATE tab_Activos SET Verificado_Act = '1', Id_Per_Usu_Act=".$Id_Per_Usu." WHERE Id_Act = ".$Id_Act;
		$res1 = transaccion($sql);	


		/**************************************************************************************************************/
		/* Insertar en el historial de verificación */
		/**************************************************************************************************************/
		$sql = "INSERT INTO tab_sae_historial_verificados (Id_Act_HV,Id_Per_Usu_HV,fecha_HV,estado_HV) VALUES (".
				$Id_Act.",".
				$Id_Per_Usu.",".
				"'".date('Y-m-d H:i:s')."',".
				"'1'"
		.")";

		$res2 = transaccion($sql);
		/**************************************************************************************************************/
		/**************************************************************************************************************/
		/**************************************************************************************************************/

		if ($res1[0]== 1){
			return 1;		
		}else{
			return 0;
		}
	}
	
	/****************************************************************************************************************************/
	/****************************************************************************************************************************/
	/****************************************************************************************************************************/


	
	
	
	//S existe
	if (count($res)>0){
		/*******************************************************************************/
		//PASO2: Verificar que el activo se encuentre en la zona seleccionada
		/*******************************************************************************/
		if($Id_Zona == $res[0]['Id_Zonas_tmp_Act']){

			/*******************************************************************************/
			//PASO3: Verificar que el usuario se pertenece a la institución del activo
			/*******************************************************************************/
			$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu." AND Id_Uni_PXU = ".$res[0]['Id_Uni_Act'];

			$resUsuPerteneceInsAct = seleccion($sql);
			if(count($resUsuPerteneceInsAct)>0){
				
				/*******************************************************************************/
				//PASO4: Verificar si la institucion es 0 (no hay que verificar cual institucion el usuario selecciono)
				/*******************************************************************************/
				if( ($Id_Ins == 0) || ($Id_Ins == $res[0]['Id_Uni_Act']) ){
					//mandamos a verificar
					$resultado = saeVerificarActivo($Id_Act,$Id_Per_Usu);
					if($resultado==1){
						ob_clean();
						echo 1;
						exit;	
					}else{
						ob_clean();
						echo 0;
						exit;	
					}

				}else{
					/*******************************************************************************/
					//PASO4-ERROR: Verificar si la institucion es 0 (no hay que verificar cual institucion el usuario selecciono)
					/*******************************************************************************/
					ob_clean();
					echo "e4";
					exit;
				}

			}else{
				/*******************************************************************************/
				//PASO3-ERROR: Verificar que el usuario se pertenece a la institución del activo
				/*******************************************************************************/
				ob_clean();
				echo "e3";
				exit;
			}


		}else{
			/*******************************************************************************/
			//PASO2-ERROR: Verificar que el activo se encuentre en la zona seleccionada
			/*******************************************************************************/
			ob_clean();
			echo "e2";
			exit;
		}
	}else{
		/*******************************************************************************/
		//PASO1-ERROR: Verificar que sea un número de activo SIUA
		/*******************************************************************************/
		ob_clean();
		echo 'e1';
		exit;
	}
?>