<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Nome da companhia</h5>
    <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=1">Home</a>
    </nav>
    <div class="dropdown">
        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        Usuário
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=2">Cadastro</a>
        <a class="dropdown-item" href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=3">Listagem</a>
        <a class="dropdown-item" href="administracao.php?link=">Link 3</a>
        </div>
    </div>

    <?php
        if($_SESSION['auth']){
    ?>
    <a class="btn btn-outline-primary" href="http://<?php echo $_SERVER['SERVER_NAME']?>/sair.php">Sair</a>
    <?php
        }else{
    ?>
    <a class="btn btn-outline-primary" href="http://<?php echo $_SERVER['SERVER_NAME']?>/login.php">Login in</a>
    <?php
        }
    ?>
</div>