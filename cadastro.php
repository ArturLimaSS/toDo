<?php
    require_once './db.php';
    $resumo    = $_POST['resumo'];
    $empresa   = $_POST['selectEmpresa'];
    $envolvido = $_POST['selectEnvolvido'];

    $sql = 'INSERT INTO tb_chamados (envolvido, resumo, tipo_chamado, STATUS) VALUES ('.$envolvido.',"'.$resumo.'",1,1);';
    if($sql){
        $conn->query($sql);
        header('Location: ./ticket/ticket.php?id_chamado='.mysqli_insert_id($conn).'');
    }
?>