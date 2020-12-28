	<!DOCTYPE HTML> 
	<html lang="es">
	<head>
	<meta charset="utf-8">
	<title>Documento sin titulo</title>
	</head>
	<body>
	<?php 
	$id = $_GET["c_art"];
	/*$nom = $_GET["seccion"]; 
	$apell = $_GET["n_art"]; 
	$sede = $_GET["precio"]; 
	$facultad = $_GET["fecha"]; 
	$cargo = $_GET["importado"]; 
	$salario = $_GET["p_orig"]; 
	*/
	require('datosconexion.php');
	
	$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
	
	if(mysqli_connect_errno($conexion)){
	       echo 'Fallo en conectar con la BBDD'; 
	       exit(); 
	}
	
	mysqli_select_db($conexion, $db_nombre);
	
	mysqli_set_charset($conexion, 'utf8'); 
	
	$consulta = "DELETE FROM hoja1 WHERE IdEmpleado = $id;";  
	
	$resultados = mysqli_query($conexion, $consulta); 
	
	if($resultados==false){
	    echo 'Error en la eliminacion del registro'; 
	}else{
	    if(mysqli_affected_rows($conexion)==1){
	        echo 'Eliminacion de registro exitosa'; 
	    }else{
	        echo 'No se elimino ningun registro'; 
	    }
	    
	}
	
	mysqli_close($conexion); 
	
	?>
	
	
	</body>
	</html>
	