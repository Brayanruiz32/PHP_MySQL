<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
    //Reanudamos la sesion 
    //session_start();
    if(!isset($_SESSION["usuarios"])){
            header("location: login.php");
    }
?>
<h1>Bienvenido dentro de la HOME </h1>
<?php echo $_SESSION["usuarios"]?><br>
<a href="session_destroy.php">Cerrar Sesion</a>
</body>
</html>