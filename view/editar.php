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

$id = $_GET['id'];
$sentencia5 = $bd->prepare("SELECT * FROM tbl_series WHERE id = ?;");
$sentencia5->execute([$id]);
$serie = $sentencia5->fetch(PDO::FETCH_OBJ);

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
        <a href="añadir.php"><button type="button" class="vol">VOLVER</button></a>
        <br>
        <br>

        <div class="generalcrud">
            <div class="over3">
                <form method="GET" action="../controller/controllereditarseries.php">
                    <table>
                        <tr>
                            <td>NOMBRE SERIE / PELI: </td>
                            <td><input type="text" name="nombre" class="label" value="<?php echo $serie->nombre; ?>"></td>
                            <p>ID: <?php echo $serie->id; ?></p>
                        </tr>
                        <tr>
                            <input type="hidden" name="oculto">
                            <input type="hidden" name="id" value="<?php echo $serie->id; ?>">
                            <td colspan="1"><input class="vol2" type="submit" value="EDITAR"></td>
                        </tr>
                    </table>
                </form>
                <img class="tile__img" style="margin: 10px;" src="fotos/<?php echo $serie->ruta; ?>" alt="" />

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