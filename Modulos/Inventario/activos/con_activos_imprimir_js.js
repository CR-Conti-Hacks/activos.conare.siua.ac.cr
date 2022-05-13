/***********************************************************************************/
/***************************   DOCUMENT READY    ***********************************/
/***********************************************************************************/
$(document).ready(function() {
	
	/***********************************************************/
	/****************** DRAG AND DROP **************************/
	/***********************************************************/	
	$('#tabla_campos tbody').sortable({
	  handle: 'span'
	});

	setTimeout(quitaPreloader, 500);
	

});
/***********************************************************************************/
/***********************************************************************************/
/***********************************************************************************/

function quitaPreloader(){
	document.querySelector("#preloader").style.display = "none";
}


/********************************************************************/
/******************** Función getParametros *************************/
/********************************************************************/
function getParametros (){
    var parametros =    

    					//SAE
    					'&Id_Per_Usu='+document.getElementById('Id_Per_Usu').value+
    					'&cedula_global='+document.getElementById('cedula_global').value+
    					'&Key_Usu='+document.getElementById('Key_Usu').value+

                        //Datos Activo 
                        '&bs_Id_Act='+document.getElementById('bs_Id_Act').value+
                        '&bs_Nombre_Act='+document.getElementById('bs_Nombre_Act').value+
                        '&bs_Marca_Act='+document.getElementById('bs_Marca_Act').value+
                        '&bs_Modelo_Act='+document.getElementById('bs_Modelo_Act').value+
                        '&bs_Color_Act='+document.getElementById('bs_Color_Act').value+
                        '&bs_Numero_Serie_Act='+document.getElementById('bs_Numero_Serie_Act').value+
           

                        //Identificadores de Activo
                        '&bs_Id_INS_Act='+document.getElementById('bs_Id_INS_Act').value+
                        '&bs_Id_Uni_Act='+document.getElementById('bs_Id_Uni_Act').value+

                        //Activo Fijo
                        '&bs_Activo_Fijo_Ac='+document.getElementById('bs_Activo_Fijo_Act').value+
                        '&bs_No_Activo_Fijo_Act='+document.getElementById('bs_No_Activo_Fijo_Act').value+


                        //Fecha y año Recepción
                        '&bs_Fecha_Recepcion_Act='+document.getElementById('bs_Fecha_Recepcion_Act').value+
                        '&bs_anno_inicio='+document.getElementById('bs_anno_inicio').value+
                        '&bs_anno_fin='+document.getElementById('bs_anno_fin').value+
                        

                        //Datos de compra
                        '&bs_Numero_OC='+document.getElementById('bs_Numero_OC').value+
                        '&bs_Numero_Factu='+document.getElementById('bs_Numero_Factu').value+
                        '&bs_Numero_Prove='+document.getElementById('bs_Numero_Prove').value+
                        '&bs_Id_Compromiso='+document.getElementById('bs_Id_Compromiso').value+
                        '&bs_Id_Partida='+document.getElementById('bs_Id_Partida').value+
                        '&bs_Id_Transferencia='+document.getElementById('bs_Id_Transferencia').value+

                        //Ubicación
                        '&bs_Id_Zona_tmp_Act='+document.getElementById('bs_Id_Zona_tmp_Act').value+

                        //CONARE: Responsables
                        '&bs_Id_Res='+document.getElementById('bs_Id_Res').value+
                        '&bs_Id_Cus='+document.getElementById('bs_Id_Cus').value+

                
                        //Estados
                        '&bs_Desecho_Act='+document.getElementById('bs_Desecho_Act').value+
                        '&bs_Donacion_Act='+document.getElementById('bs_Donacion_Act').value+
                        '&bs_Mantenimiento_Act='+document.getElementById('bs_Mantenimiento_Act').value+


                
                
                

                        //Verificación
                        '&bs_Verificado_Act='+document.getElementById('bs_Verificado_Act').value+
                        '&bs_No_Verificado_Act='+document.getElementById('bs_No_Verificado_Act').value+

                        
                        '&or_Id_Act='+document.getElementById('or_Id_Act').value+
                        '&or_tipo_Id_Act='+document.getElementById('or_tipo_Id_Act').value+

                        '&or_Nombre_Act='+document.getElementById('or_Nombre_Act').value+
                        '&or_tipo_Nombre_Act='+document.getElementById('or_tipo_Nombre_Act').value+

                        '&or_Marca_Act='+document.getElementById('or_Marca_Act').value+
                        '&or_tipo_or_Marca_Act='+document.getElementById('or_tipo_or_Marca_Act').value+

                        '&or_Numero_Serie_Act='+document.getElementById('or_Numero_Serie_Act').value+
                        '&or_tipo_Numero_Serie_Act='+document.getElementById('or_tipo_Numero_Serie_Act').value+

                        '&or_Nombre_Uni='+document.getElementById('or_Nombre_Uni').value+
                        '&or_tipo_Nombre_Uni='+document.getElementById('or_tipo_Nombre_Uni').value+

                        '&or_Id_INS_Act='+document.getElementById('or_Id_INS_Act').value+
                        '&or_tipo_Id_INS_Act='+document.getElementById('or_tipo_Id_INS_Act').value+

                        '&or_Nombre_Zonas_tmp='+document.getElementById('or_Nombre_Zonas_tmp').value+
                        '&or_tipo_Nombre_Zonas_tmp='+document.getElementById('or_tipo_Nombre_Zonas_tmp').value+

                        '&or_Activo_Fijo_Act='+document.getElementById('or_Activo_Fijo_Act').value+
                        '&or_tipo_Activo_Fijo_Act='+document.getElementById('or_tipo_Activo_Fijo_Act').value+';';


                
               
return parametros;
}



