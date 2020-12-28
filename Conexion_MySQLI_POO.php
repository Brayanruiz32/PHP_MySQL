<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Caleta nomas</title>
</head>
<body>
<?php 
//Se instancia una clase mysqli con parametros dle host con el nombre de usuario,
    $conexion = new mysqli("localhost", "root", "", "empleados");

    if($conexion->connect_errno){
        echo 'Fallo la conexion ' . $conexion->connect_errno; 
    }
    
    $conexion->set_charset("utf-8");
    
    $sql = 'SELECT * FROM usuarios';
    
//$resultados = mysqli_query($conexion, $sql); 
  
    $resultados = $conexion->query($sql);
    
    if($conexion->errno){
        die($conexion->error);
    }
    
    while($fila = $resultados->fetch_assoc()){
        
        echo $fila["Nombre"] . "<br>"; 
        
    }
    
    $conexion->close(); 
    
?>
</body>
</html>