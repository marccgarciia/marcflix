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
    $sentencia = $bd->query("SELECT * FROM tbl_series;");

    $series = $sentencia->fetchAll(PDO::FETCH_OBJ);
} else {

    $filtro = $_POST['filtro'];

    $sentencia = $bd->query("SELECT * FROM `tbl_series`  WHERE 
    nombre LIKE '%" . $filtro . "%'
    OR correo LIKE '%" . $filtro . "%'
    OR contrasenya LIKE '%" . $filtro . "%'");

    $series = $sentencia->fetchAll(PDO::FETCH_OBJ);
}


$i = 1;
foreach ($series as $serie) {
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $serie->nombre; ?></td>
        <td>
            <button type='button' class='botonedelete' onclick=Eliminar(<?php echo $serie->id; ?>)>ELIMINAR</button>
        </td>
        <td>
            <a href="../view/editar.php?id=<?php echo $serie->id; ?>"><button class='botonaceptar' >EDITAR</button></a>
        </td>
    </tr>

<?php
};
?>
