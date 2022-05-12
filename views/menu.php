<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <header>
        <div class="titulo-sistema">
            Controle de Tarefas
        </div>        
    </header>

    <section class="section-left">

        <div class="separador"></div>

        <div class="imagem-empresa">
            Logo da empresa cliente aqui                        
        </div>

        <div class="traco"></div>

        <div class="user-logado">
            <ul>
               <li class="opcoes-usuario"><a href="index.php"><img src="../assets/inicio.png" alt="Início" title="Início"></a></li> 
               <li class="opcoes-usuario"><a href="usuario-editar.php?id=<?php echo $_SESSION['usuario']['id']?>"><img src="../assets/usuario.png" alt="Perfil" title="Perfil"></a></li>
               <li class="opcoes-usuario"><a href="../controllers/logout.php"><img src="../assets/logout.png" alt="Logout" title="Logout"></a></li>
            </ul> 
        </div>

        <div class="traco"></div>

        <div class="menu">
            <ul id="listaMenu">
                <?php 
                    if($_SESSION['usuario']['tipo'] == 'A'){
                ?>
                <li class="usuarios-lista"><a href="integracao.php">Integrações</a></li>                
                <div class="separador"></div>

                <li class="usuarios-lista"><a href="usuario-listar.php">Usuários</a></li>                
                <div class="separador"></div>                                            
                <?php 
                    }
                ?>

                <li class="atendimento"><a href="atendimento-listar.php">Atendimento</a></li>
                <div class="separador"></div>

                <li class="clientes"><a href="cliente-listar.php">Clientes</a></li>
                <div class="separador"></div>

                <li class="pessoas"><a href="pessoa-listar.php">Pessoas</a></li>
                <div class="separador"></div>
                
                <li class="departamentos"><a href="departamento-listar.php">Departamentos</a></li>
                <div class="separador"></div>    

                <li class="meio-atend"><a href="atendimento-meio-listar.php">Meios Atendimento</a></li>
                <div class="separador"></div>

                <li class="assunto-atend"><a href="atendimento-assunto-listar.php">Assuntos Atendimento</a></li>
            </ul>
        </div>
    </section>

    <footer>

    </footer>
</body>
</html>