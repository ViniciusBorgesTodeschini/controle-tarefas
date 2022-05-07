<?php
    include('../../conexao.php');

    date_default_timezone_set('America/Sao_Paulo');

    $nome      = $_POST['nome'];
    $id_pessoa = $_POST['id_pessoa'];
    $email     = $_POST['email'];
    $senha     = md5($_POST['senha']);
    $dataCadastro = date('Y-m-d H:i:s', time());
    $status    = 'A';

    $sql = "SELECT pessoa.tipo 
            FROM pessoa
            WHERE pessoa.id = '{$id_pessoa}'";

    $query = mysqli_query($conexao, $sql);
    $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if($item['tipo'] == 'pj') {
        $tipo = 'A'; //tipo Administrador
    } else {  
        $tipo = 'N'; //tipo Normal
    }

    $sql = "INSERT INTO usuario(id,nome_usuario,id_pessoa,email,senha,data_cadastro,tipo,status) 
                   VALUES(null,'{$nome}','{$id_pessoa}','{$email}','{$senha}','{$dataCadastro}','{$tipo}','{$status}');";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/usuario-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível cadastrar o usuário!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/usuario-listar.php?msg=' . $mensagemErro);
    }    

    mysqli_close($conexao);
?>