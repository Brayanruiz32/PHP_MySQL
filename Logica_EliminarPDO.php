<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina</title>
</head>
<body>
<?php 
    $nom = $_GET['nom_clean'];
    
    try {
        //instanciamos el objeto de la clase PDO
        $base = new PDO("mysql:host=localhost; dbname=empleados", "root", ""); 
        //Crear el capturador de errores
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        //seteamos el meta charset 
        $base->exec("SET CHARACTER SET utf8"); 
        //preparamos la sentencia SQL
        $sql = "DELETE FROM usuarios WHERE Nombre = :nom";
        //preparamos el objeto PDO_Statement 
        $resultado = $base->prepare($sql);
        //ejecutamos la sentencia sql 
        $resultado->execute(array(":nom"=>$nom));
        if($resultado){
            echo 'Se elimino correctamente el usuario'; 
        }else{
            echo 'Ocurrio un problema';
        }
        $resultado->closeCursor(); 
    } catch (Exception $e) {
       
        echo "Error: " . $e->getLine() . " " . $e->GetMessage(); 
    
    }finally{
    
        $base = null;
        
    }


?>
</body>
</html>