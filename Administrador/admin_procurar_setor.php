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
        <title>Procurar</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>

        <script src = "../funcoes.js"></script>    
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <a href="admin_procurar.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

        <?php
//ligacao a base de dados
        include ("../mysqlconect.php");
//requerer a pagina das funcoes
        require '../funcoes.php';
//Inicializa uma variavel com o nome do setor    
        $setor_s = ($_POST['setor']);
        $setor_c = mysql_real_escape_string($setor_s);
//Funcao procurar na BD
        $setor = procurar_bd('setor_actividade', 'nome_setor', $setor_c);
        include 'admin_procurar_setor_aux.php';
        ?>

        <div id="admin_session">
            <?php
            echo 'Bem-Vindo ';
            echo $_SESSION['admin'];
            ?>
        </div>

    <center id="rodape">
        <?php
        include '../rodape.php';
        ?>
    </body>
</html>