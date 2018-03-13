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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>

<?php
	
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','academia');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="
SELECT 	exercicio.exercicio, 
		itemtreino.codtreino, 
		itemtreino.sequencia, 
		itemtreino.repeticoes,
		itemtreino.carga,
		itemtreino.obs
FROM itemtreino 
inner join exercicio  on exercicio.codexercicio = itemtreino.codexercicio
WHERE itemtreino.codtreino = ".$q . "
order by itemtreino.sequencia";

$result = mysqli_query($con,$sql);
echo "<table class='table table-inverse col-xs-12 col-md-12 '>
<tr>
<th  class='col-xs-6 col-md-6'>Exercício</th>
<th class='col-xs-1 col-md-1'>Séries</th>
<th class='col-xs-1 col-md-1'>Repetições</th>
<th class='col-xs-1 col-md-1'>Carga</th>
<th class='col-xs-2 col-md-2'>Obs</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
	
	
    echo "<tr>";
	echo "<td >" . $row['exercicio'] . "</td>";
    echo "<td >" . $row['codtreino'] . "</td>";
    echo "<td >" . $row['repeticoes'] . "</td>";
	echo "<td >" . $row['carga'] . "</td>";
	echo "<td >" . $row['obs'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>