<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
    include("Conexion.php");
    $nom = $_GET["nombre"];
    $apell = $_GET["apellido"]; 
    $direc = $_GET["direccion"]; 
    $base->query("INSERT INTO datos_usuarios(Nombre, Apellido, Direccion) VALUES('$nom', '$apell', '$direc')"); 
    header('location: formulario.php'); 
?>
</body>
</html>