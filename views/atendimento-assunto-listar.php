<?php
    include('../conexao.php');
    include('menu.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/estilos.css">
        <title>Assuntos de Atendimento</title>
    </head>    
	<body>
        <header>
            <div class="header-pagina">Assuntos de Atendimentos</div>
        </header>

        <section class="conteudo">

            <div class="cadastrar">
                <a href="atendimento-assunto-cadastro.php">Cadastrar</a>
            </div>

            <div class="pesquisa">
		        <input type="text" class="inputPesquisar" id="pesquisar" placeholder="Descrição"> 
		        <button type="button" id="btnPesquisar"><img src="../assets/pesquisa.png" alt="Pesquisar" title="Pesquisar" class="imgPesquisar"></button>                
            </div>

            <table class="listagem">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Meio de Atendimento</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="lista">
                    <?php
                        if(@$_GET['ok']) {
                            echo '<p class="sucesso">Processo realizado com sucesso!</p>';
                        } elseif (@$_GET['msg']) {
                            echo '<p class="erro">Não foi possível concluir o processo! Erro: ' . $_GET['msg'] . '</p>';
                        }
                    
                        $sql = 'SELECT * FROM atendimento_assunto ORDER BY id';
                        $query = mysqli_query($conexao, $sql);
                        if(!$query) {
                            echo mysqli_error($conexao);
                        } else {        
                            while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
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
                    ?>          
                </tbody>  
            </table>	
        </section>		
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('img#btnExcluir').on('click', function () {
			var excluir = confirm("Deseja excluir o cadastro?");
		});
	});

    $('#btnPesquisar').on('click', function(){
        $.ajax({
            url: 'atendimento-assunto-pesquisar.php',
            method: 'POST',
            data: {
                descricao: $('#pesquisar').val()
            }
        }).done(function(retorno){
            $('#lista').empty();
			$('#lista').html(retorno);
        });
    });    
</script>