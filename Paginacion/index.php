<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina en blanco</title>
</head>
<body>
<?php 
    try {
        //Conexion a la base de datos
        $base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET UTF8");
        
        $tamanio_paginas = 3; //cuantos registros por pagina
        
        //Se debe verificar el numero de pagina a mostrar los resultados 
        
        
        if(isset($_GET["pagina"])){
         
            if($_GET["pagina"]==1){//En la primera recarga de la pagina no existe la variable pagina
                
                header('location: index.php');
                
            }else{
                
                $pagina = $_GET["pagina"];
                
            }
        }else{
          
            $pagina = 1;
        }
        
        //$pagina = 1; //la pagina en la que estamos al cargar la pagina web 
        
        $empezardesde = ($pagina - 1)*3;
        
        $sql ="SELECT * FROM datos_usuarios"; 
        $resultado = $base->prepare($sql);
        $resultado->execute(array()); 
        
        $num_registros = $resultado->rowCount();//obtener el numero de registros 
        
        $total_paginas = ceil($num_registros/$tamanio_paginas);//mediante un calculo se obtiene la cantidad de paginas que se necesitara
        
        echo "Numero de registros de la consulta " . $num_registros . "<br>"; 
        echo "Mostramos " . $tamanio_paginas . " registros por pagina <br>"; 
        echo "Mostrando la pagina " . $pagina . " de " . $total_paginas . "<br>"; 
        
        $resultado->closeCursor(); //Cerramos la  consulta preparada para el ahorro de recursos
        
        $sql_limite = "SELECT * FROM datos_usuarios LIMIT $empezardesde,$tamanio_paginas"; //sentencia sql que marca el limite de registros en el 
        //listado de registros
        $resultado = $base->prepare($sql_limite);
        $resultado->execute(array()); 
        while($array=$resultado->fetch(PDO::FETCH_ASSOC)){
            
            echo $array["Id"] . " ";
            echo $array["Nombre"] . " ";
            echo $array["Apellido"] . " ";
            echo $array["Direccion"] . "<br> ";
            
        }
        
        for($i=1; $i<=$total_paginas; $i++ ){
            
            echo "<a href='?pagina=" .$i ."'>" . $i . "</a>  "; //pasamos a la url la variable pagina para la dinamica de la paginacion
            
        }
        
    } catch (Exception $e) {
        echo "Error: " . $e->GetMessage(); 
    }
?>

</body>
</html>