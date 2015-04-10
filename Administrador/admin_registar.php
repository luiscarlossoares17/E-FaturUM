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
        <title>Registar</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="admin_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

        <div id='admin_posicao_icon'>
            <a href="admin_registar_fatura.php"><img src='../imagens/icons/registar_fatura.png' alt='aceitar' id='admin_registar_registar_fatura'></a>
            <a href="admin_registar_setor.php"><img src='../imagens/icons/registar_setor.png' alt='procurar' id='admin_registar_registar_setor'></a>
            <a href="admin_registar_comerciante.php"><img src='../imagens/icons/registar_comerciante.png' alt='listar' id='admin_registar_registar_comerciante'></a>
            <a href="admin_registar_consumidor.php"><img src='../imagens/icons/registar_consumidor.png' alt='registar' id='admin_registar_registar_consumidor'></a>
        </div>

        
        
        <div class='admin_text_fatura'>Fatura</div>
        <div class='admin_text_icons_setor'>Setor</div>
        <div class='admin_text_icons_comerciante'>Comerciante</div>
        <div class='admin_text_icons_consumidor'>Consumidor</div>
       
        
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
    </body>
</html>