<?php

require "conexion.php";

//HERENCIA de Clase Conexion

class DevuelveProductos extends Conexion {
    public function DevuelveProductos() {

//PARENT para llamar al constructor, variable o método de la clase Padre 
        parent::__construct(); 
    }

//Metodo encargado de hacer consulta SQL y devolver un array con los registros
    public function get_productos() {

        $resultado=$this->conexion_db->query('SELECT * FROM PRODUCTOS');
        $productos=$resultado->fetch_all(MYSQLI_ASSOC); //Devolver un array asociativo
        return $productos; 


    }


}



?>