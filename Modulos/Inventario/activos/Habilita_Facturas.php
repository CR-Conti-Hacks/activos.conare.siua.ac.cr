	<?php
	
		/***************************************************************************/
		/****************************   PATH   *************************************/
	    /***************************************************************************/
		$path='../../../';

		/***************************************************************************/
		/**************************  SEGURIDAD *************************************/
	    /***************************************************************************/
		include($path."Seguridad_Interfaz_GET.php");
		

		/***************************************************************************/
		/*************************  PARAMETROS    **********************************/
	    /***************************************************************************/
		$Id_OC					= (isset($_GET['Id_OC'])) ? $_GET['Id_OC'] : '0';
		

		/***************************************************************************/
		/*************************      SQL       **********************************/
	    /***************************************************************************/
		$sql="SELECT Id_Factu,Numero_Factu
				FROM tab_facturas 
				WHERE Activo_Factu = '1'
				AND Id_OC_Factu =".$Id_OC;
		$res = seleccion($sql);

		
		/***************************************************************************/
		/*************************   CÓDIGO       **********************************/
	    /***************************************************************************/
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
	
