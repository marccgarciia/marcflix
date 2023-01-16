<?php 
	session_start();
	include_once '../config/conexion.php';
	$usuario = $_POST['txtUsu'];
	$contrasena = $_POST['txtPass'];

	$sentencia = $bd->prepare('select * from tbl_usuarios where correo = ? and contrasenya = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	$sentenciaadmin = $bd->prepare('select * from tbl_admin where correo = ? and password = ?;');
	$sentenciaadmin->execute([$usuario, $contrasena]);
	$datosadmin = $sentenciaadmin->fetch(PDO::FETCH_OBJ);
	// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

	if ($datosadmin === FALSE && $datos === FALSE) {
		header('Location: ../view/loginregistro.php');

	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->correo; //:::::::::::::::::::::::::::::::::::::::::
		header('Location: ../view/principal.php');

	}elseif($sentenciaadmin->rowCount() == 1){
		$_SESSION['correoadmin'] = $datosadmin->correo; //:::::::::::::::::::::::::::::::::::::::::
		header('Location: ../view/admin.php');
	}

?>