<!DOCTYPE html>
<html lang="en">
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
        <form action="../integracoes/cliente-importar.php" method="POST">
            <textarea name="json" id="json" cols="100" rows="50"></textarea>
            <br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </section>

    <footer></footer>
</body>
</html>