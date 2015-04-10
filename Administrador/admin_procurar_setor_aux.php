<?php

if ($setor != false) {
    echo "<div id='admin_result_setor'>
             <form name='setor_editar' method='POST'>
             <input type='text' name='setor' id='setor' value='$setor[0]' readonly><br>
             <input type='text' name='nome' id='nome' value='$setor[1]'><br>
             <input type='text' name='iva' id='perc_iva' value='$setor[2]' placeholder='%'><br>
             <input type='text' name='beneficio' id='beneficio' value='$setor[3]' placeholder='%'><br><br>
             <button type='button' value='Submit' >Apagar</button>
             <button type='button' value='Submit' onclick='admin_guardar_alteracoes_setor();'>Editar</button>
             </form>
             </div>
    
    <div id='admin_result_setor2'>
    ID Setor de Atividade<br>
    Nome<br>
    Percentagem de IVA<br> 
    Percentagem de Beneficio<br>
    </div>
    ";
} else {
    echo 'Não foi encontrado nenhum registo.';
}
?>