<?php
/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
/*************************************************************************/

	/****************************PARAMETROS  ***********************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
	$or_nom_cm 		= (isset($_GET['or_nom_cm'])) ? $_GET['or_nom_cm'] : '';
	$or_nom_cm_tipo 	= (isset($_GET['or_nom_cm_tipo'])) ? $_GET['or_nom_cm_tipo'] : 'ASC';
	$bs_nom_cm			= (isset($_GET['bs_nom_cm'])) ? $_GET['bs_nom_cm'] : '';
	
	/***************************************************************************/
	
	/**************************SQL********************************/
	//Para validar que no ingrese permisos si ya existen
	
	$sql ="SELECT Permiso_Inicial_Cont_Mod, Permiso_Final_Cont_Mod FROM tab_control_modulos";
	$res = seleccion($sql);
	$permisosIniciales=array();
	$permisosFinales=array();
	for($i=0;$i<count($res);$i++){
		//Guarda en dos array los permisos iniciales y los permisos finales
		$permisosIniciales[$i]=$res[$i]['Permiso_Inicial_Cont_Mod'];
		$permisosFinales[$i]=$res[$i]['Permiso_Final_Cont_Mod'];
	}
	
?>

<!-- ****************************************************************************************** -->
<!-- ********************************   TITULO     ******************************************** -->
<!-- ****************************************************************************************** -->
<div id="Titulo_Adentro">
	<span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Agregar_Control_Modulo'] ?></span>
</div>
<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden" id="bs_nom_cm" name="bs_nom_cm" value="<?=$bs_nom_cm?>" />
<input type="hidden" id="or_nom_cm" name="or_nom_cm" value="<?=$or_nom_cm?>" />
<input type="hidden" id="or_nom_cm_tipo" name="or_nom_cm_tipo" value="<?=$or_nom_cm_tipo?>" />


<!-- ****************************************************************************************** -->
<!-- **************************       FORM         ******************************************** -->
<!-- ****************************************************************************************** -->
	<table class="centrado width500" >
		<tr><th colspan="2" class="centrado"><?=$texto['Por_Favor_Complete']?> </th></tr>
		<tr>
			<td><?=$texto['Nombre_Control_Modulo']?>: </td>
			<td>
				<input type="text" name="txt_nombre_CM" id="txt_nombre_CM"  maxlength="200" onKeyPress="return ENTER_soloTexto(event,'agregarCM()')" placeholder="<?=$texto['PLACEHOLDER_Digite_Nombre']?>"  />
			</td>
		</tr>
		<tr>
			<td><?=$texto['Descripcion_Control_Modulo']?>: </td>
			<td class="centrado">
				<input readonly type=text name="txt_tam_CM" id="txt_tam_CM" size=3 maxlength=3 value="250" class="width50 gris">
				<br />
				<textarea id="txt_desc_CM" name="txt_desc_CM" class="textArea300"
				onKeyDown="validaCantidadTexArea('txt_desc_CM','txt_tam_CM',250);"
				onKeyUp="validaCantidadTexArea('txt_desc_CM','txt_tam_CM',250);"
				placeholder="<?=$texto['PLACEHOLDER_Digite_Descripcion'] ?>"
				onKeyPress="return ENTER_soloTexto(event,'agregarCM()')"></textarea>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Permiso_Inicial_Control_Modulo']?>: </td>
			<td>
				<input type="text" name="txt_inicial_CM" id="txt_inicial_CM" maxlength="7" class="width40P" onKeyPress="return ENTER_soloNumeros(event,'agregarCM()')"  placeholder="<?=$texto['PLACEHOLDER_Digite_Permiso_Inicial'] ?>"/>
			</td>
		</tr>
		<tr>
			<td><?=$texto['Permiso_Final_Control_Modulo']?>: </td>
			<td>
				<input type="text" name="txt_final_CM" id="txt_final_CM" maxlength="7" class="width40P" onKeyPress="return ENTER_soloNumeros(event,'agregarCM()')" placeholder="<?=$texto['PLACEHOLDER_Digite_Permiso_Final'] ?>"  />
			</td>
		</tr>
	</table>
	
<!-- ****************************************************************************************** -->
<!-- **************************       BOTONES      ******************************************** -->
<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
		<button class="boton" onclick="validarPermisos();" ><?=$texto['Guardar']?></button>
		<?php if(in_array("1082",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/SAE/Control_Modulos/con_control_modulo.php',
													   'bs_nom_cm;or_nom_cm;or_nom_cm_tipo;mostrar_efecto;',
													   document.getElementById('bs_nom_cm').value+';'+
													   document.getElementById('or_nom_cm').value+';'+
													   document.getElementById('or_nom_cm_tipo').value+';1;')" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>	
	
	<br />
	<br />
	<br />

<!-- ****************************************************************************************** -->
<!-- **************************     SCRIPT         ******************************************** -->
<!-- ****************************************************************************************** -->
<script>
		<?php if($mostrar_efecto==1) { ?>
			$(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
		<?php }?>
		
		$('#txt_nombre_CM').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Nombre_Control_Modulo']?>"
		  });
		
		$('#txt_desc_CM').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_Descripcion_Control_Modulo']?>"
		  });
		$('#txt_inicial_CM').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_PInicial_Control_Modulo']?>"
		  });
		$('#txt_final_CM').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "<?=$texto['AYUDA_PFinal_Control_Modulo']?>"
		  });
		
		/********************************************************************************/
		//Función para validar que el usuario no ingrese permisos en un rango ya existente
		//Retorna true si el rango ingresado por el usuario es aceptado
		//Retorna false si ya existe un módulo con los rangos ingresados por el usuario
		//onclick="validarPermisos()"
		
		function validarPermisos() {
			//Obtiene los arrays creados en código PHP
			var arrayPerInicial=<?php echo json_encode($permisosIniciales);?>;
			var arrayPerFinal=<?php echo json_encode($permisosFinales);?>;
			
			//Obtiene el rango inicial ingresado por el usuario
			var txtInicial=parseInt(document.getElementById('txt_inicial_CM').value);
			
			for(var i=0;i<arrayPerFinal.length-1;i++){
				
				//Obtiene los primeros elementos de cada array (Inicial y Final) 1000-2000
				var elementoInicial=parseInt(arrayPerInicial[i]);//Ejemplo 1000
				var elementoFinal=parseInt(arrayPerFinal[i]);//Ejemplo 2000
				
				//Recorre el rango de permisos que hay en cada módulo Ejemplo 1000, 1001,1002,...,2000
				for(var j=elementoInicial;j<=elementoFinal;j=j+1){
					
					//Si existe un permiso que está dentro del rango ingresado por el usuario
					if (j===txtInicial){
						
						$(this).notifyMe(
                              'top', //Bottom/top/left/ right
                              'error', //error/info/success/default
                              texto['Error']+':', //titulo
                              texto['ERROR_Rango_Permisos'], //texto
                              200, //velocidad
                              2500 //tiempo
                          );
						return false;
					}
			    }
			}
			//Si los rangos de permisos están correctos, agrega el módulo al sistema
			agregarCM();
			return true;
		}
		document.getElementById('txt_nombre_CM').focus();
</script>