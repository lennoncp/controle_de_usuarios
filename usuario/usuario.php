<?php
    session_start();
    include_once "seguranca.php"
?>
<html>
    <head>
        <title>Usuário Page</title>
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