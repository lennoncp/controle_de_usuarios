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
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal">Nome da companhia</h5>
            <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="index.php">Home</a>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="container col-md-4 text-center" >
                <?php
                    if(!empty($_SESSION['loginErro'])){
                ?>
                    <div class="alert alert-danger">
                        <strong>Erro!</strong> <?php  echo $_SESSION['loginErro'];  ?>
                    </div>
                <?php
                    } 
                ?>
                <form class="form-signin" method="POST" action="dao/valida_dados.php">
                    <img class="mb-4" src="imgs/images.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
                    <label for="usuario" class="sr-only">Endereço de email</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Digite seu Usuário" required autofocus>
                    <label for="senha" class="sr-only">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua Senha" required>
                    <button class="btn btn-md btn-primary float-right" type="submit" style="margin: 5px;">Login</button>
                </form>
            </div>
        </div>
        <?php

            unset(
                $_SESSION['loginErro']
            );

            include "include/footer.php";
        ?>
    </body>
</html>