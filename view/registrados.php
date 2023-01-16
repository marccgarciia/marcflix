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
                <input type="text" placeholder="Buscar..." id="buscar">
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
        <a href="añadir.php"><button type="button" class="vol">EDITOR</button></a>
        <a href="admin.php"><button type="button" class="vol">REVISIÓN</button></a>
        <div class="generalcrud">
        
            <div class="over">
                <b>REGISTRADOS</b>
                <table class="table" style="text-align:center;">
                    <tr>                        
                        <th scope="col">#</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                    <tbody id="resultadomesa2">

                    </tbody>
                </table>


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
                <p class="copyright">Marc García-Cuevas de Paz © 2022</p>
            </footer>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script src="../static/js/revision.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>