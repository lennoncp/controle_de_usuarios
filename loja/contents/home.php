<!-- Principal jumbotron, para a principal mensagem de marketing ou call to action -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="#">
                 <img class="first-slide" src="./../../slides/slide1.jpg" alt="First slide">
            </a>
        </div>
        <div class="carousel-item">
            <a href="#">
                <img class="second-slide" src="./../../slides/slide2.jpg" alt="Second slide">
            </a>
        </div>
        <div class="carousel-item">
            <a href="#">
                <img class="third-slide" src="./../../slides/slide3.webp" alt="Third slide">
            </a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Voltar</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Avançar</span>
    </a>
</div>

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
    <?php 

    $produtos = mysqli_query($conexao, "SELECT * FROM produtos p, produto_destaque pd where p.id = pd.produto_id ORDER BY pd.destacado DESC");
    
    while($produto = mysqli_fetch_assoc($produtos)){

        if($produto['destaque_id'] == 1){
    
    ?>
    <div class="col-lg-3">
        <img class="rounded-circle" src="./../../fotos/<?php echo $produto['imagem']; ?>" alt="Generic placeholder image" width="200" height="200">
        <h2><?php echo $produto['nome']; ?></h2>
        <p><?php echo $produto['descricao_curta']; ?></p>
        <?php 
          $categotias = mysqli_query($conexao, "SELECT * FROM categorias WHERE id=".$produto['categoria_id']);
          $categoria = mysqli_fetch_array($categotias);
        ?>
        <p><a class="btn btn-secondary" href=<?php echo pg."/produto/".$categoria['slug']."/".$produto['slug'] ?> >View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <?php 
        }
    }
    ?>
    </div><!-- /.row -->

    <?php 

    $produtos_feat = mysqli_query($conexao, "SELECT * FROM produtos p, produto_destaque pd where p.id = pd.produto_id ORDER BY pd.destacado");

    $count = 0;

    while($produto_feat = mysqli_fetch_assoc($produtos_feat)){
        
    if($produto_feat['destaque_id'] == 2){

    ?>
    
    <hr class="featurette-divider">

    <?php 

    if($count == 1){

    ?>

    <div class="row featurette">

    <div class="col-md-7">
        <h2 class="featurette-heading"><?php echo $produto_feat['nome']; ?> </h2>
        <p class="lead"><?php echo $produto_feat['descricao_curta']; ?></p>
        <?php 
          $categotias_feat = mysqli_query($conexao, "SELECT * FROM categorias WHERE id=".$produto_feat['categoria_id']);
          $categoria_feat = mysqli_fetch_array($categotias_feat);
        ?>
        <p><a class="btn btn-secondary" href=<?php echo pg."/produto/".$categoria_feat['slug']."/".$produto_feat['slug'] ?> >View details &raquo;</a></p>
    </div>
    <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="./../../fotos/<?php echo $produto_feat['imagem']; ?>" alt="Generic placeholder image" width="500px" height="500px">
    </div>

    <hr class="featurette-divider">

    </div>

    <?php 
     $count = 0;
    }else{
    ?>

    <div class="row featurette">

    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading"><?php echo $produto_feat['nome']; ?></h2>
        <p class="lead"><?php echo $produto_feat['descricao_curta']; ?></p>
        <?php 
          $categotias_feat = mysqli_query($conexao, "SELECT * FROM categorias WHERE id=".$produto_feat['categoria_id']);
          $categoria_feat = mysqli_fetch_array($categotias_feat);
        ?>
        <p><a class="btn btn-secondary" href=<?php echo pg."/produto/".$categoria_feat['slug']."/".$produto_feat['slug'] ?> >View details &raquo;</a></p>
    </div>
    <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="./../../fotos/<?php echo $produto_feat['imagem']; ?>" alt="Generic placeholder image" width="500px" height="500px">
    </div>

    <hr class="featurette-divider">
    </div>

    <?php
       $count = 1;
            }
        }
    }
    ?>

    <hr class="featurette-divider">

</div> <!-- /container -->