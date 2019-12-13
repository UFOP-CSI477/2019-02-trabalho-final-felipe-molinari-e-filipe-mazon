<?php
require'autoloader.php';

use Model\Setores;


$setor = new Setores();


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
			<h2>Relatório de Funcionários por Setor</h2>	
				<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Setor</th>


					</tr>
				</thead>

			<?php


  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "trabalho";
  $strConnection = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
  $connection = new PDO($strConnection, $dbuser, $dbpassword);

  $set = $connection->query("SELECT f.Nome as Nome,f.idFuncionario as idFuncionario, f.Setores_idSetor as Setores_idSetor, f.Nome as Nome, s.NomeSetor as NomeSetor, s.idSetor as idSetor , f.Status as Status FROM Funcionarios F, Setores S WHERE Setores_idSetor = idSetor and Status = '1' ORDER BY NomeSetor ASC, Nome ASC");
 
				while($row = $set->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeSetores.php">
								<td><?php echo $row-> idFuncionario ;?></td>
								<td><?php echo $row-> Nome ;?></td>
								<td><?php echo $row-> NomeSetor ;?></td>



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