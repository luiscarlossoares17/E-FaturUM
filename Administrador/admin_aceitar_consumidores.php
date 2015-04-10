<?php
include ("../mysqlconect.php"); 

//aceitar 
$consultar = ("SELECT * FROM consumidor WHERE aceite='0'");
$resultado = mysql_query($consultar);

 if(mysql_num_rows($resultado) != 0){
        echo "<form name='selecionar' method='post' action='admin_aceitar_consumidores_funcao.php'>";
        echo"<table >
            <tr><td></td><td >Nome</td><td>NIF</td></tr>";
 
        while($linha = mysql_fetch_row($resultado) ){
                
            echo"<tr><td ><input type='checkbox' name='id[]' value='$linha[0]'</td><td>$linha[1]</td><td>$linha[0]</td></tr>";
            };
        echo "<tr><td colspan='3'><input type='submit' name='aceitar' value='Aceitar!'></td></tr>";
        echo "</table></form>";
} else{
        echo "Não exitem utilizadores por aceitar.";
}
        ?>
