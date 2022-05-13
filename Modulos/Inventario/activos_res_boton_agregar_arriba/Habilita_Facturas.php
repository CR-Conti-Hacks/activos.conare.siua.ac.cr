	<?php
	
		$path='../../../';
		include($path."Seguridad_Interfaz_GET.php");
		
		
		$Id_OC					= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '0';
		
		$sql="SELECT Id_Factu,Numero_Factu
				FROM tab_facturas 
				WHERE Activo_Factu = '1'
				AND Id_OC_Factu =".$Id_OC;
		$res = seleccion($sql);

		// es de agregar
		/*if($tipo  =='1'){
			$nombre_campo = "Id_Factu_Act";
		}elseif($tipo=='2'){
			$nombre_campo = "bs_Numero_Factu";
		}*/
	
	?>
        <?php
			if($res[0]['Id_Factu'] != ''){
		?>
		
				<select name="Id_Factu_Act" id="Id_Factu_Act">
				
				
				>
					<option value="0"><?=$texto['Seleccione']?></option>
					<?php
					for($i=0;$i<count($res);$i++){
					?>
					
					<option value="<?=$res[$i]["Id_Factu"]?>"><?=$res[$i]["Numero_Factu"]?></option>
					<?php
					}
					?>
				</select>
		
        <?php }else{ ?>
		
				<select name="Id_Factu_Act" id="Id_Factu_Act" disabled="disabled">
					<option value="0"><?=$texto['Seleccione']?></option>
				</select>

        <?php } ?>
	
