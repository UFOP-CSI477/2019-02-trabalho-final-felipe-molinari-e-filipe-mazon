<?php

require'autoloader.php';

use Model\Funcionarios;
use Model\Dependentes;

$funcionarios = new Funcionarios();
$dependentes = new Dependentes();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$dependentes->setNomeDep($_POST['NomeDep']);
		$dependentes->setFuncionarios_idFuncionario($_POST['Funcionarios_idFuncionario']);

		if($dependentes->insert() == 1){
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

			<h2>Formulário de Cadastro de Novo Dependente</h2>
			<form action="cadastraDependente.php" method="post" class="dependente" id='dependente'>
				<div class="form-group">	

					<br><label>Nome:</label>
					<input type="text" class="form-control" name="NomeDep" id="NomeDep" placeholder="Nome do Dependente" required>




					 <br><label>Funcionário Responsável:</label>
                    <select id="select" class="form-control" name="Funcionarios_idFuncionario" action="Funcionarios_idFuncionario.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $funcionarios->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idFuncionario; ?>" value="<?php echo $row->idFuncionario; ?>"> <?php echo $row->Nome; ?>   
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
