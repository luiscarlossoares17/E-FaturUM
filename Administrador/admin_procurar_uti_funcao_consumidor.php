<?php

$estado = aceite_encerrado($consumidor[7], null);
$beneficio = beneficio($consumidor[0]);

echo "    
        <div id = 'admin_result_nif1'>
        <input type = 'text' name = 'nif' id = 'nif' value = '$consumidor[0]' readonly><br>
        <input type = 'text' name = 'nome' value = '$consumidor[1]' readonly><br>
        <input type = 'text' name = 'tipo' id = 'tipo' value = $consumidor[2] readonly><br>
        <input type = 'text' name = 'email' id = 'email' value = '$consumidor[3]'><br>
        <input type = 'text' name = 'morada' id = 'morada' value = '$consumidor[4]'><br>
        <input type = 'text' name = 'telefone' id = 'telefone' value = '$consumidor[5]' onkeypress='return sonumeros(event);'><br>
        <input type = 'text' name = 'aceite' value = '$estado[0]' readonly><br>
        <input type = 'text' name = 'beneficio' value = '$beneficio[0] €' readonly><br><br>
        <button type = 'submit' value = 'Submit' id = 'bloquear_botao_c' onclick = 'admin_encerrar_atividade()'>Encerrar a Atividade</button>
        <button type = 'submit' value = 'Submit' id = 'guardar_botao_c' onclick = 'admin_guardar_alteracoes()' >Guardar Alterações</button>
        <button type = 'submit' value = 'Submit' id = 'apagar_botao_c' >Apagar</button>
        </div>

        <div id = 'admin_result_nif2'>
        Nif do Comerciante<br>
        Nome<br>
        Tipo<br>
        Email<br>
        Morada<br>
        Telefone<br>
        Aceite<br>
        Benefício<br>
        </div>
        ";
?>
