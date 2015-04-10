<?php
session_start();
if (isset($_SESSION['admin'])) {
    
} else {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Admin</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">

    </head>
    <body>
        <header id="header">E-FacturUM</header>

    <center id="admin_top">Administrador</center> 
    <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>


    <div id='admin_posicao_icon2'>
        <a href="admin_aceitar.php"><img src='../imagens/icons/aceitar.png' alt='aceitar' id='admin_icon_aceitar'></a>
        <a href="admin_procurar.php"><img src='../imagens/icons/procurar.png' alt='procurar' id='admin_icon_procurar'></a>
        <a href="admin_listar.php"><img src='../imagens/icons/listar.png' alt='listar' id='admin_icon_listar'></a>
        <a href="admin_registar.php"><img src='../imagens/icons/registar.png' alt='registar' id='admin_icon_registar'></a>
    </div>

    <div class='admin_text_icons'>Aceitar</div>
    <div class='admin_text_icons_procurar'>Procurar</div>
    <div class='admin_text_icons_listar'>Listar</div>
    <div class='admin_text_icons_registar'>Registar</div>



    <div id="admin_session">
        <?php
        echo 'Bem-Vindo';
        include ("../div_session.php");
        ?>
    </div>

    <center id="rodape">
        <?php
        include '../rodape.php';
        ?>
    </center>

</body>
</html>
