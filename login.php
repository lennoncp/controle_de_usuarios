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
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal">Nome da companhia</h5>
            <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="http://<?php echo $_SERVER['SERVER_NAME']?>/index.php?link=1">Home</a>
            </nav>
        </div>
        <div class="container-flex center-block">
            <div class="col-md-4" ></div;
            <div class="col-md-4 text-center" >
                <?php
                    if(!empty($_SESSION['loginErro'])){
                ?>
                    <div class="alert alert-danger">
                        <strong>Erro!</strong> <?php  echo $_SESSION['loginErro'];  ?>
                    </div>
                <?php
                    } 
                ?>
                <form class="form-signin" method="POST" action="http://<?php echo $_SERVER['SERVER_NAME']?>/dao/valida_dados.php">
                    <img class="mb-4" src="imgs/images.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
                    <label for="usuario" class="sr-only">Endereço de email</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Digite seu Usuário" required autofocus>
                    <label for="senha" class="sr-only">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua Senha" required>
                    <button class="btn btn-md btn-primary float-right" type="submit" style="margin: 5px;">Login</button>
                </form>
            </div>
            <div class="col-md-4" ></div;
        </div>
        <?php

            unset(
                $_SESSION['loginErro'],
                $_SESSION['id'],
                $_SESSION['nome'],
                $_SESSION['usuario'] ,
                $_SESSION['nivel_acesso'] ,
                $_SESSION['status'],
                $_SESSION['criado'] ,
                $_SESSION['modificado'] ,
                $_SESSION['auth']
            );

            include "include/footer.php";
        ?>
    </body>
</html>