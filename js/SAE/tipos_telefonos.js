/**********************************************************/
/****************** validarTipTel    **********************/
//Se encarga de validar los datos necesarios de un tipo de telefono
//Retorna:
//false = hay error
//true = todo esta correcto
//recibe:
//tipo==1 agregar
//tipo==2 modificar
/**********************************************************/
function validarTipTel(){
     
    if (Valida_TXT('txt_tipo_tele')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Digitar_Nombre_Tipo_Telefono'], //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }
    return true;
}





function agregarTipTel() {
    if (validarTipTel()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Catalogos/Tipos_Telefonos/ajax_agr_tipos_telefonos.php';
        
        
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.getElementById('cedula_global').value;
        var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
        var Key_Usu = document.getElementById('Key_Usu').value;
        var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
        var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        /***************************************************/
        /*** Datos de busqueda y ordenamiento   ************/
        /***************************************************/
        var bs_nom_tip_tel = document.getElementById('bs_nom_tip_tel').value;
        var or_nom_TipoTele = document.getElementById('or_nom_TipoTele').value;
        var or_nom_TipoTele_tipo = document.getElementById('or_nom_TipoTele_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var txt_tipo_tele = document.getElementById('txt_tipo_tele').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'txt_tipo_tele;';
        valores += txt_tipo_tele+';';
        
        /***************************************************/
        /*********     Creamos la query string       *******/
        /***************************************************/
        var query_string = creaQueryString(parametros,valores);
        
        
        /***************************************************/
        /*********       Llamada AJAX ASINCRONA       *******/
        /***************************************************/
        miAjax.open('GET',pagina+'?'+query_string,true);

        miAjax.onreadystatechange=function() {
            if (miAjax.readyState==ESTADO_COMPLETO){
                if(miAjax.status==200){
                    
                    //Declaramos la variable que va almacenar los script
                    var scs=miAjax.responseText.extractScript();
            
                    var respuesta = miAjax.responseText.trim();
                    //El dato se actualizao correctamente
                    if (respuesta=='1') {
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'success', //error/info/success/default
                            texto['Exito']+':', //titulo
                            texto['EXITO_Agregar_Tipo_Telefono'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Agregar_Tipo_Telefono'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php','bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;',bs_nom_tip_tel+';'+or_nom_TipoTele+';'+or_nom_TipoTele_tipo+';')
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
        
    }
}

function modificarTipTel() {
    if (validarTipTel()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Catalogos/Tipos_Telefonos/ajax_mod_tipos_telefonos.php';
        
        
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.getElementById('cedula_global').value;
        var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
        var Key_Usu = document.getElementById('Key_Usu').value;
        var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
        var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        /***************************************************/
        /*** Datos de busqueda y ordenamiento   ************/
        /***************************************************/
        var bs_nom_tip_tel = document.getElementById('bs_nom_tip_tel').value;
        var or_nom_TipoTele = document.getElementById('or_nom_TipoTele').value;
        var or_nom_TipoTele_tipo = document.getElementById('or_nom_TipoTele_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Tip_Tel = document.getElementById('Id_Tip_Tel').value;
        var txt_tipo_tele = document.getElementById('txt_tipo_tele').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Tip_Tel;txt_tipo_tele;';
        valores += Id_Tip_Tel+';'+txt_tipo_tele+';';
        
        /***************************************************/
        /*********     Creamos la query string       *******/
        /***************************************************/
        var query_string = creaQueryString(parametros,valores);
        
        
        /***************************************************/
        /*********       Llamada AJAX ASINCRONA       *******/
        /***************************************************/
        miAjax.open('GET',pagina+'?'+query_string,true);

        miAjax.onreadystatechange=function() {
            if (miAjax.readyState==ESTADO_COMPLETO){
                if(miAjax.status==200){
                    
                    //Declaramos la variable que va almacenar los script
                    var scs=miAjax.responseText.extractScript();
            
                    var respuesta = miAjax.responseText.trim();

                    //El dato se actualizao correctamente
                    if (respuesta=='1') {
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'success', //error/info/success/default
                            texto['Exito']+':', //titulo
                            texto['EXITO_Modificar_Tipo_Telefono'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Modificar_Tipo_Telefono'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php','bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;',bs_nom_tip_tel+';'+or_nom_TipoTele+';'+or_nom_TipoTele_tipo+';')
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
        
    }
}


function eliminarTipTel() {
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Catalogos/Tipos_Telefonos/ajax_eli_tipos_telefonos.php';
        
        
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.getElementById('cedula_global').value;
        var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
        var Key_Usu = document.getElementById('Key_Usu').value;
        var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
        var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        /***************************************************/
        /*** Datos de busqueda y ordenamiento   ************/
        /***************************************************/
        var bs_nom_tip_tel = document.getElementById('bs_nom_tip_tel').value;
        var or_nom_TipoTele = document.getElementById('or_nom_TipoTele').value;
        var or_nom_TipoTele_tipo = document.getElementById('or_nom_TipoTele_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Tip_Tel = document.getElementById('Id_Tip_Tel').value;

        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Tip_Tel;';
        valores += Id_Tip_Tel+';';
        
        /***************************************************/
        /*********     Creamos la query string       *******/
        /***************************************************/
        var query_string = creaQueryString(parametros,valores);
        
        
        /***************************************************/
        /*********       Llamada AJAX ASINCRONA       *******/
        /***************************************************/
        miAjax.open('GET',pagina+'?'+query_string,true);

        miAjax.onreadystatechange=function() {
            if (miAjax.readyState==ESTADO_COMPLETO){
                if(miAjax.status==200){
                    
                    //Declaramos la variable que va almacenar los script
                    var scs=miAjax.responseText.extractScript();
            
                    var respuesta = miAjax.responseText.trim();
                    //El dato se actualizao correctamente
                    if (respuesta=='1') {
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'success', //error/info/success/default
                            texto['Exito']+':', //titulo
                            texto['EXITO_Eliminar_Tipo_Telefono'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Eliminar_Tipo_Telefono'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php','bs_nom_tip_tel;or_nom_TipoTele;or_nom_TipoTele_tipo;',bs_nom_tip_tel+';'+or_nom_TipoTele+';'+or_nom_TipoTele_tipo+';')
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}