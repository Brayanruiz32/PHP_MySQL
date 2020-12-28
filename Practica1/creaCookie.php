<!DOCTYPE HTML>
<html>
<head>
	<meta charset="uft-8">
</head>
<body>
<?php 
   //Creamos la cookie con la funcion setcookie y pasandole mediante la funcion get el valor del parametro
    setcookie("preferencia", $_GET["text"], time()+34600); 
    
    header('location: comprueba_cookie.php'); 

?>
</body>
</html>