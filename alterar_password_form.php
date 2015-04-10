<?php

session_start();
include ("mysqlconect.php");
include ("funcoes.php");

$password_s = $_POST['password'];
$password = mysql_real_escape_string($password_s);
$password_enc = md5($password);


if (isset($_SESSION['comerciante'])) {
    $nif = $_SESSION['comerciante'];
    $comerciante = procurar_bd('comerciante', 'nif_comerciante', $nif);
    if ($comerciante[1] === $password_enc) {
        echo "<script language='javascript'> alert('As password nao podem ser iguais.')</script>";
        echo "<script> window.location.href = 'alterar_password.php'; </script>";
    } else {
        $alteracao = update('comerciante', 'pass', $password_enc, 'nif_comerciante', $nif);

        update('comerciante', 'aceite', 2, 'nif_comerciante', $nif);
        echo "<script language='javascript'> alert('Sucesso na Alteracao da password.')</script>";
        echo "<script> window.location.href = 'Comerciante/comerciante_home.php'; </script>";
    }
} else {
    if (isset($_SESSION['consumidor'])) {
        $nif = $_SESSION['consumidor'];
        $consumidor = procurar_bd('consumidor', 'nif_consumidor', $nif);
        if ($consumidor[6] === $password_enc) {
            echo "<script language='javascript'> alert('As password nao podem ser iguais.')</script>";
            echo "<script> window.location.href = 'alterar_password.php'; </script>";
        } else {
            $alteracao = update('consumidor', 'pass', $password_enc, 'nif_consumidor', $nif);
  
                update('consumidor', 'aceite', 2, 'nif_consumidor', $nif);
                echo "<script language='javascript'> alert('Sucesso na Alteracao da password.')</script>";
                echo "<script> window.location.href = 'Consumidor/consumidor_home.php'; </script>";

            
        }
    }
}
?>
