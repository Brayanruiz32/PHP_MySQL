<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
        //Codigo de borrado de un registro simple 
        require("Conexion.php"); 
        $id = $_GET["Id"]; 
        $base->query("DELETE FROM datos_usuarios WHERE Id = '$id'");
        /*$resultado = $base->prepare($sql);
        $resultado->bindValue(":identi", $id); 
        $resultado->execute(); 
        */header("location: formulario.php"); 



?>

</body>
</html>