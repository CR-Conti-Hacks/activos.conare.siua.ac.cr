<?php       

    if(isset($Id_Per_Usu)){
        /*obtener el nombre de la session*/
        $sql="SELECT Nombre_Session_Usu,key_Usu
                        FROM tab_usuarios 
                        WHERE Id_Per_Usu=".$Id_Per_Usu;
        $res=seleccion($sql);
        
        //Abrimos la session
        if(!isset($_SESSION['session_time'])){
            session_name($res[0]['Nombre_Session_Usu']);
            session_start();    
        }
        
        
        
        //Tiempo maximo en segundos de la duración de la sesión sin actividad de la tabla de configuracion.
        $tiempomax=$res_principal[0]['Tiempo_Session_Conf']; 
        //Si el tiempo ya expiro
        $_SESSION['session_time'];
        if (($_SESSION['session_time']+$tiempomax)<time())
        {
        ?>
        <script type="text/javascript">
        alert(texto['ERROR_Tiempo_Session']);
       
        //Para eliminar correctamente la session
        Salir('<?= $Id_Per_Usu ?>');
        </script>
        <?php
        }else{
            //Sino se a vencido el tiempo actualicelo hay actividad
            $_SESSION['session_time']=time();
        }      
    }
    
?>