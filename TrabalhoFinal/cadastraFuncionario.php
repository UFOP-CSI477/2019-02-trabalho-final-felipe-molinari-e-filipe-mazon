<?php

require'autoloader.php';

use Model\Funcionarios;
use Model\Setores;
use Model\Cargos;

$funcionarios = new Funcionarios();
$setores = new Setores();
$cargos = new Cargos();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$funcionarios->setNome($_POST['Nome']);
		$funcionarios->setEndereco($_POST['Endereco']);
		$funcionarios->setNascimento($_POST['Nascimento']);
		$funcionarios->setCPF($_POST['CPF']);
		$funcionarios->setStatus($_POST['Status']);
		$funcionarios->setCargos_idCargo($_POST['Cargos_idCargo']);
		$funcionarios->setSetores_idSetor($_POST['Setores_idSetor']);
		if($funcionarios->insert() == 1){
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

			<h2>Formulário de Cadastro de Novo Funcionário</h2>
			<form action="cadastraFuncionario.php" method="post" class="funcionario" id='funcionario'>
				<div class="form-group">	

					<br><label>Nome:</label>
					<input type="text" class="form-control" name="Nome" id="Nome" placeholder="Nome do Funcionário" required>

					<br><label>Endereço:</label>
					<input type="text" class="form-control" name="Endereco" id="Endereco" placeholder="Endereço" required>

					<br><label>Data de Nascimento:</label>
					<input type="date" name="Nascimento" id="Nascimento" placeholder="Nascimento" required><br>

					<br><label>CPF:</label>
					<input type="text" name="CPF" id="CPF" placeholder="CPF" required><br>

					<br><label>Status:</label>
					<input type="radio" name="Status" value="0"> Inativo
					<input type="radio" name="Status" value="1"> Ativo   <br>


					 <br><label>Cargo:</label>
                    <select id="select" class="form-control" name="Cargos_idCargo" action="cadastraFuncionario.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $cargos->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idCargo; ?>" value="<?php echo $row->idCargo; ?>"> <?php echo $row->NomeCar; ?>   
                         </option> 
                    <?php
                    }
                    ?>  
                </select>

                    <br><label>Setor:</label>
                    <select id="selects" class="form-control" name="Setores_idSetor" action="cadastraFuncionario.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $setores->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idSetor; ?>" value="<?php echo $row->idSetor; ?>"> <?php echo $row->NomeSetor; ?>
                         </option> 
                    <?php
                    }
                    ?> 
                </select>

                


                    


					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Cadastrar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>
