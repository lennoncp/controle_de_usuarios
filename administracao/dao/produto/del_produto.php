<?php
    session_start();
    include_once "../conexao.php";

    $id = $_GET['id'];

    //Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../../../fotos/';

    $query = mysqli_query($conexao, "SELECT * FROM produtos WHERE id='$id' ");
    $resultado = mysqli_fetch_array($query);

    if(!empty($resultado['imagem'])){
        $delete = unlink($_UP['pasta'].$resultado['imagem']);
    }

    $delete = mysqli_query($conexao, "DELETE FROM produtos WHERE id='$id'");

    if((mysqli_affected_rows($conexao)) != 0){

    ?>

            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=7">
            <script type="text/javascript">
                alert("Produto excluido com sucesso.");
            </script>
    <?php

    }else{

    ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=7">
            <script type="text/javascript">
                alert("Produto não pode ser cadastrado.");
            </script>
    <?php

    }

?>