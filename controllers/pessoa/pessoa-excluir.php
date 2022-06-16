<?php
    include('../../conexao.php');

    $id = $_GET['id'];
    $mensagemErro = "";

    $sqlPessoa = "SELECT pessoa.id      AS pessoa, 
                         atendimento.id AS atendimento, 
                         usuario.id     AS usuario,
                         pj_pf.id_pf    AS funcionario,
                         pj_pf.id_pj    AS empregador
                    FROM pessoa
               LEFT JOIN atendimento
                      ON atendimento.id_pessoa = pessoa.id
               LEFT JOIN usuario
                      ON usuario.id_pessoa     = pessoa.id
               LEFT JOIN pj_pf
                      ON (pj_pf.id_pf = pessoa.id) OR
                         (pj_pf.id_pj = pessoa.id)
                   WHERE pessoa.id    = {$id}";

    $queryPessoa = mysqli_query($conexao, $sqlPessoa);
    if(!$queryPessoa) {
        echo mysqli_error($conexao);
    } else {        
        while($item = mysqli_fetch_array($queryPessoa, MYSQLI_ASSOC)){
            if($item['atendimento'] || $item['usuario'] || $item['funcionario'] && $item['empregador'] != 0){
                if($item['atendimento']){
                    $mensagemErro .= "A pessoa com o código " . $item['pessoa'] . " está vinculada ao atendimento " . $item['atendimento'] . ". \n";
                }
                    
                if($item['usuario']){
                $mensagemErro .= "A pessoa com o código " . $item['pessoa'] . " está vinculada ao usuário " . $item['usuario'] . ". \n";
                }

                if($item['funcionario'] && $item['empregador'] != 0){
                    $mensagemErro .= "A pessoa com o código " . $item['pessoa'] . " está vinculada a pessoa " . $item['empregador'] . ". \n";
                }             

                echo $mensagemErro;
            } else {                
                $pessoaExluir = $item['pessoa'];

                $sql = "DELETE FROM pessoa WHERE id = {$pessoaExluir}";
                $query = mysqli_query($conexao, $sql);
                if(!$query) {
                    $mensagemErro .= mysqli_error($conexao) . ". ";
                    echo $mensagemErro;
                } 
            }
        }
    }    

    mysqli_close($conexao);
?>