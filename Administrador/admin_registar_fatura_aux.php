<?php

include "../mysqlconect.php";
include "../funcoes.php";


$nome_consumidor_s = $_POST['fconsumidor'];
$nome_consumidor = mysql_real_escape_string($nome_consumidor_s);
$nif_consumidor_s = $_POST['nif_consumidor'];
$nif_consumidor = mysql_real_escape_string($nif_consumidor_s);
$nif_comerciante_s = $_POST['nif_comerciante'];
$nif_comerciante = mysql_real_escape_string($nif_comerciante_s);
$tipo_fatura = $_POST['tipo_fatura'];
$numero_fatura_s = $_POST['numero_fatura'];
$numero_fatura = mysql_real_escape_string($numero_fatura_s);
$data_fatura_s = $_POST['data_fatura'];
$data_fatura = mysql_real_escape_string($data_fatura_s);
$total_s = $_POST['total'];
$total = mysql_real_escape_string($total_s);
$taxa = $_POST['taxa'];
$iva = $_POST['valor_iva'];
$base = $_POST['base_tributavel'];

$select_fat = mysql_query("SELECT * FROM Fatura WHERE comerciante_nif_comerciante like '$nif_comerciante' AND numero_fatura like '$numero_fatura';");
$select_fatura = mysql_fetch_array($select_fat);



if (mysql_num_rows($select_fat) < 2) {

    if ($select_fatura[6] != $nif_comerciante) {

        if (($tipo_fatura) === 'Normal') {

            if (($nome_consumidor != "") && (strlen($nif_comerciante) == 9)) {



                mysql_query("INSERT INTO Fatura (tipo_fatura,data_fatura,data_registo,valor_fatura,numero_fatura,id_insercor,nome_consumidor,
                    comerciante_nif_comerciante,consumidor_nif_consumidor)
                    values ('$tipo_fatura','$data_fatura',' " . date("Y-m-d") . "','$total','$numero_fatura','$nif_comerciante','$nome_consumidor','$nif_comerciante'
                    ,'$nif_consumidor')");

                $id_fatura_s = mysql_query("SELECT id_fatura FROM Fatura WHERE numero_fatura like '$numero_fatura' AND comerciante_nif_comerciante like '$nif_comerciante'");
                $id_fatura = mysql_fetch_array($id_fatura_s);
                $id_fat = $id_fatura[0];

                mysql_query("INSERT INTO movimento (iva,taxa,total,base_tributavel,Fatura_id_fatura) values ('$iva','$taxa','$total','$base','$id_fat')");
                $id_setor_s = procurar_bd('comerciante', 'nif_comerciante', $nif_comerciante);
                $id_setor = $id_setor_s[9];
                $taxa_beneficio_s = procurar_bd('setor_actividade', 'id_setor', $id_setor);
                $taxa_beneficio = $taxa_beneficio_s[3];
                $valor_beneficio_fatura = (($iva * $taxa_beneficio) / 100);
                $beneficio_s = procurar_bd('beneficio', 'consumidor_nif_consumidor', $nif_consumidor);
                $beneficio = $beneficio_s[0];
                $valor_beneficio = $valor_beneficio_fatura + $beneficio;

                if ($beneficio === 250) {
                    
                } else {

                    if ($valor_beneficio >= 250) {
                        mysql_query("INSERT INTO beneficio(valor_beneficio, consumidor_nif_consumidor) VALUES ('250','$nif_consumidor')");
                        
                    } else {
                        mysql_query("INSERT INTO beneficio(valor_beneficio, consumidor_nif_consumidor) VALUES ('$valor_beneficio','$nif_consumidor')");
                    }
                    echo "<script language='javascript'> alert('Registo da sua fatura com sucesso.')</script>";
                    echo "<script> window.location.href = 'admin_registar_fatura.php'; </script>";
                }
            }
        } else {
            $nif_consumidor_vazio = NULL;

            mysql_query("INSERT INTO Fatura (tipo_fatura,data_fatura,data_registo,valor_fatura,numero_fatura,id_insercor,
                    comerciante_nif_comerciante,consumidor_nif_consumidor)
                    values ('$tipo_fatura','$data_fatura','" . date("Y-m-d") . "','$total','$numero_fatura','$nif_comerciante','$nif_comerciante'
                    ,'$nif_consumidor_vazio')");

            $id_fatura_s = mysql_query("SELECT id_fatura FROM Fatura WHERE numero_fatura like '$numero_fatura' AND comerciante_nif_comerciante like '$nif_comerciante'");
            $id_fatura = mysql_fetch_array($id_fatura_s);
            $id_fat = $id_fatura[0];
            mysql_query("INSERT INTO movimento (iva,taxa,total,base_tributavel,Fatura_id_fatura) values ('$iva','$taxa','$total','$base','$id_fat')");
        }
    } else {

        echo "<script language='javascript'> alert('Voce ja introduziu essa fatura.')</script>";
        echo "<script> window.location.href = 'admin_registar_fatura.php'; </script>";
    }
} else {
    echo "<script language='javascript'> alert('Voce ja introduziu essa fatura.')</script>";
    echo "<script> window.location.href = 'admin_registar_fatura.php'; </script>";
}
?>