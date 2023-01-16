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
    $sentencia = $bd->query("SELECT * FROM tbl_usuarios;");

    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
} else {

    $filtro = $_POST['filtro'];

    $sentencia = $bd->query("SELECT * FROM `tbl_usuarios`  WHERE 
    nombre LIKE '%" . $filtro . "%'
    OR correo LIKE '%" . $filtro . "%'");

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
            <button type='button' class='botonedelete' onclick=Eliminar2(<?php echo $usuario->id_usuarios; ?>)>ELIMINAR</button>
        </td>
    </tr>

<?php
};
?>
