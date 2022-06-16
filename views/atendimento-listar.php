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
        <title>Atendimentos</title>
    </head>    
	<body>
        <header>
            <div class="header-pagina">Atendimentos</div>
        </header>

        <section class="conteudo">

            <div class="cadastrar">
                <a href="atendimento-cadastro.php">Cadastrar</a>
            </div>

            <div class="pesquisa">
		        <input type="text" class="inputPesquisar" id="pesquisar" placeholder="Assunto"> 
		        <button type="button" id="btnPesquisar"><img src="../assets/pesquisa.png" alt="Pesquisar" title="Pesquisar" class="imgPesquisar"></button>                
            </div>            

            <table class="listagem">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Solicitante</th>                    
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Assunto</th>
                        <th>Detalhes</th>
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
                                    ON pessoa.id = atendimento.id_pessoa
                              ORDER BY atendimento.id';
                        $query = mysqli_query($conexao, $sql);
                        if(!$query) {
                            echo mysqli_error($conexao);
                        } else {        
                            while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
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

        $('#btnPesquisar').on('click', function(){
            $.ajax({
                url: 'atendimento-pesquisar.php',
                method: 'POST',
                data: {
                    descricao: $('#pesquisar').val()
                }
            }).done(function(retorno){
                $('#lista').empty();
                $('#lista').html(retorno);
            });
        });
	}); 
</script>