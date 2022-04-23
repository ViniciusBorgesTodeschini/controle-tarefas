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
    <title>Cadastrar Atendimento</title>
</head>
<body>
    <header>
        <div class="header-pagina">Cadastrar Atendimento</div>
    </header>

    <section class="conteudo-cadastro">
        
        <form action="../controllers/atendimento/atendimento-cadastro.php" method="POST">
            <label for="meio">Meio de atendimento:</label><br>
            <select name="id_meio_atend" id="id_meio_atend" class="input-meio">
                <?php 
                    $query = mysqli_query($conexao,"SELECT * FROM atendimento_meio");
                    while ($meio = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" . $meio['id'] . ">" . $meio['nome'] . "</option>";
                    }
                ?>
            </select><br><br>

            <label for="solicitante">Solicitante:</label><br>
            <select name="id_pessoa" id="id_pessoa" class="input-nome">
                <?php 
                    $query = mysqli_query($conexao,"SELECT * FROM pessoa WHERE pessoa.tipo ='pf' ");
                    while ($pessoa = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" . $pessoa['id'] . ">" . $pessoa['nome'] . "</option>";
                    }
                ?>
            </select><br><br>

            <label for="assunto">Assunto:</label><br>
            <select name="id_assunto" id="id_assunto" class="input-assunto">
                <?php 
                    $query = mysqli_query($conexao,"SELECT * FROM atendimento_assunto");
                    while ($assunto = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" . $assunto['id'] . ">" . $assunto['nome'] . "</option>";
                    }
                ?>
            </select><br><br>

            <fieldset class="field-atendimento">
                <legend>Data do Atendimento</legend>
                <label for="inicio">Início:</label>
                <input type="datetime-local" name="inicio" id="inicio" min='1990-01-01 00:00:00' max='2100-01-01 00:00:00'>

                <label for="fim">Fim:</label>
                <input type="datetime-local" name="fim" id="fim">
            </fieldset><br>

            <label for="detalhes">Detalhes:</label><br>
            <textarea name="detalhes" id="detalhes" cols="80" rows="8" maxlength="500"></textarea><br><br>

            <button type="submit">Cadastrar</button>
        </form>   
    </section> 
</body>
</html>
<?php
    mysqli_close($conexao);
?>