<?php 
class conexion{
    
    
    public static function getConexion(){
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=blog", "root", "");
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $conexion->exec("SET CHARACTER SET UTF8"); 
            
        } catch (Exception $e) {
            
            die("Error: " . $e->GetMessage());
            
            echo "Linea de error" . $e->getLine(); 
            
        }
        return $conexion; 
    
    }
    
    
}



?>