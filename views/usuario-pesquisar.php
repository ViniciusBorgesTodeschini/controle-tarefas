<?php
	include('../conexao.php');

	$descricao = $_POST['descricao'];
	
	$where = "";
	if($descricao != ""){
		$where = " WHERE usuario.nome_usuario LIKE '%".trim($descricao)."%'";
	}
    $sql = "SELECT * FROM usuario " . $where . " ORDER BY usuario.id";

	$query = mysqli_query($conexao, $sql);
	if(!$query) {
		echo mysqli_error($conexao);
	} else {
		while($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){

?>
<tr>
    <td><?php echo $item['id']?></td>
    <td><?php echo $item['nome_usuario']?></td>
    <td><?php echo $item['email']?></td>
    <td><?php echo date('d/m/Y H:i:s',strtotime($item['data_cadastro']));?></td>
    <td><?php if($item['data_atualizacao']){echo date('d/m/Y H:i:s',strtotime($item['data_atualizacao']));}?></td>
    <td><?php echo $item['tipo'] == 'A'?'Administrador':'Normal';?></td>                                    
    <td><?php echo $item['status'] == 'A'?'Ativo':'Inativo';?></td>
    <td><a href="usuario-editar.php?id=<?php echo $item['id']?>"><img src="../assets/editar.png" alt="Editar" title="Editar"></a></td>
    <td><a href="../controllers/usuario/usuario-excluir.php?id=<?php echo $item['id']?>"><img src="../assets/excluir.png" alt="Excluir" title="Excluir" id="btnExcluir"></a></td>  
</tr>				
<?php
		}
	}
	mysqli_close($conexao);
?>