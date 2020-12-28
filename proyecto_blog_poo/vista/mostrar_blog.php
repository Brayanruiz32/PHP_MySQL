<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>


<?php 
    echo "<a href='../index.php'>Ingresar otro titulo</a>";     


    while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
    
        echo "<h1>" . $registro["Titulo"] ."</h1><br><hr>";
    
        echo "<h2>" . $registro["Fecha"] . "</h2><br>";
    
        echo "<div>" . $registro["Comentario"] . "</div><br><br>";
    
        echo "<img src='../imagenes/" . $registro["Imagen"]. "' style='width:300px'>";
    
    }
?>

</body>
</html><