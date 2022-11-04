<?php

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
c.status AS id_status
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
  <link rel="stylesheet" href="ticket.css">
  <script src="ticket.js"></script>
  <title>Document</title>
</head>

<?php
include '../navbar.php';
?>
<input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado'];  ?>" onload="enviaId()">
<div class="conteudo">
  <div class="col-md-4" id="bodyContent" style="transform: none !important;">
    <div class="card" id="card-dados">
      <div class="card-header">
        <?php echo 'SD-' . $array['id_chamado'] . ' - ' . $array['resumo'] . '<br>'; ?>
      </div>
      <div class="card-body">
        <h6>
          <?php
          echo $array['envolvido'] . '<br>';
          echo  $array['email'] . '<br>';
          echo  $array['telefone'] . '<br>';
          echo  $array['cliente'] . '<br>';
          echo $array['status_ticket']
          ?>
        </h6>
      </div>
    </div>
  </div>

  <div class="col-md-8" id="inputAndComment">
    <div class="alert alert-danger" style="display: none;" id="alertDanger">
    </div>
    <button class="btn btn-link" onclick="mostrarTextArea()">Adicionar comentário</button>
    <form id="textForm" name="textForm" style="display: none;">
      <input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado']; ?>">
      <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['userID']; ?>">
      <button class="form-control" value='<?php $_GET['id_chamado'] ?>' type="submit">Enviar</button>
      <textarea id="default" name="default"></textarea>
    </form>
    <h3 id="nenhumComentario" class="text-muted">Nenhum comentário adicionado</h3>
    <section id="content">
      <div class="box_comment">
      </div>

    </section>
  </div>
</div>

<div class="overflow-scroll" id="bodyContent">

</div>

</body>

</html>

<!-- 
PRECISAMOS ADICIONAR CAMPO PARA INSERIR EMAILS, E CAMPOS PARA BUSCAR E-MAILS. 
CRIAR BARRA DE STATUS DO TICKET
25/10/2022 -> verificar o motivo de não reconhecer id pelo GET
29/10/2022 -> VERIFICAR COMO REALIZAR SWITCH CASE PEGANDO PELO FORMULÁRIO. 

 -->