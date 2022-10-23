<?php 

$host = 'localhost';
$pass = '2609';
$user = 'root';
$db   = 'todo';

$conn = new mysqli($host, $user, $pass, $db);
if($conn -> connect_errno){
    echo "Falha na conexão". $conn -> connect_error;
}

$email = isset($_POST['email']) ? trim(addslashes($_POST['email'])) : FALSE;
$senha = isset($_POST['senha']) ? md5(addslashes($_POST['senha'])) : FALSE;

$sql = $conn ->query('SELECT * FROM tb_usuario WHERE email = "'.$email.'" AND senha = "'.$senha.'";');

if(!$sql->num_rows >0){
    header('Location: index.php');
}else{
    $arrow = $sql->fetch_assoc();
    session_start();
    $_SESSION['username'] = $arrow['nome'];
    $_SESSION['userID']   = $arrow['id'];
    echo $_SESSION['userID'] . '<br>';
    echo $_SESSION['username'];
    header("Location: cards/cards.php");
}

?>