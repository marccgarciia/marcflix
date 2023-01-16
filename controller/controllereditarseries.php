<?php 

$id = $_GET['id'];
$nombre = $_GET['nombre'];

include '../config/conexion.php';
$sentencia = $bd->prepare("UPDATE tbl_series SET nombre = ? WHERE id = ?;");
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $id);
$resultado = $sentencia->execute();

if ($resultado) {
	header('Location: ../view/añadir.php');
	// header('Location: ../view/index.php');
}else{
	echo "Error";
}

?>