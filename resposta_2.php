<!DOCTYPE html>
<html>
<head>
  <title>Resposta 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "teste_hangar";
    
    
    $conexao = new mysqli($servername, $username, $password, $database);
     
    
    if ($conexao->connect_error) {
        die("Falha na Conexão: " . $conexao->connect_error);
    } else {
        echo "Conectado com Sucesso";
    }
    
    $sql = 'SELECT user.user_name as name, user.user_city as city, user.user_country as country, orders.order_date as date, orders.order_total as total
    FROM user, orders
    WHERE user.user_id = orders.order_user_id AND user.user_id IN (1, 3, 5)
    ORDER BY user.user_name ASC';

    $resultado = $conexao->query($sql);
?>

<div class="container">
  <h1>Resposta 2</h1>            
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Country</th>
      <th scope="col">Date</th>
      <th scope="col">Total do Pedido</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($resultado as $index => $usuario) {
    ?> 
        <tr>
        <th><?= $usuario['name'] ?></th>
        <td><?= $usuario['city'] ?></td>
        <td><?= $usuario['country'] ?></td>
        <td><?= $usuario['date'] ?></td>
        <td><?= $usuario['total'] ?></td>
        </tr>
    <?php
      }
    ?>
  </tbody>
</table>
</div>

</body>
</html>