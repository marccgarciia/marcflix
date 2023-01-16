<?php
//MOSTRAR ERRORES

$id = $_POST['id'];
echo $id;
include '../config/conexion.php';


$sentencia = $bd->query("INSERT INTO `tbl_likes`(`id_serie`) VALUES (?);");
$sentencia->bindParam(1, $id);
$resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);


if ($resultados) {

	echo "OK";
	// header('Location: ../view/index.php');
} else {
	echo "Error";
}

