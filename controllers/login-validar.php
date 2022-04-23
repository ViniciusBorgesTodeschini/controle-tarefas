<?php
    include('../conexao.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * 
            FROM usuario 
            WHERE (usuario.email = '$login'         OR 
                   usuario.nome_usuario = '$login') AND 
                  senha = '$senha'";

    $query = mysqli_query($conexao, $sql);

    if($query){
        if(mysqli_num_rows($query)>0){
            $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
            if($usuario['tipo'] == "A"){
                header("Location: ../views/index.php");    
            }else{
                header("Location: ../views/index.php");
            }
            
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