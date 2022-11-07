<?php
require_once '../db.php';
$sql = '
UPDATE tb_chamados 
SET resumo      = "' . $_POST['resumo'] . '", 
tipo_chamado    = '  . $_POST['selecionaTipo'] . ' , 
status          = '  . $_POST['statusTicket'] . ' , 
responsavel     = '  . $_POST['responsavelTicket'] . ' 
WHERE id        = '  . $_POST['idChamado'] . ';';
$conn->query($sql);
header('Location: ../ticket/ticket.php?id_chamado='.$_POST['idChamado'].'');
