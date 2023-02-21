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
    <!-- MDB icon -->
    <link rel="icon" href="../assets/libs/mdbootstrap/img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/libs/mdbootstrap/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../assets/libs/mdbootstrap/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="../assets/libs/mdbootstrap/css/style.css">
    <script src="cards.js"></script>
    <title>Document</title>
</head>

<body>
    <?php include_once '../assets/load.php'; ?>
    <?php include_once '../navbar.php' ?>

    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_8edlac32.json" id="animation" style="display: none;" mode="bounce" background="transparent" speed="1" style="width: 600px; height: 600px;"></lottie-player>
    <div class="conteudo" style="display: block; transition: 'opacity 2s ease-in';">
        <section class="content">
            <div class="row" style="margin-right: none !important; margin-left: none !important ;">
                <div class="col-md-3">
                    <div class="grid support">
                        <div class="grid-body">
                            <h2>Resumo</h2>
                            <hr>
                            <ul>
                                <li class="active"><a href="#">Todos os tickets<span class="pull-right">142</span></a>
                                </li>
                                <li><a href="#">Meus Tickets<span class="pull-right">52</span></a></li>
                                <li><a href="#">Criados por mim<span class="pull-right">18</span></a></li>
                                <h1 id="tiposChamado"></h1>
                            </ul>
                            <hr>
                            <p><strong>Indicador</strong></p>
                            <ul class="support-label">
                                <li><span class="bg-black">&nbsp;</span>&nbsp;&nbsp;&nbsp;Urgente <span class="float-right" id="indicador_urgente"></span></li>
                                <li><span class="bg-red">&nbsp;</span>&nbsp;&nbsp;&nbsp;Alta <span class="float-right" id="indicador_alta1"></span></a></li>
                                <li><span class="bg-yellow">&nbsp;</span>&nbsp;&nbsp;&nbsp;Alta <span class="float-right" id="indicador_alta2"></span></li>
                                <li><span class="bg-yellow">&nbsp;</span>&nbsp;&nbsp;&nbsp;Media <span class="float-right" id="indicador_media"></span></li>
                                <li><span class="bg-blue">&nbsp;</span>&nbsp;&nbsp;&nbsp;Baixa <span class="float-right" id="indicador_baixa"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="grid support-content">
                        <div class="grid-body">
                            <h2>Chamados</h2>
                            <hr>
                            <div class="btn-group">
                                <button type="button" id="emAtendimentoEquipe" class="btn btn-default"></button>
                                <button type="button" class="btn btn-default">95,721 Closed</button>
                            </div>
                            <div class="padding"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-group fa-padding" id="tabelaConteudo">
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- <div class="col-md-12">
            <main>
                <div class="card-body" id="bodyCard">
                    <div class="atendimento-cards">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col" id="listCard">
                                        <h6 id="emAtendimentoEquipe"></h6>
                                        <div class="card-body" id="tabela-card">
                                            <div class="row">
                                                <div class="col">
                                                    <div style="box-shadow: rgba(0, 0, 0, 0.4) 0px 0px 1px;">

                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr class="table" style='position: sticky; top: -1px;box-shadow: rgba(0, 0, 0, 0.4) 0px 0px 1px; '>
                                                                    <th>ID</th>
                                                                    <th>Cliente</th>
                                                                    <th>Solicitante</th>
                                                                    <th>Resumo</th>
                                                                    <th>Responsável</th>
                                                                    <th>Cadastro</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tabelaConteudo"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div> -->
    </div>

</body>

<script type="text/javascript" src="../assets/libs/mdbootstrap/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../assets/libs/mdbootstrap/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../assets/libs/mdbootstrap/js/mdb.min.js"></script>

</html>

</div>