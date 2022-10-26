<?php 
require_once '../db.php';

$sql = 'SELECT
c.`comentario` AS comentario,
u.`nome` AS nomeUsuario
FROM
tb_comentario c
JOIN tb_usuario u
  ON c.`responsavel` = u.`id`;';
$pesquisar = $conn->query($sql);
if($pesquisar->num_rows > 0){
    echo json_encode($pesquisar->fetch_all(MYSQLI_ASSOC));
}else{
    echo json_encode('Nenhum dado encontrado');
}
?>