<?php
    include('../../conexao.php');

    $nome = $_POST['nome'];

    $sql = "INSERT INTO departamento VALUES(null,'{$nome}');";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/departamento-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível cadastrar o departamento!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/departamento-listar.php?msg=' . $mensagemErro);
    }    

    mysqli_close($conexao);
?>