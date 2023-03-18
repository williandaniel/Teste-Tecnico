<!DOCTYPE html>
<html>
<head>
  <title>Resposta 4</title>
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
    
    
    $db = new mysqli($servername, $username, $password, $database);
     
    
    if ($db->connect_error) {
        die("Falha na Conexão: " . $db->connect_error);
    } else {
        echo "Conectado com Sucesso";
    }

    $sql = 'SELECT user.user_country AS country, SUM(orders.order_total) AS total
    FROM user
    LEFT JOIN orders ON orders.order_user_id = user.user_id
    GROUP BY country';

    $resultado = $db->query($sql);

    $db->close();
?>

<div class="container">
  <h1>Resposta 4</h1>            
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Country</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($resultado as $index => $usuario) {
    ?> 
        <tr>
        <th><?= $usuario['country'] ?></th>
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