<?php
    $id = $_GET['id'];
    $query = mysqli_query($conexao, "SELECT * FROM produtos WHERE id='$id' ");
    $resultado = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="container col-md-6 margem-top-bottom" style="padding: 10px;">
        <div class="form-inline">
            <h2>Editando o Produto</h2>
            <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=7" type="button" class="btn btn-primary btn-md ml-auto" >Listando Produtos</a>
        </div>
        <form method="POST"  action="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/edit_produto.php" enctype="multipart/form-data">
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" class="form-control"  name="id" value="<?php echo $resultado['id'] ?>">
            <input type="text" class="form-control" id="nome" placeholder="Entre com o Nome" name="nome" value="<?php echo $resultado['nome'] ?>">
            </div>
            <div class="form-group">
            <label for="descricao_curta">Descrição Curta</label>
            <textarea class="form-control" rows="5" id="descricao_curta" name="descricao_curta" ><?php echo $resultado['descricao_curta'] ?></textarea>
            </div>
            <div class="form-group">
            <label for="descricao_longa">Descrição Longa</label>
            <textarea class="form-control" rows="5" id="descricao_longa" name="descricao_longa" ><?php echo $resultado['descricao_longa'] ?></textarea>
            </div>
            <div class="col-md-6" style="margin-left: -10px;">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" id="preco" placeholder="Preço do produto" name="preco" value="<?php echo $resultado['preco'] ?>">
                </div>
            </div>
            <div class="form-group">
            <label for="tag">Tags</label>
            <input type="text" class="form-control" id="tag" placeholder="Coloque a tag aqui" name="tag" value="<?php echo $resultado['tag'] ?>">
            </div>
            <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="<?php echo $resultado['description'] ?>" >
            </div>
            <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria_id">
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
            <select class="form-control" id="situacao" name="situacao_id">
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
            <label for="situacao">Imagen Upload</label>
            <input type="file" class="form-control-file border" name="imagem" value="<?php echo $resultado['imagem'] ?>">
            </div>
            <?php    
                if($resultado['imagem'] == ""){
                    echo "<span>O produto não possui imagem.</span>";
                }
                if($resultado['imagem'] != ""){
            ?>
                <div class="form-group">
                   <label >Imagem Antiga</label>
                    <img src="<?php echo "../../../fotos/".$resultado['imagem']; ?>" width="100" height="100">
                    <input type="hidden" value="<?php echo $resultado['imagem'] ?>" name="imagem_antiga" id="imagem_antiga">
                   </div>
            <?php
                }
            ?>
            <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </form>
    </div>
</div>