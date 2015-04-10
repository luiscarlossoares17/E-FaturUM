<?php

include ("../mysqlconect.php");
include ("../funcoes.php");

$id_s = $_POST['id'];
$nome_s = $_POST['nome'];
$perc_iva_s = $_POST['percentagem_iva'];
$perc_ben_s = $_POST['beneficio'];

$id = mysql_real_escape_string($id_s);
$nome = mysql_real_escape_string($nome_s);
$perc_iva = mysql_real_escape_string($perc_iva_s);
$perc_ben = mysql_real_escape_string($perc_ben_s);

update('setor_actividade', 'nome_setor', $nome, 'id_setor', $id);
update('setor_actividade', 'iva', $perc_iva, 'id_setor', $id);
update('setor_actividade', 'percentagem_beneficio', $perc_ben, 'id_setor', $id);
?>
