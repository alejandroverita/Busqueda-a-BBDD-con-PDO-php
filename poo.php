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

<?php
class Coche {
//Propiedades del objeto coche se definen con la palabra reservada var
    private $ruedas; //encapsulamiento de una propiedad con palabra private
    var $color;
    var $motor;
// Los comportamientos se declaran con funciones. Es lo que denomina un METODO
//Programar estado inicial del objeto con el metodo CONSTRUCT
//Metodo setter para modificar prpiedades de un objeto
//metodo getter para ver EL ESTADO DE LAS propiedades de un objeto.
//para modificar o ver una propiedad privada hay que establecer estos metodos: GETTER O SETTER
// SE ESTABLECEN DESUES DEL CONSTRUCTOR

//Con funcion PROTECTED delante de la variable estamos diciendo que ahora esa variables es tambien accesible desde las clases heredadas
    function __construct(){ //metodo constructor, da el estado inicial. Por convencion el mismo nombre de la clase
        $this->ruedas=4;// declao estado inicial
        $this->color="";
        $this->motor=1600; 
    }
    function arrancar (){
        echo "Estoy arrancando";
    }
    function girar(){
        echo "Estoy girando </br>";
    }
    function frenar(){
        echo "Estoy frenando";
    }

    function establece_color($color_coche, $nombre_coche){ //asigna a la propiedad color lo que le pasemos por este parametro
        $this->color=$color_coche;
        echo "<br> El color del " . $nombre_coche . " es: " . $this->color;

    }

}
// instancias o ejemplares de la clase
$renault=new Coche ();



$mazda= new Coche ();

$mazda->girar();
echo $mazda->ruedas;

$renault->establece_color("Azul", "Renault")
?>



</body>
</html>