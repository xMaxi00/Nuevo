<?php

include("../Config/conexion.php");

$run = $_POST['run'];
$nombre = $_POST['nombre'];
$fono = $_POST['fono'];
$dir = $_POST['direccion'];


$sql = "update tablax set
        run       = '".$run."',
        nombre    = '".$nombre."',
        fono      = '".$fono."',
        direccion = '".$dir."'
        
        where run = '".$run."'";

        if($reg = $conexion ->query($sql))
        {
            HEADER("location:../index.php");
        }
        else
        echo "No se realizaron los cambios";





?>
