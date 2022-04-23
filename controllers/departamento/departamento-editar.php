<?php
    include('../../conexao.php');

    $id   = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE departamento SET nome = '{$nome}' WHERE id ='{$id}'";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/departamento-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível alterar o departamento!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/departamento-listar.php?msg=' . $mensagemErro);
    }  

    mysqli_close($conexao);
?>