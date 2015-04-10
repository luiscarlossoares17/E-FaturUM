<?php
include ("../mysqlconect.php");


// Verifica se algum utilizador foi selecionada
if (isset($_POST['id'])) {
    // Faz um loop no Array de checkbox
    // A função count retorna a quantidade de checkbox selecionado
    for ($i = 0; $i < count($_POST['id']); $i++) {

        $id_selecionado = $_POST['id'][$i];
        $update = "UPDATE comerciante SET aceite = 1 WHERE nif_comerciante like $id_selecionado";
        mysql_query($update) or die("Ocorreu algum erro");
        header('Location: admin_aceitar.php');
    }
} else {
    echo "<script type='text/javascript'>
                       alert('Nenhum utilizador foi selecionado!')
                       window.location.href = 'admin_aceitar.php'
                     </script>";;
};
?>
