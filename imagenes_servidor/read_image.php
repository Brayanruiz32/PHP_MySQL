<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
    include('config.php'); //
    
    //conexion a la base de datos
    try {
        
        $base = new PDO("mysql:host=$host; dbname=$db_name",$db_user, $db_pass);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET UTF8");
        
    } catch (Exception $e) {
        
        die("Error: " . $e->GetMessage());
        echo "Linea de error: " . $e->getLine();
        
    }

    $sql = 'SELECT Foto FROM datos_usuarios WHERE Id = 8';
    
    $consulta = $base->query($sql); 
    
    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
        
        $ruta_img = $fila["Foto"]; 
        
    }

?>

<div>
	<img alt="Primera imagen" src="/uploads/<?php echo $ruta_img;?>" style="width: 25%">
</div>


</body>
</html>