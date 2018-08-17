<?php
    session_start();
    include_once "conexao.php";

    if(!empty($_POST['id'])){

            $id = $_POST['id'];
            $nome = $_POST['nome'];

            //echo " Nome: ".$nome." Usuario: ".$usuario." Senha: ".$senha." Nível: ".$nivel." Nome: ".$status." ";

            $slug = strtolower(preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome ) ));

            $update = mysqli_query($conexao, "UPDATE categorias SET nome='$nome', slug='$slug', modificado=NOW() WHERE id='$id';");

        

            if((mysqli_affected_rows($conexao)) != 0){

            ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=6">
                    <script type="text/javascript">
                        alert("Categoria editada com sucesso.");
                    </script>
            <?php

            }else{

            ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=6">
                    <script type="text/javascript">
                        alert("Categoria não pode ser editada.");
                    </script>
            <?php

            }
    }else{

        $id = $_POST['id'];
        $nome = $_POST['nome'];

        $slug = strtolower(preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome ) ));

        $insert = mysqli_query($conexao, "INSERT INTO categorias ( nome, slug, criado) VALUES ( '$nome', '$slug',  NOW())");

    

        if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=6">
                <script type="text/javascript">
                    alert("Categoria cadastradacom sucesso.");
                </script>
        <?php

        }else{

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=6">
                <script type="text/javascript">
                    alert("Categoria não pode ser cadastrada.");
                </script>
        <?php

        }
        
    }
?>