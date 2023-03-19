<!DOCTYPE html>
<html>
<head>
    <title>Resposta 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
    $diarioNotas = array(
        array("id" => 1, "nota1" => 7.3, "nota2" => 6.3, "nota3" => 7.9),
        array("id" => 2, "nota1" => 7.9, "nota2" => 2.1, "nota3" => 4.8),
        array("id" => 3, "nota1" => 4.4, "nota2" => 6.7, "nota3" => 9.9),
        array("id" => 4, "nota1" => 9.2, "nota2" => 6.3, "nota3" => 7.9),
        array("id" => 5, "nota1" => 7.6, "nota2" => 6.3, "nota3" => 5.8),
        array("id" => 6, "nota1" => 7.2, "nota2" => 6.3, "nota3" => 7.7),
        array("id" => 7, "nota1" => 6.9, "nota2" => 6.3, "nota3" => 7.1),
        array("id" => 8, "nota1" => 3.7, "nota2" => 6.3, "nota3" => 7.3),
        array("id" => 9, "nota1" => 2.1, "nota2" => 6.3, "nota3" => 6.8),
        array("id" => 10, "nota1" => 7.7, "nota2" => 6.3, "nota3" => 8.1),
        array("id" => 11, "nota1" => 2.3, "nota2" => 6.3, "nota3" => 7.9),
        array("id" => 12, "nota1" => 9.1, "nota2" => 7.3, "nota3" => 10.0),
        array("id" => 13, "nota1" => 3.9, "nota2" => 6.3, "nota3" => 7.9),
        array("id" => 14, "nota1" => 7.0, "nota2" => 6.3, "nota3" => 7.9),
        array("id" => 15, "nota1" => 7.8, "nota2" => 6.3, "nota3" => 7.4),
        array("id" => 16, "nota1" => 8.9, "nota2" => 6.3, "nota3" => 5.9),
        array("id" => 17, "nota1" => 7.3, "nota2" => 6.3, "nota3" => 4.9),
        array("id" => 18, "nota1" => 5.0, "nota2" => 4.9, "nota3" => 5.1),
        array("id" => 19, "nota1" => 7.8, "nota2" => 6.3, "nota3" => 7.9),
        array("id" => 20, "nota1" => 7.1, "nota2" => 6.3, "nota3" => 7.9),
        array("id" => 21, "nota1" => 7.3, "nota2" => 3.9, "nota3" => 8.9)
    );

    function calculaMedia($notas) {
        $media = round((($notas['nota1'] + $notas['nota2'] + $notas['nota3']) / 3), 1);
        
        return $media;
    }

    function verificaSituacao($notas) {
        $media = calculaMedia($notas);

        if($media < 5) {
            echo 'Reprovado';
        } else if ($media < 7) {
            echo 'Exame';
        } else {
            echo 'Aprovado';
        }
    }
?>

<div class="container">
    <h1>Resposta 1</h1>            
    <table class="table">
        <thead>
            <tr>
                <th>ID Aluno</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Média</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($diarioNotas as $index => $notas) {
        ?> 
            <tr>
                <td><?= $notas['id'] ?></td>
                <td><?= $notas['nota1'] ?></td>
                <td><?= $notas['nota2'] ?></td>
                <td><?= $notas['nota3'] ?></td>
                <td><?= calculaMedia($notas) ?></td>
                <td><?= verificaSituacao($notas) ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>