<?php
require'autoloader.php';

use Model\Funcionarios;
use Model\Setores;
use Model\Cargos;

$funcionarios = new Funcionarios();
$setores = new Setores();
$cargos = new Cargos();



if(isset($_POST['edit'])){
		$funcionarios->setNome($_POST['Nome']);
		$funcionarios->setEndereco($_POST['Endereco']);
		$funcionarios->setNascimento($_POST['Nascimento']);
		$funcionarios->setCPF($_POST['CPF']);
		$funcionarios->setStatus($_POST['Status']);
		$funcionarios->setCargos_idCargo($_POST['Cargos_idCargo']);
		$funcionarios->setSetores_idSetor($_POST['Setores_idSetor']);
	if($funcionarios->edit() == 1){
		$result = "Editado com sucesso!";
	}else{
		$error = "Erro ao editar, tente novamente!";
	}
}


if(isset($_POST['delete'])){
	$funcionarios->setIdFuncionario($_POST['idFuncionario_t']);
	if($funcionarios->delete() == 1){
		$result = "Deletado com sucesso!";
	}else{
		$error = "Erro ao deletar, tente novamente!";
	}
}

if (isset($_GET['idFuncionario'])) {
	$funcionarios->setIdCliente($_GET['idFuncionario']);
	$row = $funcionarios->view();
	if (isset($result)) {
		echo "O funcionário ID(" . $result . ") foi editado<br>";
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
			<h2>Funcionário</h2>	
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
						<th>Nome</th>

						<th class="actions">Ações</th>
					</tr>
				</thead>
				<?php
				$id = 0;
				$stmt = $funcionarios->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					$id += 1;
					?>

						<tr class="<?php echo $id ?>">
							<form method="post" action="editaFuncionario.php">
								<td class="td_idFuncinario"><?php echo $row->idFuncionario ;?></td>
								<td class="td_Nome"><?php echo $row->Nome ;?></td>



								<td class="actions">
									<div class="table-responsive">
									<input type="hidden" id="idFuncionario_t" name="idFuncionario_t" value="<?php echo $row->idFuncionario ?>">
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
							<h4 class="modal-title" id="modalLabel">Editar Funcionário</h4>
						</div>
						<div class="modal-content">
							<?php
							$stmt = $funcionarios->view();
							?>
							<form action="editarFuncinario.php" method="post" class="funcionario" id='funcionario'>
								<div class="form-group">	





					<br><label>Nome:</label>
					<input type="text" class="form-control" name="Nome" id="Nome" placeholder="Nome do Funcionário" required>

					<br><label>Endereço:</label>
					<input type="text" class="form-control" name="Endereco" id="Endereco" placeholder="Endereço" required>

					<br><label>Data de Nascimento:</label>
					<input type="date" name="Nascimento" id="Nascimento" placeholder="Nascimento" required><br>

					<br><label>CPF:</label>
					<input type="text" name="CPF" id="CPF" placeholder="CPF" required><br>

					<br><label>Status:</label>
					<input type="radio" name="Status" value="0"> Inativo
					<input type="radio" name="Status" value="1"> Ativo   <br>


					 <br><label>Cargo:</label>
                    <select id="select" class="form-control" name="Cargos_idCargo" action="cadastraFuncionario.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $cargos->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idCargo; ?>" value="<?php echo $row->idCargo; ?>"> <?php echo $row->NomeCar; ?>   
                         </option> 
                    <?php
                    }
                    ?>  
                </select>

                    <br><label>Setor:</label>
                    <select id="selects" class="form-control" name="Setores_idSetor" action="cadastraFuncionario.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $setores->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idSetor; ?>" value="<?php echo $row->idSetor; ?>"> <?php echo $row->NomeSetor; ?>
                         </option> 
                    <?php
                    }
                    ?> 
                </select>
									<input type="hidden" class="form-control" name="idFuncionario" id="idFuncionario" placeholder="idFuncionario" required >
								

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
			var idFuncionario =  $row.find('.td_idFuncionario').text();
			var Nome =  $row.find('.td_Nome').text();
			var Endereco =  $row.find('.td_Endereco').text();
			var Nascimento =  $row.find('.td_Nascimento').text();
			var CPF =  $row.find('.td_CPF').text();
			var Status =  $row.find('.td_Status').text();
			var Cargos_idCargo =  $row.find('.td_Cargos_idCargo').text();
			var Setores_idSetor =  $row.find('.td_Setores_idSetor').text();
			//$('#id').val(rowID);
			$('#idFuncionario').val(idFuncionario);
			$('#Nome').val(Nome);
			$('#Endereco').val(Endereco);
			$('#Nascimento').val(Nascimento);
			$('#CPF').val(CPF);
			$('#Status').val(Status);
			$('#Cargos_idCargo').val(Cargos_idCargo);
			$('#Setores_idSetor').val(Setores_idSetor);
			//$('#myModal').modal('show');
			//alert("Passou");
		});
	});

</script>
