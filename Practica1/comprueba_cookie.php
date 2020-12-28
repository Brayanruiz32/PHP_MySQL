<!DOCTYPE HTML>
<html>
<head>
	<meta charset="uft-8">
</head>
<body>
<?php 
   //Comprobamos que contiene la cookie
    if(!$_COOKIE['preferencia']){
        header('location: index.php'); 
    }else if($_COOKIE["preferencia"] == 'one'){
        header('location: texto1.php'); 
    }else if($_COOKIE["preferencia"] == 'two'){
        header('location: texto2.php'); 
    }

?>
</body>
</html>