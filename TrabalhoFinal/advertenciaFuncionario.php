<?php
require'autoloader.php';

use Model\Advertencias;


$advs = new Advertencias();


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
			<h2>Relatório de Advertências por Funcionário</h2>	
				<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Funcionário</th>
						<th>Data</th>
						<th>Motivo</th>


					</tr>
				</thead>

			<?php


  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "trabalho";
  $strConnection = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
  $connection = new PDO($strConnection, $dbuser, $dbpassword);

  $advs = $connection->query("SELECT a.idAdvertencia as idAdvertencia, a.Data as Data, a.Motivo as Motivo, a.Funcionarios_idFuncionario as Funcionarios_idFuncionario, f.idFuncionario as idFuncionario, f.Nome as Nome FROM Advertencias A, Funcionarios F WHERE a.Funcionarios_idFuncionario = f.idFuncionario ORDER BY Data DESC, Nome ASC");

 
				while($row = $advs->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeAdvertências.php">
								<td><?php echo $row-> idFuncionario ;?></td>
								<td><?php echo $row-> Nome ;?></td>
								<td><?php echo $row-> Data ;?></td>
								<td><?php echo $row-> Motivo ;?></td>




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