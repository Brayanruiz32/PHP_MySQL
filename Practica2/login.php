<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina en blanco</title>
</head>
<body>
<?php 
$autenticacion = false; 
    //Conexion a la base de datos 
if(isset($_POST["enviar"])){
    try {
        $base = new PDO("mysql: host=localhost; dbname=pruebas", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        $sql= "SELECT USUARIO,PASSWORD FROM usuarios WHERE USUARIO = :usu AND PASSWORD = :pass";
        $usuario = htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));
        $resultado = $base->prepare($sql);
        $resultado->bindValue(":usu", $usuario);
        $resultado->bindValue(":pass", $password);
        $resultado->execute();
        //Registrar si encontro al usuario
        $total_usu = $resultado->rowCount();
            if($total_usu!=0){
            //inicamos la sesion del usuario y creamos las cookies pertinentes 
            //ession_start(); 
            //$_SESSION["usuarios"] = $usuario; 
            $autenticacion = true; //La variable que sirve para verificar si el usuario esta registrado en la base de datos
            if(isset($_POST["remember"])){
           //setcookie("opcion",$_POST["remember"], time()+36000);
             setcookie("usuario", $usuario, time()+36000);
              //  setcookie("password", $password, time()+36000); 
              }
            //header("location: zona_user.php");
            }else{
                 echo "Usuario o constrase&ntilde;a incorrectos"; 
                 //   include("formulario_vacio.php"); 
            }
        } catch (Exception $e) {
        echo "Error: " . $e->getLine();   
    }
}

?>
<h1>Introduce tus datos</h1>
<?php 
//Mostramos el formulario
if($autenticacion==false){//entrara si el usuario entra por primera vez
    if(!isset($_COOKIE["usuario"])){//revisara si tiene cookies guardadas
        include("formulario_vacio.php"); //en el caso que no tenga cookies guardadas se incluira un formulario vacio 
    }else{
        echo "Bienvenido " . $_COOKIE["usuario"] . " a tu pagina preferida.";
        include("formulario_lleno.php"); 
    }
}else{
    //if(isset($_COOKIE["usuario"])){
     //   echo "Bienvenido " . $_COOKIE["usuario"] . " a tu pagina preferida.";
    //}else{
    echo "Bienvenido " . $_POST["usuario"] . " a tu pagina preferida.";
    //}
    include("formulario_lleno.php"); 
}


    
//verificamos si existen cookies guardadas
/*
if(isset($_COOKIE["usuario"])){
    include("formulario_lleno.php");
}else{
    include("formulario_vacio.php"); 
}
*/
?>
<!-- La instruccion $_server sirve para actualizar la pagina en el mismo fichero  -->
</body>
</html>