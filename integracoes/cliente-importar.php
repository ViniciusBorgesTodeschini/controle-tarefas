<?php
	include('../conexao.php');
    session_start();

	$json = $_POST['json'];
	$array = json_decode($json, true);    
	
	foreach($array as $info) {
        if(isset($info['id'])){
            $sqlPessoa = "SELECT * FROM pessoa WHERE id = " . $info['id'];
            $queryPessoa = mysqli_query($conexao, $sqlPessoa);
            if(!$queryPessoa) {
                echo mysqli_error($conexao);
            } else {
                $item = mysqli_fetch_array($queryPessoa, MYSQLI_ASSOC);
    
                if($info['id'] == $item['id']){
                    $sql = "UPDATE pessoa
                            SET id={$info['id']}, nome='{$info['nome']}', tipo=lower('{$info['tipo']}'), documento='{$info['documento']}',
                                endereco='{$info['endereco']}', telefone='{$info['telefone']}', email='{$info['email']}', status=upper('{$info['status']}'), cliente=upper('{$info['cliente']}')
                            WHERE id={$info['id']}"; 
                            echo $sql;          
                } else {
                    $mensagemErro = "Não foi possível alterar o cliente! Erro: " . mysqli_error($conexao) . ". ";
                }
            }
        } else {
            $sql = "INSERT INTO pessoa(id,nome,tipo,documento,endereco,telefone,email,status,cliente) 
            VALUES(null, '{$info['nome']}', lower('{$info['tipo']}'), '{$info['documento']}',
                    '{$info['endereco']}','{$info['telefone']}','{$info['email']}',upper('{$info['status']}'),
                    upper('{$info['cliente']}'))";
        }

        $query = mysqli_query($conexao,$sql);
        if($query){
            header('Location: ../views/cliente-listar.php?ok=1');
        } else {
            $_SESSION['importacao-cliente'] = $json;            
            $mensagemErro = "Não foi possível cadastrar a cliente! Erro: " . mysqli_error($conexao) . ". ";
            echo $mensagemErro;
            header('Location: ../views/integracao-cliente-importar.php?msg=' . $mensagemErro);
        }
	}
	
	mysqli_close($conexao);
?>