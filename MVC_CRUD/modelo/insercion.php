<?php 

if(isset($_POST["insertar"])){
    
    $name = $_POST["nombre"];
    $apell = $_POST["apellido"];
    $direc = $_POST["direccion"];
    require_once("modelo/usuarios_modelo.php");
    $user = new usuarios_modelo();
    $user->setUser($name, $apell, $direc);
    
}

?>