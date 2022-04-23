<?php
    include('../../../conexao.php');
	
    $id = $_GET['id'];
    $mensagemErro = "";

    $slqConsulta = "SELECT atendimento_meio.id AS meio,
						   atendimento.id 	   AS atendimento
                      FROM atendimento_meio
                 LEFT JOIN atendimento
				 		ON atendimento.id_meio_atend = atendimento_meio.id
                     WHERE atendimento_meio.id = {$id}";

    $queryConsulta = mysqli_query($conexao, $slqConsulta);
    if(!$queryConsulta) {
        echo mysqli_error($conexao);
    } else {        
        while($item = mysqli_fetch_array($queryConsulta, MYSQLI_ASSOC)){
			if($item['atendimento']){
				$mensagemErro .= "O meio de atendimento com o código " . $item['meio'] . " está vinculado ao atendimento " . $item['atendimento'] . ". ";   

				header('Location: ../../../views/atendimento-meio-listar.php?msg=' . $mensagemErro);
					
			} else {                
				$itemExcluir = $item['meio'];

				$sqlExcluir = "DELETE FROM atendimento_meio WHERE id = {$itemExcluir}";
				$queryExcluir = mysqli_query($conexao, $sqlExcluir);
				if($queryExcluir) {
					header('Location: ../../../views/atendimento-meio-listar.php?ok=1');
				} else {
					$mensagemErro .= mysqli_error($conexao) . ". ";
					header('../../../views/atendimento-meio-listar.php?msg=' . $mensagemErro);
				} 
			}
		}
    }
	

    mysqli_close($conexao);
?>