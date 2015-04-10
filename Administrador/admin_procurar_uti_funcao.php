<?php
session_start();
if (isset($_SESSION['admin'])) {
    
} else {
    header('Location: ../index.php');
}

if (!empty($_POST['nif']) && !empty($_POST['nome'])) {
    header('Location: admin_procurar.php');
}
?>
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
//define variaveis resultantes dos campos introduzidos no admin_procurar.php
        $nif_s = ($_POST['nif']);
        $nome_s = ($_POST['nome']);
        $nif = mysql_real_escape_string($nif_s);
        $nome = mysql_real_escape_string($nome_s);
//Verifica se o campo preenchido foi NIF ou Nome
        if (!empty($_POST['nif'])) {

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
//Imprime se não foi encontrado nenhum registo
                else {
                    echo 'Nenhum registo encontrado';
                }
            }
        } else {
//--- Seleciona os Utilizadores pelo Nome
//Procura na tabela Comerciante
            $comerciante = procurar_bd('comerciante', 'nome', $nome);
//Procura na tabela Consumidor
            $consumidor = procurar_bd('consumidor', 'nome', $nome);

//Verifica se é COMERCIANTE
            if ($nome === $comerciante[2]) {
//Faz uma busca na BD
                $nome_comerciante = mysql_query("SELECT * FROM `comerciante` WHERE `nome` like '$nome'");
//Imprime a tabela 
                echo "<form name='selecionar' method='post' class='resultado_procura_nome'>";
                echo "<table id='tabelax'>
                     <tr><td></td><td >Nome</td><td>NIF</td></tr>";
                while ($linha_com = mysql_fetch_array($nome_comerciante)) {
                    echo"<tr><td ><input type='radio' name='id[]' value='$linha_com[0]'</td><td>" . $linha_com['nome'] . "</td><td>" . $linha_com['nif_comerciante'] . "</td></tr>";
                };
                echo "<tr><td colspan='3'><input type='submit' name='aceitar' value='Ver' formaction='admin_procurar_uti_funcao_nome.php'></td></tr>";
                echo "</table></form>";
            } else {
//Verifica se é Consumidor                
                if ($nome === $consumidor[1]) {
//Faz uma busca na BD
                    $nome_consumidor = mysql_query("SELECT * FROM `consumidor` WHERE `nome` like '$nome'");
//Imprime a tabela 
                    echo "<form name='selecionar' method='post' class='resultado_procura_nome'>";
                    echo "<table id='tabelax'>
                     <tr><td></td><td >Nome</td><td>NIF</td></tr>";
                    while ($linha_com = mysql_fetch_array($nome_consumidor)) {
                        echo"<tr><td ><input type='radio' name='id[]' value='$linha_com[0]'</td><td>" . $linha_com['nome'] . "</td><td>" . $linha_com['nif_consumidor'] . "</td></tr>";
                    };
                    echo "<tr><td colspan='3'><input type='submit' name='aceitar' value='Ver' formaction='admin_procurar_uti_funcao_nome.php'></td></tr>";
                    echo "</table></form>";
                } else {
                    echo 'Nenhum registo encontrado';
                }
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