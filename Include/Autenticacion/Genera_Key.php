<?php
function Genera_key() {
    $generador1 = "wertyuiopasdfghjklzxcvbnm";  
    $generador2 = "MNBVCXZLKJHGFDSAQWERTYUIOP"; 
    $generador3 = "0123456789"; 
    $generador4 = "9876543210"; 
    $generador5 = "5432167890"; 
    $generador6 = "mnbvcxzlkjhgfdsapoiuytrewq"; 
    $generador7 = "asdfghklzxcvbnmqwertyuiop"; 
		
    for ($valor=0; $valor < 7; $valor++) {  
        $generador1[$valor] = substr($generador1, mt_rand(0, strlen($generador1)-1), 1);  
        $generador2[$valor] = substr($generador2, mt_rand(0, strlen($generador2)-1), 1); 
        $generador3[$valor] = substr($generador3, mt_rand(0, strlen($generador3)-1), 1); 
        $generador4[$valor] = substr($generador4, mt_rand(0, strlen($generador4)-1), 1); 
        $generador5[$valor] = substr($generador5, mt_rand(0, strlen($generador5)-1), 1); 
        $generador6[$valor] = substr($generador6, mt_rand(0, strlen($generador6)-1), 1); 
        $generador7[$valor] = substr($generador7, mt_rand(0, strlen($generador7)-1), 1); 
    }
    $Key = $generador1[0].$generador2[0].$generador3[0].$generador4[0].$generador5[0].$generador6[0].$generador7[0];	
    return $Key = trim($Key);

}                
?>