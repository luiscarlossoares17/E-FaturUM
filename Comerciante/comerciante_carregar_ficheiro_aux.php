<?php

echo '<meta charset="UTF-8">';
require '../mysqlconect.php';

session_start();
$id_inser = $_SESSION['comerciante'];

if (isset($_FILES['file'])) {
    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $type = $_FILES['file']['type'];
    $extension = strtolower(substr($name, strpos($name, '.') + 1));

    if (!empty($name)) {
        if (($extension == 'txt') && ($type == 'text/plain')) {
            $ler = fopen($tmp_name, 'r');
            $dados = fread($ler, filesize($tmp_name));
            $dados_array = explode(',', $dados);

            $tipo = $dados_array[0];
            $nif_comerciante = $dados_array[3];
            $numero_fatura = $dados_array[4];
            $data_fatura = $dados_array[5];
            $valor = $dados_array[6];
            $taxa = $dados_array[7];
            $iva = $dados_array[8];
            $base = $dados_array[9];

            if (($tipo == 'Normal') || ($tipo == 'normal') || ($tipo == 'NORMAL')) {
                $nomeConsumidor = $dados_array[1];
                $nif_consumidor = $dados_array[2];
                $tipo_fatura = 'Normal';
            } else {
                $nomeConsumidor = NULL;
                $nif_consumidor = 999999999;                
                $tipo_fatura = 'Simples';
            }

            mysql_query("INSERT INTO fatura (tipo_fatura,data_fatura,data_registo,valor_fatura,numero_fatura,id_insercor,nome_consumidor,comerciante_nif_comerciante,consumidor_nif_consumidor) values ('" . $tipo_fatura . "','" . $data_fatura . "','" . date("Y-m-d") . "','" . $valor . "','" . $numero_fatura . "','" . $id_inser . "','" . $nomeConsumidor . "','" . $nif_comerciante . "','" . $nif_consumidor . "')");

            $res = mysql_fetch_array(mysql_query("SELECT id_fatura from Fatura WHERE numero_fatura LIKE '$numero_fatura' AND id_insercor LIKE '$id_inser' "));
            $idfat = $res['id_fatura'];
            mysql_query("INSERT INTO movimento (iva, taxa, total, base_tributavel, Fatura_id_fatura) values ('" . $iva . "','" . $taxa . "','" . $valor . "','" . $base . "','" . $idfat . "')");

            echo "<script language='javascript' type='text/javascript'> alert('Ficheiro submetido com sucesso.')</script>";
            echo "<script> window.location.href = 'ficheiro_carregar.php'; </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'> alert('O ficheiro deverá ser em formato .txt ')</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'> alert('Por favor escolha o ficheiro.')</script>";
    }
}
?> 