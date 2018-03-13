<?php 
# Scrip para registrar treino no banco
# GAF - 29/01/17
 
# Chama a conexão com o banco
include ("conn.php");

#registra a hora atual$datahora;
date_default_timezone_set('America/Sao_Paulo'); 
$datahora = date('Y-m-d H:i');

$ipt_nome = $_POST['ipt_nome'];
$ipt_obs = $_POST['ipt_obs'];
$var_codTreino = $_POST['var_codTreino'];

$query = "UPDATE treino set ";
$query = $query . " nome = '" . $ipt_nome . "',";
$query = $query . " obs = '" . $ipt_obs ;
$query = $query . "' where codtreino = " . $var_codTreino;

mysql_query($query); 


header("Location: ../registraTreino.php?codTreino=". $var_codTreino . "&codExerc=0");
?>
