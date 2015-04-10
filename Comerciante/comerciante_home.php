<?php
session_start();

if (isset($_SESSION['comerciante'])) {
    
} else {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Comerciante</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">

    </head>
    <body>
        <header id="header">E-FacturUM</header>

    <center id="admin_top">Comerciante</center> 
    <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>


    <div id='admin_posicao_icon'>
        <a href="comerciante_registar_fatura.php"><img src='../imagens/icons/registar_fatura_2.png' alt='procurar' id='com_icon_aceitar'></a>
        <a href="comerciante_listar.php"><img src='../imagens/icons/listar.png' alt='listar' id='com_icon_procurar'></a>
        <a href="comerciante_consultar.php"><img src='../imagens/icons/procurar.png' alt='registar' id='com_icon_listar'></a>
        <a href="comerciante_carregar_ficheiro.php"><img src='../imagens/icons/carregar.png' alt='aceitar' id='com_icon_registar'></a>
        <a href="comerciante_mapa.php"><img src='../imagens/icons/mapa.png' alt='aceitar' id='com_icon_mapa'></a>
    </div>

    <div class='com_text_icons'>Registar</div>
    <div class='com_text_icons_procurar'>Listar</div>
    <div class='com_text_icons_listar'>Consultar</div>
    <div class='com_text_icons_registar'>Carregar</div>
    <div class='com_text_icons_mapa'>Mapa</div>
    



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
