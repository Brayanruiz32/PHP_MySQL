<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Pagina de prueba de funciones matematicas </title>
</head>
<body>
	<h2>Funciones matematicas</h2>
	
<?php 
    //Funcion random simple 
    $num_random = rand(); 
    //Funcion random limitada por dos parametros 
    $num_rand_limit = rand(10, 50); 
    echo "Mi numero random es: " . $num_random . "<br>"; 
    echo "Mi numero de entre 10 y 50 es: " . $num_rand_limit; 
    
    
?>	
	
	
</body>
</html>