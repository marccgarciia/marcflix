<?php
$server = 'localhost';
$username = 'root';
$password = '';
$bd = 'bd_marcflix';

$conn = mysqli_connect($server, $username, $password, $bd);
$query = "select * from tbl_series";
$resultado = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    foreach ($resultado as $row) {

    ?>
        <form action="" method="POST" id="frm">
            <input type="hidden" name="idu" value="22">
            <input type="hidden" name="ids" value="<?php echo $row['id']; ?>">
            <button type="button" name="id" id="id" onclick="Like()">Like</button>
        </form>
    <?php

    }
    ?>
    <div class="resultadomesa" id="resultadomesa">

    </div>
</body>

</html>
<script src="like.js"></script>