<?php
    session_start();
    include_once "../conexao.php";

    $id = $_GET['id'];
    $destaque_id = $_GET['destaque_id'];

    $select_Nivel = mysqli_query($conexao, "SELECT d1.count_N1 as cN1, d2.count_N2 as cN2
                                            FROM (SELECT COUNT(*) as count_N1 FROM produto_destaque WHERE destaque_id = 1) as d1, 
                                            (SELECT COUNT(*) as count_N2 FROM produto_destaque WHERE destaque_id = 2) as d2");
    $nivelCount = mysqli_fetch_array($select_Nivel) or die(mysqli_error($conexao));

    echo "N1: ".$nivelCount['cN1']." N2: ".$nivelCount['cN2'];

    $select = mysqli_query($conexao, "SELECT * FROM produto_destaque WHERE produto_id='$id'");
    $selectArray = mysqli_fetch_array($select);

    if($destaque_id == 1){
        echo "destaque 1 ";
        if($nivelCount['cN1'] < 4){

            if(isset($selectArray)){
                echo "update 1 ";
                $update = mysqli_query($conexao, "UPDATE produto_destaque SET destaque_id='$destaque_id', destacado=NOW() WHERE produto_id='$id' ");
            }else{
                echo "insert 1 ";
                $insert = mysqli_query($conexao, "INSERT INTO produto_destaque(produto_id, destaque_id, destacado) VALUE('$id','$destaque_id',NOW()) ");
            }

        }

    }
    if($destaque_id == 2){
        echo "destaque 2";

        if($nivelCount['cN2'] < 3){

            if(isset($selectArray)){
                echo "update 2 ";
                $update = mysqli_query($conexao, "UPDATE produto_destaque SET destaque_id='$destaque_id', destacado=NOW() WHERE produto_id='$id' ");
            }else{
                echo "insert 2 ";
                $insert = mysqli_query($conexao, "INSERT INTO produto_destaque(produto_id, destaque_id, destacado) VALUE('$id','$destaque_id',NOW()) ");
            }

        }
    }
    
    if($destaque_id == 3){
        echo "destaque 3";
        $delete = mysqli_query($conexao, "DELETE FROM produto_destaque WHERE produto_id='$id' AND destaque_id IN (1,2) ") or die(mysqli_error($conexao));
        
        if((mysqli_affected_rows($conexao)) != 0){
        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=13">
                <script type="text/javascript">
                    alert("Destaque removido.");
                </script>
        <?php
    }

    }else{


       // INSERT INTO `produtos` (`id`, `nome`, `descricao_curta`, `descricao_longa`, `preco`, `tag`, `description`, `criado`, `modificado`, `categoria_id`, `imagem`, `situacao_id`) VALUES (NULL, 'nova', 'descricao curta', 'descricao longa', '400.2', 'tag', 'description', '2018-08-03 00:00:00', NULL, '1', 'imagem.png', '1');

        if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=13">
                <script type="text/javascript">
                    alert("Produto destacado com sucesso.");
                </script>
        <?php

        }else{

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=13">
                <script type="text/javascript">
                    alert("Produto não pode ser destacado.");
                </script>
        <?php

        }
    }

?>