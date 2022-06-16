<?php
    include('../../../conexao.php');
	
    $id = $_GET['id'];
    $mensagemErro = "";

    $slqConsulta = "SELECT atendimento_assunto.id AS assunto,
						   atendimento.id 	   	  AS atendimento
                      FROM atendimento_assunto
                 LEFT JOIN atendimento
				 		ON atendimento.id_assunto = atendimento_assunto.id
                     WHERE atendimento_assunto.id = {$id}";

    $queryConsulta = mysqli_query($conexao, $slqConsulta);
    if(!$queryConsulta) {
        echo mysqli_error($conexao);
    } else {        
        while($item = mysqli_fetch_array($queryConsulta, MYSQLI_ASSOC)){
			if($item['atendimento']){
				$mensagemErro .= "O assunto de atendimento com o código " . $item['assunto'] . " está vinculado ao atendimento " . $item['atendimento'] . ". ";   
				echo $mensagemErro;
			} else {                
				$itemExcluir = $item['assunto'];

				$sqlExcluir = "DELETE FROM atendimento_assunto WHERE atendimento_assunto.id = {$itemExcluir}";
				$queryExcluir = mysqli_query($conexao, $sqlExcluir);
				if(!$queryExcluir) {
					$mensagemErro .= mysqli_error($conexao) . ". ";
					echo $mensagemErro;
				} 
			}
		}
    }	

    mysqli_close($conexao);
?>