<?php
	
	$path='../../../../../';
	include($path."Include/Bd/bd.php");
	include($path."configuracion.php");
		
	$Id_Uni					= (isset($_GET['Id_Uni'])) ? $_GET['Id_Uni'] : '0';
		
	$sql="SELECT Id_Esc,Nombre_Esc,Diminutivo_Esc
			   FROM tab_escuelas
			   WHERE Id_Uni_Esc = ".$Id_Uni.
			   " ORDER BY Nombre_Esc";
	$res = seleccion($sql);
	
	$cadena =  '[';

		if($res[0]['Id_Esc'] != ''){
			$cadena .= '{"valor":"0","nombre":"[Seleccione]","diminutivo":""},';
			for($i=0;$i<count($res);$i++){
				$cadena .='{';
					$cadena .='"valor":"'.$res[$i]['Id_Esc'].'",';
					$cadena .='"nombre":"'.$res[$i]['Nombre_Esc'].'",';
					$cadena .='"diminutivo":"'.$res[$i]['Diminutivo_Esc'].'"';
					
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
