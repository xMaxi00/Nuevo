<?php
include("../Config/conexion.php"); //llama el programa de conexion

$run = $_GET['run']; //Recibe y almacena la variable enviada

$sql = "delete from tablax where run = '$run'"; //Query para borrar datos de la tabla

$query = mysqli_query($conexion,$sql); //ejecuta el codigo
       
        
       
//Condicion para volver al index o avisar de problema
        if ($query === TRUE)
        {
            HEADER("location:../index.php");
        }
        else
        echo "No se realizaron los cambios";




?>
