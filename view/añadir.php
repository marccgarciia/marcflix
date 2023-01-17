<?php
session_start();

if (!isset($_SESSION['correoadmin'])) {
    header('Location: loginregistro.php');
} elseif (isset($_SESSION['correoadmin'])) {

    include '../config/conexion.php';
    $sentencia = $bd->query("SELECT * FROM tbl_usuarios;");
    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
} else {
    echo "Error en el sistema";
}


$server = 'localhost';
$username = 'root';
$password = '';
$bd = 'bd_marcflix';

$conn = mysqli_connect($server, $username, $password, $bd);
$query = "select * from tbl_series";
$resultado = mysqli_query($conn, $query);


?>
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../static/css/estilosprincipal.css">
    <link rel="icon" type="image/png" href="../static/img/logos/mr.png" />
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container" id="1">
        <div class="navbar">
            <div class="izquierda">
            </div>
            <!-- =================================================================-->
            <div class="centro">
                <a href="principal.php"><img src="../static/img/logos/mn.png" alt="Logo Negro"></a>
                <p><?php echo $_SESSION['nombre'];
                    echo $_SESSION['correoadmin'] ?></p>
            </div>
            <!-- =================================================================-->
            <div class="derecha">
                <a href="../controller/cerrarsesion.php"><button type="button">SALIR</button></a>
            </div>
        </div>
        <!-- =================================================================-->
        <!-- =================================================================-->
        <!-- =================================================================-->
        <a href="admin.php"><button type="button" class="vol">VOLVER</button></a>
        <br>
        <br>

        <div class="generalcrud">
            <div class="row2">
                <div class="col-lg-4">
                    <h1 class="text-primary">PUBLICAR NUEVA SERIE / PELI</h1>
                    <form action="controllersubir.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="my-input">Seleccione una portada</label>
                            <input id="my-input" type="file" name="imagen">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Nombre de la Serie</label>
                            <input id="my-input" class="form-control" type="text" name="titulo">
                        </div>
                        <?php if (isset($_SESSION['mensaje'])) { ?>
                            <div class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                                <strong><?php echo $_SESSION['mensaje']; ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php session_unset();
                        } ?>
                        <input type="submit" value="Guardar" class="btn btn-primary" name="Guardar">
                    </form>
                </div>









                <!-- <?php
                        $server = 'localhost';
                        $username = 'root';
                        $password = '';
                        $bd = 'bd_marcflix';

                        $conn = mysqli_connect($server, $username, $password, $bd);
                        $query = "select * from tbl_series";
                        $resultado = mysqli_query($conn, $query);
                        ?>
                    <div class="col-lg-8">
                        <h1 class="text-primary text-center">Galeria de Imagenes</h1>
                        <hr>
                        <div class="card-columns">
                            <?php foreach ($resultado as $row) { ?>
                                <div class="card">
                                    <img src="fotos/<?php echo $row['ruta']; ?>" class="card-img-top" alt="...">
                                    <?php echo $row['imagen']; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><strong><?php echo $row['nombre']; ?></strong></h5>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    </div> -->
            </div>
					<input class="buscar" type="text" name="buscar" id="buscar" placeholder="Buscar..." style="background-color: red;">
            <div class="over">
                <table class="table" style="text-align:center;">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">ELIMINAR</th>
                        <th scope="col">EDITAR</th>
                    </tr>
                    <tbody id="resultadomesa">

                    </tbody>
                </table>


            </div>
            <!-- ::::::::::::::::::::::::::::::::::::::::::::::::: -->
            <!-- ::::::::::::::::::::::::::::::::::::::::::::::::: -->
            <!-- ::::::::::::::::::::::::::::::::::::::::::::::::: -->
            <div class="footer-basic">
                <footer>
                    <div class="fotosfotter">
                        <img src="../static/img/logos/mrf.png" alt="logo" id="m">
                        <img src="../static/img/logos/logor.png" alt="logo">
                        <img src="../static/img/logos/mrf.png" alt="logo" id="m">
                    </div>
                    <p class="copyright">Marc García-Cuevas de Paz © 2022</p>
                </footer>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>

</html>
<script src="../static/js/pelis.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>