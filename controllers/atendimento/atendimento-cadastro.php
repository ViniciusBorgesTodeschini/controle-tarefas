<?php
    include('../../conexao.php');

    $detalhes  = $_POST['detalhes'];
    $id_pessoa = $_POST['id_pessoa'];
    $id_meio_atend = $_POST['id_meio_atend'];
    $id_assunto = $_POST['id_assunto'];
    $dataInicio = $_POST['inicio'];
    $dataFim =  $_POST['fim'];

    $sql = "INSERT INTO atendimento(id,detalhes,id_pessoa,id_meio_atend,id_assunto,inicio_atend,fim_atend) 
                   VALUES(null,'{$detalhes}','{$id_pessoa}','{$id_meio_atend}','{$id_assunto}','{$dataInicio}','{$dataFim}');";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/atendimento-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível cadastrar o atendimento!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/atendimento-listar.php?msg=' . $mensagemErro);
    }   

    mysqli_close($conexao);
?>