
<?php

//$busqueda=$_GET["buscar"];

$cod=$_GET["c_art"];
$sec=$_GET["seccion"];
$nom=$_GET["n_art"];
$pre=$_GET["precio"];
$fec=$_GET["fecha"];
$imp=$_GET["importado"];
$por=$_GET["porig"];

//-----------------------CONEXION A BASE DE DATOS----------------

$db_host="localhost";
$db_nombre="curso_sql";
$db_usuario="root";
$db_contra="";
$db_port=3306;  

//$conexion=mysqli_connect($db_host,$db_usuario, $db_contra, $db_nombre, $db_port);
$conexion=new mysqli ($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

//en caso de que falle la conexion con la base de datos

if (mysqli_connect_errno()){
    echo "Fallo en la conexion";
    exit();

}

mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8"); //para admitir caracteres latinos

$consulta= "UPDATE productos SET CÓDIGOARTÍCULO='$cod', SECCIÓN='$sec', NOMBREARTÍCULO='$nom', PRECIO= $pre, FECHA= $fec, IMPORTADO='$imp', PAÍSDEORIGEN='$por' WHERE CÓDIGOARTÍCULO='$cod'";

$resultados=mysqli_query($conexion, $consulta);

if($resultados==false){
    echo "Error en la consulta";

} else {
    echo "Registro guardado<br><br>";

    echo "<table><tr><td>$cod</td></tr>";

    echo "<tr><td>$sec</td></tr>";

    echo "<tr><td>$nom</td></tr>";

    echo "<tr><td>$pre</td></tr>";

    echo "<tr><td>$fec</td></tr>";

    echo "<tr><td>$por</td></tr></table>";
}


$conexion->close();


?>
</body>
</html>