<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
		<style type="text/css">
	.box{
	   border: none;
	   float: left; 
	   margin-left: 100px; 
	}
	.clearfix{
	   clear: both; 

	}
    .push{
        margin-left: 170px;
    
    }
    .empty{
        width: 150px; 
        height: 17px;
        margin-left: 10px;
        border: 1px solid black;
    }
    .first{
        margin-left: 7px; 
    }
    h1{
        text-align: center;
        text-decoration: underline; 
    }
	</style>
</head>
<body>

<?php 

include("modelo/paginacion.php"); 

require_once("modelo/insercion.php"); 

require_once("modelo/actualizacion.php"); 

require_once("modelo/eliminacion.php");

?>

<h1>Registro CRUD :D</h1>
<div class="id box">ID</div>
<div class="nom box">Nombre</div>
<div class="ape box">Apellido</div>
<div class="dir box">Direccion</div>
<div class="clearfix"></div>
<?php 
    //Iniciamos el bucle para repetir los registros que vayan a aparecer en el CRUD
foreach($matrizdeusuarios as $usuario):
?>
<!-- Se especifica los objetos junto con las propiedades que son el nombre de las columnas -->
<div class="empty box first"><?php echo $usuario["Id"]?></div>
<div class="empty box"><?php echo $usuario["Nombre"]?></div>
<div class="empty box"><?php echo $usuario["Apellido"]?></div>
<div class="empty box"><?php echo $usuario["Direccion"]?></div>
<a href="modelo/eliminacion.php?Id=<?php echo $usuario["Id"]?>"><input type="button" name="borrar" value="Borrar"></a>
<!-- Los datos se estan pasando mediante el array -->
<a href="actualizacion.php?Id=<?php echo $usuario["Id"]?>&Nom=<?php echo $usuario["Nombre"]?>&Apell=<?php echo $usuario["Apellido"]?>&Direc=<?php echo $usuario["Direccion"]?>"><input type="button" name="actualizar" value="Actualizar"></a>
<div class="clearfix"></div>
<?php 
endforeach;
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input type="text" name="nombre" class="push">
<input type="text" name="apellido">
<input type="text" name="direccion"> 
<input type="submit" name="insertar" value="insertar">
</form>
<?php 

for($i=1; $i<=$totalpaginas; $i++ ){
    
    echo "<a href='?pagina=" .$i ."'>" . $i . "</a>  "; //pasamos a la url la variable pagina para la dinamica de la paginacion
    
}
?>


</body>
</html>