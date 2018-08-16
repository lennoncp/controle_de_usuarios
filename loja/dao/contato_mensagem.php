<?php
    session_start();
    define('pg', 'http://'.$_SERVER['SERVER_NAME'].'/loja');

    include_once "conexao.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['msg'];

    echo " nome: ".$nome." email: ".$email." mensagem: ".$mensagem."";


    $insert = mysqli_query($conexao, "INSERT INTO contato_empresa( nome, email, mensagem, dt_criada) VALUE ( '$nome', '$email', '$mensagem', NOW())") or die(mysqli_error($conexao));

    if((mysqli_affected_rows($conexao)) != 0){

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= <?php echo pg.'/contato'; ?>">
            <script type="text/javascript">
                alert("Mensagem enviado com sucesso.");
            </script>
    <?php

    }else{

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= <?php echo pg.'/contato'; ?>">
            <script type="text/javascript">
                alert("Mensagem não pode ser enviada.");
            </script>
    <?php

    }

?>