<?php
    ob_start();

    if($_SESSION['auth'] == true){

        if($_SESSION['nivel_acesso'] >= 1){

        }else{
            $_SESSION['loginErro'] = "Usuário deve-se logar.";
            header("Location: http://".$_SERVER['SERVER_NAME']."/login.php");
        }


    }else{
        $_SESSION['loginErro'] = "Usuário ou Senha incorreto.";
        header("Location: http://".$_SERVER['SERVER_NAME']."/login.php");
    }


?>