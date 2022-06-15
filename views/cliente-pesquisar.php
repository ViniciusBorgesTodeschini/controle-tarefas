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
	if(!$query) {
		echo mysqli_error($conexao);
	} else {
		while($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){

?>
<tr>
    <td><?php echo $item['id']?></td>
    <td><?php echo $item['nome']?></td>
    <td><?php echo $item['tipo'] == 'pj'?'Pessoa Jurídica':'Pessoa Física';?></td>
    <td><?php echo $item['documento']?></td>
    <td><?php echo $item['endereco']?></td>
    <td><?php echo $item['telefone']?></td>
    <td><?php echo $item['email']?></td>
    <td><?php echo $item['status'] == 'A'?'Ativo':'Inativo';?></td>
    <td><a href="cliente-editar.php?id=<?php echo $item['id']?>"><img src="../assets/editar.png" alt="Editar" title="Editar"></a></td>
    <td><a href="../controllers/cliente/cliente-excluir.php?id=<?php echo $item['id']?>"><img src="../assets/excluir.png" alt="Excluir" title="Excluir" id="btnExcluir"></a></td> 
</tr>			
<?php
		}
	}
	mysqli_close($conexao);
?>