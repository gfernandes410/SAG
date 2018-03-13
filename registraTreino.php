	<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gabriel Fernandes">
	
	<!-- Descrição --> 	
	<!-- WebApp para controle de treinos da academia.  -->

    <title>Treino</title>

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
		
			<form name="frm_alteraTreino" method="post" action="php/alteratreino.php">
		
			<div class="form-group col-xs-12 col-lg-12">
				<label for="ipt_nome">
				<?php
				
				$var_codTreino = $_GET['codTreino'];
				$var_codExerc = $_GET['codExerc'];
				
			
			
				$query = "select codtreino, nome, obs from treino where codTreino =" . $var_codTreino;
				$result_query = mysql_query( $query ) or die(' Errso na query: ' . $query . ' ' . mysql_error() ); 
				$row = mysql_fetch_array( $result_query );
				
				echo "	Nome Treino</label>
					<input type='text' class='form-control' id='ipt_nome' name='ipt_nome'  value ='"  . $row['nome'] . "'>
			
				</div>";
			
				echo "
					<div class='form-group col-xs-12 col-lg-12'>
						<label for='ipt_obs'>Observação</label>
						<textarea rows='2' class='form-control' id='ipt_obs' name='ipt_obs'>". $row['obs'] ." </textarea>
					</div>
					
					<input type='hidden' class='custom-control-input' id='var_codTreino' name='var_codTreino' value='".$var_codTreino  ."'>
				
				"				
				?>
				<div class='ocultamobile col-lg-8' ></div>
				<button type='submit' class='btn btn-primary col-xs-12 col-lg-4' >Alterar Treino</button>
				
				
			</form>
						
			<table class='table table-inverse col-xs-12 col-md-12 '>
				<thead>
				<tr>
					<th  class='col-xs-6 col-md-6'>Exercício</th>
					<th class='col-xs-1 col-md-1'>Séries</th>
					<th class='col-xs-1 col-md-1'>Repetições</th>
					<th class='col-xs-1 col-md-1'>Carga</th>
					<th class='col-xs-2 col-md-2'>Obs</th>
				</tr>
				</thead>
				
			<tbody>
			
			
			
			<?php
			
			$var_codTreino = $_GET['codTreino'];
			$var_codExerc = $_GET['codExerc'];
			
			$query = "
				SELECT 	exercicio.exercicio, 
						itemtreino.series, 
						itemtreino.sequencia, 
						itemtreino.repeticoes,
						itemtreino.carga,
						itemtreino.obs
				FROM itemtreino 
				inner join exercicio  on exercicio.codexercicio = itemtreino.codexercicio
				WHERE itemtreino.codtreino = ".$var_codTreino . "
				order by itemtreino.sequencia";
				
							
				$result_query = mysql_query( $query ) or die(' Erro na squery: ' . $query . ' ' . mysql_error() ); 
				while ($row = mysql_fetch_array( $result_query )) {
					echo "<tr>";
						echo "<td >" . $row['exercicio'] .		"</td>";
						echo "<td >" . $row['series'] .			"</td>";
						echo "<td >" . $row['repeticoes'] .		"</td>";
						echo "<td >" . $row['carga'] . 			"</td>";
						echo "<td >" . $row['obs'] .			"</td>";
					echo "</tr> ";
				}
				
				echo "</tbody> </table>";

				if($var_codExerc == 0) {
					echo "
							<div class='ocultamobile col-md-8'></div>
							<a href='php/selecionaexercicio.php?codTreino=".$var_codTreino."' class='btn btn-primary col-xs-12 col-md-4'>Adicionar Exercício</a>
							";	
				} else { 
				
				$query =  'select exercicio from exercicio where codexercicio = ' .$var_codExerc;

				$result_query = mysql_query( $query ) or die(' Erro na squery: ' . $query . ' ' . mysql_error() ); 
				$row = mysql_fetch_array( $result_query );
				
					echo"
					
					<form name='frm_alteraTreino' method='post' action='php/addexerciciotreino.php'>
					
							<div class='form-group col-xs-12 col-md-12'>
									<label for='ipt_exercicio' >Exercicio</label>
									<input type='text' class='form-control' id='ipt_exercicio' readonly='readonly' name='ipt_exercicio' value  =".$row['exercicio'].">
								</div>
								
								<input type='hidden' class='form-control' id='ipt_codExer' name='ipt_codExer' value='".$var_codExerc."'>								
								
								<input type='hidden' class='form-control' id='ipt_codTreino' name='ipt_codTreino' value='".$var_codTreino."'>	
								
								<div class='form-group col-xs-12 col-md-4'>
									<label for='ipt_series' >Séries</label>
									<input type='text' class='form-control' id='ipt_series' name='ipt_series'>
								</div>
								
								<div class='form-group col-xs-12 col-md-4'>
									<label for='ipt_repeticoes' >Repetições</label>
									<input type='text' class='form-control' id='ipt_repeticoes' name='ipt_repeticoes'>
								</div>
								
								<div class='form-group col-xs-12 col-md-4'>
									<label for='ipt_carga' >Carga</label>
									<input type='text' class='form-control' id='ipt_carga' name='ipt_carga'>
								</div>
								
								<div class='form-group col-xs-12 col-md-12'>
									<label for='ipt_obs' >Obs</label>
									<textarea rows='2' class='form-control' id='ipt_obs' name='ipt_obs'> </textarea>
									
								</div>	
					
					<button type='submit' class='btn btn-primary'>Confirmar</button>
					</form>
					
					";
					
					
				}				
			
			?>
			
			
			
			
				
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