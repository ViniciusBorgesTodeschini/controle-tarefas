<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/estilos.css">
    <title>Início</title>
</head>
<body>
    <?php
        include('../conexao.php');
        include('menu.php');
    ?>

    <header>
        <div class="header-pagina">Início</div>
    </header>

    <section class="paineis">
        <div class="cliente">
            <table>
                <thead>
                    <tr>
                        <th class="nome">Clientes</th>
                        <th class="quantidade">Quantidade de Atendimentos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sqlCliente = "SELECT pessoa.nome,
                                              count(pessoa.nome) AS quantidade
                                         FROM pessoa
                                   INNER JOIN pj_pf pp
                                           ON pp.id_pj = pessoa.id 
                                   INNER JOIN atendimento a
                                           ON a.id_pessoa = pp.id_pf 
                                        WHERE pessoa.cliente = 'S'
                                     GROUP BY pessoa.nome
                                     ORDER BY quantidade DESC";
                        $queryCliente = mysqli_query($conexao, $sqlCliente);
                        if(!$queryCliente) {
                            echo mysqli_error($conexao);
                        } else {        
                            while ($item = mysqli_fetch_array($queryCliente, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td class="nome"><?php echo $item['nome']?></td>
                        <td class="quantidade"><?php echo $item['quantidade']?></td>
                    </tr>			
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>     

        <div class="solicitante">
            <table>
                <thead>
                    <tr>
                        <th class="nome">Solicitantes</th>
                        <th class="quantidade">Quantidade de Atendimentos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sqlSolicitante = "SELECT pessoa.nome,
                                                  count(pessoa.nome) AS quantidade
                                             FROM pessoa
                                       INNER JOIN atendimento a
                                               ON a.id_pessoa = pessoa.id
                                            WHERE pessoa.cliente = 'N'
                                         GROUP BY pessoa.nome
                                         ORDER BY quantidade DESC";
                        $querySolicitante = mysqli_query($conexao, $sqlSolicitante);
                        if(!$querySolicitante) {
                            echo mysqli_error($conexao);
                        } else {        
                            while ($item = mysqli_fetch_array($querySolicitante, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td class="nome"><?php echo $item['nome']?></td>
                        <td class="quantidade"><?php echo $item['quantidade']?></td>
                    </tr>			
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    
    <footer></footer>

</body>
</html>