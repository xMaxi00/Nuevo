<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"> <!-- Aceptar todos los caracteres-->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Compatibilidad de tamaños por dispositivos-->
    <title>Registro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src = "..\CRUD1\validar.js" defer></script> <!-- Programa .js para validaciones -->
    <?php require("Config/conexion.php"); ?> <!-- Se realiza conexion a base de datos para poder usar o llamar datos en varias etapas del codigo -->
</head>

<body>
    <br>
    <div class="container">
        <h1 class="text center"> LISTADO DE CLIENTES </h1> <!--Titulo de la Pagina-->
    </div>

    <form class="container">
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Run</th> <!-- Primera Fila de Campos de la Tabla -->
                    <th scope="col">Nombre</th>
                    <th scope="col">Fono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $conexion->query("select * from tablax");
                //Arreglo para llamar valores de la BD al formulario
                while ($reg = $sql->fetch_assoc()) //Se puede usar tambien fetch_array
                {
                ?>
                    <tr>
                        <th scope="row"><?php echo $reg['run'] ?></th> <!--Asigna valores de variables a los campos correspondientes-->
                        <th scope="row"><?php echo $reg['nombre'] ?></th>
                        <th scope="row"><?php echo $reg['fono'] ?></th>
                        <th scope="row"><?php echo $reg['direccion'] ?></th>
                        <th>
                            <a href="index.php?runedit=<?php echo $reg['run'] ?>" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modaleditar">Editar</button> <!-- Boton EDitar envia variable por url-->
                        </th>
                        <th>
                            <a href="crud/eliminardatos.php?run=<?php echo $reg['run'] ?>" class="btn btn-dark">Eliminar</a> <!--Boton Eliminar llamando su accion-->
                        </th>
                    </tr>

                <?php
                }
                ?>


            </tbody>
        </table>

        <div><!-- Boton para Agregar Cliente que abre el Modal Form -->
            <a href="index.php?runedit=555" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalagregar">Agregar</a>
        </div>

    </form>


    <!-- Caracteristicas del Modal, es un formulario que aparece en forma de ventana sin cambiar de pantalla-->
    <!-- Al principio no guardaba los datos pero al reemplazar un div con Form si tomo las acciones y funciono perfecto el action-->
    <form class="modal fade" id="modalagregar" tabindex="-1" aria-labelledby="modalagregar" aria-hidden="true" action="crud/insertardatos.php" method="POST"><!-- Modal Agregar --> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalagregar">Agregar Nuevo Cliente</h1> <!-- Titulo del Modal -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = goToIndex()></button> <!-- Boton "x" para cerrar -->
                </div>
                <div class="modal-body"> <!--Cuerpo del Formulario modal-->
                    <p>Ingrese Run</p> <!-- Linea de Texto que solicita el run a agregar-->
                    <input type="text" class="form-control" name="runagregar" id="runagregar" /> <!--Espacio para ingresar texto-->
                    <div id="msg"></div>
                    <br>
                    <p>Ingrese Nombre</p> <!-- Linea de Texto que solicita el Nombre a agregar-->
                    <input type="text" class="form-control" name="nombagregar" id="nombagregar" /> <!--Espacio para ingresar texto-->
                    <br>
                    <p>Ingrese Fono</p> <!-- Linea de Texto que solicita el fono  agregar-->
                    <input type="text" class="form-control" name="fonoagregar" id="fonoagregar" /> <!--Espacio para ingresar texto-->
                    <br>
                    <p>Ingrese Dirección</p> <!-- Linea de Texto que solicita el titulo de la direccion a agregar-->
                    <input type="text" class="form-control" name="diragregar" id="diragregar" /> <!--Espacio para ingresar texto-->
                </div>
                <div class="modal-footer"> <!-- Botones de Cancelar y Guardar con sus caracteristicas -->
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick = goToIndex()>Cancelar</button>
                    <button type="submit" class="btn btn-dark" onclick= "validar_nombre();">Guardar</button> <!-- Ejecuta el archivo validar cuando se presiona --> 
                </div>
            </div>
        </div>
    </form>
            


    <!-- Caracteristicas del Modal, es un formulario que aparece en forma de ventana sin cambiar de pantalla-->
    <form class="modal fade" id="modaleditar" tabindex="-1" aria-labelledby="modaleditar" aria-hidden="true" action="crud/editardatos.php" method="POST"> <!-- Con el Id se llama al modal en el Boton de Agregar-->

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modaleditar">Editar Datos</h1> <!-- Titulo del Modal -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = goToIndex()></button> <!-- Boton "x" para cerrar se agrega funcion de volver al index -->
                </div>
                <div class="modal-body"> <!--Cuerpo del Formulario modal-->
                <!-- Codigo php para solicitar datos y asignarlos al arreglo para rellenar los campos a editar -->
                <?php                      
                        $sql1 = "select * from tablax where run = " .$_REQUEST['runedit']; //realiza la busqueda de datos por el run
                        $res = $conexion->query($sql1); //ejecuta la query
                        $campos = $res->fetch_assoc(); //asigna los valores del arreglo a campos para luego poder mostrarlos con asignaciones
                ?>
                    <p>Ingrese Run</p> <!-- Linea de Texto que solicita el run a editar-->
                    <input type="text" class="form-control" name="run" value="<?php echo $campos['run']; ?>"/> <!--Espacio para ingresar texto asignando valores buscados-->
                    <div id="msg"></div>
                    <br>
                    <p>Ingrese Nombre</p> <!-- Etiqueta Nombre-->
                    <input type="text" class="form-control" name="nombre" value="<?php echo $campos['nombre']; ?>"/> <!--Espacio para ingresar texto-->
                    <br>
                    <p>Ingrese Fono</p> <!-- Euqieta fono-->
                    <input type="text" class="form-control" name="fono" value="<?php echo $campos['fono']; ?>"/> <!--Espacio para ingresar texto-->
                    <br>
                    <p>Ingrese Dirección</p> <!-- Etiqueta Direccion-->
                    <input type="text" class="form-control" name="direccion" value="<?php echo $campos['direccion']; ?>"/> <!--Espacio para ingresar texto-->
                </div>
                <div class="modal-footer"> <!-- Botones de Cancelar y Guardar con sus caracteristicas -->
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick = "goToIndex();">Cancelar</button>
                    <button type="submit" class="btn btn-dark">Guardar</button>
                    <!-- Se agrega esta funcion javascript para indicar al modal que vuelva al index, ocurria un error en el que cargaba los datos
                    y se quedaba en la pagina con esos datos, no se podia editar nuevos datos -->
                    <script> 
                        function goToIndex() 
                        {
                            window.location.href= 'index.php';
                        }
                    </script>
                    
                </div>
            </div>
        </div>
    </form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>