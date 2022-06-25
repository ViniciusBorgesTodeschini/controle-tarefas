<?php
	include('../conexao.php');    

    $sql = "SELECT *
              FROM pessoa 
             WHERE cliente = 'S'";
    $query = mysqli_query($conexao, $sql);

    $lista = [];
    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $lista[] = $item;        
    }

    echo json_encode($lista);   
	
	mysqli_close($conexao);
?>