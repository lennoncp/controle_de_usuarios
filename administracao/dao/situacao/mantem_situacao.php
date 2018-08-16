<?php
    session_start();
    include_once "../conexao.php";

    if(!empty($_POST['id'])){

            $id = $_POST['id'];
            $nome = $_POST['nome'];

         // echo "ID: ".$id." Nome: ".$nome;

            $update = mysqli_query($conexao, "UPDATE situacao SET nome='$nome', modificada=NOW() WHERE id='$id';");

        

            if((mysqli_affected_rows($conexao)) != 0){

            ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11">
                    <script type="text/javascript">
                        alert("Situação editada com sucesso.");
                    </script>
            <?php

            }else{

            ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11">
                    <script type="text/javascript">
                        alert("Situação não pode ser editada.");
                    </script>
            <?php

            }
          }else{

        $id = $_POST['id'];
        $nome = $_POST['nome'];

      //  echo "ID: ".$id." Nome: ".$nome;
   
        $insert = mysqli_query($conexao, "INSERT INTO situacao ( nome, criada) VALUES ( '$nome',  NOW())");

    

        if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11">
                <script type="text/javascript">
                    alert("Categoria cadastradacom sucesso.");
                </script>
        <?php

        }else{

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11">
                <script type="text/javascript">
                    alert("Categoria não pode ser cadastrada.");
                </script>
        <?php

        } 
    }
?>