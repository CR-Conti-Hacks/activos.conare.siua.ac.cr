function CambiarValidacion_Login() {
    var TI = document.getElementById('TI_login').value;
    //Si es cedula
    if (TI==1) {
        document.getElementById('fila_txt_cedula_login').style.display = "block";
        document.getElementById('fila_txt_residencia_login').style.display = "none";
        document.getElementById('fila_txt_pasaporte_login').style.display = "none";
    }else if (TI==2) {
        document.getElementById('fila_txt_cedula_login').style.display = "none";
        document.getElementById('fila_txt_residencia_login').style.display = "block";
        document.getElementById('fila_txt_pasaporte_login').style.display = "none";
    }else if (TI==3) {
        document.getElementById('fila_txt_cedula_login').style.display = "none";
        document.getElementById('fila_txt_residencia_login').style.display = "none";
        document.getElementById('fila_txt_pasaporte_login').style.display = "block";
    }
    document.getElementById('txt_cedula_login').value ='';
    document.getElementById('txt_residencia_login').value ='';
    document.getElementById('txt_pasaporte_login').value ='';
}

function CambiarValidacion_Desbloquear() {
    var TI = document.getElementById('TI_desbloquear').value;
    //Si es cedula
    if (TI==1) {
        document.getElementById('fila_txt_cedula_desbloquear').style.display = "block";
        document.getElementById('fila_txt_residencia_desbloquear').style.display = "none";
        document.getElementById('fila_txt_pasaporte_desbloquear').style.display = "none";
    }else if (TI==2) {
        document.getElementById('fila_txt_cedula_desbloquear').style.display = "none";
        document.getElementById('fila_txt_residencia_desbloquear').style.display = "block";
        document.getElementById('fila_txt_pasaporte_desbloquear').style.display = "none";
    }else if (TI==3) {
        document.getElementById('fila_txt_cedula_desbloquear').style.display = "none";
        document.getElementById('fila_txt_residencia_desbloquear').style.display = "none";
        document.getElementById('fila_txt_pasaporte_desbloquear').style.display = "block";
    }
    document.getElementById('txt_cedula_desbloquear').value ='';
    document.getElementById('txt_residencia_desbloquear').value ='';
    document.getElementById('txt_pasaporte_desbloquear').value ='';
}


/******************************************************************/
/********************* Funcion ENTER **************************/
//Verifica si se presiono la telca ENTER
//onkeypress="validar_ENTER(event)"
/******************************************************************/
function validar_ENTER(e) {

  tecla = (document.all) ? e.keyCode : e.which;

  if (tecla==13){
    Ingresar()
  }

}

function soloNumeros_Login(Texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
        Ingresar();
    }
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te); 
}

/******************************************************************/
/********************* Funcion Ingresar  **************************/
//Controla validacion de datos
//Datos de ingreso correctos del usuario
/******************************************************************/
function Ingresar(){
    if (NoVacios_login()){
        ValidarUsuario();
    }
}

/******************************************************************/
/********************* Funcion Ingresar  **************************/
//Controla validacion de datos
//Datos de ingreso correctos del usuario
/******************************************************************/
function NoVacios_login(){
        var mensaje_error = document.getElementById('msj_error_login');
        var TI = document.getElementById('TI_login').value;
        
        if ((TI==1) && (Valida_TXT('txt_cedula_login'))) {
             mensaje_error.innerHTML= texto['ERROR_Digitar_Cedula']; 
            $( "#login" ).effect( "shake" );
            return false;
        }else if ((TI==1)&&(longitud_minima('txt_cedula_login',11))) {
            mensaje_error.innerHTML= texto['ERROR_Cedula_9_Digitos'];
            $( "#login" ).effect( "shake" );
            return false;
        }else if ((TI==2)&&(Valida_TXT('txt_residencia_login'))) {
            mensaje_error.innerHTML= texto['ERROR_Digitar_Residencia'];
            $( "#login" ).effect( "shake" );
            return false;
        }else if ((TI==2)&&(longitud_minima('txt_residencia_login',13))) {
            mensaje_error.innerHTML= texto['ERROR_Residencia_13_Digitos'];
            $( "#login" ).effect( "shake" );
            return false;
        }else if ((TI==3)&&(Valida_TXT('txt_pasaporte_login'))) {
            mensaje_error.innerHTML= texto['ERROR_Digitar_Pasaporte'];
            $( "#login" ).effect( "shake" );
            return false;
        }else if(Valida_TXT('clave_login')){
            mensaje_error.innerHTML= texto['ERROR_Digitar_Contrasena'];
            $( "#login" ).effect( "shake" );
            return false;
        }
        return true;
}	




