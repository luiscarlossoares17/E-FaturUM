<script src = "../funcoes.js"></script>
<?php
include ("../mysqlconect.php");        
        
        //aceitar comercinates
$consultar_com = ("SELECT * FROM comerciante WHERE `aceite`='0'");
$resultado_com = mysql_query($consultar_com);
 
if(mysql_num_rows($resultado_com) != 0){
        echo "<form name='selecionar' method='post' action='admin_aceitar_comerciantes_funcao.php'>";
        echo"<table>
            <tr><td></td><td >Nome</td><td>NIF</td></tr>";
 
        while($linha_com = mysql_fetch_row($resultado_com) ){
                
            echo"<tr><td ><input type='checkbox' name='id[]' value='$linha_com[0]'></td><td>$linha_com[2]</td><td>$linha_com[0]</td></tr>";
            };
        echo "<tr><td colspan='3'><input type='submit' name='aceitar' value='Aceitar!'></td></tr>";
        echo "</table></form>";
} else{
        echo "Não exitem utilizadores por aceitar.";
}
        
?>
