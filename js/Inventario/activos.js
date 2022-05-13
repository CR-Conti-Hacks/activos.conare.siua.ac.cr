/********************************************************************/
/******************** Función getParametros *************************/
/********************************************************************/
function getParametros (){
    var parametros =    
                        //Paginación
                        'pagina;'+
                        'inicio;'+

                        //SAE
                        'sae_cantidadRegistros;'+
                        
                        //Datos Activo 
                        'bs_Id_Act;'+
                        'bs_Nombre_Act;'+
                        'bs_Marca_Act;'+
                        'bs_Modelo_Act;'+
                        'bs_Color_Act;'+
                        'bs_Numero_Serie_Act;'+


                        //Identificadores de Activo
                        'bs_Id_INS_Act;'+
                        'bs_Id_Uni_Act;'+

                        //Activo Fijo
                        'bs_Activo_Fijo_Act;'+
                        'bs_No_Activo_Fijo_Act;'+

                        //Fecha y año Recepción
                        'bs_Fecha_Recepcion_Act;'+
                        'bs_anno_inicio;'+
                        'bs_anno_fin;'+
                        

                        //Datos de compra
                        'bs_Numero_OC;'+
                        'bs_Numero_Factu;'+
                        'bs_Numero_Prove;'+
                        'bs_Id_Compromiso;'+
                        'bs_Id_Partida;'+
                        'bs_Id_Transferencia;'+

                        //Ubicación
                        'bs_Id_Zona_tmp_Act;'+


                        //CONARE: Responsables
                        'bs_Id_Res;'+
                        'bs_Id_Cus;'+

                        //Estados
                        'bs_Desecho_Act;'+
                        'bs_Donacion_Act;'+
                        'bs_Mantenimiento_Act;'+

                        //Verificación
                        'bs_Verificado_Act;'+
                        'bs_No_Verificado_Act;'+

                        
                        'or_Id_Act;'+
                        'or_tipo_Id_Act;'+

                        'or_Nombre_Act;'+
                        'or_tipo_Nombre_Act;'+

                        'or_Marca_Act;'+
                        'or_tipo_or_Marca_Act;'+

                        'or_Numero_Serie_Act;'+
                        'or_tipo_Numero_Serie_Act;'+

                        'or_Nombre_Uni;'+
                        'or_tipo_Nombre_Uni;'+

                        'or_Id_INS_Act;'+
                        'or_tipo_Id_INS_Act;'+

                        'or_Nombre_Zonas_tmp;'+
                        'or_tipo_Nombre_Zonas_tmp;'+

                        'or_Activo_Fijo_Act;'+
                        'or_tipo_Activo_Fijo_Act;';
return parametros;
}

/********************************************************************/
/******************** Función getValores    *************************/
/********************************************************************/
function getValores(pagina,inicio){

//Verificar los valores de pagina e inicio

//Si no vienen valores es 0
if(pagina ==""){
    pagina = '0';
}
if(inicio ==""){
    inicio = '0';
}

var valores =   
                //Paginación
                pagina+";"+
                inicio+";"+

                //SAE
                document.getElementById('sae_cantidadRegistros').value+';'+

                //Datos Activo 
                document.getElementById('bs_Id_Act').value+';'+
                document.getElementById('bs_Nombre_Act').value+';'+
                document.getElementById('bs_Marca_Act').value+';'+
                document.getElementById('bs_Modelo_Act').value+';'+
                document.getElementById('bs_Color_Act').value+';'+
                document.getElementById('bs_Numero_Serie_Act').value+';'+

                //Identificadores de Activo
                document.getElementById('bs_Id_INS_Act').value+';'+
                document.getElementById('bs_Id_Uni_Act').value+';'+

                //Activo Fijo
                document.getElementById('bs_Activo_Fijo_Act').checked+';'+
                document.getElementById('bs_No_Activo_Fijo_Act').checked+';'+
                

                //Fecha y año Recepción
                document.getElementById('bs_Fecha_Recepcion_Act').value+';'+
                document.getElementById('bs_anno_inicio').value+';'+
                document.getElementById('bs_anno_fin').value+';'+

                //Datos de compra
                document.getElementById('bs_Numero_OC').value+';'+
                document.getElementById('bs_Numero_Factu').value+';'+
                document.getElementById('bs_Numero_Prove').value+';'+
                document.getElementById('bs_Id_Compromiso').value+';'+
                document.getElementById('bs_Id_Partida').value+';'+
                document.getElementById('bs_Id_Transferencia').value+';'+

                //Ubicación
                document.getElementById('bs_Id_Zona_tmp_Act').value+';'+

                //CONARE: Responsables
                document.getElementById('bs_Id_Res').value+';'+
                document.getElementById('bs_Id_Cus').value+';'+

                //Estados
                document.getElementById('bs_Desecho_Act').checked+';'+
                document.getElementById('bs_Donacion_Act').checked+';'+
                document.getElementById('bs_Mantenimiento_Act').checked+';'+

                //Verificación
                document.getElementById('bs_Verificado_Act').checked+';'+
                document.getElementById('bs_No_Verificado_Act').checked+';'+

                
                
                document.getElementById('or_Id_Act').value+';'+
                document.getElementById('or_tipo_Id_Act').value+';'+
                document.getElementById('or_Nombre_Act').value+';'+
                document.getElementById('or_tipo_Nombre_Act').value+';'+
                document.getElementById('or_Marca_Act').value+';'+
                document.getElementById('or_tipo_or_Marca_Act').value+';'+
                document.getElementById('or_Numero_Serie_Act').value+';'+
                document.getElementById('or_tipo_Numero_Serie_Act').value+';'+
                document.getElementById('or_Nombre_Uni').value+';'+
                document.getElementById('or_tipo_Nombre_Uni').value+';'+
                document.getElementById('or_Id_INS_Act').value+';'+
                document.getElementById('or_tipo_Id_INS_Act').value+';'+
                document.getElementById('or_Nombre_Zonas_tmp').value+';'+
                document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';'+
                document.getElementById('or_Activo_Fijo_Act').value+';'+
                document.getElementById('or_tipo_Activo_Fijo_Act').value+';'
                ;
    return valores;
}



