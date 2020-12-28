<?php 
require_once("Conectar.php");


$registrosxpagina=2;//cuantos registros por pagina se necesita aparecer

if(isset($_GET["pagina"])){
    if($_GET["pagina"]==1){
        
        header("location:index.php");
        
    }else{
        
        $pagina = $_GET["pagina"];
        
    }
}else{
    
    $pagina = 1; //ubicacion al inicio
    
}

//debo hacer la logica de la paginacion
//Hacemos la consulta directamente mediante query
$conexion = Conectar::obtener_conexion(); 

$conexion2 = $conexion->query("SELECT * FROM datos_usuarios");
$totalregistros = $conexion2->rowCount();
$totalpaginas = ceil($totalregistros/$registrosxpagina); //Se obtiene el total de paginas, redondeando con la funcion slice
//Recogemos los datos mediante un fetch
$conexion2->closeCursor();

$desde = ($pagina-1)*$registrosxpagina; 

?>