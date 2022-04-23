<?php
    include('../../conexao.php');
	
    $id = $_GET['id'];
    $mensagemErro = "";

    $slqConsulta = "SELECT departamento.id AS departamento,
						   pessoa.id 	   AS pessoa
                      FROM departamento
                 LEFT JOIN pessoa_departamento AS pd
                        ON pd.id_dpto 		= departamento.id
                 LEFT JOIN pessoa
                        ON pessoa.id 		= pd.id_pessoa
                     WHERE departamento.id  = {$id}";

    $queryConsulta = mysqli_query($conexao, $slqConsulta);
    if(!$queryConsulta) {
        echo mysqli_error($conexao);
    } else {        
        while($item = mysqli_fetch_array($queryConsulta, MYSQLI_ASSOC)){
			if($item['pessoa']){
				$mensagemErro .= "O departamento com o código " . $item['departamento'] . " está vinculado a pessoa " . $item['pessoa'] . ". ";   

				header('Location: ../../views/pessoa-listar.php?msg=' . $mensagemErro);
					
			} else {                
				$itemExcluir = $item['departamento'];

				$sqlExcluir = "DELETE FROM departamento WHERE id = {$itemExcluir}";
				$queryExcluir = mysqli_query($conexao, $sqlExcluir);
				if($queryExcluir) {
					header('Location: ../../views/departamento-listar.php?ok=1');
				} else {
					$mensagemErro .= mysqli_error($conexao) . ". ";
					header('Location: ../../views/departamento-listar.php?msg=' . $mensagemErro);
				} 
			}
		}
    }	

    mysqli_close($conexao);
?>