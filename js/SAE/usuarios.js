/************************************************************************/
/********************** funcion Buscar_Usuarios_Solo_Numeros ************/
/*Esta funcion manda a buscar usuarios para campos donde solo se puede digitar numeros
 *al dar ENTER se activa la busqueda
 *event: tecla
 *pagina a cargar
 *parametro y valores
 *Llamada:
onkeyPress="return Buscar_Usuarios_Solo_Numeros(
								event,
								'Modulos/SAE/Usuarios/con_usuarios.php',
								'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
								'<?=$pagina.';'.$inicio.';'?>'+
								document.getElementById('bs_id_usuario').value+';'+
								document.getElementById('bs_cedula').value+';'+
								document.getElementById('bs_nombre').value+';'+
								document.getElementById('bs_roles').value+';'+
								document.getElementById('bs_estado_conexion').value+';'
							);"
 **/

function Buscar_Usuarios_Solo_Numeros(Texto,pagina,parametros,valores){
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
     //Si presiona ENTER
    if ((tecla==13)||(Texto=='')){
       CargaPaginaMenu(pagina,parametros,valores);

    }
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te);
}

/************************************************************************/
/********************** funcion Buscar_Usuario_Cedula        ************/
/*Esta funcion manda a buscar usuarios para campos tipo cedula
 *event: tecla
 *pagina a cargar
 *parametro y valores
 *Llamada:
onkeyup="mascara(this,'-',patron_cedula,true)" maxlength="11"
onKeyPress="Buscar_Usuario_Cedula(
								event,
								'Modulos/SAE/Usuarios/con_usuarios.php',
								'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;',
								'<?=$pagina.';'.$inicio.';'?>'+
								document.getElementById('bs_id_usuario').value+';'+
								document.getElementById('bs_cedula').value+';'+
								document.getElementById('bs_nombre').value+';'+
								document.getElementById('bs_roles').value+';'+
								document.getElementById('bs_estado_conexion').value+';'
							);"
 **/
function Buscar_Usuario_Cedula(Texto,pagina,parametros,valores){
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Si presiona ENTER
    if ((tecla==13)||(Texto=='')){
       if (longitud_minima('bs_cedula',11)) {
          $(this).notifyMe(
               'top', //Bottom/top/left/ right
               'error', //error/info/success/default
               texto['Error']+':', //titulo
               texto['ERROR_index_002'], //texto
               200, //velocidad
               2000 //tiempo
          );
       }else{
          CargaPaginaMenu(pagina,parametros,valores);   
       }
    }
}
/************************************************************************/
/********************** funcion Buscar_Usuario_Cedula        ************/
/*Esta funcion manda a buscar usuarios por el boton verificando si la cedula
 *no esta completa mostrando un error
 llamada: Buscar_Usuarios_Boton()
 **/
function Buscar_Usuarios_Boton(){
     var pagina = 'Modulos/SAE/Usuarios/con_usuarios.php';
     var parametros = 'pagina;inicio;bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
                                                            'or_id_usuario;or_id_usuario_tipo;'+
															'or_cedula;or_cedula_tipo;'+
															'or_nombre;or_nombre_tipo;'+
															'or_ape1;or_ape1_tipo;'+
															'or_ape2;or_ape2_tipo;'+
															'or_rol;or_rol_tipo;'+
															'or_estado_conexion;or_estado_conexion_tipo;'+
															'or_fecha_conexion;or_fecha_conexion_tipo;'+
															'or_cookie;or_cookie_tipo;';
     if (document.getElementById('bs_cedula').value!='') {
          if (longitud_minima('bs_cedula',11)) {
               $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    texto['ERROR_index_002'], //texto
                    200, //velocidad
                    2000 //tiempo
               );
               return;
          }
     }
	 /************************************************/
     /************ obntenga los datos ****************/
     /************************************************/
     var valores =  document.getElementById('pagina').value +';'+
                    document.getElementById('inicio').value +';'+
                    document.getElementById('bs_id_usuario').value+';'+
                    document.getElementById('bs_cedula').value+';'+
					document.getElementById('bs_nombre').value+';'+
					document.getElementById('bs_roles').value+';'+
					document.getElementById('bs_estado_conexion').value+';'+
                    document.getElementById('or_id_usuario').value+';'+
					document.getElementById('or_id_usuario_tipo').value+';'+
					document.getElementById('or_cedula').value+';'+
					document.getElementById('or_cedula_tipo').value+';'+
					document.getElementById('or_nombre').value+';'+
					document.getElementById('or_nombre_tipo').value+';'+
					document.getElementById('or_ape1').value+';'+
					document.getElementById('or_ape1_tipo').value+';'+
					document.getElementById('or_ape2').value+';'+
					document.getElementById('or_ape2_tipo').value+';'+
					document.getElementById('or_rol').value+';'+
					document.getElementById('or_rol_tipo').value+';'+
					document.getElementById('or_estado_conexion').value+';'+
					document.getElementById('or_estado_conexion_tipo').value+';'+
					document.getElementById('or_fecha_conexion').value+';'+
					document.getElementById('or_fecha_conexion_tipo').value+';'+
					document.getElementById('or_cookie').value+';'+
					document.getElementById('or_cookie_tipo').value+';'
    
      CargaPaginaMenu(pagina,parametros,valores);   
}

