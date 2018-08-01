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

            include "content_usuario.php";

            include "../include/footer.php";
        ?>
    </body>
</html>