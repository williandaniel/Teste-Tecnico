<!DOCTYPE html>
<html>
<head>
    <title>Resposta 3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
    error_reporting(0);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "teste_hangar";

    $db = new mysqli($servername, $username, $password, $database);

    if ($db->connect_error) {
    ?>
        <div class="alert alert-danger" role="alert">
        <?php
            die("Falha na Conexão: " . $db->connect_error);
        ?>
        </div>
    <?php
    }

    $sql1 = 'UPDATE user
    SET user_country = "Canada"
    WHERE user_id = 4';

    $alteracao = $db->query($sql1);

    $sql2 = 'SELECT *
    FROM user';

    $resultado = $db->query($sql2);

    $db->close();
?>

<div class="container">
    <h1>Resposta 3</h1>            
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Address</th>
                <th scope="col">User City</th>
                <th scope="col">User Country</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($resultado as $index => $usuario) {
        ?> 
            <tr>
                <th><?= $usuario['user_id'] ?></th>
                <td><?= $usuario['user_name'] ?></td>
                <td><?= $usuario['user_address'] ?></td>
                <td><?= $usuario['user_city'] ?></td>
                <td><?= $usuario['user_country'] ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>