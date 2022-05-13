<!DOCTYPE html>
<html lang="es">
  <head>
   <?php 
      include("header.php");
    ?>
    <?php
	    $colorEnlaceFooterUgit = "anaranjado";
    ?>
  </head>
  <body id="top">
  <?php 
  	/****************************SEGURIDAD ***********************************/
	$path = '../';
	include($path."Include/Bd/bd.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************ PASO1: Consultar BD ******************************/
	/***************************************************************************/

	$sql ="SELECT Id_SAE_TI, Nombre_SAE_TI, Cantidad_Caracteres_SAE_TI, Formato_SAE_TI, Placeholder_SAE_TI FROM tab_sae_tipos_identificaciones WHERE Activo_SAE_TI ='1'";
    $res_TI = seleccion($sql);


  ?>
  <script>
  		/***************************************************************************/
		/******************** PASO2: Crear variable global *************************/
		/***************************************************************************/
		var sae_tipo_identificaciones = [

		<?php
			if(count($res_TI)>0){
				for($i=0;$i<count($res_TI);$i++){
		?>
			{
				nombre:"<?= $res_TI[$i]['Nombre_SAE_TI'] ?>" ,
				id:"<?= $res_TI[$i]['Id_SAE_TI']?>",
				cantidad_caracteres:"<?= $res_TI[$i]['Cantidad_Caracteres_SAE_TI']?>",
				formato: "<?= $res_TI[$i]['Formato_SAE_TI']?>",
				placeholder: "<?= $res_TI[$i]['Placeholder_SAE_TI']?>"
			},
			 
		<?php
			} // ciclo
			}//if
		?>

		];

		
	</script>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<?php 
     		include("menu.php");
     	?>

      <main class="mdl-layout__content">
        <div class="site-content" id="contenedor">


        	<div class="mdl-grid site-max-width">
            	<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
		            <div class="mdl-card__title">
		            	<h1 class="mdl-card__title-text">Debe ingresar al sistema</h1>
		            </div>
              		<div class="mdl-card__media">
              			<img class="article-image" src="img/ingresar.jpg" border="0" alt="Contact">
              		</div>
              		<div class="mdl-grid site-copy">
                		<div class="mdl-cell mdl-cell--12-col">
                			<div class="mdl-card__supporting-text">
 								<form method="POST" class="form-contact" name="miForm" id="miForm">
 									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
 									<labe class="error" id="label_error"></label>
 									</div>	
  									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
  										<!-- ********************************************************************************************** -->
  										<!-- ******************************* PASO3: crear select ****************************************** -->
  										<!-- ********************************************************************************************** -->
							          	<select id="sel_tipo_identificacion_ingresar" name="sel_tipo_identificacion_ingresar">
									      	<?php
												if(count($res_TI)>0){
													for($i=0;$i<count($res_TI);$i++){
										
											?>
												<option value="<?= $res_TI[$i]['Id_SAE_TI'] ?>"><?= $res_TI[$i]['Nombre_SAE_TI'] ?></option>
											<?php
														}
													}else{
											?>
												<option value="0">No existen Tipo de Identificación</option>
											<?php
														
													}
											?>
									    </select>
							          
      								</div>
      								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      									<!-- ********************************************************************************************** -->
  										<!-- ******************************* PASO4: crear input  ****************************************** -->
  										<!-- ********************************************************************************************** -->
							          	<input class="mdl-textfield__input" type="text" id="txt_identificacion_ingresar" name="txt_identificacion_ingresar"  data-formato="<?= $res_TI[0]['Formato_SAE_TI'] ?>" title="<?= $res_TI[0]['Nombre_SAE_TI'] ?>" maxlength="<?= $res_TI[0]['Cantidad_Caracteres_SAE_TI'] ?>">
							          	<label class="mdl-textfield__label" for="txt_identificacion_ingresar" id="label_identificacion"><?= $res_TI[0]['Nombre_SAE_TI'] ?></label>
							      
      								</div>
								    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								        <input class="mdl-textfield__input" type="password" id="txt_clave" name="txt_clave">
								        <label class="mdl-textfield__label" for="txt_clave">Contraseña</label>
								    </div>
	      							<p style="margin: 0 auto; text-align: center;">
	          							<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="button" id="btn_ingresar">
	              							Ingresar
	          							</button>
	      							</p>
  								</form>
							</div>
						</div>
              		</div>
            	</div>
          	</div>
        </div>
        <?php 
        	include("footer.php");
        ?>
      </main>
      	
	    
      	<!-- ********************************************************************************************** -->
		<!-- ******************************* PASO5: incluir core ****************************************** -->
		<!-- ********************************************************************************************** -->
      	<script src="../js/EXTERNAS/jquery-3.1.1.js" defer></script>
      	<script src="scripts/funciones_core_sae.js" defer></script>


		<script src="scripts/material.min.js" defer></script>
	    <script src="scripts/prestamos.js" defer></script>
      	<script src="../js/SAE/validacion.js" defer></script>
      	<script src="../js/SAE/hex_md5.js" defer></script>

    </div>
  </body>
</html>