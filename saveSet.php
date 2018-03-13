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
		
		<form name="frm_cadastroSet" method="post" action="php/registraset.php">
		
			<div class="form-group col-xs-12 col-lg-4">
				<label for="ipt_nome">
				<?php
				
				$ipt_id = $_GET['ipt_id'];												
		
				$query = "select nome, datainicial, datafinal, ativo, obs from settreino where id =" . $ipt_id;
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				$row = mysql_fetch_array( $result_query );
				
				echo "	Nome SET</label>
				<input type='text' class='form-control' id='ipt_nome' name='ipt_nome' readonly='readonly' value ='"  . $row['nome'] . "'>
			</div>"  ;
			
				echo "
					<div class='form-group col-xs-12 col-lg-4'>
						<label for='ipt_dtinicial'>Data Inicial</label>
						<input type='date' class='form-control' id='ipt_datainicial' name='ipt_datainicial' value  = '". $row['datainicial'] ."'>
					</div>
			
					<div class='form-group col-xs-12 col-lg-4'>
						<label for='ipt_dtfinal'>Data Final</label>
						<input type='date' class='form-control' id='ipt_datafinal' name='ipt_datafinal' value  = '". $row['datafinal'] ."'>
					</div>

					<div class='form-group col-xs-12 col-lg-12'>
						<label for='ipt_obs'>Observação</label>
						<textarea rows='2' class='form-control' id='ipt_obs' name='ipt_obs'>". $row['obs'] ." </textarea>
					</div>
					
					<div class='form-group col-xs-12 col-lg-12 custom-checkbox'>
						<input type='checkbox' class='custom-control-input' id='ipt_ativo' name='ipt_ativo' ";
						if ($row['ativo']=='A'){
							echo "checked";
						}
					echo	">
						<label class='custom-control-label' for='customCheck1'>Treino Ativo</label>
					</div>
					<input type='hidden' class='custom-control-input' id='ipt_id' name='ipt_id' value='".$ipt_id  ."'>
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
			
			<div id='txtHint'></div>
			</form>
			<?php
			
				$ipt_id = $_GET['ipt_id'];	
	
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
							<form name='frm_addTreino1' method='post' action='alteratreino.php'>
							
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_id  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='1'>
								<span class='glyphicon glyphicon-plus' data-toggle='modal' onClick='document.frm_addTreino1.submit()'></span>
						
							</form>
							</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  onclick='showTreino(". $row['treino1'] . ")'> 
							</th>";
					};
				echo "</tr>";						
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 2</th>
							<th class='col-md-2 col-xs-2'>". $row['treino2']."</th>
							<th class='col-md-7 col-xs-7'>". $nomeTreino2 ."</th>";
				if ($row['treino2'] == ''){
						echo	"<th class='col-md-1 col-xs-1'>
							<form name='frm_addTreino2' method='post' action='alteratreino.php'>
							
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_id  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='2'>
								<span class='glyphicon glyphicon-plus' data-toggle='modal' onClick='document.frm_addTreino2.submit()'></span>
						
							</form>
							</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  onclick='showTreino(". $row['treino2'] . ")'> 
							</th>";
					};
				echo "</tr>";		
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 3</th>
							<th class='col-md-2 col-xs-2'>". $row['treino3']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino3 ."</th>";
				if ($row['treino3'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>
							<form name='frm_addTreino3' method='post' action='alteratreino.php'>
							
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_id  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='3'>
								<span class='glyphicon glyphicon-plus' data-toggle='modal' onClick='document.frm_addTreino3.submit()'></span>
						
							</form>
							</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  onclick='showTreino(". $row['treino3'] . ")'> 
							</th>";
					};
				echo "</tr>";		
				
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 4</th>
							<th class='col-md-2 col-xs-2'>". $row['treino4']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino4 ."</th>";
				if ($row['treino4'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>
							<form name='frm_addTreino4' method='post' action='alteratreino.php'>
							
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_id  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='4'>
								<span class='glyphicon glyphicon-plus' data-toggle='modal' onClick='document.frm_addTreino4.submit()'></span>
						
							</form>
							</th>";
				}  else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  onclick='showTreino(". $row['treino4'] . ")'> 
							</th>";
					};
				echo "</tr>";	
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 5</th>
							<th class='col-md-2 col-xs-2'>". $row['treino5']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino5 ."</th>";
				if ($row['treino5'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>
							<form name='frm_addTreino5' method='post' action='alteratreino.php'>
							
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_id  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='5'>
								<span class='glyphicon glyphicon-plus' data-toggle='modal' onClick='document.frm_addTreino5.submit()'></span>
						
							</form>
							</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  onclick='showTreino(". $row['treino5'] . ")'> 
							</th>";
					};
				echo "</tr>";	
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 6</th>
							<th class='col-md-2 col-xs-2'>". $row['treino6']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino6 ."</th>";
				if ($row['treino6'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>
							<form name='frm_addTreino6' method='post' action='alteratreino.php'>
							
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_id  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='6'>
								<span class='glyphicon glyphicon-plus' data-toggle='modal' onClick='document.frm_addTreino6.submit()'></span>
						
							</form>
							</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  onclick='showTreino(". $row['treino6'] . ")'> 
							</th>";
					};
				echo "</tr>";		
						
				echo "	<tr>
							<th class='col-md-1 col-xs-1'> Treino 7</th>
							<th class='col-md-2 col-xs-2'>". $row['treino7']."</th>
							<th class='col-md-7	 col-xs-7'>". $nomeTreino7 ."</th>";
				if ($row['treino7'] == ''){			
					echo	"<th class='col-md-1 col-xs-1'>
							<form name='frm_addTreino7' method='post' action='alteratreino.php'>
							
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_id  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='7'>
								<span class='glyphicon glyphicon-plus' data-toggle='modal' onClick='document.frm_addTreino7.submit()'></span>
						
							</form>
							</th>";
				} else{
					echo	"<th class='col-md-1 col-xs-1'>
							<span class='glyphicon glyphicon-search'  onclick='showTreino(". $row['treino7'] . ")'> 
							</th>";
					};
				echo "</tr>		
						
				
				</tbody>
			 
				
				<table class='table col-xs-12 col-md-12'>
				<thead>
					<tr>
						<th class='col-md-3 col-xs-3'> <button type='button' class='btn btn-danger col-xs-12 col-lg-12' data-toggle='modal' data-target='#mdexcluirset'  data-cod='" .$ipt_id. "'>Excluir SET</button>";
				
				?>
						</th>
						<th class="col-md-4 col-xs-4"> </th>
						<th class='col-md-5 col-xs-5'>
							<input type="button" onClick="document.frm_cadastroSet.submit()" value="Salvar"  class="btn btn-primary col-xs-12 col-md-12"></input> 
						</th>
						
					</tr>
					</thead>
				<tbody>
				
				</tbody>
		
		
		
	
	</div>
	
	<br><br>
	
	</body>
		<script type="text/javascript">
					
		function showTreino(str) {
			if(document.getElementById("txtHint").style.visibility == "hidden"){
				document.getElementById("txtHint").style.visibility = "visible";
				
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
					
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","php/getTreino.php?q="+str,true);
				xmlhttp.send();				
}
			else{
				document.getElementById("txtHint").style.visibility = "hidden";
				document.getElementById("txtHint").innerHTML = "";
				return;
			}

			
}
	</script>
	
</html>