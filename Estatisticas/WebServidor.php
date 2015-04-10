<?php
$minhaligacao = mysql_connect("localhost", "root", "") or die("erro");
$bd = mysql_select_db("mydb", $minhaligacao) or die("erro");

require_once '../includes/nusoap/lib/nusoap.php';

//Instância NuSOAP
$server = new nusoap_server;

function helloWorld(){
    return "HelloWorld";
}

function NumeroFaturasRegistadasPorSetor1(){
    
    $buscarFaturas = "SELECT COUNT( * )as total FROM `fatura` WHERE `comerciante_nif_comerciante` IN (
                      SELECT nif_comerciante    FROM comerciante    WHERE setor_actividade_id_setor LIKE '1')";
    $busca = mysql_query($buscarFaturas);
    $resultado = mysql_fetch_array($busca);
    
    
    $total = $resultado['total'];
    return $total;
   
}

function NumeroFaturas(){
    $buscarFatur = "SELECT COUNT(*) as totalidade FROM `fatura`";
    $buscar = mysql_query($buscarFatur);
    $resultado2 = mysql_fetch_array($buscar);
    
    $total1 = $resultado2['totalidade'];
    
    return $total1;
}

function NumeroFaturasNif(){
    $faturaNif = "SELECT * FROM `fatura` WHERE consumidor_nif_consumidor !='' AND consumidor_nif_consumidor != '999999999'";
    $buscar = mysql_query($faturaNif);
    $numero = mysql_num_rows($buscar);
    return $numero;
}

function NumeroFaturasSetor2(){
    $faturaSetor = "SELECT * FROM `fatura`WHERE comerciante_nif_comerciante IN (SELECT nif_comerciante
                                                                                FROM comerciante
                                                                                WHERE setor_actividade_id_setor like 2)";
    $buscar = mysql_query($faturaSetor);
    $numero = mysql_num_rows($buscar);
    return $numero;
}

function NumeroFaturasSetor3(){
    $faturas = "SELECT * FROM `fatura`WHERE comerciante_nif_comerciante IN (SELECT nif_comerciante
                                                                                FROM comerciante
                                                                                WHERE setor_actividade_id_setor like 3)";
    
    $buscar = mysql_query($faturas);
    $numero = mysql_num_rows($buscar);
    return $numero;
}

function NumeroFaturasSetor4(){
    $faturas = "SELECT * FROM `fatura`WHERE comerciante_nif_comerciante IN (SELECT nif_comerciante
                                                                                FROM comerciante
                                                                                WHERE setor_actividade_id_setor like 4)";
    $buscar = mysql_query($faturas);
    $numero = mysql_num_rows($buscar);
    return $numero;
}


function NumeroFaturasContribuinteSetor1() {
    $faturas = "SELECT * FROM fatura WHERE consumidor_nif_consumidor != '999999999' AND consumidor_nif_consumidor != ''
                                                                                AND comerciante_nif_comerciante IN (
                                                                                            SELECT nif_comerciante
                                                                                            FROM comerciante
                                                                                            WHERE setor_actividade_id_setor LIKE 1
                                                                                            )";
    $buscar = mysql_query($faturas);
    $numero = mysql_num_rows($buscar);
    return $numero;
    
}


function NumeroFaturasContribuinteSetor2(){
    $faturas = "SELECT * FROM fatura WHERE consumidor_nif_consumidor != '999999999' AND consumidor_nif_consumidor != ''
                                                                                AND comerciante_nif_comerciante IN (
                                                                                            SELECT nif_comerciante
                                                                                            FROM comerciante
                                                                                            WHERE setor_actividade_id_setor LIKE 2
                                                                                            )";
    $buscar = mysql_query($faturas);
    $numero = mysql_num_rows($buscar);
    return $numero;
}


function NumeroFaturasContribuinteSetor3(){
    $faturas = "SELECT * FROM fatura WHERE consumidor_nif_consumidor != '999999999' AND consumidor_nif_consumidor != ''
                                                                                AND comerciante_nif_comerciante IN (
                                                                                            SELECT nif_comerciante
                                                                                            FROM comerciante
                                                                                            WHERE setor_actividade_id_setor LIKE 3
                                                                                            )";
    $buscar = mysql_query($faturas);
    $numero = mysql_num_rows($buscar);
    return $numero;
}


function NumeroFaturasContribuinteSetor4(){
    $faturas = "SELECT * FROM fatura WHERE consumidor_nif_consumidor != '999999999' AND consumidor_nif_consumidor != ''
                                                                                AND comerciante_nif_comerciante IN (
                                                                                            SELECT nif_comerciante
                                                                                            FROM comerciante
                                                                                            WHERE setor_actividade_id_setor LIKE 4
                                                                                            )";
    $buscar = mysql_query($faturas);
    $numero = mysql_num_rows($buscar);
    return $numero;
}


function BeneficioTotal(){
    $faturas = "SELECT SUM(valor_beneficio) AS valor_potencial FROM beneficio";
    $valor = mysql_query($faturas);        
    $row = mysql_fetch_array($valor); 
            $potencial = $row['valor_potencial'];
            return $potencial;
}


function BeneficioConferido(){
            $faturas = "SELECT SUM(valor_beneficio) AS valor_conferido FROM beneficio WHERE consumidor_nif_consumidor!=999999999"; 
            $valor = mysql_query($faturas);        
            $row2 = mysql_fetch_array($valor); 
                    $conferido =  $row2['valor_conferido'];
                    return $conferido;
}


function MaximoConsumidores(){
    $faturas = "SELECT * FROM beneficio WHERE valor_beneficio >= 250 AND consumidor_nif_consumidor!=999999999 AND consumidor_nif_consumidor != ''";
    $buscar = mysql_query($faturas);
    $consumidoresmaximo = mysql_num_rows($buscar);
    return $consumidoresmaximo;
    
}

//Regista os servicos que o webservice irá disponiblizar
//Os nomes dentro de aspas, devem corresponder a nomes de funções existentes!!!

$server->register("NumeroFaturasRegistadasPorSetor1");
$server->register("NumeroFaturas");
$server->register("NumeroFaturasNif");
$server->register("NumeroFaturasSetor2");
$server->register("NumeroFaturasSetor3");
$server->register("NumeroFaturasSetor4");
$server->register("NumeroFaturasContribuinteSetor1");
$server->register("NumeroFaturasContribuinteSetor2");
$server->register("NumeroFaturasContribuinteSetor3");
$server->register("NumeroFaturasContribuinteSetor4");
$server->register("BeneficioTotal");
$server->register("BeneficioConferido");
$server->register("MaximoConsumidores");


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
$server->service($HTTP_RAW_POST_DATA);
?> 