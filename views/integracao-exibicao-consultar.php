<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de clientes</title>
</head>
<body>
    <?php
        include('menu.php');
    ?>
    <header>
        <div class="header-pagina">Consulta de clientes</div>
    </header>

        <section class="conteudo">

            <div class="pesquisa-integracao">
		        <input type="text" class="inputPesquisar" id="pesquisar" placeholder="Nome"> 
		        <button type="button" id="btnPesquisar"><img src="../assets/pesquisa.png" alt="Pesquisar" title="Pesquisar" class="imgPesquisar"></button>                
            </div>
            
            <div class="separador"></div>

            <table class="listagem">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Documento</th>
                        <th>Endereco</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="lista"></tbody>  
            </table>			
        </section>

    <footer></footer>
</body>
</html>

<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

        $.ajax({
            url: '../integracoes/cliente-consultar.php',
            method: 'GET',
        }).done(function(data){
            $.each(JSON.parse(data), function(key, value) {
                var statusFormatado = "";
                var tipoFormatado = "";

                if(value.status == 'A'){
                    statusFormatado = "Ativo";
                } else {
                    statusFormatado = "Inativo";
                }

                if(value.status == 'pj'){
                    tipoFormatado = "Pessoa Jurídica";
                } else {
                    tipoFormatado = "Pessoa Física";
                }

                $('#lista').append(
                    '<tr><td>' + value.id        + '</td>' +
                        '<td>' + value.nome      + '</td>' +
                        '<td>' + tipoFormatado   + '</td>' +
                        '<td>' + value.documento + '</td>' +
                        '<td>' + value.endereco  + '</td>' +
                        '<td>' + value.telefone  + '</td>' +
                        '<td>' + value.email     + '</td>' +
                        '<td>' + statusFormatado + '</td></tr>'
                );
            });
        });

        $('#btnPesquisar').on('click', function(){
            $.ajax({
                url: 'integracao-cliente-pesquisar.php',
                method: 'POST',
                data: {
                    descricao: $('#pesquisar').val()
                }
            }).done(function(data){
                $('#lista').empty();
                $.each(JSON.parse(data), function(key, value) {
                    var statusFormatado = "";
                    var tipoFormatado = "";

                    if(value.status == 'A'){
                        statusFormatado = "Ativo";
                    } else {
                        statusFormatado = "Inativo";
                    }

                    if(value.status == 'pj'){
                        tipoFormatado = "Pessoa Jurídica";
                    } else {
                        tipoFormatado = "Pessoa Física";
                    }

                    $('#lista').append(
                        '<tr><td>' + value.id        + '</td>' +
                            '<td>' + value.nome      + '</td>' +
                            '<td>' + tipoFormatado   + '</td>' +
                            '<td>' + value.documento + '</td>' +
                            '<td>' + value.endereco  + '</td>' +
                            '<td>' + value.telefone  + '</td>' +
                            '<td>' + value.email     + '</td>' +
                            '<td>' + statusFormatado + '</td></tr>'
                    );
                });
            });
        });
	});
</script>