function ValidarUsuario() {

    /***********************************************************/
    /***************** obtenemos los datos *********************/
    /***********************************************************/
    //con MD5 la clave
    var clave = hex_md5(document.getElementById('clave_login').value);
    var TI = document.getElementById('TI_login').value;
    var usuario = '';
    if (TI ==1) {
        usuario = document.getElementById('txt_cedula_login').value;
    }else if (TI==2) {
        usuario = document.getElementById('txt_residencia_login').value;
    }else if (TI==3) {
        usuario = document.getElementById('txt_pasaporte_login').value;
    }
    
    var dominio = document.getElementById('dominio').value;
    var ruta = document.getElementById('ruta').value;
    
    //Si el usuario decide guardar sus datos enviamos un 1 sino un 0
    if (document.getElementById('guardar_clave').checked) {
        guardar_clave = '1';
    }else{
        guardar_clave = '0';    
    }
    
    /***********************************************************/
    /**** metodo de muestra de mensajes al usuario *************/
    /***********************************************************/
    var mensaje_error = document.getElementById('msj_error_login');
    mensaje_error.innerHTML= texto['MSJ_Verificando_Datos'];
    
    

               
    /***********************************************************/
    /***************** Funcion de control  *********************/
    //Si recibimos un 1 (uno) de respuesta exito!
    //->se creo las cookie y el usuario es valido
    //->redirijimos a Principal.php
    //----------------------------------------------------------
    //Si recibimos un 'e1': error los datos del usuario no son
    //correctos
    //----------------------------------------------------------
    //Si recibimos un 'e2': error guardando la clave cookie del
    //usuario
    /***********************************************************/    
    var miAjax=NuevoAjax();
                
    var parametros="usuario="+usuario+"&clave="+clave+'&guardar_clave='+guardar_clave+'&TI='+TI;
    var pagina="ValidaUsuario.php?"
    miAjax.open("GET",pagina+"&"+parametros,true);
    miAjax.onreadystatechange=function() {
        if(miAjax.readyState==4){
            if(miAjax.status==200){
                
                 var respuesta = miAjax.responseText;
              
                
                /*El Login no Existe*/
		if(respuesta == "e1"){
                    mensaje = texto['ERROR_index_001'];
                /* El Password No Concuerda con el Usuario*/
		}else if(respuesta == "e2"){
                    mensaje = texto['ERROR_index_002'];
                /*Se ha logeado en otro navegador o no se cerro correctamente la session anterior*/
                }else if(respuesta == "e3"){
                    alert(texto['ERROR_index_003']);
                    /* redirigir a recuperar contraseña:*/
                    var estado = document.getElementById('Desbloquear').style.display;
                    mensaje = '';
                    if (estado=='none') {
                      //$('#login').show(); y hide();fadeOut(500);fadeIn(700);
                      $('#login').fadeOut(500);
                      $('#Desbloquear').slideDown("slow");
                      //Darle el foco a la caja de usuario
                      document.getElementById('usuario_desbloquear').focus();
                      document.getElementById('usuario_desbloquear').value='';
                      document.getElementById('clave_desbloquear').value='';
                    }else{
                      $('#Desbloquear').fadeOut(500);
                      $('#login').slideDown("slow");
                      //Darle el foco a la caja de usuario
                      document.getElementById('usuario').focus();
                      
                    }
                            
                /* Error creando la cookie*/
                }else if (respuesta =="e4") {
                    mensaje = texto['ERROR_index_004'];
                /*Error creando la session*/
                }else if (respuesta =="e5") {
                    mensaje = texto['ERROR_index_005'];
                }
                
                //mostrar el error y sacudir ventana y regresar false
                if((respuesta =="e1") || (respuesta=="e2") || (respuesta=="e3") || (respuesta=="e4") || (respuesta=="e5")){
                    mensaje_error.innerHTML=mensaje;
                    $( "#login" ).effect( "shake" );
                    return false
		}else{
                         //adjuntamos a la session la URL creada
                        var res = SubirSessionURL(dominio+ruta+"Principal.php?cedula=",respuesta);
                  
                        //Si la session se creo correctamente
                        if(res==1){
                            location.href=dominio+ruta+"Principal.php?cedula="+respuesta;              
                        }else{
                            mensaje_error.innerHTML=texto['ERROR_index_006'];
                            $( "#login" ).effect( "shake" );
                            return false             
                        }
                }
                
                
            }
        }
        return true;
    }
    miAjax.send(null);
}



              
      