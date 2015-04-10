<?php

session_start();
include 'funcoes.php';
include 'mysqlconect.php';


if (isset($_SESSION['comerciante']) || isset($_SESSION['consumidor'])) {

    if (isset($_SESSION['comerciante'])) {
        $comerciante_nif = $_SESSION['comerciante'];
        $comerciante_estado = procurar_bd('comerciante', 'nif_comerciante', $comerciante_nif);
        if ($comerciante_estado[7] == 1) {
            
        } else {
            header('Location: index.php');
        }
    }

    if (isset($_SESSION['consumidor'])) {
        $consumidor_nif = $_SESSION['consumidor'];
        $consumidor_estado = procurar_bd('consumidor', 'nif_consumidor', $consumidor_nif);
        if ($consumidor_estado[7] == 1) {
            
        } else {
            header('Location: index.php');
        }
    } else {
        
    }
} else {
    header('Location: index.php');
}
?>
