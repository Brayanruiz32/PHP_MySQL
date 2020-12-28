<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Pagina en blanco</title>
</head>
<body>
<!-- :D -->
<?php  
//Variables 
require 'Habilitame_datos.php';
echo firstfunction(); 
$nombre = "Brayan"; 
function dame_nombre(){
    //Para poder transformar una variable de afuera para que se pueda trabajar dentro de la funcion es convertirla 
    //a variable global 
    global $nombre; 
    $nombre = "Maria"; 
    return $nombre; 
}


echo "El nombre es: " . dame_nombre() . "<br>"; 
echo "El nombre de usuario es $nombre <br>";
?>

</body>
</html>