/***********************************************************************************/
/**********************         funcion modificarUsuario                ************/
/*Esta funcion permite modificar un usuario, perfil, contraseña y pregunta secreta**/
function modificarUsuario(){
    if (Valida_SELECT_0('sl_perfil')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_seleccion_perfil'], //texto
            200, //velocidad
            2000 //tiempo
        );
        return;
    }else if((document.getElementById('contrasena').value!='')&&(document.getElementById('confirmar_contrasena').value=='')){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_digite_confirmacion'], //texto
            200, //velocidad
            2000 //tiempo
        );
        document.getElementById('confirmar_contrasena').focus();
        return;
    }else if((document.getElementById('contrasena').value=='')&&(document.getElementById('confirmar_contrasena').value!='')){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_digite_contrasena'], //texto
            200, //velocidad
            2000 //tiempo
        );
        document.getElementById('contrasena').focus();
        return;
    }else if(document.getElementById('contrasena').value!=document.getElementById('confirmar_contrasena').value){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_contrasena_no_iguales'], //texto
            200, //velocidad
            2000 //tiempo
        );
        document.getElementById('contrasena').value= '';
        document.getElementById('confirmar_contrasena').value='';
        document.getElementById('contrasena').focus();
        return;
    }else if(Valida_SELECT_0('sl_pregunta')){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_seleccion_pregunta'], //texto
            200, //velocidad
            2000 //tiempo
        );
        return;
    }else if(Valida_TXT('respuesta')){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_digite_respuesta'], //texto
            200, //velocidad
            2000 //tiempo
        );
        return;
    }
    
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Usuarios/ajax_mod_usuarios.php";
    

        
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        
    /***************************************************/
    /* Datos de busqueda, paginacion  y ordenamiento ***/
    /***************************************************/
    var bs_id_usuario = document.getElementById('bs_id_usuario').value;
    var bs_cedula = document.getElementById('bs_cedula').value;
    var bs_nombre = document.getElementById('bs_nombre').value;
    var bs_roles = document.getElementById('bs_roles').value;
    var bs_estado_conexion = document.getElementById('bs_estado_conexion').value;
        
    var pagina = document.getElementById('pagina').value;
    var inicio = document.getElementById('inicio').value;
        
    var or_id_usuario = document.getElementById('or_id_usuario').value;
    var or_id_usuario_tipo = document.getElementById('or_id_usuario_tipo').value;
    var or_cedula = document.getElementById('or_cedula').value;
    var or_cedula_tipo = document.getElementById('or_cedula_tipo').value;
    var or_nombre = document.getElementById('or_nombre').value;
    var or_nombre_tipo = document.getElementById('or_nombre_tipo').value;
    var or_ape1 = document.getElementById('or_ape1').value;
    var or_ape1_tipo = document.getElementById('or_ape1_tipo').value;
    var or_ape2 = document.getElementById('or_ape2').value;
    var or_ape2_tipo = document.getElementById('or_ape2_tipo').value;
    var or_rol = document.getElementById('or_rol').value;
    var or_rol_tipo = document.getElementById('or_rol_tipo').value;
    var or_estado_conexion = document.getElementById('or_estado_conexion').value;
    var or_estado_conexion_tipo = document.getElementById('or_estado_conexion_tipo').value;
    var or_fecha_conexion = document.getElementById('or_fecha_conexion').value;
    var or_fecha_conexion_tipo = document.getElementById('or_fecha_conexion_tipo').value;
    var or_cookie = document.getElementById('or_cookie').value;
    var or_cookie_tipo = document.getElementById('or_cookie_tipo').value;

    
    
        
    /***************************************************/
    /********** Obtenemos datos del formulario *********/
    /***************************************************/
    var id_usuario = document.getElementById('Id_Usuario').value;
    var id_perfil = document.getElementById('sl_perfil').value;
    
    var sl_pregunta = document.getElementById('sl_pregunta').value;
    var respuesta = document.getElementById('respuesta').value;
    if (document.getElementById('contrasena').value!='') {
        var contrasena = hex_md5(document.getElementById('contrasena').value);
        var confirmar_contrasena = hex_md5(document.getElementById('confirmar_contrasena').value);
    }else{
        var contrasena = '';
        var confirmar_contrasena = '';
    }
    
    
    
    /***************************************************/
    /********* Los concatenamos a las parametros *******/
    /***************************************************/
    parametros += 'id_usuario;id_perfil;contrasena;confirmar_contrasena;sl_pregunta;respuesta;';
    valores += id_usuario+';'+id_perfil+';'+contrasena+';'+confirmar_contrasena+';'+sl_pregunta+';'+respuesta+';';
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       *******/
    /***************************************************/
    miAjax.open('GET',pagina_ajax+'?'+query_string,true);

    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                  
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
                var respuesta = miAjax.responseText.trim();

  
                //El dato se actualizao correctamente
                 if (respuesta=='1') {
                    CerrarVentana();
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Exito']+':', //titulo
                        texto['EXITO_modificacion_usuario'], //texto
                        200, //velocidad
                        2500 //tiempo
                    );
                }else if((respuesta=='e1')||(respuesta=='e2')||(respuesta=='e3')||(respuesta=='e4')){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_modificacion_usuario'], //texto
                        200, //velocidad
                        2500 //tiempo
                    );
                }             
                    
                //Mandamos a ejecutar los scripts
                scs.evalScript();
                CargaPaginaMenu(
                                'Modulos/SAE/Usuarios/con_usuarios.php',
                                'pagina;inicio;'+
                                'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
                                'or_id_usuario;or_id_usuario_tipo;or_cedula;or_cedula_tipo;or_nombre;or_nombre_tipo;or_ape1;or_ape1_tipo;or_ape2;or_ape2_tipo;'+
                                'or_rol;or_rol_tipo;or_estado_conexion;or_estado_conexion_tipo;or_fecha_conexion;or_fecha_conexion_tipo;or_cookie;or_cookie_tipo;',
                                pagina+';'+inicio+';'+
                                bs_id_usuario+';'+bs_cedula+';'+bs_nombre+';'+bs_roles+';'+bs_estado_conexion+';'+
                                or_id_usuario+';'+or_id_usuario_tipo+';'+or_cedula+';'+or_cedula_tipo+';'+or_nombre+';'+or_nombre_tipo+';'+
                                or_ape1+';'+or_ape1_tipo+';'+or_ape2+';'+or_ape2_tipo+';'+or_rol+';'+or_rol_tipo+';'+
                                or_estado_conexion+';'+or_estado_conexion_tipo+';'+or_fecha_conexion+';'+or_fecha_conexion_tipo+';'+
                                or_cookie+';'+or_cookie_tipo+';'
                                );
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}