function cargarConsultaActivos(){

     var parametros =    
                    
                        //Datos Activo 
                        'bs_Id_Act;'+
                        'bs_Nombre_Act;'+
                        'bs_Marca_Act;'+
                        'bs_Modelo_Act;'+
                        'bs_Color_Act;'+
                        'bs_Numero_Serie_Act;'+


                        //Identificadores de Activo
                        'bs_Id_INS_Act;'+
                        'bs_Id_Uni_Act;'+

                        //Activo Fijo
                        'bs_Activo_Fijo_Act;'+
                        'bs_No_Activo_Fijo_Act;'+

                        //Fecha y año Recepción
                        'bs_Fecha_Recepcion_Act;'+
                        'bs_anno_inicio;'+
                        'bs_anno_fin;'+
                        

                        //Datos de compra
                        'bs_Numero_OC;'+
                        'bs_Numero_Factu;'+
                        'bs_Numero_Prove;'+
                        'bs_Id_Compromiso;'+
                        'bs_Id_Partida;'+
                        'bs_Id_Transferencia;'+

                        //Ubicación
                        'bs_Id_Zona_tmp_Act;'+


                        //CONARE: Responsables
                        'bs_Id_Res;'+
                        'bs_Id_Cus;'+

                        //Estados
                        'bs_Desecho_Act;'+
                        'bs_Donacion_Act;'+
                        'bs_Mantenimiento_Act;'+

                        //Verificación
                        'bs_Verificado_Act;'+
                        'bs_No_Verificado_Act;'+

                        
                        'or_Id_Act;'+
                        'or_tipo_Id_Act;'+

                        'or_Nombre_Act;'+
                        'or_tipo_Nombre_Act;'+

                        'or_Marca_Act;'+
                        'or_tipo_or_Marca_Act;'+

                        'or_Numero_Serie_Act;'+
                        'or_tipo_Numero_Serie_Act;'+

                        'or_Nombre_Uni;'+
                        'or_tipo_Nombre_Uni;'+

                        'or_Id_INS_Act;'+
                        'or_tipo_Id_INS_Act;'+

                        'or_Nombre_Zonas_tmp;'+
                        'or_tipo_Nombre_Zonas_tmp;'+

                        'or_Activo_Fijo_Act;'+
                        'or_tipo_Activo_Fijo_Act;';
    var valores =   

                        //Datos Activo 
                        document.getElementById('bs_Id_Act').value+';'+
                        document.getElementById('bs_Nombre_Act').value+';'+
                        document.getElementById('bs_Marca_Act').value+';'+
                        document.getElementById('bs_Modelo_Act').value+';'+
                        document.getElementById('bs_Color_Act').value+';'+
                        document.getElementById('bs_Numero_Serie_Act').value+';'+

                        //Identificadores de Activo
                        document.getElementById('bs_Id_INS_Act').value+';'+
                        document.getElementById('bs_Id_Uni_Act').value+';'+

                        //Activo Fijo
                        document.getElementById('bs_Activo_Fijo_Act').checked+';'+
                        document.getElementById('bs_No_Activo_Fijo_Act').checked+';'+
                        

                        //Fecha y año Recepción
                        document.getElementById('bs_Fecha_Recepcion_Act').value+';'+
                        document.getElementById('bs_anno_inicio').value+';'+
                        document.getElementById('bs_anno_fin').value+';'+

                        //Datos de compra
                        document.getElementById('bs_Numero_OC').value+';'+
                        document.getElementById('bs_Numero_Factu').value+';'+
                        document.getElementById('bs_Numero_Prove').value+';'+
                        document.getElementById('bs_Id_Compromiso').value+';'+
                        document.getElementById('bs_Id_Partida').value+';'+
                        document.getElementById('bs_Id_Transferencia').value+';'+

                        //Ubicación
                        document.getElementById('bs_Id_Zona_tmp_Act').value+';'+

                        //CONARE: Responsables
                        document.getElementById('bs_Id_Res').value+';'+
                        document.getElementById('bs_Id_Cus').value+';'+

                        //Estados
                        document.getElementById('bs_Desecho_Act').checked+';'+
                        document.getElementById('bs_Donacion_Act').checked+';'+
                        document.getElementById('bs_Mantenimiento_Act').checked+';'+

                        //Verificación
                        document.getElementById('bs_Verificado_Act').checked+';'+
                        document.getElementById('bs_No_Verificado_Act').checked+';'+

                        
                        
                        document.getElementById('or_Id_Act').value+';'+
                        document.getElementById('or_tipo_Id_Act').value+';'+
                        document.getElementById('or_Nombre_Act').value+';'+
                        document.getElementById('or_tipo_Nombre_Act').value+';'+
                        document.getElementById('or_Marca_Act').value+';'+
                        document.getElementById('or_tipo_or_Marca_Act').value+';'+
                        document.getElementById('or_Numero_Serie_Act').value+';'+
                        document.getElementById('or_tipo_Numero_Serie_Act').value+';'+
                        document.getElementById('or_Nombre_Uni').value+';'+
                        document.getElementById('or_tipo_Nombre_Uni').value+';'+
                        document.getElementById('or_Id_INS_Act').value+';'+
                        document.getElementById('or_tipo_Id_INS_Act').value+';'+
                        document.getElementById('or_Nombre_Zonas_tmp').value+';'+
                        document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';'+
                        document.getElementById('or_Activo_Fijo_Act').value+';'+
                        document.getElementById('or_tipo_Activo_Fijo_Act').value+';'
                ;

    CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
                                                       'mostrar_efecto;'+
                                                       parametros,
                                                       '1;'+
                                                       valores);
}

function exportarTabla(pagina, inicio){




    

    
    


    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var dominio = document.getElementById('dominio').value;
    var ruta = document.getElementById('ruta').value;

    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;

    

    /***************************************************/
    //Obtener y evaluar las variables globales
    /***************************************************/
    parametros = getParametros();
    valores = getValores(pagina,inicio);



    /***************************************************/
    //Concatenar valores de seguridad
    /***************************************************/
    parametros += 'cedula_global;Id_Per_Usu;Key_Usu;';
    valores += cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    /*console.log(parametros)
    console.log(valores)*/

    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    //console.log(query_string)

    var url = dominio+ruta+"Modulos/Inventario/activos/con_activos_imprimir.php"+'?'+query_string;
    //console.log(url)
    window.open(url, '_blank').focus();
    /*$('#table_activos').tableExport({
                    type : 'csv', 
                    fileName: 'MiCompras',  
                    pdfmake: { 
                        enabled: true
                    }
                    


                }); */
}

function validaFormularioBusquedaActivos(){
    
    //Validar si digito las 2 fechas de inicio y fin
    if ( (document.querySelector("#bs_anno_inicio").value != '' ) && (document.querySelector("#bs_anno_fin").value == '') ){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar la fecha fin', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    //validar fecha anterio a fecha de inicio
    }else if((document.querySelector("#bs_anno_inicio").value != '' ) && (document.querySelector("#bs_anno_fin").value != '')) {
        const FI = new Date(document.querySelector("#bs_anno_inicio").value);
        const FF = new Date(document.querySelector("#bs_anno_fin").value);
        if(FI>FF){
            $(this).notifyMe(
                'top', //Bottom/top/left/ right
                'error', //error/info/success/default
                texto['Error']+':', //titulo
                'La fecha de inicio debe ser menor que la fecha fin', //texto
                400, //velocidad
                2400 //tiempo
             );
            window.scrollTo(0,0);
            return false;
        }else{

            /***************************************************/
            //Obtener y evaluar las variables globales
            /***************************************************/
            var parametros = getParametros();
            var valores = getValores("","");



            /***************************************************/
            //Mandar a buscar
            /***************************************************/
            Buscar(
                '',
                'Modulos/Inventario/activos/con_activos.php',
                parametros,
                valores);
        }
    }else{

        /***************************************************/
        //Obtener y evaluar las variables globales
        /***************************************************/
        var parametros = getParametros();
        var valores = getValores("","");

        /***************************************************/
        //Mandar a buscar
        /***************************************************/
        Buscar(
            '',
            'Modulos/Inventario/activos/con_activos.php',
            parametros,
            valores);
    }
}

