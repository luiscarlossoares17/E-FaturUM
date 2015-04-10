<?php
include ('mysqlconect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>e-FaturUM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="Style.css" />
    </head>

    <body>
        <a href="index.php"><img src='imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar_feed'></a>
        <br><br><br><br>
        <div id="fundo1">
            <div id="home1">

                <h2>Feed de Noticias</h2>
            </div>

            <hr/>
            <br/>
            <?php
            $rss = new DOMDocument();
            $rss->load('http://economico.sapo.pt/rss/financas_pessoais.html');
            $feednot = array();
            foreach ($rss->getElementsByTagName('item') as $node) {
                $item = array(
                    'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                    'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                    'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                    'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
                );
                array_push($feednot, $item);
            }
            $limit = 5;
            for ($x = 0; $x < $limit; $x++) {
                $title = str_replace(' & ', ' &amp; ', $feednot[$x]['title']);
                $link = $feednot[$x]['link'];
                $description = $feednot[$x]['desc'];
                $date = date('l F d, Y', strtotime($feednot[$x]['date']));
                echo '<p><strong><a href="' . $link . '" title="' . $title . '">' . $title . '</a></strong><br />';
                echo '<small><em>Posted on ' . $date . '</em></small></p>';
                echo '<p>' . $description . '</p>';
            }
            ?>
        </div>
        <?php require "mysqlconect.php"; ?>
    </body>
</html>