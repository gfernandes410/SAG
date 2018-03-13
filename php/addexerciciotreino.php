<?php 
# Scrip para registrar treino no banco
# GAF - 12/03/17
 
# Chama a conexão com o banco
include ("conn.php");
include ("functions.php");



$ipt_codExer = $_POST['ipt_codExer'];
$ipt_codTreino = $_POST['ipt_codTreino'];
$ipt_exercicio = $_POST['ipt_codExer'];
$ipt_series = $_POST['ipt_series'];
$ipt_repeticoes = $_POST['ipt_repeticoes'];
$ipt_carga = $_POST['ipt_carga'];
$ipt_obs = $_POST['ipt_obs'];

$sequencia;	
$query = "select Max(sequencia) as seq from itemtreino where codtreino =" .$ipt_codTreino ;
$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
$row = mysql_fetch_array( $result_query );
$sequencia = $row['seq'] + 1;
	
if($ipt_series == '') {
	$ipt_series = 0;
}

if($ipt_carga == '') {
	$ipt_carga = 0;
}

$query = "INSERT INTO itemtreino (
		  `codtreino`,	
		  `sequencia`,
		  `codexercicio`,
		  `series`,
		  `repeticoes`,
		  `carga`,
		  `obs`
		  ) VALUES ( '" ;

$query = $query . $ipt_codTreino  . "','";
$query = $query . $sequencia . "','";
$query = $query . $ipt_exercicio . "',";
$query = $query . $ipt_series . ",'";
$query = $query . $ipt_repeticoes . "',";
$query = $query . $ipt_carga . ",'";
$query = $query . $ipt_obs . "')";


mysql_query($query);


header("Location: ../registraTreino.php?codTreino=". $ipt_codTreino ."&codExerc=0");
?>
