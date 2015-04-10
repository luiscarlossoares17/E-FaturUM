<?php
session_start();
if (isset($_SESSION['admin'])) {
    
} else {
    header('Location: ../index.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Procurar</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico">
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

        $nif = $_POST['id'][0];
//A PROCURA É FEITA ATRAVÉS DO NIF
//Procura na tabela Comerciante
        $comerciante = procurar_bd('comerciante', 'nif_comerciante', $nif);
//Procura na tabela Consumidor
        $consumidor = procurar_bd('consumidor', 'nif_consumidor', $nif);
//Verifica se a variavel nif é igual ao resultado da pesquisa em Comerciante 
        if ($nif === $comerciante[0]) {
            include 'admin_procurar_uti_funcao_comerciante.php';
        } else {
//Verifica se a variavel nif é igual ao resultado da pesquisa em Consumidor 
            if ($nif === $consumidor[0]) {
                include 'admin_procurar_uti_funcao_consumidor.php';
            }
        }
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