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
        <title>Carregar Ficheiro</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
        <script src = "../funcoes.js"></script>
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="comerciante_home.php" id="semlinha"><center id="admin_aceitar_top">Comerciante</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <a href="comerciante_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a><br>

        <form action="comerciante_carregar_ficheiro_aux.php" method='POST' enctype="multipart/form-data" id="carregar_ficheiro">
            <input type='file' name='file'><br>
            <input type='submit' value='Submeter'>
        </form>

        <div id="carregar_ficheiro_text">
            Exemplo de Ficheiro (Atenção: apenas uma fatura por ficheiro)
            <br><br>
            Fatura Normal:
            <br>
            Normal, Nome do Consumidor, Nif do Consumidor, Nif do Comerciante, Número da Fatura, Data(AAAA-MM-DD), Total, Taxa, Iva, Base Tributável
            <br><br>
            Fatura Simples:
            <br>
            Simples,,, Nif do Comerciante, Número da Fatura, Data(AAAA-MM-DD), Total, Taxa, Iva, Base Tributável
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
    </center>

</body>
