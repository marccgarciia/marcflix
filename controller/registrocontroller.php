<?php 
	session_start();
	include_once '../config/conexion.php';
	$nombre = $_POST['txtNom'];
	$usuario = $_POST['txtUsu'];
	$contrasena = $_POST['txtPass'];

	if (!empty($nombre && $usuario && $contrasena)) {

		$sentencia = $bd->prepare("INSERT INTO `tbl_revision`(`nombre`, `correo`, `contrasenya`) VALUES (?,?,?);");
		$sentencia->bindParam(1, $nombre);
		$sentencia->bindParam(2, $usuario);
		$sentencia->bindParam(3, $contrasena);

	
		$resultado = $sentencia->execute();
	
		if ($resultado === TRUE) {
			header('Location: ../view/landpage.php');
			echo "OK";
		} else {
			echo "Error";
		}

	} else {
		echo "¡Campos vacios!";
	}
?>
