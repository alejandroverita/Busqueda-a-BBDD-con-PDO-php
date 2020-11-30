<?php
require "devuelveProductos.php";
$productos=new DevuelveProductos();
$array_productos=$productos->get_productos();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    //recorriendo array donde se guardan los datos almacenados en la variable producto
    foreach ($array_productos as $elemento) {

        echo "<table><tr><td>";
        echo $elemento['CÓDIGOARTÍCULO'] . "</td><td>";
        echo $elemento['NOMBREARTÍCULO'] . "</td><td>";
        echo $elemento['SECCIÓN'] . "</td><td>";
        echo $elemento['PRECIO'] . "</td><td>";
        echo $elemento['FECHA'] . "</td><td>";
        echo $elemento['IMPORTADO'] . "</td><td>";
        echo $elemento['PAÍSDEORIGEN'] . "</td><td>";
        echo $elemento['CÓDIGOARTÍCULO'] . "</td></tr></table>";

        echo "<br>";
        echo "<br>";


    }
?>
</body>
</html>