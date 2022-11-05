<?php

require_once '../db.php';
$nomeEnvolvido = $_POST['nomeEnvolvido'];
$emailEnvolvido = $_POST['emailEnvolvido'];
$contatoEnvolvido = $_POST['contatoEnvolvido'];
$selectEmpresa = $_POST['selectEmpresa'];

$sql = 'INSERT INTO tb_envolvido (nome, email, telefone, cliente) values ("' . $nomeEnvolvido . '","' . $emailEnvolvido . '","' . $contatoEnvolvido . '",' . $selectEmpresa . ')';
try {

        $conn->query($sql);
        header('Location: ../cards/cards.php');

} catch (Exception $e) {
    $e->getMessage();
}
