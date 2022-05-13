/**********************************************************/
/****************** validaGA    **********************/
//Se encarga de validar los datos necesarios de un módulo
//Retorna:
//false = hay error
//true = todo esta correcto
/**********************************************************/
function validaCM(){
     if (Valida_TXT('txt_nombre_CM')) {
          $(this).notifyMe(
               'top', //Bottom/top/left/ right
               'error', //error/info/success/default
               texto['Error']+':', //titulo
               texto['ERROR_Digitar_Nombre_CM'], //texto
               400, //velocidad
               2400 //tiempo
          );
          return false;
     }else if (Valida_TXT('txt_desc_CM')) {
          $(this).notifyMe(
               'top', //Bottom/top/left/ right
               'error', //error/info/success/default
               texto['Error']+':', //titulo
               texto['ERROR_Digitar_Descripcion_CM'], //texto
               400, //velocidad
               2400 //tiempo
          );
          return false;
     }else if (Valida_TXT('txt_inicial_CM')) {
          $(this).notifyMe(
               'top', //Bottom/top/left/ right
               'error', //error/info/success/default
               texto['Error']+':', //titulo
               texto['ERROR_Digitar_Inicial_CM'], //texto
               400, //velocidad
               2400 //tiempo
          );
          return false;
     }else if (Valida_TXT('txt_final_CM')) {
          $(this).notifyMe(
               'top', //Bottom/top/left/ right
               'error', //error/info/success/default
               texto['Error']+':', //titulo
               texto['ERROR_Digitar_Final_CM'], //texto
               400, //velocidad
               2400 //tiempo
          );
          return false;
     }else{
          var PerInicial=parseInt(document.getElementById('txt_inicial_CM').value);
          var PerFinal=parseInt(document.getElementById('txt_final_CM').value);
          
          if (PerInicial>=PerFinal) {
               $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    texto['ERROR_InicialMenor_CM'], //texto
                    400, //velocidad
                    3000 //tiempo
               );
               return false;
          }
     }
     
     return true;
}
/**********************************************************/
/****************** agregarCM    **********************/
//Se encarga de agregar un grado academico
/**********************************************************/
function agregarCM(){
    if (validaCM()) {
     /***************************************************/
          /****************** Variables Globales *************/
          /***************************************************/
          var miAjax = NuevoAjax();
          var respuesta;
          var pagina = 'Modulos/SAE/Control_Modulos/ajax_agr_control_modulo.php';
          
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
          
          var bs_nom_cm = document.getElementById('bs_nom_cm').value;
          var or_nom_cm = document.getElementById('or_nom_cm').value;
          var or_nom_cm_tipo = document.getElementById('or_nom_cm_tipo').value;
     
          /***************************************************/
          /********** Obtenemos datos del formulario *********/
          /***************************************************/
          var txt_nombre = document.getElementById('txt_nombre_CM').value;
          var txt_descripcion = document.getElementById('txt_desc_CM').value;
          var txt_pInicial = document.getElementById('txt_inicial_CM').value;
          var txt_pFinal = document.getElementById('txt_final_CM').value;
          
          /***************************************************/
          /********* Los concatenamos a los parametros *******/
          /***************************************************/
          parametros += 'txt_nombre;';
          valores += txt_nombre+';';
          parametros += 'txt_descripcion;';
          valores += txt_descripcion+';';
          parametros += 'txt_pInicial;';
          valores += txt_pInicial+';';
          parametros += 'txt_pFinal;';
          valores += txt_pFinal+';';
          
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
                              texto['EXITO_Agregar_CM'], //texto
                              200, //velocidad
                              2500 //tiempo
                          );
                      }else if(respuesta=='e1'){
                          $(this).notifyMe(
                              'top', //Bottom/top/left/ right
                              'error', //error/info/success/default
                              texto['Error']+':', //titulo
                              texto['ERROR_Agregar_CM'], //texto
                              200, //velocidad
                              2500 //tiempo
                          );
                      }             
                      
                      //Mandamos a ejecutar los scripts
                      scs.evalScript();
                      CargaPaginaMenu('Modulos/SAE/Control_Modulos/con_control_modulo.php','bs_nom_cm;or_nom_cm;or_nom_cm_tipo;',bs_nom_cm+';'+or_nom_cm+';'+or_nom_cm_tipo+';')
                  }
              }
          }
          miAjax.send(null);
          /***************************************************/
          /*******  FIN de Llamada AJAX SINCRONA       *******/
          /***************************************************/
    }

}


/**********************************************************/
/****************** modificarPerfil  **********************/
//Se encarga de modificar un perfil
/**********************************************************/


function modificarCM(){
    
    //Si todo esta bien
    if (validaCM()) {
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Control_Modulos/ajax_mod_control_modulo.php';
        
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.getElementById('cedula_global').value;
        var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
        var Key_Usu = document.getElementById('Key_Usu').value;
        var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
        var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        
        /***************************************************/
        /*** Datos de bursqueda y ordenamiento  ************/
        /***************************************************/
        var bs_nom_cm = document.getElementById('bs_nom_cm').value;
        var or_nom_cm = document.getElementById('or_nom_cm').value;
        var or_nom_cm_tipo = document.getElementById('or_nom_cm_tipo').value;
        
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Cont_Mod = document.getElementById('Id_Cont_Mod').value;
        var txt_nombre = document.getElementById('txt_nombre_CM').value;
        var txt_desc = document.getElementById('txt_desc_CM').value;
        var txt_inicial = document.getElementById('txt_inicial_CM').value;
        var txt_final = document.getElementById('txt_final_CM').value;
        
        
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Cont_Mod;txt_nombre;txt_desc;txt_inicial;txt_final;';
        valores += Id_Cont_Mod+';'+txt_nombre+';'+txt_desc+';'+txt_inicial+';'+txt_final+';';
        
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
                            texto['EXITO_Modificar_CM'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Modificar_CM'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Control_Modulos/con_control_modulo.php','bs_nom_cm;or_nom_cm;or_nom_cm_tipo;',bs_nom_cm+';'+or_nom_cm+';'+or_nom_cm_tipo+';')
                    CerrarVentana()
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
    }
}


/**********************************************************/
/****************** eliminarPerfil  **********************/
//Se encarga de eliminar un perfil
/**********************************************************/
function eliminarCM(){
             
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Control_Modulos/ajax_eli_control_modulo.php';
        
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.getElementById('cedula_global').value;
        var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
        var Key_Usu = document.getElementById('Key_Usu').value;
        var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
        var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        
        /***************************************************/
        /***  Datos de busqueda y ordenamiento  ************/
        /***************************************************/
        var bs_nom_cm = document.getElementById('bs_nom_cm').value;
        var or_nom_cm = document.getElementById('or_nom_cm').value;
        var or_nom_cm_tipo = document.getElementById('or_nom_cm_tipo').value;
        

        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Cont_Mod = document.getElementById('Id_Cont_Mod').value;
        
       
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Cont_Mod;';
        valores += Id_Cont_Mod+';';
        
        /***************************************************/
        /*********     Creamos la query string       *******/
        /***************************************************/
        var query_string = creaQueryString(parametros,valores);
        
        
        /***************************************************/
        /*********       Llamada AJAX ASINCRONA       ******/
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
                            texto['EXITO_Desactivar_CM'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Desactivar_CM'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Control_Modulos/con_control_modulo.php','bs_nom_cm;or_nom_cm;or_nom_cm_tipo;',bs_nom_cm+';'+or_nom_cm+';'+or_nom_cm_tipo+';')
                    CerrarVentana()
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/

}





