<!DOCTYPE HTML> 
<html>
<head>
	<meta charset="utf-8">
	<title>Conexion</title>
</head>
<body>
	<h1>Conexion con la BBDD</h1>
	<!-- <button type="submit" name="boton" id="boton" onClick="prueba">Cerrar conexion con la BBDD</button>-->
<?php 
    //Importamos los datos de la base de datos         
    require('datosconexion.php');

    //CONEXION MEDIANTE PROCEDIMIENTOS 
    $conexion = mysqli_connect($db_host, $db_usuario,$db_contra);
    
    //Funcion para detectar algun error de conexion con la base de datos. 
    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit(); 
    }
    //Funcion para seleccionar la base de datos. 
    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
    
    //Reparamos el simbolo para que aparezcan las tildes de las letras á-z
    mysqli_set_charset($conexion, "utf8");
 
    //Hagamos una consulta 
    $consulta = "SELECT * FROM datos";
    
    //Ejecutamos la consulta haciendo uso de la funcion mysqli_query 
    $resultados = mysqli_query($conexion, $consulta);
    
    //Indicar que lo guarde dentro de un array los resultados de la consulta 
   /* mysqli_data_seek($resultados, 3);  
    $extraido = mysqli_fetch_array($resultados);  
    //echo $extraido; 
    echo $extraido[0] . "<br>"; 
    echo $extraido[1] . "<br>"; 
    echo $extraido[2] . "<br>"; 
    */
    
    //Mostrar todos los registros de la tabla mediante una condicion while 
    /*while($fila=mysqli_fetch_row($resultados)){
        echo $fila[0] . " ";
        echo $fila[1] . " ";
        echo $fila[2] . " "; 
        echo "<br>";  
    }*/
    //Para un recorrido mas intuitivo entre las columnas usaremos los indices indexados los cuales hacen referencia a 
    //los campos de las tablas en las bases de datos, permitiendo asi hacer una muestra de registros mejor organizada. 
    while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
        echo $fila["ID"] . " "; 
        echo $fila["NOMBRE"] . " "; 
        echo $fila["APELLIDO"] . " "; 
        echo "<br>"; 
    }
    //Cerrar la conexion con la base de datos 
    mysqli_close($conexion); 
    
    
?>
</body>
</html>