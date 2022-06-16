<?php
	include('../conexao.php');

	$descricao = $_POST['descricao'];
	
	$where = "";
	if($descricao != ""){
		$where = " AND pessoa.nome LIKE '%".trim($descricao)."%'";
	}
    $sql = "SELECT pessoa.*,
                   departamento.nome AS departamento,
                   empregador.nome   AS empregadorNome
              FROM pessoa
         LEFT JOIN pessoa_departamento AS pd
                ON pd.id_pessoa = pessoa.id
         LEFT JOIN departamento
                ON departamento.id = pd.id_dpto
         LEFT JOIN pj_pf AS vp
                ON vp.id_pf = pessoa.id
         LEFT JOIN pessoa AS empregador
                ON empregador.id = vp.id_pj
             WHERE pessoa.cliente != 'S' " . 
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
    <td><?php echo $item['documento']?></td>
    <td><?php echo $item['empregadorNome']?></td>
    <td><?php echo $item['departamento']?></td>
    <td><?php echo $item['endereco']?></td>
    <td><?php echo $item['telefone']?></td>
    <td><?php echo $item['email']?></td>
    <td><?php echo $item['status'] == 'A'?'Ativo':'Inativo';?></td>
    <td><a href="pessoa-editar.php?id=<?php echo $item['id']?>"><img src="../assets/editar.png" alt="Editar" title="Editar"></a></td>
    <td id="<?php echo $item['id']?>"><input type="hidden" name="idExcluir" id="idExcluir" value=""><img src="../assets/excluir.png" alt="Excluir" title="Excluir" id="btnExcluir"></td>
</tr>			
<?php
		}
	}
	mysqli_close($conexao);
?>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('img#btnExcluir').on('click', function () {
            var idExclusao = $(this).closest('td').attr("id");
            var linha = $(this).closest('tr');
            if(confirm("Deseja excluir o cadastro?")){
                $.ajax({
                    url: '../controllers/pessoa/pessoa-excluir.php?id=' + idExclusao,
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