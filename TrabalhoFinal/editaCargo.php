<?php
require'autoloader.php';


use Model\Cargos;

$cargos = new Cargos();



if(isset($_POST['edit'])){
		$cargos->setIdCargo($_POST['idCargo']);
		$cargos->setNomeCar($_POST['NomeCar']);
		$cargos->setSalario($_POST['Salario']);

	if($cargos->edit() == 1){
		$result = "Editado com sucesso!";

	}else{
		$error = "Erro ao editar, tente novamente!";
	}
}


if(isset($_POST['delete'])){
	$cargos->setIdCargo($_POST['idCargo_t']);
	if($cargos->delete() == 1){
		$result = "Deletado com sucesso!";
	}else{
		$error = "Erro ao deletar, tente novamente!";
	}
}

if (isset($_GET['idCargo'])) {
	$cargos->setIdCargo($_GET['idCargo']);
	$row = $cargos->view();
	if (isset($result)) {
		echo "O Cargo ID(" . $result . ") foi editado<br>";
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
			<h2>Editar Cargo</h2>	
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

			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Cargo</th>

						<th class="actions">Ações</th>
					</tr>
				</thead>
				<?php
				$id = 0;
				$stmt = $cargos->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					$id += 1;
					?>

						<tr class="<?php echo $id ?>">
							<form method="post" action="editaCargo.php">
								<td class="td_idCargo"><?php echo $row->idCargo ;?></td>
								<td class="td_NomeCar"><?php echo $row->NomeCar ;?></td>
								<td class="td_Salario"><?php echo $row->Salario ;?></td>


								<td class="actions">
									<div class="table-responsive">
									<input type="hidden" id="idCargo_t" name="idCargo_t" value="<?php echo $row->idCargo ?>">
									<a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#edit-modal" >Editar</a>

									<button type="submit" name="delete" class="btn btn-danger btn-sm">Excluir</button>
									</div>
								</td>
							</form>
						</tr>
						<?php
					}

					?>
				</tbody>
			</table>

			<!-- Modal Editar-->
			<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalLabel">Editar Cargo</h4>
						</div>
						<div class="modal-content">
							<?php
							$stmt = $cargos->view();
							?>
							<form action="editaCargo.php" method="post" class="cargos" id='cargos'>
								<div class="form-group">	





									<br><label>Nome do Cargo:</label>
					<input type="text" class="form-control" name="NomeCar" id="NomeCar" placeholder="Nome do Cargo" required>

					<br><label>Salario:</label>
					<input type="text" class="form-control" name="Salario" id="Salario" placeholder="Salário" required>

					<input type="hidden" class="form-control" name="idCargo" id="idCargo" placeholder="idCargo" required >

									

								<button type="submit" name="edit" class="btn btn-success btn-sm">Editar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							</div>
						</form>
					</div>    
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


<script>
	$(function(){
		$('a').click(function(){
			var $row = $(this).closest('tr');
			var rowID = $row.attr('class').split('_')[1];
			var idCargo =  $row.find('.td_idCargo').text();
			var NomeCar =  $row.find('.td_NomeCar').text();
			var Salario =  $row.find('.td_Salario').text();

			//$('#id').val(rowID);
			$('#idCargo').val(idCargo);
			$('#NomeCar').val(NomeCar);
			$('#Salario').val(Salario);

			//$('#myModal').modal('show');
			//alert("Passou");
		});
	});

</script>
