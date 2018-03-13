<?php
function buscaUltimoIdExercicio() {
	include ("php/conn.php");	
	
	$max;	
	$query = "select max(codexercicio) from  exercicio";
	$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
	$row = mysql_fetch_array( $result_query );
	$max = $row['max(codexercicio)'] + 1;
	
	echo $max;	
}

function buscaUltimaSeqItemTreino($codTreino) {
include ("conn.php");	

$max;	
$query = "select Max(sequencia) as seq from itemtreino where codtreino =" .$codTreino ;
$result_query = mysql_query( $query ) or die(' Erro na query: ' . $query . ' ' . mysql_error() ); 
$row = mysql_fetch_array( $result_query );
$max = $row['seq'] + 1;

return $max;

}

?>
