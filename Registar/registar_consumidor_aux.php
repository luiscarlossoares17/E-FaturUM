<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?><?php

//ligacao a base de dados
include ("../mysqlconect.php");
//requerer a pagina das funcoes
require '../funcoes.php';
//define variaveis resultantes dos campos introduzidos no admin_procurar.php
$nif_s = ($_POST['nif']);
$nome_s = ($_POST['nome']);
$email_s = ($_POST['mail']);
$morada_s = ($_POST['morada']);
$telefone_s = ($_POST['telefone']);
$password_s = rand(100000, 999999);

$nif = mysql_real_escape_string($nif_s);
$nome = mysql_real_escape_string($nome_s);
$email = mysql_real_escape_string($email_s);
$morada = mysql_real_escape_string($morada_s);
$telefone = mysql_real_escape_string($telefone_s);
$password = md5($password_s);


$confirmacao = mysql_query("INSERT INTO Consumidor (nif_consumidor,nome,tipo,pass,email,morada,telefone)
                 values ('$nif','$nome','Consumidor','$password','$email','$morada','$telefone')");

if ($confirmacao) {
    $pass = $password_s;
    //chamar a função de enviar email
    enviar_mail($email, $pass, $nome);

    echo "<script language='javascript'> 
       alert('O registo foi efectuado com sucesso!');
          location.href='../index.php';     
          </script>";
} else {
    echo "<script language='javascript'>
            alert('Ocorreu um erro');
            location.href='registar_home.php';
          </script>";
}
?>

