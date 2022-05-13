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
function validarProveedor(){
     
    if (Valida_TXT('txt_proveedore')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el nombre del proveedor', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }
    return true;
}





function agregarProveedor() {
    if (validarProveedor()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/proveedores/ajax_agr_proveedores.php';
        
        
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
        var bs_nom_proveedore = document.getElementById('bs_nom_proveedore').value;
        var or_nom_proveedore = document.getElementById('or_nom_proveedore').value;
        var or_nom_proveedore_tipo = document.getElementById('or_nom_proveedore_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var txt_proveedore = document.getElementById('txt_proveedore').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'txt_proveedore;';
        valores += txt_proveedore+';';
        
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
                            'El proveedor se ha agregado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error agregando el proveedor', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/proveedores/con_proveedores.php','bs_nom_proveedore;or_nom_proveedore;or_nom_proveedore_tipo;',bs_nom_proveedore+';'+or_nom_proveedore+';'+or_nom_proveedore_tipo+';')
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

function modificarProveedor() {
    if (validarProveedor()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/proveedores/ajax_mod_proveedores.php';
        
        
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
        var bs_nom_proveedore = document.getElementById('bs_nom_proveedore').value;
        var or_nom_proveedore = document.getElementById('or_nom_proveedore').value;
        var or_nom_proveedore_tipo = document.getElementById('or_nom_proveedore_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Prove = document.getElementById('Id_Prove').value;
        var txt_proveedore = document.getElementById('txt_proveedore').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Prove;txt_proveedore;';
        valores += Id_Prove+';'+txt_proveedore+';';
        
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
                            'El proveedor se ha modificado correctamente', //texto
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
                    CargaPaginaMenu('Modulos/Inventario/proveedores/con_proveedores.php','bs_nom_proveedore;or_nom_proveedore;or_nom_proveedore_tipo;',bs_nom_proveedore+';'+or_nom_proveedore+';'+or_nom_proveedore_tipo+';')
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


function eliminarProveedor() {
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/proveedores/ajax_eli_proveedores.php';
        
        
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
        var bs_nom_proveedore = document.getElementById('bs_nom_proveedore').value;
        var or_nom_proveedore = document.getElementById('or_nom_proveedore').value;
        var or_nom_proveedore_tipo = document.getElementById('or_nom_proveedore_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Prove = document.getElementById('Id_Prove').value;

        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Prove;';
        valores += Id_Prove+';';
        
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
                            'El proveedor se ha eliminado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error eliminando el proveedor', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/proveedores/con_proveedores.php','bs_nom_proveedore;or_nom_proveedore;or_nom_proveedore_tipo;',bs_nom_proveedore+';'+or_nom_proveedore+';'+or_nom_proveedore_tipo+';')
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}