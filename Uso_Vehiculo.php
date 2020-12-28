<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Automoviles</title>
</head>
<body>
	<h1>Pagina de Instanciacion de objetos</h1>
<?php 
    //Debo utilizar el include junto con los parentesis para no tener problemas de codigo. 
    include('Vehiculo.php');
    Vehiculo::$precio = 5000; 
    $newcar = new Vehiculo(); 
    $newcar::poner_descuento(); 
    $newcar->climatizador(); 
    $newcar->get_precio(); 
    
    
    /*
    $mi_carrito = new Vehiculo(); 
    $mi_camion = new Camion(); 
    $mi_carrito->dame_ruedas();
    echo '<br>'; 
    $mi_carrito->establece_color('Rojo'); 
    echo '<hr>'; 
    $mi_camion->dame_ruedas(); 
    echo '<br>'; 
    $mi_camion->dame_marca(); 
    echo '<br>'; 
    $mi_camion->establece_color('Amarillo con negro'); 
    echo '<br>'; 
    $mi_camion->girar();
    */
?>
</body>
</html>