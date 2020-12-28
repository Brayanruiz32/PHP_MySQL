<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<!--En la parte del action se debe especificar el nombre del fichero en el que se encuentra la logica
	que se seguira al darle click al boton de submit
	En el metodo get, se utiliza porque se trata de obtener resultados, por ende se pasara por la url el dato
	a buscar en la base de datos-->
	<form action="paginaBusquedaPDO.php" method="get">
		<label>Ingresar el nombre<input type="text" name="nom"></label>
		<label>Ingresar el apellido<input type="text" name="apell"></label>
		<input type="submit" value="Enviar">
	</form>
</body>
</html> 
