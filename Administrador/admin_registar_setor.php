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
        <title>Registar Setor</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="admin_registar.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

        <form action="admin_registar_setor_aux.php" method="POST"  id="admin_registar_setor_form" autocomplete="off" onsubmit="return verificar_setor(this);">
            <script src="funcoes.js"></script>
            <div>
                <input type="text" name="nome" required="" onkeypress="return apenasletras(event);"><br>
                <input type="text" name="iva" required="" onkeypress="return sonumeros(event);"><br>
                <input type="text" name="percentagem" onkeypress="return sonumeros(event);" required="">
            </div>
            <input type="submit" value="Registar Setor">
        </form>

        <div id='admin_registar_setor_form2'>  
            Nome do Setor<br> 
            Percentagem de IVA<br>
            Percentagem de Benefício<br>
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