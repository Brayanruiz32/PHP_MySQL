<?php 
    //require("config.php");
    //CONEXION MEDIANTE LA LIBRERIA PDO
    class Conexion{
        
        protected $conexiondb; //declaramos la propiedad conexionbd
        
        public function __construct(){
            try {
                
                //$this->conexiondb = new PDO("mysql:host=localhost; dbname=empleados", "root", "");  
                $this->conexiondb = new PDO("mysql:host=localhost; dbname=pruebas", "root", ""); 
                //Poner e atributo con las instrucciones PDO para la captura de errores
                $this->conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                //Condificacion para la codificacion utf-8 
                $this->conexiondb->exec("SET CHARACTER SET utf8"); 
                
                return $this->conexiondb; 
                
            } catch (Exception $e) {
                //Captura de errores junto con una funcion de linea 
                die( "Error: " . $e->getLine() . " " . $e->getMessage()); 
                
            }

            
        }
        
    }

    
    //----------------------------------------------------------------------------------------------------------
    /*
    class Conexion{
    
        protected $conexiondb; //declaramos la propiedad conexionbd
        
        public function Conexion(){
            $this->conexiondb = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE); 
            //Funcion if para capturar el fallo que se llegue a producir al hacer la conexion con la Base de Datos
            if($this->conexiondb->connect_errno){
                echo "Fallo al conectar mysql" . $this->conexiondb->connect_error;
                //return;
            }
            $this->conexiondb->set_charset(DB_CHARSET); 
            
        }
        
    }
*/

?>