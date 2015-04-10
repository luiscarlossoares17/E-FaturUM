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
        <title>Consultar Dados</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script src = "../funcoes.js"></script> 
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="comerciante_home.php" id="semlinha"><center id="admin_aceitar_top">Comerciante</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src="../funcoes.js"></script>
        <a href="comerciante_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>


        <?php
        require "comerciante_consultar_aux.php";
        ?>


    <center id="rodape">
        <?php
        include '../rodape.php';
        ?>
    </center>

    <div id="admin_session">
        <?php
        $comerciante = procurar_bd('comerciante', 'nif_comerciante', $_SESSION['comerciante']);
        echo "Bem-vindo " . $comerciante[2];
        ?>
    </div>
</body>
</html>
