<?php 

$host = 'localhost';
$pass = '2609';
$user = 'root';
$db   = 'todo';

$conn = new mysqli($host, $user, $pass, $db);
if($conn -> connect_errno){
    echo "Falha na conexão". $conn -> connect_error;
}



$selectStatus = $conn->query('SELECT id, descricao FROM tb_status;');

$selectEnvolvido = $conn->query('SELECT * FROM tb_usuario');

?>