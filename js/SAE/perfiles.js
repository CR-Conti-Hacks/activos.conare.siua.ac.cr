/**********************************************************/
/****************** validaPerfil    **********************/
//Se encarga de validar los datos necesarios de un perfil
//Retorna:
//false = hay error
//true = todo esta correcto
/**********************************************************/
function validaPerfil(){
     if (Valida_TXT('txt_nombre')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Digitar_Nombre_Perfil'], //texto
            400, //velocidad
            2400 //tiempo
         );
        return false;
     }
     return true;
}
/**********************************************************/
/****************** agregarPerfil    **********************/
//Se encarga de agregar un perfil
/**********************************************************/
function agregarPerfil(){
    
    //Si todo esta bien
    if (validaPerfil()) {
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Perfiles/ajax_agr_perfiles.php';
        
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
        var bs_nom_per = document.getElementById('bs_nom_per').value;
        var or_nom_per = document.getElementById('or_nom_per').value;
        var or_nom_per_tipo = document.getElementById('or_nom_per_tipo').value;
        
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var txt_nombre = document.getElementById('txt_nombre').value;
        
        
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'txt_nombre;';
        valores += txt_nombre+';';
        
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
                            texto['EXITO_Agregar_Perfil'], //texto
                            200, //velocidad
                            2500 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Agregar_Perfil'], //texto
                            200, //velocidad
                            2500 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php','bs_nom_per;or_nom_per;or_nom_per_tipo;',bs_nom_per+';'+or_nom_per+';'+or_nom_per_tipo+';')
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
function modificarPerfil(){
    
    //Si todo esta bien
    if (validaPerfil()) {
        
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Perfiles/ajax_mod_perfiles.php';
        
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
        var bs_nom_per = document.getElementById('bs_nom_per').value;
        var or_nom_per = document.getElementById('or_nom_per').value;
        var or_nom_per_tipo = document.getElementById('or_nom_per_tipo').value;
        
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Rol = document.getElementById('Id_Rol').value;
        var txt_nombre = document.getElementById('txt_nombre').value;
        
       
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Rol;txt_nombre;';
        valores += Id_Rol+';'+txt_nombre+';';
        
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
                            texto['EXITO_Modificar_Perfil'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Modificar_Perfil'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php','bs_nom_per;or_nom_per;or_nom_per_tipo;',bs_nom_per+';'+or_nom_per+';'+or_nom_per_tipo+';')
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
function eliminarPerfil(){
    

        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Perfiles/ajax_eli_perfiles.php';
        
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
        var bs_nom_per = document.getElementById('bs_nom_per').value;
        var or_nom_per = document.getElementById('or_nom_per').value;
        var or_nom_per_tipo = document.getElementById('or_nom_per_tipo').value;
        
        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Rol = document.getElementById('Id_Rol').value;
        
       
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Rol;';
        valores += Id_Rol+';';
        
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
                            texto['EXITO_Eliminar_Perfil'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Eliminar_Perfil'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Perfiles/con_perfiles.php','bs_nom_per;or_nom_per;or_nom_per_tipo;',bs_nom_per+';'+or_nom_per+';'+or_nom_per_tipo+';')
                    CerrarVentana()
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/

}


/********************************************************/
/********** funcion Derechos_Marcar_Todos () ************/
//recibe el objeto a guardar (this)
//Esta funcion agrega o elimina todos los derechos de un sistema
/*********************************************************/
function Derechos_Marcar_Todos(objeto){
    
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Perfiles/ajax_derechos_marca_todos.php";
    
    
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
     var bs_nom_per = document.getElementById('bs_nom_per').value;
     var or_nom_per = document.getElementById('or_nom_per').value;
     var or_nom_per_tipo = document.getElementById('or_nom_per_tipo').value;
     var inicio = document.getElementById('inicio').value;
     var pagina = document.getElementById('pagina').value;
        
        
     /***************************************************/
     /********** Obtenemos datos del formulario *********/
     /***************************************************/
     //Verificamos el elemento checkbox
     if (objeto.checked == true) {
         marcado = 1; 
     }else if (objeto.checked == false) {
         marcado = 0; 
     }
     
     //obtenemos el sistema a marcar
     var sistema = document.getElementById('sl_modulo').value;
     var Id_Rol = document.getElementById('Id_Rol').value;
    
     /***************************************************/
     /********* Los concatenamos a las parametros *******/
     /***************************************************/
     parametros += 'sistema;Id_Rol;marcado;';
     valores += sistema+';'+Id_Rol+';'+marcado+';';
    
    
       
     /***************************************************/
     /*********     Creamos la query string       *******/
     /***************************************************/
     var query_string = creaQueryString(parametros,valores);

     /***************************************************/
     /*********       Llamada AJAX ASINCRONA       ******/
     /***************************************************/
     miAjax.open('GET',pagina_ajax+'?'+query_string,true);
     miAjax.onreadystatechange=function() {
         if (miAjax.readyState==ESTADO_COMPLETO){
             if(miAjax.status==200){
                 
                 //Declaramos la variable que va almacenar los script
                 var scs=miAjax.responseText.extractScript();
         
                 var respuesta = miAjax.responseText.trim();
                 //Se desmarco correctamente
                 if ((respuesta=='1')||(respuesta=='2')) {
                     $(this).notifyMe(
                         'top', //Bottom/top/left/ right
                         'success', //error/info/success/default
                         texto['Exito']+':', //titulo
                         texto['EXITO_Derechos_Actualizados'], //texto
                         200, //velocidad
                         1000 //tiempo
                     );
                 }else if((respuesta=='e1')||(respuesta=='e2')||(respuesta=='e3')){
                     $(this).notifyMe(
                         'top', //Bottom/top/left/ right
                         'error', //error/info/success/default
                         texto['Error']+':', //titulo
                         texto['ERROR_Desmarcando_Derechos'], //texto
                         200, //velocidad
                         1000 //tiempo
                     );
                 }
                 //Mandamos a ejecutar los scripts
                 scs.evalScript(); 
             }
         }
     }
     miAjax.send(null);
     /***************************************************/
     /*******  FIN de Llamada AJAX SINCRONA       *******/
     /***************************************************/
     
     /***************************************************/
     /*******  volver a llamar a la pagina        *******/
     /***************************************************/
     CargaPaginaMenu('Modulos/SAE/Perfiles/asig_derechos.php',
													   'Id_Rol;bs_nom_per;or_nom_per;or_nom_per_tipo;pagina;inicio;',
													   Id_Rol+';'+
                                                       bs_nom_per+';'+
                                                       or_nom_per+';'+
                                                       or_nom_per_tipo+';'+
                                                       pagina+';'+
                                                       inicio+';'
													   )


}


/********************************************************/
/********** funcion Guarda_Permiso () ************/
//recibe el objeto a guardar (this)
//Esta funcion agrega o elimina todos los derechos de un sistema
/*********************************************************/
function Guarda_Permiso(objeto,Id_Der,Id_Rol){
    
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Perfiles/ajax_guarda_permiso.php";
    
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    
        
     /***************************************************/
     /********** Obtenemos datos del formulario *********/
     /***************************************************/
     //Verificamos el elemento checkbox
     if (objeto.checked == true) {
         marcado = 1; 
     }else if (objeto.checked == false) {
         marcado = 0; 
     }
     
   
     /***************************************************/
     /********* Los concatenamos a las parametros *******/
     /***************************************************/
     parametros += 'Id_Der;Id_Rol;marcado;';
     valores += Id_Der+';'+Id_Rol+';'+marcado+';';
    
    
       
     /***************************************************/
     /*********     Creamos la query string       *******/
     /***************************************************/
     var query_string = creaQueryString(parametros,valores);

     /***************************************************/
     /*********       Llamada AJAX ASINCRONA       ******/
     /***************************************************/
     miAjax.open('GET',pagina_ajax+'?'+query_string,true);
     miAjax.onreadystatechange=function() {
         if (miAjax.readyState==ESTADO_COMPLETO){
             if(miAjax.status==200){
                 
                 //Declaramos la variable que va almacenar los script
                 var scs=miAjax.responseText.extractScript();
         
                 var respuesta = miAjax.responseText.trim();

                 //Se desmarco correctamente
                 if ((respuesta=='1')) {
                     $(this).notifyMe(
                         'top', //Bottom/top/left/ right
                         'success', //error/info/success/default
                         texto['Exito']+':', //titulo
                         texto['EXITO_Derechos_Eliminado'], //texto
                         200, //velocidad
                         1000 //tiempo
                     );
                 }else if(respuesta=='2'){
                     $(this).notifyMe(
                         'top', //Bottom/top/left/ right
                         'success', //error/info/success/default
                         texto['Exito']+':', //titulo
                         texto['EXITO_Derechos_Agregado'], //texto
                         200, //velocidad
                         1000 //tiempo
                     );
                 }else if((respuesta=='e1')||(respuesta=='e2')){
                     $(this).notifyMe(
                         'top', //Bottom/top/left/ right
                         'error', //error/info/success/default
                         texto['Error']+':', //titulo
                         texto['ERROR_Actualizando_Derecho'], //texto
                         200, //velocidad
                         1000 //tiempo
                     );
                 }
                 //Mandamos a ejecutar los scripts
                 scs.evalScript(); 
             }
         }
     }
     miAjax.send(null);
     /***************************************************/
     /*******  FIN de Llamada AJAX SINCRONA       *******/
     /***************************************************/
}
/********************************************************/
/********** funcion perfil_no_eliminar () ************/
//Esta funcion notifica al usuario que un perfil no se puede eliminar
/*********************************************************/
function perfil_no_eliminar() {
     $(this).notifyMe(
          'top', //Bottom/top/left/ right
          'error', //error/info/success/default
		  texto['Error']+':', //titulo
          texto['ERROR_Perfil_No_Eliminar'], //texto
          200, //velocidad
          2000 //tiempo
	 );
}

