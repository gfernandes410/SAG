<?php 
# Scrip para registrar um novo set no  banco
# GAF - 09/03/17
 
# Chama a conexão com o banco
include ("conn.php");


$query = "INSERT INTO treino (
		 nome) VALUES ( 'Insira um nome')";

mysql_query($query); 

$query = "SELECT codtreino from treino where nome = 'Insira um nome'";


mysql_query($query); 

$result_query = mysql_query( $query ); 
$row = mysql_fetch_array( $result_query );


header("Location: ../registraTreino.php?codTreino=".$row['codtreino']."&codExerc=0");
?>
