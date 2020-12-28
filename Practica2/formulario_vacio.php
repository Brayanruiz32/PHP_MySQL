<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina en blanco</title>
</head>
<body>
<!-- La instruccion $_server sirve para actualizar la pagina en el mismo fichero  -->
<form action="<?php echo $_SERVER["PHP_SELF"]; ?> " method="post">
<label for="usuario">Usuario:<input type="text" name="usuario"></label>
<label for="password">Contrase&ntilde;a:<input type="password" name="password"></label>
<label for="remember">Recordar usuario:<input type="radio" name="remember"></label>
<input type="submit" value="Enviar!" name="enviar">
</form>
</body>
</html>