
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>Document</title>
</head>
<body>
<nav id="navbar" class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand" href="#" style="width: 12%; margin-left: 65px;">
    <img src="/assets/img/zyro-image.png" width="25%" class="d-inline-block align-top" alt="">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link"  href="../cards/cards.php">Tarefas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="#">Arquivado</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="#"></a>
            </li>
        </ul>
        <div>
            <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal" style="height: 10%; width: 10%; border: none; margin-left: 60%;"><img src="../assets/img/plus.png" width="100%" srcset=""></button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar atendimento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="alteraDadosTicket" name="alteraDadosTicket" action="../cadastro.php" method="POST">
                            <div class="modal-body">
                                <div>
                                    <div class="form-group">
                                        <div>
                                            <label for="resumo" class="form-label">Resumo</label>
                                            <input class="form-control" type="text" id="resumo" name="resumo">
                                        </div>
                                        <div>
                                            <label for="selectEmpresa">Construtora / Incorporadora</label>
                                            <select data-live-search="true" name="selectEmpresa" oninput="buscarDadosClientes()" class="form-control" id="selectEmpresa">
                                                <option value="#" selected="selected">Selecione o cliente</option>
                                                <?php
                                                $resultado2 = $conn->query('SELECT * FROM tb_cliente ORDER BY nome');
                                                while ($array2 = $resultado2->fetch_assoc()) {
                                                    $select2 = '';

                                                    echo '<option value="' . $array2['id'] . '"' . $select2 . '>' . $array2['nome'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <label for="selectEnvolvido">Solicitante</label>
                                            <select data-live-search="true" name="selectEnvolvido" class="form-control" id="selectEnvolvido">
                                                <option value="#" selected="selected">Solicitante</option>
                                            </select>
                                            <label for="selectTipo" class="form-label">Tipo</label>
                                            <select data-live-search="true" name="selectTipo" class="form-control" id="selectTipo">
                                                <option value="#" selected="selected">Selecione o tipo</option>
                                                <?php
                                                $resultado3 = $conn->query('SELECT * FROM tb_tipo_chamado');
                                                while ($array3 = $resultado3->fetch_assoc()) {
                                                    $select2 = '';

                                                    echo '<option value="' . $array3['id'] . '"' . $select2 . '>' . $array3['nome'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['userID']?>">                 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <span class="navbar-text">
            <div class="dropdown">
                <button class="btn btn-outline dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Seja bem vindo <?php echo $_SESSION['username']; ?>!
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../options.php">Opções</a>
                    <a class="dropdown-item" href="#">Ajuda</a>
                    <a class="dropdown-item" href="../logout.php">Sair</a>
                </div>
            </div>
        </span>
    </div>
</nav>
</body>
</html>

