<?php

include '../mysqlconect.php';

$nifprocura = ($_POST['username']);

if (isSet($nifprocura)) {

    $usernames = mysql_query("SELECT nif_comerciante FROM comerciante WHERE nif_comerciante = '$nifprocura'");
    $usernames1 = mysql_query("SELECT nif_consumidor FROM consumidor WHERE nif_consumidor = '$nifprocura'");
    $teste = mysql_num_rows($usernames);
    $teste1 = mysql_num_rows($usernames1);

    if ($teste > 0) {
        echo '<font color="red">The nickname <STRONG>' . $nifprocura . '</STRONG> is already in use.</font>';
    } elseif ($teste1 > 0) {
        echo '<font color="red">The nickname <STRONG>' . $nifprocura . '</STRONG> is already in use.</font>';
    } else {
        echo 'OK';
    }
}
