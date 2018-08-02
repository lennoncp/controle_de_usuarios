<?php
    ob_start();

    if($_SESSION['auth'] == true){

        echo "Entrou!";


    }else{
        $_SESSION['loginErro'] = "Usuário ou Senha incorreto.";
        header("Location: http://".$_SERVER['SERVER_NAME']."/login.php");
    }


?>