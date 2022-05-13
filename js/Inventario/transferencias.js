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
function validarTransferencias(){
     
    if (Valida_TXT('txt_transferencia')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el número de la transferencia', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }
    return true;
}





function agregarTransferencia() {
    if (validarTransferencias()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/transferencias/ajax_agr_transferencias.php';
        
        
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
        var bs_nom_transferencia = document.getElementById('bs_nom_transferencia').value;
        var or_nom_transferencia = document.getElementById('or_nom_transferencia').value;
        var or_nom_transferencia_tipo = document.getElementById('or_nom_transferencia_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var txt_transferencia = document.getElementById('txt_transferencia').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'txt_transferencia;';
        valores += txt_transferencia+';';
        
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
                            'La transferencia se ha agregado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error agregando la transferencia', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/transferencias/con_transferencias.php','bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;',bs_nom_transferencia+';'+or_nom_transferencia+';'+or_nom_transferencia_tipo+';')
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

function modificarTransferencia() {
    if (validarTransferencias()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/transferencias/ajax_mod_transferencias.php';
        
        
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
        var bs_nom_transferencia = document.getElementById('bs_nom_transferencia').value;
        var or_nom_transferencia = document.getElementById('or_nom_transferencia').value;
        var or_nom_transferencia_tipo = document.getElementById('or_nom_transferencia_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Trans = document.getElementById('Id_Trans').value;
        var txt_transferencia = document.getElementById('txt_transferencia').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Trans;txt_transferencia;';
        valores += Id_Trans+';'+txt_transferencia+';';
        
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
                            'La transferencia se ha modificado correctamente', //texto
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
                    CargaPaginaMenu('Modulos/Inventario/transferencias/con_transferencias.php','bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;',bs_nom_transferencia+';'+or_nom_transferencia+';'+or_nom_transferencia_tipo+';')
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


function eliminarTransferencia() {
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/transferencias/ajax_eli_transferencias.php';
        
        
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
        var bs_nom_transferencia = document.getElementById('bs_nom_transferencia').value;
        var or_nom_transferencia = document.getElementById('or_nom_transferencia').value;
        var or_nom_transferencia_tipo = document.getElementById('or_nom_transferencia_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Trans = document.getElementById('Id_Trans').value;

        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Trans;';
        valores += Id_Trans+';';
        
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
                            'La transferencia se ha eliminado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error eliminando la transferencia', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/transferencias/con_transferencias.php','bs_nom_transferencia;or_nom_transferencia;or_nom_transferencia_tipo;',bs_nom_transferencia+';'+or_nom_transferencia+';'+or_nom_transferencia_tipo+';')
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}