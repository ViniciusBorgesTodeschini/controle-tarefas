<?php
    include('../../conexao.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM atendimento WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	if($query) {
		header('Location: ../../views/atendimento-listar.php?ok=1');
	} else {
		header('Location: ../../views/atendimento-listar.php?msg=' . mysqli_error($conexao));
	}    

    mysqli_close($conexao);
?>