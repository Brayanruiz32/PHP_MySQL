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
    /*
	$usuario = $_GET["usu"];
	$password = $_GET["contra"]; 
    */
    //Importamos los datos de la base de datos
    require('datosconexion.php');
    //CONEXION MEDIANTE PROCEDIMIENTOS
    $conexion = mysqli_connect($db_host, $db_usuario,$db_contra);
    
    $usuario = mysqli_real_escape_string($conexion, $_GET["usu"]); 
    $password = mysqli_real_escape_string($conexion,  $_GET["contra"]); 
    
    //Funcion para detectar algun error de conexion con la base de datos.
    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit();
    }
    
    //Funcion para seleccionar la base de datos.
    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
    
    //Reparamos el simbolo para que aparezcan las tildes de las letras á-z
    //Es necesario el uso del mysqli_set_charset para que el real scape string actue 
    mysqli_set_charset($conexion, "utf8");
    
    //Hagamos una consulta
    //$consulta = "SELECT * FROM hoja1 WHERE Cargo = '$palabra'";
    //Si queremos hacer una consulta con letras especificas 
    //Palabras comodin (%) y (_).
    //$consulta = "SELECT * FROM hoja1 WHERE Apellido LIKE '%$palabra%'";
    $consulta = "SELECT * FROM usuarios WHERE Nombre = '$usuario' AND Password = '$password'";
    
    echo $consulta . "<br><br>"; 
    //Ejecutamos la consulta haciendo uso de la funcion mysqli_query
    $resultados = mysqli_query($conexion, $consulta);
    
    if(mysqli_affected_rows($conexion)==0){
        echo 'No se encontro el usuario'; 
    }else{
    /*//while(*/$fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC);//){
      //  $cantidad++; 
        echo $fila["Nombre"] . " ";
        echo $fila["Apellido"] . " ";
        echo $fila["Telefono"] . " ";
        echo $fila["Direccion"] . " ";
        echo $fila["Password"] . " ";
        echo "<br>";
    }
    //echo $cantidad; 
    
    //Cerrar la conexion con la base de datos
    mysqli_close($conexion);
?>
</body>
</html>