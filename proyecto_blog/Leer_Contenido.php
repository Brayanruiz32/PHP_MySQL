<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h1>BLOG PERSONAL</h1>
<?php 
    //Realizamos la conexion a la Base de datos
    $conexion = mysqli_connect("localhost", "root", "");
    
    mysqli_select_db($conexion, "blog");
    
    mysqli_set_charset($conexion,"utf8");
    
    $sql = "SELECT * FROM contenido ORDER BY Fecha DESC";
    
    //comprobamos que la consulta se ejecuto 
    if($resultado = mysqli_query($conexion, $sql)){
        
        while($registro = mysqli_fetch_assoc($resultado)){
            
            echo "<h1>" .$registro["Titulo"] ."</h1><hr>"; 
            echo "<h2>" .$registro["Fecha"] ."</h2><br>"; 
            echo "<div>" .$registro["Comentario"] ."</div><br><br><br>";
            
            if($registro["Imagen"]!=""){
                echo "<img src='imagenes/". $registro["Imagen"]."' width='300px'><hr>"; 
            }else{
                echo "La imagen no se encuentra en la BBDD"; 
            }

        }

    }

?>
</body>
</html>