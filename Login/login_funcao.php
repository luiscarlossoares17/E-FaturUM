<?php

//ligacao a base de dados
include ("../mysqlconect.php");

include ("../funcoes.php");

//define variaveis resultantes dos campos introduzidos no login.php
$nif = ($_POST['nif']);

//Procura na tabela Administrador
$admin = procurar_bd('administrador', 'login', $nif);

//Procura na tabela Comerciante
$comerciante = procurar_bd('comerciante', 'nif_comerciante', $nif);

//Procura na tabela Consumidor
$consumidor = procurar_bd('consumidor', 'nif_consumidor', $nif);


//verifica se os campos foram preenchidos
if (!empty($_POST['nif']) && !empty($_POST['password'])) {

// se os campos introduzidos forem iguais aos que estao na BD o login e efectuado 
    if ($nif === $admin[0]) {
        $password = ($_POST['password']);

        if ($password === $admin[1]) {

//redireciona para a pagina principal do utilizador
            session_start();
            $_SESSION['admin'] = $nif;
            header('Location: ../Administrador/admin_home.php');
        } else {
            echo "<script type = 'text/javascript'>
                        alert('A password esta errada!')
                        window.location.href = 'login.php';
</script>";
        }
    } else {

        if ($nif === $comerciante[0]) {

            $password_s = ($_POST['password']);
            $password = md5($password_s);

            if ($password === $comerciante[1]) {

//redireciona para a pagina principal do utilizador

                if ($comerciante[7] == 0) {


                    echo " <script type='text/javascript'>
                       alert('O seu registo ainda nao foi aceite!')
                       window.location.href = 'login.php'
                     </script>";
                } else {

                    if ($comerciante[7] == 1) {
                        session_start();
                        $_SESSION['comerciante'] = $nif;
                        echo " <script type='text/javascript'>
                       alert('Mude a sua password!')
                       window.location.href = '../alterar_password.php'
                     </script>";
                    } else {
                        session_start();
                        $_SESSION['comerciante'] = $nif;
                        header('Location: ../Comerciante/comerciante_home.php');
                    }
                }
            } else {
                echo "<script type = 'text/javascript'>
                        alert('A password esta errada!')
                        window.location.href = 'login.php';
                        </script>";
            }
        } else {

            if ($nif === $consumidor[0]) {

                $password_s = ($_POST['password']);
                $password = md5($password_s);

                if ($password === $consumidor[6]) {

                    //redireciona para a pagina principal do utilizador


                    if ($consumidor[7] == 0) {

                        echo " <script type = 'text/javascript'>
alert('O seu registo ainda nao foi aceite!')
window.location.href = 'login.php'
</script>";
                    } else {

                        if ($consumidor[7] == 1) {
                            session_start();
                            $_SESSION['consumidor'] = $nif;

                            echo " <script type = 'text/javascript'>
alert('Mude a sua password!')
window.location.href = '../alterar_password.php'
</script>"; //PRECISO MUDAR
                        } else {
                            session_start();
                            $_SESSION['consumidor'] = $nif;
                            header('Location: ../Consumidor/consumidor_home.php');
                        }
                    }
                }
                echo "<script type = 'text/javascript'>
                        alert('A password esta errada!')
                        window.location.href = 'login.php';
                        </script>";
            } else {
                echo " <script type = 'text/javascript'>
alert('Nao existe nenhum utilizidar registado com esse NIF!')
window.location.href = 'login.php';
</script>";
            }
        }
    }
} else {
    echo " <script type = 'text/javascript'>
alert('Preencha todos os campos!')
window.location.href = 'login.php'
</script>";
}
?>
