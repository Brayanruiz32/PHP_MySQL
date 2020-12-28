<?php 

    //Para acceder a la propiedades del documento se debe acceder a ellas como si fuera un array bidimensional    
    $nombre = $_FILES["imagen"]["name"];//acceso al nombre del archivo
    $size = $_FILES["imagen"]["size"];//acceso al tamaño del archivo
    $tipo = $_FILES["imagen"]["type"];//acceso al tipo del archivo

    
    if($size<=3000000){//capacidad de solo permitir tipos de datos de hasta 3mb
        
        if($tipo=='image/jpg' || $tipo=='image/jpeg' || $tipo=='image/png' || $tipo=='image/gif'){//solo permite tipos de archivos jpg,jpeg, png, gif
            //ruta de la carpeta destino en el servidor
            $ubicacion_destino = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
            //propiedade
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $ubicacion_destino.$nombre); //trasladar el archivo al servidor
        }else{
            
            echo "Solo soporta imagenes jpg/jpeg/png/gif";//muestra de mensaje jpg, jpeg, png, gif 
        }

    }else{
        
        echo "El tamaño maximo es de 3MB"; 
    }
    
    //--------------------------------------INSERCION DE LA RUTA EN LA BBDD------------------------------------------
    //importacion de datos de la base de datos
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
 
    $sql = "UPDATE datos_usuarios SET Foto ='$nombre' WHERE Id = 8"; 
    
    $consulta = $base->prepare($sql); 
    
    $consulta->execute(); 
    
    echo "Se inserto la imagen";  

?>