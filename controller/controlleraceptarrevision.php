<?php
//MOSTRAR ERRORES

$id = $_POST['id_revision'];

include '../config/conexion.php';


$sentencia = $bd->query("SELECT * FROM tbl_revision WHERE id_revision = $id;");
$resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);

foreach ($resultados as $resultado) {

	 $resultado->id_revision;
	 $resultado->nombre;
	 $resultado->correo;
	 $resultado->contrasenya;
};

if ($resultados) {

	$sentencia2 = $bd->prepare("INSERT INTO `tbl_usuarios`(`nombre`, `correo`, `contrasenya`) VALUES (?,?,?);");
    $sentencia2->bindParam(1, $resultado->nombre);
    $sentencia2->bindParam(2, $resultado->correo);
    $sentencia2->bindParam(3, $resultado->contrasenya);
    $resultado2 = $sentencia2->execute();
	// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	$sentencia3 = $bd->prepare("DELETE FROM tbl_revision WHERE id_revision = ?;");
	$sentencia3->bindParam(1, $id);
	$resultado3 = $sentencia3->execute();

	echo "OK";
	// header('Location: ../view/index.php');
} else {
	echo "Error";
}

