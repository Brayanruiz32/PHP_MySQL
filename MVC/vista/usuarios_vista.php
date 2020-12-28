<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>


<?php 
    
//continuamos el codigo del controlador debido a que esta es la vista, se debe trabajar en la interfaz del usuario final
    foreach($matrizdeusuarios as $usuario){
    
        echo $usuario["Id"] ." " ; 
        echo $usuario["Nombre"] . " " ; 
        echo $usuario["Apellido"] . " " ; 
        echo $usuario["Direccion"] . "<br>" ; 
        
}

?>
</body>
</html>