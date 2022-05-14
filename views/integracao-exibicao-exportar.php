<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportação de clientes</title>
</head>
<body>
    <?php
        include('menu.php');
    ?>
    <header>
        <div class="header-pagina">Exportação de clientes</div>
    </header>

    <section class="conteudo-cadastro">
        <textarea name="json" id="json" cols="100" rows="50"><?php print_r($_SESSION['exportacao'])?></textarea>        
    </section>

    <footer></footer>
</body>
</html>