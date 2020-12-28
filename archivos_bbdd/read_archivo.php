<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 

    $id = ""; 
    $tipo_archivo =""; 
    $contenido = "";
    


    include('config.php'); //
    
    //conexion a la base de datos
    try {
        
        $base = new PDO("mysql:host=$host; dbname=$db_name",$db_user, $db_pass);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$base->exec("SET CHARACTER SET UTF8");
        
    } catch (Exception $e) {
        
        die("Error: " . $e->GetMessage());
        echo "Linea de error: " . $e->getLine();
        
    }

    
    $sql = 'SELECT * FROM archivos WHERE Id = 6';
    
    $consulta = $base->query($sql); 
    
    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
        
        $id = $fila["Id"]; 
        $tipo_archivo = $fila["Tipo"];
        $contenido = $fila["Contenido"]; //El contenido esta codificado dentro de la BBDD, por lo tanto para mostrarse debe descodificarse
        
    }

    echo $id . "<br>"; 
    echo $tipo_archivo . "<br>"; 
    //echo "<img src='data:". $tipo_archivo ."; base64," . base64_encode($contenido) . "'>"; 
    echo  "<img src='data:image/jpeg; base64," . base64_encode($contenido) . "' '/>";
?>


</body>
</html>