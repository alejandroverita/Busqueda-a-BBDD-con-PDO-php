<?php

	class Compra_vehiculo{
		
		private $precio_base;
		
		private static $ayuda=4500; //puede se al comienzo o al final
		
				
		function __construct($gama){
			
			if($gama=="urbano"){
				
					$this->precio_base=10000;
				
			}else if($gama=="compacto"){
				
				
					$this->precio_base=20000;	
				
			}
			
			else if($gama=="berlina"){
				
					$this->precio_base=30000;	
				
			}		
			
			
		}// fin constructor
		
		static function descuento_gobierno(){
			//if(date("y-m-d")>"20-11-22"){

			self::$ayuda=4500;
			//}
		}
		
		
		function climatizador(){		
			
			
				$this->precio_base+=2000;					
			
			
		}// fin climatizador
		
		
		function navegador_gps(){
			
			$this->precio_base+=2500;	
			
		}//fin navegador gps
		
		
		
		function tapiceria_cuero($color){
			
			if($color=="blanco"){
			
				$this->precio_base+=3000;
			}
			
			else if($color=="beige"){
				
				$this->precio_base+=3500;
				
			}
			
			else{
				
				$this->precio_base+=5000;
				
			}
			
		}// fin tapicería
		
		
		
		function precio_final(){
			//self::ayuda asi se llama una variable statica
			$valor_final=$this->precio_base-self::$ayuda; //this para hacer referencia a las instancias de la clase, para llamarles
			
			return $valor_final;	
			
		}// fin precio final
		
		
		
	}// fin clase


?>