<!DOCTYPE HTML> 
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
    //reanudamos la sesion iniciada mediante la funcion session_start() 
    session_start(); 
    if(!isset($_SESSION["usuarios"])){
        header('location:login.php'); 
    }

?>

<h1>Inicio de sesion exitoso</h1>
<?php 
    echo "HOLA " . $_SESSION["usuarios"] . " BIENVENIDO A TU ESPACIO."; 
?>
<p><a href="cerrar.php">Cerrar sesion</a></p>
<p><a href="login_usuarios_registrados.php">Volver al inicio</a></p>
<p>Informacion solo para usuarios registrados como tu</p>
</body>
</html>