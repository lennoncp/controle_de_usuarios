<?php
    session_start();
    include_once "conexao.php";

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $_SESSION['auth'] = false;

    $valida = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'");
    $validacao = mysqli_fetch_array ($valida);

    //echo " Nome: ".$validacao['nome']." Usuario: ".$validacao['usuario']."";

    if(!empty($valida)){

        $_SESSION['id'] = $validacao['id'];
        $_SESSION['nome'] = $validacao['nome'];
        $_SESSION['usuario'] = $validacao['usuario'];
        $_SESSION['nivel_acesso'] = $validacao['nivel_acesso_id'];
        $_SESSION['status'] = $validacao['status'];
        $_SESSION['criado'] = $validacao['criado'];
        $_SESSION['modificado'] = $validacao['modificado'];

        if($_SESSION['status'] == 1){
            if($validacao['nivel_acesso_id'] == 1){
                    $_SESSION['auth'] = true;
                    header("Location: http://".$_SERVER['SERVER_NAME']."/administracao/administracao.php?link=1");
            }else{
                    $_SESSION['auth'] = true;
                    header("Location: http://".$_SERVER['SERVER_NAME']."/usuario/usuario.php");
            }
        }else{
            $_SESSION['loginErro'] = "Usuário foi desativado.";
            header("Location: http://".$_SERVER['SERVER_NAME']."/login.php");
        }


    }else{
        $_SESSION['loginErro'] = "Usuário ou Senha incorreto.";
        header("Location: http://".$_SERVER['SERVER_NAME']."/login.php");
    }


?>