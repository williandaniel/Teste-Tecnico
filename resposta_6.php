<!DOCTYPE html>
<html>
<head>
    <title>Resposta 6</title>
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

    $sql = 'SELECT user.user_name AS name, user.user_address AS address, user.user_city AS city, user.user_country AS country, orders.order_id AS id, orders.order_total AS total, DATE_FORMAT(orders.order_date, "%d/%m/%Y") AS date, DATE_FORMAT(orders.order_date, "%H:%i:%s") AS hours
    FROM user
    JOIN orders ON orders.order_user_id = user.user_id';

    $resultado = $db->query($sql);

    $db->close();
?>

    <div class="container">
        <h1>Resposta 6</h1>            
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="8" style="text-align:center;">Relatório de Pedidos</th>
                </tr>
                <tr>
                    <th scope="col">Nº Pedido</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Valor Total Pedido</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">País</th>
                    <th scope="col">Data Pedido</th>
                    <th scope="col">Hora Pedido</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($resultado as $index => $order) {
            ?> 
                <tr>
                    <th><?= $order['id'] ?></th>
                    <td><?= $order['name'] ?></td>
                    <td><?= "US$ " . $order['total'] ?></td>
                    <td><?= $order['address'] ?></td>
                    <td><?= $order['city'] ?></td>
                    <td><?= $order['country'] ?></td>
                    <td><?= $order['date'] ?></td>
                    <td><?= $order['hours'] ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>