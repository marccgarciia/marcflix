<?php  
//MOSTRAR ERRORES

	$id = $_POST['id_revision'];

	include '../config/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM tbl_revision WHERE id_revision = ?;");
	$sentencia->bindParam(1, $id);
	$resultado = $sentencia->execute();

	if ($resultado) {
		echo "OK";
		// header('Location: ../view/index.php');
	}else{
		echo "Error";
	}

?>