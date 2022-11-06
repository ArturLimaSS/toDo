<?php

session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
}
require_once './db.php';
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
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.tiny.cloud/1/q720jt59xb1dil3g4csxi4kvmlpsscwd448ty95bzovcu8kj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="index.js"></script>
    <title>Document</title>
</head>

<body>
    <style>
         #navbar{
        position: sticky;
    }
    </style>
    <?php include "./navbar.php" ?><br>
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="cadastro-tab" data-toggle="tab" href="#cadastro" role="tab" aria-controls="cadastro" aria-selected="true">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Usuários</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <!-- CADASTRO DE CLIENTES -->

            <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab"><br>
                <form action="../cadastros/cliente.php" method="POST">
                    <div class="">
                        <input type="text" id="nomeCliente" name="nomeCliente" class="form-control" placeholder="Digite o nome fantasia do cliente. Ex: Do Tecnologia">
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button class="btn btn-outline-primary mr-3">Salvar</button>
                        <button class="btn btn-outline-secondary">Cancelar</button>
                    </div>
                </form>

                <form action="./cadastros/envolvido.php" method="POST">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Nome</label>
                            <input type="text" class="form-control" name="nomeEnvolvido" id="nomeEnvolvido" placeholder="Digite o nome do envolvido! Ex: Artur Lima" value="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="text" name="emailEnvolvido" id="emailEnvolvido" class="form-control" placeholder="Ex: artur@do.com.br" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Contato</label>
                            <input type="number" name="contatoEnvolvido" id="contatoEnvolvido" class="form-control" placeholder="Ex: 31999999999" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Empresa</label>
                            <select name="selectEmpresa" oninput="buscarDadosClientes()" class="form-control" id="selectEmpresa">
                                <option value="#" selected="selected">Selecione o cliente</option>
                                <?php
                                $resultado2 = $conn->query('SELECT * FROM tb_cliente ORDER BY nome');
                                while ($array2 = $resultado2->fetch_assoc()) {
                                    $select2 = '';
                                    echo '<option value="' . $array2['id'] . '"' . $select2 . '>' . $array2['nome'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>


                    <div class="py-3 pb-4 border-top border-bottom">
                        <button type="submit" class="btn btn-outline-primary mr-3">Salvar</button>
                        <button class="btn btn-outline-secondary" onclick="">Cancelar</button>
                    </div>
                </form>
            </div>


            <!-- CADASTRO DE USUÀRIOS -->

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Name</label><input type="text" class="form-control" placeholder="Digite o nome do usuário! Ex: Artur Lima" value="">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">E-mail</label><input type="text" class="form-control" placeholder="Ex: artur@do.com.br" value=""></div>
                    <div class="col-md-12"><label class="labels">Senha</label><input type="password" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><label class="labels">Confirme a senha</label><input type="password" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12">
                        <label class="labels">Equipe</label>
                        <select class="form-control" name="equipes" id="equipes">
                            <option value="">Equipe de Suporte</option>
                            <option value="">Equipe de Implantação</option>
                            <option value="">Equipe de Desenvolvimento</option>

                        </select>
                    </div>
                </div><br>


                <div class="py-3 pb-4 border-top border-bottom">
                    <button class="btn btn-outline-primary mr-3">Salvar</button>
                    <button class="btn btn-outline-secondary">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>