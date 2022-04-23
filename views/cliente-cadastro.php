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
    <title>Cadastrar Cliente</title>
</head>
<body>
    <header>
        <div class="header-pagina">Cadastrar Cliente</div>
    </header>

    <section class="conteudo-cadastro">
        <form action="../controllers/cliente/cliente-cadastro.php" method="POST">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" maxlength="70" class="input-nome"><br><br>

            <fieldset class="field-natureza">
                <legend>Natureza Jurídica</legend>
                <input type="radio" name="tipo" id="pj" value="pj"> Pessoa Jurídica
                <input type="radio" name="tipo" id="pf" value="pf"> Pessoa Física 
            </fieldset><br>
            
            <label for="documento">Documento:</label><br>
            <input type="text" name="documento" id="documento" maxlength="14"><br><br>
            
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