<?php

require_once './db.php';

$sql = $conn->query('SELECT
c.`id` AS id_chamado,
cl.`nome` AS cliente,
c.`resumo` AS resumo,
c.`descricao` AS descricao,
e.`nome` AS envolvido,
e.`email` AS email,
e.`telefone` AS telefone
FROM
tb_chamados c
JOIN tb_envolvido e
  ON c.`envolvido` = e.`id`
JOIN tb_cliente cl
  ON e.`cliente` = cl.`id`;
');


if($sql->num_rows > 0){
    $array = $sql->fetch_all(MYSQLI_ASSOC);
    echo json_encode($array);
}else{
    echo "Nenhum";
}

?>