/***********************************************************************/
/*
 funcion desconectarUsuario()
 Permite desconectar a un usuario del sistema
 llamada desconectarUsuario(ID_USUARIO)
 
  **>
/***********************************************************************/
function desconectarUsuario(id_usuario){
    
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Usuarios/ajax_desconectar_usuarios.php";
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    /***************************************************/
    /* Datos de busqueda, paginacion  y ordenamiento ***/
    /***************************************************/
    var bs_id_usuario = document.getElementById('bs_id_usuario').value;
    var bs_cedula = document.getElementById('bs_cedula').value;
    var bs_nombre = document.getElementById('bs_nombre').value;
    var bs_roles = document.getElementById('bs_roles').value;
    var bs_estado_conexion = document.getElementById('bs_estado_conexion').value;
        
    var pagina = document.getElementById('pagina').value;
    var inicio = document.getElementById('inicio').value;
        
    var or_id_usuario = document.getElementById('or_id_usuario').value;
    var or_id_usuario_tipo = document.getElementById('or_id_usuario_tipo').value;
    var or_cedula = document.getElementById('or_cedula').value;
    var or_cedula_tipo = document.getElementById('or_cedula_tipo').value;
    var or_nombre = document.getElementById('or_nombre').value;
    var or_nombre_tipo = document.getElementById('or_nombre_tipo').value;
    var or_ape1 = document.getElementById('or_ape1').value;
    var or_ape1_tipo = document.getElementById('or_ape1_tipo').value;
    var or_ape2 = document.getElementById('or_ape2').value;
    var or_ape2_tipo = document.getElementById('or_ape2_tipo').value;
    var or_rol = document.getElementById('or_rol').value;
    var or_rol_tipo = document.getElementById('or_rol_tipo').value;
    var or_estado_conexion = document.getElementById('or_estado_conexion').value;
    var or_estado_conexion_tipo = document.getElementById('or_estado_conexion_tipo').value;
    var or_fecha_conexion = document.getElementById('or_fecha_conexion').value;
    var or_fecha_conexion_tipo = document.getElementById('or_fecha_conexion_tipo').value;
    var or_cookie = document.getElementById('or_cookie').value;
    var or_cookie_tipo = document.getElementById('or_cookie_tipo').value;
    
    /***************************************************/
    /********* Los concatenamos a las parametros *******/
    /***************************************************/
    parametros += 'id_usuario;';
    valores += id_usuario+';';
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       *******/
    /***************************************************/
    miAjax.open('GET',pagina_ajax+'?'+query_string,true);

    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                  
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
                var respuesta = miAjax.responseText.trim();
  
                //El dato se actualizao correctamente
                 if (respuesta=='1') {
                    CerrarVentana();
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Exito']+':', //titulo
                        texto['EXITO_desconectado_usuario'], //texto
                        200, //velocidad
                        2500 //tiempo
                    );
                   
                }else if(respuesta=='e1'){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_desconectando_usuario'], //texto
                        200, //velocidad
                        2500 //tiempo
                    );
                }             
                    
                //Mandamos a ejecutar los scripts
                scs.evalScript();
                CargaPaginaMenu(
                                'Modulos/SAE/Usuarios/con_usuarios.php',
                                'pagina;inicio;'+
                                'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
                                'or_id_usuario;or_id_usuario_tipo;or_cedula;or_cedula_tipo;or_nombre;or_nombre_tipo;or_ape1;or_ape1_tipo;or_ape2;or_ape2_tipo;'+
                                'or_rol;or_rol_tipo;or_estado_conexion;or_estado_conexion_tipo;or_fecha_conexion;or_fecha_conexion_tipo;or_cookie;or_cookie_tipo;',
                                pagina+';'+inicio+';'+
                                bs_id_usuario+';'+bs_cedula+';'+bs_nombre+';'+bs_roles+';'+bs_estado_conexion+';'+
                                or_id_usuario+';'+or_id_usuario_tipo+';'+or_cedula+';'+or_cedula_tipo+';'+or_nombre+';'+or_nombre_tipo+';'+
                                or_ape1+';'+or_ape1_tipo+';'+or_ape2+';'+or_ape2_tipo+';'+or_rol+';'+or_rol_tipo+';'+
                                or_estado_conexion+';'+or_estado_conexion_tipo+';'+or_fecha_conexion+';'+or_fecha_conexion_tipo+';'+
                                or_cookie+';'+or_cookie_tipo+';'
                                );
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}

