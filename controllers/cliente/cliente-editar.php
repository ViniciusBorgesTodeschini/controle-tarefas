<?php
    include('../../conexao.php');

    $id        = $_POST['id'];
    $nome      = $_POST['nome'];
    $tipo      = $_POST['tipo'] == 'pj'? 'pj' : 'pf';
    $documento = $_POST['documento'];
    $endereco  = $_POST['endereco'];
    $telefone  = $_POST['telefone'];
    $email     = $_POST['email'];
    $status    = @$_POST['status'] == 'on'? 'A' : 'I';

    $sql = "UPDATE pessoa SET nome = '{$nome}', tipo = '{$tipo}', documento = '{$documento}', endereco = '{$endereco}', 
                                   telefone = '{$telefone}', email = '{$email}', status ='{$status}'
                               WHERE id = '{$id}';";

    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/cliente-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível alterar o cliente!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/cliente-listar.php?msg=' . $mensagemErro);
    }     

    mysqli_close($conexao);
?>