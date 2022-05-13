<?php
	
	$path='../../../../';
	include($path."Include/Bd/bd.php");
	include($path."configuracion.php");
		
	$Id_CT					= (isset($_GET['Id_CT'])) ? $_GET['Id_CT'] : '0';
		
	$sql="SELECT Id_Uni,Nombre_Uni,Diminutivo_Uni
			   FROM tab_universidades
			   WHERE Activo_Uni='1' AND Id_CT_Uni = ".$Id_CT.
			   " ORDER BY Nombre_Uni";
	$res = seleccion($sql);
	
	$cadena =  '[';

		if($res[0]['Id_Uni'] != ''){
			$cadena .= '{"valor":"0","nombre":"[Seleccione]","diminutivo":""},';
			for($i=0;$i<count($res);$i++){
				$cadena .='{';
					$cadena .='"valor":"'.$res[$i]['Id_Uni'].'",';
					$cadena .='"nombre":"'.$res[$i]['Nombre_Uni'].'",';
					$cadena .='"diminutivo":"'.$res[$i]['Diminutivo_Uni'].'"';
					
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
