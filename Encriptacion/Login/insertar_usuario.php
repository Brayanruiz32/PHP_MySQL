<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
    try{
        $contador = 0; //contador
        $usuario = htmlentities(addslashes($_POST["usuario"]));//guardado del usuario mediante htmlentities
        $password = htmlentities(addslashes($_POST["password"]));//guardado de la contraseña mediante html entities
        $base = new PDO("mysql: host=localhost; dbname=pruebas", "root", "");//conexion a la base de datos
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//atributos para capturar errores
        $base->exec("SET CHARACTER SET utf8");//poner la codificaicon a utf-8
        $sql= "SELECT * FROM usuarios WHERE USUARIO = :usu";//la consulta 
        $resultado = $base->prepare($sql);//se crea la PDO statement
        $resultado->execute(array(":usu"=>$usuario));//se ejecuta la consulta
        while($array = $resultado->fetch(PDO::FETCH_ASSOC)){//se almacena mendiante una variable los resultados de la consulta
            //comprobamos mediante la sentencia password verify si el password coincide con la password encriiptada de la BBDD
            if(password_verify($password, $array["PASSWORD"])){
                $contador++; 
            }
        }
        if($contador > 0){
            echo "Bienvenido a la pagina " . $_POST["usuario"]; //se recoge mediante el metodo post el usuario
        }else{
            header("location: formulario.php"); //se redirecciona mediante el header al formulario en caso no se verifique la contraseña
        }
    $resultado->closeCursor(); //cerramos la base de datos para el ahorro de recursos 
} catch (Exception $e) {
    echo "Error en la linea: " . $e->getLine() . "<br>";   
    echo "Error: " . $e->GetMessage(); 
}finally{
    $base = null; 
}
?>
</body>
</html>