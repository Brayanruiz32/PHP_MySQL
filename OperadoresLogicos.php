<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina de Comparacion</title>
</head>
<body>
	<h1>Pagina de comparacion</h1>
	
<?php 
    //Los operadores logicos se diferencian entre si por su precedencia de los unos a los otros 
    //
    $element1 = true; 
    $element2 = false; 
    $resultado = $element1 and $element2; 
    if($resultado){
        echo "Esto es verdadero";
    }else{
        echo "Esto es falso"; 
    }

	
	
?>
</body>
</html>