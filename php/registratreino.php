<?php 
# Scrip para registrar treino no banco
# GAF - 29/01/17
 
# Chama a conexão com o banco
include ("conn.php");

$ipt_exercicio = $_POST['ipt_exercicio'];
$ipt_obs = $_POST['ipt_obs'];

$query = "INSERT INTO exercicio (
		  `exercicio`,	
		  `obs`) VALUES ( '" ;

$query = $query . $ipt_exercicio  . "','";
$query = $query . $ipt_obs . "')";

#echo $query;
mysql_query($query); 
?>
