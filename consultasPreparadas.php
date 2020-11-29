<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action method="get">
    <label> Introduce país: <input type="text" name="buscar"></label>
    <input type="submit" name="enviando" value="Dale!">

<?php

/*
1) Escribir sentencia SQL pero sustituyendo el criteri con el interrogante hacia abajo

2)Preparar la consulta: mysqli_prepare() devuelve objeto mysqli_stmt

3)Unir parametros a la sentencia sql con funcion mysqli_stmt_bind_param(). Devuelve verdadero o falso

4)Ejecutar consulta mysqli_stmt_execute(); pide el obejto mysqli. devuelve Boolean

5)asociar variables al resultado de la consulta, crear tantas variables como campos de la consulta 
    funcion mysqli_stmt_bind_result() Devuelve true o false

6)leer resultados mysqli_stmt_fetch

*/
    $pais=$_GET["buscar"];  

    //--------------------CONEXION BBDD
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
    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");

    mysqli_set_charset($conexion, "utf8"); //para admitir caracteres latinos

//-------------------CONSULTA PREPARADA-------------

    $sql="SELECT CÓDIGOARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE PAÍSDEORIGEN= ? ";

    $resultado=mysqli_prepare($conexion, $sql);//almacenando objeto mysqli como parametro de la funcion. Se le pasa la conexion y la consulta

    $ok=mysqli_stmt_bind_param($resultado, "s", $pais); // 3 criterios: mysqli_prepare, tipo de dato que se usa como criterio, variable donde se almacena lo que el usuario escribio

    $ok=mysqli_stmt_execute($resultado); //pasarle objeto mysqli_stmt

    if ($ok==false){
        echo "Error al ejecutar la consulta";
    } else {
        $ok=mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $porig); //primer parametro objeto mysqli_stmt
        echo "<br><br>Articulos encontrados: <br><br>";

        while(mysqli_stmt_fetch($resultado)){ //pide el objeto devuelto por prepare
            echo $codigo . " " . $seccion . " " . $precio . " " . $porig . "<br>";
        } 
    
        mysqli_stmt_close ($resultado); //cerrar objeto que devuelve funcion prepare
    }



?>

</body>
</html>


