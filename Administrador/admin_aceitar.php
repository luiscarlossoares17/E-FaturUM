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
        <title>Aceitar Utilizadores</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>

        <a href="admin_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>
        
        <div class="aceitar_consumidores">
            <?php
            include 'admin_aceitar_consumidores.php';
            ?>
        </div>

        <div class="aceitar_comerciantes">
            <?php
            include 'admin_aceitar_comerciantes.php';
            ?>
        </div>

        <p id="admin_aceitar_consumidor">Consumidor</p>
        <p id="admin_aceitar_comerciante">Comerciante</p>

        <div id="admin_session">
            <?php
            echo 'Bem-Vindo';
            include ("../div_session.php");
            ?>
        </div>


</body>
</html>
