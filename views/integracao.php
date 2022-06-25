<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/estilos.css">
    <title>Integrações</title>
</head>
<body>
    <?php
        include('../conexao.php');
        include('menu.php');
    ?>

    <header>
        <div class="header-pagina">Integrações</div>
    </header>

    <section class="conteudo-cadastro">    
        <table class="listagem">
            <thead>
                <tr>
                    <th>Cadastros</th>
                    <th"></th>
                    <th"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Clientes</td>                    
                    <td><a href="integracao-cliente-importar.php"><img src="../assets/upload.png" alt="Importar" title="Importar"></a></td>
                    <td><a href="integracao-cliente-exportar.php"><img src="../assets/download.png" alt="Exportar" title="Exportar"></a></td>
                    <td><a href="integracao-exibicao-consultar.php"><img src="../assets/consultar.png" alt="Consultar" title="Consultar"></a></td>
                </tr>			
            </tbody>
        </table>
    </section>
    
    <footer></footer>

</body>
</html>