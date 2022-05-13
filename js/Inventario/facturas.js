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
function validarFactura(){
     
    if (Valida_TXT('txt_factura')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el número de la factura', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }
    return true;
}





function agregarFactura() {
    if (validarFactura()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/ordenes/facturas/ajax_agr_facturas.php';
        
        
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
        
        var bs_num_factu            = document.getElementById('bs_num_factu').value;
        var bs_num_trans            = document.getElementById('bs_num_trans').value;
        var bs_fecha_factu          = document.getElementById('bs_fecha_factu').value;
        var or_num_factu            = document.getElementById('or_num_factu').value;
        var or_num_factu_tipo       = document.getElementById('or_num_factu_tipo').value;
        var or_num_trans            = document.getElementById('or_num_trans').value;
        var or_num_trans_tipo       = document.getElementById('or_num_trans_tipo').value;
        var or_fecha_factu          = document.getElementById('or_fecha_factu').value;
        var or_fecha_factu_tipo     = document.getElementById('or_fecha_factu_tipo').value;

        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_OC                   = document.getElementById('Id_OC').value;
        var txt_factura             = document.getElementById('txt_factura').value;
        var transferencia           = document.getElementById('transferencia').value;
        var fecha_factura           = document.getElementById('fecha_factura').value;

        
          
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_OC;txt_factura;transferencia;fecha_factura;';
        valores += Id_OC+';'+txt_factura+';'+transferencia+';'+fecha_factura+';';
        
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
                            'La factura se ha agregado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error agregando la factura', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/con_facturas.php',
                                    'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
                                    'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
                                    'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
                                    'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
                                    bs_num_orden+';'+bs_compromiso+';'+bs_partida+';'+bs_proveedor+';'+bs_fecha_orden+';'+bs_anno+';'+
                                    or_num_orden+';'+or_num_orden_tipo+';'+or_nom_proveedor+';'+or_nom_proveedor_tipo+';'+or_num_partida+';'+or_num_partida_tipo+';'+
                                    or_num_compromiso+';'+or_num_compromiso_tipo+';'+or_fecha_orden+';'+or_fecha_orden_tipo+';'+or_anno+';'+or_anno_tipo+';'+
                                    bs_num_factu+';'+bs_num_trans+';'+bs_fecha_factu+';'+or_num_factu+';'+or_num_factu_tipo+';'+or_num_trans+';'+or_num_trans_tipo+';'+or_fecha_factu+';'+or_fecha_factu_tipo+';'+Id_OC+';'
                                    )
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

function modificarFactura() {
    if (validarFactura()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/ordenes/facturas/ajax_mod_facturas.php';
        
        
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
        
        var bs_num_factu            = document.getElementById('bs_num_factu').value;
        var bs_num_trans            = document.getElementById('bs_num_trans').value;
        var bs_fecha_factu          = document.getElementById('bs_fecha_factu').value;
        var or_num_factu            = document.getElementById('or_num_factu').value;
        var or_num_factu_tipo       = document.getElementById('or_num_factu_tipo').value;
        var or_num_trans            = document.getElementById('or_num_trans').value;
        var or_num_trans_tipo       = document.getElementById('or_num_trans_tipo').value;
        var or_fecha_factu          = document.getElementById('or_fecha_factu').value;
        var or_fecha_factu_tipo     = document.getElementById('or_fecha_factu_tipo').value;
        var Id_OC                   = document.getElementById('Id_OC').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Factu                = document.getElementById('Id_Factu').value;
        var orden_compra            = document.getElementById('orden_compra').value;
        var txt_factura             = document.getElementById('txt_factura').value;
        var transferencia           = document.getElementById('transferencia').value;
        var fecha_factura           = document.getElementById('fecha_factura').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        
        parametros += 'Id_Factu;orden_compra;txt_factura;transferencia;fecha_factura;';
        valores += Id_Factu+';'+orden_compra+';'+txt_factura+';'+transferencia+';'+fecha_factura+';';
        
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
                            'La factura se ha modificado correctamente', //texto
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
                    CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/con_facturas.php',
                                    'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
                                    'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
                                    'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
                                    'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
                                    bs_num_orden+';'+bs_compromiso+';'+bs_partida+';'+bs_proveedor+';'+bs_fecha_orden+';'+bs_anno+';'+
                                    or_num_orden+';'+or_num_orden_tipo+';'+or_nom_proveedor+';'+or_nom_proveedor_tipo+';'+or_num_partida+';'+or_num_partida_tipo+';'+
                                    or_num_compromiso+';'+or_num_compromiso_tipo+';'+or_fecha_orden+';'+or_fecha_orden_tipo+';'+or_anno+';'+or_anno_tipo+';'+
                                    bs_num_factu+';'+bs_num_trans+';'+bs_fecha_factu+';'+or_num_factu+';'+or_num_factu_tipo+';'+or_num_trans+';'+or_num_trans_tipo+';'+or_fecha_factu+';'+or_fecha_factu_tipo+';'+Id_OC+';');
                     
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


function eliminarFactura() {
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/ordenes/facturas/ajax_eli_facturas.php';
        
        
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
        
        var bs_num_factu            = document.getElementById('bs_num_factu').value;
        var bs_num_trans            = document.getElementById('bs_num_trans').value;
        var bs_fecha_factu          = document.getElementById('bs_fecha_factu').value;
        var or_num_factu            = document.getElementById('or_num_factu').value;
        var or_num_factu_tipo       = document.getElementById('or_num_factu_tipo').value;
        var or_num_trans            = document.getElementById('or_num_trans').value;
        var or_num_trans_tipo       = document.getElementById('or_num_trans_tipo').value;
        var or_fecha_factu          = document.getElementById('or_fecha_factu').value;
        var or_fecha_factu_tipo     = document.getElementById('or_fecha_factu_tipo').value;
        var Id_OC                   = document.getElementById('Id_OC').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Factu = document.getElementById('Id_Factu').value;

        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Factu;';
        valores += Id_Factu+';';
        
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
                            'La factura se ha eliminado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error eliminando la factura', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/ordenes/facturas/con_facturas.php',
                                    'bs_num_orden;bs_compromiso;bs_partida;bs_proveedor;bs_fecha_orden;bs_anno;'+
                                    'or_num_orden;or_num_orden_tipo;or_nom_proveedor;or_nom_proveedor_tipo;or_num_partida;or_num_partida_tipo;'+
                                    'or_num_compromiso;or_num_compromiso_tipo;or_fecha_orden;or_fecha_orden_tipo;or_anno;or_anno_tipo;'+
                                    'bs_num_factu;bs_num_trans;bs_fecha_factu;or_num_factu;or_num_factu_tipo;or_num_trans;or_num_trans_tipo;or_fecha_factu;or_fecha_factu_tipo;Id_OC;',
                                    bs_num_orden+';'+bs_compromiso+';'+bs_partida+';'+bs_proveedor+';'+bs_fecha_orden+';'+bs_anno+';'+
                                    or_num_orden+';'+or_num_orden_tipo+';'+or_nom_proveedor+';'+or_nom_proveedor_tipo+';'+or_num_partida+';'+or_num_partida_tipo+';'+
                                    or_num_compromiso+';'+or_num_compromiso_tipo+';'+or_fecha_orden+';'+or_fecha_orden_tipo+';'+or_anno+';'+or_anno_tipo+';'+
                                    bs_num_factu+';'+bs_num_trans+';'+bs_fecha_factu+';'+or_num_factu+';'+or_num_factu_tipo+';'+or_num_trans+';'+or_num_trans_tipo+';'+or_fecha_factu+';'+or_fecha_factu_tipo+';'+Id_OC+';');
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}