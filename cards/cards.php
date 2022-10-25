<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
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
    <link rel="stylesheet" href="cards.css">
    <script src="cards.js"></script>
    <title>Document</title>
</head>

<body>

</body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="/assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        DO
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Tarefas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Arquivo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
        </ul>
        <div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <span class="navbar-text">
            <div class="dropdown">
                <button class="btn btn-outline dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Seja bem vindo <?php echo $_SESSION['username']; ?>!
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Opções do Usuário</a>
                    <a class="dropdown-item" href="#">Ajuda</a>
                    <a class="dropdown-item" href="../logout.php">Sair</a>
                </div>

            </div>
        </span>
    </div>
</nav>
<main class="content">
    <div class="" style="margin-left: 10%">
        <h1 class="h3 mb-3">Tarefas</h1>
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card card-border-primary">
                    <div class="card-header">
                        <h5 class="card-title">Em atendimento</h5>
                        <h6 class="card-subtitle text-muted">Tickets dentro do prazo</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="">
                            <div class="atendimento-cards"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card card-border-primary" style="background-color: yellow;">
                    <div class="card-header" id="ticketEmVencimento">
                        <h5 class="card-title">Em atendimento</h5>
                        <h6 class="card-subtitle text-muted" id="ticketsV">Tickets próximos ao vencimento</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="">
                            <div class="atendimento-cards"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card card-border-primary" style="background-color: red;">
                    <div class="card-header" id="ticketsVencidos">
                        <h5 class="card-title">Vencidos!</h5>
                        <h6 class="card-subtitle" id="ticketsV">Tickets vencidos</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="">
                            <div class="atendimento-cards"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

</html>

</div>

<!-- 
TELA INICIAL - 
NAVBAR
BOTÃO DE HOME E LOGOUT

BOTÃO DE CADASTRO
BOTÃO DE PESQUISA
BOTÃO DE EDIÇÃO
BOTÃO DE ARQUIVO

LISTAGEM DE CARDS OU ATALHOS PARA OUTRAS FUNCIONALIDADES

 -->
