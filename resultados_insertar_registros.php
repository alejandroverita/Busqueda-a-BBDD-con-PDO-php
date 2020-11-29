<?php

    $c_art=$_GET["c_art"];  
    $secc=$_GET["secc"];  
    $n_art=$_GET["n_art"];  
    $pre=$_GET["pre"];  
    $fec=$_GET["fec"];  
    $imp=$_GET["imp"];  
    $p_ori=$_GET["p_ori"]; 

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

    $sql="INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, 
    IMPORTADO, PAÍSDEORIGEN) VALUES (?,?,?,?,?,?,?)";

    $resultado=mysqli_prepare($conexion, $sql);//almacenando objeto mysqli como parametro de la funcion. Se le pasa la conexion y la consulta

    $ok=mysqli_stmt_bind_param($resultado, "sssdsss", $c_art, $secc, $n_art, $pre, $fec, $imp, $p_ori); // 3 criterios: mysqli_prepare, tipo de dato que se usa como criterio, tantas variable donde se almacena lo que el usuario escribio

    $ok=mysqli_stmt_execute($resultado); //pasarle objeto mysqli_stmt

    if ($ok==false){
        echo "Error al ejecutar la consulta";
    } else {
        echo "Agregado nuevo registro";
        /*$ok=mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $porig); //primer parametro objeto mysqli_stmt
        echo "<br><br>Articulos encontrados: <br><br>";

        while(mysqli_stmt_fetch($resultado)){ //pide el objeto devuelto por prepare
            echo $codigo . " " . $seccion . " " . $precio . " " . $porig . "<br>";
        } */

        mysqli_stmt_close ($resultado); //cerrar objeto que devuelve funcion prepare
    }

?>


 