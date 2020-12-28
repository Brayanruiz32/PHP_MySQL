<!DOCTYPE HTML> 
<html lang="es">
<head>
<meta charset="utf-8">
<title>Documento sin titulo</title>
</head>
<body>
    <?php 
    //$id = $_GET["c_art"];
    $nom = $_GET["nombre"]; 
    $apell = $_GET["apellido"]; 
    $telf = $_GET["telf"]; 
    $direc = $_GET["direc"]; 
    $password = $_GET["pswrd"]; 
   // $salario = $_GET["p_orig"]; 
    //importamos los datos necesarios de la base de datos 
    try {
        //Instanciamos la base PDO pasando por los parametros los datos de la base de datos
        $base = new PDO('mysql:host=localhost; dbname=empleados', 'root', '');
        //Crear el capturador de errores 
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $base->exec("SET CHARACTER SET utf8"); 
        //Creamos la sentencia SQL a ejecutar

        $sql = "INSERT INTO usuarios(Nombre, Apellido, Telefono, Direccion, Password) 
                VALUES(:nom, :apell, :telf, :direc, :password)"; 
        //seteamos el charset utf-8

        //creamos el objeto PDO_Statement
        $resultado = $base->prepare($sql);
        //ejecutamos el array asociativo mediante marcadores 
        $resultado->execute(array(":nom"=>$nom,":apell"=>$apell,":telf"=>$telf,":direc"=>$direc,":password"=>$password)); 
        
        if($resultado){
            echo 'Se inserto los datos correctamente'; 
        }
        
        echo "<form method='get' action='Logica_EliminarPDO.php'>"; 
        echo "Nombre: <input type='input' name='nom_clean'/><br>";
        echo "<input type='submit' value='Eliminar'/><br>";
        echo "</form>"; 
        
    }catch(Exception $e){
        echo "Error: " . $e->GetMessage() ." " . $e->getLine(); 
    }finally{
        $base = null; 
    }
    
    
    
    
    
  
    ?>
	
</body>
</html>
	