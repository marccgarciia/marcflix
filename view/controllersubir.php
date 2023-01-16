<?php
include_once '../config/conexion.php';

if(isset($_POST['Guardar'])){
    $imagen = $_FILES['imagen']['name'];
    $nombre = $_POST['titulo'];

    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'jpg') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'png')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, jpg, webp, png';
          $_SESSION['tipo'] = 'danger';
          header('location:añadir.php');
        }else{

        //  $query = "INSERT INTO tbl_series(nombre,ruta) values('$nombre','$imagen')";
        //  $resultado = mysqli_query($conn,$query);

        $sentencia = $bd->prepare("INSERT INTO tbl_series(nombre,ruta) values(?,?);");
        $sentencia->bindParam(1, $nombre);
        $sentencia->bindParam(2, $imagen);
        $resultado = $sentencia->execute();

         if($resultado){
              move_uploaded_file($temp,'fotos/'.$imagen);   
             $_SESSION['mensaje'] = 'se ha subido correctamente';
             $_SESSION['tipo'] = 'success';
             header('location:añadir.php');
         }else{
             $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
             $_SESSION['tipo'] = 'danger';
         }
       }
    }
}
