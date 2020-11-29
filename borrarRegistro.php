<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>

h1{
	text-align:center;
	color:#00F;
	border-bottom:dotted #0000FF;
	width:50%;
	margin:auto;
	
	
}

table{
	border:1px solid #F00;
	padding:20px 50px;
	margin-top:50px;
}

body{
	background-color:#FFC;
}


</style>
</head>

<body>
<h1>Eliminacion de Artículos</h1>
<form name="form1" method="get" action="">
  <table border="0" align="center">
    <tr>
      <td>Código Artículo</td>
      <td><label for="c_art"></label>
      <input type="text" name="c_art" id="c_art"></td>
    </tr>
    <tr>
      <td>Sección</td>
      <td><label for="seccion"></label>
      <input type="text" name="seccion" id="seccion"></td>
    </tr>
    <tr>
      <td>Nombre artículo</td>
      <td><label for="n_art"></label>
      <input type="text" name="n_art" id="n_art"></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td><label for="precio"></label>
      <input type="text" name="precio" id="precio"></td>
    </tr>
    <tr>
      <td>Fecha</td>
      <td><label for="fecha"></label>
      <input type="text" name="fecha" id="fecha"></td>
    </tr>
    <tr>
      <td>Importado</td>
      <td><label for="importado"></label>
      <input type="text" name="importado" id="importado"></td>
    </tr>
    <tr>
      <td>País de Origen</td>
      <td><label for="p_orig"></label>
      <input type="text" name="p_orig" id="p_orig"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
      <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
    </tr>
  </table>
</form>

<?php 

$cod=$_GET["c_art"];
$sec=$_GET["seccion"];
$nom=$_GET["n_art"];
$pre=$_GET["precio"];
$fec=$_GET["fecha"];
$imp=$_GET["importado"];
$por=$_GET["p_orig"];

//-----------------------CONEXION A BASE DE DATOS----------------

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

$consulta= "DELETE FROM PRODUCTOS WHERE CÓDIGOARTÍCULO='$cod'";

$resultados=mysqli_query($conexion, $consulta);

if($resultados==false){
    echo "Error en la consulta";

} else {
    //echo "Registro ELIMINADO";

    //echo mysqli_affected_rows($conexion); 
    if (mysqli_affected_rows($conexion)==0)
    {
        echo "No hay registros con ese criterio";
    }
    else
    {
        echo "Se han eliminado " . mysqli_affected_rows($conexion) . " registros";
    }
} 


//sqli_close($conexion)


?>
</body>
</html>