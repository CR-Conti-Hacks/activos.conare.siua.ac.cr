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
function validarOrden(){
     
    if (Valida_TXT('txt_ordene')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el número de la orden', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }else if (Valida_SELECT_0('anno')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar el año de la orden', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }
    return true;
}





function agregarOrden() {
    if (validarOrden()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/ordenes/ajax_agr_ordenes.php';
        
        
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
        var bs_num_orden            = document.getElementById('bs_num_orden').value;
        var bs_compromiso           = document.getElementById('bs_compromiso').value;
        var bs_partida              = document.getElementById('bs_partida').value;
        var bs_proveedor            = document.getElementById('bs_proveedor').value;
        var bs_fecha_orden          = document.getElementById('bs_fecha_orden').value;
        var bs_anno                 = document.getElementById('bs_anno').value;
        var or_num_orden            = document.getElementById('or_num_orden').value;
        var or_num_orden_tipo       = document.getElementById('or_num_orden_tipo').value;
        var or_nom_proveedor        = document.getElementById('or_nom_proveedor').value;
        var or_nom_proveedor_tipo   = document.getElementById('or_nom_proveedor_tipo').value;
        var or_num_partida          = document.getElementById('or_num_partida').value;
        var or_num_partida_tipo     = document.getElementById('or_num_partida_tipo').value;
        var or_num_compromiso       = document.getElementById('or_num_compromiso').value;
        var or_num_compromiso_tipo  = document.getElementById('or_num_compromiso_tipo').value;
        var or_fecha_orden          = document.getElementById('or_fecha_orden').value;
        var or_fecha_orden_tipo     = document.getElementById('or_fecha_orden_tipo').value;
        var or_anno                 = document.getElementById('or_anno').value;
        var or_anno_tipo            = document.getElementById('or_anno_tipo').value;
        

        
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var compromiso  = document.getElementById('compromiso').value;
        var partida     = document.getElementById('partida').value;
        var proveedor   = document.getElementById('proveedor').value;
        var txt_ordene  = document.getElementById('txt_ordene').value;
        var anno        = document.getElementById('anno').value;
        var fecha_orden = document.getElementById('fecha_orden').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'compromiso;partida;proveedor;txt_ordene;anno;fecha_orden;';
        valores += compromiso+';'+partida+';'+proveedor+';'+txt_ordene+';'+anno+';'+fecha_orden+';';
        
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
                            'La orden se ha agregado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error agregando la orden', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/ordenes/con_ordenes.php',
                                    'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
                                    'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
                                    'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
                                    bs_num_orden+';'+bs_compromiso+';'+bs_partida+';'+bs_proveedor+';'+bs_fecha_orden+';'+bs_anno+';'+
                                    or_num_orden+';'+or_num_orden_tipo+';'+or_nom_proveedor+';'+or_nom_proveedor_tipo+';'+or_num_partida+';'+or_num_partida_tipo+';'+
                                    or_num_compromiso+';'+or_num_compromiso_tipo+';'+or_fecha_orden+';'+or_fecha_orden_tipo+';'+or_anno+';'+or_anno_tipo+';')
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

function modificarOrden() {
    if (validarOrden()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/ordenes/ajax_mod_ordenes.php';
        
        
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
        var bs_num_orden            = document.getElementById('bs_num_orden').value;
        var bs_compromiso           = document.getElementById('bs_compromiso').value;
        var bs_partida              = document.getElementById('bs_partida').value;
        var bs_proveedor            = document.getElementById('bs_proveedor').value;
        var bs_fecha_orden          = document.getElementById('bs_fecha_orden').value;
        var bs_anno                 = document.getElementById('bs_anno').value;
        var or_num_orden            = document.getElementById('or_num_orden').value;
        var or_num_orden_tipo       = document.getElementById('or_num_orden_tipo').value;
        var or_nom_proveedor        = document.getElementById('or_nom_proveedor').value;
        var or_nom_proveedor_tipo   = document.getElementById('or_nom_proveedor_tipo').value;
        var or_num_partida          = document.getElementById('or_num_partida').value;
        var or_num_partida_tipo     = document.getElementById('or_num_partida_tipo').value;
        var or_num_compromiso       = document.getElementById('or_num_compromiso').value;
        var or_num_compromiso_tipo  = document.getElementById('or_num_compromiso_tipo').value;
        var or_fecha_orden          = document.getElementById('or_fecha_orden').value;
        var or_fecha_orden_tipo     = document.getElementById('or_fecha_orden_tipo').value;
        var or_anno                 = document.getElementById('or_anno').value;
        var or_anno_tipo            = document.getElementById('or_anno_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_OC       = document.getElementById('Id_OC').value;
        var compromiso  = document.getElementById('compromiso').value;
        var partida     = document.getElementById('partida').value;
        var proveedor   = document.getElementById('proveedor').value;
        var txt_ordene  = document.getElementById('txt_ordene').value;
        var anno        = document.getElementById('anno').value;
        var fecha_orden = document.getElementById('fecha_orden').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        
        parametros += 'Id_OC;compromiso;partida;proveedor;txt_ordene;anno;fecha_orden;';
        valores += Id_OC+';'+compromiso+';'+partida+';'+proveedor+';'+txt_ordene+';'+anno+';'+fecha_orden+';';
        
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
                            'La orden se ha modificado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error actualizando', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/ordenes/con_ordenes.php',
                                    'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
                                    'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
                                    'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
                                    bs_num_orden+';'+bs_compromiso+';'+bs_partida+';'+bs_proveedor+';'+bs_fecha_orden+';'+bs_anno+';'+
                                    or_num_orden+';'+or_num_orden_tipo+';'+or_nom_proveedor+';'+or_nom_proveedor_tipo+';'+or_num_partida+';'+or_num_partida_tipo+';'+
                                    or_num_compromiso+';'+or_num_compromiso_tipo+';'+or_fecha_orden+';'+or_fecha_orden_tipo+';'+or_anno+';'+or_anno_tipo+';');
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


function eliminarOrden() {
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/ordenes/ajax_eli_ordenes.php';
        
        
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
        var bs_num_orden            = document.getElementById('bs_num_orden').value;
        var bs_compromiso           = document.getElementById('bs_compromiso').value;
        var bs_partida              = document.getElementById('bs_partida').value;
        var bs_proveedor            = document.getElementById('bs_proveedor').value;
        var bs_fecha_orden          = document.getElementById('bs_fecha_orden').value;
        var bs_anno                 = document.getElementById('bs_anno').value;
        var or_num_orden            = document.getElementById('or_num_orden').value;
        var or_num_orden_tipo       = document.getElementById('or_num_orden_tipo').value;
        var or_nom_proveedor        = document.getElementById('or_nom_proveedor').value;
        var or_nom_proveedor_tipo   = document.getElementById('or_nom_proveedor_tipo').value;
        var or_num_partida          = document.getElementById('or_num_partida').value;
        var or_num_partida_tipo     = document.getElementById('or_num_partida_tipo').value;
        var or_num_compromiso       = document.getElementById('or_num_compromiso').value;
        var or_num_compromiso_tipo  = document.getElementById('or_num_compromiso_tipo').value;
        var or_fecha_orden          = document.getElementById('or_fecha_orden').value;
        var or_fecha_orden_tipo     = document.getElementById('or_fecha_orden_tipo').value;
        var or_anno                 = document.getElementById('or_anno').value;
        var or_anno_tipo            = document.getElementById('or_anno_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_OC = document.getElementById('Id_OC').value;

        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_OC;';
        valores += Id_OC+';';
        
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
                            'La orden se ha eliminado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error eliminando la orden', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/ordenes/con_ordenes.php',
                                    'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
                                    'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
                                    'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;',
                                    bs_num_orden+';'+bs_compromiso+';'+bs_partida+';'+bs_proveedor+';'+bs_fecha_orden+';'+bs_anno+';'+
                                    or_num_orden+';'+or_num_orden_tipo+';'+or_nom_proveedor+';'+or_nom_proveedor_tipo+';'+or_num_partida+';'+or_num_partida_tipo+';'+
                                    or_num_compromiso+';'+or_num_compromiso_tipo+';'+or_fecha_orden+';'+or_fecha_orden_tipo+';'+or_anno+';'+or_anno_tipo+';');
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}