function cambiaCantidadRegistros(){
    /***************************************************/
    //Obtener y evaluar las variables globales
    /***************************************************/
    var parametros = getParametros();
    var valores = getValores("","");

    /***************************************************/
    //Mandar a buscar
    /***************************************************/
    Buscar(
        '',
        'Modulos/Inventario/activos/con_activos.php',
        parametros,
        valores);
}

function activosBuscarLimpiar(){

    ///Datos Activo 
    document.querySelector("#bs_Id_Act").value = "";
    document.querySelector("#bs_Nombre_Act").value = "";
    document.querySelector("#bs_Marca_Act").value = "";
    document.querySelector("#bs_Modelo_Act").value = "";
    document.querySelector("#bs_Color_Act").value = "";
    document.querySelector("#bs_Numero_Serie_Act").value = "";

    
    //Identificadores de Activo
    document.querySelector("#bs_Id_INS_Act").value = "";
    document.querySelector("#bs_Id_Uni_Act").selectedIndex = "0"; 
    document.querySelector("#bs_Id_Uni_Act").fstdropdown.rebind();

    //Activo Fijo
    document.querySelector("#bs_Activo_Fijo_Act").checked = false;
    document.querySelector("#bs_No_Activo_Fijo_Act").checked = false;

    //Fecha y año Recepción
    document.querySelector("#bs_Fecha_Recepcion_Act").value = "";
    document.querySelector("#bs_anno_inicio").value = "";
    document.querySelector("#bs_anno_fin").value = "";
    document.querySelector("#bs_anno_fin").disabled = true;
    
    //Datos de compra
    document.querySelector("#bs_Numero_OC").selectedIndex = "0"; 
    document.querySelector("#bs_Numero_OC").fstdropdown.rebind();
    document.querySelector("#bs_Numero_Factu").selectedIndex = "0"; 
    document.querySelector("#bs_Numero_Factu").fstdropdown.rebind();
    document.querySelector("#bs_Numero_Prove").selectedIndex = "0"; 
    document.querySelector("#bs_Numero_Prove").fstdropdown.rebind();
    document.querySelector("#bs_Id_Compromiso").selectedIndex = "0"; 
    document.querySelector("#bs_Id_Compromiso").fstdropdown.rebind();
    document.querySelector("#bs_Id_Partida").selectedIndex = "0"; 
    document.querySelector("#bs_Id_Partida").fstdropdown.rebind();
    document.querySelector("#bs_Id_Transferencia").selectedIndex = "0"; 
    document.querySelector("#bs_Id_Transferencia").fstdropdown.rebind();
    
    //Ubicación
    document.querySelector("#bs_Id_Zona_tmp_Act").selectedIndex = "0"; 
    document.querySelector("#bs_Id_Zona_tmp_Act").fstdropdown.rebind();
    
    //CONARE: Responsables
    document.querySelector("#bs_Id_Res").selectedIndex = "0"; 
    document.querySelector("#bs_Id_Res").fstdropdown.rebind();
    document.querySelector("#bs_Id_Cus").selectedIndex = "0"; 
    document.querySelector("#bs_Id_Cus").fstdropdown.rebind();

    //Estados
    document.querySelector("#bs_Desecho_Act").checked = false;
    document.querySelector("#bs_Donacion_Act").checked = false;
    document.querySelector("#bs_Mantenimiento_Act").checked = false;

    //Verificación
    document.querySelector("#bs_Verificado_Act").checked = false;
    document.querySelector("#bs_No_Verificado_Act").checked = false;

    /***************************************************/
    //Obtener y evaluar las variables globales
    /***************************************************/
    var parametros = getParametros();
    var valores = getValores("","");

    /***************************************************/
    //Mandar a buscar
    /***************************************************/
    Buscar(
        '',
        'Modulos/Inventario/activos/con_activos.php',
        parametros,
        valores);


}

function verificacionVerificarActivoSIUA(){

    //obtenemos el valor
    var Id_Act = document.querySelector("#Id_Act").value;
    
    //Truncampos ceros del inicio
    Id_Act = Id_Act.replace(/^0+/, '');
    document.querySelector("#Id_Act").value = Id_Act;


    var Id_Zona = document.querySelector("#id_zona").value;
    var Id_Ins = document.querySelector("#id_ins").value;


    if(!isNaN(Id_Act)){

        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.querySelector('#cedula_global').value;
        var Id_Per_Usu = document.querySelector('#Id_Per_Usu').value;
        var Key_Usu = document.querySelector('#Key_Usu').value;

        var formData = new FormData();
    
        formData.append("cedula_global", cedula_global);
        formData.append("Id_Per_Usu", Id_Per_Usu);
        formData.append("Key_Usu", Key_Usu);

        formData.append("Id_Act", Id_Act);
        formData.append("Id_Zona", Id_Zona);
        formData.append("Id_Ins", Id_Ins);

            

        $.ajax({
            url: "Modulos/Inventario/activos/verificaExistenciaActivo_verifica_activos_zona_institucion.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
         .done(function(respuesta){

            if(respuesta == "e1"){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'El activo digitado no existe', //texto
                    400, //velocidad
                    2400 //tiempo
                );
                return;
            }else if(respuesta=="e2"){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'El activo digitado no pertenece a la zona selecionada', //texto
                    400, //velocidad
                    2400 //tiempo
                );
                return;
            }else if(respuesta=="e3"){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'Usted no tiene derecho a verificar este activo ya que usted no pertenece a la institución dueña del activo', //texto
                    400, //velocidad
                    4000 //tiempo
                );
                return;
            }else if(respuesta=="e4"){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'El activo no pertenece a la institución seleccionada', //texto
                    400, //velocidad
                    4000 //tiempo
                );
                return;
            }else if(respuesta==0){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'Ha ocurrido un error al intentar validar este activo, por favor intentelo más tarde', //texto
                    400, //velocidad
                    4000 //tiempo
                );
                return;
            }else if(respuesta==1){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'success', //error/info/success/default
                    texto['Exito']+':', //titulo
                    'El activo se ha validado correctamente', //texto
                    400, //velocidad
                    4000 //tiempo
                );

                /*Modificar valor de la imagen*/
                document.querySelector("#imagen"+Id_Act).src = "img/SAE/si.png";
                var hijo = document.querySelector("#fila"+Id_Act);
                document.querySelector("#listaActivosVerificados").appendChild(hijo);

             
            }    

        });



        
     
            
    }else{
        document.querySelector("#Id_Act").value = "";
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'El activo digitado debe ser un número de activo válido (solo números)', //texto
            400, //velocidad
            2400 //tiempo
        );
        return;
    }
   

    
}


