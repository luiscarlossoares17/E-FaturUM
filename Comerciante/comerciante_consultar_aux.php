<?php

include "../funcoes.php";
include "../mysqlconect.php";

$comerciante = procurar_bd('comerciante', 'nif_comerciante', $_SESSION['comerciante']);

$setor = setor_atividade($comerciante[9]);
$estado = aceite_encerrado($comerciante[7], $comerciante[8]);
$iva_faturacao = iva_faturacao($comerciante[0]);

echo "
      <div id='admin_result_nif1'>
      <input type='text' name='nif' id='nif' value='$comerciante[0]' readonly><br>
      <input type='text' name='nome' value='$comerciante[2]' readonly><br>
      <input type='text' name='tipo' id='tipo' value=$comerciante[3] readonly><br>
      <input type='text' name='email' id='email' value='$comerciante[4]'><br>
      <input type='text' name='morada' id='morada' value='$comerciante[5]'><br>
      <input type='text' name='telefone' id='telefone' value='$comerciante[6]' maxlength='9' onkeypress='return sonumeros(event);'><br>  
      <input type='text' name='aceite' value='$estado[0]' readonly><br>
      <input type='text' name='encerrado' id='encerrado' value='$estado[1]' readonly><br>
      <input type='text' name='setor' value='$setor[1]' readonly><br>
      <input type='text' name='iva' value='$iva_faturacao[1]' readonly><br>  
      <input type='text' name='faturacao' value='$iva_faturacao[0]' readonly><br>
      <input type='text' name='password' id='password'><br><br>
 
      <button type='submit' value='Submit' id='bloquear_botao' onclick='comerciante_encerrar_atividade()'>Encerrar a Atividade</button>
      <button type='submit' value='Submit' id='guardar_botao' onclick='comerciante_guardar()' >Guardar Alterações</button>
     </div>  
        
      <div id='admin_result_nif2'>  
       Nif do Comerciante<br> 
       Nome<br>
       Tipo<br>
       Email<br>
       Morada<br>
       Telefone<br>
       Aceite<br>
       Encerrado<br>
       Setor de Atividade<br>
       Iva Suportado<br> 
       Total Faturação<br> 
       Nova Password<br>
       </div>  
        ";
?>