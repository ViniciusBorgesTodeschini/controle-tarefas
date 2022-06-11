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
    <title>Alterar Atendimento</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM atendimento WHERE id = '{$id}'";
        $query = mysqli_query($conexao,$sql);
        $atendimento = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>
    
    <header>
        <div class="header-pagina">Alterar Atendimentos</div>
    </header>

    <section class="conteudo-cadastro">      
        <form action="../controllers/atendimento/atendimento-editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label>Código:</label><br>
            <?php echo $id; ?><br><br>

            <label for="meio">Meio de atendimento:</label><br>
            <select name="id_meio_atend" id="id_meio_atend" class="input-meio">
                <?php
                    $sql = "SELECT * FROM atendimento_meio";
                    $query = mysqli_query($conexao, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; }?></option>
            </select><br><br>

            <label for="solicitante">Solicitante:</label><br>
            <select name="id_pessoa" id="id_pessoa" class="input-nome">
                <?php
                    $sql = "SELECT * FROM pessoa";
                    $query = mysqli_query($conexao, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; }?></option>
            </select><br><br>

            <label for="assunto">Assunto:</label><br>
            <select name="id_assunto" id="id_assunto"  class="input-assunto">
                <?php
                    $sql = "SELECT * FROM atendimento_assunto";
                    $query = mysqli_query($conexao, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; }?></option>
            </select><br><br>

            <label for="detalhes">Detalhes:</label><br>
            <textarea name="detalhes" id="detalhes" cols="80" rows="8" maxlength="500"><?php echo $atendimento['detalhes'] ?></textarea><br><br>

            <button type="submit">Salvar</button>
        </form>
        <input type="hidden" name="idMeio" id="idMeio" value="<?php echo $atendimento['id_meio_atend']?>">
        <input type="hidden" name="idPessoa" id="idPessoa" value="<?php echo $atendimento['id_pessoa']?>">
        <input type="hidden" name="idAssunto" id="idAssunto" value="<?php echo $itemVinculoEmpregador['id_assunto']?>"> 
    </section>   
</body>
</html>
<?php
    mysqli_close($conexao);
?>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
        var meio = $('#idMeio').val();
        $('select#id_meio_atend option[value="'+ meio + '"]').prop('selected', true);

        var pessoa = $('#idPessoa').val();
        $('select#id_pessoa option[value="'+ pessoa + '"]').prop('selected', true);

        var assunto = $('#idAssunto').val();
        $('select#id_assunto option[value="'+ assunto + '"]').prop('selected', true);
	});
</script>