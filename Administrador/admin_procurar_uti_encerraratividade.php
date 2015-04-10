<?php
include ("../mysqlconect.php");

$nif = $_POST['nif'];

$update = "UPDATE comerciante SET encerrado = 1 WHERE nif_comerciante like $nif";
mysql_query($update) or die("Ocorreu algum erro");


?>