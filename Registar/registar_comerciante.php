
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
        <a href="registar_home.php" id="semlinha"><center id="admin_aceitar_top">Registar</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="registar_home.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

        <div>
            <form name="comerciante" method="POST" id="admin_registar_comerciante_form" action="registar_comerciante_aux.php" onsubmit="return validar_registo(this);"> 
                <input type="text" name="nif" maxlength="9" required="" onkeypress="return sonumeros(event);"><br>
                <input type="text" name="nome" required="" onkeypress="return apenasletras(event);"><br>
                <input type="text" name="mail" required=""><br>
                <input type="text" name="morada" required=""><br>
                <input type="text" name="telefone" maxlength="9" required="" onkeypress="return sonumeros(event);"><br>
                <?php
                require '../mysqlconect.php';
                $sql = "SELECT * FROM setor_actividade";
                $qry = mysql_query($sql) or die(mysql_error());
                echo "<select name='setor'>";
                echo "<option></option>";
                while ($rsl = mysql_fetch_array($qry)) {
                    echo "<option name='setor' value='" . $rsl[0] . "'>" . $rsl[1] . "</option>";
                }
                echo "</select>";
                mysql_close();
                ?><br>
                <button type="submit" name="submit" id="">Registar</button>
            </form>
        </div>

        <div id='admin_registar_comerciante_form2'>  
            Nif do Comerciante<br> 
            Nome<br>
            Email<br>
            Morada<br>
            Telefone<br>
            Setor
        </div>  

    <center id="rodape">
        <?php
        include '../rodape.php';
        ?>
    </body>
</html>