<?php
    include('../../../conexao.php');

    $id   = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE atendimento_assunto SET nome = '{$nome}' WHERE id ='{$id}'";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../../views/atendimento-assunto-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível alterar o assunto de atendimento!. Erro: " . mysqli_error($conexao);
        header('Location: ../../../views/atendimento-assunto-listar.php?msg=' . $mensagemErro);
    } 

    mysqli_close($conexao);
?>