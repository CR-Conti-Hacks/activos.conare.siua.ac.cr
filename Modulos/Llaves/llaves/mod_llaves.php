<?php
   /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /****************************PARAMETROS  ***********************************/
	$Id_Compr      				= (isset($_GET['Id_Compr'])) ? $_GET['Id_Compr'] : '';
	$pagina 					= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 					= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_compromiso			= (isset($_GET['bs_nom_compromiso'])) ? $_GET['bs_nom_compromiso'] : '';
	$or_nom_compromiso			= (isset($_GET['or_nom_compromiso'])) ? $_GET['or_nom_compromiso'] : '';
	$or_nom_compromiso_tipo		= (isset($_GET['or_nom_compromiso_tipo'])) ? $_GET['or_nom_compromiso_tipo'] : '';
	/***************************************************************************/

    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Compr, Numero_Compr FROM tab_compromisos WHERE Id_Compr = ".$Id_Compr;
    $res = seleccion($sql);
    
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Compr" name="Id_Compr" value="<?= $Id_Compr?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_compromiso" name="bs_nom_compromiso" value="<?=$bs_nom_compromiso?>" />
    <input type="hidden" id="or_nom_compromiso" name="or_nom_compromiso" value="<?=$or_nom_compromiso?>" />
    <input type="hidden" id="or_nom_compromiso_tipo" name="or_nom_compromiso_tipo" value="<?=$or_nom_compromiso_tipo?>" />
    
    <!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Modificar Compromiso</h3>
	<br />
	<br />
	<div>
    
        <!-- ****************************************************************************************** -->
        <!-- **************************       FORM         ******************************************** -->
        <!-- ****************************************************************************************** -->
        <table class="centrado width100P" >
            <tr>
                <td>Número compromiso</td>
                <td>
                    <input type="text" name="txt_compromiso" id="txt_compromiso" maxlength="100" onkeypress="ENTER(event,'modificarCompromiso()')"  value="<?=$res[0]['Numero_Compr']?>"  placeholder="Digite el nombre..." />
                </td>
            </tr>
        </table>
        <!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="modificarCompromiso()" ><?=$texto['Guardar']?></button>
			<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
		</div>
	</div>
<script>
	document.getElementById('txt_compromiso').focus();
	$('#txt_compromiso').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre"
		});
</script>
