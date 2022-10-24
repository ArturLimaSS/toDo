<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
}
require_once '../db.php';

$id_chamado = $_GET['id_chamado'];
$sql = $conn->query('SELECT
c.`id` AS id_chamado,
cl.`nome` AS cliente,
c.`resumo` AS resumo,
c.`descricao` AS descricao,
e.`nome` AS envolvido,
e.`email` AS email,
e.`telefone` AS telefone,
tc.`nome` AS tipo_chamado
FROM
tb_chamados c
JOIN tb_envolvido e
  ON c.`envolvido` = e.`id`
JOIN tb_cliente cl
  ON e.`cliente` = cl.`id`
  JOIN tb_tipo_chamado tc 
  ON c.`tipo_chamado` = tc.`id`
  WHERE c.id = '.$id_chamado.';
');

$array = $sql->fetch_assoc();

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
    <h1>
        <?php

        echo $array['id_chamado'];
        echo $array['cliente'];
        ?>
    </h1>

</body>

</html>