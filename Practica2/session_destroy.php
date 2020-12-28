<?php 
    //Cerramos la sesion anteriormente abierta
   /*
    setcookie("opcion", $_POST["remember"], time()-1);
    setcookie("usuario", $usuario, time()-1);
    setcookie("password", $password, time()-1); 
   */
   // session_destroy(); 
   setcookie("usuario", "brayan", time()-1);  
   header("location: login.php"); 
?>