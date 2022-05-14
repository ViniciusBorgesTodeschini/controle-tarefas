<?php
	$tmp  = $_FILES['arquivo']['tmp_name'];

	if(move_uploaded_file($tmp, '../assets/logos/logo-empresa.png')) {
        header('Location: ../views/index.php?ok=1');
	} else {
		$mensagemErro = "Não foi possível realizar o Upload!";
        header('Location: ../views/index.php?msg=' . $mensagemErro);
	}        
        
?>