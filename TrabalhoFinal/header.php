<!DOCTYPE html>
<html>
<head>
  <title>Prova1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="css/style.css">-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/font.css">
  <link rel="stylesheet" href="fonts/font2.css">
  <link rel="stylesheet" href="fonts/font3.css">
  <link rel="stylesheet" href="fonts/font4.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="js/bootstrap.min.js">
  <link rel="stylesheet" href="js/jquery.min.js">
  <link rel="stylesheet" href="js/jquery.js">
  <link rel="stylesheet" href="js/jquery.min2.js">
  <link rel="stylesheet" href="js/bootstrap.min2.js">
  <link rel="shortcut icon" href="images/favicons.jpg" />
</head>
 
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
 
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">FUNCIONÁRIOS
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastraFuncionario.php">Cadastrar</a></li>
            <li><a href="editaFuncionario.php">Editar</a></li>
            <li><a href="cadastraFerias.php">Marcar Férias</a></li>
            <li><a href="novaAdvertencia.php">Nova Advertência</a></li>
          </ul>
        </li>
         
        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">DEPENDENTES
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastraDependente.php">Cadastrar</a></li>
            <li><a href="excluiDependente.php">Remover</a></li>

          </ul>
        </li>

  <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">CARGOS
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastraCargo.php">Cadastrar</a></li>
            <li><a href="editaCargo.php">Editar</a></li>

          </ul>
        </li>
        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">SETORES
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastraSetor.php">Cadastrar</a></li>
            <li><a href="editaSetor.php">Editar</a></li>

          </ul>
        </li>

        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">RELATÓRIOS
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="funcionariosAtivos.php">Remuneração por Funcionário</a></li>
            <li><a href="dependenteFuncionario.php">Dependentes por Funcionário</a></li>
            <li><a href="advertenciaFuncionario.php">Advertências por Funcionário</a></li>
            <li><a href="setorFuncionario.php">Funcionários por Setor</a></li>
            <li><a href="feriasMarcadas.php">Férias Marcadas</a></li>

          </ul>
        </li>


         

      </ul>
    </div>
  </div>
</nav>
</body>
</html>