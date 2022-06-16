<?php
    include('../../conexao.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM pessoa WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	if(!$query) {
		echo mysqli_error($conexao);
	}

    mysqli_close($conexao);
?>