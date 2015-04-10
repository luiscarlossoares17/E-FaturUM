<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8" />
        <title>eFacturUM</title>
        <link rel="shortcut icon" type="image/gif" href="imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="Style.css">
        <style>body{background-image: none}</style>
    </head>
    <body>

        <div id="index_paragrafo">
            <img src="imagens/e-FacturUM.png" alt="e-FacturUM" width="602" height="144"> <br>
        </div>  

        <img src="imagens/coins.jpg" alt="coins" id="index_moedas_imagem">

        <a href="feed.php"><img src='imagens/icons/feed.png' alt='registar' title="Feed de Noticias" id='feed'></a>
        
        <form>
            <button type='submit' name='submit' formaction='Login/login.php' id='index_botao_login' >LOGIN</button>
            <button type='submit' name='submit' formaction='registar/registar_home.php' id='index_botao_registar' >REGISTAR</button>
            <button type='submit' name='submit' formaction='estatisticas/estatisticas.php' id='index_botao_estatisticas' >ESTATÍSTICAS</button>
        </form>

        <center id="rodape_index">
            <?php
            include 'rodape_index.php';
            ?>
        </center>
       
       
    </body>
</html>
