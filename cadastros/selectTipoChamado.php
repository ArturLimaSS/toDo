<?php 
require_once '../db.php';


$id_tipo = $_POST['id_tipo'];
if(isset($id_tipo)){
    $resultado5 = $conn->query('SELECT * FROM tb_tipo_chamado WHERE id = '.$id_tipo.';');
    echo json_encode($resultado5->fetch_all(MYSQLI_ASSOC));
}else{
    echo json_encode("Não tem");
}

?>