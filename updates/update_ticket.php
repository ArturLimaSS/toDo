<?php
require_once '../db.php';
$sql = '
UPDATE tb_chamados 
SET resumo      = "' . $_POST['resumo'] . '", 
tipo_chamado    = '  . $_POST['selecionaTipo'] . ' ,
urgencia        = '  . $_POST['selecionaUrgencia'] .',
status          = '  . $_POST['statusTicket'] . ' , 
responsavel     = '  . $_POST['responsavelTicket'] . ' 
WHERE id        = '  . $_POST['idChamado'] . ';';
$conn->query($sql);
if($_POST['statusTicket'] == 3){
    
    header('Location: ../cards/cards.php');
}else{
    header('Location: ../ticket/ticket.php?id_chamado='.$_POST['idChamado'].'');
}
