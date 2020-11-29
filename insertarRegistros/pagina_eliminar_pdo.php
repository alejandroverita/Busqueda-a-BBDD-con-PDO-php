<?php

$busqueda_cart=$_POST ['c_art'];

    try {
        $base= new PDO ('mysql:host=localhost; dbname=curso_sql', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// captura el error para mostrarlo
        //echo 'Conexión Ok';
        $base->exec("SET CHARACTER SET UTF8");
        //$sql= "SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE NOMBREARTÍCULO= :n_art"; //marcador es precededido de los dos puntos
        
        /*$sql="INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN) 
        VALUES (:c_art, :seccion, :n_art, :precio, :fecha, :importado, :p_orig)";
        */

        $sql="DELETE FROM PRODUCTOS WHERE CÓDIGOARTÍCULO=:c_art";

        $resultado=$base->prepare($sql); //devuelve objeto PDO Statement
         
        /*$resultado->execute(array(":c_art"=>$busqueda_cart, ":seccion"=>$busqueda_seccion, ":n_art" => $busqueda_nart, 
        ":precio"=>$busqueda_precio, ":fecha"=>$busqueda_fecha, ":importado"=>$busqueda_importado, ":p_orig"=>$busqueda_porig));
        */

        $resultado->execute(array(":c_art"=>$busqueda_cart)); 

        /* while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            echo "Nombre Artículo: " . $registro['NOMBREARTÍCULO'] . " SECCION: " . $registro['SECCIÓN'] . 
            " PRECIO: " . $registro['PRECIO'] . " PAIS DE ORIGEN: " . $registro['PAÍSDEORIGEN'] . "<br>";
        }*/

        echo "Registro eliminado";
        
        $resultado->closeCursor();
    } catch(Exception $e) {
        die('Error: ' . $e->GetMessage());
    }finally{
        $base=null;
    }

?>
