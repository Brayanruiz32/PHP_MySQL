	<!DOCTYPE HTML> 
	<html lang="es">
	<head>
	<meta charset="utf-8">
	<title>Documento sin titulo</title>
	</head>
	<body>
	<?php 
	$id = $_GET["c_art"];
	$nom = $_GET["seccion"]; 
	$apell = $_GET["n_art"]; 
	$sede = $_GET["precio"]; 
	$facultad = $_GET["fecha"]; 
	$cargo = $_GET["importado"]; 
	$salario = $_GET["p_orig"]; 
	
	require('datosconexion.php');
	
	$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
	
	if(mysqli_connect_errno($conexion)){
	       echo 'Fallo en conectar con la BBDD'; 
	       exit(); 
	}
	
	mysqli_select_db($conexion, $db_nombre);
	
	mysqli_set_charset($conexion, 'utf8'); 
	
	$consulta = "INSERT INTO hoja1(IdEmpleado, Nombre, Apellido, Sede, Facultad, Cargo, Salario) 
    VALUES($id, '$nom', '$apell', '$sede', '$facultad', '$cargo', '$salario');";  
	
	$resultados = mysqli_query($conexion, $consulta); 
	if($resultados==false){
	    echo 'Error en la insercion'; 
	}else{
	    echo 'Insercion realizada'; 
	}
	
	mysqli_close($conexion); 

	echo mysqli_fetch_array($resultados);
	echo IdEmpleado, Nombre, Apellido, Sede, Facultad, Cargo, Salario;
	
	?>
	
	
	</body>
	</html>
	