	<?php
		
		$path='../../';
		include($path."Include/Bd/bd.php");
		include($path."configuracion.php");
		
		$Id_Pro					= (isset($_GET['Id_Pro'])) ? $_GET['Id_Pro'] : '0';
		$ruta					= (isset($_GET['ruta'])) ? $_GET['ruta'] : '';
		
		$sql="SELECT Id_Can,Nombre_Can
				FROM tab_cantones 
				WHERE Activo_Can = '1'
				AND Id_Pro_Can =".$Id_Pro;
		$res = seleccion($sql);
		
		$sql ="SELECT Nivel_Ubicacion_Conf, Id_Pai_Conf FROM tab_configuracion WHERE Id_Conf = 1";
		$res_conf = seleccion($sql);
	
		$Nivel_Ubicacion_Conf = $res_conf[0]['Nivel_Ubicacion_Conf'];
	
	?>
        <?php if($res[0]['Id_Can'] != ''){ ?>
		
		<select name="cantones" id="cantones" <?php if ($Nivel_Ubicacion_Conf>3){?>onchange="Habilitar_Distrito_Inscripcion('<?=$ruta?>')" <?php } ?> class="estilo_input" >
			<option value="0"><?=$texto['Seleccione']?></option>
			<?php
			for($i=0;$i<count($res);$i++){
			?>
			
			<option value="<?=$res[$i]["Id_Can"]?>"><?=$res[$i]["Nombre_Can"]?></option>
			<?php
			}
			?>
		</select>
        <label for="cantones"><?=$texto['Canton']?>:</label>
		
		
        <?php }else{ ?>
		<select name="cantones" id="cantones"  class="estilo_input">
			<option value="0"><?=$texto['Seleccione']?></option>
		</select>
		<label for="cantones"><?=$texto['Canton']?>:</label>
        <?php } ?>
	
	