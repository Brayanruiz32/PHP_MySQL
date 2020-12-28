<!DOCTYPE HTML>
<html>
<head>
	<meta charset=utf-8>
	<title>Buscador</title>
</head>
<body>
<?php 
    $busqueda_nom = $_GET['nom']; 
    $busqueda_apell = $_GET['apell']; 

try{//Sentencia que sirve para insertar los parametros requeridos de la base de datos
    
    $base = new PDO('mysql:host=localhost; dbname=empleados', 'root', '');
    //se pone los atributos de reporte de errores tales como deteccion de excepciones
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");//ejecutamos el metodo exec para setear la codificacion utf-8 
    ///PONEMOS LAS ETIQUETAS EN LAS SENTENCIAS SQL al empezar por dos puntos 
    $sql = 'SELECT * FROM usuario WHERE Nombre = :nom AND APELLIDO = :apell'; 
    //Prepara una sentencia para la base de datos destino por lo tanto es importante 
    $result = $base->prepare($sql); //almacenamos en una variable el resultado del prepare() 
    //Se ejecuta pasandole un valor mediante un array con la variable a buscar en la consulta SQL 
    $result->execute(array(":nom"=>$busqueda_nom, ":apell"=>$busqueda_apell)); 
    //Empieza a mostrar los datos si siguen existiendo 
    while($registro=$result->fetch(PDO::FETCH_ASSOC)){//Se pone el FETCH_ASSOC para hacer el recorrido con el nombre de los campos 
        
        echo $registro['Nombre'] . "<br>";
        echo $registro['Apellido'] . "<br>"; 
        echo $registro['Telefono'] . "<br>"; 
        echo $registro['Direccion'] . "<br>"; 
        echo $registro['Password'] . "<br>"; 
        
    }
    //Cerramos el bucle while del PDO statement, de lo contrario estaria consumiendo mas recursos de los que debe 
    $result->closeCursor();
    
    
    //Captura el erro
}catch(Exception $e){//linea de codigo que sirve para capturar la excepcion
    
    die('Error: ' . $e->getLine());
    
    //Con la sentencia finally se ejecutara ya sea si ingreso por try o catch
}finally{
    //ejecuta el codigo para basear la memoria
    $base = null;
    
}

?>
</body>
</html>