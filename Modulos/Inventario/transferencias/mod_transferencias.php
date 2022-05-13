<?php
   /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /****************************PARAMETROS  ***********************************/
	$Id_Trans      					= (isset($_GET['Id_Trans'])) ? $_GET['Id_Trans'] : '';
	$pagina 						= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 						= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_transferencia			= (isset($_GET['bs_nom_transferencia'])) ? $_GET['bs_nom_transferencia'] : '';
	$or_nom_transferencia			= (isset($_GET['or_nom_transferencia'])) ? $_GET['or_nom_transferencia'] : '';
	$or_nom_transferencia_tipo		= (isset($_GET['or_nom_transferencia_tipo'])) ? $_GET['or_nom_transferencia_tipo'] : '';
	/***************************************************************************/

    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Trans, Numero_Trans FROM tab_transferencias WHERE Id_Trans = ".$Id_Trans;
    $res = seleccion($sql);
    
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Trans" name="Id_Trans" value="<?= $Id_Trans?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_transferencia" name="bs_nom_transferencia" value="<?=$bs_nom_transferencia?>" />
    <input type="hidden" id="or_nom_transferencia" name="or_nom_transferencia" value="<?=$or_nom_transferencia?>" />
    <input type="hidden" id="or_nom_transferencia_tipo" name="or_nom_transferencia_tipo" value="<?=$or_nom_transferencia_tipo?>" />
    
    <!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Modificar Transferencia</h3>
	<br />
	<br />
	<div>
    
        <!-- ****************************************************************************************** -->
        <!-- **************************       FORM         ******************************************** -->
        <!-- ****************************************************************************************** -->
        <table class="centrado width100P" >
            <tr>
                <td>Nombre</td>
                <td>
                    <input type="text" name="txt_transferencia" id="txt_transferencia" maxlength="100" onkeypress="ENTER(event,'modificarTransferencia()')"  value="<?=$res[0]['Numero_Trans']?>"  placeholder="Digite el número de transferencia..." />
                </td>
            </tr>
        </table>
        <!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="modificarTransferencia()" ><?=$texto['Guardar']?></button>
			<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
		</div>
	</div>
<script>
	document.getElementById('txt_transferencia').focus();
	$('#txt_transferencia').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de transferencia"
		});
</script>
