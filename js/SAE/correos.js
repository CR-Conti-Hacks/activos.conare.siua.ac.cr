/*******************************************************************************/
/*
Funcion Agregar_Correo(correo,ch_notificacion,ch_publico,fila_correos,cant_correos,cant_correos_falsa)
Recibe:
correo: inpout del correo
ch_notificacion: checkbox de notificacion
ch_publico: checkbox de publico
fila_correos: tbody donde seran agregados
cant_correos: input de cantidad de correos
cant_correos_falsa: input de cantidad de correos falsa
*/
/*******************************************************************************/
function Agregar_Correo(correo,ch_notificacion,ch_publico,fila_correos,cant_cor,cant_correos_falsa){
    if (Valida_TXT(correo)) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Agregar_Digitar_Correo'], //texto
            200, //velocidad
            3500 //tiempo
        );
    }else if(Valida_CORREO(correo)){
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Formato_Correo'], //texto
            200, //velocidad
            3500 //tiempo
        );
    }else{
        /*******************************************************************************/
        //obtenemos los datos a guardar
        /*******************************************************************************/
   
        
        /////////////////////////////
        //El correo
        /////////////////////////////
        var cor = document.getElementById(correo).value;
                
        /////////////////////////////
        //Check de notificación
        //Si esta marcado la notificacion asignamos la imagen si.png
        //sino asignamos el nombre de la imagen no.png
        /////////////////////////////
        if (document.getElementById(ch_notificacion).checked) {
          img_noti = 'si.png';
          valor_noti = '1';
        }else{
          img_noti = 'no.png';
          valor_noti = '0';
        }
                
        /////////////////////////////
        //Si esta marcado la notificacion asignamos la imagen si.png
        //sino asignamos el nombre de la imagen no.png
        /////////////////////////////
        if (document.getElementById(ch_publico).checked) {
          img_pub = 'si.png';
          valor_pub = '1';
        }else{
          img_pub = 'no.png';
          valor_pub = '0';
        }
                
                
    
        /*******************************************************************************/
        //Agregamos el contenido dinamico
        /*******************************************************************************/
                
        //obtenemos el destino
        var contenedor = document.getElementById(fila_correos);
                
        //Obtenemos la cantidad de telefonos necesaria para crear la fila
        var cant_correos = document.getElementById(cant_correos_falsa).value;
                
        /*******************************************************************************/
        //creamos un elemento de fila
        /*******************************************************************************/
        var fila = document.createElement('tr');
        fila.id = 'fila_correo'+(parseInt(cant_correos)+1);
        fila.align='center';
        fila.className='fondo_blanco negro';
         
        /*******************************************************************************/
        //creamos una columna correo
        /*******************************************************************************/
        var columna = document.createElement('td');
        columna.className='columna';      
        //creamos el elemento de texto con el # de telefono 
        var contenido = document.createTextNode(cor.toLowerCase());
        
        
        //añadimos el contenido a la fila al final
        //si deseamos sea al principio usamos insertBefore()
        columna.appendChild(contenido);
                
        //añadimos la columna a la fila
        fila.appendChild(columna);
                
               
        /*******************************************************************************/
        //creamos una columna telefono oculta es el valor que vamos a guardar en la BD
        /*******************************************************************************/
        //////////////////////////////////////////////
        //creamos un elemento oculto para guardar el valor real que vamos a guardar en la BD
        //va ser una arreglo de elementos HTML id="telefonos[]" esto quiere decir si con 
        //javascript hacemos alert(telefonos[1].value) Obtenemos el valor del segundo telefono
        //////////////////////////////////////////////
      
        var columna_telefono = document.createElement('input');
        columna_telefono.type = 'hidden';
        columna_telefono.name='correos[]';
        columna_telefono.id='correos'+cant_correos;
        columna_telefono.value = cor;
        columna_telefono.size = '8';
        columna_telefono.readOnly=true;
                
        columna.appendChild(columna_telefono);
        fila.appendChild(columna);
                
     
        /*******************************************************************************/
        //creamos la imagen para notificacion
        /*******************************************************************************/
        columna = document.createElement('td');
        columna.className='columna';      
        var imagen = document.createElement('img')
        imagen.name = 'img_cor_noti[]';
        imagen.id = 'img_cor_noti'+cant_correos;
        imagen.src="../../img/SAE/"+img_noti;
        imagen.className="ancho_img_agregar_telefon_correo";
        imagen.onclick = function () {
          Cambia_Imagen_Correo(this,'N',cant_correos);
        }
        
        columna.appendChild(imagen);
        fila.appendChild(columna);
                
        /*******************************************************************************/
        //creamos un elemento oculto 
        /*******************************************************************************/
        caja = document.createElement('input');
        caja.type = 'hidden';
        caja.name='cor_noti[]';
        caja.id='cor_noti'+cant_correos;
        caja.value = valor_noti;
                
        columna.appendChild(caja);
        fila.appendChild(columna);
                
                
                
        /*******************************************************************************/
        //creamos la imagen para publico
        /*******************************************************************************/
        columna = document.createElement('td');
        columna.className='columna';
        
        var imagen = document.createElement('img')
        imagen.name = 'img_cor_pub[]';
        imagen.id = 'img_cor_pub'+cant_correos;
        imagen.src="../../img/SAE/"+img_pub;
        imagen.className="ancho_img_agregar_telefon_correo";
        imagen.onclick = function () {
          Cambia_Imagen_Correo(this,'P',cant_correos);
        }
                
        columna.appendChild(imagen);
        fila.appendChild(columna);
                
        /*******************************************************************************/
        //creamos un elemento oculto 
        /*******************************************************************************/
        caja = document.createElement('input');
        caja.type = 'hidden';
        caja.name='cor_publi[]';
        caja.id='cor_publi'+cant_correos;
        caja.value = valor_pub;
                
        columna.appendChild(caja);
        fila.appendChild(columna);
                
        /*******************************************************************************/
        //creamos la columna del boton borrar
        /*******************************************************************************/
        columna = document.createElement('td');
        columna.className='columna';
        
        var boton = document.createElement('input')
        boton.type = 'button';
        boton.value = texto['Borrar'];
        boton.name = 'fila_correo'+(parseInt(cant_correos)+1);
        boton.id = 'btn'+parseInt(cant_correos)+1;
        boton.className= 'btn_Eliminar';
        boton.onclick = function () {
          borrarFilaCorreo(this.name);
        }
                
        columna.appendChild(boton)
        fila.appendChild(columna);
        contenedor.appendChild(fila);
                
        /*******************************************************************************/
        //Actualizamos la cantidad de correos
        /*******************************************************************************/
        document.getElementById(cant_cor).value = parseInt(document.getElementById(cant_cor).value) + 1;
        document.getElementById(cant_correos_falsa).value = parseInt(document.getElementById(cant_correos_falsa).value) + 1;
                
        /*******************************************************************************/
        //Reiniciamos los campos de los correos
        /*******************************************************************************/
        document.getElementById(correo).value ='';
        document.getElementById(ch_notificacion).checked = false;
        document.getElementById(ch_publico).checked = false;
    }
}

