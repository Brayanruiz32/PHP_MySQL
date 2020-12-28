<?php 
    //solamente muestra cuando se ingresa un nuevo titulo
    if(isset($_POST["titulo"])){
        $titulo = $_POST["titulo"];
        $comentario = $_POST["comentario"];
        $imagen = $_FILES["imagen"];
        $fecha = date("Y-m-d H:i:s");
        include("../modelo/titulo.php");
        $nuevotitulo = new titulo();
        $nuevotitulo->setNewTitle($titulo, $comentario, $imagen, $fecha);
        $consulta = $nuevotitulo->getTitles();
        include("../vista/mostrar_blog.php"); 
    }else{
        
        include("vista/formulario.php"); 
    
    }

?>