<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importação de clientes</title>
</head>
<body>
    <?php
        include('menu.php');
    ?>
    <header>
        <div class="header-pagina">Importação de clientes</div>
    </header>

    <section class="conteudo-cadastro">
        <?php
            if(@$_GET['msg']) {
                echo '<p class="erro">Não foi possível concluir o processo! Erro: ' . $_GET['msg'] . '</p>';
            }
        ?>         

        <form action="../integracoes/cliente-importar.php" method="POST">
            <?php
                if(@$_GET['msg']) {
                    echo '<textarea name="json" cols="100" rows="50">'.$_SESSION['importacao-cliente'].'</textarea>';
                } else {
            ?>            
                <textarea name="json" cols="100" rows="50"></textarea>
            <?php
                }
            ?>            
            <br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </section>

    <footer></footer>
</body>
</html>