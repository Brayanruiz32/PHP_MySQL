<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<style>
	.box1, .box2{
	background-color: yellow; 
	border: 1px solid black;
	width: 70px; 
	height: 70px; 
	float: left; 
	line-height: 70px;
	padding-left: 15px;
	}
	</style>
</head>
<body>
<?php 
    if(isset($_COOKIE["preferencia"])){
        if($_COOKIE["preferencia"]=="one"){
         header("location: texto1.php"); 
        }else if($_COOKIE["preferencia"]=="two"){
          header("location: texto2.php"); 
        }
    }
?>

<h1>Pagina de inicio</h1>
<div class="box1">
<!-- Pasamos a travez de url los datos  -->
<a href="creaCookie.php?text=one">Cajita 1</a>
</div>
<div class="box2">
<a href="creaCookie.php?text=two">Boxy 2</a>
</div>
</body>
</html>