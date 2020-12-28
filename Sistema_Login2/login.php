<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina en Blanco</title>
</head>
<body>
<?php 
//Se verifica si hay algo dentro del isset 
if(isset($_POST["enviar"])){
    try {
        //Conexion a la base de datos mediante PDO (consultas preparadas)
        $base =  new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
        
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $base->exec("SET CHARACTER SET utf8");
        
        $sql = "SELECT USUARIO FROM usuarios WHERE USUARIO = :usu AND PASSWORD = :pass";;
        
        $consulta = $base->prepare($sql);
        
        //Preparamos las consulta
        $usuario =  htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));
        
        //asociamos los marcadores con sus valores
        $consulta->bindValue(":usu",$usuario);
        $consulta->bindValue(":pass",$password);
       // $consulta->closeCursor();
        $consulta->execute();
        
        $numero_result= $consulta->rowCount(); 
        
        if($numero_result!=0){
            //iniciamos la sesion en el servidor mediante la variable superglobal $_SESSION
            session_start(); 
            
            $_SESSION["usuario"] = $_POST["usuario"]; 
            
            //header(); 
            
        }else{
            echo 'Usuario o contrasena incorrectos'; 
        }
        
        
        
    } catch (Exception $e) {
        echo "Error:" . $e->getLine() . $e->getMessage();
    }
}    

?>
<?php 
if(!isset($_SESSION["usuario"])){
    include('formulario.php'); 
}else{
    echo 'Bienvenido ' . $_SESSION["usuario"]; 
}
?>

<hr>
<div>
	<h1>PARRAFO DE PRUEBA</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque dignissim metus, id malesuada eros mattis vitae. In metus felis, volutpat venenatis sem vitae, finibus venenatis orci. Nunc sed fringilla ante, eu tincidunt tortor. Mauris gravida imperdiet quam, vel lobortis massa. Sed vitae bibendum nunc. Duis sit amet odio pharetra, efficitur urna non, aliquam diam. Mauris dignissim ultrices lorem, ut facilisis urna dignissim vitae. Pellentesque ut nisl turpis. 
	Fusce a blandit ipsum. Etiam pretium eros a dapibus pretium. Proin sit amet arcu vel lectus cursus volutpat at eget leo. </p>
</div>
<p><a href="cerrar.php">Cerrar Sesion</a></p>
</body>
</html>