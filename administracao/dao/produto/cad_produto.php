<?php
    session_start();
    include_once "../conexao.php";

    $nome = $_POST['nome'];
    $descricao_curta = $_POST['descricao_curta'];
    $descricao_longa = $_POST['descricao_longa'];
    $preco = $_POST['preco'];
    $tag = $_POST['tag'];
    $description = $_POST['description'];
    $categoria_id = $_POST['categoria_id'];
    $imagem = $_FILES['imagem']['name'];
    $situacao_id = $_POST['situacao_id'];

    //Variavel autoriza salvar no banco, somente com tudo certo.
    $autorizado = false;

   //Pasta onde o arquivo vai ser salvo
   $_UP['pasta'] = '../../../fotos/';

   //Tamanho Máximo do arquivo em Bytes
   $_UP['tamanho'] = 1024*1024*100; //5mb

   //Array com as extensoes permitidas
   $_UP['extensoes'] = array('png','jpg','jpeg','gif');

   //Renomeia o arquivo ?
   $_UP['renomeia'] = true;

   //Array com os tipos de erros de upload no PHP
   $_UP['erros'][0] = 'Não houve erro';
   $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP, tamanho maxímo 2mb';
   $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
   $_UP['erros'][3] = 'O upload do arquivo foi parcialmente';
   $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

   //Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
   if($_FILES['imagem']['error'] != 0){
       die("<html lang='pt-br><body><h3>'Não foi possivel fazer o upload, erro: <br />".$_UP['erros'][$_FILES['imagem']['error']]."</h3><br/><a href='http://".$_SERVER['SERVER_NAME']."/administracao/administracao.php?link=8' type='button' class='btn btn-light'>Voltar</a></body></html>");
        exit; //Para e execução do script
   }

   //Faz a verificação da extensão da imagem(arquivo)
  // $extensao = strtolower(end(explode('.',$_FILES['imagem']['name'])));
   $extensao = strtolower(end(explode('.',$imagem)));
   if(array_search($extensao, $_UP['extensoes']) === false){
       ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=8'>
            <script type="text/javascript">
                alert("As estensões permitidas são: png, jpg, jpeg e gif");
            </script>
       <?php

   }
   // Faz a verificação do tamanho do arquivo.
   else if($_UP['tamanho'] < $_FILES['imagem']['size']){

        ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=8">
            <script type="text/javascript">
                alert("O arquivo enviado é muito grante, envie arquivo de até 2mb.");
            </script>
       <?php

   }

   // O arquivo da imagem passou pelas verificações, hora de o salvar na pasta foto.
   else{
       if($_UP['renomeia'] == true){
           //Cria um nome baseado no UNIX TIMESTAMP atual e com extesão.
            $nome_final = "foto_".time().'.jpg';
       }else{
           $nome_final = $_FILES['imagem']['name'];
       }

       //Verificar se é possivel mover o arquivo para a pasta escolhida.
       if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'].$nome_final)){

        //Autorizando que os dados venham a ser salvos no banco.
        $autorizado = true;

        ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=8">
            <script type="text/javascript">
                alert("Imagem carregada com Sucesso.");
            </script>
        <?php

       }else{

        ?>
            <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=8">
            <script type="text/javascript">
                alert("Imagem imagem não pode ser carregada.");
            </script>
        <?php

       }
   }

   if($autorizado){
        //echo " Nome: ".$nome." Curta: ".$descricao_curta." Longa: ".$descricao_longa." Preco: ".$preco." Tag: ".$tag." Description: ".$description." Categoria: ".$categoria_id." Imagem: ".$imagem." Situacao: ".$situacao_id."";

        $insert = mysqli_query($conexao, "INSERT INTO produtos ( nome, descricao_curta, descricao_longa, preco, tag, description, criado, categoria_id, imagem, situacao_id) VALUES ( '$nome', '$descricao_curta', '$descricao_longa', '$preco', '$tag', '$description', NOW(), '$categoria_id', '$nome_final', '$situacao_id')");

       // INSERT INTO `produtos` (`id`, `nome`, `descricao_curta`, `descricao_longa`, `preco`, `tag`, `description`, `criado`, `modificado`, `categoria_id`, `imagem`, `situacao_id`) VALUES (NULL, 'nova', 'descricao curta', 'descricao longa', '400.2', 'tag', 'description', '2018-08-03 00:00:00', NULL, '1', 'imagem.png', '1');

        if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=7">
                <script type="text/javascript">
                    alert("Produto cadastrado com sucesso.");
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
    }
?>