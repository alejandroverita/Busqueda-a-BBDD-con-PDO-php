
<?php

$busqueda=$_GET["buscar"];

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

$consulta="SELECT * FROM PRODUCTOS WHERE NOMBREARTÍCULO LIKE '%$busqueda%'";

$resultados=mysqli_query($conexion, $consulta);

//fetch all nos devuelve todos los datos internos de la tabla
while(($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC))==true){ //ARRAY ASOCIATIVO CON PARAMETRO: MYSQLI_ASSOC
    //echo "<table><tr><td>";
    echo "<form action='Actualizar.php' method='get'>";
    echo "<input type='text' name='c_art' value='" . $fila['CÓDIGOARTÍCULO'] . "'><br>";
    echo "<input type='text' name='n_art' value='" . $fila['NOMBREARTÍCULO'] . "'><br>";
    echo "<input type='text' name='seccion' value='" . $fila['SECCIÓN'] . "'><br>";
    echo "<input type='text' name='importado' value='" . $fila['IMPORTADO'] . "'><br>";
    echo "<input type='text' name='precio' value='" . $fila['PRECIO'] . "'><br>";
    echo "<input type='text' name='fecha' value='" . $fila['FECHA'] . "'><br>";
    echo "<input type='text' name='porig' value='" . $fila['PAÍSDEORIGEN'] . "'><br>";

    echo "<input type='submit' name='enviando' value='Actualizar!'>";

    echo "</form>";
    echo "<br>";
}

//sqli_close($conexion)
$conexion->close();


?>
