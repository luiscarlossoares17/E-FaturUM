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
        <title>Registar Consumidor</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="admin_registar.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>


        <div>
            <form name="consumidor" method="POST" id="admin_registar_comerciante_form" action="admin_registar_consumidor_aux.php" onsubmit="return validar_registo(this);"> 
                <input type="text" name="nif" maxlength="9" required="" onkeypress="return sonumeros(event);"><br>
                <input type="text" name="nome" required="" onkeypress="return apenasletras(event);"><br>
                <input type="text" name="mail" required=""><br>
                <input type="text" name="morada" required=""><br>
                <input type="text" name="telefone" maxlength="9" required="" onkeypress="return sonumeros(event);"><br>
                <button type="submit" name="submit" id="">Registar</button>
            </form>
        </div>


        <div id='admin_registar_comerciante_form2'>  
            Nif do Consumidor<br> 
            Nome<br>
            Email<br>
            Morada<br>
            Telefone<br>
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
