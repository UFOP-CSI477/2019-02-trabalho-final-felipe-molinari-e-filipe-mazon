<?php

require'autoloader.php';

use Model\Alunos;
use Model\Professores;
use Model\Projetos;

$aluno = new Alunos();
$professor = new Professores();
$projeto = new Projetos();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$projeto->setTitulo($_POST['Titulo']);
		$projeto->setAno($_POST['Ano']);
		$projeto->setSemestre($_POST['Semestre']);
		$projeto->setAlunos_idAluno($_POST['Alunos_idAluno']);
		$projeto->setProfessores_idProfessor($_POST['Professores_idProfessor']);
		if($projeto->insert() == 1){
			$result = "Inserido com sucesso!";
			
			header('Location: pesquisaProjetosp.php');
		

		}else{
			$error = "Erro ao inserir, tente novamente!";
		}
	}
}
include('headerprofessor.php');
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

			<h2>Formulário de Cadastro de Novo Projeto</h2>
			<form action="cadastraProjeto.php" method="post" class="projeto" id='projeto'>
				<div class="form-group">	

					<br><label>Título:</label>
					<input type="text" class="form-control" name="Titulo" id="Data" placeholder="Título Trabalho" required>

					<br><label>Ano:</label>
					<input type="text" class="form-control" name="Ano" id="Ano" placeholder="Ano" required>

					<br><label>Semestre:</label>
					<input type="text" class="form-control" name="Semestre" id="Semestre" placeholder="Semestre" required>


					 <br><label>Aluno:</label>
                    <select id="select" class="form-control" name="Alunos_idAluno" action="cadastraProjeto.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $aluno->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idAluno; ?>" value="<?php echo $row->idAluno; ?>"> <?php echo $row->Nome; ?>   
                         </option> 
                    <?php
                    }
                    ?>  
                </select>

                    <br><label>Professor:</label>
                    <select id="selects" class="form-control" name="Professores_idProfessor" action="cadastraProjeto.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $professor->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idProfessor; ?>" value="<?php echo $row->idProfessor; ?>"> <?php echo $row->Nome; ?>
                         </option> 
                    <?php
                    }
                    ?> 
                </select>

                


                    


					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Cadastrar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>
