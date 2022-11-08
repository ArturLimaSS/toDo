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

<?php include_once '../assets/load.php';?>

<input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado'];  ?>" onload="enviaId()">
<div class="conteudo">
  <div class="col-md-4" id="bodyContent" style="transform: none !important;">
    <div class="card" id="card-dados">
      <div class="card-header">
        <?php echo 'SD-' . $array['id_chamado'] . ' - ' . $array['resumo'] . '<br>'; ?>
      </div>
      <div class="card-body">
        <form id="ticketForm" action="../updates/update_ticket.php" method="POST">
          <input type="hidden" value="<?php echo $array['id_chamado']?>" name="idChamado" id="idChamado">
          <label for="" class="form-label">Envolvido</label>
          <p id="envolvidoP" class="form-control"><?php echo $array['envolvido'] ?></p>

          <label for="" class="form-label">Email</label>
          <p id='emailP' class="form-control"><?php echo  $array['email'] ?></p>

          <label for="" class="form-label">Telefone</label>
          <p id="telefoneP" class="form-control"><?php echo  $array['telefone'] ?></p>

          <label for="" class="form-label">Empresa</label>
          <p id="clienteP" class="form-control"><?php echo  $array['cliente'] ?></p>

          <label for="" class="form-label">Resumo</label>
          <input id="resumo" name="resumo" class="form-control" value="<?php echo $array['resumo'] ?>"></input>

          <label for="selectTipo" class="form-label">Tipo</label>
          <select name="selecionaTipo" oninput="selectTipo()" class="form-control" id="selecionaTipo">
            <?php
            $resultado4 = $conn->query('SELECT * FROM tb_tipo_chamado');
            while ($array4 = $resultado4->fetch_assoc()) {
              if ($array['id_tipo_chamado'] == $array4['id']) {
                $select3 = 'selected="selected"';
              } else {
                $select3 = '';
              }
              echo '<option ' . $select3 . ' value="' . $array4['id'] . '">' . $array4['nome'] . '</option>';
            }
            ?>
          </select><br>

          <label for="tituloUrgencia" class="form-label">Urgência / Prazo</label>
          <div id="tituloUrgencia"></div>

          <label for="responsavelTicket" class="form-label">Responsável</label>
          <select class="form-control" name="responsavelTicket" id="responsavelTicket">
            <?php
            $resultado5 = $conn->query('SELECT * FROM tb_usuario');
            while ($array5 = $resultado5->fetch_assoc()) {
              if ($array['responsavel_ticket'] == $array5['id']) {
                $select5 = 'selected="selected"';
              } else {
                $select5 = '';
              }
              echo '<option ' . $select5 . ' value="' . $array5['id'] . '">' . $array5['nome'] . '</option>';
            }
            ?>
          </select><br>

          <label for="statusTicket" class="form-label">Status</label>
          <select class="form-control" name="statusTicket" id="statusTicket">
            <?php
            $resultado6 = $conn->query('SELECT * FROM tb_status');
            while ($array6 = $resultado6->fetch_assoc()) {
              if ($array['id_status'] == $array6['id']) {
                $select6 = 'selected="selected"';
              } else {
                $select6 = '';
              }
              echo '<option ' . $select6 . ' value="' . $array6['id'] . '">' . $array6['descricao'] . '</option>';
            }
            ?>
          </select><br>
          <div class="py-3 pb-4 border-top">
            <button class="btn btn-outline-primary" id="enviarButton" type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div><br>
  </div>

  <div class="col-md-8" id="inputAndComment">
    <div class="alert alert-danger" style="display: none;" id="alertDanger">
    </div>
    <button class="btn btn-link" onclick="mostrarTextArea()">Adicionar comentário</button>
    <form id="textForm" name="textForm" style="display: none;">
      <input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado']; ?>">
      <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['userID']; ?>">
      <button class="form-control" value='<?php $_GET['id_chamado'] ?>' type="submit">Enviar</button>
      <textarea id="default" name="default"><br><br><br><br><br><p>Atenciosamente,<br><br><?php echo $_SESSION['username']?><br>Suporte Dommus</p></textarea>
    </form>
    
    <section id="content">
      <div class="box_comment">
      <h3 id="nenhumComentario" class="text-muted">Nenhum comentário adicionado</h3>
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