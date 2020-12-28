<!DOCTYPE HTML>
<html>
<head>
	<meta charset=utf-8>
</head>
<body>
<?php 
    //se introduce por parametro el la direccion de la base de datos
    //el nombre de la base de datos 
    //el nombre de usuario 
    //la constraseña 
    //La sentencia try intenta ejecutar correctamente el codigo en caso contrario se traslada al catch 
    try{//Sentencia que sirve para insertar los parametros requeridos de la base de datos 
        
        $base = new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
        
        echo 'Conexion OK'; 
    //Captura el erro 
    }catch(Exception $e){//linea de codigo que sirve para capturar la excepcion 
        
        die('Error: ' . $e->GetMessage()); 
        
    //Con la sentencia finally se ejecutara ya sea si ingreso por try o catch 
    }finally{
        //ejecuta el codigo para basear la memoria 
        $base = null; 
    
    }
        
    
    
    
?>
</body>
</html>