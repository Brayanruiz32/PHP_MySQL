<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina de funciones predefinidas y propias</title>
</head>
<body>
	<h1>Comienzo de pagina</h1>
	<?php 
	function convert_mayus($string, $boolean = true){
	    $frase = strtolower($string); 
	    if($boolean){
	        $resultado = ucwords($frase); 
	    }else{
	        $resultado = strtoupper($frase); 
	    }
	    return $resultado; 
	}
	echo "El resultado final es " . convert_mayus("hola buenas", false); 
	?>
</body>
</html>