function valida_desverificar_x_zona_institucion(objeto){

    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.querySelector('#cedula_global').value;
    var Id_Per_Usu = document.querySelector('#Id_Per_Usu').value;
    var Key_Usu = document.querySelector('#Key_Usu').value;


    /*Campos del formulario*/
    var Id_Zona = document.querySelector("#id_zona").value;
    var Id_Ins = document.querySelector("#id_ins").value;


    if(Id_Zona==0){
        /*Si no ha seleccionado ningúna zona*/
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            "Debe seleccionar la zona que desea desverificar", //texto
            200, //velocidad
            3500 //tiempo
        );
        document.querySelector("#id_zona").focus();
        return false;
    }
    MostrarVentana(
        objeto,
        1,
        'Modulos/Inventario/activos/valida_desverificar_x_zona_institucion.php',
        'Id_Zona;Id_Ins;cedula_global;Id_Per_Usu;Key_Usu;',
        Id_Zona+';'+Id_Ins+';'+cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';');

    
}



function desverificar_x_zona_institucion(){

    CerrarVentana();
    document.querySelector("#saePreloader").style.display = "block";

    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.querySelector('#cedula_global').value;
    var Id_Per_Usu = document.querySelector('#Id_Per_Usu').value;
    var Key_Usu = document.querySelector('#Key_Usu').value;
        

    /*Campos del formulario*/
    var Id_Zona = document.querySelector("#id_zona").value;
    var Id_Ins = document.querySelector("#id_ins").value;
    
    
    var formData = new FormData();
    
    formData.append("cedula_global", cedula_global);
    formData.append("Id_Per_Usu", Id_Per_Usu);
    formData.append("Key_Usu", Key_Usu);

    formData.append("Id_Zona", Id_Zona);
    formData.append("Id_Ins", Id_Ins);
        

    $.ajax({
        url: "Modulos/Inventario/activos/ajax_desverificar_x_zona_institucion.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
     .done(function(res){
        console.log(res)
        if (res==1) {
            $(this).notifyMe(
                'top', //Bottom/top/left/ right
                'success', //error/info/success/default
                texto['Exito']+':', //titulo
                "Los activos han sido actualizados correctamente", //texto
                200, //velocidad
                4500 //tiempo
            );
            Buscar(
                    '',
                    'Modulos/Inventario/activos/verifica_x_zona.php',
                    'id_zona;id_ins;',
                    document.getElementById('id_zona').value+';'+
                    document.getElementById('id_ins').value+';');
       
        }else if(res =="e1"){
            $(this).notifyMe(
                'top', //Bottom/top/left/ right
                'error', //error/info/success/default
                texto['Error']+':', //titulo
                "ha ocurrido un error al actualizar los activos, intentelo más tarde", //texto
                200, //velocidad
                3500 //tiempo
            );
           
        }        
        document.querySelector("#saePreloader").style.display = "none";
    });
}


function trasiegoAgregaActivoSIUA(){

    //obtenemos el valor
    var Id_Act = document.querySelector("#Id_Act").value;
    
    //Truncampos ceros del inicio
    Id_Act = Id_Act.replace(/^0+/, '');
    document.querySelector("#Id_Act").value = Id_Act;

    //Si ya existe salga
    var filaPorCrear = document.getElementById('fila'+Id_Act);
    if (document.body.contains(filaPorCrear)) {
        document.querySelector("#Id_Act").value = "";
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'El activo ya existe en la lista de activos', //texto
            400, //velocidad
            2400 //tiempo
        );
        return;
    }


    if(!isNaN(Id_Act)){


         /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.querySelector('#cedula_global').value;
        var Id_Per_Usu = document.querySelector('#Id_Per_Usu').value;
        var Key_Usu = document.querySelector('#Key_Usu').value;
        
        var formData = new FormData();
    
        formData.append("cedula_global", cedula_global);
        formData.append("Id_Per_Usu", Id_Per_Usu);
        formData.append("Key_Usu", Key_Usu);
        formData.append("Id_Act", Id_Act);

       $.ajax({
            url: "Modulos/Inventario/activos/ajax_valida_trasiego.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
         .done(function(respuesta){
            console.log(respuesta)
            if(respuesta == "e1"){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'El activo digitado no existe', //texto
                    400, //velocidad
                    2400 //tiempo
                );
                return;
            }else if(respuesta=="e2"){
                document.querySelector("#Id_Act").value = "";
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'Se le informa que usted no tiene derecho de trasegar este activo', //texto
                    400, //velocidad
                    2400 //tiempo
                );
                return;
            }else{
                //obtenemos el padre y insertamos sin perder los event lsitenes
                document.querySelector('#trasiegoListaActivos').insertAdjacentHTML('beforeend', respuesta);
                $('#fancybox_principal'+Id_Act).fancybox();
                document.querySelector("#Id_Act").value = "";
            }

        });

        
     
            
    }else{
        document.querySelector("#Id_Act").value = "";
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'El activo digitado debe ser un número de activo válido (Solo números)', //texto
            400, //velocidad
            2400 //tiempo
        );
        return;
    }
   

    
}

function trasiegoEliminarFila(idfila){
    var filaPorEliminar = document.getElementById(idfila);
    if (document.body.contains(filaPorEliminar)) {
        padre = filaPorEliminar.parentNode;
        padre.removeChild(filaPorEliminar);
    }
}

function trasiegoGuardar(){

    document.querySelector("#saePreloader").style.display = "block";

    var array_LAXG = document.getElementsByName('LAXG[]');


    if (Valida_SELECT_0('Id_Zonas_tmp_Act')) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe selecionar la nueva ubicación de los activos', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if( Valida_TXT('motivoCambioUbicacion')){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el motivo del cambio de ubicación', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (array_LAXG[0] == null || array_LAXG[0] =='undefined' ) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe agregar al menos un activo válido', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else{
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.querySelector('#cedula_global').value;
        var Id_Per_Usu = document.querySelector('#Id_Per_Usu').value;
        var Key_Usu = document.querySelector('#Key_Usu').value;
        var pagina = "";

        //Creamos los datos para enviar
        LAXG = "";
        for(var i=0;i< array_LAXG.length;i++){
            LAXG += array_LAXG[i].value + '/';
           
        }
        var  zona = document.getElementById('Id_Zonas_tmp_Act').value;
        var  motivo = document.getElementById('motivoCambioUbicacion').value;
        var enviarCorreoTrasiego = 0;
        if(document.querySelector("#enviarCorreoTrasiego").checked){
            enviarCorreoTrasiego = 1;
        }

        var formData = new FormData();
        formData.append("cedula_global", cedula_global);
        formData.append("Id_Per_Usu", Id_Per_Usu);
        formData.append("Key_Usu", Key_Usu);
        formData.append("LAXG", LAXG);
        formData.append("zona", zona);
        formData.append("motivo", motivo);
        formData.append("enviarCorreoTrasiego", enviarCorreoTrasiego);

        $.ajax({
            url: "Modulos/Inventario/activos/ajax_trasiego.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
         .done(function(res){
            console.log(res)
            if (res==1) {
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'success', //error/info/success/default
                    texto['Exito']+':', //titulo
                    "El traseigo se ha creado correctamente", //texto
                    200, //velocidad
                    4500 //tiempo
                );
           
            }else if(res =="e1"){
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    "ha ocurrido un error al crear el trasiego y se ha realizado un rollback", //texto
                    200, //velocidad
                    3500 //tiempo
                );
               
            }else if(res =="e2"){
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    "ha ocurrido un error inesperado, intentelo más tarde!", //texto
                    200, //velocidad
                    3500 //tiempo
                );
               
            }
            CargaPaginaMenu('Modulos/Inventario/activos/trasiego.php','mostrar_efecto;','1;');
            document.querySelector("#saePreloader").style.display = "none";
        });
        

    }



}

