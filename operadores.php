
<style>
.resultado{
    color: #F00;
    font-weight:bold;
    font-size: 32px;
}

</style>

<?php
//Las variables SUPERGLOBALES en php son ARRAYS
if(isset($_POST["button"])) {
    $numero1= $_POST["num1"];
    $numero2= $_POST["num2"];
    $operacion= $_POST["operacion"];

    calcular($operacion);
}

function calcular($calculo){

    global $numero1;
    global $numero2;
    

    if(!strcmp("Suma", $calculo)) { 
      $resultado=$numero1+$numero2;  

      echo "<p class= 'resultado'> El resultado es: $resultado </p>";
    } 
    
    if(!strcmp("Resta", $calculo)) {
       
      $resultado=$numero1-$numero2;   
      echo "<p class= 'resultado'> El resultado es: $resultado </p>";
    } 

    if(!strcmp("Multiplicación", $calculo)) {
      $resultado=$numero1*$numero2; 
      echo "<p class= 'resultado'> El resultado es: $resultado </p>";
    } 

    if(!strcmp("División", $calculo)) {
        $resultado=$numero1/$numero2; 
        echo "<p class= 'resultado'> El resultado es: $resultado </p>";
    } 

    if(!strcmp("Módulo", $calculo)) {
    $resultado=$numero1%$numero2; 
      echo "<p class= 'resultado'> El resultado es: $resultado </p>";
    } 
   
}

?>