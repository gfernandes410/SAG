<?php
# Scrip para registrar treino no banco
# GAF - -7/03/17

# Chama a conexão com o banco
include ("conn.php");

$ipt_idSet = $_POST['ipt_idSet'];
$ipt_idTreino = $_POST['ipt_idTreino'];
$ipt_codtreino = $_POST['ipt_codtreino'];

echo "ipt_idSet " . $ipt_idSet ; 
echo "<br></br>";
echo "ipt_idTreino " . $ipt_idTreino ;
echo "<br></br>";
echo "ipt_codtreino " . $ipt_codtreino ;
echo "<br></br>";
echo "<br></br>";


$query = "update settreino
set treino". $ipt_idTreino . " = " . $ipt_codtreino   . "  where id =" . $ipt_idSet  ;

echo $query;

mysql_query($query); 

header("Location: ../saveSet.php?ipt_id=".$ipt_idSet);
?>