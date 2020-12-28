<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pagina en Blanco</title>
</head>
<body>
	<!--En la parte del action se debe especificar el nombre del fichero en el que se encuentra la logica
	que se seguira al darle click al boton de submit
	En el metodo get, se utiliza porque se trata de obtener resultados, por ende se pasara por la url el dato
	a buscar en la base de datos-->
	<form action="LogicaBusquedaInyeccion.php" method="get">
		<label>Usuario<input type="text" name="usu"></label>
		<label>Contraseña<input type="text" name="contra"></label>
		<input type="submit" value="Login">
	</form>
</body>
</html> 
