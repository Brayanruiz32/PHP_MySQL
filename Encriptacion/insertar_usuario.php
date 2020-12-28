<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
    $usuario = $_POST["usuario"];
    $password = $_POST["password"]; 
    $hash = password_hash($password, PASSWORD_DEFAULT/*, array("cost"=>12)*/); //la parte comentada es el coste de la encriptacion de la contraseña 
try {
    $base = new PDO("mysql:host=localhost; dbname=pruebas", "root", ""); 
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8"); 
    $sql = "INSERT INTO usuarios(USUARIO, PASSWORD) VALUES(:usu, :pass)"; 
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":usu"=>$usuario, ":pass"=>$hash)); 
    if($resultado){
        echo "Se inserto el usuario correctamente"; 
    }
    $resultado->closeCursor(); 
} catch (Exception $e) {
    echo "Error en la linea: " . $e->getLine() . "<br>";   
    echo "Error: " . $e->GetMessage(); 
}finally{
    $base = null; 
}
?>
</body>
</html>