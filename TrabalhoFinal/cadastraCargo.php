<?php

require'autoloader.php';

use Model\Cargos;


$cargos = new Cargos();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$cargos->setNomeCar($_POST['NomeCar']);
		$cargos->setSalario($_POST['Salario']);

		if($cargos->insert() == 1){
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

			<h2>Formulário de Cadastro de Novo Cargo</h2>
			<form action="cadastraCargo.php" method="post" class="funcionario" id='funcionario'>
				<div class="form-group">	

					<br><label>Nome:</label>
					<input type="text" class="form-control" name="NomeCar" id="NomeCar" placeholder="Nome do Cargo" required>

					<br><label>Salário:</label>
					<input type="text" class="form-control" name="Salario" id="Salario" placeholder="Salário" required>


                


                    


					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Cadastrar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>
