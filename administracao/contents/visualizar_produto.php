<?php
    $id = $_GET['id'];
    $query = mysqli_query($conexao, "SELECT * FROM produtos WHERE id='$id' ");
    $resultado = mysqli_fetch_array($query);

    //Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../../../fotos/';
?>
<div class="container-fluid ">
    <div class="container col-md-6 margem-top-bottom" style="padding: 10px;">
        <div class="form-inline">
            <h2>Visualizar Produto <?php echo " ".$resultado['nome']?></h2>
            <div class="pull-right ml-auto" >
                <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=9&id=<?php echo $resultado['id'] ?>"  class="btn btn-warning btn-sm mr-auto" >Editar</a>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=7" class="btn btn-primary btn-sm ml-auto" >Listar Produtos</a>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/del_produto.php?id=<?php echo $resultado['id'] ?>"  class="btn btn-danger btn-sm">Excluir</a>
            </div>
        </div>
        <form method="POST"  action="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/cad_produto.php" 
            enctype="multipart/form-data">
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $resultado['id']; ?>" disabled>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $resultado['nome']; ?>" disabled>
            </div>
            <div class="form-group">
            <label for="descricao_curta">Descrição Curta</label>
            <textarea class="form-control" rows="5" id="descricao_curta" name="descricao_curta" disabled><?php echo $resultado['descricao_curta']; ?></textarea>
            </div>
            <div class="form-group">
            <label for="descricao_longa">Descrição Longa</label>
            <textarea class="form-control" rows="5" id="descricao_longa" name="descricao_longa"  disabled><?php echo $resultado['descricao_longa']; ?></textarea>
            </div>
            <div class="col-md-6" style="margin-left: -10px;">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $resultado['preco']; ?>" disabled>
                </div>
            </div>
            <div class="form-group">
            <label for="tag">Tags</label>
            <input type="text" class="form-control" id="tag"  name="tag" value="<?php echo $resultado['tag']; ?>" disabled>
            </div>
            <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $resultado['description']; ?>" disabled>
            </div>
            <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria_id" disabled>
            <?php 
                $categorias = mysqli_query($conexao, "SELECT * FROM categorias");
                while($categoria = mysqli_fetch_assoc($categorias)){
            ?>
                <option value="<?php echo $categoria['id'] ?>"
                <?php if($categoria['id'] == $resultado['categoria_id']){ echo "selected"; } ?>
                ><?php echo $categoria['nome'] ?></option>
            <?php
                }
            ?>
            </select>
            </div>
            <div class="form-group">
            <label for="situacao">Situação</label>
            <select class="form-control" id="situacao" name="situacao_id" disabled>
                <option value="0">Selecionar...</option>
            <?php 
                $situacoes = mysqli_query($conexao, "SELECT * FROM situacao");
                while($situacao = mysqli_fetch_assoc($situacoes)){
            ?>
                <option value="<?php echo $situacao['id']; ?>" 
                <?php if($situacao['id'] == $resultado['situacao_id']){ echo " selected"; } ?>
                ><?php echo $situacao['nome'] ?></option>
            <?php
                }
            ?>
            </select>
            </div>
            <div class="form-group">
            <label for="situacao">Imagem do Produto</label>
            <img src="<?php echo $_UP['pasta'].$resultado['imagem'] ?>" class="mx-auto d-block" width="100" height="100">
            </div>
        </form>
    </div>
</div>