<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>
	h1{
		text-align:center;
	}

	table{
		background-color:#FFC;
		padding:5px;
		border:#666 5px solid;
	}
	
	.no_validado{
		font-size:18px;
		color:#F00;
		font-weight:bold;
	}
	
	.validado{
		font-size:18px;
		color:#0C3;
		font-weight:bold;
	}


</style>
</head>

<body>
<h1>USANDO OPERADORES COMPARACIÓN</h1>

<form  method="post" name="datos_usuario" id="datos_usuario">
  <table width="15%" align="center">
    <tr>
      <td>Nombre:</td>
      <td><label for="nombre_usuario"></label>
      <input type="text" name="nombre_usuario" id="nombre_usuario"></td>
    </tr>
    <tr>
      <td>Edad:</td>
      <td><label for="edad_usuario"></label>
      <input type="text" name="edad_usuario" id="edad_usuario"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Enviar"></td>
    </tr>
  </table>
</form>

<?php
//funcion predefinida isset para saber si se ha pulsado el boton de enviar. Con parentesis y argumentos
  if(isset($_POST["enviando"])){
    //$_POST es una variable SUPERGLOBAL. Es un array
    $usuarios=$_POST["nombre_usuario"];
    $edad=$_POST["edad_usuario"];

    if($usuarios=="Luis" && $edad>=18 ){
      echo"<p class= 'validado'>Puedes pasar</p>";
    }else {
      echo "<p class = 'no_validado'> No puedes pasar . </p>";
    }
  }

  //Constantes: valores que no cambian. Por convencion definidos en mayuscula
  //van dentro de una funcion que recibe como primer parametro el nombre de la constante
  //y como segundo paramentro el tipo si es de texto numerico etc
  echo "Esta linea esta en: " . __LINE__;

?>


</body>
</html>