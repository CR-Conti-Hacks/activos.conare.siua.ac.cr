<?php
   /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /****************************PARAMETROS  ***********************************/
	$Id_Parti      			= (isset($_GET['Id_Parti'])) ? $_GET['Id_Parti'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_partida			= (isset($_GET['bs_nom_partida'])) ? $_GET['bs_nom_partida'] : '';
	$or_nom_partida			= (isset($_GET['or_nom_partida'])) ? $_GET['or_nom_partida'] : '';
	$or_nom_partida_tipo	= (isset($_GET['or_nom_partida_tipo'])) ? $_GET['or_nom_partida_tipo'] : '';
	/***************************************************************************/

    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Parti, Numero_Parti FROM tab_partidas WHERE Id_Parti = ".$Id_Parti;
    $res = seleccion($sql);
    
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Parti" name="Id_Parti" value="<?= $Id_Parti?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_partida" name="bs_nom_partida" value="<?=$bs_nom_partida?>" />
    <input type="hidden" id="or_nom_partida" name="or_nom_partida" value="<?=$or_nom_partida?>" />
    <input type="hidden" id="or_nom_partida_tipo" name="or_nom_partida_tipo" value="<?=$or_nom_partida_tipo?>" />
    
    <!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Modificar Partida</h3>
	<br />
	<br />
	<div>
    
        <!-- ****************************************************************************************** -->
        <!-- **************************       FORM         ******************************************** -->
        <!-- ****************************************************************************************** -->
        <table class="centrado width100P" >
            <tr>
                <td>Número partida</td>
                <td>
                    <input type="text" name="txt_partida" id="txt_partida" maxlength="100" onkeypress="ENTER(event,'modificarPartida()')"  value="<?=$res[0]['Numero_Parti']?>"  placeholder="Digite el número..." />
                </td>
            </tr>
        </table>
        <!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="modificarPartida()" ><?=$texto['Guardar']?></button>
			<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
		</div>
	</div>
<script>
	document.getElementById('txt_partida').focus();
	$('#txt_partida').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el número de la partida"
		});
</script>
