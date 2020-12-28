<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina de funciones con paso de parametros por referencia y  por valor</title>
</head>
<body>
<?php 
//Funcion de paso con parametro de valor 
//teniendo el mismo nombre que el parametro 
function convert_string($string){
    $string = strtolower($string);
    $string = ucwords($string);
    return $string;
}
$palabrita = "holi boli";
echo convert_string($palabrita) . "<br>";
echo $palabrita; 
//funcion de paso con parametro de referencia 
//La variable debe tener el mismo nombre que el argumento 
echo "<hr>"; 
function convert_string2(&$string){
    $string = strtolower($string);
    $string = ucwords($string);
    return $string;
}
$palabrita2 = "holi boli";
echo convert_string2($palabrita2) . "<br>";
echo $palabrita2; 

?>

</body>
</html>