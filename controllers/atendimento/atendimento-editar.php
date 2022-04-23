<?php
    include('../../conexao.php');

    $id            = $_POST['id'];
    $detalhes      = $_POST['detalhes'];
    $id_pessoa     = $_POST['id_pessoa'];
    $id_meio_atend = $_POST['id_meio_atend'];
    $id_assunto    = $_POST['id_assunto'];

    $sql = "UPDATE atendimento SET detalhes = '{$detalhes}', id_pessoa = '{$id_pessoa}',
                                   id_meio_atend = '{$id_meio_atend}', id_assunto = '{$id_assunto}'
                             WHERE id = '{$id}';";
    
    $query = mysqli_query($conexao,$sql);
    if($query){
        header('Location: ../../views/atendimento-listar.php?ok=1');
    } else {
        $mensagemErro .= "Não foi possível alterar o atendimento!. Erro: " . mysqli_error($conexao);
        header('Location: ../../views/atendimento-listar.php?msg=' . $mensagemErro);
    }    

    mysqli_close($conexao);
?>