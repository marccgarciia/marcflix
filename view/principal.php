<?php
session_start();

if (!isset($_SESSION['nombre']) && !isset($_SESSION['correoadmin'])) {
    header('Location: loginregistro.php');
} elseif (isset($_SESSION['nombre']) or isset($_SESSION['correoadmin'])) {

    include '../config/conexion.php';
    $sentencia = $bd->query("SELECT * FROM tbl_usuarios;");
    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
} else {
    echo "Error en el sistema";
}
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
                <!-- <input type="text" placeholder="Buscar..."> -->
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
        <div class="general">
            <!-- =================================================================-->
            <div class="principal">
                <video autoplay="true" muted="true" loop="true" id="video_background" preload="auto" volume="10">
                    <source src="../static/video/video.mp4" type="video/mp4">
                </video>
            </div>
            <!-- =================================================================-->
            <!-- =================================================================-->
            <div class="contenedor1" id="2">

                <div class="contain">

                    <div class="titulo">
                        <h2><i class="fa-solid fa-star"></i> DESTACADOS</h2>
                    </div>
                    <!-- =================================================================-->
                    <div class="row">

                        <div class="row__inner">

                            <?php
                            $server = 'localhost';
                            $username = 'root';
                            $password = '';
                            $bd = 'bd_marcflix';

                            $conn = mysqli_connect($server, $username, $password, $bd);
                            $query = "select * from tbl_series";
                            $resultado = mysqli_query($conn, $query);




                            ?>
                            <!-- ::::::::::::::::::::::::::::::::::::::::::::::::: -->
                            <!-- ::::::::::::::::::::::::::::::::::::::::::::::::: -->
                            <?php foreach ($resultado as $row) { ?>
                                <div class="tile">
                                    <div class="tile__media">
                                        <img class="tile__img" src="fotos/<?php echo $row['ruta']; ?>" alt="" />
                                    </div>

                                    <div class="tile__details">
                                        <div class="tile__title">

                                            <button class="like"><i class="fa-solid fa-heart"></i></button>
                                            <h1><?php echo $row['nombre']; ?></h1>
                                            <p><i class="fa-regular fa-heart"></i> 102</p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- =================================================================-->
                </div>
            </div>
            <!-- =================================================================-->
            <!-- =================================================================-->
            <div class="contenedor2" id="3">
                <div class="contain">
                    <div class="titulo">
                        <h2><i class="fa-solid fa-bars"></i> TODO</h2>
                    </div>
                    <!-- =================================================================-->
                    <div class="row">

                        <div class="row__inner">
                            <!-- ::::::::::::::::::::::::::::::::::::::::::::::::: -->
                            <?php foreach ($resultado as $row) { ?>
                                <div class="tile">
                                    <div class="tile__media">
                                        <img class="tile__img" src="fotos/<?php echo $row['ruta']; ?>" alt="" />
                                    </div>

                                    <div class="tile__details">
                                        <div class="tile__title">
                                            <!--BOTON LIKE-->
                                            <button class="like" type="button" onclick=Like(<?php echo $row->id; ?>><i class="fa-solid fa-heart"></i></button>
                                            <h1><?php echo $row['nombre']; ?></h1>
                                            <p><i class="fa-regular fa-heart"></i>
                                            <?php 
                                            $idconsulta =  $row['id'];
                                            include '../config/conexion.php';
                                            $sentencia6 = $bd->prepare("SELECT COUNT(*) FROM `tbl_likes` WHERE id_serie = ?;");
                                            $sentencia6->bindParam(1, $idconsulta);
                                            $resultado6 = $sentencia6->execute();
                                            echo $idconsulta;
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- =================================================================-->
                    <div class="contenedor2" id="4">
                        <div class="contain">
                            <div class="titulo">
                                <h2><i class="fa-solid fa-heart"></i> MIS LIKES</h2>
                            </div>
                            <!-- =================================================================-->
                            <div class="row">

                                <div class="row__inner">
                                    <!-- ::::::::::::::::::::::::::::::::::::::::::::::::: -->
                                    <?php foreach ($resultado as $row) { ?>
                                        <div class="tile">
                                            <div class="tile__media">
                                                <img class="tile__img" src="fotos/<?php echo $row['ruta']; ?>" alt="" />
                                            </div>

                                            <div class="tile__details">
                                                <div class="tile__title">

                                                    <button class="like"><i class="fa-solid fa-heart"></i></button>
                                                    <h1><?php echo $row['nombre']; ?></h1>
                                                    <p><i class="fa-regular fa-heart"></i> 102</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#1">Principal</a></li>
                        <li class="list-inline-item"><a href="#2">Destacados</a></li>
                        <li class="list-inline-item"><a href="#3">Todo</a></li>
                        <li class="list-inline-item"><a href="#4">Mis likes</a></li>
                    </ul>
                    <p class="copyright">Marc García-Cuevas de Paz © 2022</p>
                </footer>
            </div>
            <script src="../static/js/like.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>