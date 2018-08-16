
<?php
    $url = (isset($_GET['url'])) ? $_GET['url']:'';
    $explode = explode('/', $url);
    $categoria_id = $explode[1];

    //seleciona a categoria de produtos
    $categorias = mysqli_query($conexao, "SELECT * FROM categorias WHERE id='$categoria_id' LIMIT 1");
    $categoria = mysqli_fetch_assoc($categorias);

    //seleciona os produtos da categoria selecionada
    $produtos = mysqli_query($conexao, "SELECT * FROM produtos WHERE categoria_id='$categoria_id' ORDER BY id ");
    
?>
<div class="container marketing">
    <div class="col-md-7">
        <h2 class="featurette-heading"><?php echo $categoria['nome']; ?></h2>
    </div>
    <hr class="featurette-divider-sm">
    <!-- Three columns of text below the carousel -->
    <div class="row">
    <?php
        while($produto = mysqli_fetch_array($produtos)){
    ?>
    <div class="col-lg-3">
        <img class="rounded-circle" src="./../../fotos/<?php echo $produto['imagem'] ?>" alt="Generic placeholder image" width="200" height="200">
        <h2><?php echo $produto['nome'] ?></h2>
        <p><?php echo $produto['descricao_curta'] ?></p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <?php
    }
    ?>
    </div><!-- /.row -->

    <hr class="featurette-divider-sm">
    <?php 
    $produtos_feat = mysqli_query($conexao, "SELECT * FROM produtos WHERE categoria_id='$categoria_id'  LIMIT 3 ");
        $controle = 0;
        while($produto_feat = mysqli_fetch_array($produtos_feat)){
            if($controle == 0){
    ?>
    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading"><?php echo $produto_feat['nome'] ?></h2>
        <p class="lead"><?php echo $produto_feat['descricao_curta'] ?></p>
    </div>
    <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="./../../fotos/<?php echo $produto_feat['imagem'] ?>" alt="Generic placeholder image" width="500px" height="500px">
    </div>
    </div>
    <?php 
         $controle = 1;   
        }else{
    ?>
    <hr class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading"><?php echo $produto_feat['nome'] ?></h2>
        <p class="lead"><?php echo $produto_feat['descricao_curta'] ?></p>
    </div>
    <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="./../../fotos/<?php echo $produto_feat['imagem'] ?>" alt="Generic placeholder image" width="500px" height="500px">
    </div>
    </div>
    <?php 
        $controle = 0;   
            } //close if
        }//close while
    ?>

    <hr class="featurette-divider">

</div> <!-- /container -->