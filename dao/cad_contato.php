<?php
    session_start();
    include_once "conexao.php";

    $titulo = $_POST['titulo'];
    $telefone = $_POST['tel'];
    $endereco = $_POST['end'];
    $mensagem = $_POST['msg'];

    $insert = mysqli_query($conexao, "INSERT INTO contato ( titulo, mensagem, telefone, endereco, criado) VALUES ( '$titulo', '$mensagem', '$telefone', '$endereco', NOW())");

    if((mysqli_affected_rows($conexao)) != 0){

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/index.php?link=3">
            <script type="text/javascript">
                alert("Mensagem enviado com sucesso.");
            </script>
    <?php

    }else{

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/index.php?link=3">
            <script type="text/javascript">
                alert("Mensagem não pode ser enviada.");
            </script>
    <?php

    }

?>