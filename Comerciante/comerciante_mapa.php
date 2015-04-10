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
        <title>Listar Fatura</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
        <script src = "../funcoes.js"></script>
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="comerciante_home.php" id="semlinha"><center id="admin_aceitar_top">comerciante</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <a href="comerciante_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a><br>
        
        <?php 
        include '../GoogleMaps.php';
        ?>
        
        
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
