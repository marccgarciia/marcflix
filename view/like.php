<?php
//MOSTRAR ERRORES
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../config/conexion.php';


$idu = $_POST['idu'];
$ids = $_POST['ids'];


$sentencia = $bd->prepare("INSERT INTO `tbl_likes`(`id_usuario`, `id_serie`) VALUES (?, ?);");
$sentencia->bindParam(1, $idu);
$sentencia->bindParam(2, $ids);

$resultado = $sentencia->execute();

if ($resultado) {
	echo "OK";
} else {
	echo "Error";
}

