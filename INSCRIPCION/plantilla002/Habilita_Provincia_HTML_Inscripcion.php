	<?php
	
		$path='../../';
		include($path."Include/Bd/bd.php");
		include($path."configuracion.php");
		
		
		$Id_Pai					= (isset($_GET['Id_Pai'])) ? $_GET['Id_Pai'] : '0';
		$ruta					= (isset($_GET['ruta'])) ? $_GET['ruta'] : '';
		
		$sql="SELECT Id_Pro,Nombre_Pro
				FROM tab_provincias 
				WHERE Activo_Pro = '1'
				AND Id_Pai_Pro =".$Id_Pai;
		$res = seleccion($sql);
		
		$sql ="SELECT Nivel_Ubicacion_Conf, Id_Pai_Conf FROM tab_configuracion WHERE Id_Conf = 1";
		$res_conf = seleccion($sql);
	
		$Nivel_Ubicacion_Conf = $res_conf[0]['Nivel_Ubicacion_Conf'];
	
	?>
        <?php if($res[0]['Id_Pro'] != ''){ ?>
		
		<select name="provincias" id="provincias" <?php if ($Nivel_Ubicacion_Conf>2){?>onchange="Habilitar_Canton_Inscripcion('<?=$ruta?>')" <?php } ?> class="estilo_input">
			<option value="0"><?=$texto['Seleccione']?></option>
			<?php
			for($i=0;$i<count($res);$i++){
			?>
			
			<option value="<?=$res[$i]["Id_Pro"]?>"><?=$res[$i]["Nombre_Pro"]?></option>
			<?php
			}
			?>
		</select>
        <label for="provincias" ><?=$texto['Provincia']?>:</label>
		
        <?php }else{ ?>
		
		<select name="provincias" id="provincias" class="estilo_input">
			<option value="0"><?=$texto['Seleccione']?></option>
		</select>
		<label for="provincias"><?=$texto['Provincia']?>:</label>
        <?php } ?>
	
