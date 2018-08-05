<div class="container-fluid">
    <div class="container col-md-6" style="padding: 10px;">
        <h2>Cadastro do Produto</h2>
        <form method="POST"  action="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/cad_produto.php" 
            enctype="multipart/form-data">
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Entre com o Nome" name="nome">
            </div>
            <div class="form-group">
            <label for="descricao_curta">Descrição Curta</label>
            <textarea class="form-control" rows="5" id="descricao_curta" name="descricao_curta"></textarea>
            </div>
            <div class="form-group">
            <label for="descricao_longa">Descrição Longa</label>
            <textarea class="form-control" rows="5" id="descricao_longa" name="descricao_longa" ></textarea>
            </div>
            <div class="col-md-6" style="margin-left: -10px;">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" id="preco" placeholder="Preço do produto" name="preco">
                </div>
            </div>
            <div class="form-group">
            <label for="tag">Tags</label>
            <input type="text" class="form-control" id="tag" placeholder="Coloque a tag aqui" name="tag">
            </div>
            <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description" name="description">
            </div>
            <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria_id">
                <option value="0">Selecionar...</option>
            <?php 
                $categorias = mysqli_query($conexao, "SELECT * FROM categorias");
                while($categoria = mysqli_fetch_assoc($categorias)){
            ?>
                <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
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
                <option value="<?php echo $situacao['id'] ?>"><?php echo $situacao['nome'] ?></option>
            <?php
                }
            ?>
            </select>
            </div>
            <div class="form-group">
            <label for="situacao">Imagen Upload</label>
            <input type="file" class="form-control-file border" name="imagem" id="imagem">
            </div>
            <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
        </form>
    </div>
</div>