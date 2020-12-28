<?php 
include('comprueba_login.php');
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$usuario1 = new comprueba_login();
$total = $usuario1->comprobar($usuario, $password);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
//se verifica si se hallo un resultado 

if($total == 1){
    //iniciamos la sesion del usuario para que le asigne un id unico al usuario
    session_start(); 
    //le pasamos mediante el metodo que hayamos utilizado el nombre del usuario
    $_SESSION["usuarios"] = $usuario; 
    
    header('location:login_usuarios_registrados.php'); 
    
}else{
    
    header('location:login.php'); 
    
}

?>
</body>
</html>