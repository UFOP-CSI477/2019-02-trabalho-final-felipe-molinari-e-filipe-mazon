<?php
require'autoloader.php';

use Model\Funcionarios;
use Model\Cargos;


$funcionarios = new Funcionarios();
$cargos = new Cargos();


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
			<h2>Relatório de Remunerações</h2>	
				<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Salário</th>


					</tr>
				</thead>

			<?php


  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "trabalho";
  $strConnection = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
  $connection = new PDO($strConnection, $dbuser, $dbpassword);

  $funcs = $connection->query("SELECT f.idFuncionario as idFuncionario, f.Nome as Nome, F.Status as Status , c.Salario as Salario , c.idCargo as idCargo , f.Cargos_idCargo as Cargos_idCargos FROM Funcionarios F, Cargos C  WHERE Status = '1' and Cargos_idCargo = idCargo  ORDER BY Nome ASC");

 
				while($row = $funcs->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeFuncionarios.php">
								<td><?php echo $row-> idFuncionario ;?></td>
								<td><?php echo $row-> Nome ;?></td>
								<td>R$<?php echo $row-> Salario ;?></td>



							</form>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>



<?php 
?>

		</div>
	</div>
</body>
</html>