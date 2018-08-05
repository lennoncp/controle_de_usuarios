<?php
    session_start();
    include_once "../conexao.php";

    $id = $_GET['id'];
    $situacao_id = $_GET['situacao_id'];
   
        $insert = mysqli_query($conexao, "UPDATE produtos SET situacao_id='$situacao_id' WHERE id='$id' ");

       // INSERT INTO `produtos` (`id`, `nome`, `descricao_curta`, `descricao_longa`, `preco`, `tag`, `description`, `criado`, `modificado`, `categoria_id`, `imagem`, `situacao_id`) VALUES (NULL, 'nova', 'descricao curta', 'descricao longa', '400.2', 'tag', 'description', '2018-08-03 00:00:00', NULL, '1', 'imagem.png', '1');

        if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=7">
                <script type="text/javascript">
                    alert("Situação editada com sucesso.");
                </script>
        <?php

        }else{

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=7">
                <script type="text/javascript">
                    alert("Situacao não pode ser editada.");
                </script>
        <?php

        }

?>