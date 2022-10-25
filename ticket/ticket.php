<?php
session_start();
if (!isset($_SESSION['userID'])) {
  header("Location: ../index.php");
}
require_once '../db.php';

$id_chamado = $_GET['id_chamado'];
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
  WHERE c.id = ' . $id_chamado . ';
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
  <link rel="stylesheet" href="ticket.css">
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
        echo 'Solicitante: <div>' . $array['envolvido'] . '</div><br>';
        echo 'Organização: <div>' . $array['cliente'] . '</div><br>';
        ?>
      </h6>
    </div>
  </div>

  <textarea class="form-control" name="sendEmail" id="sendEmail"></textarea>
</div>

<div class="overflow-scroll" id="bodyContent">
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    <input type="text" readonly class="form-control" value="<?php echo $array['envolvido'] ?>">
  </div>
  <div class="input-group mb3">
  <select name="" class="form-control" id="responsável">
    <option value="1">Coordenador Suporte</option>
    <option value="2">Paulo</option>
    <option value="3">Artur</option>
    <option value="4">Gustavo</option>
  </select>
  </div>
  <div class="input-group mb3">
    <select class="form-control" name="" id="">
      <option value="0">STATUS DO TICKET</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>  
    </select>
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>
  <div class="input-group mb3">
    
  </div>

</div>


</body>

</html>