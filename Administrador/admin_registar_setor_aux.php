<?php
include '../mysqlconect.php';

$nome_s = ($_POST['nome']);
$iva_s = ($_POST['iva']);
$percentagem_s = ($_POST['percentagem']);

$nome = mysql_real_escape_string($nome_s);
$iva = mysql_real_escape_string($iva_s);
$percentagem = mysql_real_escape_string($percentagem_s);

$verifica_setor = mysql_query("SELECT * FROM setor_actividade WHERE nome_setor like 'nome'");
$linhas = mysql_num_rows($verifica_setor);


    if($linhas < 1) {

       if(strlen($nome) < 45){
        
        mysql_query("INSERT INTO setor_actividade (nome_setor,iva,percentagem_beneficio)
                values ('$nome','$iva','$percentagem')");
        echo "<script language='javascript'> alert('Registo efectuado com sucesso.')</script>";
        echo "<script> window.location.href = 'admin_registar_setor.php'; </script>";
        
    } else {
        echo "<script language='javascript'> alert('Demasiados caracteres.')</script>";
        echo "<script> window.location.href = 'admin_registar_setor.php'; </script>";
    }
    
    
  } else{
        echo "<script language='javascript'> alert('Este setor de actividade já existe.')</script>";
        echo "<script> window.location.href = 'admin_registar_setor.php'; </script>";
  }

?>