/***********************************************************************************/
/*******************      FUNCIÓN MUESTRA-OCULTA-CONFIG     ************************/
/***********************************************************************************/
function muestraOcultaConfiguracion(objeto){

  var actual = document.getElementById(objeto).style.display; 
  if(actual == 'none'){
    document.getElementById(objeto).style.display = 'block';
  }else if(actual == 'block'){
    document.getElementById(objeto).style.display = 'none';
  }
}


/***********************************************************************************/
/*******************           FUNCIÓN RECARGAR             ************************/
/***********************************************************************************/
function recargar(){

  //************************************************************
  //obtener campos
  //************************************************************
  var campos = document.querySelectorAll('input[name="campos"]');
  var lista_campos = "";
  campos.forEach((campo) => {
    lista_campos += campo.value+";";
  });

  

  //************************************************************
  //obtener Mostrar/Ocultar
  //************************************************************
  var mostrados = document.querySelectorAll('input[name="mostrar"]');
  var lista_mostrar = "";
  mostrados.forEach((campo) => {
    if (campo.checked == true){
      lista_mostrar += "1;";  
    } else {
      lista_mostrar += "0;";  
    }
    
  });  

  //************************************************************
  // Obtener criterios de busqueda
  //************************************************************
  var parametros = getParametros();
  console.log(parametros)

  window.location.href = "con_activos_imprimir.php?&campos="+lista_campos+"&mostrar="+lista_mostrar+parametros;
}

/***********************************************************************************/
/*******************           FUNCIÓN IMPRIMIR             ************************/
/***********************************************************************************/
function imprimirReporteExcel(){
	$('#tabla_activos').tableExport({
			type : 'excel',	
			fileName: 'SAE_Reporte_Activos',
			mimeType: "application/vnd.ms-excel"	
	});	
}


function imprimirReportePDF(){
	$('#tabla_activos').tableExport({
			type : 'pdf',	
			fileName: 'SAE_Reporte_Activos',	
			jspdf: {
					format: 'letter',
					orientation: 'l',
					margins: {left:10, right:10, top:20, bottom:20},
					autotable: false
                   }
			
	});	
}


