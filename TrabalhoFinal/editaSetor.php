<?php
require'autoloader.php';


use Model\Setores;

$setores = new Setores();



if(isset($_POST['edit'])){
		$setores->setIdSetor($_POST['idSetor']);
		$setores->setNomeSetor($_POST['NomeSetor']);


	if($setores->edit() == 1){
		$result = "Editado com sucesso!";

	}else{
		$error = "Erro ao editar, tente novamente!";
	}
}


if(isset($_POST['delete'])){
	$setores->setIdSetor($_POST['idSetor_t']);
	if($setores->delete() == 1){
		$result = "Deletado com sucesso!";
	}else{
		$error = "Erro ao deletar, tente novamente!";
	}
}

if (isset($_GET['idSetor'])) {
	$setores->setIdCargo($_GET['idSetor']);
	$row = $setores->view();
	if (isset($result)) {
		echo "O Setor ID(" . $result . ") foi editado<br>";
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
				$stmt = $setores->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					$id += 1;
					?>

						<tr class="<?php echo $id ?>">
							<form method="post" action="editaCargo.php">
								<td class="td_idSetor"><?php echo $row->idSetor ;?></td>
								<td class="td_NomeSetor"><?php echo $row->NomeSetor ;?></td>



								<td class="actions">
									<div class="table-responsive">
									<input type="hidden" id="idSetor_t" name="idSetor_t" value="<?php echo $row->idSetor ?>">
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
							<h4 class="modal-title" id="modalLabel">Editar Setor</h4>
						</div>
						<div class="modal-content">
							<?php
							$stmt = $setores->view();
							?>
							<form action="editaSetor.php" method="post" class="setores" id='setores'>
								<div class="form-group">	





									<br><label>Nome do Setor:</label>
					<input type="text" class="form-control" name="NomeSetor" id="NomeSetor" placeholder="Nome do Setor" required>


					<input type="hidden" class="form-control" name="idSetor" id="idSetor" placeholder="idSetor" required >

									

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
			var idSetor =  $row.find('.td_idSetor').text();
			var NomeSetor =  $row.find('.td_NomeSetor').text();

			//$('#id').val(rowID);
			$('#idSetor').val(idSetor);
			$('#NomeSetor').val(NomeSetor);

			//$('#myModal').modal('show');
			//alert("Passou");
		});
	});

</script>
