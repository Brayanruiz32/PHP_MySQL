<?php 
    require("Conexion.php"); 
    //Conexion mediante la libreria PDO
    class Devuelve_Productos extends Conexion{
        
        public function __construct(){
            //invocamos al constructor de la clase padre para que inicie todo el condigo de conexion
            parent::__construct();
            
        }
        
        //creacion de un metodo getter
        public function getproductos($word){
            //usamos la propiedad de la clase padre
            $sql = "SELECT * FROM usuarios WHERE Nombre = '" . $word .  "'"; 
            //preparamos la PDO_Statement
            $sentencia = $this->conexiondb->prepare($sql); 
            //ejecutamos la sentencia execute asociandolo con un marcador
            $sentencia->execute(array()); 
            //Se guarda los datos de la consulta 
            $results = $sentencia->fetchAll(PDO::FETCH_ASSOC); 
            
            $sentencia->closeCursor(); 
            
            return $results; 
            
            $this->conexionbd = null;  
            
        }
        
        
        
    }
    
    
    
    
    
    
    
    
    //--------------------------------------------------------------------------------------------------------------------
    /*
    class Devuelve_Productos extends Conexion{
        
        public function Devuelve_Productos(){
            //invocamos al constructor de la clase padre para que inicie todo el condigo de conexion
            parent::__construct(); 
        
        }
        
        //creacion de un metodo getter 
        public function getproductos($word){
            //usamos la propiedad de la clase padre
            $resultado = $this->conexiondb->query("SELECT * FROM usuarios WHERE Nombre = '" . $word . "'");
            //creamos una variable que mediante la instruccion fetch_all en el cual se le introduce por parametro especificando 
            //el tipo de indice que tendra, en este caso es un indice asociado
            $productos = $resultado->fetch_all(MYSQLI_ASSOC); 
            //Retorna los datos almacenados dentro de la variable productos
            return $productos; 
        }      
    }
   */

?>