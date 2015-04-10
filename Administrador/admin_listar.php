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
        <title>Listar</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="admin_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>
        <p id="admin_listar_beneficio_maximo">Benefício Máximo</p>
        <p id="admin_listar_beneficio">Benefício</p>
        
        <div class="admin_beneficio">
            <?php
            include 'admin_listar_beneficio.php';
            ?>
        </div>
        
        <div class="admin_beneficio_maximo">
            <?php
            include './admin_listar_beneficio_maximo.php';
            ?>
        </div>
        
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