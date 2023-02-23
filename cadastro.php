<?php
    require_once './db.php';
    $resumo    = $_POST['resumo'];
    $empresa   = $_POST['selectEmpresa'];
    $envolvido = $_POST['selectEnvolvido'];
    $selectTipo    = $_POST['selectTipo'];
    $responsavel   = $_POST['idUsuario'];
    $urgencia = $_POST['selecionaUrgencianav'];

    $sql = 'INSERT INTO tb_chamados (envolvido, resumo, tipo_chamado, STATUS, responsavel, urgencia) VALUES ('.$envolvido.',"'.$resumo.'",'.$selectTipo.',1,'.$responsavel.', '.$urgencia.');';
    if($sql){
        $conn->query($sql);
        header('Location: ./ticket/ticket.php?id_chamado='.mysqli_insert_id($conn).'');
    }
?>