<!-- Fichero que sirve para dar los resultados de la consulta realizada a la base de datos. -->
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina de busqueda</title>
</head>
<body>
	<?php
    //Recibir el dato del formulario 
    $nom = $_GET["c_art"]; 
    $apell = $_GET["seccion"]; 
    $telf = $_GET["precio"]; 
    $direc = $_GET["fecha"]; 
    $contra = $_GET["importado"]; 
    
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
    
    //Se pone las interrogantes debido a que sera una consulta preparada para evitar inyecciones
    $sql = "INSERT INTO usuarios( Nombre, Apellido, Telefono, Direccion, Password) VALUES(?,?,?,?,?)";
    
    $resultado = mysqli_prepare($conexion, $sql); 
    //Ejecutamos la funcion asociando los parametros, utilizamos la 's' para seleccionar el tipo de dato que 
    //es String, y le pasamos la variable con criterio
    $ok = mysqli_stmt_bind_param($resultado,"sssss", $nom, $apell, $telf, $direc, $contra); 
    //Sobreescribimos la variable ok, con al funcion que ejecutara el codigo pasandole como parametro el objeto resultado
    //del mysqli_prepare(),  
    $ok = mysqli_stmt_execute($resultado);
    //Guardamos los datos de la consulta haciendo uso de una funcion 
    mysqli_stmt_store_result($resultado); 
    $filas = mysqli_stmt_num_rows($resultado);
    //Verificamos si se completo de manera exitosa la ejecucion 

    //$ok = mysqli_stmt_bind_result($resultado, $nom, $apell, $telf, $direc, $contra); 
        
      //  while(mysqli_stmt_fetch($resultado)){
            
            echo $nom . " " . $apell . " " . $telf . " " . $direc . " " . $contra; 
       
        mysqli_stmt_close($resultado); 

      //  }
        //Ejecutamos la funcion y debemos verificar si se ejecuto correctamente
       
        
       // echo $filas . " terminaron afectadas<br>" ;
    //Funcion de cierre para la conexion de base de datos
    mysqli_close($conexion);
    
?>
</body>
</html>
