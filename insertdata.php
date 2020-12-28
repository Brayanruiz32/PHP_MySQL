<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<h1>Pagina de insercion</h1>
</head>
<body>
	<h1>Insercion de datos</h1>
	<?php 
	require('datosconexion.php');
	
	$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
	
	if(mysqli_connect_errno($conexion)){
	       echo 'Fallo en conectar con la BBDD'; 
	       exit(); 
	}
	
	mysqli_select_db($conexion, $db_nombre);
	
	mysqli_set_charset($conexion, 'utf8'); 
	
	$consulta = 'INSERT INTO hoja1(IdEmpleado, Apellido, Nombre) VALUES(1981, " Marreros", "Brayan");';  
	
	$resultados = mysqli_query($conexion, $consulta); 
		
	mysqli_close($conexion); 

	echo 'Insercion realizada'; 
	?>
</body>
</html>