<?php

//ligacao a base de dados
include ('../mysqlconect.php');

//Pagina de funcoes
include ('../funcoes.php');



$tipo = $_POST['tipo'];
$nif = $_POST['nif'];


if ($tipo === 'Comerciante') {

    
    mysql_query("DELETE FROM `movimento` WHERE `Fatura_id_fatura` like $id_fatura");
    mysql_query("DELETE FROM `fatura` WHERE `comerciante_nif_comerciante` like $nif_apagar");
    mysql_query("DELETE FROM `comerciante` WHERE `nif_comerciante` like $nif_apagar");

    
} else {

    if ($tipo_apagar === 'Consumidor') {

        procurar_com_query("SELECT * FROM `fatura` WHERE `consumidor_nif_consumidor` like $nif_apagar");
        $id_fatura = $GLOBALS['resultado_pesq_query'][0];


        mysql_query("DELETE FROM `movimento` WHERE `Fatura_id_fatura` like $id_fatura");
        mysql_query("UPDATE `fatura` SET `consumidor_nif_consumidor` = NULL WHERE `consumidor_nif_consumidor` like $nif_apagar");
        mysql_query("DELETE FROM `beneficio` WHERE `consumidor_nif_consumidor` like $nif_apagar");
        mysql_query("DELETE FROM `consumidor` WHERE `nif_consumidor` like $nif_apagar");
    }
}
?>

Incompleto