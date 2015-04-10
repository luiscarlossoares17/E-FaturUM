<?php
session_start();

if (isset($_SESSION['comerciante'])) {
    
} else {
    header('Location: ../index.php');
}
include "../funcoes.php";
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Editar Fatura</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
        <script src = "../funcoes.js"></script>
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="comerciante_home.php" id="semlinha"><center id="admin_aceitar_top">Comerciante</center></a> 
        <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
        <a href="comerciante_listar.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a><br>

        <form action="comerciante_editar_fatura_aux.php" method="POST" autocomplete="off" id="admin_registar_fatura_form">
            <?php
            include'../mysqlconect.php';

            //BUSCAR O ID DA FATURA

            $idd = ($_POST['id']);
            $idd[0];
            $sql7 = "SELECT * FROM fatura WHERE id_fatura like '$idd[0]'";
            $sqlquery2 = mysql_query($sql7);
            $resultadoid = mysql_fetch_array($sqlquery2);
            $name = $resultadoid['nome_consumidor'];
            $nifcon = $resultadoid['consumidor_nif_consumidor'];
            $nifcom = $resultadoid['comerciante_nif_comerciante'];
            $tiposFat = $resultadoid['tipo_fatura'];
            $numFat = $resultadoid['numero_fatura'];
            $dat = $resultadoid['data_fatura'];
            $value = $resultadoid['valor_fatura'];
            ?>
            <!--NÃO ESQUECER DE ATRIBUIR OS VALUES-->
            <input type="hidden" name="valoredit" value="<?php echo $idd[0] ?>">
            <input type="text" name="nome" onkeypress="return apenasletras(event);" value="<?php echo $name ?>"><br>
            <input type="text" name="nifcon" onkeypress="return sonumeros(event);" maxlength="9" value="<?php echo $nifcon ?>"><br>
            <input type="text" name="nifcom" maxlength="9" readonly="" required="" value="<?php echo $nifcom ?>"><br>
            <select name='tipo_fat'>
                <option>Normal</option>
                <option>Simplificada</option>            
            </select>
            <br>
            <input type="text" name="numero_fatura" value="<?php echo $numFat ?>" required=""><br>
            <input type="date" name="data_fatura" required="" value="<?php echo $dat ?>"><br><br>
            <table class="admin_fatura"border="1" width="1000" method="POST">
                <tr>
                    <th>Total</th>
                    <th>Taxa</th>
                    <th>IVA</th>
                    <th>Base Tributavel</th>
                </tr>
                <tr>
                    <th><input id="total" type="text" name="total" required="" onkeypress="return sonumeros(event);" value="<?php echo $value ?>">€</th>
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
            </table>
            <br><input type="submit" value="Guardar">
        </form>


        <div id='admin_registar_fatura_form2'>  
            Nome Consumidor<br> 
            NIF Consumidor<br>
            NIF Comerciante<br>
            Tipo de Fatura<br>
            Numero de Fatura<br>
            Data de Fatura<br>
        </div> 
    <center id="rodape">
        <?php
        include '../rodape.php';
        ?>
    </center>

</body>
</html>