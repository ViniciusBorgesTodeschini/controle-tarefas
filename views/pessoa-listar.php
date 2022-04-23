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
        <title>Pessoas</title>
    </head> 
	<body>
        <header>
            <div class="header-pagina">Pessoas</div>
        </header>

        <section class="conteudo">

            <div class="cadastrar">
                <a href="pessoa-cadastro.php">Cadastrar</a>
            </div>

            <table class="listagem">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Empregador</th>
                        <th>Departamento</th>
                        <th>Endereco</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(@$_GET['ok']) {
                            echo '<p class="sucesso">Processo realizado com sucesso!</p>';
                        } elseif (@$_GET['msg']) {
                            echo '<p class="erro">Não foi possível concluir o processo! Erro: ' . $_GET['msg'] . '</p>';
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
                                 WHERE pessoa.cliente != 'S'
                              ORDER BY pessoa.id";
                        $query = mysqli_query($conexao, $sql);
                        if(!$query) {
                            echo mysqli_error($conexao);
                        } else {        
                            while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
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
                        <td><a href="../controllers/pessoa/pessoa-excluir.php?id=<?php echo $item['id']?>"><img src="../assets/excluir.png" alt="Excluir" title="Excluir"></a></td>
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