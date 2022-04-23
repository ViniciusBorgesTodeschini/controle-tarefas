<?php
    include('../../conexao.php');

    $nome         = $_POST['nome'];
    $tipo         = 'pf';
    $empregador   = $_POST['id_pj']; 
    $departamento = $_POST['departamento']; 
    $documento    = $_POST['documento'];
    $endereco     = $_POST['endereco'];
    $telefone     = $_POST['telefone'];
    $email        = $_POST['email'];
    $status       = @$_POST['status'] == 'on'? 'A' : 'I';
    $cliente      = 'N';
    $mensagemErro = "";

    $sql = "INSERT INTO pessoa VALUES(null,'{$nome}','{$tipo}','{$documento}','{$endereco}','{$telefone}','{$email}','{$status}','{$cliente}');";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/pessoa-listar.php?ok=1');
    } else {
        $mensagemErro = "Não foi possível cadastrar a pessoa! Erro: " . mysqli_error($conexao) . ". ";
        header('Location: ../../views/pessoa-listar.php?msg=' . $mensagemErro);
    }
    
    $sqlPessoa = "SELECT pessoa.id FROM pessoa WHERE documento = '{$documento}'";
    $queryPessoa = mysqli_query($conexao, $sqlPessoa);
    if(!$queryPessoa) {
        echo mysqli_error($conexao);
    } else {        
        while ($item = mysqli_fetch_array($queryPessoa, MYSQLI_ASSOC)) {
            $id_pf = $item['id'];
        }

        $pj_pf = "INSERT INTO pj_pf(id,id_pj,id_pf) VALUES(null,'{$empregador}','{$id_pf}')";

        $queryVinculo = mysqli_query($conexao,$pj_pf);
        if($queryVinculo){
            header('Location: ../../views/pessoa-listar.php?ok=1');
        } else {
            $mensagemErro = "Não foi possível vincular a pessoa com o empregador! Erro: " . mysqli_error($conexao) . ". ";
            header('Location: ../../views/pessoa-listar.php?msg=' . $mensagemErro);
        }

        $sqlDepartamento = "INSERT INTO pessoa_departamento(id,id_pessoa,id_dpto) VALUES (null,'{$id_pf}','{$departamento}')";
        $queryDepartamento = mysqli_query($conexao,$sqlDepartamento);
        if($queryDepartamento){
            header('Location: ../../views/pessoa-listar.php?ok=1');
        } else {
            $mensagemErro = "Não foi possível vincular a pessoa a um departamento! Erro: " . mysqli_error($conexao) . ". ";
            header('Location: ../../views/pessoa-listar.php?msg=' . $mensagemErro);
        };
    }

    mysqli_close($conexao);
?>