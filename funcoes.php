<?php

function procurar_bd($tabela, $campo1, $campo2) {

    $tabela_es = mysql_real_escape_string($tabela);
    $campo1_es = mysql_real_escape_string($campo1);
    $campo2_es = mysql_real_escape_string($campo2);

    $strSQL = ("SELECT * FROM `$tabela_es` WHERE `$campo1_es` like '$campo2_es'");
    $rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);

    return $row;
}

function setor_atividade($setor) {

    $strSQL = ("SELECT * FROM `setor_actividade` WHERE `id_setor` like '$setor'");
    $rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);

    return $row;
}

function aceite_encerrado($aceite, $encerrado) {

    if ($aceite == 0)
        $ac = "Não";

    else {

        $ac = "Sim";
    }

    if ($encerrado == 0) {
        $encerrar = "Não";
    } else {
        $encerrar = "Sim";
    }

    $estado = array($ac, $encerrar);
    return $estado;
}

function update($tabela, $atr_update, $novo_atributo, $campo, $campo_like) {

    mysql_query("UPDATE `$tabela` SET `$atr_update` = '$novo_atributo'  WHERE `$campo` like $campo_like");
}

function iva_faturacao($nif) {

    $total_fatura = mysql_query("SELECT SUM(valor_fatura) AS valor_sum FROM `fatura` WHERE comerciante_nif_comerciante like $nif");
    $row = mysql_fetch_assoc($total_fatura); 
    $total_faturacao = $row['valor_sum'];
    
    $iva = mysql_query("SELECT SUM(iva) as ivatotal FROM `movimento` INNER JOIN `fatura` WHERE fatura.comerciante_nif_comerciante like 123456789 AND movimento.Fatura_id_fatura = fatura.id_fatura");
    $row_1 = mysql_fetch_assoc($iva);
    $total_iva = $row_1['ivatotal'];

    $iva_fatur = array($total_faturacao, $total_iva);
    return $iva_fatur;
}

function beneficio($nif){
$ben = mysql_query("SELECT `valor_beneficio` FROM `beneficio` WHERE `consumidor_nif_consumidor` like $nif");
$beneficio = mysql_fetch_array($ben);
return $beneficio;
}


function enviar_mail($email, $pass, $nome) {

    require('PHPMailer-master/class.phpmailer.php');

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "efatura.um.grupo207@gmail.com";
    $mail->Password = "efaturapw1314";
    $mail->SetFrom('efatura.um.grupo207@gmail.com', 'EfaturUM - Grupo 207');


    $mail->AddAddress($email);
    $mail->Subject = "Bem Vindo ao EfaturUM";
    $mail->Body = "Bem Vindo Sr(a) $nome! <br><br> O Seu registo foi efectuado com sucesso. <br><br> Esta sera a sua nova Password: $pass <br><br> Os melhores cumprimentos, <br> EfaturUM - Grupo 207";
    $mail->IsHTML(true);

    $mail->Send();
}
?>