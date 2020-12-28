<?php 
    //include(); 
    
    class usuarios_modelo{//clase para los usuarios del modelo 
            
        private $db; //propiedad para almacenar la conexion a la BD
        private $usuarios; //propiedad para almacenar la lista de personas devueltas mediante la consulta

        public function __construct(){//el constructor de la clase
            
            require_once("modelo/Conectar.php");//incluimos un archivo para la conexion 
            
            $this->db = conectar::obtener_conexion();//almacenamos en la propiedad db, la conexion de la clase conectar que esta en un metodo estatico
            
            $this->usuarios = array(); //creamos un array en donde se almacenaran los usuarios
            
        }

        public function getUsers(){//metodo para ejecutar la sentencia sql 
            
            $consulta = $this->db->query("SELECT * FROM datos_usuarios");//mediante la conexion se hace un consulta simple a la BD
            
            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){//se ejecuta el while para recorrder los registros
                
                $this->usuarios[] = $filas;//se almacena dentro del array creado los recorridos que vaya haciendo el while a los registros
                
            }
            return $this->usuarios;            
        }

    }


?>