<?php
    include('menu.php');
    include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportação de clientes</title>
</head>
<body>

    <header>
        <div class="header-pagina">Exportação de clientes</div>
    </header>

    <section class="conteudo-cadastro">
        <form action="../integracoes/cliente-exportar.php" method="POST">
            <label for="id_cliente">Cliente:</label><br>
            <select name="id_cliente" id="id_cliente" class="input-nome">
                <option value="0">Todos</option>;
                <?php 
                    $query = mysqli_query($conexao,"SELECT * FROM pessoa WHERE cliente = 'S'");
                    while ($pessoa = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" . $pessoa['id'] . ">" . $pessoa['nome'] . "</option>";
                    }
                ?>
            </select>
            <br><br>

            <button type="submit">Exportar</button>
        </form>
    </section>

    <footer></footer>
</body>
</html>