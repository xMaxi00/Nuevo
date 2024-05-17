<?php

include("../Config/conexion.php");

    $run = $_POST['runagregar'];
    $nombre = $_POST['nombagregar'];
    $fono = $_POST['fonoagregar'];
    $dir = $_POST['diragregar'];

    $sql = "insert into tablax(run, nombre, fono, direccion) values ('$run', '$nombre', '$fono', '$dir')";


    $res=mysqli_query($conexion, $sql);

if($res === TRUE)
{
    HEADER("location:../index.php");
}else
{
    echo "Datos no Ingresados";
}

?>