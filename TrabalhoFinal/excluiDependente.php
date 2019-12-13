<?php
require'autoloader.php';


use Model\Dependentes;

$dependentes = new Dependentes();




if(isset($_POST['delete'])){
	$dependentes->setIdDependente($_POST['idDependente_t']);
	if($dependentes->delete() == 1){
		$result = "Removido com sucesso!";
	}else{
		$error = "Erro ao deletar, tente novamente!";
	}
}

if (isset($_GET['idDependente'])) {
	$dependentes->setIdCargo($_GET['idDependente']);
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
			<h2>Excluir Dependente</h2>	
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
						<th>Dependente</th>

						<th class="actions">Ações</th>
					</tr>
				</thead>
				<?php
				$id = 0;
				$stmt = $dependentes->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					$id += 1;
					?>

						<tr class="<?php echo $id ?>">
							<form method="post" action="excluiDependente.php">
								<td class="td_idDependente"><?php echo $row->idDependente ;?></td>
								<td class="td_NomeDep"><?php echo $row->NomeDep ;?></td>


								<td class="actions">
									<div class="table-responsive">
									<input type="hidden" id="idDependente_t" name="idDependente_t" value="<?php echo $row->idDependente ?>">

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
							$stmt = $dependentes->view();
							?>
							<form action="editaDependente.php" method="post" class="dependentes" id='dependentes'>
								<div class="form-group">	


									


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
			var idDependente =  $row.find('.td_idDependente').text();
			var NomeDep =  $row.find('.td_NomeDep').text();

			//$('#id').val(rowID);
			$('#idDependente').val(idDependente);
			$('#NomeDep').val(NomeDep);

			//$('#myModal').modal('show');
			//alert("Passou");
		});
	});

</script>
