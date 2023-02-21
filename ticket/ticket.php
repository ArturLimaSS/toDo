<?php

use Discord\Parts\Embed\Embed;

$id_chamado = intval($_GET['id_chamado']);

session_start();
if (!isset($_SESSION['userID'])) {
  header("Location: ../index.php");
}

require_once '../db.php';
$sql = $conn->query('SELECT
c.`id` AS id_chamado,
cl.`nome` AS cliente,
cl.id AS idCliente,
c.`resumo` AS resumo,
c.`descricao` AS descricao,
e.id as idEnvolvido,
e.`nome` AS envolvido,
e.`email` AS email,
e.`telefone` AS telefone,
tc.`nome` AS tipo_chamado,
s.descricao as status_ticket,
c.status AS id_status,
c.tipo_chamado AS id_tipo_chamado,
c.responsavel AS responsavel_ticket
FROM
tb_chamados c
JOIN tb_envolvido e
  ON c.`envolvido` = e.`id`
JOIN tb_cliente cl
  ON e.`cliente` = cl.`id`
JOIN tb_tipo_chamado tc 
  ON c.`tipo_chamado` = tc.`id`
JOIN tb_status s
  ON s.id = c.status 
WHERE c.id = ' . intval($_GET['id_chamado']) . ';
');

$array = $sql->fetch_assoc();

$assinatura = '<br><br><br><br><br><p>Atenciosamente,<br><br>' . $_SESSION['username'] . '<br>CEO';

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
  <link rel="stylesheet" href="ticket.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.js" integrity="sha512-kwtW9vT4XIHyDa+WPb1m64Gpe1jCeLQLorYW1tzT5OL2l/5Q7N0hBib/UNH+HFVjWgGzEIfLJt0d8sZTNZYY6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="ticket.js"></script>
  <title>Document</title>

  <script>

  </script>

</head>

<?php
include_once '../assets/load.php';
include '../navbar.php';

?>

<input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado'];  ?>" onload="enviaId()">
<input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado'];  ?>" onload="enviaId2()">
<div class="conteudo">
  <div class="col-md-3" id="bodyContent" style="transform: none !important;">
    <div class="card" id="card-dados">
      <div class="card-header" id="header_card_dados">
        <?php echo 'SD-' . $array['id_chamado'] . ' - ' . $array['resumo'] . '<br>'; ?>
      </div>
      <div class="card-body">
        <form id="ticketForm" action="../updates/update_ticket.php" method="POST">
          <input type="hidden" value="<?= $array['id_chamado'] ?>" name="idChamado" id="idChamado">
          <div>
            <div>
              <div class="">
                <p class="form-control" style="border: none; text-align: left;">
                  <strong>Solicitante:</strong> <?= $array['envolvido'] ?>
                </p>
                <p class="form-control" style="border: none; text-align: left;">
                  <strong>Email:</strong> <?= $array['email'] ?>
                </p>
                <p class="form-control" style="border: none; text-align: left;">
                  <strong>Telefone:</strong>
                  <span id="telefone"><?= $array['telefone'] ?></span>
                </p>
                <p class="form-control" style="border: none; text-align: left;">
                  <strong>Empresa:</strong> <?= $array['cliente'] ?>
                </p>
                <p class="form-control" style="border: none; text-align: left;">
                <strong>Resumo:</strong><input id="resumo" name="resumo" class="form-control" style="border: none;" value="<?= $array['resumo'] ?>">
                </p>
              </div>
              <br>
              <div class="mb-3">
                <label for="selecionaTipo" class="form-label"><strong>Tipo:</strong></label>
                <select name="selecionaTipo" oninput="selectTipo()" class="form-control" style="" id="selecionaTipo">
                  <?php foreach ($conn->query('SELECT * FROM tb_tipo_chamado') as $tipo) { ?>
                    <option value="<?= $tipo['id'] ?>" <?= ($array['id_tipo_chamado'] == $tipo['id']) ? 'selected' : '' ?>>
                      <?= $tipo['nome'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div><br>

              <div class="mb-3">
                <label for="tituloUrgencia" class="form-label"><strong>Urgência / Prazo:</strong></label>
                <div id="tituloUrgencia"></div>
              </div>

              <div class="mb-3">
                <label for="responsavelTicket" class="form-label"><strong>Responsável:</strong></label>
                <select class="form-control" style=";" name="responsavelTicket" id="responsavelTicket">
                  <?php foreach ($conn->query('SELECT * FROM tb_usuario') as $usuario) { ?>
                    <option value="<?= $usuario['id'] ?>" <?= ($array['responsavel_ticket'] == $usuario['id']) ? 'selected' : '' ?>>
                      <?= $usuario['nome'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div><br>

              <div class="mb-3">
                <label for="statusTicket" class="form-label"><strong>Status:</strong></label>
                <select class="form-control" style=";" name="statusTicket" id="statusTicket">
                  <?php foreach ($conn->query('SELECT * FROM tb_status') as $status) { ?>
                    <option value="<?= $status['id'] ?>" <?= ($array['id_status'] == $status['id']) ? 'selected' : '' ?>>
                      <?= $status['descricao'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div><br>
            </div>
          </div>
          <div class="py-3 pb-4 border-top">
            <button class="btn btn-outline-primary waves-effect" id="enviarButton" type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div><br>
  </div>

  <div class="col-md-8" id="inputAndComment">
    <div class="alert alert-danger" style="display: none;" id="alertDanger">
    </div>
    <div class="alert alert-success" id="alertSuccess">
    </div>
    <button class="btn" id="mostrarTextArea" onclick="mostrarTextArea()">Adicionar comentário</button>
    <button class="btn" id="cancelaComentario" onclick="cancelaComentario()" onclick="">Cancelar</button>
    <form id="textForm" name="textForm" style="display: none; box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.1);">
      <input type="hidden" name="action" value="add_comment">
      <input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado']; ?>">
      <input type="hidden" name="assinaturaVal" id="assinaturaVal" value="<?php echo $assinatura; ?>">
      <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['userID']; ?>">
      <button class="form-control" value='<?php $_GET['id_chamado'] ?>' type="submit">Enviar</button>
      <textarea id="default" name="default"><?php echo $assinatura ?></p></textarea>
    </form>

    <section id="content">
      <div class="box_comment">
        <div class="alert  alert-light" id="nenhumComentario" role="alert">
          <hr>
          <h4 class="alert-heading">Nenhum comentário adicionado!</h4>
          <p>Utilizando o DO você comunica com a sua equipe, compartilhando dados sobre o atendimento pelos comentários</p>
          <hr>
        </div>
      </div>

    </section>
  </div>
</div>

<div class="overflow-scroll" id="bodyContent">

</div>


<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../assets/libs/mdbootstrap/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../assets/libs/mdbootstrap/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../assets/libs/mdbootstrap/js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>

</body>

</html>

<!-- 
PRECISAMOS ADICIONAR CAMPO PARA INSERIR EMAILS, E CAMPOS PARA BUSCAR E-MAILS. 
CRIAR BARRA DE STATUS DO TICKET
25/10/2022 -> verificar o motivo de não reconhecer id pelo GET
29/10/2022 -> VERIFICAR COMO REALIZAR SWITCH CASE PEGANDO PELO FORMULÁRIO. 

 -->