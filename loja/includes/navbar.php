<?php
    $categorias = mysqli_query($conexao, "SELECT * FROM categorias");
?> 
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="./index.php?link=1">Curso Celke</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo pg.'/home'; ?>">Home <span class="sr-only">(atual)</span></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
<?php 
        while($categoria = mysqli_fetch_assoc($categorias)){
?>
            <a class="dropdown-item" href="<?php echo pg.'/produto/'.$categoria['slug']; ?>"><?php echo $categoria['nome'] ?></a>
            <!-- <a class="dropdown-item" href="<?php echo pg.'/produto/'.$categoria['id']; ?>"><?php echo $categoria['nome'] ?></a> -->
<?php 
        }
?>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo pg.'/empresa'; ?>">Empresa</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light " href="<?php echo pg.'/contato'; ?>">Contato</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisa" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
    </div>
</nav>