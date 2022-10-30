
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
            <li class="nav-item">
                <a class="nav-link" href="../cards/cards.php">Tarefas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Arquivo</a>
            </li>
            <li class="nav-item">
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
                        <div class="modal-body">
                            <label for="resumo" class="form-label">Resumo</label>
                            <input id="resumo" name="resumo" type="text" placeholder="Digite o resumo ou título" class="form-control"><br>
                            <label for="inputEmailCadastro">Email</label>
                            <input type="email" id="inputEmailCadastro" name="inputEmailCadastro" placeholder="Ex: josedasilva@do.com.br" class="form-control"><br>
                            <label for="inputTelefoneCadastro" class="form-label">Telefone</label>
                            <input type="number" name="inputTelefoneCadastro" id="inputTelefoneCadastro" placeholder="Ex: (31) 99999-9999" class="form-control"><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
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
                    <a class="dropdown-item" href="#">Opções do Usuário</a>
                    <a class="dropdown-item" href="#">Ajuda</a>
                    <a class="dropdown-item" href="../logout.php">Sair</a>
                </div>
            </div>
        </span>
    </div>
</nav>
<h1>