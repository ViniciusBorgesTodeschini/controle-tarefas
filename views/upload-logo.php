<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de logo</title>
</head>
<body>
    <?php
        include('menu.php');
    ?>
    <header>
        <div class="header-pagina">Upload de logo</div>
    </header>

    <section class="conteudo-cadastro">
        <form action="../controllers/upload-logo.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="arquivo">
            <br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </section>

    <footer></footer>
</body>
</html>