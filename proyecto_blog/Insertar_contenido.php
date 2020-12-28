<?php 

    //Conexion a la base de datos mediante estilo procedimental
    $miconexion = mysqli_connect('localhost', 'root', '');//especificamos los requerimientos para la base de datos
    
    mysqli_select_db($miconexion, 'blog');//seleccionamos la base de datos
    
    mysqli_set_charset($miconexion, "utf8");//seteamos el charset para la codificacion de las letras
    
    /*Comprobar conexion*/
    
    if(!$miconexion){
        echo "Hubo un error: " . mysqli_error(); 
        exit();//codigo para salir del codigo 
    }
    
    if($_FILES["imagen"]["error"]){
        
        switch ($_FILES["imagen"]["error"]) {
            case 1: //Error del tamaño permitido por el servidor
                echo "El tamaño del archivo excede el permitido por el servidor"; 
                break; 
            case 2: //El fichero excede el MAX_FILE_SIZE en el HTML
                echo "El fichero excede el MAX_FILE_SIZE en el HTML";  
                break;
            case 3: //El fichero solo se subio una parte, debido a que fue interrumpido o por un error externo 
                echo "El fichero fue parcialmente subido"; 
                break; 
            case 4: //No se subio nada al servidor
                echo "No se subio ningun fichero"; 
                break; 
        }
    
    }else{
        
        echo "El archivo se subio correctamente <br>"; 
        
        if(isset($_FILES["imagen"]["name"]) && ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK)){
            
            $destino_imagen = "imagenes/"; //el destino dentro del proyecto
            
            //La funcion recibe por parametro el lugar en donde esta guardado la imagen y el archivo a donde se enviara el archivo
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino_imagen.$_FILES["imagen"]["name"]); 
            
            echo $_FILES["imagen"]["name"]. " se ha copiado en el directorio de imagenes<br>"; 
            
        }
        
    }

    $titulo = $_POST["titulo"]; 
    $fecha = date("Y-m-d H:i:s"); 
    $comentario = $_POST["comentario"];
    $imagen = $_FILES["imagen"]["name"]; 
    //se guarda el nombre de la imagen en la BBDD
    $miconsulta = "INSERT INTO contenido(Titulo, Fecha, Comentario, Imagen) VALUES('$titulo', '$fecha', '$comentario', '$imagen')";
    
    $resultado = mysqli_query($miconexion, $miconsulta);
    
    //Cerramos la consulta
    mysqli_close($miconexion);
    
    echo "Se insertaron correctamente los datos<br>"; 
    echo "<a href='Leer_Contenido.php'>Ir al Blog</a><br>";
    echo "<a href='formulario.php'>Formulario</a>"; 


?>