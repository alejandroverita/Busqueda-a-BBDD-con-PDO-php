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

<?php

if(isset($_POST["enviando"])){
	$contra=$_POST["contra_usuario"];
	$usuario=$_POST["nombre_usuario"];

	switch($usuario) {

		case "Juan":
			echo "Usuario autorizado. Bienvenido Juan";
		break;

		case "Maria":
			echo "Usuario autorizado. Bienvenido Maria";
		break;

		case "Luis":
			echo "Usuario autorizado. Bienvenido Luis";
		break;

		default :
			echo "No Autorizado";
	}

	/*if($edad<=18){
		echo "Eres menor de edad";
	} else if ($edad<=40) {
		echo "Ya estas casi jubilandote";
	}else if ($edad<=65){
		echo "Ya debes estar jubilado";
	}else {
		echo "Anda con cuidado";
	}*/
}
	
?>