<?php 

    //Para acceder a la propiedades del documento se debe acceder a ellas como si fuera un array bidimensional    
    $nombre_archivo = $_FILES["archivo"]["name"];//acceso al nombre del archivo
    $size_archivo = $_FILES["archivo"]["size"];//acceso al tamaño del archivo
    $tipo_archivo = $_FILES["archivo"]["type"];//acceso al tipo del archivo

    
    if($size_archivo<=3000000){//capacidad de solo permitir tipos de datos de hasta 3mb
        
        //if($tipo=='image/jpg' || $tipo=='image/jpeg' || $tipo=='image/png' || $tipo=='image/gif'){//solo permite tipos de archivos jpg,jpeg, png, gif
            //ruta de la carpeta destino en el servidor
            $ubicacion_destino = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
            //propiedade
            move_uploaded_file($_FILES["archivo"]["tmp_name"], $ubicacion_destino.$nombre_archivo); //trasladar el archivo al servidor
        //}else{
            
          //  echo "Solo soporta imagenes jpg/jpeg/png/gif";//muestra de mensaje jpg, jpeg, png, gif 
        //}

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
    //ejecucion de las funciones de fopen y fread, a la vez como de fclose 
    //Estas se usan en los campos BLOB, estas se almacenan en la BBDD
    $archivo_objetivo = fopen($ubicacion_destino.$nombre_archivo, 'r');//seteamos que solo sea de lectura 'r' y este es el archivo objetivo
    
    $contenido_bytes_archivo = fread($archivo_objetivo, $size_archivo);//conversion a bytes del archivo
    
    fclose($archivo_objetivo); //cerramos el archivo objetivo ya guardado
    
    
    $contenido = addslashes($contenido_bytes_archivo); //escapamos los caracteres que PHP no logre reconocer como '/'
    
    $sql = "INSERT INTO archivos(Nombre, Tipo, Contenido) VALUES('$nombre_archivo', '$tipo_archivo', '$contenido')"; 
    
    $consulta = $base->prepare($sql); 
    
    $consulta->execute(); 
    
    echo 'Se inserto el archivo en la BBDD'; 
    
  

?>