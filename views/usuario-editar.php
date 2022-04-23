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
    <title>Alterar Usuário</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM usuario WHERE id = '{$id}'";
        $query = mysqli_query($conexao,$sql);
        $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?> 
    
    <header>
        <div class="header-pagina">Alterar Usuário</div>
    </header>

    <section class="conteudo-cadastro">
        <form action="../controllers/usuario/usuario-editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label>Código:</label><br>
            <?php echo $id; ?><br><br>
                        
            <label for="nome">Nome de usuário:</label><br>
            <input type="text" name="nome" id="nome" maxlength="50" class="input-nome" value="<?php echo $item['nome_usuario'] ?>"><br><br>  

            <label for="email">e-mail:</label><br>
            <input type="text" name="email" id="email" maxlength="150" class="input-email" value="<?php echo $item['email'] ?>"><br><br>

            <label for="email">Senha:</label><br>
            <input type="password" name="senha" id="senha" maxlength="120" class="input-email"  value="<?php echo $item['senha'] ?>"><br><br>
            
            <input type="checkbox" name="status" id="status" <?php if($item['status'] == 'A'){echo 'checked="checked"';} ?>>
            <label for="status">Status</label><br><br>            

            <button type="submit">Alterar</button>
        </form>  
    </section>    
</body>
</html>
<?php
    mysqli_close($conexao);
?>