<?php 
if(isset($_GET["Id"])){
    
    $id = $_GET["Id"];

    require_once("../modelo/usuarios_modelo.php");
    $user_delete = new usuarios_modelo();
    $user_delete->deleteUser($id);
    
    header("location:index.php"); 
}

?>