/***********************************************************************/
/*
 funcion Habilita_Efecto()
 Habilita el arreglo de los los efectos para el diseño selecionado
  **>
/***********************************************************************/
var efecto_growl = new Array("[Seleccione]","scale", "slide","genie","jelly");
var efecto_attached = new Array("[Seleccione]","flip", "bouncyflip");
var efecto_bar = new Array("[Seleccione]","slidetop", "exploader");
var efecto_other = new Array("[Seleccione]","boxspinner", "loadingcircle","thumbslider");




        
        
function Habilita_Efecto(){
            
            /*****************************************************/
            /*** Funcio encargada de eliminar los otros combos ***/
            /*****************************************************/
            function limpia(){
             //Si selecciona [Seleccione] en pais debemos eliminar las provicias del combo
                document.getElementById('sl_efecto').length = 1
                
                //Creamos la opcion default [Seleccione] = 0
                document.getElementById('sl_efecto').options[0].value = "0"
                document.getElementById('sl_efecto').options[0].text = "[Seleccione]"
               
                //Deshabilitamos el combo
                document.getElementById('sl_efecto').disabled = true;
                
            }

            
            
            
            
            //Paso1: obtenemos el valor del combo de paises que este seleccionado
            var sl_diseno = document.getElementById('sl_diseno')[document.getElementById('sl_diseno').selectedIndex].value

            limpia();
            
            //Si es diferente a  0 = [Seleccione]
            if (sl_diseno != 0) {
                
                
                
                //eval() recibe una cadena que representa una expresion, sentencia o variable javascript y la evalua
                //Por lo que obtenemos el arreglo
                nuevos_efectos = eval("efecto_" + sl_diseno)

                
                //Se determinamos la cantidad de elementos del nuevo arreglo
                num_efectos = nuevos_efectos.length
                
                //Se le asgina este tamaño al combo de provincias
                document.getElementById('sl_efecto').length = num_efectos
                
                //Por cada elemento del nuevo arreglo se crea una opction del como de provincias
                for(i=0;i<num_efectos;i++){
                    document.getElementById('sl_efecto').options[i].value=nuevos_efectos[i];
                    document.getElementById('sl_efecto').options[i].text=nuevos_efectos[i];
                }
                
                //Habilitamos el combo
                document.getElementById('sl_efecto').disabled = false;

                
            }
                //marco como seleccionada la opción primera de provincia
                document.getElementById('sl_efecto').options[0].selected = true
}

