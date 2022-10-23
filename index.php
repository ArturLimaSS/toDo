<?php 
if(isset($_SESSION['userID'])){
    header("Location: /autentica.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toDO</title>
</head>
<body>
    <form id="loginForm"action="autentica.php" method="POST">
        <div class="inputEmail">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Digite seu E-mail">
        </div><br>
        <div class="inputSenha">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
        </div><br>
        <div>
            <input type="submit" form="loginForm">
        </div>
    </form>
</body>
</html>