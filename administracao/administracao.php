<?php
    session_start();
?>
<html>
    <head>
        <title>Home Page</title>
        <?php
            include "../include/head.php";
        ?>
    </head>
    <body>
        <?php
            include "navbar.php";

            $link = $_GET['link'];

            $page['1'] = "content_administador.php";
            $page['2'] = "contents/cadastro_de_usuario.php";

            if(!empty($link)){
                if(file_exists($page[$link])){
                    include $page[$link];
                }else{
                    include $page[1];
                }
            }else{
                include $page[1];
            }


            include "../include/footer.php";
        ?>
    </body>
</html>