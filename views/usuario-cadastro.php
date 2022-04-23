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
    <title>Cadastrar Usuário</title>
</head>
<body>
    <header>
        <div class="header-pagina">Cadastrar Usuário</div>
    </header>

    <section class="conteudo-cadastro">
        <form action="../controllers/usuario/usuario-cadastro.php" method="POST">
            <label for="nome">Nome de usuário:</label><br>
            <input type="text" name="nome" id="nome" maxlength="50" class="input-nome"><br><br>

            <label for="pessoa">Pessoa:</label><br>
            <select name="id_pessoa" id="id_pessoa" class="input-nome">
                <?php 
                    $query = mysqli_query($conexao,"SELECT * FROM pessoa");
                    while ($pessoa = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" . $pessoa['id'] . ">" . $pessoa['nome'] . "</option>";
                    }
                ?>
            </select><br><br>        

            <label for="email">e-mail:</label><br>
            <input type="text" name="email" id="email" maxlength="150" class="input-email"><br><br>

            <label for="email">Senha:</label><br>
            <input type="password" name="senha" id="senha" maxlength="120" class="input-email"><br><br>            

            <button type="submit">Cadastrar</button>
        </form>  
    </section>  
</body>
</html>
<?php
    mysqli_close($conexao);
?>