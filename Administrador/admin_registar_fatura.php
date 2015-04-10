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
        <title>Registar Fatura</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <script src = "../funcoes.js"></script>
        <a href="admin_registar.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

        <form action="admin_registar_fatura_aux.php" method="POST" autocomplete="off" id="admin_registar_fatura_form">
            <div>
                <input type="text" name="fconsumidor" placeholder="Nome Consumidor" onkeypress="return apenasletras(event);"><br>
                <input type="text" name="nif_consumidor" placeholder="NIF Consumidor"  maxlength="9" onkeypress="return sonumeros(event);"> <br>
                <input type="text" name="nif_comerciante" placeholder="NIF Comerciante"  maxlength="9" required="" onkeypress="return sonumeros(event);"><br>
                <select name="tipo_fatura">
                    <option>Simplificada</option>
                    <option>Normal</option>
                </select><br><br>
                Dados da Fatura:<br><br>
                <input type="text" name="numero_fatura" placeholder="Numero da Fatura" required="" onkeypress="return sonumeros(event);"> <br>
                <input type="date" name="data_fatura" required=""><br><br>
                <button type="button" onclick="addRow();">Adicionar Linha</button>
                <button type="button" onclick="delRow();">Remover Linha</button><br><br>
                <table class="admin_fatura" border="1" width="1000" method="POST">
                    <tr>
                        <th>Total</th>
                        <th>Taxa</th>
                        <th>IVA</th>
                        <th>Base Tributavel</th>
                    </tr>
                    <tr>
                        <th><input id="total" type="text" name="total" required="" onkeypress="return sonumeros(event);">€</th>
                        <th><select id="taxa" name="taxa" onchange="iva();" required="">
                                <option value=""></option>
                                <option value="0.23">23</option>
                                <option value="0.13">13</option>
                                <option value="0.06">6</option>
                                <option value="0.00">0</option>
                            </select></th>
                        <th><input id="valor_iva" type="text" name="valor_iva" readonly="">€</th>
                        <th><input id="base_tributavel" type="text" name="base_tributavel" readonly="">€</th>
                    </tr>
                </table><br>
                <input type="submit" value="Submeter">
            </div>
        </form>

        <div id='admin_registar_fatura_form2'>  
            Nome Consumidor<br> 
            NIF Consumidor<br>
            NIF Comerciante<br>
            Tipo de Fatura<br><br><br>
            Numero de Fatura<br>
            Data de Fatura<br>
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