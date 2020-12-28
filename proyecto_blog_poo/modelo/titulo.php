<?php 
class titulo{
        
    private $db; //conexion 
    private $titulo; 
    private $comentarios; 
    private $imagen; 
    private $fecha; 
    
    function __construct(){
        
        include("conexion.php"); 
        
        $this->db = conexion::getConexion(); //asignamos la conexion a la clase
        
    }
    
    function SetNewTitle($title, $coments, $image, $fecha){//recibo los datos como argumentos de los parametros
        //asignamos los valores que reciba el metodo para poder chambear con estos
        $this->titulo = $title; 
        $this->comentarios = $coments; 
        $this->imagen = $image; //le pasamos el $_FILES["name"]
        $this->fecha = $fecha; //poner el tiempo mediante el metodo time
        //trabajamos con la imagen para guardar la ruta
        $ruta_destino = "../imagenes/"; 
        $nombre_imagen = $this->imagen["name"]; 
        move_uploaded_file($this->imagen["tmp_name"], $ruta_destino.$this->imagen["name"]); 
        $sql = "INSERT INTO contenido(Titulo, Fecha, Comentario, Imagen) VALUES('$this->titulo','$this->fecha', '$this->comentarios', '$nombre_imagen')";
        $consulta = $this->db->prepare($sql);  
        $consulta->execute(); 
        $consulta->closeCursor(); 
    }
 
    function getTitles(){
        
        $sql = "SELECT * FROM contenido"; 

        $consulta = $this->db->query($sql);
        
        return $consulta; 
 
    }
    
}






?>