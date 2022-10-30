<?php 

require_once '../db.php';

$selectCliente = $conn->query('SELECT * FROM tb_envolvido WHERE cliente = '.$_POST['idCliente'].'');
if($selectCliente){
    echo json_encode($selectCliente->fetch_all(MYSQLI_ASSOC));
}else{
    echo json_encode(['message' => 'Nenhum dado encontrado']);
}


?>