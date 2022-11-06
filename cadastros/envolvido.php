<?php

// $nomeEnvolvido = $_POST['nomeEnvolvido'];
// $emailEnvolvido = $_POST['emailEnvolvido'];
// $contatoEnvolvido = $_POST['contatoEnvolvido'];
// $selectEmpresa = $_POST['selectEmpresa'];

// echo $nomeEnvolvido;
// echo $emailEnvolvido;
// echo $contatoEnvolvido; 
// echo $selectEmpresa;

require_once '../db.php';
 try {
        if(isset($_POST['contatoEnvolvido'])){
            $sql = 'INSERT INTO tb_envolvido (nome, email, telefone, cliente) values ("' .$_POST['nomeEnvolvido'] . '","' . $_POST['emailEnvolvido'] . '","' . $_POST['contatoEnvolvido'] . '",' . $_POST['selectEmpresa'] . ');';
            $conn->query($sql);
            header('Location: ../options.php');
        }else{
            echo "nenhum dado inserido!";
        }
} catch (Exception $e) {
    $e->getMessage();
}