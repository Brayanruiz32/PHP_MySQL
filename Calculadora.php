<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>Pagina de pruebas PHP</title>
</head>
<body>
	<h1>Formulario de prueba</h1>
	<form method="post" action="">
		<label for="numero1">Numero A</label> <input type="number"
			placeholder="Introduce A" name="numero1" id="numero1"> <label
			for="numero2">Numero B</label> <input type="number"
			placeholder="Introduce B" name="numero2" id="numero2">
		<p>
			<select name="operacion" id="operacion">
				<option>Suma</option>
				<option>Resta</option>
				<option>Multiplicacion</option>
				<option>Division</option>
			</select>
		</p>
		<button type="submit" name="boton" id="boton" onClick="prueba">Calcular</button>
	</form>
	<!-- Aqui empieza el codigo PHP necesario para hacer correr la calculadora -->	
<?php
include("LogicaCalc.php"); 
if (isset($_POST["boton"])) {
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];
    $operacion = $_POST["operacion"];
    //Se le pasa la operacion para que tenga con que chambear la funcion.
    //Invocamos a la funcion para poder trabajar con esta. 
    calcular($operacion, $numero1, $numero2);
}
?>

	

</body>
</html>