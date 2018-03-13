	<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gabriel Fernandes">
	
	<!-- Descrição -->
	<!-- WebApp para controle de treinos da academia.  -->

    <title>Set</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.mim.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <!-- Customize -->
    <link href="css/cssAux.css" rel="stylesheet">
	
	<!--Bibliotecas-->
	<?php
		error_reporting (E_ALL & ~ E_DEPRECATED);
		include ("php/conn.php");	
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
					<li><a href="index.html">Home</a></li>
					<li><a href="set.php">Set</a></li>
					<li><a href="exercicio.php">Exercícios</a></li>
					<li><a href="treino.php">Treino</a></li>
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
		
			<a class="col-md-8 ocultamobile"></a>	
			<input type='button' class='btn btn-primary col-md-4 col-xs-12 btn-lg' value ="Adicionar Set" data-toggle='modal' data-target='#mdaddset'>
				
			<br><br><br><br>
				
			<table class="table col-xs-12 col-md-12">
				<thead>
					<tr>
					  <th class="col-md-1 col-xs-1">Cod.</th>
					  <th class="col-md-5 col-xs-7">Nome</th>
					  <th class="col-md-2 col-xs-1">Data Inicial</th>
					  <th class="col-md-2 col-xs-1">Data Final</th>
					  <th class="col-md-1 col-xs-1">Status</th>
					  <th class="col-md-1 col-xs-1"></th>
					</tr>
					</thead>
				<tbody>
	<?php
	$query = "select id, nome, datainicial, datafinal, ativo from settreino";
	
	$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
		while ($row = mysql_fetch_array( $result_query )) {			
			echo  	"<form name='frm_editaSet' method='post' action='saveSet.php?ipt_id=".$row['id']."'>
					 <tr><td>".$row['id'].
					" <input type='hidden' class='form-control' id='ipt_id' name='ipt_id' value='".$row['id'].
					"'></td><td>".$row['nome'].
					"</td><td>".$row['datainicial'].
					"</td><td>".$row['datafinal'];
			if($row['ativo'] == 'A') {
				echo	"</td><td>Ativo";
			} else {
				echo	"</td><td>Inativo";
			}
			
			echo	"</td><th class='col-md-1 col-xs-1'>
						<button type='submit' class='btn btn-primary col-xs-12 col-md-12'>Editar</button>
					</th>
			</tr>
			</form>
			";
		}
	?>
		   </tbody>
			</table>
		
			
		
		</div>
				
		<!-- CADASTRA MODAL -->
		<div class="modal"  id="mdaddset" role="dialog">
			<div class="modal-dialog" role="document">
			
				<div class="modal-content col-md-12">

				<form name="frm_novoSet" method="post" action="php/novoSet.php">

					<div class="modal-header ">
						<h3 class="modal-title">Cadastrar Set</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body col-md-12">

						<!-- INPUT NOME -->
						<div class="form-group col-xs-12 col-md-12">
							<label for="ipt_nome">Nome do novo SET</label>
							<input type="text" class="form-control" id="ipt_nome"  name="ipt_nome" placeholder="Nome do Set">
						</div>
						
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary col-xs-12 col-md-5">Salvar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					</div>
					
					<input type="hidden" name="ipt_cod" id="ipt_cod">

				</form>

				</div>
			</div>
			
		</div>
		
		
	</div>
	
	<br><br>
	
	</body>
	
	<script type="text/javascript">
			$("#mdexercicio").on("show.bs.modal", function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var cod = button.data("cod") // Extract info from data-* attributes
			  var exercicio = button.data("exercicio") // Extract info from data-* attributes
			  var obs = button.data("obs") // Extract info from data-* attributes
			  			  		  		
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal"s content. We"ll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			  modal.find(".modal-title").text("Alterar Exercício - " + exercicio)
			  modal.find("#ipt_exercicio").val(exercicio)
			  modal.find("#ipt_obs").val(obs)
			  modal.find("#ipt_cod").val(cod)
			})	
	</script>
	
</html>