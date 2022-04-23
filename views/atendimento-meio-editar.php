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
    <title>Alterar Meio de Atendimento</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM atendimento_meio WHERE id = '{$id}'";
        $query = mysqli_query($conexao,$sql);
        $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>  

    <header>
        <div class="header-pagina">Alterar meio de Atendimento</div>
    </header>

    <section class="conteudo-cadastro">  
        <form action="../controllers/atendimento/atendimento-meio/atendimento-meio-editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label>Código:</label><br>
            <?php echo $id; ?><br><br>

            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" maxlength="70" value="<?php echo $item['nome'] ?>" class="input-meio"><br><br>

            <button type="submit">Salvar</button>
        </form> 
    </section>   
</body>
</html>
<?php
    mysqli_close($conexao);
?>