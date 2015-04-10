<?php

session_start();
include '../mysqlconect.php';


$idfac = ($_POST['valoredit']);
$nome_ed = ($_POST['nome']);
$nif_con_ed = ($_POST['nifcon']);
$nif_com_ed = ($_POST['nifcom']);
$tipo_fat_ed = ($_POST['tipo_fat']);
$numero_ed = ($_POST['numero_fatura']);
$data_ed = ($_POST['data_fatura']);
$valor_ed = ($_POST['total']);
$taxa_ed = ($_POST['taxa']);
$valor_iva_ed = ($_POST['valor_iva']);
$baseTributavel_ed = ($_POST['base_tributavel']);
$valoredit = ($_POST['valoredit']);





$sql10 = "SELECT * FROM consumidor WHERE nif_consumidor like '$nif_con_ed'";
$sql100 = mysql_query($sql10);



    if ((($_POST['tipo_fat']) == 'Normal') && (mysql_num_rows($sql100) > 0)) {

        if ((($_POST['nome']) != "") && (strlen($_POST['nifcon']) == 9) && (is_numeric($_POST['nifcon']))) {

            mysql_query("UPDATE `fatura` SET `tipo_fatura`='$tipo_fat_ed',
                 `data_fatura`='$data_ed',`valor_fatura`='$valor_ed',`numero_fatura`='$numero_ed',
                `nome_consumidor`='$nome_ed',
                `consumidor_nif_consumidor`='$nif_con_ed' WHERE id_fatura like '$idfac'");

            mysql_query("UPDATE `movimento` SET `iva`='$valor_iva_ed',`taxa`='$taxa_ed',`total`='$valor_ed',`base_tributavel`='$baseTributavel_ed' WHERE `Fatura_id_fatura` like '$idfac'");

            echo "<script language='javascript'> alert('A sua fatura foi editada com sucesso.')</script>";
            echo "<script> window.location.href = 'comerciante_home.php'; </script>";
        } elseif ((strlen($_POST['nifcom']) == 9) && (is_numeric($_POST['nifcom']))) {

            $nome_vaz = NULL;
            
            mysql_query("UPDATE `fatura` SET `tipo_fatura`='$tipo_fat_ed',
                 `data_fatura`='$data_ed',`valor_fatura`='$valor_ed',`numero_fatura`='$numero_ed',
                `nome_consumidor`='$nome_vaz',
                `consumidor_nif_consumidor`='$nif_con_ed' WHERE id_fatura like '$idfac'");

            mysql_query("UPDATE `movimento` SET `iva`='$valor_iva_ed',`taxa`='$taxa_ed',`total`='$valor_ed',
                `base_tributavel`='$baseTributavel_ed' WHERE `Fatura_id_fatura` like '$idfac'");

            echo "<script language='javascript'> alert('A sua fatura foi editada com sucesso.')</script>";
            echo "<script> window.location.href = 'comerciante_home.php'; </script>";
    } else {
        echo "<script language='javascript'> alert('Verifique dados.')</script>";
            echo "<script> window.location.href = 'comerciante_home.php'; </script>";
    }
    //}
        
    } elseif ($tipo_fat_ed == 'Simplificada') {

            $nome_vazz = NULL;
            $nif_vaz = '999999999';
        
            
            mysql_query("UPDATE `fatura` SET `tipo_fatura`='$tipo_fat_ed',`data_fatura`='$data_ed',`valor_fatura`='$valor_ed',`numero_fatura`='$numero_ed',`nome_consumidor`='$nome_vazz',`consumidor_nif_consumidor`='$nif_vaz' WHERE `id_fatura` like  '$idfac'");


            mysql_query("UPDATE `movimento` SET `iva`='$valor_iva_ed',`taxa`='$taxa_ed',`total`='$valor_ed',
                `base_tributavel`='$baseTributavel_ed' WHERE `Fatura_id_fatura` like '$idfac'");

            echo "<script language='javascript'> alert('A sua fatura foi editada com sucesso.')</script>";
            echo "<script> window.location.href = 'comerciante_home.php'; </script>";
        
            
         
    } else {
        echo "<script language='javascript'> alert('Erro ao editar fatura.')</script>";
        echo "<script> window.location.href = 'comerciante_home.php'; </script>";
    }/*else {
    echo "<script language='javascript'> alert('Este consumidor não existe. Por favor, tente novamente')</script>";
    echo "<script> window.location.href = 'Editar_Faturas_Comerciante.php'; </script>";
}
}*/ 
?>