<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_POST.php");
	/***************************************************************************/
	
	//Recibir los parametros
	$Id_Act		= (isset($_POST['Id_Act'])) ? $_POST['Id_Act'] : '';


	//Verificar si el activo existe
	$sql = "SELECT 
					Id_Act,
					Id_INS_Act,
					Id_Uni_Act, 
					Nombre_Act,
					Foto_Act,
			        Marca_Act, 
			        Modelo_Act,
			        Numero_Serie_Act,
			        Diminutivo_Uni
			FROM tab_Activos 
			INNER JOIN tab_universidades ON (Id_Uni = Id_Uni_Act) 
			WHERE Id_Act = ".$Id_Act;

	$res = seleccion($sql);	

	
	ob_clean();
	//S existe
	if (count($res)>0){
		//verificamos si el usuario puede trasegar el activo
		$sql = "SELECT Id_Uni_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per_Usu." AND Id_Uni_PXU = ".$res[0]['Id_Uni_Act'];

		$resTienePermisoTrasiego = seleccion($sql);
		if(count($resTienePermisoTrasiego)>0){
			$fila = '';
			$fila .= '<div id="fila'.$Id_Act.'" name="fila'.$Id_Act.'" class="trasiegoFilaActivo" >';
				
				/********************************************************/
				/********************** FOTO  ***************************/
				/********************************************************/
				if($res[0]['Foto_Act']==''){
					$Foto_Act = $path."img/inventario/activos/default.png";
				}else{
					$Foto_Act = $path."img/inventario/activos/".$res[0]['Foto_Act'];
					if(!file_exists($Foto_Act)){
						$Foto_Act = $path."img/inventario/activos/default.png";
					}
				}
				$fila .= '<div class="trasiegoColumnaFoto">';
				$fila .= '<a id="fancybox_principal'.$res[0]['Id_Act'].'" href="'.$Foto_Act.'" data-fancybox-group="gallery" title="'.$res[0]['Nombre_Act'].'">';
				$fila .= '<img src="'.$Foto_Act.'" style="width: 60px; height: 60px; border-radius: 10px;" />';
				$fila .= '</a>';
				$fila .= '</div>';

				/********************************************************/
				/********************** ID    ***************************/
				/********************************************************/
				$fila .= '<div class="trasiegoColumnaId">';
				if($res[0]['Id_Act']!= ""){
					$texto = $res[0]['Id_Act'];
				}else{
					$texto = "-";
				}
				$fila .= $texto;
				$fila .= '<input type="hidden" name="LAXG[]" id="LAXG[]" value="'.$Id_Act.'" />';
				$fila .= '</div>';



				/********************************************************/
				/********************* Nombre  **************************/
				/********************************************************/
				$fila .= '<div class="trasiegoColumnaNombre">';
				if($res[0]['Nombre_Act']!= ""){
					$texto = $res[0]['Nombre_Act'];
				}else{
					$texto = "-";
				}
				$fila .= $texto;
				$fila .= '</div>';
				

				/********************************************************/
				/********************* Serie  **************************/
				/********************************************************/
				$fila .= '<div class="trasiegoColumnaSerie">';
				if($res[0]['Numero_Serie_Act']!= ""){
					$texto = $res[0]['Numero_Serie_Act'];
				}else{
					$texto = "-";
				}
				$fila .= $texto;
				$fila .= '</div>';


				/********************************************************/
				/********************* Marca   **************************/
				/********************************************************/
				$fila .= '<div class="trasiegoColumnaMarca">';
				if($res[0]['Marca_Act']!= ""){
					$texto = $res[0]['Marca_Act'];
				}else{
					$texto = "-";
				}
				$fila .= $texto;
				$fila .= '</div>';


				/********************************************************/
				/********************* Modelo  **************************/
				/********************************************************/
				$fila .= '<div class="trasiegoColumnaModelo">';
				if($res[0]['Modelo_Act']!= ""){
					$texto = $res[0]['Modelo_Act'];
				}else{
					$texto = "-";
				}
				$fila .= $texto;
				$fila .= '</div>';


				/********************************************************/
				/********************* Universidad  *********************/
				/********************************************************/
				$fila .= '<div class="trasiegoColumnaUni">';
				if($res[0]['Diminutivo_Uni']!= ""){
					$texto = $res[0]['Diminutivo_Uni'];
				}else{
					$texto = "-";
				}
				$fila .= $texto;
				$fila .= '</div>';


				$fila .= '<div class="trasiegoColumnaEliminar">';
				$fila .= '<a class="saeTrasiegoEliminar" onclick="trasiegoEliminarFila('."'fila".$Id_Act."'".');">';
				$fila .= 'Eliminar';
				$fila .= '</a>';
				$fila .= '</div>';
				$fila .= '';
				$fila .= '';
			$fila .= '</div>';	

			echo $fila;
		}else{
			echo 'e2';
		}
	}else{
		echo 'e1';
	}
	//SI actualizo correctamente la consulta

?>