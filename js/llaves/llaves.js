/**********************************************************/
/****************** validarTipTel    **********************/
//Se encarga de validar los datos necesarios de una llave
//Retorna:
//false = hay error
//true = todo esta correcto
/**********************************************************/
function validarLlave(){
     

    if (Valida_FOTO('Foto_lla')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar una fotografía', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }else if(Valida_TXT('txt_nombre_lla')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el nombre de la llave', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }else if(Valida_TXT('txt_descripcion_lla')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar la descripción de la llave', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }else if(Valida_TXT('txt_espacio_lla')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el espacio en el casillero de la llave', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }
    return true;
}





function agregarLlave() {
    if (validarLlave()) {
        
       
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        
        var formData = new FormData();
        
        
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.getElementById('cedula_global').value;
        var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
        var Key_Usu = document.getElementById('Key_Usu').value;
        
        formData.append("cedula_global", cedula_global);
        formData.append("Id_Per_Usu", Id_Per_Usu);
        formData.append("Key_Usu", Key_Usu);
        
        
            
        /***************************************************/
        /*** Datos de busqueda y ordenamiento   ************/
        /***************************************************/
        /*var bs_nom_compromiso = document.getElementById('bs_nom_compromiso').value;
        var or_nom_compromiso = document.getElementById('or_nom_compromiso').value;
        var or_nom_compromiso_tipo = document.getElementById('or_nom_compromiso_tipo').value;
        */
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var archivo=$('#Foto_lla')[0].files[0];
        formData.append("Foto_lla", archivo);
            
        var txt_nombre_lla = document.getElementById('txt_nombre_lla').value;
        var txt_descripcion_lla = document.getElementById('txt_descripcion_lla').value;
        var txt_espacio_lla = document.getElementById('txt_espacio_lla').value;
        
        formData.append("txt_nombre_lla", txt_nombre_lla);
        formData.append("txt_descripcion_lla", txt_descripcion_lla);
        formData.append("txt_espacio_lla", txt_espacio_lla);
        
       
        /***************************************************/
        /*********       Llamada AJAX ASINCRONA       *******/
        /***************************************************/
         $.ajax({
                url: "Modulos/Llaves/llaves/ajax_agr_llaves.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
             .done(function(res){
                    alert(res)
                if (res==1) {
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Exito']+':', //titulo
                        "La llave se ha agregado correctamente", //texto
                        200, //velocidad
                        4500 //tiempo
                    );

                
                }else{
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        "ha ocurrido un error, intentelo más tarde", //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                }
                
                /*CargaPaginaMenu('Modulos/Llaves/llaves/con_llaves.php',
													   'mostrar_efecto;'+
													   'bs_Id_Act;'+
													   'bs_Id_Zona_tmp_Act;'+
													   'bs_Id_INS_Act;'+
													   'bs_Id_UGIT_Act;'+
													   'bs_Numero_Factu;'+
													   'bs_Numero_OC;'+
													   'bs_Numero_Prove;'+
													   'bs_Id_Uni_Act;'+
													   'bs_Fecha_Recepcion_Act;'+
													   'bs_Nombre_Act;'+
													   'bs_Desecho_Act;'+
													   'bs_Donacion_Act;'+
													   'bs_Verificado_Act;'+
													   'bs_Numero_Serie_Act;'+
													   'bs_Marca_Act;'+
													   'bs_Modelo_Act;'+
													   'bs_Color_Act;'+
                                                       'bs_anno;'+
                                                       'bs_Mantenimiento_Act;'+
													   'or_Id_Act;'+
													   'or_tipo_Id_Act;'+
													   'or_Nombre_Act;'+
													   'or_tipo_Nombre_Act;'+
													   'or_Marca_Act;'+
													   'or_tipo_or_Marca_Act;'+
													   'or_Numero_Serie_Act;'+
													   'or_tipo_Numero_Serie_Act;'+
													   'or_Nombre_Uni;'+
													   'or_tipo_Nombre_Uni;'+
													   'or_Id_INS_Act;'+
													   'or_tipo_Id_INS_Act;'+
													   'or_Id_UGIT_Act;'+
													   'or_tipo_Id_UGIT;'+
													   'or_Nombre_Zonas_tmp;'+
													   'or_tipo_Nombre_Zonas_tmp;',
													   '1;'+
													   document.getElementById('bs_Id_Act').value+';'+
													   document.getElementById('bs_Id_Zona_tmp_Act').value+';'+
													   document.getElementById('bs_Id_INS_Act').value+';'+
													   document.getElementById('bs_Id_UGIT_Act').value+';'+
													   document.getElementById('bs_Numero_Factu').value+';'+
													   document.getElementById('bs_Numero_OC').value+';'+
													   document.getElementById('bs_Numero_Prove').value+';'+
													   document.getElementById('bs_Id_Uni_Act').value+';'+
													   document.getElementById('bs_Fecha_Recepcion_Act').value+';'+
													   document.getElementById('bs_Nombre_Act').value+';'+
													   document.getElementById('bs_Desecho_Act').value+';'+
													   document.getElementById('bs_Donacion_Act').value+';'+
													   document.getElementById('bs_Verificado_Act').value+';'+
													   document.getElementById('bs_Numero_Serie_Act').value+';'+
													   document.getElementById('bs_Marca_Act').value+';'+
													   document.getElementById('bs_Modelo_Act').value+';'+
													   document.getElementById('bs_Color_Act').value+';'+
                                                       document.getElementById('bs_anno').value+';'+
                                                       document.getElementById('bs_Mantenimiento_Act').value+';'+
													   document.getElementById('or_Id_Act').value+';'+
													   document.getElementById('or_tipo_Id_Act').value+';'+
													   document.getElementById('or_Nombre_Act').value+';'+
													   document.getElementById('or_tipo_Nombre_Act').value+';'+
													   document.getElementById('or_Marca_Act').value+';'+
													   document.getElementById('or_tipo_or_Marca_Act').value+';'+
													   document.getElementById('or_Numero_Serie_Act').value+';'+
													   document.getElementById('or_tipo_Numero_Serie_Act').value+';'+
													   document.getElementById('or_Nombre_Uni').value+';'+
													   document.getElementById('or_tipo_Nombre_Uni').value+';'+
													   document.getElementById('or_Id_INS_Act').value+';'+
													   document.getElementById('or_tipo_Id_INS_Act').value+';'+
													   document.getElementById('or_Id_UGIT_Act').value+';'+
													   document.getElementById('or_tipo_Id_UGIT').value+';'+
													   document.getElementById('or_Nombre_Zonas_tmp').value+';'+
													   document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';');
													   
				*/
            });
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
        
    }
}
