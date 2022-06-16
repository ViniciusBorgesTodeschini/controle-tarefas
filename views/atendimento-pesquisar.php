<?php
	include('../conexao.php');

	$descricao = $_POST['descricao'];
	
	$where = "";
	if($descricao != ""){
		$where = " WHERE atendimento_assunto.nome LIKE '%".trim($descricao)."%'";
	}
    $sql = 'SELECT atendimento.*,
                   atendimento_assunto.nome as assunto,
                   atendimento_meio.nome as meio,
                   pessoa.nome as solicitante
              FROM atendimento
        INNER JOIN atendimento_assunto
                ON atendimento_assunto.id = atendimento.id_assunto
        INNER JOIN atendimento_meio
                ON atendimento_meio.id = atendimento.id_meio_atend
        INNER JOIN pessoa
                ON pessoa.id = atendimento.id_pessoa' . 
				$where . 
          ' ORDER BY atendimento.id';
	$query = mysqli_query($conexao, $sql);
	if(!$query) {
		echo mysqli_error($conexao);
	} else {
		while($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){

?>
<tr>
    <td><?php echo $item['id']?></td>
    <td><?php echo $item['solicitante']?></td>
    <td><?php echo date('d/m/Y H:i:s',strtotime($item['inicio_atend']));?></td>
    <td><?php echo date('d/m/Y H:i:s',strtotime($item['fim_atend']));?></td>
    <td><?php echo $item['assunto']?></td>
    <td><?php echo $item['detalhes']?></td>
    <td><?php echo $item['meio']?></td>
    <td><a href="atendimento-editar.php?id=<?php echo $item['id']?>"><img src="../assets/editar.png" alt="Editar" title="Editar"></a></td>
    <td id="<?php echo $item['id']?>"><input type="hidden" name="idExcluir" id="idExcluir" value=""><img src="../assets/excluir.png" alt="Excluir" title="Excluir" id="btnExcluir"></td>
</tr>				
<?php
		}
	}
	mysqli_close($conexao);
?>
<script type="text/javascript">
	$(document).ready(function () {
		$('img#btnExcluir').on('click', function () {
            var idExclusao = $(this).closest('td').attr("id");
            var linha = $(this).closest('tr');
            if(confirm("Deseja excluir o cadastro?")){
                $.ajax({
                    url: '../controllers/atendimento/atendimento-excluir.php?id=' + idExclusao,
                    method: 'GET',
                }).done(function(retorno){
                    if(retorno){
                        alert(retorno);
                    } else {
                        linha.remove();
                    }
                });
            }
		});
	}); 
</script>