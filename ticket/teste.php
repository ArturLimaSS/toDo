<?php 

require_once '../db.php';
header('Content-type: application/json');


$texto = $_POST['comment'];
$usuario = $_POST['responsavel'];
$id_ticket = $_POST['id_chamado'];
$sql = "INSERT INTO tb_comentario (responsavel, comentario, referencia) values (".$usuario.", '".$texto."', '".$id_ticket."')";
if(isset($texto)){
    $conn->query($sql);
    echo json_encode('Comentário adicionado com sucesso!');
}else{
    echo json_encode(['message' => 'Nenhum valor recebido!']);
}
// header('Location: ticket.php?id_chamado='.$_POST['id_chamado']);


?>