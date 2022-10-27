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
c.`resumo` AS resumo,
c.`descricao` AS descricao,
e.`nome` AS envolvido,
e.`email` AS email,
e.`telefone` AS telefone,
tc.`nome` AS tipo_chamado
FROM
tb_chamados c
JOIN tb_envolvido e
  ON c.`envolvido` = e.`id`
JOIN tb_cliente cl
  ON e.`cliente` = cl.`id`
  JOIN tb_tipo_chamado tc 
  ON c.`tipo_chamado` = tc.`id`
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

<div class="conteudo">
  <div class="card" id="card-dados">
    <div class="card-body">
      <h6>
        <?php
        echo 'SD-' . $array['id_chamado'] . '<br>';
        echo $array['envolvido'] . '<br>';
        echo  $array['email'] . '<br>';
        echo  $array['telefone'] . '<br>';
        echo  $array['cliente'] . '<br>';
        ?>
      </h6>
    </div>
  </div>
  <div class="col-md-8" id="inputAndComment" style="overflow-y: scroll;">
    <div class="alert alert-danger" style="display: none;" id="alertDanger">
    </div>
    <button class="btn btn-link" onclick="mostrarTextArea()">Adicionar comentário</button>
    <form id="textForm" style="display: none;">
      <input type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $_GET['id_chamado']; ?>">
      <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['userID']; ?>">
      <button class="form-control" form="textForm" value='<?php $_GET['id_chamado'] ?>' type="submit">Enviar</button>
      <textarea id="default" name="default"></textarea>
    </form>
    <div class="box_comment" >
    </div>
  </div>
</div>

<div class="overflow-scroll" id="bodyContent">
  <form action="" method="POST">
    <div class="card-body">
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Dados do ticket</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="mudarStatusTicket">Alterar status do Ticket</label>
            <select class="form-control" name="mudarStatusTicket" id="mudarStatusTicket">
              <option value="1">Em atendimento</option>
              <option value="2"></option>
              <option value="3"></option>
              <option value="4"></option>
            </select>
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter phone number">
            <label for="data_nasc">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nasc" id="data_nasc" value="'. $data.'">
            <label for="foto">Foto</label>
            <input type="text" class="form-control" id="foto" name="foto" value="'.$foto.'">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

</body>

</html>

<!-- 
PRECISAMOS ADICIONAR CAMPO PARA INSERIR EMAILS, E CAMPOS PARA BUSCAR E-MAILS. 
CRIAR BARRA DE STATUS DO TICKET
25/10/2022 -> verificar o motivo de não reconhecer id pelo GET

 -->