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
function validarZona(){
     
    if (Valida_TXT('txt_zona')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el nombre de la zona', //texto
            400, //velocidad
            2400 //tiempo
         );    
        return false;
    }
    return true;
}





function agregarZona() {
    if (validarZona()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/zonas/ajax_agr_zonas.php';
        
        
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
        var bs_nom_zona = document.getElementById('bs_nom_zona').value;
        var or_nom_zona = document.getElementById('or_nom_zona').value;
        var or_nom_zona_tipo = document.getElementById('or_nom_zona_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var txt_zona = document.getElementById('txt_zona').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'txt_zona;';
        valores += txt_zona+';';
        
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
                            'La zona se ha agregado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error agregando la zona', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/zonas/con_zonas.php','bs_nom_zona;or_nom_zona;or_nom_zona_tipo;',bs_nom_zona+';'+or_nom_zona+';'+or_nom_zona_tipo+';')
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

function modificarZona() {
    if (validarZona()) {
        
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/zonas/ajax_mod_zonas.php';
        
        
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
        var bs_nom_zona = document.getElementById('bs_nom_zona').value;
        var or_nom_zona = document.getElementById('or_nom_zona').value;
        var or_nom_zona_tipo = document.getElementById('or_nom_zona_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Zonas_tmp = document.getElementById('Id_Zonas_tmp').value;
        var txt_zona = document.getElementById('txt_zona').value;
    
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Zonas_tmp;txt_zona;';
        valores += Id_Zonas_tmp+';'+txt_zona+';';
        
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
                            'La zona se ha modificado correctamente', //texto
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
                    CargaPaginaMenu('Modulos/Inventario/zonas/con_zonas.php','bs_nom_zona;or_nom_zona;or_nom_zona_tipo;',bs_nom_zona+';'+or_nom_zona+';'+or_nom_zona_tipo+';')
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


function eliminarZona() {
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/zonas/ajax_eli_zonas.php';
        
        
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
        var bs_nom_zona = document.getElementById('bs_nom_zona').value;
        var or_nom_zona = document.getElementById('or_nom_zona').value;
        var or_nom_zona_tipo = document.getElementById('or_nom_zona_tipo').value;
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Zonas_tmp = document.getElementById('Id_Zonas_tmp').value;

        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Zonas_tmp;';
        valores += Id_Zonas_tmp+';';
        
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
                            'La zona se ha eliminado correctamente', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            'Ha ocurrido un error eliminando la zona', //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/Inventario/zonas/con_zonas.php','bs_nom_zona;or_nom_zona;or_nom_zona_tipo;',bs_nom_zona+';'+or_nom_zona+';'+or_nom_zona_tipo+';')
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}