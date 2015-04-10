<?php
session_start();
if (isset($_SESSION['admin'])) {
    
} else {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Registar Comerciante</title>
        <link rel="shortcut icon" type="image/gif" href="../imagens/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../Style.css">
        <script src="includes/jquery/jquery-1.2.6.min.js"></script>

        <script type = "text/javascript" >

            $(document).ready(function() {

                $("#username").change(function() {

                    var usr = $("#username").val();

                    if (usr.length > 8)
                    {
                        $("#status").html('Checking availability...');

                        $.ajax({
                            type: "POST",
                            url: "check.php",
                            data: "username=" + usr,
                            success: function(msg) {

                                $("#status").ajaxComplete(function(event, request, settings) {

                                    if (msg == 'OK')
                                    {
                                        $("#username").removeClass('object_error'); // if necessary
                                        $("#username").addClass("object_ok");
                                        $(this).html('');
                                    }
                                    else
                                    {
                                        $("#username").removeClass('object_ok'); // if necessary
                                        $("#username").addClass("object_error");
                                        $(this).html(msg);
                                    }

                                });

                            }

                        });

                    }
                    else
                    {
                        $("#status").html('<font color="red">The username should have at least <strong>9</strong> characters.</font>');
                        $("#username").removeClass('object_ok'); // if necessary
                        $("#username").addClass("object_error");
                    }

                });

            });


        </script>

        <style>
            .object_ok
            {
                border: 1px solid green; 
                color: #333333; 
            }

            .object_error
            {
                border: 1px solid #AC3962; 
                color: #333333; 
            }
        </style>
    </head>
    <body>
        <header id="header">E-FacturUM</header>
        <a href="admin_home.php" id="semlinha"><center id="admin_aceitar_top">Administrador</center></a> 
                                              <a href="../index.php"><img src="../imagens/icons/logout.png" id="sair_icon" alt="Sair" title="Sair"></a>
                                              <script src = "../funcoes.js"></script>
                                              <a href="admin_registar.php"><img src='../imagens/icons/voltar.png' alt='Voltar' title="Voltar" id='voltar'></a>

                                              <div>
                                                  <form name="comerciante" method="POST" id="admin_registar_comerciante_form" action="admin_registar_comerciante_aux.php" onsubmit="return validar_registo(this);"> 
                                                          <input type="text" name="nif" id="username" maxlength="9" required="" onkeypress="return sonumeros(event);"> <div id="status"></div><br>
                                                          <input type="text" name="nome" required="" onkeypress="return apenasletras(event);"><br>
                                                          <input type="text" name="mail" required=""><br>
                                                          <input type="text" name="morada" required=""><br>
                                                          <input type="text" name="telefone" maxlength="9" required="" onkeypress="return sonumeros(event);"><br>
                                                          <?php
                                                          require '../mysqlconect.php';
                                                          $sql = "SELECT * FROM setor_actividade";
                                                          $qry = mysql_query($sql) or die(mysql_error());
                                                          echo "<select name='setor'>";
                                                          echo "<option></option>";
                                                          while ($rsl = mysql_fetch_array($qry)) {
                                                              echo "<option name='setor' value='" . $rsl[0] . "'>" . $rsl[1] . "</option>";
                                                          }
                                                          echo "</select>";
                                                          mysql_close();
                                                          ?><br>
                                                          <button type="submit" name="submit" id="">Registar</button>
                                                      </form>
                                                  </div>

                                                  <div id='admin_registar_comerciante_form2'>  
                                                  Nif do Comerciante<br> 
                                                  Nome<br>
                                                  Email<br>
                                                  Morada<br>
                                                  Telefone<br>
                                                  Setor
                                              </div>  

                                              <div id="admin_session">
                                                  <?php
                                                  echo 'Bem-Vindo';
                                                  include ("../div_session.php");
                                                  ?>
                                              </div>

        <center id="rodape">
            <?php
            include '../rodape.php';
            ?>
        </body>
</html>        
