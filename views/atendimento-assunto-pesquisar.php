<?php
	include('../conexao.php');

	$descricao = $_POST['descricao'];
	
	$where = "";
	if($descricao != ""){
		$where = " WHERE atendimento_assunto.nome LIKE '%".trim($descricao)."%'";
	}
	$sql = 'SELECT * FROM atendimento_assunto ' . $where . ' ORDER BY id';
	$query = mysqli_query($conexao, $sql);
	if(!$query) {
		echo mysqli_error($conexao);
	} else {
		while($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){

?>
<tr>
    <td><?php echo $item['id']?></td>
    <td><?php echo $item['nome']?></td>
    <td><a href="atendimento-assunto-editar.php?id=<?php echo $item['id']?>"><img src="../assets/editar.png" alt="Editar" title="Editar"></a></td>
    <td><a href="../controllers/atendimento/atendimento-assunto/atendimento-assunto-excluir.php?id=<?php echo $item['id']?>"><img src="../assets/excluir.png" alt="Excluir" title="Excluir" id="btnExcluir"></a></td>  
</tr>				
<?php
		}
	}
	mysqli_close($conexao);
?>