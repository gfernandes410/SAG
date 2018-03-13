<?php 
# Scrip para registrar treino no banco
# GAF - 29/01/17
 
# Chama a conexão com o banco
include ("conn.php");

#registra a hora atual$datahora;
date_default_timezone_set('America/Sao_Paulo'); 
$datahora = date('Y-m-d H:i');

$ipt_exercicio = $_POST['ipt_exercicio'];
$ipt_obs = $_POST['ipt_obs'];
$ipt_cod = $_POST['ipt_cod'];

$query = "select 1 from exercicio where codexercicio = '";
$query =  $query . $ipt_cod ."'";
$result_query = mysql_query( $query );



	if ($row = mysql_fetch_array( $result_query ) <> ""){
		$query = "UPDATE exercicio set exercicio = '";		
		$query = $query . $ipt_exercicio . "', obs = '";
		$query = $query . $ipt_obs . "' where codexercicio = ";
		$query = $query . $ipt_cod;		mysql_query($query); 
		
	} else {
		$query = "INSERT INTO exercicio (
				  `exercicio`,	
				  `obs`,`datahora`) VALUES ( '" ;

		$query = $query . $ipt_exercicio  . "','";
		$query = $query . $ipt_obs . "','";
		$query = $query . $datahora . "')";
		mysql_query($query);
		
	}

header("Location: ../exercicio.php");
?>
