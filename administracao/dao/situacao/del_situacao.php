<?php
    session_start();
    include_once "../conexao.php";

    $id = $_GET['id'];

    $delete = mysqli_query($conexao, "DELETE FROM situacao WHERE id='$id'");

    if((mysqli_affected_rows($conexao)) != 0){

    ?>

            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11">
            <script type="text/javascript">
                alert("Situação excluida com sucesso.");
            </script>
    <?php

    }else{

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11">
            <script type="text/javascript">
                alert("Situação não pode ser excluida.");
            </script>
    <?php

    }

?>