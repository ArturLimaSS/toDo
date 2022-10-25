<?php 
require_once '../db.php';

$sql = 'SELECT * FROM tb_comentario';
$pesquisar = $conn->query($sql);
if($pesquisar->num_rows > 0){
    echo json_encode($pesquisar->fetch_all(MYSQLI_ASSOC));
}else{
    echo json_encode('Nenhum dado encontrado');
}
?>