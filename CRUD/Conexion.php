<?php 
    try {
        
        $base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET UTF8");
        
    } catch (Exception $e) {
        echo "Error: " . $e->getLine() . "<br>";
        echo "Error: " . $e->GetMessage(); 
    }

    
?>