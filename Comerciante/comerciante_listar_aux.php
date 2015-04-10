<?php

if (!empty($_SESSION['consumidor'])) {
    $uti = $_SESSION['consumidor'];
    $var = 'consumidor_nif_consumidor';
} else {
    if (!empty($_SESSION['comerciante'])) {
        $uti = $_SESSION['comerciante'];
        $var = 'comerciante_nif_comerciante';
    }
}

include "../mysqlconect.php";
echo "<form name='selecionar' method='post' action='comerciante_editar_faturas.php'>";
echo "<table class='designtabela'>
    <tr>
    <th>ID da Fatura</th>
    <th>Numero da Fatura</th>
    <th>Tipo de Fatura</th>
    <th>Valor</th>
    <th>NIF Comerciante</th>
    <th>Nome Comerciante</th>
    <th>NIF Consumidor</th>
    <th>Nome do Consumidor</th>
    <th>Data da Fatura</th>
    <th>Data de Registo</th>
    <th>Setor De Actividade</th>
    <th></th>
    </tr>";

$sql = "SELECT * FROM fatura WHERE comerciante_nif_comerciante = $uti";
$resultado = mysql_query($sql);

While ($registo = mysql_fetch_array($resultado)) {
    $id = $registo["id_fatura"];
    $nf = $registo["numero_fatura"];
    $tf = $registo["tipo_fatura"];
    $vf = $registo["valor_fatura"];
    $ncome = $registo["comerciante_nif_comerciante"];
    $ncons = $registo["consumidor_nif_consumidor"];
    $df = $registo["data_fatura"];
    $dr = $registo["data_registo"];

    $sql2 = "SELECT nome FROM consumidor WHERE (nif_consumidor = $ncons)";
    $sql3 = "SELECT nome, setor_actividade_id_setor FROM comerciante WHERE (nif_comerciante = $ncome)";
    $resultado2 = mysql_query($sql2);
    $resultado3 = mysql_query($sql3);


    While ($registo2 = mysql_fetch_array($resultado2) and $registo3 = mysql_fetch_array($resultado3)) {
        $nome = $registo2["nome"];
        $idset = $registo3["setor_actividade_id_setor"];
        $nome_com = $registo3["nome"];

        $sql4 = "SELECT nome_setor FROM setor_actividade WHERE (id_setor = $idset)";
        $resultado4 = mysql_query($sql4);

        While ($registo4 = mysql_fetch_array($resultado4)) {
            $ns = $registo4["nome_setor"];
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nf . "</td>";
            echo "<td>" . $tf . "</td>";
            echo "<td>" . $vf . '&nbsp€' . "</td>";
            echo "<td>" . $ncome . "</td>";
            echo "<td>" . $nome_com . "</td>";
            echo "<td>" . $ncons . "</td>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $df . "</td>";
            echo "<td>" . $dr . "</td>";
            echo "<td>" . $ns . "</td>";
            echo"<td><input type='radio' name='id[]' value='$id'></td>";
            echo "</tr>";
        }
    }
}
echo "</table><input type='submit' name='aceitar' value='Editar!'></form>";
?>