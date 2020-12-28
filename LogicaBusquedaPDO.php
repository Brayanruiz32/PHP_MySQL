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
    $codigo = $_GET["codigo"]; 
    
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
    //$consulta = "SELECT * FROM hoja1 WHERE Cargo = '$palabra'";
    //Si queremos hacer una consulta con letras especificas 
    //Palabras comodin (%) y (_).
    $consulta = "SELECT * FROM hoja1 WHERE IdEmpleado=$codigo";
    //Ejecutamos la consulta haciendo uso de la funcion mysqli_query
    $resultados = mysqli_query($conexion, $consulta);
        //Arrays de filas 
        $fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC);
        echo "<form action='Actualizar_RegistroPDO.php' method='get'>"; 
        echo "<input type='number' name='c_art'  value='" . $fila['IdEmpleado'] . "'><br>"; 
        echo "<input type='text' name='seccion' value='" . $fila['Nombre'] . "'><br>"; 
        echo "<input type='text' name='n_art' value='" . $fila['Apellido'] . "'><br>"; 
        echo "<input type='text' name='precio' value='" . $fila['Sede'] . "'><br>"; 
        echo "<input type='text' name='fecha' value='" . $fila['Facultad'] . "'><br>"; 
        echo "<input type='text' name='importado' value='" . $fila['Cargo'] . "'><br>"; 
        echo "<input type='text' name='p_orig' value='" . $fila['Salario'] . "'><br>"; 
        echo "<input type='submit' value='Actualizar!'>"; 
        echo "</form>"; 

    //Cerrar la conexion con la base de datos
    mysqli_close($conexion);
?>
</body>
</html>
