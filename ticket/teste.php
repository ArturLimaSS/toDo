<?php 

require_once '../db.php';
header('Content-type: application/json');


$texto = $_POST['comment'];
$usuario = $_POST['responsavel'];
$sql = "INSERT INTO tb_comentario (responsavel, comentario) values (".$usuario.", '".$texto."')";
if(isset($texto)){
    $conn->query($sql);
    echo json_encode('sucess');
}else{
    echo json_encode('Nenhum valor recebido!');
}
//header('Location: ticket.php?id_chamado='.$_POST['id_chamado']);


?>