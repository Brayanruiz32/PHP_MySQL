<?php 
   include('Conexion.php');
   //recibir el los datos de los formularios mediante la funcion get 
   
   class comprueba_login extends Conexion{
        
       public function __construct(){
           //Hacemos la conexion con la base de datos
           parent::__construct(); 
       }
       
       
       public function comprobar($usuario, $password){
           //introducimos dentro de una variable la consulta sql 
           $sql = "SELECT COUNT(ID) FROM usuarios WHERE USUARIO = '" .$usuario . "' AND PASSWORD = '" .$password."'";
           //$sql = "SELECT COUNT(ID) FROM usuarios WHERE USUARIO = :usu AND PASSWORD = :pass";
           //preparamos la sentencia sql 
           //$sentencia = $this->conexiondb->prepare($sql);
           //ejecutamos la sentencia con la PDOstatement
           //$sentencia->execute(array(":usu"=>$usuario, ":pass"=>$password));
           $sentencia = $this->conexiondb->query($sql); 
          // $sentencia->execute(array());
           //preguntamos si fue una consulta exitosa 
           //$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC); 
           $resultados = $sentencia->fetchColumn(); 
           //hacemos el fetch array para la muestra de datos
           return $resultados; 
       }       
       public function acceso($usuario, $password){
           $sql = "SELECT USUARIO FROM usuarios WHERE USUARIO = '" .$usuario . "' AND PASSWORD = '" .$password."'";
           $sentencia = $this->conexiondb->prepare($sql);
           $sentencia->execute(array());
           $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
           $sentencia->closeCursor(); 
           return $resultados;
           $this->conexiondb = null; 
       }
      
       /*
       public function error(){
           echo 'No se encuentra el usuario';
           self::comprobar($usuario, $password); 
       }
       */
       
   }

?>