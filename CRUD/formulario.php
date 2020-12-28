<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf8">
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
    include("Conexion.php");
    
    $registrosxpagina=2;//cuantos registros por pagina se necesita aparecer
    
    if(isset($_GET["pagina"])){
        if($_GET["pagina"]==1){
            
            header("location:formulario.php");
            
        }else{
            
            $pagina = $_GET["pagina"];
            
        }
    }else{
        
        $pagina = 1; //ubicacion al inicio
        
    }
    
    //debo hacer la logica de la paginacion
    //Hacemos la consulta directamente mediante query 
    $conexion = $base->query("SELECT * FROM datos_usuarios");  
    $totalregistros = $conexion->rowCount(); 
    $totalpaginas = ceil($totalregistros/$registrosxpagina); //Se obtiene el total de paginas, redondeando con la funcion slice
    //Recogemos los datos mediante un fetch 
    $conexion->closeCursor(); 
    
    $desde = ($pagina-1)*$registrosxpagina; 
    
    $sql = "SELECT * FROM datos_usuarios LIMIT $desde,$registrosxpagina"; 
    $conexion =  $base->prepare($sql);
    $conexion->execute(); 
    $resultados = $conexion->fetchAll(PDO::FETCH_OBJ); 
    
    if(isset($_POST["insertar"])){
        $nom = $_POST["nombre"]; 
        $apell = $_POST["apellido"]; 
        $direc = $_POST["direccion"];
        $base->query("INSERT INTO datos_usuarios(Nombre, Apellido, Direccion) VALUES('$nom', '$apell', '$direc')");
        header('location: formulario.php'); 
    }
    
?>

<h1>Registro CRUD :D</h1>
<div class="id box">ID</div>
<div class="nom box">Nombre</div>
<div class="ape box">Apellido</div>
<div class="dir box">Direccion</div>
<div class="clearfix"></div>
<?php 
    //Iniciamos el bucle para repetir los registros que vayan a aparecer en el CRUD
    foreach ($resultados as $persona):
?>
<!-- Se especifica los objetos junto con las propiedades que son el nombre de las columnas -->
<div class="empty box first"><?php echo $persona->Id?></div>
<div class="empty box"><?php echo $persona->Nombre?></div>
<div class="empty box"><?php echo $persona->Apellido?></div>
<div class="empty box"><?php echo $persona->Direccion?></div>
<a href="borrar.php?Id=<?php echo $persona->Id?>"><input type="button" name="borrar" value="Borrar"></a>
<!-- Los datos se estan pasando mediante el array -->
<a href="actualizar.php?Id=<?php echo $persona->Id?>&Nom=<?php echo $persona->Nombre?>&Apell=<?php echo $persona->Apellido?>&Direc=<?php echo $persona->Direccion?>"><input type="button" name="actualizar" value="Actualizar"></a>
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

for($i=1; $i<=$totalpaginas;$i++){
    
    echo "<a href='?pagina=" . $i."'>" . $i ."</a> "; //se le pasa el parametro pagina mediante la url a travez del metodo get
    
}

?>

</body>
</html>