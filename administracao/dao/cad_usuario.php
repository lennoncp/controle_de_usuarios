<?php
    session_start();
    include_once "conexao.php";

    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];
    $status = $_POST['status'];

    $insert = mysqli_query($conexao, "INSERT INTO usuarios ( nome, usuario, senha, status, nivel_acesso_id, criado) VALUES ( '$nome', '$usuario', '$senha', '$status', '$nivel', NOW())");

    if((mysqli_affected_rows($conexao)) != 0){

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=3">
            <script type="text/javascript">
                alert("Usuário cadastrado com sucesso.");
            </script>
    <?php

    }else{

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=3">
            <script type="text/javascript">
                alert("Usuário não pode ser cadastrado.");
            </script>
    <?php

    }

?>