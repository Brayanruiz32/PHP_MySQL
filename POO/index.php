<?php 
    //necesitamos hacer un require pasandole como parametro el nombre del fichero 
    require('Devuelve_Productos.php');
    
    $nombre = $_GET["nombre"]; 
    //Se necesita importar el fichero padre para la herencia
    $productos = new Devuelve_Productos();  
    //metodo getter utilizado para pbtener los productos (especificos o generales)
    $array = $productos->getproductos($nombre); 
    
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php 
//Mostramos los datos por pantalla
foreach($array as $elemento){
    echo $elemento["Nombre"] . " "; 
    echo $elemento["Apellido"] . " "; 
    echo $elemento["Telefono"] . " "; 
    echo $elemento["Direccion"] . " "; 
    echo $elemento["Password"] . "<br>"; 
}

?>
</body>
</html>