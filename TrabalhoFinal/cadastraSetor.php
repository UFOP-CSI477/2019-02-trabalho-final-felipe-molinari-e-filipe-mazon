<?php

require'autoloader.php';

use Model\Setores;


$setores = new Setores();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$setores->setNomeSetor($_POST['NomeSetor']);

		if($setores->insert() == 1){
			$result = "Inserido com sucesso!";
		

		}else{
			$error = "Erro ao inserir, tente novamente!";
		}
	}
}
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php
			if (isset($result)) {
				?>
				<div class="alert alert-success">
					<?php echo $result; ?>
				</div>
				<?php
			}else if(isset($error)){
				?>
				<div class="alert alert-danger">
					<?php echo $error; ?>
				</div>
				<?php
			}
			?>

			<h2>Formulário de Cadastro de Novo Setor</h2>
			<form action="cadastraSetor.php" method="post" class="setor" id='setor'>
				<div class="form-group">	

					<br><label>Nome:</label>
					<input type="text" class="form-control" name="NomeSetor" id="NomeSeto" placeholder="Nome do Setor" required>



                


                    


					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Cadastrar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>
