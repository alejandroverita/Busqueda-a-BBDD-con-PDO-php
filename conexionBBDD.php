<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width:50%;
            border:1px solid;
            bg: red;
            margin: auto;
        }
    </style>
</head>
<body>
    
<?php

$db_host="localhost";
$db_nombre="curso_sql";
$db_usuario="root";
$db_contra="";
$db_port=3306;

//$conexion=mysqli_connect($db_host,$db_usuario, $db_contra, $db_nombre, $db_port);
$conexion=new mysqli($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

//en caso de que falle la conexion con la base de datos

if (mysqli_connect_errno()){
    echo "Fallo en la conexion";
    exit();

}
mysqli_set_charset($conexion, "utf8"); //para admitir caracteres latinos

$consulta="SELECT * FROM PRODUCTOS WHERE PAÍSDEORIGEN='ESPAÑA'";

$resultados=mysqli_query($conexion, $consulta);

//fetch all nos devuelve todos los datos internos de la tabla
while(($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC))==true){ //ARRAY ASOCIATIVO CON PARAMETRO: MYSQLI_ASSOC
    echo "<table><tr><td>";
    echo $fila['CÓDIGOARTÍCULO'] . " </td><td>";
    echo $fila['NOMBREARTÍCULO'] . " </td><td>";
    echo $fila['PAÍSDEORIGEN'] . " </td><td></tr></table>";
    echo "<br>";
    echo "<br>";
}

//sqli_close($conexion)


?>



</body>
</html>