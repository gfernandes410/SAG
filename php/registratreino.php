<?php 
# Scrip para registrar treino no banco
# GAF - 29/01/17
 
# Chama a conexão com o banco
include "connectdb.php";

$ipt_exercicio = $_POST['ipt_exercicio'];
$ipt_series = $_POST['ipt_series'];
$ipt_repeticoes = $_POST['ipt_repeticoes'];
$ipt_carga = $_POST['ipt_carga'];
$ipt_obs = $_POST['ipt_obs'];

$query = "INSERT INTO exercicio (
		  `exercicio`,
		  `series`,
		  `repeticoes`,
		  `carga`,
		  `obs`) VALUES ( '";

$query = $query . $ipt_exercicio  . "','";
$query = $query . $ipt_series . "','";
$query = $query . $ipt_repeticoes . "','";
$query = $query . $ipt_carga . "','";
$query = $query . $ipt_obs . "')";

echo $query;

mysql_query($query); 
?>
