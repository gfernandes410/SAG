<?php	
include ("php/conn.php");
error_reporting (E_ALL & ~ E_DEPRECATED);

	
	$html;
	
	$html = '
	<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gabriel Fernandes">
	
	<!-- Descrição -->
	<!-- WebApp para controle de treinos da academia.  -->

    <title>Treino </title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <!-- Customize -->
    <link href="css/cssAux.css" rel="stylesheet">
	
	<!--Bibliotecas-->
	<?php
		include ("conn.php");
	?>
	
	</head>

	<body>

	<div class="container">
	
		<!-- Chama NavBar header
		<div class="col-md-12">
			<object width="100%" data="components/header.html">
				<embed width="100%"  height="100%" scr="components/header.html"> </embed>
			</object>
		</div>
		 -->
		<iframe id="header" width="100%" src="components/header.html" frameborder="0" allowtransparency="true">
		</iframe>
		
		
		<!-- Conteudo tabela -->
		<div>	
		
			<table class="table col-xs-12 col-md-12">
				<thead>
					<tr>
					  <th class="col-md-2 col-xs-1">Cod.</th>
					  <th class="col-md-6 col-xs-9">Exercício</th>
					  <th class="col-md-4 col-xs-1">Obs</th>
					  <th class="col-md-4 col-xs-1">Alterar</th>
					</tr>
					</thead>
				<tbody>
	';
	
	$query = "select codexercicio, exercicio, obs from exercicio";
					
	$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
	while ($row = mysql_fetch_array( $result_query )) {
		//echo "teste".$row['codexercicio']; 
		$html = $html . "<tr><td>".$row['codexercicio']."</td><td>".$row['exercicio']."</td><td>".$row['obs']."</td>
		<th class='col-md-4 col-xs-1'><input type='button' class='btn btn-primary col-md-12 col-xs-12'data-toggle='modal' data-target='#mdexercicio' data-cod=' ".$row['codexercicio']."' data-exercicio='".$row['exercicio'] ."' data-obs='".$row['obs'] ."' value='Editar' ></th>
		</tr>";
	
	}
	
	$html = $html . 
'			   </tbody>
			</table>
			
			<a class="col-md-8 ocultamobile"></a>
			<input type="button" class="btn btn-primary col-md-4 col-xs-12" data-toggle="modal" value="Adicionar Exercício"  data-target="#mdexercicio">
		
		</div>
				
		<!-- CADASTRA MODAL -->
		<div class="modal"  id="mdexercicio" role="dialog">
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

						<!-- INPUT NOME -->
						<div class="form-group col-xs-12 col-md-12">
							<label for="ipt_exercicio">Nome</label>
							<input type="text" class="form-control" id="ipt_exercicio"  name="ipt_exercicio" placeholder="Nome do exercicio">
						</div>
					
						<!-- INPUT OBS -->
						<div class="form-group col-xs-12 col-md-12">
							<label for="ipt_obs">Observação</label>
							<input type="text" class="form-control" id="ipt_obs" name="ipt_obs" placeholder="Observações">
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
';

echo $html;



?>