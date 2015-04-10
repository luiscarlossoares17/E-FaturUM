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
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="admin_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

        <section id="admin_procurar_uti_form">
            Utilizadores
            <form action="admin_procurar_uti_funcao.php" method="POST" name="utilizadores" onsubmit="return validar_admin_procurar_uti(this);"> 
                <input type="text" name="nif" id="nif" placeholder="NIF" onkeypress="return sonumeros(event);"><br>
                <input type="text" id="nome" name="nome" placeholder="Nome" onkeypress=" return apenasletras(event);"> <br>
                <button type="submit" name="submit" id="botão_procurar_uti" onclick="return admin_procura_uti_vazio();">Procurar</button>
            </form>
        </section>

        <section id="admin_procurar_setor_form">
            Setor
            <form  method="POST" action="admin_procurar_setor.php" name="setor1" onsubmit="return admin_procura_setor_vazio();">
                <input type="text" name="setor" placeholder="Setor" onkeypress=" return apenasletras(event);">
                <br><button type="submit" name="submit" onclick="return validar_letras(document.setor1.setor);">Procurar</button>
            </form>
        </section>    



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
