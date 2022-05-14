<?php
	include('../conexao.php');
    session_start();

	$id    = $_POST['id_cliente'];
    $lista = [];

    $sqlWhere = "";
    if($id > 0){
        $sqlWhere = " AND id = {$id}";
    }	    
    $sql = "SELECT id,nome,tipo,documento,endereco,telefone,email 
              FROM pessoa 
             WHERE cliente = 'S' 
                   $sqlWhere";

    $query = mysqli_query($conexao, $sql);
    if(!$query) {
        $_SESSION['exportacao'] = "Não foi possível exportar o cliente!. Erro: " . mysqli_error($conexao);
        header('Location: ../views/integracao-exibicao-exportar.php?msg=' . $mensagemErro);        
    } else {        
        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $lista[] = $item;
        }
        $_SESSION['exportacao'] = $lista;
        header('Location: ../views/integracao-exibicao-exportar.php?ok=1');
    }       
	
	mysqli_close($conexao);
?>