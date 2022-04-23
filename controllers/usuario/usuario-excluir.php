<?php
    include('../../conexao.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM usuario WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	if($query) {
		header('Location: ../../views/usuario-listar.php?ok=1');
	} else {
		header('Location: ../../views/usuario-listar.php?msg=' . mysqli_error($conexao));
	}     

    mysqli_close($conexao);
?>