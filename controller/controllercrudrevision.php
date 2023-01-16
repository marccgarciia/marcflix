<?php
//MOSTRAR ERRORES
//1. Conexion a la bd
//2. Consulta SQL
//3. Ejecutar consulta SQL
//4. Transformar consulta SQL en Array assoc.
//5. Montar tabla 
require_once "../config/conexion.php";
if (empty($_POST['filtro'])) {

    //$sentencia = $bd->query("SELECT * FROM tbl_mesa;");
    $sentencia = $bd->query("SELECT * FROM tbl_revision;");

    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
} else {

    $filtro = $_POST['filtro'];

    $sentencia = $bd->query("SELECT * FROM `tbl_revision`  WHERE 
    nombre LIKE '%" . $filtro . "%'
    OR correo LIKE '%" . $filtro . "%'
    OR contrasenya LIKE '%" . $filtro . "%'");

    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
}


$i = 1;
foreach ($usuarios as $usuario) {
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $usuario->nombre; ?></td>
        <td><?php echo $usuario->correo; ?></td>
        <td>
            <button type='button' class='botonaceptar' onclick=Aceptar(<?php echo $usuario->id_revision; ?>)>ACEPTAR</button>
        </td>
        <td>
            <button type='button' class='botonedelete' onclick=Eliminar(<?php echo $usuario->id_revision; ?>)>DENEGAR</button>
        </td>
    </tr>

<?php
};
?>
