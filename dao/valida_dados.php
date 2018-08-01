<?php
    session_start();
    include_once "conexao.php";

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    

    $valida = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'");
    $validacao = mysqli_fetch_array ($valida);

    //echo " Nome: ".$validacao['nome']." Usuario: ".$validacao['usuario']."";

    if(!empty($valida)){

        $_SESSION['id'] = $validacao['id'];
        $_SESSION['nome'] = $validacao['nome'];
        $_SESSION['usuario'] = $validacao['usuario'];
        $_SESSION['criado'] = $validacao['criado'];
        $_SESSION['modificado'] = $validacao['modificado'];

        if($validacao['nivel_acesso_id'] == 1){
            header("Location: ../administracao/administracao.php?link=1");
        }else{
            header("Location: ../usuario/usuario.php");
        }


    }else{
        $_SESSION['loginErro'] = "Usuário ou Senha incorreto.";
        header("Location: ../login.php");
    }


?>