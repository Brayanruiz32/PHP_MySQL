<?php 
class conectar{
    
    //creacion de un metodo estatico para que al llamar a la clase simplemente se tenga que llamar al metodo estatico
    public static function obtener_conexion(){
        
        try{
            
            $conexion = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");//conexion 
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //captura de errores
            
            $conexion->exec("SET CHARACTER SET UTF8");//para las tildes de las palabras que vayan a ser consultadas 
            
            
        }catch(Exception $e){
            
            die("Error " . $e->getMessage());//devolucion del mensaje en caso de captura de errores
            
            echo "Linea de error: " . $e->getLine(); //obtener la linea del error
            
        }

        return $conexion;//devuelve la conexion para que al momento de instanciarla, devuelva eso
        
    }
    
    
    
}


?>