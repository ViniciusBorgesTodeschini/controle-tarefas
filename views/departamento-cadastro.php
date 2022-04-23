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
    <title>Cadastrar Departamento</title>
</head>
<body>
    <header>
        <div class="header-pagina">Cadastrar Departamento</div>
    </header>

    <section class="conteudo-cadastro">
        <form action="../controllers/departamento/departamento-cadastro.php" method="POST">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" maxlength="70" class="input-departamento"><br><br>

            <button type="submit">Cadastrar</button>
        </form>  
    </section>  
</body>
</html>
<?php
    mysqli_close($conexao);
?>