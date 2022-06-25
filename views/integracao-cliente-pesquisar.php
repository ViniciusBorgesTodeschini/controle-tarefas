<?php
	include('../conexao.php');

	$descricao = $_POST['descricao'];
	
	$where = "";
	if($descricao != ""){
		$where = " AND pessoa.nome LIKE '%".trim($descricao)."%'";
	}
    $sql = "SELECT * FROM pessoa WHERE pessoa.cliente = 'S' " . 
			$where . 
    		" ORDER BY pessoa.id";
	$query = mysqli_query($conexao, $sql);

    $lista = [];
    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $lista[] = $item;        
    }
    
    echo json_encode($lista);

	mysqli_close($conexao);
?>