<?php 
# Scrip para registrar um novo set no  banco
# GAF - 02/03/17
 
# Chama a conexão com o banco
include ("conn.php");

#registra a hora atual$datahora;
date_default_timezone_set('America/Sao_Paulo'); 
$datahora = date('Y-m-d H:i');

$ipt_nome = $_POST['ipt_nome'];


$query = "INSERT INTO settreino (
		 nome,datahora) VALUES ( '" ;

$query = $query . $ipt_nome  . "','";
$query = $query . $datahora . "')";

mysql_query($query); 



header("Location: ../set.php");
?>
