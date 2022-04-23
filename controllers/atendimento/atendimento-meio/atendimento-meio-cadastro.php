<?php
    include('../../../conexao.php');

    $nome = $_POST['nome'];

    $sql = "INSERT INTO atendimento_meio VALUES(null,'{$nome}');";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../../views/atendimento-meio-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível cadastrar o meio de atendimento!. Erro: " . mysqli_error($conexao);
        header('Location: ../../../views/atendimento-meio-listar.php?msg=' . $mensagemErro);
    }   

    mysqli_close($conexao);
?>