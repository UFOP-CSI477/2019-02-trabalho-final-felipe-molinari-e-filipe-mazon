<?php

require'autoloader.php';

use Model\Advertencias;
use Model\Funcionarios;

$funcionarios = new Funcionarios();
$advertencias = new Advertencias();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$advertencias->setData($_POST['Data']);
		$advertencias->setMotivo($_POST['Motivo']);
		$advertencias->setFuncionarios_idFuncionario($_POST['Funcionarios_idFuncionario']);

		if($advertencias->insert() == 1){
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

			<h2>Nova Advertência</h2>
			<form action="novaAdvertencia.php" method="post" class="advertencia" id='advertencia'>
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

                <br><label>Motivo:</label>
					<input type="text" class="form-control" name="Motivo" id="Motivo" placeholder="Motivo" required>

					<br><label>Data</label>
					<input type="date" name="Data" id="Data" placeholder="Data" required>

                    

                


                    


					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Cadastrar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>
