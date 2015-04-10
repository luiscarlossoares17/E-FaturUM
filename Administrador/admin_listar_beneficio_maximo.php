<?php

//ligacao a base de dados
include ("../mysqlconect.php");

$ben_max_query = ("SELECT consumidor.nif_consumidor, consumidor.nome, beneficio.valor_beneficio FROM `consumidor` JOIN `beneficio` Where `nif_consumidor` = `consumidor_nif_consumidor` AND beneficio.valor_beneficio = 250");
$ben_max = mysql_query($ben_max_query);

if (mysql_num_rows($ben_max) != 0) {
    echo"<table>
            <tr><td>NIF</td><td >Nome</td><td>Valor</td></tr>";
    while ($linha_com_max = mysql_fetch_row($ben_max)) {
        if ($linha_com_max[2] != 0) {
            echo "<tr></td><td>$linha_com_max[0]</td><td>$linha_com_max[1]</td><td>$linha_com_max[2] €</td></tr>";
        }
    }
    echo "<tr></tr>";
    echo "</table>";
} else {
    echo "Não existem Consumidores a auferir beneficio máximo ";
}
?>
