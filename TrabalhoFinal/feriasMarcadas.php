<?php
require'autoloader.php';

use Model\Ferias;
use Model\Funcionarios;


$ferias = new Ferias();


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
			<h2>Relatório de Férias </h2>	
				<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Data de Ínicio</th>
						<th>Data de Término</th>


					</tr>
				</thead>

			<?php


  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "trabalho";
  $strConnection = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
  $connection = new PDO($strConnection, $dbuser, $dbpassword);

  $set = $connection->query("SELECT f.Nome as Nome,f.idFuncionario as idFuncionario, d.DataInicio as DataInicio, d.DataFinal as DataFinal , d.Funcionarios_idFuncionario as Funcionarios_idFuncionario FROM Funcionarios F, Ferias D WHERE Funcionarios_idFuncionario = idFuncionario ORDER BY DataInicio ASC, Nome ASC");
 
				while($row = $set->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeFerias.php">
								<td><?php echo $row-> idFuncionario ;?></td>
								<td><?php echo $row-> Nome ;?></td>
								<td><?php echo $row-> DataInicio ;?></td>
								<td><?php echo $row-> DataFinal ;?></td>



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