<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina de pruebas PHP</title>
</head>
<body>

	
	
	
<?php 
//Para que una variable tenga alcance dentro de una funcion, se debe declarar como variable global
//dentro de la misma funcion 
   // global $nombre;// = "Brayan"; 
    //global $valora; 
    $valora =5; 
    $nombre = "Brayan"; 
    function dame_nombre(){ 
     //   global $valora; 
      //  global $nombre; 
        $nombre = "Maria";
        $valora = 9; 
    }
    dame_nombre(); 
	echo $nombre; 
	echo  $valora; 
?>
	
	
	
</body>
</html>