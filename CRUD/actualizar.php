<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<h1>Editar informacion</h1>
<?php 
include("Conexion.php");

    if(!isset($_POST["insertar"])){
        //Recibimos a travez de la URL los valores
        $id =$_GET["Id"];
        $nom = $_GET["Nom"];
        $apell = $_GET["Apell"];
        $direc = $_GET["Direc"]; 
    }else{
        //Recibimos mediante el nombre de la etiqueta los valores
        $id =$_POST["id"];
        $nom = $_POST["nombre"];
        $apell = $_POST["apellido"];
        $direc = $_POST["direccion"]; 
        $base->query("UPDATE datos_usuarios SET Nombre = '$nom', Apellido = '$apell', Direccion = '$direc' WHERE Id = $id");
        header('location: formulario.php');
    }
    
?>
<form  action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Id: <input hidden type="text" name="id" value="<?php echo $id?>">
Nombre: <input type="text" name="nombre" class="push" value="<?php echo $nom?>">
Apellido: <input type="text" name="apellido" value="<?php echo $apell?>">
Direccion: <input type="text" name="direccion" value="<?php echo $direc?>"> 
<input type="submit" name="insertar" value="insertar">
</form>


</body>
</html>