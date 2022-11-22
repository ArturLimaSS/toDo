<?php

require_once './db.php';
session_start();
if(!isset($_SESSION['userID'])){
  header("Location: ./index.php");
}

$sql = $conn->query('SELECT
c.`id` AS id_chamado,
cl.`nome` AS cliente,
c.`resumo` AS resumo,
c.`descricao` AS descricao,
e.`nome` AS envolvido,
e.`email` AS email,
e.`telefone` AS telefone,
tc.`nome` AS tipo_chamado,
u.nome AS responsavel,
u.id AS id_session,
c.cadastrado_em AS data_cadastro
FROM
tb_chamados c
LEFT JOIN tb_envolvido e
  ON c.`envolvido` = e.`id`
LEFT JOIN tb_cliente cl
  ON e.`cliente` = cl.`id`
LEFT JOIN tb_tipo_chamado tc 
  ON c.`tipo_chamado` = tc.`id`
LEFT JOIN tb_usuario u
  ON c.responsavel = u.id
WHERE c.status NOT IN (3);
');


if($sql->num_rows > 0){
    $array = $sql->fetch_all(MYSQLI_ASSOC);
    echo json_encode($array);
}else{
    echo json_encode(0);
}

?>