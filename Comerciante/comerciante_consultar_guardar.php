<?php

include ("../mysqlconect.php");
include ("../funcoes.php");

$nif_s = $_POST['nif'];
$email_s = $_POST['email'];
$morada_s = $_POST['morada'];
$telefone_s = $_POST['telefone'];
$password_s = $_POST['password'];

$nif = mysql_real_escape_string($nif_s);
$email = mysql_real_escape_string($email_s);
$morada = mysql_real_escape_string($morada_s);
$telefone = mysql_real_escape_string($telefone_s);

if (isset($_POST['password'])) {
    $password_enc = mysql_real_escape_string($password_s);
    $password = md5($password_enc);

    update('comerciante', 'email', $email, 'nif_comerciante', $nif);
    update('comerciante', 'morada', $morada, 'nif_comerciante', $nif);
    update('comerciante', 'telefone', $telefone, 'nif_comerciante', $nif);
    update('comerciante', 'pass', $password, 'nif_comerciante', $nif);
} else {


    update('comerciante', 'email', $email, 'nif_comerciante', $nif);
    update('comerciante', 'morada', $morada, 'nif_comerciante', $nif);
    update('comerciante', 'telefone', $telefone, 'nif_comerciante', $nif);
}
?>