<?php 

    require_once '../db.php';
    $cliente = $_POST['nomeCliente'];
    $verifica = $conn->query('SELECT * FROM tb_cliente WHERE nome = "'.$cliente.'";');
    
    try {
        if($verifica->num_rows == 0){
            if(!isset($cliente)){
                echo "nenhum dado inserido!";
            }else{
                
                $sql = 'INSERT INTO tb_cliente (nome) values ("'.$cliente.'");';
                $conn->query($sql);
                header('Location: ../options.php');
            }
        }else{
            echo 'Já existe um cliente com este nome fantasia!';
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
