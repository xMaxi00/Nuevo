<!--Codigo para conectar la Base de Datos-->
<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "basex";

$conexion = new mysqli($host, $user, $pass, $db);

//if ($conexion) {
   // echo "Conectado";
//} else {
//    echo "No Conectado";
//}

?>