<?php
	include('../conexao.php');
    session_start();

	$json = $_POST['json'];
	$array = json_decode($json, true);    
	
	foreach($array as $info) {
		$sql = "INSERT INTO pessoa(id,nome,tipo,documento,endereco,telefone,email,status,cliente) 
                    VALUES(null, '{$info['nome']}', lower('{$info['tipo']}'), '{$info['documento']}',
                            '{$info['endereco']}','{$info['telefone']}','{$info['email']}',upper('{$info['status']}'),
                            upper('{$info['cliente']}'))";

        $query = mysqli_query($conexao,$sql);
        if($query){
            header('Location: ../views/cliente-listar.php?ok=1');
        } else {
            $_SESSION['importacao-cliente'] = $json;
            $mensagemErro = "Não foi possível cadastrar a pessoa! Erro: " . mysqli_error($conexao) . ". ";
            header('Location: ../views/integracao-cliente-importar.php?msg=' . $mensagemErro);
        }
	}
	
	mysqli_close($conexao);
?>