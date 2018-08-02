<?php
    session_start();
    include_once "conexao.php";

    if($_GET['bt']=true){

        $id = $_GET['id'];
        $status = $_GET['status'];

        $update = mysqli_query($conexao, "UPDATE usuarios SET status='$status', modificado=NOW() WHERE id='$id';");
    }else{

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];
    $status = $_POST['status'];

    //echo " Nome: ".$nome." Usuario: ".$usuario." Senha: ".$senha." Nível: ".$nivel." Nome: ".$status." ";

    $update = mysqli_query($conexao, "UPDATE usuarios SET nome='$nome' , usuario='$usuario', senha='$senha', status='$status', nivel_acesso_id='$nivel', modificado=NOW() WHERE id='$id';");

    }

    if((mysqli_affected_rows($conexao)) != 0){

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=3">
            <script type="text/javascript">
                alert("Usuário editado com sucesso.");
            </script>
    <?php

    }else{

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=3">
            <script type="text/javascript">
                alert("Usuário não pode ser editado.");
            </script>
    <?php

    }

?>