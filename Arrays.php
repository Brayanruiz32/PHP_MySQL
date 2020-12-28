<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>La pagina de Arrays</title>
</head>
<body>
	<h1>Pagina de Arrays</h1>
<?php 
    //No es necesario indicar el indice de posicion del array. 
    $semana = array("Lunes", "Martes", "Miercoles"); 
    /*$semana[0] = "Lunes"; 	
	$semana[1] = "Martes"; 
	$semana[2] = "Miercoles"; 
	*/
    foreach($semana as $index=>$valor){
        echo '<br>'; 
        echo $semana[$index] = $valor; 
    }
    $datos = array("Nombre"=>"Brayan", "Apellido"=>"Ruiz Marreros", "Ocupacion"=>"Programador"); 
    echo $datos["Nombre"]; 
	/*for($a = 0; $a<3; $a++){
	    echo $semana[$a] . "<br>"; 
	}
	*/
    foreach ($datos as $indice=>$valor){
        echo "<br>"; 
        echo $datos[$indice]=$valor; 
    }
	
?>
</body>
</html>
