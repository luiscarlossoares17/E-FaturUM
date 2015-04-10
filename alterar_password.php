<?php
require 'alterar_password_aux.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Alterar Password</title>
        <link rel="shortcut icon" type="image/gif" href="imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="Style.css">
        <script src = "funcoes.js"></script>
    </head>
    <body>
        <header id="header">E-FacturUM</header>

    <center id="admin_top">Alterar Password</center> 
    <a href="index.php"><img src="imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>

    <form action="alterar_password_form.php" method="POST" id="login_section" name="pass">
        <input type="text" name="password" placeholder="Nova Password"> <br>
        <button type="submit" name="submit"  onclick="return alterar_pass(document.pass.password);">Alterar Password</button>
    </form>


</body>
</html>