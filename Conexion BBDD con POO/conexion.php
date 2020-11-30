<?php
require("config.php");//traemos los datos de configurracion

class Conexion {

    protected $conexion_db;  //variable para almacenar la conexion

    public function __construct(){  //constructor, programar dentro la conexion
    
        $this->conexion_db=new mysqli (DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE); // Parametros de la conexion
        
        //Por si acaso de error

        if($this->conexion_db->connect_errno){
            echo "Fallo al conectar Base de Datos: " . $this->conexion_db->connect_errno;

            return;
        }

        $this->conexion_db->set_charset(DB_CHARSET); //Juego de caracteres
    
    }

}

?>