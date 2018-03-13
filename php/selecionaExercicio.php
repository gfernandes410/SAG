	<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gabriel Fernandes">
	
	<!-- Descrição -->
	<!-- WebApp para controle de treinos da academia.  -->

    <title>Exercícios</title>

    <!-- Bootstrap CSS -->
   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <!-- Customize -->
    <link href="../css/cssAux.css" rel="stylesheet">
	
	<!--Bibliotecas-->
	<?php
		error_reporting (E_ALL & ~ E_DEPRECATED);
		include ("conn.php");	
		include ("functions.php");	
	?>
	
	</head>

	<body>
	
	<nav class="navbar navbar-inverse">
  		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="index.html">SAG</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<ul class="nav navbar-nav">
					<li><a href="../index.html">Home</a></li>
					<li><a href="../set.php">Set</a></li>
					<li><a href="../exercicio.php">Exercícios</a></li>
					<li><a href="../treino.php">Treino</a></li>
				</ul>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Developed by Gabriel Fernandes
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="https://github.com/gfernandes410">Github</a></li>
						<li><a href="https://www.linkedin.com/in/gabriel-fernandes-04548b99">Linkedin</a></li>
						<li><a href="www.gfernandes410.com">Site</a></li>
					</ul>
				</li>
			</ul>
	  
		</div>
	</nav>

	<div class="container">
		
		<!-- Conteudo tabela -->
		<div>	
		
			<table class="table col-xs-12 col-md-12">
				<thead>
					<tr>
					  <th class="col-md-2 col-xs-1">Cod.</th>
					  <th class="col-md-6 col-xs-9">Exercício</th>
					  <th class="col-md-4 col-xs-1"></th>
					</tr>
					</thead>
				<tbody>
				<?php
				
				$var_codTreino = $_GET['codTreino'];
				
				$query = "select codexercicio, exercicio, obs from exercicio";
								
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
					while ($row = mysql_fetch_array( $result_query )) {
						
						$codexerc  = ltrim($row['codexercicio'], '0');
						
						echo  "	<tr><td>".$codexerc."</td>
								<td>".$row['exercicio']."</td>
								<td class='col-md-4 col-xs-1'>
								<a href='../registraTreino	.php?codTreino=".$var_codTreino."&codExerc=".$codexerc."' class='btn btn-primary col-md-12 col-xs-1'>Adicionar Exercício</a>
								</td>
						</tr>";
					}
				?>
		   </tbody>
			</table>
			
		</div>
				

		
	</div>
		<br><br>	
	</body>
	
	
</html>