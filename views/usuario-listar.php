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
        <title>Usuários</title>
    </head>    
	<body>
        <header>
            <div class="header-pagina">Usuários</div>
        </header>

        <section class="conteudo">

            <div class="cadastrar">
                <a href="usuario-cadastro.php">Cadastrar</a>
            </div>

            <table class="listagem">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome de Usuário</th>
                        <th>e-mail</th>
                        <th>Data de Cadastro</th>
                        <th>Data de Atualização</th>
                        <th>Tipo</th>
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

                        $sql = 'SELECT * FROM usuario ORDER BY id';
                        $query = mysqli_query($conexao, $sql);
                        if(!$query) {
                            echo mysqli_error($conexao);
                        } else {        
                            while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $item['id']?></td>
                        <td><?php echo $item['nome_usuario']?></td>
                        <td><?php echo $item['email']?></td>
                        <td><?php echo $item['data_cadastro']?></td>
                        <td><?php echo $item['data_atualizacao']?></td>
                        <td><?php echo $item['tipo'] == 'A'?'Administrador':'Normal';?></td>                                    
                        <td><?php echo $item['status'] == 'A'?'Ativo':'Inativo';?></td>
                        <td><a href="usuario-editar.php?id=<?php echo $item['id']?>"><img src="../assets/editar.png" alt="Editar" title="Editar"></a></td>
                        <td><a href="../controllers/usuario/usuario-excluir.php?id=<?php echo $item['id']?>"><img src="../assets/excluir.png" alt="Excluir" title="Excluir"></a></td>                    
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