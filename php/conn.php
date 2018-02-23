<?php

# Scrip para a conexão com o banco de dados
# GAF - 29/01/17

# Dados de acesso ao banco

error_reporting (E_ALL & ~ E_DEPRECATED);

$server = "localhost";
$user = "root";
$pw =  "";
$dbname = "academia";
$conn = mysql_connect($server,$user,$pw);
$db = mysql_select_db($dbname,$conn);
//$con = mysqli_connect($server,$user,$pw,$dbname);

?>