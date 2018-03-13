<?php 
# Scrip para registrar treino no banco
# GAF - 29/01/17
 
# Chama a conexão com o banco
include ("conn.php");

#registra a hora atual$datahora;
date_default_timezone_set('America/Sao_Paulo'); 
$datahora = date('Y-m-d H:i');

$ipt_nome = $_POST['ipt_nome'];
$ipt_datainicial = $_POST['ipt_datainicial'];
$ipt_datafinal = $_POST['ipt_datafinal'];
$ipt_obs = $_POST['ipt_obs'];
$ipt_id = $_POST['ipt_id'];

$query = "UPDATE settreino set ";
$query = $query . " nome = '" . $ipt_nome . "',";
$query = $query . " datainicial = '" . $ipt_datainicial . "',";
$query = $query . " datafinal = '" . $ipt_datafinal . "',";
$query = $query . " obs = '" . $ipt_obs ;
$query = $query . "' where id = " . $ipt_id;


mysql_query($query); 


header("Location: ../set.php");
?>
