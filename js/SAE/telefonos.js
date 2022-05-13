/*******************************************************************************/
/*
Funcion Agregar_Telefono(tipo_telefono,telefono,ch_notificacion,ch_publico,fila_telefonos,cant_tel,cant_tel_falsa)
Recibe:
Tipo_Telefono: combo de tipos de telefonos
Telefono: inpout de telefono
ch_notificacion: checkbox de notificacion
ch_publico: checkbox de publico
fila_telefonos: tbody donde seran agregados
cant_tel: input de cantidad de telefonos
cant_tel_falsa: input de cantidad de telefonos falsa
*/
/*******************************************************************************/
function Agregar_Telefono(tipo_telefono,telefono,ch_notificacion,ch_publico,fila_telefonos,cant_tel,cant_tel_falsa){
  if (Valida_SELECT_0(tipo_telefono)) {
     $(this).notifyMe(
        'top', //Bottom/top/left/ right
        'error', //error/info/success/default
        texto['Error']+':', //titulo
        texto['ERROR_Seleccionar_Tipo_Telefono'], //texto
        200, //velocidad
        3500 //tiempo
      );
  }else if (Valida_TXT(telefono)) {
    $(this).notifyMe(
        'top', //Bottom/top/left/ right
        'error', //error/info/success/default
        texto['Error']+':', //titulo
        texto['ERROR_Digitar_Telefono'], //texto
        200, //velocidad
        3500 //tiempo
    );
  }else if (longitud_minima(telefono, 8)) {
    $(this).notifyMe(
        'top', //Bottom/top/left/ right
        'error', //error/info/success/default
        texto['Error']+':', //titulo
        texto['ERROR_Agregar_Tamano_Telefono'], //texto
        200, //velocidad
        3500 //tiempo
    );
  }else{
    /*******************************************************************************/
    //obtenemos los datos a guardar
    /*******************************************************************************/
    /////////////////////////////
    //Tipo de Telefono
    /////////////////////////////
    var indice_tip_tel = document.getElementById(tipo_telefono).selectedIndex
    var valor_tip_tel = document.getElementById(tipo_telefono).options[indice_tip_tel].value;
    var texto_tipo_tel = document.getElementById(tipo_telefono).options[indice_tip_tel].text;
            

    
    /////////////////////////////
    //El telefono
    /////////////////////////////
    var tel = document.getElementById(telefono).value;
            
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
    var contenedor = document.getElementById(fila_telefonos);
            
    //Obtenemos la cantidad de telefonos necesaria para crear la fila
    var cant_telefonos = document.getElementById(cant_tel_falsa).value;
            
    /*******************************************************************************/
    //creamos un elemento de fila
    /*******************************************************************************/
    var fila = document.createElement('tr');
    fila.id = 'fila'+(parseInt(cant_telefonos)+1);
    fila.align='center';
    fila.className='fondo_blanco negro';
     
    /*******************************************************************************/
    //creamos una columna telefono
    /*******************************************************************************/
    var columna = document.createElement('td');
    columna.className='columna';      
    //creamos el elemento de texto con el # de telefono 
    var contenido = document.createTextNode(tel);
    
    
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
    columna_telefono.name='telefonos[]';
    columna_telefono.id='telefonos'+cant_telefonos;
    columna_telefono.value = tel;
    columna_telefono.size = '8';
    columna_telefono.readOnly=true;
            
    columna.appendChild(columna_telefono);
    fila.appendChild(columna);
            
            
            
    /*******************************************************************************/
    //creamos una columna tipo de telefono
    /*******************************************************************************/
    columna = document.createElement('td');
    columna.className='columna';
    contenido = document.createTextNode(texto_tipo_tel);
    columna.appendChild(contenido);
    fila.appendChild(columna);
            
    var tip_tel = document.createElement('input');
    tip_tel.type = 'hidden';
    tip_tel.name='tipo_tel[]';
    tip_tel.id='tipo_tel'+cant_telefonos;
    //Valor del tipo de telefono seleccionado
    tip_tel.value = valor_tip_tel;
    tip_tel.size = '2';
    tip_tel.readOnly=true;
            
    columna.appendChild(tip_tel);
    fila.appendChild(columna);
            
            
    /*******************************************************************************/
    //creamos la imagen para notificacion
    /*******************************************************************************/
    columna = document.createElement('td');
    columna.className='columna';      
    var imagen = document.createElement('img')
    imagen.name = 'img_tel_noti[]';
    imagen.id = 'img_tel_noti'+cant_telefonos;
    imagen.src="../../img/SAE/"+img_noti;
    imagen.className="ancho_img_agregar_telefon_correo";
    imagen.onclick = function () {
      Cambia_Imagen_Telefono(this,'N',cant_telefonos);
    }
    
    columna.appendChild(imagen);
    fila.appendChild(columna);
            
    /*******************************************************************************/
    //creamos un elemento oculto 
    /*******************************************************************************/
    caja = document.createElement('input');
    caja.type = 'hidden';
    caja.name='tel_noti[]';
    caja.id='tel_noti'+cant_telefonos;
    caja.value = valor_noti;
            
    columna.appendChild(caja);
    fila.appendChild(columna);
            
            
            
    /*******************************************************************************/
    //creamos la imagen para publico
    /*******************************************************************************/
    columna = document.createElement('td');
    columna.className='columna';
    
    var imagen = document.createElement('img')
    imagen.name = 'img_tel_pub[]';
    imagen.id = 'img_tel_pub'+cant_telefonos;
    imagen.src="../../img/SAE/"+img_pub;
    imagen.className="ancho_img_agregar_telefon_correo";
    imagen.onclick = function () {
      Cambia_Imagen_Telefono(this,'P',cant_telefonos);
    }
            
    columna.appendChild(imagen);
    fila.appendChild(columna);
            
    /*******************************************************************************/
    //creamos un elemento oculto 
    /*******************************************************************************/
    caja = document.createElement('input');
    caja.type = 'hidden';
    caja.name='tel_publi[]';
    caja.id='tel_publi'+cant_telefonos;
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
    boton.name = 'fila'+(parseInt(cant_telefonos)+1);
    boton.id = 'btn'+parseInt(cant_telefonos)+1;
    boton.className= 'btn_Eliminar';
    boton.onclick = function () {
      borrarFilaTelefono(this.name);
    }
            
    columna.appendChild(boton)
    fila.appendChild(columna);
    contenedor.appendChild(fila);
            
    /*******************************************************************************/
    //Actualizamos la cantidad de telefonos
    /*******************************************************************************/
    document.getElementById(cant_tel).value = parseInt(document.getElementById(cant_tel).value) + 1;
    document.getElementById(cant_tel_falsa).value = parseInt(document.getElementById(cant_tel_falsa).value) + 1;
            
    /*******************************************************************************/
    //Reiniciamos los campos de los telefonos
    /*******************************************************************************/
    document.getElementById(tipo_telefono).selectedIndex = 0;
    document.getElementById(telefono).value ='';
    document.getElementById(ch_notificacion).checked = false;
    document.getElementById(ch_publico).checked = false;
  }
  
}

function  Cambia_Imagen_Telefono(obj,tipo,indice){
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
      valor = document.getElementById('tel_noti'+indice).value;
      if (valor ==0) {
        nuevo_valor = 1;
      }else if (valor==1) {
        nuevo_valor = 0;
      }
      document.getElementById('tel_noti'+indice).value = nuevo_valor;
    }else if (tipo=='P') {
      valor = document.getElementById('tel_publi'+indice).value;
      if (valor ==0) {
        nuevo_valor = 1;
      }else if (valor==1) {
        nuevo_valor = 0;
      }
      document.getElementById('tel_publi'+indice).value = nuevo_valor;
        
    }
}

function borrarFilaTelefono(id){
    var tabla = document.getElementById('fila_telefonos');
    var fila = document.getElementById(id);
    tabla.removeChild(fila);
            
    /*Actualizar la cantidad de campos*/
    var cant_real = parseInt(document.getElementById('cant_tel').value);
    var resul = cant_real - 1;
    document.getElementById('cant_tel').value = resul;
    window.scrollTo(0,0);
}