
<?php
    $url = (isset($_GET['url'])) ? $_GET['url']:'';
    $explode = explode('/', $url);
    //$categoria_id = $explode[1];
    $categoria_slug = $explode[1];
    $produto_slug = $explode[2];

    //seleciona a categoria de produtos
   // $categorias = mysqli_query($conexao, "SELECT * FROM categorias WHERE id='$categoria_id' LIMIT 1");
   $categorias = mysqli_query($conexao, "SELECT * FROM categorias WHERE slug='$categoria_slug' LIMIT 1");
   $categoria = mysqli_fetch_assoc($categorias);

    //seleciona os produtos da categoria selecionada
    $produtos_det = mysqli_query($conexao, "SELECT * FROM produtos WHERE categoria_id=".$categoria['id']." AND slug='$produto_slug' ORDER BY id ") or die(mysqli_error($conexao));
    $produto_det = mysqli_fetch_array($produtos_det);

?>
<div class="container marketing">
    <div class="col-md-12">
        <h2 class="featurette-heading"><?php echo $produto_det['nome']; ?></h2>
    </div>
    <hr class="featurette-divider-sm">
    <!-- Three columns of text below the carousel -->
    <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto m-2" src="./../../../fotos/<?php echo $produto_det['imagem'] ?>" alt="Generic placeholder image" width="500px" height="500px">
            </div>

            <div class="col-md-5">
                <h2 class="m-2"><?php echo $produto_det['nome'] ?></h2>
                <p class="m-2 text-center font-preco"><?php echo "Preço: ".$produto_det['preco'] ?></p>
                <p class="m-2"><?php echo $produto_det['descricao_curta'] ?></p>
            </div>
        </div>
        <h2 class="m-2">Descrição Longa</h2>
        <p class="m-2"><?php echo $produto_det['descricao_longa'] ?></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-1"></div>

    </div><!-- /.row -->

    <hr class="featurette-divider-sm">
    

</div> <!-- /container -->