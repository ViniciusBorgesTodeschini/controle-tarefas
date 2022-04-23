<?php
    include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estilos.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div class="titulo-sistema">
            Controle de Tarefas
        </div>        
    </header>

    <div class="header-login">Login</div>

    <div class="login">
        <?php
            if(isset($_GET['msg'])) {
                echo '<p class="erro-login">Erro: ' . $_GET['msg'] . '</p>';
            }        
        ?>

        <form action="../controllers/login-validar.php" method="post">
            <label for="login">Usuario/e-mail</label> <br>
            <input type="text" name="login" id="login"> <br> <br>
            <label for="senha">Senha</label> <br>
            <input type="password" name="senha" id="senha"> <br> <br>
            <input class="bt-entrar" type="submit" value="Entrar">
        </form>        
    </div>    

    <footer></footer>    
    
</body>
</html>
<?php
	mysqli_close($conexao);
?>