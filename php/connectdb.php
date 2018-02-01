<?php
# Scrip para a conexão com o banco de dados
# GAF - 29/01/17

# Dados de acesso ao banco
$user = "root"; 
$password = ""; 
$database = "academia"; 
$hostname = "localhost"; 

error_reporting(E_WARNING);

# Conecta com o servidor de banco de dados 
mysql_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' );
?>