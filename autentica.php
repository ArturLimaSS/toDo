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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>toDO</title>
</head>
<style>
        #card{
            box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;
            background-image: linear-gradient(to right, #00C8C8, #00A0AA);
            border-radius: 1rem
        }
    </style>
<section class="vh-100 gradient-custom" id="login">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" id="card">
                        <div class="card-body p-5 text-center" >
                        <?php echo 'Dados não encontrados ou não preenchidos!. <a href="/"><button class="btn btn-outline-light btn-lg px-5" type="submit">Voltar</button></a>';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</html>