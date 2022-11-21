<?php 

require_once '../db.php';
$sql = $conn->query('SELECT
c.`id` AS id_chamado,
cl.`nome` AS cliente,
cl.id AS idCliente,
c.`resumo` AS resumo,
c.`descricao` AS descricao,
e.id as idEnvolvido,
e.`nome` AS envolvido,
e.`email` AS email,
e.`telefone` AS telefone,
tc.`nome` AS tipo_chamado,
s.descricao as status_ticket,
c.status AS id_status,
c.tipo_chamado AS id_tipo_chamado,
c.responsavel AS responsavel_ticket
FROM
tb_chamados c
JOIN tb_envolvido e
  ON c.`envolvido` = e.`id`
JOIN tb_cliente cl
  ON e.`cliente` = cl.`id`
JOIN tb_tipo_chamado tc 
  ON c.`tipo_chamado` = tc.`id`
JOIN tb_status s
  ON s.id = c.status 
WHERE c.id = ' . intval($_GET['id_chamado']) . ';
');

$array = $sql->fetch_assoc();

echo json_encode($array);