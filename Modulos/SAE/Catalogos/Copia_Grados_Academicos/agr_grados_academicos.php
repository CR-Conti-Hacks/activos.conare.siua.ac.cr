<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/*************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	
	
?>

    <!-- ****************************************************************************************** -->
    <!-- ********************************   TITULO     ******************************************** -->
    <!-- ****************************************************************************************** -->
    <div id="Titulo_Adentro">
        <span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Agregar_Grado_Academico'] ?></span>
    </div>
    <br />
    <br />

    <!-- ****************************************************************************************** -->
    <!-- **************************       FORM         ******************************************** -->
    <!-- ****************************************************************************************** -->
	<table class="centrado width650" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?></th></tr>
		<tr>
			<td><?=$texto['Nombre_Grado_Academico']?></td>
			<td>
				<input type="text" name="txt_nombre" id="txt_nombre" maxlength="200" onKeyPress="return GA_ENTER_soloTexto(event)"  />
			</td>
        
		</tr>
		<tr>
			<td><?=$texto['Diminutivo_Grado_Academico']?></td>
			<td>
				<input type="text" name="txt_diminutivo" id="txt_diminutivo" maxlength="45" onKeyPress="return GA_ENTER_soloTexto(event)"  />
			</td>
        
		</tr>
	</table>
    
    <!-- ****************************************************************************************** -->
    <!-- **************************       BOTONES      ******************************************** -->
    <!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="agregarGA()" ><?=$texto['Guardar']?></button>
		<?php if(in_array("1006",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php',
													   'bs_nom_per;or_nom_per;or_nom_per_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_per').value+';'+
													   document.getElementById('or_nom_per').value+';'+
													   document.getElementById('or_nom_per_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>
    

    <!-- ****************************************************************************************** -->
    <!-- **************************     SCRIPT         ******************************************** -->
    <!-- ****************************************************************************************** -->
    <script>
            <?php if($mostrar_efecto==1) { ?>
				$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
			<?php }?>
		
            document.getElementById('txt_nombre').focus();
    </script>