<?php 
header('Content-type: application/json');
require_once '../db.php';

$idChamadoSelect = $_POST['id_chamado'];

$sql = 

'SELECT
c.`comentario` AS comentario,
u.`nome` AS nomeUsuario,
u.url_foto as foto,
c.referencia AS id_ticket
FROM
tb_comentario c
JOIN tb_usuario u
ON c.`responsavel` = u.`id`
WHERE c.referencia ='.$idChamadoSelect.';';


$pesquisar = $conn->query($sql);
if($pesquisar->num_rows > 0){
    $idChamadoSelect = $_POST['id_chamado'];
    echo json_encode($pesquisar->fetch_all(MYSQLI_ASSOC));
}else{
    echo json_encode(['message' => 'Nenhum dado encontrado']);
}

?>