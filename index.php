<?php
    session_start();

?>
<html>
    <head>
        <title>Home Page</title>
        <?php
            include "include/head.php";
        ?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php
            include "navbar.php";

            if(!empty($_GET['link'])){
             $link = $_GET['link'];
            }

            $page['1'] = "content_index.php";
            $page['2'] = "content_about.php";
            $page['3'] = "content_contato.php";
            
            if(!empty($link)){
                if(file_exists($page[$link])){
                    include $page[$link];
                }else{
                    include_once $page[1];
                }
            }else{
                include $page[1];
            }

            include "include/footer.php";
        ?>
    </body>
</html>