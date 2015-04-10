<html>
    <head>
        <title>Estatisticas</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/gif" href="imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="pagina_principal.css" media="screen"/>

        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
        </script><link href="jquery-plugin-circliful-master/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="jquery-plugin-circliful-master/js/jquery.circliful.min.js"></script>

    </head>
    <body>
        <?php
        include './includes/nusoap/lib/nusoap.php';
        $server = new nusoap_client("http://localhost/E-FaturUM/Estatisticas/WebServidor.php", false);
        
        require 'estat_graf_func.php';
        ?> 
        <div id="div_estatisticas">
            <div align='center'>
                <section>
                    <form>
                        <button type='submit' name='submit' formaction='index.php' id="voltar" >Voltar Atrás</button>
                    </form>
                </section>
            </div>
            <script>
            $(document).ready(function() {
                $('#myStat').circliful();
            });
            $(document).ready(function() {
                $('#myStat1').circliful();
            });
            $(document).ready(function() {
                $('#myStat2').circliful();
            });
            $(document).ready(function() {
                $('#myStat4').circliful();
            });
            $(document).ready(function() {
                $('#myStat5').circliful();
            });
            $(document).ready(function() {
                $('#myStat6').circliful();
            });
            $(document).ready(function() {
                $('#myStat7').circliful();
            });
            $(document).ready(function() {
                $('#myStat8').circliful();
            });
            $(document).ready(function() {
                $('#myStat9').circliful();
            });
            $(document).ready(function() {
                $('#myStat10').circliful();
            });
            $(document).ready(function() {
                $('#myStat11').circliful();
            });
            </script>

            <table align="center">
                <h1 align="center">Faturas Registadas</h1>
                <td>
                    <div id="myStat" data-dimension="210" data-text="<?= $server->call("NumeroFaturas")?>" data-info="Total" data-width="5" data-fontsize="30" data-percent="<?= $server->call("NumeroFaturas")?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
                <td>
                    <div id="myStat1" data-dimension="210" data-text="<?= $count2 ?>%" data-info="Faturas c/NIF" data-width="5" data-fontsize="30" data-percent="<?= $count2 ?> " data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
            </table>

            <h2 align="center">Faturas Registadas por Setor de Atividade</h2>
            <table align="center">
                <br>
                <td>
                    <div id="myStat4" data-dimension="220" data-text="<?= $count3 ?>%" data-info="Rep. de Automóveis" data-width="5" data-fontsize="30" data-percent="<?= $count3 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
                <td>
                    <div id="myStat5" data-dimension="220" data-text="<?= $count4 ?>%" data-info="Rep. de Motociclos" data-width="5" data-fontsize="30" data-percent="<?= $count4 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
                <td>
                    <div id="myStat6" data-dimension="220" data-text="<?= $count5 ?>%" data-info="Rest. e Alojamento" data-width="5" data-fontsize="30" data-percent="<?= $count5 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
                <td>
                    <div id="myStat7" data-dimension="220" data-text="<?= $count6 ?>%" data-info="Cabeleireiro" data-width="5" data-fontsize="30"  data-percent="<?= $count6 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
            </table>
            <h2 align="center">Faturas Registadas por Setor de Atividade c/ NIF</h2>
            <table align="center">
                <br>
                <td>
                    <div id="myStat8" data-dimension="220" data-text="<?= $count7 ?>%" data-info="Rep. de Automóveis" data-width="5" data-fontsize="30" data-percent="<?= $count7 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
                <td>
                    <div id="myStat9" data-dimension="220" data-text="<?= $count8 ?>%" data-info="Rep. de Motociclos" data-width="5" data-fontsize="30" data-percent="<?= $count8 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
                <td>
                    <div id="myStat10" data-dimension="220" data-text="<?= $count9 ?>%" data-info="Rest. e Alojamento" data-width="5" data-fontsize="30" data-percent="<?= $count9 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
                <td>
                    <div id="myStat11" data-dimension="220" data-text="<?= $count10 ?>%" data-info="Cabeleireiro" data-width="5" data-fontsize="30"  data-percent="<?= $count10 ?>" data-fgcolor="#7ea568" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></div>
                </td>
            </table>

    </body>

</html>
