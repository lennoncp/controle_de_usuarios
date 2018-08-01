<?php
    session_start();
    include_once "conexao.php";

    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];

    $insert = mysqli_query($conexao, "INSERT INTO usuarios ( nome, usuario, senha, nivel_acesso_id, criado) VALUES ( '$nome', '$usuario', '$senha', '$nivel', NOW())");

    echo "Nome: ".$nome." Usuario: ".$usuario." Senha: ".$senha." Nível: ".$nivel;

?>