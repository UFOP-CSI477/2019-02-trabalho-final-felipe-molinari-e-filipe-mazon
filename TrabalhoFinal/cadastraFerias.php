<?php

require'autoloader.php';

use Model\Ferias;
use Model\Funcionarios;

$funcionarios = new Funcionarios();
$ferias = new Ferias();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$ferias->setDataInicio($_POST['DataInicio']);
		$ferias->setDataFinal($_POST['DataFinal']);
		$ferias->setFuncionarios_idFuncionario($_POST['Funcionarios_idFuncionario']);

		if($ferias->insert() == 1){
			$result = "Férias registradas com sucesso!";
		

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

			<h2>Marcação de Férias</h2>
			<form action="cadastraFerias.php" method="post" class="ferias" id='ferias'>
				<div class="form-group">	


					 <br><label>Funcionário:</label>
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

                <br><label>Data de Ínicio : </label>
					<input type="date" name="DataInicio" id="DataInicio" placeholder="DataInicio" required>

					<br><label>Data de Término : </label>
					<input type="date" name="DataFinal" id="DataFinal" placeholder="DataFinal" required>

                    

                


                    


					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Marcar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>
