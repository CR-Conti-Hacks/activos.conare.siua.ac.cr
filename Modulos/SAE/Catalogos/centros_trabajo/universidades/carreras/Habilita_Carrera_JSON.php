<?php
	
	$path='../../../../../../';
	include($path."Include/Bd/bd.php");
	include($path."configuracion.php");
		
	$Id_Esc					= (isset($_GET['Id_Esc'])) ? $_GET['Id_Esc'] : '0';
		
	$sql="SELECT Id_Car,Nombre_Car,Diminutivo_Car
			   FROM tab_carreras
			   WHERE Id_Esc_Car = ".$Id_Esc.
			   " ORDER BY Nombre_Car";
	$res = seleccion($sql);
	
	$cadena =  '[';

		if($res[0]['Id_Car'] != ''){
			$cadena .= '{"valor":"0","nombre":"[Seleccione]","diminutivo":""},';
			for($i=0;$i<count($res);$i++){
				$cadena .='{';
					$cadena .='"valor":"'.$res[$i]['Id_Car'].'",';
					$cadena .='"nombre":"'.$res[$i]['Nombre_Car'].'",';
					$cadena .='"diminutivo":"'.$res[$i]['Diminutivo_Car'].'"';
					
				$cadena .='},';
			}
		}else{
			$cadena .='{"valor":"0","nombre":"[Seleccione]","diminutivo":""},';
		}
		
	//quitar la ultima coma "," (error JSON)
	$cadena = trim($cadena, ',');

	
	$cadena .=']';
	echo $cadena;
	
?>
