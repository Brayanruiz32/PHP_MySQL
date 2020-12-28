<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
if(isset($_COOKIE["prueba"])){
    
    echo $_COOKIE["prueba"]; 
    
}else{
    echo "No se encontro la cookie"; 
}
?>
</body>
</html>