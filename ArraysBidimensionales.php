<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Pagina de Arrays Bidimensionales</title>
</head>
<body>
	<h1>Pagina de Arrays Bidimensionales</h1>
<?php 
    $alimentos=array("Fruta"=>array("tropical"=>"kiwi","citrico"=>"Mandarina","otros"=>"Manzana"),
                    "Leche"=>array("animal"=>"vaca", "natural"=>"coco"), 
                    "Carne"=>array("vacuno"=>"lomo", "porcino"=>"patas"));
    //echo $alimentos["Fruta"]["tropical"]; 
    //Recorrer un array bidimensional 
    //Usando la funcion list 
    foreach($alimentos as $clave_alim=>$alim){
       echo "$clave_alim:<br>";
       while(list($clave,$valor)=each($alim)){
           echo "$clave=$valor <br>"; 
       }
       echo "<br>"; 
       /*
        foreach ($alim as $clave_final=>$alim_final){
            echo "$alim_final <br>";
        }
        */
    }

?>
</body>
</html>