function  Cambia_Imagen_Correo(obj,tipo,indice){
	var dominio = document.getElementById('dominio').value;
	var ruta = document.getElementById('ruta').value;
	if(obj.src == dominio+ruta+'img/SAE/si.png'){
		obj.src = dominio+ruta+'img/SAE/no.png';	
	}else if(obj.src == dominio+ruta+'img/SAE/no.png'){
		obj.src = dominio+ruta+'img/SAE/si.png';	
	}
    var valor = 0;
    //Si es una notificacion
    if (tipo=='N') {
      valor = document.getElementById('cor_noti'+indice).value;
      if (valor ==0) {
        nuevo_valor = 1;
      }else if (valor==1) {
        nuevo_valor = 0;
      }
      document.getElementById('cor_noti'+indice).value = nuevo_valor;
    }else if (tipo=='P') {
      valor = document.getElementById('cor_publi'+indice).value;
      if (valor ==0) {
        nuevo_valor = 1;
      }else if (valor==1) {
        nuevo_valor = 0;
      }
      document.getElementById('cor_publi'+indice).value = nuevo_valor;
        
    }
}


function borrarFilaCorreo(id){
    var tabla = document.getElementById('fila_correos');
    var fila = document.getElementById(id);
    tabla.removeChild(fila);
            
    /*Actualizar la cantidad de campos*/
    var cant_real = parseInt(document.getElementById('cant_cor').value);
    var resul = cant_real - 1;
    document.getElementById('cant_cor').value = resul;
    window.scrollTo(0,0);
}


