<?php
session_start();
if (isset($_SESSION['admin']) || isset($_SESSION['comerciante']) || isset($_SESSION['consumidor'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>

        <script src = "../funcoes.js"></script>
        <header id="header">E-FacturUM</header> 
    <center id="login_top">LOGIN</center>
        <a href="../index.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>


    <section id="login_section">
        <form action="login_funcao.php" method="POST" >
            <input type="text" name="nif" placeholder="NIF" onkeypress="return sonumeros(event);"> <br>
            <br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <button type="submit" name="submit" id="login_botao_iniciarsessao">Iniciar Sessão</button>
            <button type="submit" name="submit" id="login_botao_voltar" formaction="../index.php">Voltar</button>
        </form>
    </section>

    <center id="rodape">
        <?php
        include '../rodape.php';
        ?>
    </center>

</body>
</html>