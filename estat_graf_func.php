<?php

$server = new nusoap_client("http://localhost/E-FaturUM/Estatisticas/WebServidor.php", false);

$numfat = $server->call("NumeroFaturas");
$numfatnif = $server->call("NumeroFaturasNif");
$count2 = ($numfatnif * 100)/ $numfat;

$set1 = $server->call("NumeroFaturasRegistadasPorSetor1");
$set2 = $server->call("NumeroFaturasSetor2");
$set3 = $server->call("NumeroFaturasSetor3");
$set4 = $server->call("NumeroFaturasSetor4");

$count3 = ($set1 * 100)/ $numfat;
$count4 = ($set2 * 100)/ $numfat;
$count5 = ($set3 * 100)/ $numfat;
$count6 = ($set4 * 100)/ $numfat;

$setcont1 = $server->call("NumeroFaturasContribuinteSetor1");
$setcont2 = $server->call("NumeroFaturasContribuinteSetor2");
$setcont3 = $server->call("NumeroFaturasContribuinteSetor3");
$setcont4 = $server->call("NumeroFaturasContribuinteSetor4");

$count7 = ($setcont1 * 100)/ $numfatnif;
$count8 = ($setcont2 * 100)/ $numfatnif;
$count9 = ($setcont3 * 100)/ $numfatnif;
$count10 = ($setcont4 * 100)/ $numfatnif;

?>