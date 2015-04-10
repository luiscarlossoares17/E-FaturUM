<?php

//ligacao a base de dados
include ("../mysqlconect.php");

$query_beneficio = ("SELECT consumidor.nif_consumidor, consumidor.nome, beneficio.valor_beneficio FROM `consumidor` JOIN `beneficio` Where `nif_consumidor` = `consumidor_nif_consumidor` ORDER BY beneficio.valor_beneficio DESC");
$beneficio = mysql_query($query_beneficio);

if (mysql_num_rows($beneficio) != 0) {
            echo"<table>
            <tr><td>NIF</td><td >Nome</td><td>Valor</td></tr>";

    while ($linha_com = mysql_fetch_row($beneficio)) {
        if ($linha_com[2] != 0) {
            echo "<tr></td><td>$linha_com[0]</td><td>$linha_com[1]</td><td>$linha_com[2] €</td></tr>";
        }
    }
    echo "<tr></tr>";
    echo "</table>";
} else {
    echo "Não existem Consumidores a auferir beneficios ";
}
?>
