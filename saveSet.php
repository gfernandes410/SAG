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
					<li><a href="treino.html">Treinar</a></li>
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
		
		<form name="frm_cadastroSet" method="post" action="php/registraset.php">
		
			<div class="form-group col-xs-12 col-lg-4">
				<label for="ipt_nome">
				<?php
				$ipt_id = $_POST['ipt_id'];			
		
				$query = "select nome, datainicial, datafinal, ativo, obs from settreino where id =" . $ipt_id;
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row = mysql_fetch_array( $result_query );
				
				echo "	Nome SET</label>
				<input type='text' class='form-control' id='ipt_nome' readonly='readonly' value ='"  . $row['nome'] . "'>
			</div>"  ;
			
				echo "
					<div class='form-group col-xs-12 col-lg-4'>
						<label for='ipt_dtinicial'>Data Inicial</label>
						<input type='date' class='form-control' id='ipt_nome' value  = '". $row['datainicial'] ."'>
					</div>
			
					<div class='form-group col-xs-12 col-lg-4'>
						<label for='ipt_dtfinal'>Data Final</label>
						<input type='date' class='form-control' id='ipt_nome' value  = '". $row['datafinal'] ."'>
					</div>

					<div class='form-group col-xs-12 col-lg-12'>
						<label for='ipt_obs'>Observação</label>
						<textarea rows='2' class='form-control' id='ipt_nome'>". $row['obs'] ." </textarea>
					</div>
					
					<div class='form-group col-xs-12 col-lg-12 custom-checkbox'>
						<input type='checkbox' class='custom-control-input' id='ipt_ativo' ";
						if ($row['ativo']=='A'){
							echo "checked";
						}
					echo	">
						<label class='custom-control-label' for='customCheck1'>Treino Ativo</label>
					</div>
				"
		
				
				?>
				
				
						
			<table class="table col-xs-12 col-md-12">
				<thead>
					<tr>
						<th class='col-md-2 col-xs-2'></th>
						<th class="col-md-2 col-xs-2">Cod. Treino</th>
						<th class="col-md-7	 col-xs-7">Nome Treino</th>
						<th class="col-md-1 col-xs-1"></th>
					</tr>
					</thead>
				<tbody>
			
			
			
			<?php
			
				$ipt_id = $_POST['ipt_id'];	
	
				$query = "select treino1, treino2, treino3, treino4, treino5, treino6, treino7 from settreino where id =" . $ipt_id;
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row = mysql_fetch_array( $result_query );
				
				$nomeTreino1;
				$nomeTreino2;
				$nomeTreino3;
				$nomeTreino4;
				$nomeTreino5;
				$nomeTreino6;
				$nomeTreino7;
								
				$query = "Select nome  from  treino where codtreino = '";
				$query = $query . $row['treino1'] . "'";
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row2 = mysql_fetch_array( $result_query );
				$nomeTreino1 = $row2 ['nome'];
				
				$query = "Select nome  from  treino where codtreino = '";
				$query = $query . $row['treino2'] . "'";
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row2 = mysql_fetch_array( $result_query );
				$nomeTreino2 = $row2 ['nome'];
				
				$query = "Select nome  from  treino where codtreino = '";
				$query = $query . $row['treino3'] . "'";
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row2 = mysql_fetch_array( $result_query );
				$nomeTreino3 = $row2 ['nome'];
				
				$query = "Select nome  from  treino where codtreino = '";
				$query = $query . $row['treino4'] . "'";
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row2 = mysql_fetch_array( $result_query );
				$nomeTreino4 = $row2 ['nome'];
				
				$query = "Select nome  from  treino where codtreino = '";
				$query = $query . $row['treino5'] . "'";
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row2 = mysql_fetch_array( $result_query );
				$nomeTreino5 = $row2 ['nome'];
				
				$query = "Select nome  from  treino where codtreino = '";
				$query = $query . $row['treino6'] . "'";
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row2 = mysql_fetch_array( $result_query );
				$nomeTreino6 = $row2 ['nome'];
				
				$query = "Select nome  from  treino where codtreino = '";
				$query = $query . $row['treino7'] . "'";
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row2 = mysql_fetch_array( $result_query );
				$nomeTreino7 = $row2 ['nome'];
					
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 1</th>
							<th class='col-md-2 col-xs-2'>". $row['treino1']. "</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino1 ."</th> ";
				if ($row['treino1'] == ''){
					echo	"<th class='col-md-1 col-xs-1'>					
					<span class='glyphicon glyphicon-plus' data-toggle='modal' data-target='#mdaddTreino'></span>				
					</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  data-toggle='modal' data-target='#mdverTreino'>
							</th>";
					};
				echo "</tr>";						
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 2</th>
							<th class='col-md-2 col-xs-2'>". $row['treino2']."</th>
							<th class='col-md-7 col-xs-7'>". $nomeTreino2 ."</th>";
				if ($row['treino2'] == ''){
						echo	"<th class='col-md-1 col-xs-1'>					
					<span class='glyphicon glyphicon-plus' data-toggle='modal' data-target='#mdaddTreino'></span>				
					</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  data-toggle='modal' data-target='#mdverTreino'>
							</th>";
					};
				echo "</tr>";			
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 3</th>
							<th class='col-md-2 col-xs-2'>". $row['treino3']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino3 ."</th>";
				if ($row['treino3'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>					
					<span class='glyphicon glyphicon-plus' data-toggle='modal' data-target='#mdaddTreino'></span>				
					</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  data-toggle='modal' data-target='#mdverTreino'>
							</th>";
					};
				echo "</tr>";		
				
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 4</th>
							<th class='col-md-2 col-xs-2'>". $row['treino4']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino4 ."</th>";
				if ($row['treino4'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>					
					<span class='glyphicon glyphicon-plus' data-toggle='modal' data-target='#mdaddTreino'></span>				
					</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  data-toggle='modal' data-target='#mdverTreino'>
							</th>";
					};
				echo "</tr>";		
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 5</th>
							<th class='col-md-2 col-xs-2'>". $row['treino5']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino5 ."</th>";
				if ($row['treino5'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>					
					<span class='glyphicon glyphicon-plus' data-toggle='modal' data-target='#mdaddTreino'></span>				
					</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  data-toggle='modal' data-target='#mdverTreino'>
							</th>";
					};
				echo "</tr>";		
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 6</th>
							<th class='col-md-2 col-xs-2'>". $row['treino6']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino6 ."</th>";
				if ($row['treino6'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>					
					<span class='glyphicon glyphicon-plus' data-toggle='modal' data-target='#mdaddTreino'></span>				
					</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  data-toggle='modal' data-target='#mdverTreino'>
							</th>";
					};
				echo "</tr>";		
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 7</th>
							<th class='col-md-2 col-xs-2'>". $row['treino7']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino7 ."</th>";
				if ($row['treino7'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>					
					<span class='glyphicon glyphicon-plus' data-toggle='modal' data-target='#mdaddTreino'></span>				
					</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  data-toggle='modal' data-target='#mdverTreino'>
							</th>
							
							
							
							
							";
					};
				
				
				echo "</tr>
						</tr>
				
				</tbody>
				
				
				<table class='table col-xs-12 col-md-12'>
				<thead>
					<tr>
						<th class='col-md-3 col-xs-3'> <button type='button' class='btn btn-danger col-xs-12 col-lg-12' data-toggle='modal' data-target='#mdexcluirset'  data-cod='" .$ipt_id. "'>Excluir SET</button>";
				
				?>
						</th>
						<th class="col-md-4 col-xs-4"> </th>
						<th class='col-md-5 col-xs-5'> <button type="submit" class="btn btn-primary col-xs-12 col-md-12">Salvar</button> </th>
						
					</tr>
					</thead>
				<tbody>
				
				</tbody>
			
			

		</form>
		
		<!-- INICIA MODAL ADD TREINO -->
		<div class="modal"  id="mdaddTreino" role="dialog">
			<div class="modal-dialog" role="document">			
				<div class="modal-content col-md-12">
				<form name="frm_cadastroTreino" method="post" action="php/registraexercicio.php">
					<div class="modal-header ">
						<h3 class="modal-title">Cadastrar Exercício</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body col-md-12">
					ADD TREINO
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary col-xs-5 col-md-5">Salvar</button>
						<button type="button" class="btn btn-secondary  col-xs-5 col-md-5" data-dismiss="modal">Cancelar</button>
					</div>
					<input type="hidden" name="ipt_cod" id="ipt_cod">
				</form>
				</div>
			</div>			
		</div>
		<!-- FIM MODAL ADD TREINO -->
		
		<!-- INICIA MODAL VER TREINO -->
		<div class="modal"  id="mdverTreino" role="dialog">
			<div class="modal-dialog" role="document">			
				<div class="modal-content col-md-12">
				
					<div class="modal-header ">
						<h3 class="modal-title">Cadastrar Exercício</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body col-md-12">
					<?php echo $nomeTreino1; ?>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary  col-xs-5 col-md-5">Salvar</button>
						<button type="button" class="btn btn-secondary  col-xs-5 col-md-5" data-dismiss="modal">Cancelar</button>
					</div>
					<input type="hidden" name="ipt_cod" id="ipt_cod">
				
				</div>
			</div>			
		</div>
		<!-- FIM MODAL VER TREINO -->
		
		<!-- Excluir  SET -->
			<div class="modal"  id="mdexcluirset" role="dialog">
			<div class="modal-dialog" role="document">			
				<div class="modal-content col-md-12">
				<form name="frm_cadastroTreino" method="post" action="php/registraexercicio.php">
					<div class="modal-header ">
						<h3 class="modal-title">Cadastrar Exercício</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body col-md-12">
					ver TREINO
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary  col-xs-5 col-md-5">Salvar</button>
						<button type="button" class="btn btn-secondary  col-xs-5 col-md-5" data-dismiss="modal">Cancelar</button>
					</div>
					<input type="hidden" name="ipt_cod" id="ipt_cod">
				</form>
				</div>
			</div>			
		</div>
		<!-- FIM MODAL ADD TREINO -->
		
	
		
	</div>
	
	<br><br>
	
	</body>
	
	<script type="text/javascript">
			$("#mdExcluissrSet").on("show.bs.modal", function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var cod = button.data("cod") // Extract info from data-* attributes
			  			  		  		
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal"s content. We"ll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			  modal.find(".modal-title").text("Deseja excluior o SET " + codTreino + "?")
			  modal.find("#txt_codSet").val(codTreino)
			})	
	</script>
	
</html>