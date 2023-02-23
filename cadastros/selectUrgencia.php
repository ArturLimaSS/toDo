<?php 
require_once '../db.php';


$id_tipo = $_POST['id_urgencia'];
if(isset($id_tipo)){
    $resultado6 = $conn->query('SELECT * FROM tb_urgencia WHERE id = '.$id_tipo.';');
    echo json_encode($resultado6->fetch_all(MYSQLI_ASSOC));
}else{
    echo json_encode("Não tem");
}

?>