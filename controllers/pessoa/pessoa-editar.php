<?php
    include('../../conexao.php');

    $id           = $_POST['id'];
    $nome         = $_POST['nome'];
    $documento    = $_POST['documento'];
    $empregador   = $_POST['id_pj'];
    $departamento = $_POST['departamento'];
    $endereco     = $_POST['endereco'];
    $telefone     = $_POST['telefone'];
    $email        = $_POST['email'];
    $status       = @$_POST['status'] == 'on'? 'A' : 'I';
    $mensagemErro = "";

    $sql = "UPDATE pessoa SET nome = '{$nome}', documento = '{$documento}', endereco = '{$endereco}', 
                                   telefone = '{$telefone}', email = '{$email}', status ='{$status}'
                               WHERE id = '{$id}';";

    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/pessoa-listar.php?ok=1');
    } else {
        $mensagemErro = "Não foi possível alterar a pessoa! Erro: " . mysqli_error($conexao) . ". ";
        header('Location: ../../views/pessoa-listar.php?msg=' . $mensagemErro);
    }
    
    $sqlVinculoEmpregador = "UPDATE pj_pf SET id_pj = '{$empregador}' WHERE id_pf = '{$id}';";
    $queryVinculoEmpregador = mysqli_query($conexao,$sqlVinculoEmpregador);
    if($queryVinculoEmpregador){
        header('Location: ../../views/pessoa-listar.php?ok=1');
    } else {
        $mensagemErro = "Não foi possível alterar o vinculo com empregador! Erro: " . mysqli_error($conexao) . ". ";
        header('Location: ../../views/pessoa-listar.php?msg=' . $mensagemErro);
    }

    $sqlVinculoDepartamento = "UPDATE pessoa_departamento SET id_dpto = '{$departamento}' WHERE id_pessoa = '{$id}';";
    $queryVinculoDepartamento = mysqli_query($conexao,$sqlVinculoDepartamento);
    if($queryVinculoDepartamento){
        header('Location: ../../views/pessoa-listar.php?ok=1');
    } else {
        $mensagemErro = "Não foi possível alterar o vinculo com departamento! Erro: " . mysqli_error($conexao) . ". ";
        header('Location: ../../views/pessoa-listar.php?msg=' . $mensagemErro);
    }    

    mysqli_close($conexao);
?>