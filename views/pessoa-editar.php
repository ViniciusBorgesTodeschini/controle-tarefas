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
    <title>Alterar Pessoa</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $sql   = "SELECT * FROM pessoa WHERE id = '{$id}'";
        $query = mysqli_query($conexao,$sql);
        $item  = mysqli_fetch_array($query, MYSQLI_ASSOC);

        $sqlVinculoEmpregador   = "SELECT * FROM pj_pf WHERE id_pf = '{$id}'";
        $queryVinculoEmpregador = mysqli_query($conexao,$sqlVinculoEmpregador);
        $itemVinculoEmpregador  = mysqli_fetch_array($queryVinculoEmpregador, MYSQLI_ASSOC);

        $sqlVinculoDepartamento   = "SELECT * FROM pessoa_departamento WHERE id_pessoa = '{$id}'";
        $queryVinculoDepartamento = mysqli_query($conexao,$sqlVinculoDepartamento);
        $itemVinculoDepartamento  = mysqli_fetch_array($queryVinculoDepartamento, MYSQLI_ASSOC);        
    ?> 
    
    <header>
        <div class="header-pagina">Alterar Pessoa</div>
    </header>    

    <section class="conteudo-cadastro">  
        <input type="hidden" name="idDptoVinculo" id="idDptoVinculo" value="<?php echo $itemVinculoDepartamento['id_dpto']?>">
        <input type="hidden" name="idEmpregadorVinculo" id="idEmpregadorVinculo" value="<?php echo $itemVinculoEmpregador['id_pj']?>">
        <form action="../controllers/pessoa/pessoa-editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label>Código:</label><br>
            <?php echo $id; ?><br><br>
            
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" maxlength="70" value="<?php echo $item['nome'] ?>" class="input-nome"><br><br>
            
            <label for="documento">CPF:</label><br>
            <input type="text" name="documento" id="documento" maxlength="11" value="<?php echo $item['documento'] ?>"><br><br>

            <label for="id_pj">Empregador:</label><br>
            <select name="id_pj" id="id_pj" class="input-nome">
                <option value="0">Nenhum</option>
                <?php
                    $sqlEmpregador = "SELECT * FROM pessoa";
                    $queryEmpregador = mysqli_query($conexao, $sqlEmpregador);
                    while ($empregador = mysqli_fetch_array($queryEmpregador, MYSQLI_ASSOC)) {
                ?>
                <option value="<?php echo $empregador['id']; ?>"><?php echo $empregador['nome']; }?></option>
            </select><br><br>

            <label for="departamento">Departamento:</label><br>
            <select name="departamento" id="departamento" class="input-departamento">
                <?php
                    $sqlDepartamento = "SELECT * FROM departamento";
                    $queryDepartamento = mysqli_query($conexao, $sqlDepartamento);
                    while ($departamento = mysqli_fetch_array($queryDepartamento, MYSQLI_ASSOC)) {
                ?>
                <option id="opDpto" value="<?php echo $departamento['id']; ?>"><?php echo $departamento['nome']; }?></option>
            </select><br><br>        
            
            <label for="endereco">Endereço:</label><br>
            <input type="text" name="endereco" id="endereco" maxlength="100" value="<?php echo $item['endereco'] ?>" class="input-endereco"><br><br>

            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" id="telefone" maxlength="14" value="<?php echo $item['telefone'] ?>"><br><br>
            
            <label for="email">e-mail:</label><br>
            <input type="text" name="email" id="email" maxlength="100" value="<?php echo $item['email'] ?>" class="input-email"><br><br>
            
            <input type="checkbox" name="status" id="status" <?php if($item['status'] == 'A'){echo 'checked="checked"';} ?>>
            <label for="status">Status</label><br><br>

            <button type="submit">Salvar</button>
        </form>   
    </section> 
</body>
</html>
<?php
    mysqli_close($conexao);
?>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
        var departamento = $('#idDptoVinculo').val();
        $('select#departamento option[value="'+ departamento + '"]').prop('selected', true);

        var empregador = $('#idEmpregadorVinculo').val();
        $('select#id_pj option[value="'+ empregador + '"]').prop('selected', true);
	});
</script>