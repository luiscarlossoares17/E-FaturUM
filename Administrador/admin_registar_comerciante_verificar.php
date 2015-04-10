<?php

include ("../mysqlconect.php");
include ("../funcoes.php");

$nif_s = $_POST['nif'];
$nif = mysql_real_escape_string($nif_s);

$comerciante = procurar_bd('comerciante', 'nif_comerciante', $nif);
$consumidor = procurar_bd('consumidor', 'nif_consumidor', $nif);

if ($nif === $comerciante[0]) {
    
    return 1;
    
} else {
    if ($nif === $consumidor[0]) {
        return 1;
    } else {
        return 0;
    }
}
?>
