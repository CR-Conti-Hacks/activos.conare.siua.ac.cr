function AgregarUniversidad(){
    if (Valida_SELECT_0('Id_CT')) {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Seleccionar_Su_Centro_Trabajo'], //texto
            200, //velocidad
            3500 //tiempo
        );
    }else if (Valida_SELECT_0('Id_Uni')) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Seleccionar_Su_Universidad'], //texto
            200, //velocidad
            3500 //tiempo
        );
    }else if (Valida_SELECT_0('Id_Esc')) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Seleccionar_Su_Escuela'], //texto
            200, //velocidad
            3500 //tiempo
        );
         document.getElementById('Id_Esc').focus();
    }else if(Valida_SELECT_0('Id_Car')){
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Seleccionar_Su_Carrera'], //texto
            200, //velocidad
            3500 //tiempo
        );
    }else{
            //Verificar si la carrera ya esta agregada
            var array_carreras = document.getElementsByName('carreras[]');
            var Id_Car = document.getElementById('Id_Car').value;
            bandera = 0;
            for(var i=0;i<array_carreras.length;i++){
                if(array_carreras[i].value == Id_Car){
                    bandera = 1;
                }
            }
            if (bandera==1) {
                $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    texto['ERROR_Carrera_Ya_Agregada'], //texto
                    200, //velocidad
                    3500 //tiempo
                );
            }else{
                /*******************************************************************************/
                //obtenemos los datos a guardar
                /*******************************************************************************/
                /////////////////////////////
                //Centro Trabajo
                /////////////////////////////
                var indice_ct = document.getElementById('Id_CT').selectedIndex
                var valor_ct = document.getElementById('Id_CT').options[indice_ct].value;
                var texto_ct = document.getElementById('Id_CT').options[indice_ct].text;
                var tmp = texto_ct.split("/");
                texto_ct = tmp[0];
                /////////////////////////////
                //Universidad
                /////////////////////////////
                var indice_uni = document.getElementById('Id_Uni').selectedIndex
                var valor_uni = document.getElementById('Id_Uni').options[indice_uni].value;
                var texto_uni = document.getElementById('Id_Uni').options[indice_uni].text;
                var tmp = texto_uni.split("/");
                texto_uni = tmp[0];
                
                
                /////////////////////////////
                //Escuela
                /////////////////////////////
                var indice_esc = document.getElementById('Id_Esc').selectedIndex
                var valor_esc = document.getElementById('Id_Esc').options[indice_esc].value;
                var texto_esc = document.getElementById('Id_Esc').options[indice_esc].text;
                
                /////////////////////////////
                //Carrera
                /////////////////////////////
                var indice_car = document.getElementById('Id_Car').selectedIndex
                var valor_car = document.getElementById('Id_Car').options[indice_car].value;
                var texto_car = document.getElementById('Id_Car').options[indice_car].text;
                
                
           
    
                /*******************************************************************************/
                //Agregamos el contenido dinamico
                /*******************************************************************************/
                
                //obtenemos el destino
                contenedor = document.getElementById('fila_carreras');
                
                //Obtenemos la cantidad de telefonos necesaria para crear la fila
                cant_car = document.getElementById('cant_car_falsa').value;
                
                /*******************************************************************************/
                //creamos un elemento de fila
                /*******************************************************************************/
                var fila = document.createElement('tr');
                fila.id = 'fila_carreras'+(parseInt(cant_car)+1);
                fila.align='center';
                fila.className='fondo_blanco negro';
         
                /*******************************************************************************/
                //creamos una columna Centro de trabajo
                /*******************************************************************************/
                var columna = document.createElement('td');
                columna.className='columna';    
                var contenido = document.createTextNode(texto_ct);
                columna.appendChild(contenido);
                fila.appendChild(columna);
                
               
                /*******************************************************************************/
                //creamos una columna ct oculta es el valor que vamos a guardar en la BD
                /*******************************************************************************/
                var universidad = document.createElement('input');
                universidad.type = 'hidden';
                universidad.name='centrostrabajo[]';
                universidad.id='centrostrabajo'+cant_car;
                universidad.value = valor_ct;
                universidad.size = '8';
                universidad.readOnly=true;
                
                columna.appendChild(universidad);
                fila.appendChild(columna);
                
                /*******************************************************************************/
                //creamos una columna universidad
                /*******************************************************************************/
                var columna = document.createElement('td');
                columna.className='columna';    
                var contenido = document.createTextNode(texto_uni);
                columna.appendChild(contenido);
                fila.appendChild(columna);
                
               
                /*******************************************************************************/
                //creamos una columna universidad oculta es el valor que vamos a guardar en la BD
                /*******************************************************************************/
                var universidad = document.createElement('input');
                universidad.type = 'hidden';
                universidad.name='universidades[]';
                universidad.id='universidades'+cant_car;
                universidad.value = valor_uni;
                universidad.size = '8';
                universidad.readOnly=true;
                
                columna.appendChild(universidad);
                fila.appendChild(columna);
                
                
                /*******************************************************************************/
                //creamos una columna escuela
                /*******************************************************************************/
                columna = document.createElement('td');
                columna.className='columna';  
                contenido = document.createTextNode(texto_esc);
                columna.appendChild(contenido);
                fila.appendChild(columna);
                
               
                /*******************************************************************************/
                //creamos una columna escuela oculta es el valor que vamos a guardar en la BD
                /*******************************************************************************/
                var escuela = document.createElement('input');
                escuela.type = 'hidden';
                escuela.name='escuelas[]';
                escuela.id='escuelas'+cant_car;
                escuela.value = valor_esc;
                escuela.size = '8';
                escuela.readOnly=true;
                
                columna.appendChild(escuela);
                fila.appendChild(columna);
                
                
                 /*******************************************************************************/
                //creamos una columna carrera
                /*******************************************************************************/
                columna = document.createElement('td');
                columna.className='columna'; 
                contenido = document.createTextNode(texto_car);
                columna.appendChild(contenido);
                fila.appendChild(columna);
                
               
                /*******************************************************************************/
                //creamos una columna carrera oculta es el valor que vamos a guardar en la BD
                /*******************************************************************************/
                var escuela = document.createElement('input');
                escuela.type = 'hidden';
                escuela.name='carreras[]';
                escuela.id='carreras'+cant_car;
                escuela.value = valor_car;
                escuela.size = '8';
                escuela.readOnly=true;
                
                columna.appendChild(escuela);
                fila.appendChild(columna);
                
                           
                /*******************************************************************************/
                //creamos la columna del boton borrar
                /*******************************************************************************/
                columna = document.createElement('td');
                columna.className='columna'; 
                var boton = document.createElement('input')
                boton.type = 'button';
                boton.value = texto['Borrar'];
                boton.name = 'fila_carreras'+(parseInt(cant_car)+1);
                boton.id = 'btn'+parseInt(cant_car)+1;
                boton.className= 'btn_Eliminar';
                boton.onclick = function () {
                   borrarFilaUniversidad(this.name);
                }
                
                
              
              
                columna.appendChild(boton)
                fila.appendChild(columna);
                contenedor.appendChild(fila);
                
                /*******************************************************************************/
                //Actualizamos la cantidad de universidades
                /*******************************************************************************/
                document.getElementById('cant_car').value = parseInt(document.getElementById('cant_car').value) + 1;
                document.getElementById('cant_car_falsa').value = parseInt(document.getElementById('cant_car_falsa').value) + 1;	
                
                /*******************************************************************************/
                //Reiniciamos los campos de las universidades
                /*******************************************************************************/
                document.getElementById('Id_CT').selectedIndex = 0;
                Reinicia_Combo('Id_Uni');
                Reinicia_Combo('Id_Esc');
                Reinicia_Combo('Id_Car');
            }
            
    }
}


function borrarFilaUniversidad(id){
    var tabla = document.getElementById('fila_carreras');
    var fila = document.getElementById(id);
    tabla.removeChild(fila);
            
    /*Actualizar la cantidad de campos*/
    var cant_real = parseInt(document.getElementById('cant_car').value);
    var resul = cant_real - 1;
    document.getElementById('cant_car').value = resul;
    window.scrollTo(0,0);
}