function cambia_efecto(){
    var efecto = document.getElementById('sl_efecto')[document.getElementById('sl_efecto').selectedIndex].value;

    switch(efecto) {
        case 'scale':
        case 'slide':
        case 'genie':
        case 'jelly':
        case 'flip':
        case 'bouncyflip':
        case 'boxspinner':
        case 'loadingcircle':
            document.getElementById('txt_ejemplo').innerHTML ='&lt;p&gt;Esto es un ejemplo &lt;a href="#"&gt;esto es un enlace&lt;/a&gt;.&lt;/p&gt;';
            break;
        case 'slidetop':
            document.getElementById('txt_ejemplo').innerHTML ='&lt;span class="icon icon-megaphone"&gt;&lt;/span&gt;&lt;p&gt;Hay nuevos mensajes. Vaya a &lt;a href="#"&gt;aquí&lt;/a&gt; para verlos.&lt;/p&gt;';
            break;
        case 'bouncyflip':
            document.getElementById('txt_ejemplo').innerHTML ='&lt;span class="icon icon-settings"&gt;&lt;/span&gt;&lt;p&gt;Sus preferencias han sido guardadas. Para verlas vaya &lt;a href="#"&gt;aquí&lt;/a&gt;.&lt;/p&gt;';
            break;
        case 'thumbslider':
            document.getElementById('txt_ejemplo').innerHTML ='&lt;div class="ns-thumb"&gt;&lt;img src="img/SAE/demo.jpg"/&gt;&lt;/div&gt;&lt;div class="ns-content"&gt;&lt;p&gt;&lt;a href="#"&gt;SIUA&lt;/a&gt; a aceptado si invitación.&lt;/p&gt;&lt;/div&gt;';
            break;
        default:
            document.getElementById('txt_ejemplo').innerHTML ='&lt;p&gt;Esto es un ejemplo &lt;a href="#"&gt;esto es un enlace&lt;/a&gt;.&lt;/p&gt;';
    } 
    
}


function GuardaMensajeUsuario(){
     if (Valida_SELECT_0('sl_diseno')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_seleccion_diseno'], //texto
            200, //velocidad
            2000 //tiempo
        );
        return;
    }else if(Valida_SELECT_0('sl_efecto')){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_seleccion_efecto'], //texto
            200, //velocidad
            2000 //tiempo
        );
        return;
    }else if(Valida_TXT('txt_men')){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_digite_mensaje'], //texto
            200, //velocidad
            2000 //tiempo
        );
        return;
    }
    var Id_Usuario = document.getElementById('Id_Usuario').value;
    var diseno = document.getElementById('sl_diseno').value;
    var efecto = document.getElementById('sl_efecto').value;
    var tipo = document.getElementById('sl_tipo').value;
    var tiempo = document.getElementById('txt_tiempo').value;
    if (tiempo =='') {
        tiempo ="6000";
    }
    
    var txt_men = document.getElementById('txt_men').value;
    
    
    if(IMU(Id_Usuario,txt_men,diseno,efecto,tipo,tiempo)){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'success', //error/info/success/default
            texto['Exito']+':', //titulo
            texto['EXITO_agregando_mensaje'], //texto
            200, //velocidad
            2500 //tiempo
        );
        CerrarVentana();
    }
}


