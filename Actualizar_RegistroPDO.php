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
	//importamos los datos necesarios de la base de datos 
	require('datosconexion.php');
	
	$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno($conexion)){
	       echo 'Fallo en conectar con la BBDD'; 
	       exit(); 
	}
	//seleccionamos la base de datos pasandole dos parametros 
	mysqli_select_db($conexion, $db_nombre);
	//ponemos el formato para tildes 
	mysqli_set_charset($conexion, 'utf8'); 
	//escribir la consulta dentro de una variable 
	$consulta="UPDATE hoja1 SET IdEmpleado=$id, Nombre='$nom', Apellido='$apell', Sede='$sede', Facultad='$facultad', Cargo='$cargo', Salario='$salario'  WHERE IdEmpleado=$id;";  
	//con la funcion mysqli_query se ejecuta la consulta 
	$resultados = mysqli_query($conexion, $consulta); 
	//mostrar las filas afectadas a travez de la funcion mysqlo_affected_rows 
	echo "Filas afectadas " . mysqli_affected_rows($conexion) . "<br>"; 
	
	//$fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC); 
	if($resultados==false){
	    echo 'Error en la actualizacion del registro <br>';
	}else{
	    echo 'Se actualizo el registro <br>';
	}
	echo $id . "<br>";
	echo $nom . "<br>"; 
	echo $apell . "<br>"; 
	echo $sede . "<br>";
	echo $facultad . "<br>"; 
	echo $cargo . "<br>"; 
	echo $salario . "<br>"; 
	
	mysqli_close($conexion); //cerramos la conexion con la base de datos
	?>
	
	</body>
	</html>
	