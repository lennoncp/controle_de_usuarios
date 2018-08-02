<?php 
    session_start();
    session_destroy();

    unset(
            $_SESSION['loginErro'],
            $_SESSION['id'],
            $_SESSION['nome'],
            $_SESSION['usuario'] ,
            $_SESSION['nivel_acesso'] ,
            $_SESSION['status'],
            $_SESSION['criado'] ,
            $_SESSION['modificado'],
            $_SESSION['auth']
        );

    ?>

            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/index.php?link=1">
            <script type="text/javascript">
                alert("Saindo...");
            </script>

?>