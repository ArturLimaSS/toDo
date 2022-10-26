<?php 

require_once '../db.php';
header('Content-type: application/json');


$texto = $_POST['comment'];
$usuario = $_POST['responsavel'];
$sql = 'INSERT INTO tb_comentario (comentario, responsavel) values ("'.$texto.'",'.$usuario.')';
if($texto === NULL){
    echo json_encode('Nenhum valor recebido!');
}else{
    $conn->query($sql);
    echo json_encode('sucess');
}
//header('Location: ticket.php?id_chamado='.$_POST['id_chamado']);













?>