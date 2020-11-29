<?php

/*
PHP DATA OBJECT
CAPA DE ABSTRACION
SE SITUO ENTRE EL CODIGO PHP Y LA BBD
PROGRAMACION ORIENTADA A OBJETOS
VENTAJAS:
PERMITE CONECTAR CON DIFERENTES FUENTES DE BASE DE DATOS


1.) Conexion con la clase PDO  a la BBDD, Recibe 3 parametros: ip y nombre base de datos, usuario, contrañeña

ARRAYS ASOCIATIVOS EN VIDEO 54 MARCADORES EN CONSULTAS PREPARADAS

*/
$busqueda=$_GET ['buscar'];
    try {
        $base= new PDO ('mysql:host=localhost; dbname=curso_sql', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// captura el error para mostrarlo
        //echo 'Conexión Ok';
        $base->exec("SET CHARACTER SET UTF8");
        $sql= "SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE NOMBREARTÍCULO= :n_art"; //marcador es precededido de los dos puntos
        $resultado=$base->prepare($sql); //devuelve objeto PDO Statement
        $resultado->execute(array(":n_art" => $busqueda));
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            echo "Nombre Artículo: " . $registro['NOMBREARTÍCULO'] . " SECCION: " . $registro['SECCIÓN'] . 
            " PRECIO: " . $registro['PRECIO'] . " PAIS DE ORIGEN: " . $registro['PAÍSDEORIGEN'] . "<br>";
        }
        $resultado->closeCursor();
    } catch(Exception $e) {
        die('Error: ' . $e->GetMessage());
    }finally{
        $base=null;
    }

?>