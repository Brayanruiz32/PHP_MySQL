<?php 
    //importamos el archivo del modelo
    require_once("modelo/usuarios_modelo.php");

    $usuario = new usuarios_modelo(); 
    
    $matrizdeusuarios = $usuario->getUsers(); 
    
    //immportamos la vista
    require_once("vista/usuarios_vista.php");


?>