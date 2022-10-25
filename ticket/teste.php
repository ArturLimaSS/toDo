<?php 

require_once '../db.php';


$texto = $_POST['default'];
$sql = 'INSERT INTO tb_comentario (comentario) values ("'.$texto.'")';
if($texto){
    $conn->query($sql);
}
header('Location: ticket.php');

?>