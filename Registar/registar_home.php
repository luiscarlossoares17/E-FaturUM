
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Registar</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="" id="semlinha"><center id="admin_aceitar_top">Registar</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="../index.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

        <div id='registar_posicao_icon'>
            <a href="registar_comerciante.php"><img src='../imagens/icons/registar_comerciante.png' alt='listar' id='registar_comerciante'></a>
            <a href="registar_consumidor.php"><img src='../imagens/icons/registar_consumidor.png' alt='registar' id='registar_consumidor'></a>
        </div>

        <div class='registar_text_icons_comerciante'>Comerciante</div>
        <div class='registar_text_icons_consumidor'>Consumidor</div>


    <center id="rodape">
        <?php
        include '../rodape.php';
        ?>
    </body>
</html>