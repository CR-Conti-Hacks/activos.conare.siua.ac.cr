	<?php
	
		$path='../../';
		include($path."Include/Bd/bd.php");
		include($path."configuracion.php");
		
		$Id_Can					= (isset($_GET['Id_Can'])) ? $_GET['Id_Can'] : '0';
		$ruta					= (isset($_GET['ruta'])) ? $_GET['ruta'] : '';
		
		$sql="SELECT Id_Dist,Nombre_Dist
				FROM tab_distritos 
				WHERE Activo_Dist = '1'
				AND Id_Can_Dist =".$Id_Can;
		$res = seleccion($sql);
		
		$sql ="SELECT Nivel_Ubicacion_Conf, Id_Pai_Conf FROM tab_configuracion WHERE Id_Conf = 1";
		$res_conf = seleccion($sql);
	
		$Nivel_Ubicacion_Conf = $res_conf[0]['Nivel_Ubicacion_Conf'];
	
	?>
        <?php if($res[0]['Id_Dist'] != ''){ ?>
		
		<select name="distritos" id="distritos" class="estilo_input">
			<option value="0"><?=$texto['Seleccione']?></option>
			<?php
			for($i=0;$i<count($res);$i++){
			?>
			
			<option value="<?=$res[$i]["Id_Dist"]?>"><?=$res[$i]["Nombre_Dist"]?></option>
			<?php
			}
			?>
		</select>
        <label for="distritos"><?=$texto['Distrito']?>:</label>
        <?php }else{ ?>
		
		<select name="distritos" id="distritos" class="estilo_input">
			<option value="0"><?=$texto['Seleccione']?></option>
		</select>
		<label for="distritos"><?=$texto['Distrito']?>:</label>
        <?php } ?>
	
	