<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php
	
    /*
    funcion is_array para comprobar si es un array o no la funcion
    funcion foreach permite recorrer todos los elementos en un array asociativo
    para recorrer arrays indexados basta con bucles for 
    funcion sort sirve para ordenar los elementos de un array
    */
	
    /*
    ARRAYS MULTIDIMENSIONALES VIDEO 32 P.INFORMATICAS
    se recorre cada elemento con bucle FOREACH
    Para listar los elementos con funcion list
    Hay que crear dos variables que identifiquen al arreglo del primer array y otra para 
    el segundo array
    */
    $alimento=array("fruta"=>array("tropical"=>"kiwi",
                                    "citrico"=>"mandarina",
                                    "otros"=>"manzana"), 
                    "leche"=>array("animal"=>"vaca",
                                    "vegetal"=>"coco"), 
                    "carne"=>array("vacuno"=>"lomo",
                                    "porcino"=>"pata"));
       // echo $alimento["carne"]["vacuno"];

       foreach ($alimento as $clave_alim=>$alim){
           echo "$clave_alim:<br>";
           //while (list($clave, $valor)=each($alim)){ DESACTUALIZADO
            foreach($alim as $content=>$content2){
               echo "$content=$content2<br>";
           }
           echo"<br>"; 
       }
    

?>
</body>
</html>