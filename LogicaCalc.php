
<style>
.resultado{
    color: red; 
    font-weight: bold; 
    font-family: Arial; 
}
</style>

<?php 
//Otra opcion tambien podria ser que se declare como variabel global los atributos, pero paa mayor convenienci seria el paso por parametro. 
function calcular($calculo, $num1, $num2){
    if (!strcmp("Suma", $calculo)) {
        $resultado = $num1 + $num2; 
        echo "<p class='resultado'>La suma es $resultado </p>";
    }
    if (!strcmp("Resta", $calculo)) {
        $resultado = $num1 - $num2; 
        echo "<p class='resultado'>La resta es $resultado </p>";
    }
    if (!strcmp("Multiplicacion", $calculo)) {
        $resultado = $num1 * $num2; 
        echo "<p class='resultado'>La multiplicacion es $resultado </p>";
    }
    if (!strcmp("Division", $calculo)) {
        $resultado = $num1 / $num2; 
        echo "<p class='resultado'>La division es $resultado </p>";
    }    
}

?>