<html>
    <head>
        <title>Estatisticas</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/gif" href="imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../pagina_principal.css" media="screen"/>
    </head>
    <body>

        <script src = "../funcoes.js"></script>
        <header id="header">E-FacturUM</header> 
    <center id="login_top">Estatisticas</center>
    <a href="../index.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar_estat'></a>

    <?php
    include '../includes/nusoap/lib/nusoap.php';
    $server = new nusoap_client("http://localhost/E-FaturUM/Estatisticas/WebServidor.php", false);
    ?> 
    <div id="div_estatisticas">
        <div id="div_est_faturas_reg">Número total de faturas registadas:<table align="center" class='designtabela_est'><tr><td><?= $server->call("NumeroFaturas") ?></td></tr></table></div>
        <div id="div_est_faturas_cont">Número total de faturas registadas c/ NIF:<table align="center" class='designtabela_est'><tr><td><?= $server->call("NumeroFaturasNif") ?></td></tr></table></p></div>
        <div id="div_est_faturas_set">Número total de faturas registadas por setor de atividade
            <br>
            <br>
            <table  align='center' class='designtabela'> 
                <tr>
                    <th>Setor</th>
                    <th>Registos</th>
                </tr>
                <tr>
                    <td>Reparação de Automóveis</td>
                    <td><?= $server->call("NumeroFaturasRegistadasPorSetor1") ?> </td>
                </tr>
                <tr>
                    <td>Reparação de Motociclos</td>
                    <td><?= $server->call("NumeroFaturasSetor2") ?></td>
                </tr>
                <tr>
                    <td>Restauração e Alojamento</td>
                    <td><?= $server->call("NumeroFaturasSetor3") ?></td>
                </tr>
                <tr>
                    <td>Cabeleireiro</td>
                    <td><?= $server->call("NumeroFaturasSetor4") ?></td>
                </tr>
            </table>
        </div>    
        <div id="div_est_faturas_set_cont">Número total de faturas registadas c/ NIF por setor de actividade
            <br>
            <br>
            <table  align='center' class='designtabela'> 
                <tr>
                    <th>Setor</th>
                    <th>Registos</th>
                </tr>
                <tr>
                    <td>Reparação de Automóveis</td>
                    <td><?= $server->call("NumeroFaturasContribuinteSetor1") ?></td>
                </tr>
                <tr>
                    <td>Reparação de Motociclos</td>
                    <td><?= $server->call("NumeroFaturasContribuinteSetor2") ?></td>
                </tr>
                <tr>
                    <td>Restauração e Alojamento</td>
                    <td><?= $server->call("NumeroFaturasContribuinteSetor3") ?></td>
                </tr>
                <tr>
                    <td>Cabeleireiro</td>
                    <td><?= $server->call("NumeroFaturasContribuinteSetor4") ?></td>
                </tr>
            </table>
        </div>
        <div id="div_est_faturas_ben_pot">Benefício total potencial:<table align="center" class='designtabela_est'><tr><td><?= $server->call("BeneficioTotal") ?></td></tr></table></p></div>
        <div id="div_est_faturas_ben_conf">Benefício total conferido:<table align="center" class='designtabela_est'><tr><td><?= $server->call("BeneficioConferido") ?></td></tr></table></p></div>
        <div id='div_est_faturas_ben_max'>Número total de consumidores que alcançaram o benefício máximo:<table align="center" class='designtabela_est'><tr><td><?= $server->call("MaximoConsumidores") ?></td></tr></table></p></div>
    </div>

</body>

</html>