function Verificar_Activo(id,Id_Act) {

    if(document.getElementById(id).checked){
        tipo = "marcar";
    }else{
        tipo ="desmarcar";
    }
    //Variables
    var pagina = "Modulos/Inventario/activos/verifica_activo.php";
   
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
        
    var parametros = "Id_Act="+Id_Act+"&tipo="+tipo+"&cedula_global="+cedula_global+"&Id_Per_Usu="+Id_Per_Usu+"&Key_Usu="+Key_Usu;
    

    var formData = new FormData();
        formData.append("cedula_global", cedula_global);
        formData.append("Id_Per_Usu", Id_Per_Usu);
        formData.append("Key_Usu", Key_Usu);
        formData.append("tipo", tipo);
        formData.append("Id_Act", Id_Act);

    $.ajax({
            url:pagina,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
         .done(function(res){

            if (res ==1) {
		        $(this).notifyMe(
		            'top', //Bottom/top/left/ right
		            'success', //error/info/success/default
		            texto['Exito']+':', //titulo
		            'Se ha actualizado correctamente el activo', //texto
		            400, //velocidad
		            2400 //tiempo
		        );    
		    }else{
		        $(this).notifyMe(
		            'top', //Bottom/top/left/ right
		            'error', //error/info/success/default
		            texto['Error']+':', //titulo
		            'Ha ocurrido un error intentelo más tarde', //texto
		            400, //velocidad
		            2400 //tiempo
		        );
		    }
        });

  
    
}



function modifica_Activo_Fijo(id,Id_Act) {



    //Determinar el tipo de cambio
    if(document.getElementById(id).getAttribute('data-valor') == 0){
        tipo = "SIAF";
        img_src = "img/SAE/si.png";
        dataValor = '1';
    }else{
        tipo ="NOAF";
        img_src = "img/SAE/no.png";
        dataValor = '0';
    }
    
    
    //Variables
    var pagina = "Modulos/Inventario/activos/modifica_activo_fijo.php";
   
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
        
    var parametros = "Id_Act="+Id_Act+"&tipo="+tipo+"&cedula_global="+cedula_global+"&Id_Per_Usu="+Id_Per_Usu+"&Key_Usu="+Key_Usu;
    

    var formData = new FormData();
        formData.append("cedula_global", cedula_global);
        formData.append("Id_Per_Usu", Id_Per_Usu);
        formData.append("Key_Usu", Key_Usu);
        formData.append("tipo", tipo);
        formData.append("Id_Act", Id_Act);

    $.ajax({
            url:pagina,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
         .done(function(res){

            if (res ==1) {
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'success', //error/info/success/default
                    texto['Exito']+':', //titulo
                    'Se ha actualizado correctamente el activo', //texto
                    400, //velocidad
                    2400 //tiempo
                );   
                //Actualizar activo
                document.getElementById(id).src = img_src;
                document.getElementById(id).setAttribute('data-valor',dataValor);
                
            }else{
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    'Ha ocurrido un error intentelo mas tarde', //texto
                    400, //velocidad
                    2400 //tiempo
                );
            }
        });

         
  
    
}



function Habilitar_Facturas(){
   
    
    var Id_OC = document.getElementById('Id_OC').value;
    Reinicia_Combo('Id_Factu_Act');
    
    
    
            
    //Variables
    var pagina = "Modulos/Inventario/activos/Habilita_Facturas.php";
   
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    


    var parametros = "Id_OC="+Id_OC+"&cedula_global="+cedula_global+"&Id_Per_Usu="+Id_Per_Usu+"&Key_Usu="+Key_Usu;
     
     
    var URL = pagina+"?"+parametros;
    var destino = document.getElementById('div_Id_Factu_Act');
    var miAjax = NuevoAjax();
    
    //Abrimos la pagina de forma sincrona
    //para deterner a javascript hasta recibir un resultado
    miAjax.open("GET",URL,false);
    miAjax.send(null);
    error = miAjax.responseText;
    destino.innerHTML= error;

}



function Habilitar_Facturas_JSON(obj,destino){
   
    /*******************************************************************/
    /***********************   Id de Objeto     ************************/
    /*******************************************************************/
    var Id_OC = document.querySelector('#'+obj).value;



    //Debemos reiniciar los combos
    if(Id_OC ==0){
         Reinicia_Combo(destino);
         document.querySelector("#"+destino).fstdropdown.rebind();
    }else{
        /*******************************************************************/
        /**********************REINICIAR RESPONSABLES **********************/
        /*******************************************************************/
        Reinicia_Combo(destino);
        
        //Combo busqueda
        document.querySelector("#"+destino).fstdropdown.rebind();
        
        
        
        /*******************************************************************/
        /**********************        PAGINAS        **********************/
        /*******************************************************************/
        var pagina = "Modulos/Inventario/activos/Habilita_Facturas_JSON.php";
       
        

        /*******************************************************************/
        /******************           URL's           **********************/
        /*******************************************************************/
        var parametros = "Id_OC="+Id_OC;
        var URL = pagina+"?"+parametros;


         
        /*******************************************************************/
        /***********           AJAX RESPONSABLES         *******************/
        /*******************************************************************/

        var xhr = new XMLHttpRequest();
        xhr.overrideMimeType("application/json");
        xhr.open('GET',URL,true);
        xhr.onload = function(e) { 
          if (this.status == 200) {
            //parseamos la respuesta que viene en formato json
            var respuesta = JSON.parse(this.response);
            

            //Combo busqueda
            document.querySelector("#"+destino).fstdropdown.rebind();

            for (var i = 0; i < respuesta.length; i++) {
                option = new Option(respuesta[i].Numero_Factu, respuesta[i].Id_Factu);
                document.querySelector("#"+destino).appendChild(option);

            }
            document.querySelector("#"+destino).fstdropdown.rebind();

           
          }
        };
        xhr.send(null);

    }


    
}



function Habilita_Responsables_Custodios(objeto,responsable,custodio){
    
    //Obtenemos el objeto
    var  uni = document.querySelector("#"+objeto);


    //Debemos reiniciar los combos
    if(uni.value ==0){
         Reinicia_Combo(responsable);
         document.querySelector("#"+responsable).fstdropdown.rebind();
         Reinicia_Combo(custodio);
         document.querySelector("#"+custodio).fstdropdown.rebind();

    }else{
       Habilitar_Responsables_JSON(objeto,responsable); 
       Habilitar_Custodios_JSON(objeto,custodio); 
    }
    ///
}

function Habilitar_Responsables_JSON(obj,destino){
   
    /*******************************************************************/
    /***********************   Id de Objeto     ************************/
    /*******************************************************************/
    var Id_Uni = document.querySelector('#'+obj).value;


    /*******************************************************************/
    /**********************REINICIAR RESPONSABLES **********************/
    /*******************************************************************/
    Reinicia_Combo(destino);
    
    //Combo busqueda
    document.querySelector("#"+destino).fstdropdown.rebind();
    
    
    
    /*******************************************************************/
    /**********************        PAGINAS        **********************/
    /*******************************************************************/
    var pagina = "Modulos/Inventario/activos/Habilita_Responsables_JSON.php";
   
    

    /*******************************************************************/
    /******************           URL's           **********************/
    /*******************************************************************/
    var parametros = "Id_Uni="+Id_Uni;
    var URL = pagina+"?"+parametros;


     
    /*******************************************************************/
    /***********           AJAX RESPONSABLES         *******************/
    /*******************************************************************/

    var xhr = new XMLHttpRequest();
    xhr.overrideMimeType("application/json");
    xhr.open('GET',URL,true);
    xhr.onload = function(e) { 
      if (this.status == 200) {
        //parseamos la respuesta que viene en formato json
        var respuesta = JSON.parse(this.response);
        

        //Combo busqueda
        document.querySelector("#"+destino).fstdropdown.rebind();

        for (var i = 0; i < respuesta.length; i++) {
            option = new Option(respuesta[i].Nombre_Res, respuesta[i].Id_Res);
            document.querySelector("#"+destino).appendChild(option);

        }
        document.querySelector("#"+destino).fstdropdown.rebind();

       
      }
    };
    xhr.send(null);
}


function Habilitar_Custodios_JSON(obj,destino){
   
    /*******************************************************************/
    /***********************   Id de Objeto     ************************/
    /*******************************************************************/
    var Id_Uni = document.querySelector('#'+obj).value;


    /*******************************************************************/
    /**********************REINICIAR RESPONSABLES **********************/
    /*******************************************************************/
    Reinicia_Combo(destino);
    
    
    
    
    
    /*******************************************************************/
    /**********************        PAGINAS        **********************/
    /*******************************************************************/
    var pagina = "Modulos/Inventario/activos/Habilita_Custodios_JSON.php";
   
    

    /*******************************************************************/
    /******************           URL's           **********************/
    /*******************************************************************/
    var parametros = "Id_Uni="+Id_Uni;
    var URL = pagina+"?"+parametros;


     
    /*******************************************************************/
    /***********           AJAX RESPONSABLES         *******************/
    /*******************************************************************/

    var xhr = new XMLHttpRequest();
    xhr.overrideMimeType("application/json");
    xhr.open('GET',URL,true);
    xhr.onload = function(e) { 
      if (this.status == 200) {
        //parseamos la respuesta que viene en formato json
        var respuesta = JSON.parse(this.response);

        
        //Combo busqueda
        document.querySelector("#"+destino).fstdropdown.rebind();


        for (var i = 0; i < respuesta.length; i++) {
            option = new Option(respuesta[i].Nombre_Cus, respuesta[i].Id_Cus);
            document.querySelector("#"+destino).appendChild(option);

        }
        document.querySelector("#"+destino).fstdropdown.rebind();

       
      }
    };
    xhr.send(null);
}


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
function validarActivo(){
    //CONARE
    if (Valida_TXT('Nombre_Act')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el nombre del activo', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (Valida_TXT('Descripcion_Act')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar la descripción del activo', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (Valida_SELECT_0('Id_Res_Act')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar el responsable del activo', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (Valida_SELECT_0('Id_Cus_Act')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar el custodio del activo', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (Valida_SELECT_0('Id_Zonas_tmp_Act')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar la ubicación del activo', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if ( (!Valida_SELECT_0('Id_Zonas_tmp_Act')) && (document.querySelector("#Id_Zonas_tmp_Act_Cambio").value == 1) && (Valida_TXT('motivoCambioUbicacion'))){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el motivo del cambio de ubicación', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (Valida_SELECT_0('Id_Uni_Act')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar el dueño del activo', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if ((Valida_TXT('Fecha_Recepcion_Act'))||(document.querySelector("#Fecha_Recepcion_Act").value =="0000-00-00")) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar la fecha de recepción', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (Valida_SELECT_0('Id_OC')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar una orden de compra', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if (Valida_SELECT_0('Id_Factu_Act')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe seleccionar una factura', //texto
            400, //velocidad
            2400 //tiempo
         );
        window.scrollTo(0,0);
        return false;
    }else if ( (document.querySelector("#Desecho_Act").checked) && (document.querySelector("#Descripcion_Dese_Act").value=="")) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el motivo del desecho', //texto
            400, //velocidad
            2400 //tiempo
         );
        document.querySelector("#Descripcion_Dese_Act").focus();

        return false;
    }else if ( (document.querySelector("#Donacion_Act").checked) && (document.querySelector("#Descripcion_Dona_Act").value=="")) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el motivo de la donación', //texto
            400, //velocidad
            2400 //tiempo
         );
        document.querySelector("#Descripcion_Dona_Act").focus();

        return false;
    }else if ( (document.querySelector("#Mantenimiento_Act").checked) && (document.querySelector("#Descripcion_Mante_Act").value=="")) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            'Debe digitar el motivo del mantenimiento', //texto
            400, //velocidad
            2400 //tiempo
         );
        document.querySelector("#Descripcion_Mante_Act").focus();
        return false;
    }

    return true;
}





