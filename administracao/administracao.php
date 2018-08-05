<?php
    session_start();
    include_once "dao/conexao.php";
    include_once "seguranca.php";
?>
<html>
    <head>
        <title>Administração Page</title>
        <?php
            include "../include/head.php";
        ?>
    </head>
    <body>
        <?php
            include "navbar.php";

            $link = $_GET['link'];

            $page['1'] = "../administracao/content_administador.php";
            $page['2'] = "../administracao/contents/cadastro_de_usuario.php";
            $page['3'] = "../administracao/contents/listagem_de_usuarios.php";
            $page['4'] = "../administracao/contents/editar_o_usuario.php";
            $page['5'] = "../administracao/contents/visualizar_o_usuario.php";
            $page['6'] = "../administracao/contents/manutencao_de_categoria.php";
            $page['7'] = "../administracao/contents/listagem_de_produtos.php";
            $page['8'] = "../administracao/contents/cadastro_de_produtos.php";
            $page['9'] = "../administracao/contents/editar_o_produto.php";
            
            
            
            
            if(!empty($link)){
                if(file_exists($page[$link])){
                    include $page[$link];
                }else{
                    include_once $page[1];
                }
            }else{
                include $page[1];
            }


            include "../include/footer.php";
        ?>
    </body>
</html>