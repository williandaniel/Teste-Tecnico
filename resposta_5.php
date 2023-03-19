<!DOCTYPE html>
<html>
<head>
    <title>Resposta 5</title>
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

    $sql = 'SELECT SUM(order_total) AS total, DATE_FORMAT(order_date, "%m/%Y") AS data_mes_ano
    FROM orders
    GROUP BY data_mes_ano';

    $resultado = $db->query($sql);

    $db->close();
?>

<div class="container">
    <h1>Resposta 5</h1>            
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Total Venda</th>
                <th scope="col">Mês/Ano</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($resultado as $index => $usuario) {
        ?> 
            <tr>
                <th><?= $usuario['total'] ?></th>
                <td><?= $usuario['data_mes_ano'] ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>