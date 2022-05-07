<?php
    include('../../conexao.php');

    date_default_timezone_set('America/Sao_Paulo');

    $id        = $_POST['id'];
    $nome      = $_POST['nome'];
    $email     = $_POST['email'];
    $senha     = md5($_POST['senha']);
    $dataAtualizacao = date('Y-m-d H:i:s', time());
    $status    = @$_POST['status'] == 'on'? 'A' : 'I';

    $sql = "UPDATE usuario SET nome_usuario = '{$nome}', email = '{$email}', senha = '{$senha}', 
                               data_atualizacao = '{$dataAtualizacao}', status = '{$status}'
                         WHERE id = '{$id}';";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/usuario-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível alterar o usuário!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/usuario-listar.php?msg=' . $mensagemErro);
    }   

    mysqli_close($conexao);
?>