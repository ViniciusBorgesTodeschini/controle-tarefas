<?php
    include('../../conexao.php');

    $nome      = $_POST['nome'];
    $tipo      = $_POST['tipo'] == 'pj'? 'pj' : 'pf';
    $documento = $_POST['documento'];
    $endereco  = $_POST['endereco'];
    $telefone  = $_POST['telefone'];
    $email     = $_POST['email'];
    $status    = @$_POST['status'] == 'on'? 'A' : 'I';
    $cliente   = 'S';

    $sql = "INSERT INTO pessoa VALUES(null,'{$nome}','{$tipo}','{$documento}','{$endereco}','{$telefone}','{$email}','{$status}',
    '{$cliente}');";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/cliente-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível cadastrar o cliente!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/cliente-listar.php?msg=' . $mensagemErro);
    }   

    mysqli_close($conexao);
?>