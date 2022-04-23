<?php
    include('../../../conexao.php');

    $nome = $_POST['nome'];
    $mensagemErro = "";

    $sql = "INSERT INTO atendimento_assunto VALUES(null,'{$nome}');";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../../views/atendimento-assunto-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível cadastrar o assunto de atendimento!. Erro: " . mysqli_error($conexao);
        header('Location: ../../../views/atendimento-assunto-listar.php?msg=' . $mensagemErro);
    }    

    mysqli_close($conexao);
?>