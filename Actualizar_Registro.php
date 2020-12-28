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
	
	$consulta = "UPDATE hoja1 SET Cargo='$cargo' WHERE Cargo='Profue';";  
	
	$resultados = mysqli_query($conexion, $consulta); 
	
	echo "Filas afectadas " . mysqli_affected_rows($conexion); 
	
	/*if($resultados==false){
	    echo 'Error en la actualizacion del registro'; 
	}else{
	    if(mysqli_affected_rows($conexion)==0){
	        echo 'No se actualizo ningun registro'; 
	    }else{
	        echo 'Actualizacion de registros exitosa'; 
	    }
	}
	*/
	mysqli_close($conexion); 
	?>
	
	
	</body>
	</html>
	