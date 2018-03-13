	<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gabriel Fernandes">
	
	<!-- Descrição -->
	<!-- WebApp para controle de treinos da academia.  -->

    <title>Adcionar Treino ao SET <?php echo $_POST['ipt_idSet'];?> </title>

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
		
		
		
			<div class="form-group col-xs-12 col-lg-12">	
						
			<table class="table col-xs-12 col-md-12">
				<thead>
					<tr>
						<th class="col-md-1 col-xs-1">Cod. Treino</th>
						<th class="col-md-9 col-xs-6">Nome</th>
						<th class="col-md-2 col-xs-5"></th>
					</tr>
					</thead>
				<tbody>
			
			<div id='txtHint'></div>
			
			<?php
			
				$ipt_idSet = $_POST['ipt_idSet'];
				$ipt_idTreino = $_POST['ipt_idTreino'];
			
				$query = "select codtreino, nome from treino order by codtreino";
									
				$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
				while ($row = mysql_fetch_array( $result_query )) {
							
					$codtreino  = ltrim($row['codtreino'], '0');
					
					echo  "	<tr>
						<form name='frm_settreino' method='post' action='php/settreino.php'>
								<input type='hidden' class='custom-control-input' id='ipt_idSet' name='ipt_idSet' value='". $ipt_idSet  ."'>
								<input type='hidden' class='custom-control-input' id='ipt_idTreino' name='ipt_idTreino' value='".$ipt_idTreino ."'>
								<input type='hidden' class='custom-control-input' id='ipt_codtreino' name='ipt_codtreino' value='".$codtreino."'>
								<td>".$codtreino ."</td>
								<td>".$row['nome']."</td>
								<td>
									<button type='submit' class='btn btn-primary'>Adicionar</button>
								</td>
								<td>
								<span class='glyphicon glyphicon-search'  onclick='showTreino(". $codtreino . ");'> 
								</td>
						</form>		
							</tr>";
				}
				?>
				
				</tbody>
		</form>
		
		

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