/***********************************************************************/
/*
 funcion Act_Des_Usuario()
 Permite activar o desactivar a un usuario del sistema dependiendo del parametro enviado
 llamada Act_Des_Usuario(estado_Actual,Id_Usuario)
 
  **>
/***********************************************************************/
function Act_Des_Usuario(estado,id_usuario){
    
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Usuarios/ajax_act_des_usuario.php";
    
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    /***************************************************/
    /* Datos de busqueda, paginacion  y ordenamiento ***/
    /***************************************************/
    var bs_id_usuario = document.getElementById('bs_id_usuario').value;
    var bs_cedula = document.getElementById('bs_cedula').value;
    var bs_nombre = document.getElementById('bs_nombre').value;
    var bs_roles = document.getElementById('bs_roles').value;
    var bs_estado_conexion = document.getElementById('bs_estado_conexion').value;
        
    var pagina = document.getElementById('pagina').value;
    var inicio = document.getElementById('inicio').value;
        
    var or_id_usuario = document.getElementById('or_id_usuario').value;
    var or_id_usuario_tipo = document.getElementById('or_id_usuario_tipo').value;
    var or_cedula = document.getElementById('or_cedula').value;
    var or_cedula_tipo = document.getElementById('or_cedula_tipo').value;
    var or_nombre = document.getElementById('or_nombre').value;
    var or_nombre_tipo = document.getElementById('or_nombre_tipo').value;
    var or_ape1 = document.getElementById('or_ape1').value;
    var or_ape1_tipo = document.getElementById('or_ape1_tipo').value;
    var or_ape2 = document.getElementById('or_ape2').value;
    var or_ape2_tipo = document.getElementById('or_ape2_tipo').value;
    var or_rol = document.getElementById('or_rol').value;
    var or_rol_tipo = document.getElementById('or_rol_tipo').value;
    var or_estado_conexion = document.getElementById('or_estado_conexion').value;
    var or_estado_conexion_tipo = document.getElementById('or_estado_conexion_tipo').value;
    var or_fecha_conexion = document.getElementById('or_fecha_conexion').value;
    var or_fecha_conexion_tipo = document.getElementById('or_fecha_conexion_tipo').value;
    var or_cookie = document.getElementById('or_cookie').value;
    var or_cookie_tipo = document.getElementById('or_cookie_tipo').value;
    
    /***************************************************/
    /********* Los concatenamos a las parametros *******/
    /***************************************************/
    parametros += 'id_usuario;estado;';
    valores += id_usuario+';'+estado+';';
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       *******/
    /***************************************************/
    miAjax.open('GET',pagina_ajax+'?'+query_string,true);

    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                  
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
                var respuesta = miAjax.responseText.trim();

                //El dato se actualizao correctamente
                /* if (respuesta=='1') {
                    CerrarVentana();
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Exito']+':', //titulo
                        texto['EXITO_desconectado_usuario'], //texto
                        200, //velocidad
                        2500 //tiempo
                    );
                   
                }else if(respuesta=='e1'){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_desconectando_usuario'], //texto
                        200, //velocidad
                        2500 //tiempo
                    );
                }             
                 */   
                //Mandamos a ejecutar los scripts
                scs.evalScript();
                /*CargaPaginaMenu(
                                'Modulos/SAE/Usuarios/con_usuarios.php',
                                'pagina;inicio;'+
                                'bs_id_usuario;bs_cedula;bs_nombre;bs_roles;bs_estado_conexion;'+
                                'or_id_usuario;or_id_usuario_tipo;or_cedula;or_cedula_tipo;or_nombre;or_nombre_tipo;or_ape1;or_ape1_tipo;or_ape2;or_ape2_tipo;'+
                                'or_rol;or_rol_tipo;or_estado_conexion;or_estado_conexion_tipo;or_fecha_conexion;or_fecha_conexion_tipo;or_cookie;or_cookie_tipo;',
                                pagina+';'+inicio+';'+
                                bs_id_usuario+';'+bs_cedula+';'+bs_nombre+';'+bs_roles+';'+bs_estado_conexion+';'+
                                or_id_usuario+';'+or_id_usuario_tipo+';'+or_cedula+';'+or_cedula_tipo+';'+or_nombre+';'+or_nombre_tipo+';'+
                                or_ape1+';'+or_ape1_tipo+';'+or_ape2+';'+or_ape2_tipo+';'+or_rol+';'+or_rol_tipo+';'+
                                or_estado_conexion+';'+or_estado_conexion_tipo+';'+or_fecha_conexion+';'+or_fecha_conexion_tipo+';'+
                                or_cookie+';'+or_cookie_tipo+';'
                                );
                */
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}