function agregarActivo() {

    document.querySelector("#saePreloader").style.display = "block";
    if (validarActivo()) {
        
        
         //obtenemos el documento
            var f = $(this);
            //Este pega todos los campos del formulario
            //var formData = new FormData(document.getElementById("con_configuracion"));
            //Creo el objeto formData
            var formData = new FormData();
            
            /*************************************************************/
            /*****************           FOTO      ***********************/
            /*************************************************************/
            var archivo=$('#Foto_Act')[0].files[0];

            //Lo anexamos a nuestro objeto formData.append("nombre_a_enviar", "valor");
            formData.append("Foto_Act", archivo);
        
    
        
            /***************************************************/
            /************* Datos de SEGURIDAD      *************/
            /***************************************************/
            var cedula_global = document.getElementById('cedula_global').value;
            var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
            var Key_Usu = document.getElementById('Key_Usu').value;
        
            formData.append("cedula_global", cedula_global);
            formData.append("Id_Per_Usu", Id_Per_Usu);
            formData.append("Key_Usu", Key_Usu);
        
        
            /*************************************************************/
            /**************           DATOS               ****************/
            /*************************************************************/

            //Datos Activo 
            var  Nombre_Act = document.getElementById('Nombre_Act').value;
            var  Marca_Act = document.getElementById('Marca_Act').value;
            var  Modelo_Act = document.getElementById('Modelo_Act').value;
            var  Color_Act = document.getElementById('Color_Act').value;
            var  Numero_Serie_Act = document.getElementById('Numero_Serie_Act').value;
            var  Descripcion_Act = document.getElementById('Descripcion_Act').value;

            //Identificadores de Activo
            var  Id_INS_Act = document.getElementById('Id_INS_Act').value;
            var  Id_Uni_Act = document.getElementById('Id_Uni_Act').value;

            //Activo Fijo
            var  Activo_Fijo_Act ="";
            if(document.getElementById('Activo_Fijo_Act').checked){
                Activo_Fijo_Act = 1;
            }else{
                Activo_Fijo_Act = 0;
            }

            //Fecha y año Recepción
            var  Fecha_Recepcion_Act = document.getElementById('Fecha_Recepcion_Act').value;
            var  Tiempo_Garantia_Act = document.getElementById('Tiempo_Garantia_Act').value;
            if (Tiempo_Garantia_Act =='') {
                Tiempo_Garantia_Act = 0;
            }

            //Datos de compra
            var  Id_OC = document.getElementById('Id_OC').value;
            var  Id_Factu_Act = document.getElementById('Id_Factu_Act').value;
            var  Costo_Act = document.getElementById('Costo_Act').value;

            //Ubicación
            var  Id_Zonas_tmp_Act = document.getElementById('Id_Zonas_tmp_Act').value;

            /****************************************************************/
            /********* Verificar si hay que mandar correo de trasiego *******/
            /****************************************************************/
            var enviarCorreoTrasiego =0;
            if(document.querySelector("#enviarCorreoTrasiego").checked){
                enviarCorreoTrasiego = 1;
            }


            //CONARE: Responsables
            var  Id_Res_Act = document.getElementById('Id_Res_Act').value;
            var  Id_Cus_Act = document.getElementById('Id_Cus_Act').value;

            //Estados            
            var  Desecho_Act ="";
            if(document.getElementById('Desecho_Act').checked){
                Desecho_Act = 1;
            }else{
                Desecho_Act = 0;
            }
            var  Descripcion_Dese_Act = document.getElementById('Descripcion_Dese_Act').value;
            var  Donacion_Act ="";
            if(document.getElementById('Donacion_Act').checked){
                Donacion_Act = 1;
            }else{
                Donacion_Act = 0;
            }
            var  Descripcion_Dona_Act = document.getElementById('Descripcion_Dona_Act').value;

            if(document.getElementById('Mantenimiento_Act').checked){
                Mantenimiento_Act = 1;
            }else{
                Mantenimiento_Act = 0;
            }
            var  Descripcion_Mante_Act = document.getElementById('Descripcion_Mante_Act').value;
            

            //Verificación
            var  Verificado_Act ="";
            if(document.getElementById('Verificado_Act').checked){
                Verificado_Act = 1;
            }else{
                Verificado_Act = 0;
            }
        
       
            

            //***********************************
            //Los anexamos
            //***********************************
            
            //Datos Activo 
            formData.append("Nombre_Act", Nombre_Act);
            formData.append("Marca_Act", Marca_Act);
            formData.append("Modelo_Act", Modelo_Act);
            formData.append("Color_Act", Color_Act);
            formData.append("Numero_Serie_Act", Numero_Serie_Act);
            formData.append("Descripcion_Act", Descripcion_Act);

            //Identificadores de Activo
            formData.append("Id_INS_Act", Id_INS_Act);
            formData.append("Id_Uni_Act", Id_Uni_Act);

            //Activo Fijo
            formData.append("Activo_Fijo_Act", Activo_Fijo_Act);

            //Fecha y año Recepción
            formData.append("Fecha_Recepcion_Act", Fecha_Recepcion_Act);
            formData.append("Tiempo_Garantia_Act", Tiempo_Garantia_Act);

            //Datos de compra
            formData.append("Id_OC", Id_OC);
            formData.append("Id_Factu_Act", Id_Factu_Act);
            formData.append("Costo_Act", Costo_Act);

            //Ubicación
            formData.append("Id_Zonas_tmp_Act", Id_Zonas_tmp_Act);
            

            //CONARE: Responsables
            formData.append("Id_Res_Act", Id_Res_Act);
            formData.append("Id_Cus_Act", Id_Cus_Act);

            //Estados
            formData.append("Desecho_Act", Desecho_Act);
            formData.append("Descripcion_Dese_Act", Descripcion_Dese_Act);
            formData.append("Donacion_Act", Donacion_Act);
            formData.append("Descripcion_Dona_Act", Descripcion_Dona_Act);
            formData.append("Mantenimiento_Act", Mantenimiento_Act);
            formData.append("Descripcion_Mante_Act", Descripcion_Mante_Act);

            //Verificación
            formData.append("Verificado_Act", Verificado_Act);


            //Trasiego
            formData.append("enviarCorreoTrasiego", enviarCorreoTrasiego);

           
            $.ajax({
                url: "Modulos/Inventario/activos/ajax_agr_activos.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
             .done(function(res){

                document.querySelector("#saePreloader").style.display = "none";

                if (res==1) {
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Exito']+':', //titulo
                        "El activo se ha agregado correctamente", //texto
                        200, //velocidad
                        4500 //tiempo
                    );

                
                }else{
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        "ha ocurrido un error, intentelo más tarde", //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                }
                
                //Mandar a cargar la consulta de activos
                cargarConsultaActivos();
            });
        
    }
    document.querySelector("#saePreloader").style.display = "none";
}

function modificarActivo() {

    document.querySelector("#saePreloader").style.display = "block";
    
    
    if (validarActivo()) {

        
        //obtenemos el documento
            //var f = $(this);
            //Este pega todos los campos del formulario
            //var formData = new FormData(document.getElementById("con_configuracion"));
            //Creo el objeto formData
            var formData = new FormData();
            
            /*************************************************************/
            /*****************           FOTO      ***********************/
            /*************************************************************/
            
            var archivo=$('#Foto_Act')[0].files[0];
            //Si no se cambio la imagen
            if (typeof(archivo) === "undefined") {
                //Lo anexamos en blanco
                formData.append("Foto_Act", "");
            }else{
                //Lo anexamos a nuestro objeto formData.append("nombre_a_enviar", "valor");
                formData.append("Foto_Act", archivo);
            }

                
        
            /***************************************************/
            /************* Datos de SEGURIDAD      *************/
            /***************************************************/
            var cedula_global = document.getElementById('cedula_global').value;
            var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
            var Key_Usu = document.getElementById('Key_Usu').value;
        
            formData.append("cedula_global", cedula_global);
            formData.append("Id_Per_Usu", Id_Per_Usu);
            formData.append("Key_Usu", Key_Usu);
        
        
            /*************************************************************/
            /**************           DATOS               ****************/
            /*************************************************************/
            var  pagina = document.getElementById('pagina').value;
            var  inicio = document.getElementById('inicio').value;


            //Datos Activo 
            var  Id_Act = document.getElementById('Id_Act').value;
            var  Nombre_Act = document.getElementById('Nombre_Act').value;
            var  Marca_Act = document.getElementById('Marca_Act').value;
            var  Modelo_Act = document.getElementById('Modelo_Act').value;
            var  Color_Act = document.getElementById('Color_Act').value;
            var  Numero_Serie_Act = document.getElementById('Numero_Serie_Act').value;
            var  Descripcion_Act = document.getElementById('Descripcion_Act').value;


            //Identificadores de Activo
            var  Id_INS_Act = document.getElementById('Id_INS_Act').value;
            var  Id_Uni_Act = document.getElementById('Id_Uni_Act').value;


            //Activo Fijo
            var  Activo_Fijo_Act ="";
            if(document.getElementById('Activo_Fijo_Act').checked){
                Activo_Fijo_Act = 1;
            }else{
                Activo_Fijo_Act = 0;
            }

            //Fecha y año Recepción
            var  Fecha_Recepcion_Act = document.getElementById('Fecha_Recepcion_Act').value;
            var  Tiempo_Garantia_Act = document.getElementById('Tiempo_Garantia_Act').value;
            if (Tiempo_Garantia_Act =='') {
                Tiempo_Garantia_Act = 0;
            }

            //Datos de compra
            var  Id_OC = document.getElementById('Id_OC').value;
            var  Id_Factu_Act = document.getElementById('Id_Factu_Act').value;
            var  Costo_Act = document.getElementById('Costo_Act').value;
            
            //Ubicación
            var  Id_Zonas_tmp_Act = document.getElementById('Id_Zonas_tmp_Act').value;
            var  motivoCambioUbicacion = document.getElementById('motivoCambioUbicacion').value;


            /****************************************************************/
            /********* Verificar si hay que mandar correo de trasiego *******/
            /****************************************************************/
            var enviarCorreoTrasiego =0;
            if(document.querySelector("#enviarCorreoTrasiego").checked){
                enviarCorreoTrasiego = 1;
            }
            

            //CONARE: Responsables
            var  Id_Res_Act = document.getElementById('Id_Res_Act').value;
            var  Id_Cus_Act = document.getElementById('Id_Cus_Act').value;

            
            //Estados            
            var  Desecho_Act ="";
            if(document.getElementById('Desecho_Act').checked){
                Desecho_Act = 1;
            }else{
                Desecho_Act = 0;
            }
            var  Descripcion_Dese_Act = document.getElementById('Descripcion_Dese_Act').value;
            var  Donacion_Act ="";
            if(document.getElementById('Donacion_Act').checked){
                Donacion_Act = 1;
            }else{
                Donacion_Act = 0;
            }
            var  Descripcion_Dona_Act = document.getElementById('Descripcion_Dona_Act').value;

            if(document.getElementById('Mantenimiento_Act').checked){
                Mantenimiento_Act = 1;
            }else{
                Mantenimiento_Act = 0;
            }
            var  Descripcion_Mante_Act = document.getElementById('Descripcion_Mante_Act').value;
            
            //Verificación
            var  Verificado_Act ="";
            if(document.getElementById('Verificado_Act').checked){
                Verificado_Act = 1;
            }else{
                Verificado_Act = 0;
            }
        
       
            

            



           
            //Los anexamos
            
            formData.append("Id_Act", Id_Act);


            //***********************************
            //Los anexamos
            //***********************************
            
            //Datos Activo 
            formData.append("Nombre_Act", Nombre_Act);
            formData.append("Marca_Act", Marca_Act);
            formData.append("Modelo_Act", Modelo_Act);
            formData.append("Color_Act", Color_Act);
            formData.append("Numero_Serie_Act", Numero_Serie_Act);
            formData.append("Descripcion_Act", Descripcion_Act);

            //Identificadores de Activo
            formData.append("Id_INS_Act", Id_INS_Act);
            formData.append("Id_Uni_Act", Id_Uni_Act);

            //Activo Fijo
            formData.append("Activo_Fijo_Act", Activo_Fijo_Act);

            //Fecha y año Recepción
            formData.append("Fecha_Recepcion_Act", Fecha_Recepcion_Act);
            formData.append("Tiempo_Garantia_Act", Tiempo_Garantia_Act);

            //Datos de compra
            formData.append("Id_OC", Id_OC);
            formData.append("Id_Factu_Act", Id_Factu_Act);
            formData.append("Costo_Act", Costo_Act);

            //Ubicación
            formData.append("Id_Zonas_tmp_Act", Id_Zonas_tmp_Act);
            formData.append("motivoCambioUbicacion", motivoCambioUbicacion);


            //CONARE: Responsables
            formData.append("Id_Res_Act", Id_Res_Act);
            formData.append("Id_Cus_Act", Id_Cus_Act);

            //Estados
            formData.append("Desecho_Act", Desecho_Act);
            formData.append("Descripcion_Dese_Act", Descripcion_Dese_Act);
            formData.append("Donacion_Act", Donacion_Act);
            formData.append("Descripcion_Dona_Act", Descripcion_Dona_Act);
            formData.append("Mantenimiento_Act", Mantenimiento_Act);
            formData.append("Descripcion_Mante_Act", Descripcion_Mante_Act);

            //Verificación
            formData.append("Verificado_Act", Verificado_Act);

            //Trasiego
            formData.append("enviarCorreoTrasiego", enviarCorreoTrasiego);





            $.ajax({
                url: "Modulos/Inventario/activos/ajax_mod_activos.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
             .done(function(res){
                //console.log(res)
                document.querySelector("#saePreloader").style.display = "none";
                
                if (res=='1') {
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Exito']+':', //titulo
                        "El activo se ha modificado correctamente", //texto
                        200, //velocidad
                        4500 //tiempo
                    );
               
                }else if(res=='na'){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Info']+':', //titulo
                        "No se modificó ningún dato", //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                   
                }else if(res=='e1'){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        "ha ocurrido al actualizar la fotografía, intentelo más tarde", //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                   
                }else if(res=='e2'){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        "ha ocurrido al verificar el activo, intentelo más tarde", //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                   
                }else if(res=='e3'){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        "ha ocurrido al actualizar la zona del activo, intentelo más tarde", //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                   
                }else if(res=='e4'){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        "ha ocurrido al actualizar los datos generales del activo, intentelo más tarde", //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                   
                }



                //Mandar a cargar la consulta de activos
                cargarConsultaActivos();
                
            });
        
    }
    document.querySelector("#saePreloader").style.display = "none";
}


function eliminarActivo() {
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/Inventario/activos/ajax_eli_activos.php';
        
        
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
        var Id_Act = document.getElementById('Id_Act').value;

        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Act;';
        valores += Id_Act+';';
        
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
                    CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
													   'mostrar_efecto;',
													   '1;');
                    CerrarVentana();
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
}