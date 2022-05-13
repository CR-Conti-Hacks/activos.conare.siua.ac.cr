

<div class="horizontal-centering"><div><div>
    <ul id="nav" class="dropdown dropdown-horizontal">
    
<?php

        $sql="SELECT Id_Menu, Nivel_Menu, Nombre_Menu, Accion_Menu, Tipo_Menu,Permiso_Menu FROM tab_menu WHERE Nivel_Menu = 0 ";
        $nivel_0=seleccion($sql); 
        
        for($i=0; $i < count($nivel_0); $i++){
                //obtenemos los datos
                $nombre=$nivel_0[$i]['Nombre_Menu'];
                $accion=$nivel_0[$i]['Accion_Menu'];
                $Permiso_Menu=$nivel_0[$i]['Permiso_Menu'];
                //Calculamos el tamano que debe tener
                $longitud = strlen ( $nombre );
                if($longitud <= 7){
                     $tamano = 'Pequeno';
                }elseif(($longitud > 7) && ($longitud <=14 )){
                     $tamano = 'Mediano';
                }elseif($longitud > 14) {
                     $tamano = 'Grande';
                }
                //Si tiene hijos haga lo siguiente
                if($nivel_0[$i]['Tipo_Menu']==1){
                        $sql2="SELECT Id_Menu, Nivel_Menu, Nombre_Menu, Accion_Menu, Tipo_Menu,Permiso_Menu FROM tab_menu WHERE Padre_Menu='".$nivel_0[$i]['Id_Menu']."' AND Nivel_Menu = 1 ORDER BY Nombre_Menu";
                        $nivel_1=seleccion($sql2);
                        
                        //nivel 1 si no esta vacio
                        if($nivel_1[0]['Id_Menu']!=''){
                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                        //Nivel 0 si tiene hijos
                                        echo '<li id="'.$tamano.'"><a onclick="'.$accion.'" class="dir">'.$nombre.'</a>';
                                        
                                }
                                echo '<ul>';
                                //Recorremos el nivel 1
                                for($a=0; $a < count($nivel_1); $a++){
                                        //obtenemos los datos
                                        $nombre = $nivel_1[$a]['Nombre_Menu'];
                                        $accion=$nivel_1[$a]['Accion_Menu'];
                                        $Permiso_Menu=$nivel_1[$a]['Permiso_Menu'];
                                        
                                        if($a==0){
                                            $clase = 'class="first"';
                                        }else{
                                            $clase ='';
                                        }
                                        //Si tiene hijos haga lo siguiente
                                        if($nivel_1[$a]['Tipo_Menu']==1){
                                                $sql3="SELECT Id_Menu, Nivel_Menu, Nombre_Menu, Accion_Menu, Tipo_Menu, Permiso_Menu FROM tab_menu WHERE Padre_Menu='".$nivel_1[$a]['Id_Menu']."' AND Nivel_Menu = 2 ORDER BY Nombre_Menu";
                                                $nivel_2=seleccion($sql3);
                                        
                                                //Si tiene hijos
                                                if($nivel_2[0]['Id_Menu']!=''){
                                                        if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                //Nivel 2 si tiene hijos
                                                                echo '<li><a onclick="'.$accion.'" class="dir">'.$nombre.'</a>';
                                                                
                                                        }
                                                        echo '<ul>';
                                                        
                                                        //Recorremos el nivel 2
                                                        for($b=0; $b < count($nivel_2); $b++){
                                                                //obtenemos los datos
                                                                $nombre = $nivel_2[$b]['Nombre_Menu'];
                                                                $accion=$nivel_2[$b]['Accion_Menu'];
                                                                $Permiso_Menu=$nivel_2[$b]['Permiso_Menu'];
                                                                
                                                                if($b==0){
                                                                    $clase = 'class="first"';
                                                                }else{
                                                                    $clase ='';
                                                                }
                                                                
                                                                
                                                                //Si tiene hijos haga lo siguiente
                                                                if($nivel_2[$b]['Tipo_Menu']==1){
                                                                        $sql4="SELECT Id_Menu, Nivel_Menu, Nombre_Menu, Accion_Menu, Tipo_Menu,Permiso_Menu FROM tab_menu WHERE Padre_Menu='".$nivel_2[$b]['Id_Menu']."' AND Nivel_Menu = 3 ORDER BY Nombre_Menu";
                                                                        $nivel_3=seleccion($sql4);
                                                                        //Si tiene hijos
                                                                        if($nivel_3[0]['Id_Menu']!=''){
                                                                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                        //Nivel 3 si tiene hijos
                                                                                        echo '<li><a onclick="'.$accion.'" class="dir">'.$nombre.'</a>';
                                                                                        
                                                                                }
                                                                                echo '<ul>';
                                                                                
                                                                                //Recorremos el nivel 3
                                                                                for($c=0; $c < count($nivel_3); $c++){
                                                                                        //obtenemos los datos
                                                                                        $nombre = $nivel_3[$c]['Nombre_Menu'];
                                                                                        $accion=$nivel_3[$c]['Accion_Menu'];
                                                                                        $Permiso_Menu=$nivel_3[$c]['Permiso_Menu'];
                                                                                        if($c==0){
                                                                                           $clase = 'class="first"';
                                                                                        }else{
                                                                                           $clase ='';
                                                                                        }
                                                                                        //Si tiene hijos haga lo siguiente
                                                                                        if($nivel_3[$c]['Tipo_Menu']==1){
                                                                                                $sql5="SELECT Id_Menu, Nivel_Menu, Nombre_Menu, Accion_Menu, Tipo_Menu, Permiso_Menu FROM tab_menu WHERE Padre_Menu='".$nivel_3[$c]['Id_Menu']."' AND Nivel_Menu = 4 ORDER BY Nombre_Menu";
                                                                                                $nivel_4=seleccion($sql5);
                                                                                                if($nivel_4[0]['Id_Menu']!=''){
                                                                                                        if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                                                //Nivel 4 si tiene hijos
                                                                                                                echo '<li><a onclick="'.$accion.'" class="dir">'.$nombre.'</a>';
                                                                                                                
                                                                                                        }
                                                                                                        echo '<ul>';
                                                                                                        //Recorremos el nivel 3
                                                                                                        for($d=0; $d < count($nivel_4); $d++){
                                                                                                                
                                                                                                                //obtenemos los datos
                                                                                                                $nombre = $nivel_4[$d]['Nombre_Menu'];
                                                                                                                $accion=$nivel_4[$d]['Accion_Menu'];
                                                                                                                $Permiso_Menu=$nivel_4[$d]['Permiso_Menu'];
                                                                                                                if($d==0){
                                                                                                                   $clase = 'class="first"';
                                                                                                                }else{
                                                                                                                   $clase ='';
                                                                                                                }
                                                                                                                
                                                                                                                //Si tiene hijos haga lo siguiente
                                                                                                                if($nivel_4[$c]['Tipo_Menu']==1){
                                                                                                                        $sql6="SELECT Id_Menu, Nivel_Menu, Nombre_Menu, Accion_Menu, Tipo_Menu, Permiso_Menu FROM tab_menu WHERE Padre_Menu='".$nivel_4[$d]['Id_Menu']."' AND Nivel_Menu = 5 ORDER BY Nombre_Menu";
                                                                                                                        $nivel_5=seleccion($sql6);
                                                                                                                        
                                                                                                                        if($nivel_5[0]['Id_Menu']!=''){
                                                                                                                                /********************** aqui paramos el nivel ***************/
                                                                                                                        }else{
                                                                                                                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                                                                       echo '<li '.$clase.'><a onclick="'.$accion.'">'.$nombre.'</a>';
                                                                                                                                }
                                                                                                                        }
                                                                                                                
                                                                                                                }else{
                                                                                                                        if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                                                               echo '<li '.$clase.'><a onclick="'.$accion.'">'.$nombre.'</a></li>';
                                                                                                                        }
                                                                                                                }
                                                                                                       
                                                                                                                /********************** aqui paramos el nivel ***************/
                                                                                                                       
                                                                                                        }
                                                                                                        echo '</ul>';
                                                                                                        if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                                               echo '</li>';
                                                                                                        }
                                                                                                                
                                                                                                }else{
                                                                                                        if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                                               echo '<li '.$clase.'><a onclick="'.$accion.'">'.$nombre.'</a></li>';
                                                                                                        }
                                                                                                }
                                                                                        
                                                                                        
                                                                                       
                                                                                       
                                                                                        }else{
                                                                                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                                       echo '<li '.$clase.'><a onclick="'.$accion.'">'.$nombre.'</a></li>';
                                                                                                }
                                                                                        }
                                                                                       
                                                                                }
                                                                                echo '</ul>';
                                                                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                       echo '</li>';
                                                                                }
                                                                        }else{
                                                                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                                        echo '<li '.$clase.'><a onclick="'.$accion.'">'.$nombre.'</a></li>';
                                                                                }
                                                                        }
                                                                        
                                                                        
                                                                        
                                                                        
                                                                }else{
                                                                        if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                                               echo '<li '.$clase.'><a onclick="'.$accion.'">'.$nombre.'</a></li>';
                                                                        }
                                                                               
                                                                }
                                                        
                                                        }
                                                        echo '</ul>';
                                                        if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                               echo '</li>';
                                                        }
                                        
                                                }
                                        
                                        
                                        
                                        
                                        
                                        
                                        }else{
                                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                                       echo '<li '.$clase.'><a onclick="'.$accion.'">'.$nombre.'</a></li>';
                                                }
                                        }
                                        
                                        
                                                       
                                        
                                }
                                echo '</ul>';
                                if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                                  echo '</li>';
                                }
                                
                                
                                
                                
                                
                                
                                
                                
                        }
                        
                        
                //Nivel 0 no tiene hijos    
                }else{
                      if(in_array($Permiso_Menu,$_SESSION['Permisos'])){ 
                             echo '<li id="'.$tamano.'"><a onclick="'.$accion.'">'.$nombre.'</a></li>';
                      }
                }
                
        }
?>

        <li><a onclick="Salir('<?=$Id_Per_Usu?>');"><?=$texto['Salir']?></a></li>
    </ul>

</div></div></div>


