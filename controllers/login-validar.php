<?php
    session_start();
    include('../conexao.php');

    $login = mysqli_real_escape_string($conexao,$_POST['login']);
    $senha = md5($_POST['senha']);

    $sql = "SELECT * 
            FROM usuario 
            WHERE (usuario.email        = '$login'  OR 
                   usuario.nome_usuario = '$login') AND 
                  senha = '$senha'                  AND
                  status ='A'";

    $query = mysqli_query($conexao, $sql);

    if($query){
        if(mysqli_num_rows($query)>0){
            $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $_SESSION['usuario'] = $usuario;
            header("Location: ../views/index.php");
        }else{
            $msg = "Usuário ou senha inválidos. ";
            header("Location: ../views/login.php?msg=$msg");   
        }
    }else{
        $msg = "Erro ao realizar validação do usuários. <br>" . mysqli_error($conexao);
        header("Location: ../views/login.php?msg=$msg");
    }

    mysqli_close($conexao);    
?>