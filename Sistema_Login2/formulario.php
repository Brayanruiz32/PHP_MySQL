<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
	form{
	border: 1px solid black; 
	width: 250px; 
	height: 200px;
	line-height: 40px;
	margin: 0px auto; 
	padding-left: 20px;
	}
	</style>
</head>
<body>
<h1>Introduce tus datos</h1>
<!-- La instruccion $_server sirve para actualizar la pagina en el mismo fichero  -->
<form action="<?php echo $_SERVER["PHP_SELF"]; ?> " method="post">
<label for="usuario">Usuario:<input type="text" name="usuario"></label>
<label for="password">Contrase&ntilde;a:<input type="password" name="password"></label>
<label for="remember">Recordar usuario:<input type="checkbox" name="remember"></label>
<input type="submit" value="Enviar!" name="enviar">
</form>
</body>
</html>