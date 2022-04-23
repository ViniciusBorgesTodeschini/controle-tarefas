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
    <title>Cadastrar Pessoas</title>
</head>
<body>
    <header>
        <div class="header-pagina">Cadastrar Pessoa</div>
    </header>

    <section class="conteudo-cadastro">
        <form action="../controllers/pessoa/pessoa-cadastro.php" method="POST">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" maxlength="70" class="input-nome"><br><br>
            
            <label for="documento">CPF:</label><br>
            <input type="text" name="documento" id="documento" maxlength="11"><br><br>

            <label for="id_pj">Empregador:</label><br>
            <select name="id_pj" id="id_pj" class="input-nome">
                <?php 
                    $query = mysqli_query($conexao,"SELECT * FROM pessoa WHERE cliente = 'S'");
                    while ($pessoa = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" . $pessoa['id'] . ">" . $pessoa['nome'] . "</option>";
                    }
                ?>
            </select><br><br>

            <label for="departamento">Departamento:</label><br>
            <select name="departamento" id="departamento" class="input-departamento">
                <?php 
                    $query = mysqli_query($conexao,"SELECT * FROM departamento");
                    while ($departamento = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" . $departamento['id'] . ">" . $departamento['nome'] . "</option>";
                    }
                ?>
            </select><br><br>        
            
            <label for="endereco">Endereço:</label><br>
            <input type="text" name="endereco" id="endereco" maxlength="100" class="input-endereco"><br><br>

            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" id="telefone" maxlength="14"><br><br>
            
            <label for="email">e-mail:</label><br>
            <input type="text" name="email" id="email" maxlength="100" class="input-email"><br><br>
            
            <input type="checkbox" name="status" id="status">
            <label for="status">Status</label><br><br>

            <button type="submit">Cadastrar</button>
        </form> 
    </section>   
</body>
</html>
<?php
    mysqli_close($conexao);
?>