<?php
require'autoloader.php';

use Model\Dependentes;


$dependentes = new Dependentes();


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
			<h2>Dependentes por Funcionário</h2>	
				<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Dependente</th>
						<th>Funcionário</th>


					</tr>
				</thead>

			<?php


  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "trabalho";
  $strConnection = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
  $connection = new PDO($strConnection, $dbuser, $dbpassword);

  $deps = $connection->query("SELECT d.idDependente as idDependente, d.Funcionarios_idFuncionario as Funcionarios_idFuncionario, d.NomeDep as NomeDep, f.idFuncionario as idFuncionario, f.Nome as Nome FROM Dependentes D, Funcionarios F WHERE d.Funcionarios_idFuncionario = f.idFuncionario ORDER BY Nome ASC");
 
				while($row = $deps->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="dependenteFuncionario.php">
								<td><?php echo $row-> idDependente ;?></td>
								<td><?php echo $row-> NomeDep ;?></td>
								<td><?php echo $row-> Nome ;?></td>

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