<?php

include ("mysqlconect.php");
include ("funcoes.php");

if (isset($_SESSION['admin'])) {
    echo $_SESSION['admin'];
} else {

    if (isset($_SESSION['comerciante'])) {

        $comerciante = procurar_bd('comerciante', 'nif_comerciante', $_SESSION['comerciante']);
        echo $comerciante[2];
    } else {

        $consumidor = procurar_bd('consumidor', 'nif_consumidor', $_SESSION['consumidor']);
        echo $consumidor[1];
    }
}
?>
