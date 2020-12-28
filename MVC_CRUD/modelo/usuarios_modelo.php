<?php 
    //include(); 
    
    class usuarios_modelo{//clase para los usuarios del modelo 
            
        private $db; //propiedad para almacenar la conexion a la BD
        private $usuarios; //propiedad para almacenar la lista de personas devueltas mediante la consulta

        public function __construct(){//el constructor de la clase
            
            require_once("modelo/Conectar.php");//incluimos un archivo para la conexion 
            
            $this->db = Conectar::obtener_conexion();//almacenamos en la propiedad db, la conexion de la clase conectar que esta en un metodo estatico
            
            $this->usuarios = array(); //creamos un array en donde se almacenaran los usuarios
            
        }

        public function getUsers(){//metodo para ejecutar la sentencia sql 

            require_once("paginacion.php"); 
            
            $consulta = $this->db->query("SELECT * FROM datos_usuarios LIMIT $desde,$registrosxpagina");//mediante la conexion se hace un consulta simple a la BD
            
            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){//se ejecuta el while para recorrder los registros
                
                $this->usuarios[] = $filas;//se almacena dentro del array creado los recorridos que vaya haciendo el while a los registros
                
            }
            return $this->usuarios;            
        }
        
        
        public function setUser($nombre, $apellido, $direccion){
            
            $sql = "INSERT INTO datos_usuarios(Nombre, Apellido, Direccion) VALUES('$nombre', '$apellido', '$direccion')"; 
            
            $consulta = $this->db->prepare($sql); 
            
            $consulta->execute(); 
            

        }
        
        
        public function deleteUser($id){
            
            $sql = "DELETE FROM datos_usuarios WHERE $id"; 
            
            $consulta = $this->db->query($sql);  
            
            
        }
        
        
        public function updateUser($id,$nombre, $apellido, $direccion){
            
            $sql = "UPDATE datos_usuarios SET Nombre='$nombre', Apellido='$apellido', Direccion='$direccion' WHERE Id=$id"; 
            
            $consulta = $this->db->prepare($sql);
            
            $consulta->execute(); 
            
        }
        
        

    }


?>