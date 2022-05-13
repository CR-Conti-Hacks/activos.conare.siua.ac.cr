<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Costa_Rica');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="Include/datepicker/themes/default.css">
        <link rel="stylesheet" href="Include/datepicker/themes/default.date.css">
        <link rel="stylesheet" href="css/estilo.css">
        <script type="text/javascript" src="js/validacion.js" ></script>
        <script type="text/javascript" src="js/Ajax.js" ></script>
        <script type="text/javascript" src="js/inscripcion.js" ></script>
        
        <script type="text/javascript" src="js/hex_md5.js" ></script>
        
      
</head>
<body>
   <div id="wrapper" class="radius">
        <div id="mensaje"></div>
        <div class="titulo">
                <label for="nombre" >Inscripción al Sistema:</label>
                
        </div>
        <form
              name="miFormulario"
              id="miFormulario"
              method="POST"
              accept-charset="UTF-8"
              >
            
            <div class="div_formulario">
                <label for="cedula" >Cédula (usuario):</label>
                <input type="text" name="cedula" id="cedula" onkeypress="return soloNumeros(event)" />
            </div>
            
            <div class="div_formulario">
                <label for="nombre" >Nombre:</label>
                <input type="text" name="nombre" id="nombre" />
            </div>
            
            <div class="div_formulario">
                <label for="apellido" >Apellidos:</label>
                <input type="text" name="apellido" id="apellido" />
            </div>
            
            <div class="div_formulario">
                <label for="contrasena" >Contraseña (cedula):</label>
                <input type="password" name="contrasena" id="contrasena" onkeypress="return soloNumeros(event)" />
            </div>
            
            <div class="div_formulario">
                <label for="sexo" >Sexo:</label>
                <select name="sexo" id="sexo" >
                    <option value="0">[Seleccione]</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </div>
            
            <div class="div_formulario">
                <label for="correo" >Correo:</label>
                <input type="text" name="correo" id="correo" />    
            </div>   
                
            <div class="div_formulario">
                <label for="nacimiento" >Fecha de Nacimiento:</label>
                <input type="text" name="nacimiento" id="nacimiento" class="datepicker" readonly="readonly" onchange="this.className=''"/>
            </div>
            
            <div class="div_formulario">
                <label for="telefono" >Teléfono:</label>
                <input type="text" name="telefono" id="telefono"  onkeypress="return soloNumeros(event)" maxlength="8"/>
            </div>
            
            <div class="div_formulario">
                <label for="interes1" >Intereses:</label>
                <input class="multiopcion" type="checkbox" name="interes" id="interes1" value="1"/>Informática    
                <input class="multiopcion" type="checkbox" name="interes" id="interes2" value="2"/>Robótica   
                <input class="multiopcion" type="checkbox" name="interes" id="interes3" value="3"/>Telemática    
            </div>
            
            <div class="div_formulario">
                <label for="radio" >Recibir Correo:</label>
                <input class="multiopcion" type="radio" name="recibir_correo" id="radio1" value="1" />Sí    
                <input class="multiopcion" type="radio" name="recibir_correo" id="radio2" value="2" />No
            </div>
            
            <div class="div_formulario">
                <button type="button" class="boton" onclick="guardarDatosInscripcion()">EnviarDatos</button>
                <button type="button" class="boton" onclick="location.href='index.php'">Regresar</button>
            </div>
            
            
        </form>
   </div>
   
    <script type="text/javascript" src="js/jquery-2.1.3.js"></script>
    <script src="Include/datepicker/picker.js"></script>
    <script src="Include/datepicker/picker.date.js"></script>
    <script src="Include/datepicker/legacy.js"></script>
    <script src="Include/datepicker/translations/es_ES.js"></script>
    
   <script type="text/javascript">
    $('.datepicker').pickadate({
        format: 'yyyy/m/d'
        })
   </script>
    
</body>
</html>