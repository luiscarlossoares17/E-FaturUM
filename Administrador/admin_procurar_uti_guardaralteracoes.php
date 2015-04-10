<?php

include ("../mysqlconect.php");
include ("../funcoes.php");

$tipo = $_POST['tipo'];

$nif_s = $_POST['nif'];
$email_s = $_POST['email'];
$morada_s = $_POST['morada'];
$telefone_s = $_POST['telefone'];

$nif = mysql_real_escape_string($nif_s);
$email = mysql_real_escape_string($email_s);
$morada = mysql_real_escape_string($morada_s);
$telefone = mysql_real_escape_string($telefone_s);


try{

if ($tipo === 'Comerciante') {

    update('comerciante', 'email', $email, 'nif_comerciante', $nif);
    update('comerciante', 'morada', $morada, 'nif_comerciante', $nif);
    update('comerciante', 'telefone', $telefone, 'nif_comerciante', $nif);
    
    
} else {
    update('consumidor', 'email', $email, 'nif_consumidor', $nif);
    update('consumidor', 'morada', $morada, 'nif_consumidor', $nif);
    update('consumidor', 'telefone', $telefone, 'nif_consumidor', $nif);
}

return 1;
echo 1;

}

 catch (Exception $as){
return 0;
echo 0;
 }

?>
