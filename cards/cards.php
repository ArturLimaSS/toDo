<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
}


require_once '../db.php';

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
    <script src="https://kit.fontawesome.com/32e5a2bfd6.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="stylesheet" href="cards.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="cards.js"></script>
    <title>Document</title>
</head>

<body>
    <?php include_once '../assets/load.php'; ?>
    <?php include_once '../navbar.php' ?>

    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_8edlac32.json" id="animation" style="display: none;" mode="bounce" background="transparent" speed="1" style="width: 600px; height: 600px;"></lottie-player>
    <div class="conteudo" style="display: block; transition: 'opacity 2s ease-in';">
        <div class="col-md-12">
            <main>
                <div class="card-body" id="bodyCard">
                    <div class="atendimento-cards">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><i class="fa-solid fa-headphones"></i>&nbsp Meus tickets</p>
                                        <hr>
                                        <ul>
                                            <h6 class="mb-4 text-muted" onclick="showTable()">
                                                <p style="cursor: pointer;" id="emAtendimento">&nbsp Em atendimento</p>
                                            </h6>
                                            <h6 class="mb-4 text-muted" onclick="showTable()">
                                                <p style="cursor: pointer;" id="pendentes">&nbsp Pendentes</p>
                                            </h6>
                                            <h6 class="mb-4 text-muted">
                                                <p style="cursor: pointer;">&nbsp Parados</p>
                                            </h6>

                                        </ul>
                                        <hr>
                                        <p>Vencimento</p>
                                        <ul>
                                            <p id="vencidos">&nbsp Vencidos</p>
                                            <p>&nbsp Venceram hoje</p>
                                            <p>&nbsp Vencem esta semana</p>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><i class="fa-solid fa-headphones"></i>&nbsp Tickets da minha equipe</p>
                                        <hr>
                                        <ul>
                                            <h6 class="mb-4 text-muted" onclick="showTable()">
                                                <p style="cursor: pointer;" id="emAtendimentoEquipe">&nbsp Em atendimento</p>
                                            </h6>
                                            <h6 class="mb-4 text-muted" onclick="showTable()">
                                                <p style="cursor: pointer;" id="pendentes">&nbsp Pendentes</p>
                                            </h6>
                                            <h6 class="mb-4 text-muted">
                                                <p style="cursor: pointer;">&nbsp Parados</p>
                                            </h6>

                                        </ul>
                                        <hr>
                                        <p>Vencimento</p>
                                        <ul>
                                            <p id="vencidos">&nbsp Vencidos</p>
                                            <p>&nbsp Venceram hoje</p>
                                            <p>&nbsp Vencem esta semana</p>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><i class="fa-solid fa-headphones"></i>&nbsp Tickets de todos os agentes</p>
                                        <hr>
                                        <ul>
                                            <h6 class="mb-4 text-muted" onclick="showTable()">
                                                <p style="cursor: pointer;" id="emAtendimento">&nbsp Em atendimento</p>
                                            </h6>
                                            <h6 class="mb-4 text-muted" onclick="showTable()">
                                                <p style="cursor: pointer;" id="pendentes">&nbsp Pendentes</p>
                                            </h6>
                                            <h6 class="mb-4 text-muted">
                                                <p style="cursor: pointer;">&nbsp Parados</p>
                                            </h6>

                                        </ul>
                                        <hr>
                                        <p>Vencimento</p>
                                        <ul>
                                            <p id="vencidos">
                                            </p>
                                            <p>&nbsp Venceram hoje</p>
                                            <p>&nbsp Vencem esta semana</p>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="container" style="display: none; transition: 'opacity 2s ease-in'">
        <a href="#" onclick="hideTable()"><i class="fi fi-rs-angle-left"></i>&nbsp; Voltar</a>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Nº
                    </th>
                    <th>
                        Cliente
                    </th>
                    <th>
                        Resumo
                    </th>
                    <th>
                        Responsável
                    </th>
                    <th>
                        Cadastrado em 
                    </th>
                </tr>
            </thead>
            <tbody class='tabelaConteudo'>

            </tbody>
        </table>
    </div>
</body>

</html>

</div>